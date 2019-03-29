<?php
// プロフィール項目編集

function doAction_update_c_profile($requests)
{
	man_init_admin_do();

	if ($requests['c_profile_id'] &&
		preg_match('/^[a-zA-Z0-9_]+$/', $requests['name']) && $requests['caption']) {
		db_admin_update_c_profile($requests['c_profile_id']
			, $requests['name']
			, $requests['caption']
			, $requests['is_required']
			, $requests['public_flag_edit']
			, $requests['public_flag_default']
			, $requests['form_type']
			, $requests['sort_order']
			, $requests['disp_regist']
			, $requests['disp_config']
			, $requests['disp_search']
			, $requests['val_type']
			, $requests['val_regexp']
			, $requests['val_min']
			, $requests['val_max']
			);

		admin_client_redirect('edit_c_profile', "プロフィール項目を編集しました");
	} else {
		admin_client_redirect('edit_c_profile', "プロフィール項目を編集できませんでした");
	}
}

