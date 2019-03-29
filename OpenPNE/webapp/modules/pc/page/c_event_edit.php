<?php

function pageAction_c_event_edit($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

		// --- �ꥯ�������ѿ�
		$c_commu_topic_id = $requests['target_c_commu_topic_id'];
		$err_msg = $requests['err_msg'];
		// ----------
			   								
		$c_topic = c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id);
		$c_commu_id = $c_topic['c_commu_id'];

		//--- ���¥����å�
		if(!p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$u)){
	        handle_kengen_error();
		}
		if(!_db_is_c_topic_admin($c_commu_topic_id, $u) &&
			!_db_is_c_commu_admin($c_commu_id, $u)){
	        handle_kengen_error();
		}		
		//---

		if (!$c_topic['event_flag']) {
	        client_redirect("page.php?p=c_topic_edit&target_c_commu_topic_id=".$c_topic['c_commu_topic_id']);
	        exit();
	    }

		$smarty->assign('inc_navi',fetch_inc_navi("c",$c_commu_id));
		$smarty->assign("year", p_c_event_add_year4null());
		$smarty->assign('month', p_regist_prof_c_profile_month_list4null());
		$smarty->assign('day', p_regist_prof_c_profile_day_list4null());
		$smarty->assign('pref', p_regist_prof_c_profile_pref_list4null());
		$smarty->assign('err_msg', $err_msg);

		//�Խ���ǧ���̤ǥ��顼���Ǥ��Ȥ���������äƤ��롣���ΤȤ��Τ����request�������
		//��α
		if($err_msg){
			$c_topic_temp = p_c_event_add_confirm_event4request();
			$c_topic['name'] = $c_topic_temp['title'];
			$c_topic['body'] = $c_topic_temp['detail'];
			$c_topic['open_date_comment'] = $c_topic_temp['open_date_comment'];
			$c_topic['open_pref_id'] = $c_topic_temp['open_pref_id'];
			$c_topic['open_pref_comment'] = $c_topic_temp['open_pref_comment'];
			$c_topic['open_date_year'] = $c_topic_temp['open_date_year'];
			$c_topic['open_date_month'] = $c_topic_temp['open_date_month'];
			$c_topic['open_date_day'] = $c_topic_temp['open_date_day'];
			$c_topic['invite_period_year'] = $c_topic_temp['invite_period_year'];
			$c_topic['invite_period_month'] = $c_topic_temp['invite_period_month'];
			$c_topic['invite_period_day'] = $c_topic_temp['invite_period_day'];
		}
		else{
			$open_date_arr = explode("-",$c_topic['open_date']);
			$invite_period_arr = explode("-",$c_topic['invite_period']);
			$c_topic['open_date_year'] = $open_date_arr[0];
			$c_topic['open_date_month'] = $open_date_arr[1];
			$c_topic['open_date_day'] = $open_date_arr[2];
			$c_topic['invite_period_year'] = $invite_period_arr[0];	
			$c_topic['invite_period_month'] = $invite_period_arr[1];	
			$c_topic['invite_period_day'] = $invite_period_arr[2];	
		}

		$smarty->assign('event',$c_topic);	
		$smarty->ext_display('c_event_edit.tpl');	
}
?>
