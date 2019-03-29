<?php

//---------------------------------------------------------------------------
function pageAction_fh_friend_list($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- リクエスト変数
		$target_c_member_id = $requests['target_c_member_id'];
		$direc = $requests['direc'];
		$page = $requests['page'];
		$order = $requests['order'];
		// ----------

		if (is_null($target_c_member_id)) {
			$target_c_member_id = $u;
		}

		if(p_common_is_access_block($u, $target_c_member_id)){
			client_redirect("page.php?p=h_access_block");
			exit;
		}

		// navi 振り分け用
		if($target_c_member_id == $u) {
			$type = "h";
		} else {
			$type = "f";
		}
		$smarty->assign('inc_navi',fetch_inc_navi($type, $target_c_member_id));
		$smarty->assign("type", $type);

		//----------PC CONTENT#LEFT
		//ユーザ情報
		$smarty->assign("member", db_common_c_member4c_member_id($u));

		//ターゲット情報
		$smarty->assign("target_member", db_common_c_member4c_member_id($target_c_member_id));

		//ターゲットの友達数
		$friend_num = p_fh_friend_list_friend_num4c_member_id($target_c_member_id);

		$smarty->assign("target_friend_num", $friend_num);

		//----------PC CONTENT#CENTER

		// 1ページ当たりに表示するフレンドの数
		$page_size = 50;
		$page += $direc;

		//ターゲットの詳細な友達リスト
		$list = p_fh_friend_list_friend_list4c_member_id2($target_c_member_id,$page_size,$page,$order);
		$smarty->assign("order", $order);

		$smarty->assign("target_friend_list_disp", $list[0]);
		$smarty->assign("page",$page);
		$smarty->assign("is_prev",$list[1]);
		$smarty->assign("is_next",$list[2]);

		$smarty->assign("start_num",($page-1)*$page_size+1);

		if(($page)*$page_size < $friend_num)$end_num=($page)*$page_size;
		else{$end_num=$friend_num;}
		$smarty->assign("end_num",$end_num);

		for($i=1;$i<=$list[3];$i++){
			$page_num[]=$i;
		}
		$smarty->assign("page_num",$page_num);

	//あしあとをつける
	if ($target_c_member_id != $u) {
		p_etc_do_ashiato($target_c_member_id, $u);
	}

		//---- ページ表示 ----//
		$smarty->ext_display("fh_friend_list.tpl");
}

