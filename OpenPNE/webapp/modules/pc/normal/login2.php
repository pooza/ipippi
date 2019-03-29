<?php
function normalAction_login2($smarty,$requests)
{
	
	// --- リクエスト変数
	$sid = $requests['sid'];
	// ----------
			
	$smarty->assign("sid", $sid);

	//---- inc_ テンプレート用 変数 ----//
	$smarty->assign('inc_page_header',fetch_inc_page_header("public") );
	
	$c_pc_address_pre = do_common_c_pc_address_pre4sid($sid);
	if($c_pc_address_pre){
		$smarty->assign("username", $c_pc_address_pre['pc_address']);
		$smarty->assign("pc_address", $c_pc_address_pre['pc_address']);
		$smarty->ext_display("login2.tpl");
	}else{
	    $msg = "URLが無効です";
	    client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
	    exit;
	}
}
?>