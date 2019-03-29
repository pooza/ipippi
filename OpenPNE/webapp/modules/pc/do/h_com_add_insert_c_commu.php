<?php
//---------------------------------------------------------------------------
/**
コミュニティ作成

[引数]
name
c_commu_category_id
info
public_flag

[リダイレクト]
c_home

[リダイレクト引数]
target_c_commu_id

[権限]
全ユーザー

*/
function doAction_h_com_add_insert_c_commu($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$name = $request['name'];
	$c_commu_category_id = $request['c_commu_category_id'];
	$info = $request['info'];
	$public_flag = $request['public_flag'];
	$tmpfile = $request['tmpfile'];
	// ----------

	//--- 権限チェック
	//TODO:公式カテゴリはダメとか？

	//---

	$c_member_id = $u;

	$filename="";
	if($tmpfile){
		 $filename = image_insert_c_image4tmp("c_".$c_commu_category_id, $tmpfile);
	}
	t_image_clear_tmp(session_id());

	$c_commu_id = do_h_com_add_insert_c_commu($c_member_id,$name,$c_commu_category_id,$info,$public_flag, $filename);

	//作成者をコミュメンバーにする。
	do_inc_join_c_commu($c_commu_id,$c_member_id);

	client_redirect('page.php?p=c_home&target_c_commu_id='.$c_commu_id);

}

