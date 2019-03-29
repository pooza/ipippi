<?php

function doAction_h_config_prof($request) {
	$u = $GLOBALS['AUTH']->uid();
	
	$mode = $request['mode'];
	$errors = array();
	
	$validator = new Validator();
	$validator->addRequests($_REQUEST);
	$validator->addRules(_getValidateRules());
	if (!$validator->validate()) {
		$errors = array_merge($errors, $validator->getErrors());
	}
	$prof = $validator->getParams();


	//--- c_profile の項目をチェック
	$validator = new Validator();
	$validator->addRequests($_REQUEST['profile']);
	$validator->addRules(_getValidateRulesProfile());
	if (!$validator->validate()) {
		$errors = array_merge($errors, $validator->getErrors());
	}
	
	// 値の整合性をチェック(DB)
	$c_member_profile_list = do_config_prof_check_profile($validator->getParams(), $_REQUEST['public_flag']);

	// 必須項目チェック
	$profile_list = db_common_c_profile_list4null();
	foreach ($profile_list as $profile) {
		if ($profile['disp_config'] &&
			$profile['is_required'] &&
			!$c_member_profile_list[$profile['name']]['value'])
		{
			$errors[$profile['name']] = "{$profile['caption']}を入力してください";
			break;
		}
	}

	
    if ($errors) {
    	$_REQUEST['msg'] = array_shift($errors);
    	$mode = "input";
    }

    switch ($mode) {
    case "input":
	    $prof['profile'] = $c_member_profile_list;
    
	    $_REQUEST['prof'] = $prof;
    	module_execute('pc', 'page', "h_config_prof");
    	exit;
    	break;
    default:
    case "confirm":
	    $prof['profile'] = $c_member_profile_list;
    
	    $_REQUEST['prof'] = $prof; // page:h_config_prof_confirm への値の引渡し
    	module_execute('pc', 'page', "h_config_prof_confirm");
    	exit;
    	break;
    case "register":
		do_config_prof_new($u, $prof);
		do_config_prof_update_c_member_profile($u, $c_member_profile_list);
	
		client_redirect("page.php?p=h_prof");
		break;
    }
}

function _getValidateRules()
{
	return array(
		'nickname' => array(
			'type' => 'string',
			'required' => '1',
			'caption' => 'ニックネーム',
			'max' => '40',
		),
		'public_flag_birth_year' => array(
			'type' => 'string',
		),
	);
}

function _getValidateRulesProfile()
{
	$rules = array();
	
	$profile_list = db_common_c_profile_list4null();
	foreach ($profile_list as $profile) {
		if ($profile['disp_config']) {
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
