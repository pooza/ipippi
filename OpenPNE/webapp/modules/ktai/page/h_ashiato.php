<?php
function pageAction_h_ashiato($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];

	// あしあとリスト
	$smarty->assign("c_ashiato_list", p_h_ashiato_c_ashiato_list4c_member_id($u, 20));

	$smarty->ext_display("h_ashiato.tpl");
}

?>