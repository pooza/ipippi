<?php
class Img
{
	//GETで渡されるパラメータ
	var $src;
	var $dbsrc;
	var $w;
	var $h;
	var $f;

	//内部で使うパラメータ
	var $thumbnailQuality = 75;

	var $sourceFilename; //サーバから取り出すべきファイルの名前

	var $rawImageData; //その画像のバイナリ

	var $sourceFormat; //サーバから取り出した画像タイプ
	var $outputFormat; //出力する画像タイプ

	var $gdimg_source; //取り出した画像のGDイメージ
	var $gdimg_output; //出力用の画像のGDイメージ

	var $source_width; //元の画像のサイズ
	var $source_height;

	var $cache_filename; //リクエストに対応するキャッシュファイル名
	var $cache_fullpath;
	var $cache_exists = false; //キャッシュが存在してるかどうか

	//config
	var $config_is_debug = null;

	var $config_cache_source_enabled = null;
	var $config_cache_source_directory = null;

	var $config_thumbnail_format = null;

	//コンストラクタ
	function Img()
	{
	}

	//$vars（連想配列）の内容をオブジェクトに代入
	function set_vars($vars)
	{
		foreach ($vars as $keyname => $value) {
			$this->$keyname = $value;
		}
	}

	function set_safe_vars($vars)
	{
		foreach ($vars as $keyname => $value) {
			switch ($keyname) {
			case 'w':
			case 'h':
				if (is_numeric($value)) {
					$this->$keyname = intval($value);
				}
				break;
			case 'f':
				$allowed_format = array('jpg','jpeg','gif','png');
				if (in_array($value, $allowed_format)) {
					$this->$keyname = $value;
				}
				break;
			case 'dbsrc':
			case 'filename':
				if (!preg_match('/[^\.\w]/', $value)) {
					$this->dbsrc = $value;
				}
				break;
			}
		}
	}

	//画像を生成
	function generate_img()
	{
		$this->set_sourceFilename();
		$this->set_outputFormat();
		$this->set_cacheFilename();

		/*
			ここでキャッシュのチェック
			キャッシュファイル名（フルパスも）もセットされる
		*/
		if ($this->config_cache_source_enabled && ($this->cache_exists = $this->check_cache())) {
			return true;
		}

		if ($this->src) {
			//TODO フォルダから取得する場合の処理

		}
		elseif ($this->dbsrc) {
			//DBから取得
			$this->setRawImageData4db();

			//リサイズせず、かつ、形式変換しない場合、ここで終了（ＧＤに変換する必要なし）
			if ($this->rawImageData && !isset($this->w) && !isset($this->h) && ($this->sourceFormat == $this->outputFormat)) {
				$this->config_cache_source_enabled and $this->create_rawcache();
				return true;
			}

			$this->gdimg_source = imagecreatefromstring($this->rawImageData);
			imageinterlace($this->gdimg_source, 0);

			//元のサイズ取得
			$this->source_height = imagesy($this->gdimg_source);
			$this->source_width = imagesx($this->gdimg_source);
			//リサイズ
			$this->gdimg_output = $this->resize_img($this->h, $this->w);

			//リサイズしなくても形式変換する場合はGDを通す
			if ($this->gdimg_output === false && $this->sourceFormat != $this->outputFormat) {
				$this->gdimg_output = $this->gdimg_source;
			}

			//キャッシュを生成
			if ($this->config_cache_source_enabled) {
				if ($this->gdimg_output === false) {
					$this->create_rawcache();
				} else {
					$this->create_cache();
				}
			}

			return true;
		}
	}

	//DBから画像バイナリを取得
	function setRawImageData4db()
	{
		$db = @mysqli_connect(
			$GLOBALS['__OpenPNE']['DSN']['hostspec'],
			$GLOBALS['__OpenPNE']['DSN']['username'],
			$GLOBALS['__OpenPNE']['DSN']['password'],
			$GLOBALS['__OpenPNE']['DSN']['database']
		) or die('データベースサーバに接続できませんでした');

		$sql = "SELECT filename,bin,type FROM c_image" .
			" WHERE filename = '".mysqli_real_escape_string($this->dbsrc)."'";
		$result = mysqli_stmt_execute($db, $sql);
		$row = mysqli_fetch_array($result);

		if ($row) {
			$this->rawImageData = base64_decode($row['bin']);

			/*
			if ( !$this->sourceFormat && $row['type']){
				$this->sourceFormat = $type['type'];
				if(!$this->outputFormat){
					$this->outputFormat = $this->sourceFormat;
				}
			}
			*/

			return true;
		} else {
			return false;
		}
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
			//リサイズせずに、かつ、形式変換しない場合、出力にGD系の関数を使用しない(画質が劣化するので)
			if ($this->rawImageData && !$this->gdimg_output) {
				$this->send_content_type();
				echo $this->rawImageData;
				return true;
			}
			elseif ($this->gdimg_output) {
				//リサイズ　or 形式変換する場合は、GD系の関数で出力
				$this->send_content_type();
				switch ($this->outputFormat) {
				case "jpeg":
				case "jpg":
				default:
					imagejpeg($this->gdimg_output);
					break;
				case "gif":
					imagegif($this->gdimg_output);
					break;
				case "png":
					imagepng($this->gdimg_output);
					break;
				}
				return true;
			}
		}
		return true;
	}

	//GDイメージのリサイズ
	/**
	 * @param $h 縦のサイズ
	 *        $w 横のサイズ
	 *
	 * @return resource gdimg
	 */
	function resize_img($h, $w)
	{
		//元画像が小さくてリサイズの必要がない場合
		if ((!$h || $this->source_height <= $h) &&
			(!$w || $this->source_width <= $w)) {

			return false;
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

		$img = imagecreatetruecolor($ox, $oy);
		imagecopyresampled($img, $this->gdimg_source, 0, 0, 0, 0, $ox, $oy, $this->source_width, $this->source_height);
		return $img;
	}

	//キャッシュが残っているかチェックする
	/**
	 * @return boolean
	 */
	function check_cache()
	{
		if (file_exists($this->cache_fullpath)) {
			//キャッシュが残っていれば
			return true;
		} else {
			//残ってなければ
			return false;
		}
	}

	//キャッシュを作成する
	function create_cache()
	{
		$this->create_cache_subdir();

		switch ($this->outputFormat) {
		case "jpeg":
		case "jpg":
		default:
			imagejpeg($this->gdimg_output, $this->cache_fullpath);
			break;
		case "gif":
			imagegif($this->gdimg_output, $this->cache_fullpath);
			break;
		case "png":
			imagepng($this->gdimg_output, $this->cache_fullpath);
			break;
		}
	}

	function create_rawcache()
	{
		$this->create_cache_subdir();

		$handle = @fopen($this->cache_fullpath, 'wb');
		@fwrite($handle, $this->rawImageData);
		@fclose($handle);
	}

	function create_cache_subdir()
	{
		$subdir = dirname($this->cache_fullpath);
		if (!is_dir($subdir)) {
			mkdir($subdir);
		}
	}

	/**
	 * send "Content-Type" header
	 *
	 * @access private
	 */
	function send_content_type()
	{
		switch ($this->outputFormat) {
		case 'jpeg':
		case 'jpg':
		default:
			header('Content-type: image/jpeg');
			break;
		case 'gif':
			header('Content-type: image/gif');
			break;
		case 'png':
			header('Content-type: image/png');
			break;
		}
	}

	/**
	 *
	 */
	function set_sourceFilename(){
		if ($this->src) {
			//ディレクトリから取得する場合
			$this->sourceFilename = $this->src;
		}
		elseif ($this->dbsrc) {
			//DBから取得する場合
			$this->sourceFilename = $this->dbsrc;
		}

		$pieces = explode('.', $this->sourceFilename);
		$this->sourceFormat = $this->checkFormatString(array_pop($pieces));
	}

	/**
	 *
	 */
	 function set_outputFormat(){
		 if($this->f){
			 //送られたfにて出力
			 $this->outputFormat = $this->checkFormatString($this->f);
		 }
		 elseif ($this->config_thumbnail_format){
			 //コンフィグに従う
			 $this->outputFormat = $this->checkFormatString($this->config_thumbnail_format);
		 }
		 else {
			 //リクエスト(dbsrc)に従う
			 $this->outputFormat = $this->checkFormatString($this->sourceFormat);
		 }
	 }

	 function set_cacheFilename()
	 {
		if (!isset ($this->w) && !isset ($this->h)) {
			$size = "w_h";
		} else {
			$size = "w".$this->w."_h".$this->h;
		}

	 	// ex.) img_cache_m_11_1115813647
	 	$this->cache_filename = 'img_cache_' .
	 		str_replace('.', '_', $this->sourceFilename) .
			'.' . $this->outputFormat;

	 	// ex.) /var/img_cache/jpg/w180_h180/{filename}
	 	$this->cache_fullpath =
	 		$this->config_cache_source_directory .
	 		$this->outputFormat . '/' .
	 		$size . '/' .
	 		$this->cache_filename;
	 }

	 function checkFormatString($string)
	 {
	 	switch (strtolower($string)) {
		case "jpg":
		case "jpeg":
		default:
			$format = 'jpg';
			break;
		case "gif":
			$format = 'gif';
			break;
		case "png":
			$format = 'png';
			break;
		}

		return $format;
	 }
}
