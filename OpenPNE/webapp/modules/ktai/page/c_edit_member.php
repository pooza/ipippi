<?php
function pageAction_c_edit_member($smarty, $requests)
{
	$u  = $GLOBALS['KTAI_C_MEMBER_ID'];
    
	// --- リクエスト変数
	$target_c_commu_id = $requests['target_c_commu_id'];
	$direc = $requests['direc'];
	$page = $requests['page'];
	// ----------

    $c_commu = _db_c_commu4c_commu_id($target_c_commu_id);

	//--- 権限チェック
    if ($c_commu['c_member_id_admin'] != $u) {
		handle_kengen_error();
        // 管理者以外はだめ
        exit("閲覧権限がありません");
    }
	//---

    $page_size = 20;
    $page += $direc;
    
    //ページ
    $smarty->assign("page", $page);
    
    //メンバのリスト
    $list = k_p_c_member_list_c_members_disp4c_commu_id($target_c_commu_id, $page_size, $page);
    $smarty->assign("c_member_list", $list[0]);
    $smarty->assign("is_prev", $list[1]);
    $smarty->assign("is_next", $list[2]);
    
    //コミュニティのメンバ数
    $smarty->assign("count_member", k_p_c_member_list_c_commu_member_count4c_commu_id($target_c_commu_id));
    
    $smarty->assign("c_commu", $c_commu);
    $smarty->ext_display("c_edit_member.tpl");
}

