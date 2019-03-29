<?php
function normalAction_login($smarty,$requests)
{	
	// --- リクエスト変数
	$msg_id = $requests['msg'];
	$kad = $requests['kad'];
	// ----------

	//メッセージ
	$smarty->assign("msg", k_p_common_msg4msg_id($msg_id));
	
	$smarty->assign('ktai_address', t_decrypt($kad));
	$smarty->assign("SNS_NAME", SNS_NAME);
	$smarty->assign("IS_CLOSED_SNS", IS_CLOSED_SNS);

	$smarty->ext_display('login.tpl');
}

