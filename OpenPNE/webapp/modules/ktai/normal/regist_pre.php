<?php
function normalAction_regist_pre($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
		client_redirect("ktai_normal.php?p=login");
		exit;
	}
    //>
    
	// --- リクエスト変数
	$ses = $requests['ses'];
	// ----------

    // セッションが有効かどうか
    if (!$pre = c_member_ktai_pre4session($ses)) {
        // 無効の場合、login へリダイレクト
        client_redirect("ktai_normal.php?p=login");
        exit;
    }
    
    $smarty->assign("ses", $ses);
    $smarty->assign("SNS_NAME", SNS_NAME);
    $smarty->ext_display('regist_pre.tpl');
}
?>
