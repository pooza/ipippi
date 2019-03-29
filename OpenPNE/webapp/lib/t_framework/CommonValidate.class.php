<?php
/**
 * commonValidate
 *
 * 共通iniファイルの読み込みを省略化するためのサブクラス
 */
class CommonValidate extends Validator
{

/**
 * common_validate
 *
 * - 共通のiniファイル(validate/common/*.ini)の読み込み,
 * - $resultの取得,
 * - $requestの取得,
 *  をまとめて行う。
 *
 * @access public
 * @param array *.ini file names. full path. array('/hogehoge/example.ini',,,)
 * @return array(boolean,array(name=>value, name=>value,,,))
 */
	function common_validate($ini_files = array())
	{
		// 全アクション共通のiniファイル
		$v_dir = DOCUMENT_ROOT . "/webapp/validate/";
		$common_ini_files = array();
		$common_ini_files[] = $v_dir . "msg.ini"; // エラーメッセージ系
		$common_ini_files[] = $v_dir . "sessid.ini"; // はまちちゃん対策セッションID
		foreach ($common_ini_files as $ini) {
			$this->addIniSetting($ini);
		}

		// 任意のiniファイル
		foreach ($ini_files as $ini) {
			$this->addIniSetting($ini);
		}

		// 値チェック実行
		$result = $this->validate();
		$requests = $this->getParams();

		return array($result, $requests);
	}
}

