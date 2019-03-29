<?php
$img_dir = DOCUMENT_ROOT . "/webapp/lib/img/";
require_once($img_dir . 'img.class.php');

class Img_ImgMagick extends Img {
	//画像を生成
	function generate_img() {
		// $this->sourceFilename、$this->sourceFormatを設定
		$this->set_sourceFilename();
		// $this->outputFormatを設定
		$this->set_outputFormat();
		// $this->cache_filename、$this->cache_fullpathを設定
		$this->set_cacheFilename();
		
		/*
			ここでキャッシュのチェック
			キャッシュファイル名（フルパスも）もセットされる
		*/
		if ($this->config_cache_source_enabled && ($this->cache_exists = $this->check_cache() && $this->check_rawcache())) {
			return true;
		}

		if ($this->src) {
			//TODO フォルダから取得する場合の処理

		}
		elseif ($this->dbsrc) {
			// 実画像キャッシュがあるかどうかチェック
			if ($this->cache_exists) {
				$this->rawImageData = @readfile($this->get_rawcache_filename());
			} else {
				//DBから取得
				if (!$this->setRawImageData4db()) {
					return false;
				}
				// 取得した画像を一旦ファイルに書き出し
				$this->create_rawcache();
			}
			
			// 画像サイズの取得にGDを用いる
			$im = @imagecreatefromstring($this->rawImageData);
			$this->source_height = @imagesy($im);
			$this->source_width = @imagesx($im);

			if (!$im || !$this->source_width || !$this->source_height) {
				return false;
			}
			
			//リサイズせず、かつ、形式変換しない場合、ここで終了（変換する必要なし）
			if ($this->rawImageData && !isset($this->w) && !isset($this->h) && ($this->sourceFormat == $this->outputFormat)) {
				return true;
			} else if ($this->rawImageData && $this->source_width <= $this->w && $this->source_height <= $this->h && $this->sourceFormat == $this->outputFormat) {
				return true;
			}

			// サムネイルを生成し、キャッシュとしてファイルに保存
			$this->create_cache();
			return true;
		}
	}

	// 実画像キャッシュがあるか判定
	function check_rawcache() {
		return file_exists($this->get_rawcache_filename());
	}

	//画像を出力
	function output_img()
	{
		//キャッシュがある場合
		if ($this->config_cache_source_enabled && $this->cache_exists) {

			$this->send_content_type();

			if ($mtime = filemtime($this->cache_fullpath)) {
				// Etag
				require_once (DOCUMENT_ROOT.'/webapp/lib/Etag.class.php');
				$etag = new Etag($this->cache_filename.$mtime, $mtime);
				if ($etag->etagCheck()) {
					exit;
				}
			}
			
			@readfile($this->cache_fullpath);
			return true;
		}

		//キャッシュがない場合
		if ($this->src) {
			//TODO ディレクトリから取ってくる場合

		}
		elseif ($this->dbsrc) { //DBからとってくる場合
			//リサイズせずに、かつ、形式変換しない場合、実画像をそのまま出力
			if ($this->rawImageData && !isset($this->img_output)) {
				$this->send_content_type();
				echo $this->rawImageData;
				return true;
			}
			elseif ($this->img_output) {
				$this->send_content_type();
				// キャッシュをそのまま出力
				$file = fopen($this->cache_fullpath, "rb");
				@fpassthru($file);
				fclose($file);
				return true;
			}
		}
		return true;
	}

	// サムネイルキャッシュを作成する
	function create_cache()
	{
		$this->create_cache_subdir();
		
		$convert_command = $this->get_imgmagick_convert_command();
		$this->exec_imgmagick_convert($convert_command);
	}
	
	// 実画像キャッシュを作成する
	function create_rawcache()
	{
		$raw_fullpath = $this->get_rawcache_filename();
		$this->create_cache_rawdir();
		
		$handle = fopen($raw_fullpath, 'wb');
		fwrite($handle, $this->rawImageData);
		fclose($handle);
	}
	
	// 実画像キャッシュディレクトリを作成する
	function create_cache_rawdir() {
		$subdir = dirname($this->get_rawcache_filename()); 
		if (!is_dir($subdir)) {
			mkdir($subdir);
		}
	}

	// ImageMagickのコマンドラインを作成して返す
	function get_imgmagick_convert_command() {
		list($w, $h) = $this->get_size();

		$opt = (defined('IMGMAGICK_OPT') && IMGMAGICK_OPT) ? IMGMAGICK_OPT : "-resize";
		
		// 念のため escape をかける
		$w = intval($w);
		$h = intval($h);
		$f = escapeshellcmd($this->outputFormat);
		$path = realpath($this->get_rawcache_filename());
		
		return IMGMAGICK_APP." $opt {$w}x{$h} $path {$f}:-";
	}

	// ImageMagickのconvertを起動する
	function exec_imgmagick_convert($command) {
		ob_start();
		passthru($command, $returncode);
		$this->img_output = ob_get_contents();
		ob_end_clean();
		$file = fopen($this->cache_fullpath, "wb");
		fwrite($file, $this->img_output);
		fclose($file);
	}

	// 実サイズ画像用の保存ファイル名を返す
	function get_rawcache_filename() {
		// ディレクトリ名
		// キャッシュが削除されるためにはパターン「w*_h*」に適合する必要がある
		$size = "w_h_raw";
	 	
	 	// ex.) img_cache_m_11_1115813647
	 	$cache_filename = 'img_cache_' .
	 		str_replace('.', '_', $this->sourceFilename) .
			'.' . $this->sourceFormat;
	 	
	 	// ex.) /var/img_cache/jpg/w180_h180/{filename}"""""""
	 	return 
	 		$this->config_cache_source_directory .
	 		$this->sourceFormat . '/' .
	 		$size . '/' .
	 		$cache_filename;
	}

	// 縮小後の画像サイズを返す
	function get_size() {
		$w = $this->w;
		$h = $this->h;
		//元画像が小さくてリサイズの必要がない場合
		if ((!$h || $this->source_height <= $h) &&
			(!$w || $this->source_width <= $w)) {
			
			return array($this->source_width, $this->source_height);
		}

		//リサイズの必要あり
		if ($this->source_height >= $this->source_width) {
			//縦を抑える
			$oy = $h;
			$ox = ($oy * $this->source_width) / $this->source_height; // サイズ変更後の横サイズ
		}
		elseif ($this->source_height < $this->source_width) {
			//横を抑える
			$ox = $w;
			$oy = ($ox * $this->source_height) / $this->source_width; // サイズ変更後の縦サイズ
		}
		return array($ox, $oy);
	}
}

