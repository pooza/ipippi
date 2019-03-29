<?php

//---------------------------------------------------------------------------
function pageAction_h_invite_confirm($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	// --- リクエスト変数
	$form_val = $requests;
	// ----------

	$msg = "";
	if (!db_common_is_mailaddress($form_val['mail'])) {
		$msg = "メールアドレスを正しく入力してください";
	}
	elseif (p_is_sns_join4mail_address($form_val['mail'])) {
		$msg = "そのアドレスは既に登録済みです";
    }
    else {
	    if(is_ktai_mail_address($form_val['mail'])) {
			//<PCKTAI
			if (defined('OPENPNE_REGIST_FROM') &&
					!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
				$msg = "携帯アドレスには招待できません";
			}
			//>
		}
		else {
			//<PCKTAI
			if (defined('OPENPNE_REGIST_FROM') &&
					!(OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_PC)) {
				$msg = "PCアドレスには招待できません";
			}
			//>	
		}
    }
	
	if ($msg) {
		$_REQUEST['msg'] = $msg;
		module_execute('pc', 'page', "h_invite");
		exit;
	}	

	$smarty->assign('inc_navi', fetch_inc_navi("h"));

	$smarty->assign('form_val', $form_val);
	$smarty->assign('SNS_NAME', SNS_NAME);

	/////AA local var samples AA//////////////////////////
	$smarty->ext_display("h_invite_confirm.tpl");
}
?>
