<?php

require_once(DOCUMENT_ROOT . "/lib/pear/Auth.php");

class TejimayaAuth extends Auth
{
	var $_uid; // c_member_id
	var $is_encrypt_username = false;

	function TejimayaAuth($is_encrypt_username = false, $expire = 0, $idle = 0)
	{
		$this->is_encrypt_username = $is_encrypt_username;

		$params = [
			"dsn"	=> $GLOBALS['__OpenPNE']['DSN'],
			"table"	=> AUTH_TABLE,
			"usernamecol"	=> AUTH_USERNAMECOL,
			"passwordcol"	=> AUTH_PASSWORDCOL,
			"cryptType"	=> "password_hash",
		];
		$r = $this->Auth("DB", $params, '', false);

		if ($expire) $this->setExpire($expire);
		if ($idle) $this->setIdle($idle);
	}

	/**
	 * username も暗号化するのに対応
	 */
	function assignData()
	{
		$post = &$this->_importGlobalVariable('post');

		if (isset($post['username']) && $post['username'] != '') {
			$this->username = $post['username'];
			if ($this->is_encrypt_username) {
				$this->username = t_encrypt($this->username);
			}
		}

		if (isset($post['password']) && $post['password'] != '') {
			$this->password = $post['password'];
		}
	}

	/**
	 * セッション情報の削除
	 */
	function t_logout()
	{
		// セッション変数を全て解除する
		$_SESSION = array();

		// セッションを切断するにはセッションクッキーも削除する。
		// Note: セッション情報だけでなくセッションを破壊する。
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000);
		}

		// 最終的に、セッションを破壊する
		session_destroy();
		$this->logout();
	}

	// c_member_id 設定/取り出し
	function uid($uid = '')
	{
		if ($uid) {
			$this->_uid = $uid;
		}
		return $this->_uid;
	}
}

