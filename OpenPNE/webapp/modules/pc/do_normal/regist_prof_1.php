<?php

function doNormalAction_regist_prof_1($requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
		client_redirect_login();
		exit;
	}
	//>

	// --- リクエスト変数
	$sid = $requests['sid'];
	// ----------

	//--- 権限チェック
	//セッションが有効

	if (!n_regist_intro_is_active_sid($sid)) {
		$msg = "この招待URLは既に無効になっています。";
		client_redirect("normal.php?p=tologin&msg=".urlencode($msg));
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
	if ($profs['password'] != $requests['password2']) {
		$errors['password2'] = 'パスワードが一致していません。';
	}

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
		if ($profile['disp_regist'] &&
			$profile['is_required'] &&
			!$c_member_profile_list[$profile['name']]['value'])
		{
			$errors[$profile['name']] = "{$profile['caption']}を入力してください";
			break;
		}
	}

	// error
	if ($errors) {
		unset($profs['password']);
		$profs['profile'] = $c_member_profile_list;

		$_REQUEST['err_msg'] = $errors;
		$_REQUEST['profs'] = $profs;
		module_execute('pc', 'normal','regist_prof_1');
		exit;
	}

	do_regist_prof_new($sid, $profs);
	$c_member_pre = do_common_c_member_pre4sid($sid);
	do_regist_prof_update_c_member_pre_profile($c_member_pre['c_member_pre_id'], $c_member_profile_list);

	client_redirect("normal.php?p=regist_prof&sid=$sid");
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
		'password' => array(
			'type' => 'regexp',
			'regexp' => '/[a-z0-9]+/i',
			'required' => '1',
			'caption' => 'パスワード',
			'min' => '6',
			'max' => '12',
		),
		'c_password_query_id' => array(
			'type' => 'int',
			'required' => '1',
			'caption' => '秘密の質問',
			'required_error' => '秘密の質問を選択してください。',
			'min' => '1',
		),
		'c_password_query_answer' => array(
			'type' => 'string',
			'required' => '1',
			'caption' => '秘密の質問の答え',
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

