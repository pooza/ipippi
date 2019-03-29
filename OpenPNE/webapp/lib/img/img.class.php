<?php
class Img
{
	//GET���Ϥ����ѥ�᡼��
	var $src;
	var $dbsrc;
	var $w;
	var $h;
	var $f;

	//�����ǻȤ��ѥ�᡼��
	var $thumbnailQuality = 75;

	var $sourceFilename; //�����Ф�����Ф��٤��ե������̾��

	var $rawImageData; //���β����ΥХ��ʥ�

	var $sourceFormat; //�����Ф�����Ф�������������
	var $outputFormat; //���Ϥ������������

	var $gdimg_source; //���Ф���������GD���᡼��
	var $gdimg_output; //�����Ѥβ�����GD���᡼��

	var $source_width; //���β����Υ�����
	var $source_height;

	var $cache_filename; //�ꥯ�����Ȥ��б����륭��å���ե�����̾
	var $cache_fullpath;
	var $cache_exists = false; //����å��夬¸�ߤ��Ƥ뤫�ɤ���

	

	//config
	var $config_is_debug = null;

	var $config_cache_source_enabled = null;
	var $config_cache_source_directory = null;
	
	var $config_thumbnail_format = null;

	//���󥹥ȥ饯��
	function Img()
	{
	}

	//$vars��Ϣ������ˤ����Ƥ򥪥֥������Ȥ�����
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

	//����������
	function generate_img()
	{
		$this->set_sourceFilename();
		$this->set_outputFormat();
		$this->set_cacheFilename();
		
		/*
			�����ǥ���å���Υ����å�
			����å���ե�����̾�ʥե�ѥ���ˤ⥻�åȤ����
		*/
		if ($this->config_cache_source_enabled && ($this->cache_exists = $this->check_cache())) {
			return true;
		}

		if ($this->src) {
			//TODO �ե�����������������ν���

		}
		elseif ($this->dbsrc) {
			//DB�������
			$this->setRawImageData4db();
			
			//�ꥵ�������������ġ������Ѵ����ʤ���硢�����ǽ�λ�ʣǣĤ��Ѵ�����ɬ�פʤ���
			if ($this->rawImageData && !isset($this->w) && !isset($this->h) && ($this->sourceFormat == $this->outputFormat)) {
				$this->config_cache_source_enabled and $this->create_rawcache();
				return true;
			}

			$this->gdimg_source = imagecreatefromstring($this->rawImageData);
			imageinterlace($this->gdimg_source, 0);

			//���Υ���������
			$this->source_height = imagesy($this->gdimg_source);
			$this->source_width = imagesx($this->gdimg_source);
			//�ꥵ����
			$this->gdimg_output = $this->resize_img($this->h, $this->w);
			
			//�ꥵ�������ʤ��Ƥ�����Ѵ��������GD���̤�
			if ($this->gdimg_output === false && $this->sourceFormat != $this->outputFormat) {
				$this->gdimg_output = $this->gdimg_source;
			}
			
			//����å��������
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

	//DB��������Х��ʥ�����
	function setRawImageData4db()
	{
		@mysql_connect(
				$GLOBALS['__OpenPNE']['DSN']['hostspec'],
				$GLOBALS['__OpenPNE']['DSN']['username'],
				$GLOBALS['__OpenPNE']['DSN']['password'])
			or die('�ǡ����١��������Ф���³�Ǥ��ޤ���Ǥ���');
		@mysql_select_db($GLOBALS['__OpenPNE']['DSN']['database'])
			or die('�ǡ����١��������Ĥ���ޤ���Ǥ���');
		
		$sql = "SELECT filename,bin,type FROM c_image" .
			" WHERE filename = '".mysql_real_escape_string($this->dbsrc)."'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);

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
			//�ꥵ���������ˡ����ġ������Ѵ����ʤ���硢���Ϥ�GD�Ϥδؿ�����Ѥ��ʤ�(�������������Τ�)
			if ($this->rawImageData && !$this->gdimg_output) {
				$this->send_content_type();
				echo $this->rawImageData;
				return true;
			}
			elseif ($this->gdimg_output) {
				//�ꥵ������or �����Ѵ�������ϡ�GD�Ϥδؿ��ǽ���
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

	//GD���᡼���Υꥵ����
	/**
	 * @param $h �ĤΥ�����
	 *        $w ���Υ�����
	 * 
	 * @return resource gdimg
	 */
	function resize_img($h, $w)
	{
		//���������������ƥꥵ������ɬ�פ��ʤ����
		if ((!$h || $this->source_height <= $h) &&
			(!$w || $this->source_width <= $w)) {
			
			return false;
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

		$img = imagecreatetruecolor($ox, $oy);
		imagecopyresampled($img, $this->gdimg_source, 0, 0, 0, 0, $ox, $oy, $this->source_width, $this->source_height);
		return $img;
	}

	//����å��夬�ĤäƤ��뤫�����å�����
	/**
	 * @return boolean
	 */
	function check_cache()
	{
		if (file_exists($this->cache_fullpath)) {
			//����å��夬�ĤäƤ����
			return true;
		} else {
			//�ĤäƤʤ����
			return false;
		}
	}

	//����å�����������
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
			//�ǥ��쥯�ȥ꤫�����������
			$this->sourceFilename = $this->src;
		}
		elseif ($this->dbsrc) {
			//DB�������������
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
			 //����줿f�ˤƽ���
			 $this->outputFormat = $this->checkFormatString($this->f);
		 }
		 elseif ($this->config_thumbnail_format){
			 //����ե����˽���
			 $this->outputFormat = $this->checkFormatString($this->config_thumbnail_format);
		 }
		 else {
			 //�ꥯ������(dbsrc)�˽���
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
?>