<?php
// admin モジュール用 DB接続ライブラリ

/**
 * ユーザーリスト取得
 */
function db_admin_c_member_list($page, $page_size, &$pager)
{
	$start = ($page - 1) * $page_size;

	$where = "1";
	$sql = "SELECT * FROM c_member" .
		" WHERE $where" .
		" ORDER BY c_member_id" .
		" LIMIT $start, $page_size";
	$c_member_list = get_array_list4db($sql);

	foreach ($c_member_list as $key=>$value) {
		$c_member_list[$key]['profile'] = db_common_c_member_profile_list4c_member_id($value['c_member_id'], 'private');
		$c_member_list[$key]['secure'] = db_common_c_member_secure4c_member_id($value['c_member_id']);
	}

	$sql = "SELECT COUNT(*) FROM c_member" .
		" WHERE $where";
	$total_num = get_one4db($sql);

	$pager = admin_make_pager($page, $page_size, $total_num);

	return $c_member_list;
}

function db_admin_c_member4mail_address($mail_address)
{
	$enc_address = quote4db(t_encrypt($mail_address));

	$sql = "SELECT c_member_id FROM c_member_secure" .
		" WHERE pc_address = " . $enc_address .
		" OR ktai_address = " . $enc_address .
		" OR regist_address = " . $enc_address;
	$list = get_one_list4db($sql);

	$c_member_list = array();
	foreach ($list as $c_member_id) {
		$c_member_list[] = db_common_c_member4c_member_id($c_member_id, true, true, 'private');
	}

	return $c_member_list;
}

function db_admin_c_siteadmin($target)
{
	$sql = "SELECT * FROM c_siteadmin" .
		" WHERE target = " . quote4db($target) .
		" LIMIT 1";
	return get_array_one4db($sql);
}

function db_admin_insert_c_siteadmin($target, $body)
{
	$sql = "INSERT INTO c_siteadmin(target, body, r_date)" .
		" VALUES(" . quotearray4db($target, $body) . ", NOW())";
	return _insert4db($sql);
}

function db_admin_update_c_siteadmin($target, $body)
{
	$sql = "UPDATE c_siteadmin SET `body` = " . quote4db($body) .
		", `r_date` = NOW()" .
		" WHERE `target` = " . quote4db($target);
	_mysql_query4db($sql);
}

function db_admin_update_c_sns_config($sets)
{
	$arr = array();
	foreach ($sets as $key => $value) {
		$arr[] = "$key = " . quote4db($value);
	}
	$set_string = implode(",", $arr);

	$sql = "UPDATE c_sns_config" .
		" SET {$set_string}" .
		" WHERE c_sns_config_id = 1";
	_mysql_query4db($sql);
}

function db_admin_is_c_image4filename($filename)
{
	if (!$filename) return 0;

	$sql = "SELECT COUNT(*) FROM c_image" .
		" WHERE filename = " . quote4db($filename) .
		" LIMIT 1";
	return get_one4db($sql);
}

function db_admin_delete_c_profile_option($c_profile_option_id)
{
	if (!$c_profile_option_id) return false;

	$sql = "DELETE FROM c_member_profile" .
		" WHERE c_profile_option_id = " . quote4db($c_profile_option_id);
	_mysql_query4db($sql);

	$sql = "DELETE FROM c_profile_option" .
		" WHERE c_profile_option_id = " . quote4db($c_profile_option_id);
	_mysql_query4db($sql);

	return true;
}

function db_admin_insert_c_profile_option($c_profile_id, $value, $sort_order)
{
	$sql = "INSERT INTO c_profile_option (c_profile_id, value, sort_order)" .
		" VALUES (" . quotearray4db($c_profile_id, $value, $sort_order) . ")";
	return _insert4db($sql);
}

function db_admin_update_c_profile_option($c_profile_option_id, $value, $sort_order)
{
	$sql = "UPDATE c_member_profile SET value = " . quote4db($value) .
		" WHERE c_profile_option_id = " . quote4db($c_profile_option_id);
	_mysql_query4db($sql);

	$sql = "UPDATE c_profile_option" .
		" SET value = " . quote4db($value) . ", sort_order = " . quote4db($sort_order) .
		" WHERE c_profile_option_id = " . quote4db($c_profile_option_id);
	_mysql_query4db($sql);
}

function db_admin_insert_c_banner($sets)
{
	$insert_field_list = array();
	$insert_value_list = array();
	foreach($sets as $key => $value){
		$insert_field_list[] = no_quote4db($key);
		$insert_value_list[] = quote4db($value);
	}
	$insert_fields = implode(",", $insert_field_list);
	$insert_values = implode(",", $insert_value_list);

	$sql = "INSERT INTO c_banner (".$insert_fields.")" .
		" VALUES (".$insert_values.")";

	return _insert4db($sql);
}

function db_admin_update_c_banner($c_banner_id,$sets)
{
	$update_list = array();
	foreach($sets as $key => $value){
		$update_list[] = no_quote4db($key)."=".quote4db($value);
	}
	$updates = implode(",", $update_list);

	$sql = "UPDATE c_banner SET " . $updates .
		" WHERE c_banner_id = " . no_quote4db($c_banner_id);
	_mysql_query4db($sql);
}

function db_admin_delete_c_banner($c_banner_id)
{
	db_admin_delete_c_image4c_banner_id($c_banner_id);

	$sql = "DELETE FROM c_banner" .
		" WHERE c_banner_id = " . quote4db($c_banner_id);
	_mysql_query4db($sql);
}

function db_admin_delete_c_image4c_banner_id($c_banner_id)
{
	$sql = "SELECT image_filename FROM c_banner" .
		" WHERE c_banner_id = ". quote4db($c_banner_id);
	$image_filename = get_one4db($sql);
	image_data_delete($image_filename);
}

function db_admin_insert_c_profile(
	$name
	, $caption
	, $is_required
	, $public_flag_edit
	, $public_flag_default
	, $form_type
	, $sort_order
	, $disp_regist
	, $disp_config
	, $disp_search
	, $val_type
	, $val_regexp
	, $val_min
	, $val_max
	)
{
	$arr = array(
		'name' => $name,
		'caption' => $caption,
		'is_required' => $is_required,
		'public_flag_edit' => $public_flag_edit,
		'public_flag_default' => $public_flag_default,
		'form_type' => $form_type,
		'sort_order' => $sort_order,
		'disp_regist' => $disp_regist,
		'disp_config' => $disp_config,
		'disp_search' => $disp_search,
		'val_type' => $val_type,
		'val_regexp' => $val_regexp,
		'val_min' => $val_min,
		'val_max' => $val_max,
	);
	$keys = implode(',', array_keys($arr));
	$values = implode(',', array_map('quote4db', array_values($arr)));

	$sql = "INSERT INTO c_profile (".$keys.")" .
		" VALUES (".$values.")";
	_mysql_query4db($sql);
}

function db_admin_update_c_profile($c_profile_id
	, $name
	, $caption
	, $is_required
	, $public_flag_edit
	, $public_flag_default
	, $form_type
	, $sort_order
	, $disp_regist
	, $disp_config
	, $disp_search
	, $val_type
	, $val_regexp
	, $val_min
	, $val_max
	)
{
	$sql = "UPDATE c_profile SET" .
		" name = " . quote4db($name) .
		", caption = " . quote4db($caption) .
		", is_required = " . quote4db($is_required) .
		", public_flag_edit = " . quote4db($public_flag_edit) .
		", public_flag_default = " . quote4db($public_flag_default) .
		", form_type = " . quote4db($form_type) .
		", sort_order = " . quote4db($sort_order) .
		", disp_regist = " . quote4db($disp_regist) .
		", disp_config = " . quote4db($disp_config) .
		", disp_search = " . quote4db($disp_search) .
		", val_type = " . quote4db($val_type) .
		", val_regexp = " . quote4db($val_regexp) .
		", val_min = " . quote4db($val_min) .
		", val_max = " . quote4db($val_max) .
		" WHERE c_profile_id = " . quote4db($c_profile_id);
	_mysql_query4db($sql);

	// 公開設定が固定のときはユーザーの設定値を上書き
	if (!$public_flag_edit) {
		$sql = "UPDATE c_member_profile" .
			" SET public_flag = " . quote4db($public_flag_default) .
			" WHERE c_profile_id = " . quote4db($c_profile_id);
		_mysql_query4db($sql);
	}
}

function db_admin_delete_c_profile($c_profile_id)
{
	// メンバーのプロフィールから削除
	$sql = "DELETE FROM c_member_profile" .
		" WHERE c_profile_id = " . quote4db($c_profile_id);
	_mysql_query4db($sql);

	// 選択肢項目を削除
	$sql = "DELETE FROM c_profile_option" .
		" WHERE c_profile_id = " . quote4db($c_profile_id);
	_mysql_query4db($sql);

	// プロフィール項目を削除
	$sql = "DELETE FROM c_profile" .
		" WHERE c_profile_id = " . quote4db($c_profile_id);
	_mysql_query4db($sql);
}

function db_admin_c_profile4c_profile_id($c_profile_id)
{
	$sql = "SELECT * FROM c_profile" .
		" WHERE c_profile_id = " . quote4db($c_profile_id);
	return get_array_one4db($sql);
}

/**
 * 全バナー取得
 *
 * @param	int $limit		取得最大件数
 * @return	array_of_array  c_banner_list	バナー配列
 */
function db_admin_c_banner_list4null($type = "", $limit = 0)
{
	$sql = "SELECT * FROM c_banner";
	if ($type)
		$sql .= " WHERE type = " . quote4db($type);
	if ($limit)
		$sql .= " LIMIT ".no_quote4db($limit);

	return get_array_list4db($sql);
}

function db_admin_c_image_list($page, $page_size, &$pager)
{
	$start = ($page - 1) * $page_size;

	$where = "1";
	$sql = "SELECT * FROM c_image" .
		" WHERE $where" .
		" ORDER BY c_image_id DESC" .
		" LIMIT $start, $page_size";
	$c_image_list = get_array_list4db($sql);

	$sql = "SELECT COUNT(*) FROM c_image" .
		" WHERE $where";
	$total_num = get_one4db($sql);

	$pager = admin_make_pager($page, $page_size, $total_num);

	return $c_image_list;
}

function db_admin_c_image4c_image_id($c_image_id)
{
	$sql = "SELECT * FROM c_image" .
		" WHERE c_image_id = " . quote4db($c_image_id);
	return get_array_one4db($sql);
}

function db_admin_c_commu_category_parent_list()
{
	$sql = "SELECT * FROM c_commu_category_parent ORDER BY sort_order";
	return get_array_list4db($sql);
}

function db_admin_c_commu_category_list()
{
	$sql = "SELECT * FROM c_commu_category ORDER BY sort_order";
	$list = get_array_list4db($sql);

	$category_list = array();
	foreach ($list as $item) {
		$category_list[$item['c_commu_category_parent_id']][] = $item;
	}
	return $category_list;
}

function db_admin_insert_c_commu_category_parent($name, $sort_order)
{
	$sql = "INSERT INTO c_commu_category_parent(name, sort_order)" .
		" VALUES(".quotearray4db($name, intval($sort_order)).")";
	return _insert4db($sql);
}

function db_admin_update_c_commu_category_parent($c_commu_category_parent_id, $name, $sort_order)
{
	$sql = "UPDATE c_commu_category_parent" .
		" SET name = " . quote4db($name) .
		", sort_order = " . quote4db($sort_order) .
		" WHERE c_commu_category_parent_id = " . quote4db($c_commu_category_parent_id);
	_mysql_query4db($sql);
}

function db_admin_delete_c_commu_category_parent($c_commu_category_parent_id)
{
	// 小カテゴリを削除
	$sql = "DELETE FROM c_commu_category" .
		" WHERE c_commu_category_parent_id = " . quote4db($c_commu_category_parent_id);
	_mysql_query4db($sql);

	// 中カテゴリを削除
	$sql = "DELETE FROM c_commu_category_parent" .
		" WHERE c_commu_category_parent_id = " . quote4db($c_commu_category_parent_id);
	_mysql_query4db($sql);
}

function db_admin_insert_c_commu_category($c_commu_category_parent_id, $name, $sort_order)
{
	$sql = "INSERT INTO c_commu_category(c_commu_category_parent_id, name, sort_order)" .
		" VALUES(".quotearray4db($c_commu_category_parent_id, $name, intval($sort_order)).")";
	return _insert4db($sql);
}

function db_admin_update_c_commu_category($c_commu_category_id, $name, $sort_order)
{
	$sql = "UPDATE c_commu_category" .
		" SET name = " . quote4db($name) .
		", sort_order = " . quote4db($sort_order) .
		" WHERE c_commu_category_id = " . quote4db($c_commu_category_id);
	_mysql_query4db($sql);
}

function db_admin_delete_c_commu_category($c_commu_category_id)
{
	// 小カテゴリを削除
	$sql = "DELETE FROM c_commu_category" .
		" WHERE c_commu_category_id = " . quote4db($c_commu_category_id);
	_mysql_query4db($sql);
}

function db_admin_c_admin_user_id4username($username)
{
	$sql = "SELECT c_admin_user_id FROM c_admin_user" .
		" WHERE username = " . quote4db($username);
	return get_one4db($sql);
}

function db_admin_authenticate_password($uid, $password)
{
	$sql = "SELECT c_admin_user_id FROM c_admin_user" .
		" WHERE c_admin_user_id = " . quote4db($uid) .
		" AND password = " . quote4db(md5($password)) .
		" LIMIT 1";
	return get_one4db($sql);
}

function db_admin_update_c_admin_user_password($uid, $password)
{
	$sql = "UPDATE c_admin_user" .
		" SET password = " . quote4db(md5($password)) .
		" WHERE c_admin_user_id = " . quote4db($uid);
	_mysql_query4db($sql);
}

function db_admin_c_admin_config4name($name)
{
	$sql = "SELECT value FROM c_admin_config" .
		" WHERE name = " . quote4db($name);
	return get_one4db($sql);
}

function db_admin_insert_c_admin_config($name, $value)
{
	$sql = "INSERT INTO c_admin_config (name, value)" .
		" VALUES (".quotearray4db($name, $value).")";
	return _insert4db($sql);
}

function db_admin_update_c_admin_config($name, $value)
{
	$sql = "UPDATE c_admin_config" .
		" SET value = " . quote4db($value) .
		" WHERE name = " . quote4db($name);
	_mysql_query4db($sql);
}

function db_admin_c_admin_config_all()
{
	$sql = "SELECT name, value FROM c_admin_config";
	return get_assoc4db($sql);
}

function db_admin_delete_c_image_link4image_filename($image_filename)
{
	// c_banner (削除)
	$sql = "DELETE FROM c_banner" .
		" WHERE image_filename = " . quote4db($image_filename);
	_mysql_query4db($sql);

	// c_commu
	$tbl = "c_commu";
	db_admin_empty_image_filename($tbl, $image_filename);

	// c_commu_topic_comment
	$tbl = "c_commu_topic_comment";
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename1");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename2");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename3");

	// c_diary
	$tbl = "c_diary";
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_1");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_2");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_3");

	// c_member
	$tbl = "c_member";
	db_admin_empty_image_filename($tbl, $image_filename);
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_1");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_2");
	db_admin_empty_image_filename($tbl, $image_filename, "image_filename_3");
}

function db_admin_empty_image_filename($tbl, $image_filename, $column = "image_filename")
{
	$q_tbl = no_quote4db($tbl);
	$q_column = no_quote4db($column);

	$sql = "UPDATE $q_tbl SET $q_column = ''" .
		" WHERE $q_column = " . quote4db($image_filename);
	_mysql_query4db($sql);
}

