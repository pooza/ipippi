<?php

require_once(DOCUMENT_ROOT . '/lib/smarty/Smarty.class.php');

class TejimayaSmarty extends Smarty
{
	var $t_template;
	var $t_cache_id;
	var $t_compile_id;

	var $t_framework;

	function __construct($configs=array())
	{
		parent::__construct();

		// 設定値をセット
		foreach ($configs as $key => $value) {
			if (isset($this->$key)) {
				$this->$key = $value;
			}
		}

		$this->t_framework = $GLOBALS['__Framework'];
		$this->error_reporting = E_ALL ^ E_NOTICE;
	}

	// extディレクトリ対応 呼び出し識別子 (pc/ktai)
	function ext_set_call_type($type = '')
	{
		$this->t_framework['call_type'] = $type;
	}

	// extディレクトリ対応 SMARTY->display() ラッパー
	function ext_display($resource_name, $cache_id = null, $compile_id = null)
	{
		$this->ext_fetch($resource_name, $cache_id, $compile_id, true);
	}

	function ext_fetch($resource_name, $cache_id = null, $compile_id = null, $display = false)
	{
		if (!is_string($resource_name)) {
			$this->trigger_error("ext_display: invalid template_file parameter");
			return;
		}
		if ($this->t_framework && $this->t_framework['call_type']) {
			$type = $this->t_framework['call_type'];
			$place = '';

			// 拡張ファイルチェック
			$tpl = 'file:' . $this->t_framework['modules_dir'] . "/{$type}/ext/templates/" . $resource_name;
			$place = 'ext';
			if (!$this->template_exists($tpl)) { // extディレクトリにテンプレートがあるか
				$tpl = 'file:' . $this->t_framework['modules_dir'] . "/{$type}/templates/" . $resource_name;
				$place = 'dft';
				if (!$this->template_exists($tpl)) { // 標準ディレクトリにテンプレートがあるか
					return False;
				}
			}
		} else {
			$tpl = $resource_name;
		}
		$cache_id = $compile_id = $type .'_'. $place;
		return $this->fetch($tpl, $cache_id, $compile_id, $display);
	}
}


