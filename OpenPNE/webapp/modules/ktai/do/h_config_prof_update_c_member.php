<?php
//-------------------------------------------------------------------
function doAction_h_config_prof_update_c_member($requests)
{   
	$tail = $GLOBALS['KTAI_URL_TAIL'];
	$u = $GLOBALS['KTAI_C_MEMBER_ID'];

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
        $smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
		$smarty->ext_set_call_type('ktai'); // ktai としての呼び出し
        $smarty->assign('inc_ktai_header', fetch_inc_ktai_header());
        $smarty->assign('errors', $errors);
        $smarty->ext_display('error_input.tpl');
        exit;
    }

	do_config_prof_new($u, $prof);
	do_config_prof_update_c_member_profile($u, $c_member_profile_list);

    client_redirect("ktai_page.php?p=h_home&$tail");
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