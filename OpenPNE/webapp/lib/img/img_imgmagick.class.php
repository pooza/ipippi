<?php
$img_dir = DOCUMENT_ROOT . "/webapp/lib/img/";
require_once($img_dir . 'img.class.php');

class Img_ImgMagick extends Img {
	//����������
	function generate_img() {
		// $this->sourceFilename��$this->sourceFormat������
		$this->set_sourceFilename();
		// $this->outputFormat������
		$this->set_outputFormat();
		// $this->cache_filename��$this->cache_fullpath������
		$this->set_cacheFilename();
		
		/*
			�����ǥ���å���Υ����å�
			����å���ե�����̾�ʥե�ѥ���ˤ⥻�åȤ����
		*/
		if ($this->config_cache_source_enabled && ($this->cache_exists = $this->check_cache() && $this->check_rawcache())) {
			return true;
		}

		if ($this->src) {
			//TODO �ե�����������������ν���

		}
		elseif ($this->dbsrc) {
			// �²�������å��夬���뤫�ɤ��������å�
			if ($this->cache_exists) {
				$this->rawImageData = @readfile($this->get_rawcache_filename());
			} else {
				//DB�������
				if (!$this->setRawImageData4db()) {
					return false;
				}
				// ���������������ö�ե�����˽񤭽Ф�
				$this->create_rawcache();
			}
			
			// �����������μ�����GD���Ѥ���
			$im = @imagecreatefromstring($this->rawImageData);
			$this->source_height = @imagesy($im);
			$this->source_width = @imagesx($im);

			if (!$im || !$this->source_width || !$this->source_height) {
				return false;
			}
			
			//�ꥵ�������������ġ������Ѵ����ʤ���硢�����ǽ�λ���Ѵ�����ɬ�פʤ���
			if ($this->rawImageData && !isset($this->w) && !isset($this->h) && ($this->sourceFormat == $this->outputFormat)) {
				return true;
			} else if ($this->rawImageData && $this->source_width <= $this->w && $this->source_height <= $this->h && $this->sourceFormat == $this->outputFormat) {
				return true;
			}

			// ����ͥ����������������å���Ȥ��ƥե��������¸
			$this->create_cache();
			return true;
		}
	}

	// �²�������å��夬���뤫Ƚ��
	function check_rawcache() {
		return file_exists($this->get_rawcache_filename());
	}

	//���������
	function output_img()
	{
		//����å��夬������
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

		//����å��夬�ʤ����
		if ($this->src) {
			//TODO �ǥ��쥯�ȥ꤫���äƤ�����

		}
		elseif ($this->dbsrc) { //DB����ȤäƤ�����
			//�ꥵ���������ˡ����ġ������Ѵ����ʤ���硢�²����򤽤Τޤ޽���
			if ($this->rawImageData && !isset($this->img_output)) {
				$this->send_content_type();
				echo $this->rawImageData;
				return true;
			}
			elseif ($this->img_output) {
				$this->send_content_type();
				// ����å���򤽤Τޤ޽���
				$file = fopen($this->cache_fullpath, "rb");
				@fpassthru($file);
				fclose($file);
				return true;
			}
		}
		return true;
	}

	// ����ͥ��륭��å�����������
	function create_cache()
	{
		$this->create_cache_subdir();
		
		$convert_command = $this->get_imgmagick_convert_command();
		$this->exec_imgmagick_convert($convert_command);
	}
	
	// �²�������å�����������
	function create_rawcache()
	{
		$raw_fullpath = $this->get_rawcache_filename();
		$this->create_cache_rawdir();
		
		$handle = fopen($raw_fullpath, 'wb');
		fwrite($handle, $this->rawImageData);
		fclose($handle);
	}
	
	// �²�������å���ǥ��쥯�ȥ���������
	function create_cache_rawdir() {
		$subdir = dirname($this->get_rawcache_filename()); 
		if (!is_dir($subdir)) {
			mkdir($subdir);
		}
	}

	// ImageMagick�Υ��ޥ�ɥ饤�����������֤�
	function get_imgmagick_convert_command() {
		list($w, $h) = $this->get_size();

		$opt = (defined('IMGMAGICK_OPT') && IMGMAGICK_OPT) ? IMGMAGICK_OPT : "-resize";
		
		// ǰ�Τ��� escape �򤫤���
		$w = intval($w);
		$h = intval($h);
		$f = escapeshellcmd($this->outputFormat);
		$path = realpath($this->get_rawcache_filename());
		
		return IMGMAGICK_APP." $opt {$w}x{$h} $path {$f}:-";
	}

	// ImageMagick��convert��ư����
	function exec_imgmagick_convert($command) {
		ob_start();
		passthru($command, $returncode);
		$this->img_output = ob_get_contents();
		ob_end_clean();
		$file = fopen($this->cache_fullpath, "wb");
		fwrite($file, $this->img_output);
		fclose($file);
	}

	// �¥����������Ѥ���¸�ե�����̾���֤�
	function get_rawcache_filename() {
		// �ǥ��쥯�ȥ�̾
		// ����å��夬�������뤿��ˤϥѥ������w*_h*�פ�Ŭ�礹��ɬ�פ�����
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

	// �̾���β������������֤�
	function get_size() {
		$w = $this->w;
		$h = $this->h;
		//���������������ƥꥵ������ɬ�פ��ʤ����
		if ((!$h || $this->source_height <= $h) &&
			(!$w || $this->source_width <= $w)) {
			
			return array($this->source_width, $this->source_height);
		}

		//�ꥵ������ɬ�פ���
		if ($this->source_height >= $this->source_width) {
			//�Ĥ��ޤ���
			$oy = $h;
			$ox = ($oy * $this->source_width) / $this->source_height; // �������ѹ���β�������
		}
		elseif ($this->source_height < $this->source_width) {
			//�����ޤ���
			$ox = $w;
			$oy = ($ox * $this->source_height) / $this->source_width; // �������ѹ���νĥ�����
		}
		return array($ox, $oy);
	}
}
?>
