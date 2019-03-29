<?php
function doNormalAction_insert_c_member($requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
		client_redirect("ktai_normal.php?p=login");
		exit;
	}
    //>
    
	// --- �ꥯ�������ѿ�
	$ses = $requests['ses'];
	// ----------
	
	//--- ���¥����å�
	//���å����ͭ��

    // ���å����ͭ�����ɤ���
    if (!$pre = c_member_ktai_pre4session($ses)) {
        // ̵���ξ�硢login �إ�����쥯��
        client_redirect("ktai_normal.php?p=login");
        exit;
    }
	//---
	
	$errors = array();
	
	$validator = new Validator();
	$validator->addRequests($_REQUEST);
	$validator->addRules(_getValidateRules());
	if (!$validator->validate()) {
		$errors = $validator->getErrors();
	}
	
	$profs = $validator->getParams();

	//--- c_profile �ι��ܤ�����å�
	$validator = new Validator();
	$validator->addRequests($_REQUEST['profile']);
	$validator->addRules(_getValidateRulesProfile());
	if (!$validator->validate()) {
		$errors = array_merge($errors, $validator->getErrors());
	}
	
	// �ͤ�������������å�(DB)
	$c_member_profile_list = do_config_prof_check_profile($validator->getParams(), $_REQUEST['public_flag']);

	// ɬ�ܹ��ܥ����å�
	$profile_list = db_common_c_profile_list4null();
	foreach ($profile_list as $profile) {
		if ($profile['disp_regist'] &&
			$profile['is_required'] &&
			!$c_member_profile_list[$profile['name']]['value'])
		{
			$errors[$profile['name']] = "{$profile['caption']}�����Ϥ��Ƥ�������";
			break;
		}
	}

    // ���ϥ��顼
    if ($errors) {
        $smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
        $smarty->ext_set_call_type('ktai');
        $smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
        $smarty->assign('errors', $errors);
        $smarty->ext_display('error_input.tpl');
        exit;
    }
    
    // insert c_member
    $profs['ktai_address'] = $pre['ktai_address'];
    $profs['c_member_id_invite'] = $pre['c_member_id_invite'];
    
    switch ($profs['public_flag_birth_year']) {
    case "public":
    default:
    	$profs['public_flag_birth_year'] = "public";
    	break;
    case "friend":
    	$profs['public_flag_birth_year'] = "friend";
    	break;
    case "private":
    	$profs['public_flag_birth_year'] = "private";
    	break;
    }
    
    if (!$c_member_id = k_do_insert_c_member($profs)) {
        client_redirect("ktai_normal.php?p=login");
        exit;
    }
    // insert c_member_profile
    do_config_prof_update_c_member_profile($c_member_id, $c_member_profile_list);
    
    // insert c_friend(�Ҳ��)
    do_common_link_friend($c_member_id, $pre['c_member_id_invite']);
    
    // delete c_member_ktai_pre
    k_do_delete_c_member_ktai_pre($pre['c_member_ktai_pre_id']);
    

	do_insert_c_member_mail_send($c_member_id, $profs['password'], $pre['ktai_address']);

    client_redirect("ktai_normal.php?p=regist_end");
    exit;
}

function _getValidateRules()
{
	return array(
		'nickname' => array(
			'type' => 'string',
			'required' => '1',
			'caption' => '�˥å��͡���',
			'max' => '40',
		),
		'birth_year' => array(
			'type' => 'int',
			'required' => '1',
			'caption' => '���ޤ줿ǯ',
			'min' => '1901',
			'max' => date('Y'),
		),
		'birth_month' => array(
			'type' => 'int',
			'required' => '1',
			'caption' => '������',
			'min' => '1',
			'max' => '12',
		),
		'birth_day' => array(
			'type' => 'int',
			'required' => '1',
			'caption' => '������',
			'min' => '1',
			'max' => '31',
		),
		'public_flag_birth_year' => array(
			'type' => 'string',
		),
		'password' => array(
			'type' => 'regexp',
			'regexp' => '/[a-z0-9]+/i',
			'required' => '1',
			'caption' => '�ѥ����',
			'min' => '6',
			'max' => '12',
		),
		'c_password_query_id' => array(
			'type' => 'int',
			'required' => '1',
			'caption' => '��̩�μ���',
			'required_error' => '��̩�μ�������򤷤Ƥ���������',
		),
		'password_query_answer' => array(
			'type' => 'string',
			'required' => '1',
			'caption' => '��̩�μ��������', 
		),
	);
}

function _getValidateRulesProfile()
{
	$rules = array();
	
	$profile_list = db_common_c_profile_list4null();
	foreach ($profile_list as $profile) {
		if ($profile['disp_regist']) {
			$rule = array(
				'type' => 'int',
				'required' => $profile['is_required'],
				'caption' => $profile['caption'],
			);
			
			switch ($profile['form_type']) {
			case 'text':
			case 'textarea':
				$rule['type'] = $profile['val_type'];
				$rule['regexp'] = $profile['val_regexp'];
				$rule['min'] = $profile['val_min'];
				($profile['val_max']) and $rule['max'] = $profile['val_max'];
				break;
			case 'checkbox':
				$rule['is_array'] = '1';
				break;
			}
			
			$rules[$profile['name']] = $rule;
		}
	}
	
	return $rules;	
}

?>
