<?php
function normalAction_regist_input($smarty,$requests)
{
	//<PCKTAI
	if (defined('OPENPNE_REGIST_FROM') &&
			!((OPENPNE_REGIST_FROM & OPENPNE_REGIST_FROM_KTAI) >> 1)) {
		client_redirect("ktai_normal.php?p=login");
		exit;
	}
    //>
	
	// --- リクエスト変数
	$ses = $requests['ses'];
	// ----------
    
    // セッションが有効かどうか
    if (!$pre = c_member_ktai_pre4session($ses)) {
        // 無効の場合、login へリダイレクト
        client_redirect("ktai_normal.php?p=login");
        exit;
    }
    
	$smarty->assign("SNS_NAME", SNS_NAME);    
    $smarty->assign("ses", $ses);
    $smarty->assign("c_profile_pref_list", p_regist_prof_c_profile_pref_list4null());
    
	$v['month_list'] = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
	$v['day_list'] = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10,
	    11, 12, 13, 14, 15, 16, 17, 18, 19, 20,
	    21, 22, 23, 24, 25, 26, 27, 28, 29, 30,
	    31);
	$public_flags = array(
	'public' => '全員に公開',
	'friend' => WORD_MY_FRIEND_HALF.'まで公開',
	'private'=> '公開しない',
	);
	$smarty->assign('public_flags', $public_flags);
	
	$smarty->assign('password_query_list',p_common_c_password_query4null());
	$smarty->assign('profile_list', db_common_c_profile_list());
	
    $smarty->assign($v);
    $smarty->ext_display('regist_input.tpl');
}

