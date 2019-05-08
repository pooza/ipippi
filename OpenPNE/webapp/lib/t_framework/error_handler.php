<?php

function page_handleError($p, $errors)
{
	switch ($p) {
	case "c_topic_add_confirm":
		$_REQUEST['err_msg'] = $errors;
		module_execute('pc', 'page', "c_topic_add", $errors);
		break;
	case "c_topic_write_confirm":
		$_REQUEST['err_msg'] = $errors;
		module_execute('pc', 'page', "c_topic_detail");
		break;
	case "f_message_send_confirm":
		$_REQUEST['msg1'] = $errors['subject'];
		$_REQUEST['msg2'] = $errors['body'];
		module_execute('pc', 'page', "f_message_send", $errors);
		break;
	case "h_com_add_confirm":
		$_REQUEST['err_msg'] = $errors;
		module_execute('pc', 'page', "h_com_add");
		break;
	case "h_config_prof_confirm":
		$_REQUEST['msg'] = array_shift($errors);
		module_execute('pc', 'page', "h_config_prof", $errors);
		exit;
	case "h_diary_add_confirm":
		$_REQUEST['msg1'] = $errors['subject'];
		$_REQUEST['msg2'] = $errors['body'];
		module_execute('pc', 'page', "h_diary_add", $errors);
		break;
	case "h_diary_edit_confirm":
		$_REQUEST['msg'] = array_shift($errors);
		module_execute('pc', 'page', "h_diary_edit", $errors);
		break;
	case "fh_diary_comment_confirm":
		$_REQUEST['msg'] = array_shift($errors);
		module_execute('pc', 'page', "fh_diary", $errors);
		break;
	default:
		p($errors);
		echo "表示できません ";
		break;
	}
	exit;
}

