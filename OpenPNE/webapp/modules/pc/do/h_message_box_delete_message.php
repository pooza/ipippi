<?php
//---------------------------------------------------------------------------
/**
メッセージを削除

[引数]
target_c_message_id

[リダイレクト]
h_message_box

[リダイレクト引数]

[権限]
メッセージ送信者
メッセージ受信者

*/
//shou050617
//一度に複数削除出来るように修正
//ごみ箱から移動できるように修正
//shou050624
//ごみ箱から完全削除出来るように修正
function doAction_h_message_box_delete_message($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$c_message_id = $request['c_message_id'];
	$box = $request['box'];
	// ----------

	//--- 権限チェック
	//TODO: if / foreachの中に入っている
	//---

	//削除するメッセージを選択してない
	if( count($c_message_id) == 0 ){
		client_redirect("page.php?p=h_message_box&box=$box");
		exit;
	}

	//下書き保存から削除
	if($box == "savebox"){
		foreach( $c_message_id as $val ){
		    $c_message = _db_c_message4c_message_id($val);
		    if ($c_message['c_member_id_from'] != $u
		        && $c_message['c_member_id_to'] != $u) {
		        handle_kengen_error();
		    }
			do_h_message_box_delete_save_message($val, $u);
		}
		client_redirect("page.php?p=h_message_box&box=$box");
		exit;
	}

	//ごみ箱から
	elseif ($box == "trash") {
		
		//ごみ箱から移動
		if (!empty($request['move']) ){
			foreach($c_message_id as $val){
			    $c_message = _db_c_message4c_message_id($val);
			    if ($c_message['c_member_id_from'] != $u
			        && $c_message['c_member_id_to'] != $u) {
			        handle_kengen_error();
			    }
				do_h_message_box_move_message($val, $u);
			}
			client_redirect("page.php?p=h_message_box&box=$box");
			exit;
		}
		
		//ごみ箱から完全削除　復元方法なし
		else {
			foreach ($c_message_id as $val) {
			    $c_message = _db_c_message4c_message_id($val);
			    if ($c_message['c_member_id_from'] == $u) {
			    	do_delete_c_message_from_trash($val);
			    }
			    elseif ($c_message['c_member_id_to'] == $u) {
			    	do_delete_c_message_to_trash($val);
			    }
			    else {
			        handle_kengen_error();
			    }
			}
			client_redirect("page.php?p=h_message_box&box=$box");
			exit;
		}
	}
	
	// メッセージをごみ箱へ移動
	else {
		foreach ($c_message_id as $val) {
		    $c_message = _db_c_message4c_message_id($val);
		    if ($c_message['c_member_id_from'] != $u
		        && $c_message['c_member_id_to'] != $u) {
		        handle_kengen_error();
		    }
			do_h_message_box_delete_message($val, $u);
		}
	}

	client_redirect("page.php?p=h_message_box&box=$box");
}

