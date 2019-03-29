<?php


//---------------------------------------------------------------------------
function pageAction_h_bookmark_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$direc = $requests['direc'];
		$page = $requests['page'];
		// ----------

		$page_size = 20;
		$page += $direc;

		$smarty->assign('inc_navi',fetch_inc_navi("h"));
		$list = p_h_bookmark_list($u,$page,$page_size);
		$smarty->assign('c_members',$list[0]);
		$smarty->assign("is_prev", $list[1]);
		$smarty->assign("is_next", $list[2]);
		$smarty->assign('c_members_num',$list[3]);
		$smarty->assign("page", $page);
		$pager_index = array(
			'displaying_first' => ($page - 1) * $page_size + 1,
			'displaying_last' => ($page - 1) * $page_size + count($list[0]),
		);
		$smarty->assign("pager_index", $pager_index);


		$smarty->ext_display("h_bookmark_list.tpl");
}

