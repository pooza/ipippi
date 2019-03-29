<?php

function normalAction_login2($smarty,$requests)
{
	// --- リクエスト変数
	$ses = $requests['ses'];
	$c_member_id = intval($requests['id']);
	// ----------

	// セッションが有効かどうか
	if (!$pre = c_ktai_address_pre4session($ses)) {
		// 無効の場合、login へリダイレクト
		$c_member_secure = db_common_c_member_secure4c_member_id($c_member_id);
		client_redirect("ktai_normal.php?p=login&kad=".urlencode(t_encrypt($c_member_secure['ktai_address'])));
		exit;
	}

	$smarty->assign('ses', $ses);
	$smarty->assign('pre', $pre);
	$smarty->ext_display('login2.tpl');
}

