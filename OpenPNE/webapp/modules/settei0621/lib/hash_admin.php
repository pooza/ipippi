<?php

class AdminHashTable
{
	var $table;
	
	function AdminHashTable()
	{
		$this->table = $this->_getTable();
	}
	
	function &singleton()
	{
        static $instance;
        if (!isset($instance)) {
        	$instance = new AdminHashTable();
        }
        return $instance;
	}
	
	function action($hash, $type = 'page')
	{
		if (empty($this->table)) return $hash;
		
		if ($action = array_search($hash, $this->table[$type])) {
			return $action;
		} elseif (empty($this->table[$type][$hash])) {
			return $hash;
		}
		return '';
	}
	
	function hash($action, $type = 'page')
	{
		return !empty($this->table[$type][$action]) ? $this->table[$type][$action] : $action;
	}
	
	function _getTable()
	{
		$sql = "SELECT value FROM c_admin_config" .
			" WHERE name = 'admin_hashtable'";
		if ($v = get_one4db($sql)) {
			return unserialize($v);
		} else {
			return array();
		}
	}
	
	function updateTable()
	{
		$this->table = $this->_createRandomTable();
		
		if ($this->_getTable()) {
			$sql = "UPDATE c_admin_config SET value = " . quote4db(serialize($this->table)) .
				" WHERE name = 'admin_hashtable'";
			_mysql_query4db($sql);
		} else {
			$sql = "INSERT INTO c_admin_config (name, value)" .
				" VALUES ('admin_hashtable', ".quote4db(serialize($this->table)).")";
			_mysql_query4db($sql);
		}
	}
	
	function deleteTable()
	{
		$sql = "DELETE FROM c_admin_config WHERE name = 'admin_hashtable'";
		_mysql_query4db($sql);
		
		$this->table = array();
	}
	
	function _createRandomTable()
	{
		$table = array();
		foreach ($this->_actionList() as $type => $lst) {
			foreach ($lst as $action) {
				$table[$type][$action] = $this->_createHashString();
			}
		}
		return $table;
	}
	
	function _createHashString($length = 12)
	{
	    list($usec, $sec) = explode(' ', microtime());
	    $seed = (float)$sec + ((float)$usec * 100000);
	    srand($seed);
	
	    $elem = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ012345679";
	    $max = strlen($elem) - 1;
	
	    $hash = "";
	    for ($i = 0; $i < $length; $i++) {
	        $hash .= substr($elem, rand(0, $max), 1);
	    }
	    return $hash;
	}
	
	function &_actionList()
	{
		return 	array(
		'normal' => array(
			'login',
		),
		'page' => array(
			'delete_c_banner_confirm',
			'delete_c_image_confirm',
			'delete_c_member_confirm',
			'delete_c_profile',
			'delete_kakikomi',
			'edit_admin_password',
			'edit_c_admin_config',
			'edit_c_admin_info',
			'edit_c_banner',
			'edit_c_image',
			'edit_c_profile',
			'edit_c_sns_config',
			'edit_category',
			'insert_c_banner',
			'insert_c_profile',
			'list_c_image',
			'list_c_member',
			'passwd',
			'send_invites_confirm',
			'send_invites',
			'send_messages',
			'top',
			'update_c_banner',
			'update_c_profile',
			'update_hash_table',
		),
		'do' => array(
			'delete_c_banner',
			'delete_c_commu_category_parent',
			'delete_c_commu_category',
			'delete_c_image',
			'delete_c_image4c_image_id',
			'delete_c_member',
			'delete_c_profile_option',
			'delete_c_profile',
			'delete_hash_table',
			'delete_kakikomi_c_commu_topic',
			'delete_kakikomi_c_commu',
			'delete_kakikomi_c_diary',
			'edit_c_admin_info',
			'insert_c_banner',
			'insert_c_commu_category_parent',
			'insert_c_commu_category',
			'insert_c_image',
			'insert_c_profile_option',
			'insert_c_profile',
			'logout',
			'passwd',
			'send_invites',
			'send_messages',
			'update_c_admin_config',
			'update_c_admin_user_password',
			'update_c_banner',
			'update_c_commu_category_parent',
			'update_c_commu_category',
			'update_c_image_skin',
			'update_c_profile_option',
			'update_c_profile',
			'update_c_siteadmin_css',
			'update_c_sns_config',
			'update_hash_table',
			'update_side_banner_html',
			'update_top_banner_html',
		),
		);
	}
}


