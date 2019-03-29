<?php
// SNS設定変更


function doAction_update_c_admin_config($requests)
{
	man_init_admin_do();
	
	$allowed_names = array(
		'SNS_NAME', 'ADMIN_EMAIL', 'AMAZON_AFFID',
		'CATCH_COPY', 'OPERATION_COMPANY', 'COPYRIGHT',
		'IS_CLOSED_SNS', 'OPENPNE_ENABLE_PC', 'OPENPNE_ENABLE_KTAI',
		'OPENPNE_REGIST_FROM',
		'LOGIN_URL_PC', 'DISPLAY_SCHEDULE_HOME', 'DAILY_NEWS_DAY',
		'WORD_FRIEND','WORD_MY_FRIEND',
		'WORD_FRIEND_HALF','WORD_MY_FRIEND_HALF',
	);
	
	foreach ($requests as $name => $value) {
		if (!in_array($name, $allowed_names)) continue;
		
		// 配列の場合はカンマ区切りに
		if (is_array($value)) {
			$value = implode(',', $value);
		}
		
		if (is_null(db_admin_c_admin_config4name($name))) {
			db_admin_insert_c_admin_config($name, $value);
		} else {
			db_admin_update_c_admin_config($name, $value);
		}
	}
	
	admin_client_redirect('edit_c_admin_config', "設定を変更しました");
}

?>
