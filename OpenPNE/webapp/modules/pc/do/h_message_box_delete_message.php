<?php
//---------------------------------------------------------------------------
/**
��å���������

[����]
target_c_message_id

[������쥯��]
h_message_box

[������쥯�Ȱ���]

[����]
��å�����������
��å�����������

*/
//shou050617
//���٤�ʣ����������褦�˽���
//����Ȣ�����ư�Ǥ���褦�˽���
//shou050624
//����Ȣ���鴰����������褦�˽���
function doAction_h_message_box_delete_message($request) {
	$u = $GLOBALS['AUTH']->uid();

	// --- �ꥯ�������ѿ�
	$c_message_id = $request['c_message_id'];
	$box = $request['box'];
	// ----------

	//--- ���¥����å�
	//TODO: if / foreach��������äƤ���
	//---

	//��������å����������򤷤Ƥʤ�
	if( count($c_message_id) == 0 ){
		client_redirect("page.php?p=h_message_box&box=$box");
		exit;
	}

	//������¸������
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

	//����Ȣ����
	elseif ($box == "trash") {
		
		//����Ȣ�����ư
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
		
		//����Ȣ���鴰�������������ˡ�ʤ�
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
	
	// ��å������򤴤�Ȣ�ذ�ư
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
?>
