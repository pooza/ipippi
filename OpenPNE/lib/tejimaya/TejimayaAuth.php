<?php

require_once(DOCUMENT_ROOT . "/lib/pear/Auth.php");


class TejimayaAuth extends Auth
{
	var $_uid; // c_member_id
	var $is_encrypt_username = false;

	function TejimayaAuth($is_encrypt_username = false, $expire = 0, $idle = 0)
	{
		$this->is_encrypt_username = $is_encrypt_username;
		
		$params = array(
			"dsn"	=> $GLOBALS['__OpenPNE']['DSN'],
			"table"	=> AUTH_TABLE,
			"usernamecol"	=> AUTH_USERNAMECOL,
			"passwordcol"	=> AUTH_PASSWORDCOL,
			"cryptType"	=> "md5"
			);
		$this->Auth("DB", $params, '', false);
		
		if ($expire) $this->setExpire($expire);
		if ($idle) $this->setIdle($idle);
	}
	
	/**
	 * username ��Ź沽����Τ��б�
	 */
    function assignData()
    {
        $post = &$this->_importGlobalVariable('post');

        if (isset($post['username']) && $post['username'] != '') {
            $this->username = (get_magic_quotes_gpc() == 1 ? stripslashes($post['username']) : $post['username']);
            if ($this->is_encrypt_username) {
            	$this->username = t_encrypt($this->username);
            }
        }

        if (isset($post['password']) && $post['password'] != '') {
            $this->password = (get_magic_quotes_gpc() == 1 ? stripslashes($post['password']) : $post['password'] );
        }
    }

	/**
	 * ���å�������κ��
	 */
	function t_logout()
	{
		// ���å�����ѿ������Ʋ������
		$_SESSION = array();
		
		// ���å��������Ǥ���ˤϥ��å���󥯥å����������롣
		// Note: ���å�����������Ǥʤ����å������˲����롣
		if (isset($_COOKIE[session_name()])) {
		    setcookie(session_name(), '', time()-42000);
		}
		
		// �ǽ�Ū�ˡ����å������˲�����
		session_destroy();
		$this->logout();
	}

	// c_member_id ����/���Ф�
	function uid($uid = '')
	{
		if ($uid) {
			$this->_uid = $uid;
		}
		return $this->_uid;
	}
}

?>