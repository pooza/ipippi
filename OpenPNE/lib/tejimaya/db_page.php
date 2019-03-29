<?php

//----- インクルードテンプレートの出力をfetch

/**
 * inc_navi.tpl の出力を返す
 *
 * $type が f または c の場合には、$target_id を指定する必要があります。
 *
 * @param	enum('h', 'f', 'c')  $type : ナビゲーションのタイプ
 * @param  int  $target_id : 友達のメンバーID もしくは コミュニティID
 * @return html
 */
function fetch_inc_navi($type, $target_id = null)
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("PHPSESSID", md5(session_id()));

	switch ($type) {
	case "h":
	default:
		$type = "h";
		break;
	case "f":
		$inc_smarty->assign('INC_NAVI_c_member_id_friend', $target_id);
		break;
	case "c":
		$inc_smarty->assign('INC_NAVI_c_commu_id', $target_id);
		break;
	}
	$inc_smarty->assign('INC_NAVI_type', $type);

	$inc_smarty->assign('WORD_FRIEND', WORD_FRIEND);
	$inc_smarty->assign('WORD_MY_FRIEND', WORD_MY_FRIEND);
	$inc_smarty->assign('WORD_FRIEND_HALF', WORD_FRIEND_HALF);
	$inc_smarty->assign('WORD_MY_FRIEND_HALF', WORD_MY_FRIEND_HALF);

	$inc_smarty->ext_set_call_type('pc');
	return $inc_smarty->ext_fetch('inc_navi.tpl');
}

/**
 * inc_html_header.tpl
 */
function fetch_inc_html_header()
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign('sns_name', SNS_NAME);
	$inc_smarty->assign('inc_html_head', p_common_c_siteadmin4target_pagename('inc_html_head'));

	$c_sns_config = db_select_c_sns_config();
	$inc_smarty->assign('border_00', $c_sns_config['border_00']);
	$inc_smarty->assign('border_01', $c_sns_config['border_01']);
	$inc_smarty->assign('border_02', $c_sns_config['border_02']);
	$inc_smarty->assign('border_03', $c_sns_config['border_03']);
	$inc_smarty->assign('border_04', $c_sns_config['border_04']);
	$inc_smarty->assign('border_05', $c_sns_config['border_05']);
	$inc_smarty->assign('border_06', $c_sns_config['border_06']);
	$inc_smarty->assign('border_07', $c_sns_config['border_07']);
	$inc_smarty->assign('border_08', $c_sns_config['border_08']);
	$inc_smarty->assign('border_09', $c_sns_config['border_09']);
	$inc_smarty->assign('border_10', $c_sns_config['border_10']);

	$inc_smarty->assign('bg_00', $c_sns_config['bg_00']);
	$inc_smarty->assign('bg_01', $c_sns_config['bg_01']);
	$inc_smarty->assign('bg_02', $c_sns_config['bg_02']);
	$inc_smarty->assign('bg_03', $c_sns_config['bg_03']);
	$inc_smarty->assign('bg_04', $c_sns_config['bg_04']);
	$inc_smarty->assign('bg_05', $c_sns_config['bg_05']);
	$inc_smarty->assign('bg_06', $c_sns_config['bg_06']);
	$inc_smarty->assign('bg_07', $c_sns_config['bg_07']);
	$inc_smarty->assign('bg_08', $c_sns_config['bg_08']);
	$inc_smarty->assign('bg_09', $c_sns_config['bg_09']);
	$inc_smarty->assign('bg_10', $c_sns_config['bg_10']);

	$inc_smarty->assign('inc_custom_css', p_common_c_siteadmin4target_pagename('inc_custom_css'));

	$inc_smarty->ext_set_call_type('pc');
	return $inc_smarty->ext_fetch('inc_html_header.tpl');
}

/**
 * inc_page_header.tpl
 */
function fetch_inc_page_header($type = null)
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);

	$v["PHPSESSID"] = md5(session_id());
	$v["INC_PAGE_HEADER_type"] = $type;
	$v["INC_PAGE_HEADER"] = p_inc_c_banner_header4null();
	$v["login_url"] = get_login_url();
	$v["before_after"] = ($type == "public" || $type == "regist") ? "before" : "after";
	$v["top_banner_html"] = p_common_c_siteadmin4target_pagename("top_banner_html");

	$inc_smarty->assign($v);
	$inc_smarty->ext_set_call_type('pc');
	return $inc_smarty->ext_fetch('inc_page_header.tpl');
}

//TODO:廃止関数
function fetch_inc_banner($u = null) {}

/**
 * inc_page_footer.tpl
 */
function fetch_inc_page_footer($is_secure = false)
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("PHPSESSID", md5(session_id()));
	if ($is_secure) {
		$inc_smarty->assign("inc_page_footer",
			p_common_c_siteadmin4target_pagename('inc_page_footer_after'));
	} else {
		$inc_smarty->assign("inc_page_footer",
			p_common_c_siteadmin4target_pagename('inc_page_footer_before'));
	}

	$inc_smarty->ext_set_call_type('pc');
	return $inc_smarty->ext_fetch('inc_page_footer.tpl');
}

function fetch_inc_entry_point_h_home()
{
	$contents = array();

	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("PHPSESSID", md5(session_id()));
	$inc_smarty->ext_set_call_type('pc');

	for ($i = 1; $i <= 12; $i++) {
		$contents[$i] = $inc_smarty->ext_fetch('inc_entry_point/' .
				'inc_entry_point_h_home_'.$i.'.tpl');
	}

	return $contents;
}

function fetch_inc_entry_point_f_home()
{
	$contents = array();

	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("PHPSESSID", md5(session_id()));
	$inc_smarty->ext_set_call_type('pc');

	for ($i = 1; $i <= 9; $i++) {
		$contents[$i] = $inc_smarty->ext_fetch('inc_entry_point/' .
				'inc_entry_point_f_home_'.$i.'.tpl');
	}

	return $contents;
}

function fetch_inc_entry_point_c_home()
{
	$contents = array();

	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("PHPSESSID", md5(session_id()));
	$inc_smarty->ext_set_call_type('pc');

	for ($i = 1; $i <= 7; $i++) {
		$contents[$i] = $inc_smarty->ext_fetch('inc_entry_point/' .
				'inc_entry_point_c_home_'.$i.'.tpl');
	}

	return $contents;
}

//------------

/**
 * トップバナー取得
 *
 * トップバナーを1件ランダムで取得
 *
 * @return	array  c_banner
 */
function p_inc_c_banner_header4null()
{
	$sql = "SELECT * FROM c_banner WHERE type='TOP'" .
   		" AND is_hidden = 0" .
   		" ORDER BY RAND()" .
   		" LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * サイドバナー取得
 *
 * サイドバナーを1件ランダムで取得
 *
 * @return	array  c_banner
 */
function p_inc_c_banner_side4null()
{
	$sql = "SELECT * FROM c_banner WHERE type='SIDE'" .
   		" AND is_hidden = 0" .
   		" ORDER BY RAND()" .
   		" LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * バナーIDからバナー情報を取得
 *
 * @param	int	$c_banner_id
 * @return	array  c_banner
 */
function _db_c_banner4c_banner_id($c_banner_id)
{
	$sql = "SELECT * FROM c_banner" .
   		" WHERE c_banner_id = " . quote4db($c_banner_id) .
		" LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * 日記IDから日記情報取得
 *
 * @param	int	  $c_diary_id
 * @return	array c_diary
 */
function _db_c_diary4c_diary_id($c_diary_id)
{
	$sql = "SELECT *" .
   		", EXTRACT(YEAR FROM r_datetime) as year" .
   		", EXTRACT(MONTH FROM r_datetime) as month" .
   		" FROM c_diary" .
   		" WHERE c_diary_id = ".quote4db($c_diary_id);

	return get_array_one4db($sql);
}

/**
 * コミュニティの参加メンバー数を取得する
 *
 * @param	int $c_commu_id
 * @return	int 参加メンバー数
 */
function _db_count_c_commu_member_list4c_commu_id($c_commu_id) {
	$sql = "SELECT count(*) FROM c_commu_member WHERE c_commu_id=".quotearray4db($c_commu_id)."";
	$list = get_one_list4db($sql);
	return $list[0];
}
function p_common_count_friends4c_member_id($c_member_id) {
	$sql = "SELECT COUNT(*) FROM c_friend" .
   		" WHERE c_member_id_from = " . quote4db($c_member_id);
	return get_one4db($sql);
}

/**
 * メッセージIDからメッセージ情報取得
 *
 * @param	int $c_message_id
 * @return	array
 * 				c_message.*,
 * 				c_member_nickname_from,	: 送信者名
 * 				c_member_nickname_to	: 受信者名
 * @see		h_message.php
 */
function _db_c_message4c_message_id($c_message_id)
{
	$sql = "SELECT * FROM c_message WHERE c_message_id=".quotearray4db($c_message_id)." LIMIT 1";
	$c_message = get_array_one4db($sql);

	$c_member_from = db_common_c_member4c_member_id_LIGHT($c_message['c_member_id_from']);
	$c_member_to = db_common_c_member4c_member_id_LIGHT($c_message['c_member_id_to']);

	$c_message['c_member_image_filename_from'] = $c_member_from['image_filename'];
	$c_message['c_member_nickname_from'] = $c_member_from['nickname'];
	$c_message['c_member_image_filename_to'] = $c_member_to['image_filename'];
   $c_message['c_member_nickname_to'] = $c_member_to['nickname'];

	return $c_message;
}

/**
 * 管理者交代の要請情報をIDから取得
 *
 * @param  int $c_commu_admin_confirm_id
 * @return array
 * 				c_commu_admin_confirm,
 * 				c_member_id_admin		: 管理者のメンバーID
 */
function _db_c_commu_admin_confirm4c_commu_admin_confirm_id($c_commu_admin_confirm_id)
{
	$sql = "SELECT cac.*, c.c_member_id_admin FROM c_commu_admin_confirm AS cac, c_commu AS c";
	$sql .= " WHERE cac.c_commu_admin_confirm_id=".quotearray4db($c_commu_admin_confirm_id)."";
	$sql .= " AND cac.c_commu_id=c.c_commu_id LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * PCアドレスからメンバーIDを取得(ログインに必要)
 *
 * @param	string $pc_address
 * @return	int    $c_member_id
 */
function _db_c_member_id4pc_address($pc_address)
{
	return _db_c_member_id4pc_address_encrypted(t_encrypt($pc_address));
}

function _db_c_member_id4pc_address_encrypted($pc_address_encoded)
{
	$sql = "SELECT c_member_id FROM c_member_secure" .
			" WHERE pc_address=". quote4db($pc_address_encoded).
			" LIMIT 1";
	return get_one4db($sql);
}

/**
 * コミュニティのメンバーかどうか判定
 *
 * @param  int c_commu_id
 * @param  int c_member_id
 * @return bool
 */
function _db_is_c_commu_member($c_commu_id, $c_member_id)
{
	$sql = "SELECT c_commu_member_id FROM c_commu_member"
		." WHERE c_commu_id=".quotearray4db($c_commu_id)." AND c_member_id=".quotearray4db($c_member_id)."";
	$one = get_one_list4db($sql);
	if ($one[0]) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * コミュニティの管理者かどうかを判定
 *
 * @param  int $c_commu_id
 * @param  int $c_member_id
 * @return bool
 */
function _db_is_c_commu_admin($c_commu_id, $c_member_id)
{
	$sql = "SELECT c_commu_id FROM c_commu"
		." WHERE c_commu_id=".quotearray4db($c_commu_id)." AND c_member_id_admin=".quotearray4db($c_member_id)."";
	$one = get_one_list4db($sql);
	if ($one[0]) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function _db_is_c_topic_admin($c_commu_topic_id, $c_member_id){
	$sql = "select c_member_id from c_commu_topic " .
			" where c_commu_topic_id = ". no_quote4db($c_commu_topic_id) .
			" and c_member_id = ". no_quote4db($c_member_id);
	$one = get_one_list4db($sql);
	if ($one[0]) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function _db_is_c_event_admin($c_commu_topic_id, $c_member_id){
	$sql = "SELECT c_event_member_id FROM c_event_member"
		." WHERE c_commu_topic_id=".quotearray4db($c_commu_topic_id)." AND is_admin=1 and c_member_id=".quotearray4db($c_member_id)."";
	$one = get_one_list4db($sql);
	if ($one[0]) {
		return TRUE;
	} else {
		return FALSE;
	}
}

function _db_is_c_event_member($c_commu_topic_id, $c_member_id){
	$sql = "SELECT c_event_member_id FROM c_event_member"
		." WHERE c_commu_topic_id=".quotearray4db($c_commu_topic_id)." AND c_member_id=".quotearray4db($c_member_id)."";
	$one = get_one_list4db($sql);
	if ($one[0]) {
		return TRUE;
	} else {
		return FALSE;
	}
}

/**
 * 友達かどうか判定
 *
 * @param  int $c_member_id1
 * @param  int $c_member_id2
 * @return bool
 */
function _db_is_friend($c_member_id1, $c_member_id2)
{
	$sql = "SELECT count(*) FROM c_friend"
		." WHERE c_member_id_from=".quotearray4db($c_member_id1)." AND c_member_id_to=".quotearray4db($c_member_id2)."";
	$one = get_one_list4db($sql);
	return $one[0];
}

/**
 * 友達のメンバーIDリスト取得
 *
 * @param  int $c_member_id
 * @return array  友達のメンバーID配列 ( 例: (3, 4, 6) )
 */
function _db_c_member_id_friend_list4c_member_id($c_member_id)
{
	$sql = "SELECT c_member_id_to FROM c_friend"
		. " WHERE c_member_id_from=".quotearray4db($c_member_id)."";
	return get_one_list4db($sql);
}

/**
 * コミュニティ情報をIDから取得
 *
 * @param  int $c_commu_id
 * @return array
 * 				c_commu.*
 */
function _db_c_commu4c_commu_id($c_commu_id)
{
	$sql = "SELECT * FROM c_commu WHERE c_commu_id=".quotearray4db($c_commu_id)." LIMIT 1";
	if (!$c_commu = get_array_one4db($sql)) return array();

	$c_commu['c_commu_category'] =
		p_h_com_category_c_commu_category4c_commu_category_id($c_commu['c_commu_category_id']);
	$c_commu['c_member_admin'] =
		db_common_c_member4c_member_id($c_commu['c_member_id_admin']);

	return $c_commu;
}

//フレンドのリストを取得
function _db_c_friend4c_member_id($c_member_id){
	$sql = 'SELECT `c_friend_id` , `c_member_id_from` , `c_member_id_to` , `r_datetime` , `intro` '
	."FROM c_friend WHERE c_member_id_from = ".quotearray4db($c_member_id)."";
	$result = mysql_query($sql);
	while($tmp = mysql_fetch_array($result)){
		$a[]=$tmp;
	}
	return $a;
}

// 参加コミュニティ数
function p_common_count_c_commu4c_member_id($c_member_id)
{
	$sql = "SELECT COUNT(DISTINCT c_commu_id)" .
   		" FROM c_commu_member" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	return get_one4db($sql);
}

// 紹介文を取得
function p_f_home_c_friend_intro($u, $target_c_member_id) {
	$sql = "SELECT intro FROM c_friend";
	$sql .= " WHERE c_member_id_from=" . quote4db($u);
	$sql .= " AND c_member_id_to=" . quote4db($target_c_member_id);
	$sql .= " LIMIT 1";
	return get_one4db($sql);
}

// 参加コミュニティリスト
function p_fh_com_list_c_commu_list4c_member_id($c_member_id, $page, $page_size)
{
	$start = ($page - 1) * $page_size;

	$sql = "SELECT c_commu.*" .
			" FROM c_commu_member , c_commu";
	$sql .= " WHERE c_commu_member.c_member_id=".quote4db($c_member_id)."";
	$sql .= " AND c_commu.c_commu_id=c_commu_member.c_commu_id";
	$sql .= " ORDER BY c_commu.c_commu_id DESC ";
	$sql .= " LIMIT ".no_quote4db($start).",".no_quote4db($page_size);

	$c_commu_list = get_array_list4db($sql);

	foreach($c_commu_list as $key => $value) {
		$c_commu_list[$key]['count_members'] =
			_db_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
	}

	$pager = array(
		"total_num" => p_common_count_c_commu4c_member_id($c_member_id),
		"disp_num"  => count($c_commu_list),
		"start_num" => 0,
		"end_num"   => 0,
		"total_page" => 0,
		"prev_page" => 0,
		"next_page" => 0,
	);

	if ($pager['disp_num'] > 0) {
		$pager['start_num'] = $start + 1;
		$pager['end_num'] = $pager['start_num'] + $pager['disp_num'] - 1;
	}

	if ($pager['total_num']) {
	   	$pager['total_page'] = ceil($pager['total_num'] / $page_size);

		if ($page < $pager['total_page']) {
			$pager['next_page'] = max($page + 1, 1);
		}
		if ($page > 1) {
			$pager['prev_page'] = min($page - 1, $pager['total_page']);
		}
	}

	return array($c_commu_list, $pager);
}

/**
 * コミュニティ管理者か判定
 *
*/
//$u==管理者
//$target_c_commu_id==コミュニティメンバー
function p_c_admin_request_is_admin($target_c_commu_id,$u){
	return  _db_is_c_commu_admin($target_c_commu_id, $u);
}

function p_c_admin_request_c_commu4c_commu_id($c_commu_id)
{
	return _db_c_commu4c_commu_id($c_commu_id);
}

/**
コミュニティ情報を得る

[引数]
target_c_commu_id

[返り値]
image_filename
name
*/
function p_c_bbs_c_commu4c_commu_id($target_c_commu_id)
{
	return _db_c_commu4c_commu_id($target_c_commu_id);
}

function _db_count_c_commu_topic_comments4c_commu_topic_id($c_commu_topic_id){
	$sql = "SELECT COUNT(*)" .
		" FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_id = ".quote4db($c_commu_topic_id) .
		" AND number > 0";

	return get_one4db($sql);
}

/**
コミュニティトピックからコミュニティIDを取得
[引数]
target_c_commu_topic_id

[返り値]
c_commu_id
*/
function p_c_bbs_c_commu_id4c_commu_topic_id( $target_c_commu_topic_id ){
	$sql = "select c_commu_id from c_commu_topic where c_commu_topic_id = ".quotearray4db($target_c_commu_topic_id)."";
	return get_one4db($sql);
}

function p_c_edit_c_commu4c_commu_id($target_c_commu_id)
{
	return _db_c_commu4c_commu_id($target_c_commu_id);
}

function p_c_edit_c_commu_category_list4null()
{
	$sql = 'SELECT c_commu_category.c_commu_category_id, c_commu_category.name, c_commu_category.sort_order, c_commu_category.c_commu_category_parent_id'
		. ' FROM c_commu_category, c_commu_category_parent'
		. ' WHERE c_commu_category.c_commu_category_parent_id = c_commu_category_parent.c_commu_category_parent_id' .
		  ' ORDER BY c_commu_category_parent.sort_order, c_commu_category.sort_order';
	$list = get_array_list4db( $sql );

	return  $list;
}
function p_h_com_find_all_c_commu_category_list4null()
{
	$sql = 'SELECT *' .
		' FROM c_commu_category' .
		' ORDER BY sort_order';
	$list = get_array_list4db($sql);

	// カテゴリごとのコミュニティ数を取得
	$sql = "SELECT c_commu_category_id, COUNT(*) as count" .
		" FROM c_commu" .
		" GROUP BY c_commu_category_id";
	$result = _mysql_query4db($sql);
	$counts = array();
	while ($item = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$counts[$item['c_commu_category_id']] = $item['count'];
	}

	$c_commu_category_list = array();
	foreach ($list as $item) {
		$item['count_commu_category'] =
			$counts[$item['c_commu_category_id']] ?
				$counts[$item['c_commu_category_id']] : 0;
		$c_commu_category_list[$item['c_commu_category_parent_id']][] = $item;
	}
	return $c_commu_category_list;
}

function p_c_edit_image_c_commu4c_commu_id($target_c_commu_id)
{
	return _db_c_commu4c_commu_id($target_c_commu_id);
}

function p_c_edit_member_c_commu4c_commu_id($target_c_commu_id)
{
	return _db_c_commu4c_commu_id($target_c_commu_id);
}

// $c_commu_id の community に参加しているメンバを返す
function p_c_edit_member_c_member_list4c_commu_id($c_commu_id, $page_size, $page)
{
	$page = intval($page);
	$page_size = intval($page_size);

	$c_commu = do_common_c_commu4c_commu_id($c_commu_id);

	$sql =	"SELECT c_member.c_member_id,".
				"nickname,".
				"image_filename ," .
				"c_commu_member.r_datetime".
			" FROM c_member,".
				"c_commu_member".
			" WHERE c_commu_id =".quote4db($c_commu_id).
			" AND c_commu_member.c_member_id = c_member.c_member_id".
			" ORDER BY c_commu_member.r_datetime DESC".
			" LIMIT ".(($page-1)*$page_size).", $page_size";

	$list = get_array_list4db( $sql );

	$new_list = array();
	foreach($list as $key => $value){
		$new_list[] = $value;
	}
	$list = $new_list;

//	$c_commu = _db_c_commu4c_commu_id($c_commu_id);

	$sql = 'SELECT *'
		. ' FROM c_commu_admin_confirm'
		. ' WHERE c_commu_id ='.quotearray4db($c_commu_id);
	$c_commu_admin_confirm = get_array_one4db($sql);

	if($c_commu_admin_confirm){
		foreach( $list as $key => $c_member ) {
			if( $list[$key]['c_member_id'] == $c_commu_admin_confirm['c_member_id_to']){
				$list[$key]['c_commu_admin_confirm_id'] = $c_commu_admin_confirm['c_commu_admin_confirm_id'];
			}else{
				$list[$key]['c_commu_admin_confirm_id'] = 0;
			}
		}
	}else{
		foreach( $list as $key => $c_member ) {
			$list[$key]['c_commu_admin_confirm_id'] = -1;
		}
	}

	foreach( $list as $key => $c_member ) {
//		$c_member_id = $list[$key]['c_commu_admin_confirm_id'];
		$list[$key]['is_c_commu_admin'] = p_common_is_c_commu_admin4c_member_id( $c_commu_id , $list[$key]['c_member_id'] );
	}

	$sql = "select count(*) from c_commu_member where c_commu_id = ".quotearray4db($c_commu_id)."";
	$total_num = get_one4db($sql);

	   if($total_num != 0){
		   $total_page_num =  ceil($total_num / $page_size);
		   if($page >= $total_page_num){
			   $next = false;
		   }else{
			   $next = true;
		   }

		   if($page <= 1){
			   $prev = false;
		   }else{
			   $prev = true;
		   }
	   }

	   return array($list , $prev , $next);
}

/**
コミュニティ情報を得る
*/
function p_c_home_c_commu4c_commu_id($c_commu_id)
{
	$c_commu = p_common_c_commu4c_commu_id($c_commu_id);
	$c_commu['member_count'] = _db_count_c_commu_member_list4c_commu_id($c_commu_id);

	$sql = "SELECT * FROM c_commu_category" .
		" WHERE c_commu_category_id={$c_commu['c_commu_category_id']}";
	$c_commu['c_commu_category'] = get_array_one4db($sql);

	$c_commu['c_member_admin'] = db_common_c_member4c_member_id($c_commu['c_member_id_admin']);

	return $c_commu;
}

/**
コミュニティメンバーのリストを得る

[引数]
$target_c_commu_id
$limit

[返り値]
c_member_id
request
photo_url
name
*/
function p_c_home_c_commu_member_list4c_commu_id( $target_c_commu_id ,$limit)
{
	$sql = 'SELECT c_member.*'
			. ' FROM c_member, c_commu_member'
			. " WHERE c_member.c_member_id = c_commu_member.c_member_id" .
		" AND c_commu_id=".quotearray4db($target_c_commu_id).
		" ORDER BY RAND()";
	if ($limit) {
		$sql .= " LIMIT ". no_quote4db($limit);
	}
	$lst = get_array_list4db( $sql );

	foreach ($lst as $key => $value) {
		$lst[$key]['friend_count'] = p_common_count_friends4c_member_id($value['c_member_id']);
	}
	return $lst;
}

function p_c_home_new_topic_comment4c_commu_id($target_c_commu_id , $limit, $event_flag = 0)
{
	$sql = "select cct.c_commu_topic_id , cct.name, MAX(cctc.r_datetime) as r_datetime , cct.c_commu_id, " .
			" cctc.image_filename1, cctc.image_filename2, cctc.image_filename3, " .
			" cctc.file_filename1, cctc.file_filename2, cctc.file_filename3  " .
			" from c_commu_topic_comment as cctc , c_commu_topic as cct" .
			" where cctc.c_commu_topic_id = cct.c_commu_topic_id " .
			" and cct.event_flag = ".no_quote4db($event_flag) .
			" and cct.c_commu_id = ".no_quote4db($target_c_commu_id) .
			" group by cct.c_commu_topic_id " .
			" order by r_datetime desc " .
			" limit ".no_quote4db($limit);

	$list = get_array_list4db($sql);
	foreach ($list as $key => $value) {
		$list[$key]['count_comments'] =
			_db_count_c_commu_topic_comments4c_commu_topic_id($value['c_commu_topic_id']);
	}

	return $list;
}

/**
 * コミュニティに招待するMyフレンドのリストを得る
 *
 * @param	int $c_member_id
 * @param	int $c_commu_id
 * @return	ソースを参考に
 *
 * @sort	c_member_id順
 * @limit	無し
 * @仕様	コミュニティに参加していないMyフレンドを全員表示
 */
function p_c_invite_invite_list4c_member_id4c_commu_id($c_member_id, $c_commu_id)
{
	//友達リスト
	$sql = "select c_member_id_to from c_friend where c_member_id_from = ".quotearray4db($c_member_id)."";
	$friend_list = get_one_list4db($sql);

	//参加者リスト
	$sql = "select c_member_id from c_commu_member where c_commu_id = ".quotearray4db($c_commu_id)."";
	$member_list = get_one_list4db($sql);

	//友達リストから参加者リストを引く
	$result = array_diff($friend_list,$member_list);

	if($result==null) {
		return null;
	} else {
		$result = implode ( ",", $result);

		$sql = 'SELECT c_member_id, nickname '
			. ' FROM c_member'
			. ' WHERE c_member_id'
			. ' IN ( '. $result. ') ';

		return get_array_list4db($sql);
	}
}

function p_c_member_list_c_commu_member_count4c_commu_id($c_commu_id)
{
	$sql = 'SELECT count(*)'
		. ' FROM c_commu_member'
		. ' WHERE c_commu_id = '. quote4db($c_commu_id);

	return get_one4db($sql);
}

function p_c_member_list_c_members4c_commu_id($c_commu_id, $page_size, $page)
{
	$page = intval($page);
	$page_size = intval($page_size);

	$sql = 'SELECT c_member.c_member_id, nickname, image_filename'
		. ' FROM c_member, c_commu_member'
		. ' WHERE c_member.c_member_id = c_commu_member.c_member_id' .
				' AND c_commu_member.c_commu_id = '.quotearray4db($c_commu_id).
		' limit '. no_quote4db(($page-1) * $page_size) . ', '. no_quote4db($page_size);
	$list = get_array_list4db($sql);

	foreach($list as $key => $value) {
		$list[$key]['friend_count'] = p_common_count_friends4c_member_id($value['c_member_id']);
	}

	$sql = "select count(*) from c_commu_member where c_commu_id = ".quotearray4db($c_commu_id)."";
	$total_num = get_one4db($sql);

	if($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num) {
			$next = false;
		} else {
			$next = true;
		}

		if($page <= 1) {
			$prev = false;
		} else {
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list , $prev , $next, $total_num, $start_num, $end_num);
}

function p_c_member_list_c_commu4c_commu_id($c_commu_id){
	return _db_c_commu4c_commu_id($c_commu_id);
}

function p_c_join_request_c_commu4c_commu_id($c_commu_id){
	return _db_c_commu4c_commu_id($c_commu_id);
}

function p_c_invite_c_commu4c_commu_id($c_commu_id){
	return _db_c_commu4c_commu_id($c_commu_id);
}

/**
フレンドの日記を得る

[引数]
c_diary_id

[返り値]
r_datetime
subject
body
c_diary_id
*/
function p_fh_diary_c_diary4c_diary_id($c_diary_id)
{
	return _db_c_diary4c_diary_id($c_diary_id);
}

/**
 * 日記のコメントリストを得る
 *
 *
 * @param	c_diary_id
 * @param	limit
 * @return	array_of_array
 *			c_diary_comment_id
 *			c_member_id
 *			nickname
 *			body
 *			r_datetime
 */
/**
日記のコメントリストを得る

[引数]
target_c_diary_id

[返り値]
c_member_id
r_datetime
body
c_diary_comment_id
*/
function p_fh_diary_c_diary_comment_list4c_diary_id($target_c_diary_id)
{
	$sql = "SELECT c_member.nickname, c_diary_comment.*" .
		" FROM c_diary_comment LEFT JOIN c_member USING (c_member_id)" .
		" WHERE c_diary_id = ".quotearray4db($target_c_diary_id) .
		" ORDER BY c_diary_comment.r_datetime";

	return get_array_list4db($sql);
}

//shou050621
/**
 * 日記のコメントリスト（好きなID(複数)）を得る
 *
 *
 * @param	c_diary_comment_id(array)
 * @param	limit
 * @return	array_of_array
 *			c_diary_comment_id
 *			c_member_id
 *			nickname
 *			body
 *			r_datetime
 */
/**
日記のコメントリスト（好きなID(複数)から）を得る

[引数]
target_c_diary_comment_id

[返り値]
c_member_id
r_datetime
body
c_diary_comment_id
*/
function p_fh_diary_c_diary_comment_list4c_diary_comment_id($target_c_diary_comment_id, $limit=0)
{
	if (!count($target_c_diary_comment_id)) return 0;

	$sql = "SELECT c_member.nickname,c_diary_comment.*" .
		" FROM c_diary_comment" .
			" LEFT JOIN c_member USING (c_member_id)".
		" WHERE c_diary_comment.c_diary_comment_id" .
			" IN (" . no_quote4db(implode(',', $target_c_diary_comment_id)) . ")" .
		" ORDER BY c_diary_comment.r_datetime DESC";

	if ($limit) {
		$sql .= " LIMIT $limit";
	}

	return get_array_list4db($sql);
}

/**
 * フレンドの新着日記リスト
 *
 * @param	int $c_member_id
 * @param	int	$page_number	取得するページ番号
 * @param	int	$page_size		1ページ当たりの数
 * @return	array_of_array
 * 				c_diary.c_diary_id,
 * 				c_diary.subject,
 * 				c_diary.body_outline
 * 				c_diary.num_comment
 */
/**
メンバーの日記のリストを得る

[引数]
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
r_datetime
c_diary_id
subject
num_comment
*/
function p_fh_diary_list_diary_list4c_member_id($target_c_member_id, $page_size, $page)
{
	$page = intval($page);
	$page_size = intval($page_size);

	$select = "SELECT *" .
			" FROM c_diary" .
			" WHERE c_member_id= ".quotearray4db($target_c_member_id)."";
	$order = " ORDER BY r_datetime DESC";
	$limit = " LIMIT ".no_quote4db(($page-1)*$page_size).",".no_quote4db($page_size);

	$sql = $select . $order . $limit;

	$list = get_array_list4db($sql);

	foreach($list as $key => $c_diary) {
		$list[$key]['num_comment'] = p_common_count_c_diary_comment4c_diary_id($c_diary['c_diary_id']);
	}

	$sql = "select count(*) from c_diary where c_member_id = ".quotearray4db($target_c_member_id)."";
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}

		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}
	return array($list , $prev , $next);
}

function p_common_count_c_diary_comment4c_diary_id($c_diary_id)
{
	$sql = 'SELECT COUNT(*)'
		. ' FROM c_diary_comment'
		. " WHERE c_diary_id=".quotearray4db($c_diary_id)."";
	return get_one4db($sql);
}

/**
fhページのタイプを取得
[引数]
$target_c_member_id		フレンドのメンバID
$u						自分のメンバID

[返り値]
f or h
*/
function p_fh_friend_list_get_type($target_c_member_id,$u){
	// ナビゲーションタイプ : "h" | "f" | "c"
	if(!$target_c_member_id){
		$target_c_member_id = $u;
		$type = "h";
	} elseif($target_c_member_id == $u) {
		$type = "h";
	} else {
		$type = "f";
	}
	return $type;
}

/**
 * メンバーIDから友達の数を返す
 *
 * @param  int $c_member_id
 * @return int 友達の数
 */
/**
メンバーIDから友達の数

[引数]
c_member_id

[返り値]
target_friend_num
*/
function p_fh_friend_list_friend_num4c_member_id($c_member_id)
{
	if (!$c_member_id) {
		return 0;
	}
	$sql = "SELECT count(*) FROM c_friend WHERE c_member_id_from=".quotearray4db($c_member_id)."";
	return get_one4db($sql);
}

function p_fh_friend_list_friend_list4c_member_id2($c_member_id, $page_size, $page, $orderby)
{
	switch ($orderby) {
	case "ld":
		$orderby = "m.access_date DESC";
		break;
	case "la":
		$orderby = "m.access_date";
		break;
	case "rd":
		$orderby = "f.r_datetime DESC";
		break;
	case "ra":
		$orderby = "f.r_datetime";
		break;
	default:
		$orderby = "f.r_datetime DESC";
	}
	$limit = no_quote4db(($page-1)*$page_size).",$page_size";

	$sql = "SELECT" .
		  " m.c_member_id, m.access_date, m.nickname, m.image_filename" .
		  ", f.intro, f.r_datetime" .
		" FROM c_member AS m, c_friend AS f" .
		" WHERE f.c_member_id_from=". quote4db($c_member_id) .
		  " AND f.c_member_id_to=m.c_member_id" .
		" ORDER BY ". no_quote4db($orderby) .
		" LIMIT ".no_quote4db($limit);

	$friend_list = get_array_list4db($sql);

	foreach($friend_list as $key => $value) {
		$friend_list[$key]['friend_count'] = p_common_count_friends4c_member_id($value['c_member_id']);
	}

	$total_num = p_common_count_friends4c_member_id($c_member_id);
	$total_page_num =  ceil($total_num / $page_size);

	$next = ($page < $total_page_num);
	$prev = ($page > 1);

	return array($friend_list , $prev , $next,$total_page_num);
}

function p_fh_intro_intro_list4c_member_id($target_c_member_id)
{
	$select = "SELECT " .
				"c_member_id," .
				"image_filename,".
				"nickname,".
				"intro ".
			"FROM c_member,c_friend";

	$where = " WHERE c_member_id_to=".quotearray4db($target_c_member_id)."" .
			" AND c_member_id_from=c_member.c_member_id" .
			" AND intro != ''";

	$sql = $select . $where;

	$list = get_array_list4db($sql);
	return  $list;
}

function p_fh_intro_intro_list_with_my_intro4c_member_id($target_c_member_id)
{
	$sql = "SELECT c_member.c_member_id,c_member.image_filename,c_member.nickname,c_friend.intro,";
	$sql .= " CASE WHEN c_friend_by_me.intro IS NOT NULL AND c_friend_by_me.intro!='' THEN 1 ELSE 0 END AS has_intro_by_me";
	$sql .= " FROM c_member";
	$sql .= " INNER JOIN c_friend";
	$sql .= " ON(c_friend.c_member_id_from=c_member.c_member_id)";
	$sql .= " LEFT JOIN c_friend c_friend_by_me";
	$sql .= " ON(c_friend_by_me.c_member_id_to=c_member.c_member_id)";
	$sql .= " WHERE c_friend.c_member_id_to=" . quote4db($target_c_member_id);
	$sql .= " AND c_friend.intro!=''";
	$sql .= " AND c_friend_by_me.c_member_id_from=" . quote4db($target_c_member_id);

	$list = get_array_list4db($sql);
	return $list;
}

/**
 * メンバーと自分の中間のフレンドを得る
 *
 * [引数]
 * $c_member_id
 * $target_c_member_id
 *
 * [返り値]
 * nickname
 * c_member_id_nakatomo
 * nickname_nakatomo
 */
function p_f_home_friend_path4c_member_ids($c_member_id, $target_c_member_id)
{
	$is_friend = _db_is_friend($c_member_id, $target_c_member_id);
	if($is_friend){
		$ret = null;
	}else{
		//自分の友達リスト
		$sql = "select c_member_id_to from c_friend where c_member_id_from = ".quotearray4db($c_member_id)."";
		$c_member_id_list = get_one_list4db($sql);

		//相手の友達リスト
		$sql = "select c_member_id_to from c_friend where c_member_id_from = ".quotearray4db($target_c_member_id)."";
		$target_c_member_id_list =  get_one_list4db($sql);

		//共通の友達
		$result_list = array_intersect($c_member_id_list, $target_c_member_id_list);

		if(count($result_list) != 0){
			$result_key = array_rand($result_list,1);
			$result_id = $result_list[$result_key];
		}else{
			$result_id = null;
		}

		if($result_id) {
			$c_member_nakatomo	= db_common_c_member4c_member_id($result_id);
		}
		$ret = $c_member_nakatomo;
	}
	return $ret;
}

/**
フレンドからのコメントリスト

[引数]
target_c_member_id

[返り値]
c_member_id
image_filename
nickname
intro
*/
function p_f_home_c_friend_comment4c_member_id($target_c_member_id)
{
	$select = "SELECT " .
				"c_member_id," .
				"image_filename,".
				"nickname,".
				"intro ".
			"FROM c_member,c_friend";

	$where = " WHERE c_member_id_to=".quotearray4db($target_c_member_id)."" .
			" AND c_member_id_from=c_member.c_member_id" .
			" AND intro != ''";

	$limit = " LIMIT 5";

	$order = " ORDER BY r_datetime_intro DESC";

	$sql = $select . $where . $order .$limit;

	return get_array_list4db($sql);
}

/**
c_friend取得
*/
function p_common_c_friend4c_member_id_from4c_member_id_to($c_member_id_from,$c_member_id_to){
	$sql =	"select c_friend_id,".
				"c_member_id_from,".
				"c_member_id_to,".
				"intro,".
				"r_datetime ".
			"from c_friend ".
			"where c_friend.c_member_id_from = ".quotearray4db($c_member_id_from)." ".
				"and c_friend.c_member_id_to = ".quotearray4db($c_member_id_to)." ".
				"AND intro != '' ";
	$ret = get_array_one4db($sql);
	return $ret;
}

/*
フレンドリスト

[引数]
target_c_member_id

[返り値]
c_member_id
image_filename
nickname
intro
*/
function p_f_home_c_friend_list4c_member_id($target_c_member_id, $limit = 0){
	$sql =	"SELECT c_member_id,".
				"image_filename,".
				"nickname".
			" FROM c_member,".
				"c_friend".
			" WHERE c_member.c_member_id = c_friend.c_member_id_to".
				" AND c_friend.c_member_id_from = ".quote4db($target_c_member_id).
			" ORDER BY RAND()";
	if ($limit) {
		$sql .= " LIMIT " . no_quote4db($limit);
	}
	$result = get_array_list4db($sql);

	foreach($result as $key=>$value) {
		$result[$key]['friend_count'] = p_common_count_friends4c_member_id($value['c_member_id']);
	}
	return $result;
}

/**
日記のリスト

[引数]
target_c_member_id

[返り値]
r_date
c_diary_id
subject
*/
function p_f_home_c_diary_list4c_member_id($target_c_member_id)
{
	$sql = "select *" .
			" from c_diary where c_member_id = ".quotearray4db($target_c_member_id)." order by r_datetime desc";
	$sql .= " LIMIT 5";
	$lst = get_array_list4db($sql);

	foreach($lst as $key => $value) {
		$lst[$key]['comment_count'] = p_common_count_c_diary_comment4c_diary_id($value['c_diary_id']);
	}

	return $lst;
}

function p_f_home_c_commu_list4c_member_id($c_member_id, $limit = 0)
{
	$sql = "SELECT c_commu.c_commu_id, c_commu.image_filename, c_commu.name" .
   		" FROM c_commu ,c_commu_member " .
		" WHERE c_commu_member.c_member_id = ". quote4db($c_member_id).
		" AND c_commu.c_commu_id =  c_commu_member.c_commu_id" .
		" ORDER BY RAND()";
	if ($limit) {
		$sql .= " LIMIT " . no_quote4db($limit);
	}

	$lst = get_array_list4db($sql);
	foreach($lst as $key => $value) {
		$lst[$key]['count_commu_member'] = _db_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
	}
	return $lst;
}

function p_f_intro_edit_intro_body4c_member_id($u, $target_c_member_id)
{
	$sql = "select intro from c_friend where c_member_id_to = ".quotearray4db($target_c_member_id)." and c_member_id_from = ".quotearray4db($u)."";
	return get_one4db($sql);
}

/**
 * メンバーを紹介する自分のフレンドリストを得る
 */
function p_f_invite_invite_list4c_member_ids($target_c_member_id, $u)
{
	//自分の友達リスト
	$sql = "SELECT c_member_id_to FROM c_friend WHERE c_member_id_from=".quotearray4db($u)."";
	$my_flist = get_one_list4db($sql);

	//ターゲットの友達リスト
	$sql = "SELECT c_member_id_to FROM c_friend WHERE c_member_id_from=".quotearray4db($target_c_member_id)."";
	$target_flist = get_one_list4db($sql);

	$target_flist[] = $target_c_member_id;

	//自分の友達リストからターゲットの友達を引く
	$result = array_diff($my_flist, $target_flist);

	$list = array();
	foreach ($result as $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value);
		$list[] = $c_member;
	}
	return $list;
}

/**
 * あしあとリスト取得
 * 同一人物・同一日付のアクセスは最新の日時だけ
 *
 * @param	int $c_member_id_to		: 訪問された人
 * @param	int	$limit
 * @return	array_of_array  c_ashiato.*
 */
function p_h_ashiato_c_ashiato_list4c_member_id($c_member_id_to, $limit)
{
	$sql = "SELECT c_ashiato_id, c_member_id_from, c_member_id_to, c_ashiato.r_date" .
		", c_ashiato.r_datetime AS r_datetime " .
		" FROM c_ashiato" .
		" INNER JOIN c_member ON c_ashiato.c_member_id_from = c_member.c_member_id" .
		" WHERE c_member_id_to = " . quote4db($c_member_id_to) .
		" ORDER BY r_datetime DESC" .
		" LIMIT " . no_quote4db($limit);
	return get_array_list4db($sql);
}

/**
 * 総あしあと取得(最新順、同一人物は最新のみ)
 *
 * @param	int $c_member_id_to		: 訪問された人
 * @return	array_of_array  c_ashiato.*
 */
//shou050627
function p_h_ashiato_c_ashiato_num4c_member_id($c_member_id)
{
  //あしあと件数を取得
	$sql = "SELECT COUNT(*) FROM c_ashiato" .
			" WHERE c_member_id_to = ". quote4db($c_member_id);
	return get_one4db($sql);
}

/**
 * ashiato_mail_num取得
 *
 * @param	int $c_member_id
 * @return	int ashiato_mail_num
 */
//shou050627
function p_h_ashiato_ashiato_mail_num4c_member_id($c_member_id)
{
  //ashiato_mail_numを取得
  $sql = "select ashiato_mail_num from c_member where c_member_id = ". no_quote4db($c_member_id);
	return get_one4db($sql);
}

/**
カテゴリー情報を取得
自主カテゴリのみ

[引数]

[返り値]
c_commu_category_id
name
*/
function p_h_com_add_c_commu_category4null()
{
	$sql = 'SELECT c_commu_category.c_commu_category_id , c_commu_category.name, c_commu_category.sort_order, c_commu_category.c_commu_category_parent_id '
		. ' FROM c_commu_category, c_commu_category_parent'
		. ' WHERE c_commu_category.c_commu_category_parent_id = c_commu_category_parent.c_commu_category_parent_id '
		. ' ORDER BY c_commu_category_parent.sort_order,c_commu_category.sort_order';
	return  get_array_list4db($sql);
}

/**
 * カテゴリ情報をIDから取得
 *
 * @param	c_commu_category_id
 * @return	array
 *				c_commmu_category_id
 *				name
 *				c_commu_category_parent_id
 */
/**
カテゴリ情報を取得

[引数]
c_commu_category_id

[返り値]
name
c_commu_category_parent_id(PHPで使用)
*/
function p_h_com_category_c_commu_category4c_commu_category_id($c_commu_category_id)
{
  $where = " where c_commu_category_parent.c_commu_category_parent_id = c_commu_category.c_commu_category_parent_id ";
  if(!$c_commu_category_id || $c_commu_category_id == "all"){//全体から検索
	$where .= "";
  }else{
	$where .= " and c_commu_category_id=".quotearray4db($c_commu_category_id)."";
  }
  $sql = 'select c_commu_category_id , c_commu_category.name , c_commu_category.sort_order , c_commu_category.c_commu_category_parent_id'
	. " FROM c_commu_category , c_commu_category_parent "
	. $where
	." LIMIT 1";

	return get_array_one4db($sql);
}

/**
 * 親カテゴリ情報を取得
 */
function p_h_com_category_c_commu_category_parent4c_commu_category_parent_id($c_commu_category_parent_id)
{
	$sql = 'SELECT `c_commu_category_parent_id` , `name` , `sort_order`' .
		" FROM c_commu_category_parent"
		." WHERE c_commu_category_parent_id=".quotearray4db($c_commu_category_parent_id).""
		." LIMIT 1";
	return get_array_one4db($sql);
}

/**
検索結果のコミュニティリスト

[引数]
$search_word
$target_c_commu_category_id

[返り値]
c_commu_id
name
count_commu_member
*/
function p_h_com_category_search_c_commu4c_commu_category($search_word, $target_c_commu_category_id)
{
	$where = "where 1 ";
	if($target_c_commu_category_id != "all" && $target_c_commu_category_id){
		$where .= " and c_commu_category_id = ".quotearray4db($target_c_commu_category_id)."";
	}
	if($search_word){
		$search_word=no_quote4db($search_word);
		$where .= " and search_word like '%$search_word%'";
	}
	$order = " order by name";
	$sql = "select c_commu_id,name from c_commu " . $where . $order;

	$list = get_array_list4db($sql);
	for($i=0;$i < count($list);$i++){
	  $c_commu_id = $list[$i]['c_commu_id'];
	  $sql = "select count(*) from c_commu_member where c_commu_id = ".quotearray4db($c_commu_id);
	  $num = get_one4db($sql);
	  $list[$i]['count_commu_member'] = $num;
	}
	return $list;
}

function p_h_com_find_all_search_c_commu4c_commu_category(
			$search_word,
			$target_c_commu_category_parent_id,
			$page_size,
			$page,
			$val_order = 'r_datetime',
			$target_c_commu_category_id = 0)
{
	$page = intval($page);
	$page_size = intval($page_size);

	$where = " WHERE 1";
	//カテゴリ絞り
	if ($target_c_commu_category_id) {
		$where .= " AND c_commu.c_commu_category_id = ".quote4db($target_c_commu_category_id);
	}
	//and検索を実装
	//info name も検索
	if ($search_word) {
		$search_word = no_quote4db($search_word);
		$search_word_list = explode(" ", $search_word);

		foreach ($search_word_list as $word) {
			$word = check_search_word($word);

			$where .= " AND (c_commu.name LIKE '%".$word."%'" .
						" OR c_commu.info LIKE '%".$word."%')";
		}
	}

	$select = "SELECT c_commu.*";
	$limit = " LIMIT " . no_quote4db(($page-1)*$page_size) . ",".no_quote4db($page_size);

	switch ($val_order) {
	case 'r_datetime':
	default:
		$from = " FROM c_commu";
		$order = ' ORDER BY c_commu.r_datetime DESC';
		$sql = $select.$from.$where.$order.$limit;
		break;

	case 'count':
		$from = " FROM c_commu, c_commu_member";
		$order = ' ORDER BY count_commu_member DESC';
		$group = ' GROUP BY c_commu_member.c_commu_id';
		$sql = $select . ", COUNT(c_commu_member.c_member_id) as count_commu_member" .
			$from .
			$where . ' AND c_commu_member.c_commu_id = c_commu.c_commu_id' .
			$group .
			$order .
			$limit;
		break;
	}

	$list = get_array_list4db($sql);
	foreach ($list as $key => $value) {
		$sql = "SELECT name FROM c_commu_category" .
			" WHERE c_commu_category_id = " . quote4db($value['c_commu_category_id']);
		$list[$key]['c_commu_category_name'] = get_one4db($sql);

		if (!isset($value['count_commu_member'])) {
			$sql = "SELECT COUNT(*) FROM c_commu_member" .
				" WHERE c_commu_id = " . quote4db($value['c_commu_id']);
			$list[$key]['count_commu_member'] = get_one4db($sql);
		}
	}

	$sql = 'SELECT COUNT(*)' .
		' FROM c_commu' .
		$where;
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if ($page >= $total_page_num) {
			$next = false;
		} else {
		  $next = true;
		}
		if ($page <= 1) {
			$prev = false;
		} else {
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);
}

/**
 * あなたにフレンドリンクを要請しているメンバー
 *
 * @param	int $c_member_id_to	: 要請されている方(あなた)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: 要請している人の名前
 * 				image_filename	: 要請している人の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($c_member_id_to)
{
	$sql = 'SELECT `c_friend_confirm_id` , `c_member_id_from` , `c_member_id_to` , `r_datetime` , `message` '
."FROM c_friend_confirm WHERE c_member_id_to=".quotearray4db($c_member_id_to)."";
	$sql .= " ORDER BY r_datetime DESC";
	$c_friend_confirm_list = get_array_list4db($sql);

	foreach ($c_friend_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_from']);
		$c_friend_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_friend_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_friend_confirm_list;
}

/**
 * あなたがフレンドリンクを要請しているメンバー
 *
 * @param	int $c_member_id_from	: 要請している方(あなた)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: 要請されている人の名前
 * 				image_filename	: 要請されている人の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($c_member_id_from)
{
	$sql = 'SELECT `c_friend_confirm_id` , `c_member_id_from` , `c_member_id_to` , `r_datetime` , `message` '
. "FROM c_friend_confirm WHERE c_member_id_from=".quotearray4db($c_member_id_from)."";
	$sql .= " ORDER BY r_datetime DESC";
	$c_friend_confirm_list = get_array_list4db($sql);

	foreach ($c_friend_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
		$c_friend_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_friend_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_friend_confirm_list;
}

/**
 * あなたに(の)管理コミュニティに参加を希望しているメンバー
 *
 * @param	int $c_member_id	: 要請されている方(あなた＝管理者)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*
 * 				c_commu_name	: コミュニティの名前
 * 				nickname		: 要請している人の名前
 * 				image_filename	: 要請している人の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($c_member_id)
{
	$sql = "SELECT cmc.*, c.name AS c_commu_name";
	$sql .= " FROM c_commu_member_confirm AS cmc, c_commu AS c";
	$sql .= " WHERE c.c_member_id_admin=".quotearray4db($c_member_id)." AND cmc.c_commu_id=c.c_commu_id";
	$c_commu_member_confirm_list = get_array_list4db($sql);

	foreach ($c_commu_member_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id']);
		$c_commu_member_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_commu_member_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_commu_member_confirm_list;
}
/**
 * あなたがコミュニティ参加要請しているコミュニティ
 *
 * @param	int $c_member_id	: 要請している方(あなた)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*,
 * 				c_commu_name		: コミュニティの名前
 * 				c_member_id_admin	: 管理者のメンバーID
 * 				nickname			: 管理者の名前
 * 				image_filename		: 管理者の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($c_member_id)
{
	$sql = "SELECT cmc.*, c.name AS c_commu_name, c.c_member_id_admin";
	$sql .= " FROM c_commu_member_confirm AS cmc, c_commu AS c";
	$sql .= " WHERE cmc.c_member_id=".quotearray4db($c_member_id)." AND cmc.c_commu_id=c.c_commu_id";
	$c_commu_member_confirm_list = get_array_list4db($sql);

	foreach ($c_commu_member_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_admin']);
		$c_commu_member_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_commu_member_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_commu_member_confirm_list;
}

/**
 * あなたにコミュニティ管理者交代を希望しているメンバー
 *
 * @param	int $c_member_id_to	: 要請されている方(あなた)
 * @return	array_of_array
 * 				c_commu_admin_cofirm.*
 * 				c_commu_name		: コミュニティ名
 * 				c_member_id_admin	: 要請している人(＝現管理者)のID
 * 				nickname			: 要請している人の名前
 * 				image_filename		: 要請している人の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anatani_c_commu_admin_confirm_list4c_member_id($c_member_id_to)
{
	$sql = "SELECT cac.*, c.name AS c_commu_name, c.c_member_id_admin";
	$sql .= " FROM c_commu_admin_confirm AS cac, c_commu AS c";
	$sql .= " WHERE cac.c_member_id_to=".quotearray4db($c_member_id_to)." AND cac.c_commu_id=c.c_commu_id";
	$c_commu_admin_confirm_list = get_array_list4db($sql);

	foreach ($c_commu_admin_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_admin']);
		$c_commu_admin_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_commu_admin_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_commu_admin_confirm_list;
}

/**
 * あなたがコミュニティ管理者交代を要請しているメンバー
 *
 * @param	int $c_member_id_admin	: 要請している方(あなた)
 * @return	array_of_array
 * 				c_commu_admin_cofirm.*
 * 				nickname			: 要請されている人の名前
 * 				image_filename		: 要請されている人の画像
 * @see		h_confirm_list.php
 */
function p_h_confirm_list_anataga_c_commu_admin_confirm_list4c_member_id($c_member_id_admin)
{
	$sql = "SELECT cac.*, c.name AS c_commu_name, c.c_member_id_admin";
	$sql .= " FROM c_commu_admin_confirm AS cac, c_commu AS c";
	$sql .= " WHERE c.c_member_id_admin=".quotearray4db($c_member_id_admin)." AND cac.c_commu_id=c.c_commu_id";
	$c_commu_admin_confirm_list = get_array_list4db($sql);

	foreach ($c_commu_admin_confirm_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
		$c_commu_admin_confirm_list[$key]['nickname'] = $c_member['nickname'];
		$c_commu_admin_confirm_list[$key]['image_filename'] = $c_member['image_filename'];
	}
	return $c_commu_admin_confirm_list;
}

// p_fh_diary_c_diary4c_diary_id と同じ
function p_h_diary_edit_c_diary4c_diary_id($c_diary_id)
{
	return _db_c_diary4c_diary_id($c_diary_id);
}

/**
 *
 *
 *
 * @param	int c_member_id
 * @return	array_of_array
 * 			r_datetime
 * 			c_diary_id
 * 			nick_name
 * 			subject
 * 			first_body			(全角24文字程度)
 */
/**
フレンドの最新日記リスト

[引数]
c_member_id
$page_size
$page

[返り値]
r_datetime
c_diary_id
subject
c_member_id
nick_name
first_body
*/
function p_h_diary_list_friend_h_diary_list_friend4c_member_id($c_member_id, $page_size, $page ,$limit_days)
{
	$last_week = date("Y-m-d H:i:s", strtotime("-{$limit_days} days"));
	$from = "c_diary, c_friend";
	$where = "c_friend.c_member_id_from=". quote4db($c_member_id) .
			" AND c_diary.c_member_id = c_friend.c_member_id_to" .
			" AND c_diary.r_datetime > '{$last_week}'";

	$sql = "SELECT c_diary.* FROM {$from} WHERE {$where}" .
			" ORDER BY c_diary.r_datetime DESC" .
			" LIMIT ". no_quote4db($page_size * ($page - 1)). ",". no_quote4db($page_size);
	$lst = get_array_list4db($sql);

	foreach($lst as $key=>$value) {
		$lst[$key]['count_comments'] = p_common_count_c_diary_comment4c_diary_id($value['c_diary_id']);
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	$sql = "SELECT count(*) FROM {$from} WHERE {$where}";
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}

		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	return array($lst , $prev , $next, $total_num);
}

/**
 *
 *
 *
 * @param	int c_member_id
 * @return	array_of_array
 * 			r_datetime
 * 			c_diary_id
 * 			nick_name
 * 			subject
 * 			first_body			(全角24文字程度)
 */
/**
フレンドの最新日記リスト

[引数]
c_member_id
$page_size
$page

[返り値]
r_datetime
c_diary_id
subject
c_member_id
nick_name
first_body
*/
function p_h_blog_list_friend_h_blog_list_friend4c_member_id($c_member_id, $page_size=20, $page)
{
	$sql = "SELECT c_rss_cache.*, c_member.nickname" .
		" FROM c_rss_cache, c_friend, c_member" .
		" WHERE c_member.c_member_id=c_friend.c_member_id_to" .
		" AND c_rss_cache.c_member_id=c_friend.c_member_id_to" .
		" AND c_friend.c_member_id_from=".quotearray4db($c_member_id)."";

	$sql .= " ORDER BY c_rss_cache.r_datetime DESC".
			" LIMIT ".no_quote4db(($page-1) * $page_size) .",".no_quote4db($page_size);
	$lst = get_array_list4db($sql);

	$sql = "SELECT count(*)" .
		" FROM c_rss_cache, c_friend, c_member" .
		" WHERE c_member.c_member_id=c_friend.c_member_id_to" .
		" AND c_rss_cache.c_member_id=c_friend.c_member_id_to" .
		" AND c_friend.c_member_id_from=".quotearray4db($c_member_id)."";
	$total_num = get_one4db($sql);
	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}

		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	return array($lst , $prev , $next);
}

function p_h_home_h_blog_list_friend4c_member_id($c_member_id, $page_size = 5)
{
	$sql = "SELECT c_rss_cache.*, c_member.nickname" .
		" FROM c_rss_cache, c_member" .
		" WHERE c_member.c_member_id=c_rss_cache.c_member_id" .
		" AND c_rss_cache.c_member_id=".quotearray4db($c_member_id)."";

	$sql .= " ORDER BY c_rss_cache.r_datetime DESC".
			" LIMIT " . no_quote4db($page_size);

	return get_array_list4db($sql);
}

function p_common_c_siteadmin4target_pagename($target_pagename)
{
	$sql =	"SELECT body FROM c_siteadmin ".
		"WHERE target=" . quote4db($target_pagename) .
		" LIMIT 1";
	return get_one4db($sql);
}

//shou050603
/**
 * 日記の未読コメントの数を数える
 *
 * @return  num_diary_not_is_read
 */
/**

[引数]
$u (c_member_id)

[返り値]

*/
function p_h_diary_count_c_diary_not_is_read4c_member_id($u)
{
	$sql = "select count(*) from c_diary";
	$sql .= " WHERE is_checked=0";
	$sql .= " AND c_member_id=". quote4db($u);
	return get_one4db( $sql );
}

//shou050603
/**
 * 日記の未読コメントの中で読ませるもの(c_diary_id)を返す
 *
 *
 * @return  first_diary_read
 */
/**

[引数]
$u (c_member_id)

[返り値]
c_diary_id
*/

function p_h_diary_c_diary_first_diary_read4c_member_id($u)
{
	$sql = "select c_diary_id from c_diary";
	$sql .= " WHERE is_checked=0";
	$sql .= " AND c_member_id=". quote4db($u);
	$sql .= " ORDER BY r_datetime";
	$sql .= " LIMIT 1";
	return get_one4db( $sql );
}

//shou050603
/**
 * 日記を読んだかどうかを更新
 *
 * c_diary.is_checkedを更新
 *
 * @return
 */
/**
[引数]
$target_c_diary_id
$val 0 or 1

[返り値]

*/
function p_h_diary_update_c_diary_is_checked4c_dirary_id($target_c_diary_id, $val)
{
	$sql = "UPDATE c_diary SET is_checked=". quote4db($val);
	$sql .= " WHERE c_diary_id=". quote4db($target_c_diary_id);
	mysql_query($sql);
}

/**
 * フレンド最新日記リスト取得
 *
 * @param	int c_member_id
 * @param	int limit
 * @return	array_of_array  (c_diary.*, nickname)
 */
/**
フレンド最新日記リスト取得

[引数]
$c_member_id
$limit

[返り値]
r_datetime
nickname
c_diary_id
subject
*/
function p_h_home_c_diary_friend_list4c_member_id($c_member_id, $limit)
{
	$sql = "SELECT c_diary.*";
	$sql .= " FROM c_diary, c_friend";
	$sql .= " WHERE c_friend.c_member_id_from=". quote4db($c_member_id);
	$sql .= " AND c_diary.c_member_id=c_friend.c_member_id_to";
	$sql .= " ORDER BY r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($limit);
	$c_diary_friend_list = get_array_list4db($sql);

	foreach($c_diary_friend_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id']);
		$c_diary_friend_list[$key]['nickname'] = $c_member['nickname'];
		$c_diary_friend_list[$key]['count_comments'] = p_common_count_c_diary_comment4c_diary_id($value['c_diary_id']);
	}
	return $c_diary_friend_list;
}

/**
 * 参加コミュニティ新着書き込みリスト取得
 *
 * @param	int $c_member_id
 * @param	int $limit
 * @return	array_of_array
 * 				c_commu_topic_comment.*,
 * 				c_commu_name,
 * 				c_commu_topic_name,
 * 				nickname,
 * 				body_outline
 */
/**
参加コミュニティ新着書き込みリスト取得

[引数]
$c_member_id
$limit

[返り値]
c_commu_id
c_commu_name
c_commu_topic_id
c_commu_topic_name
r_datetime
body_outline
*/
function p_h_home_c_commu_topic_comment_list4c_member_id($c_member_id, $limit)
{
//    $sql = "SELECT cc.*";
	$sql = "SELECT cc.c_commu_topic_id, c.name AS c_commu_name, ct.name AS c_commu_topic_name , cm.c_member_id, cc.number, max(cc.r_datetime) as r_datetime";
//    $sql .= ", c.name AS c_commu_name, ct.name AS c_commu_topic_name";
	$sql .= " FROM c_commu_member AS cm, c_commu_topic_comment AS cc";
	$sql .= ", c_commu AS c, c_commu_topic AS ct";
	$sql .= " WHERE cm.c_member_id=". quote4db($c_member_id);
	$sql .= " AND cc.c_commu_id=cm.c_commu_id";
	$sql .= " AND c.c_commu_id=cm.c_commu_id";
	$sql .= " AND ct.c_commu_id=cm.c_commu_id";
	$sql .= " AND ct.c_commu_topic_id=cc.c_commu_topic_id";
	$sql .= " group by c_commu_topic_id, c_commu_name, c_commu_topic_name ,c_member_id ";
	$sql .= " ORDER BY r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($limit);
	$c_commu_topic_list = get_array_list4db($sql);

	foreach($c_commu_topic_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id']);
		$c_commu_topic_list[$key]['nickname'] = $c_member['nickname'];
		$c_commu_topic_list[$key]['body_outline'] = mb_substr($value['body'], 0, 20);

		$sql = " select number, image_filename1, image_filename2, image_filename3, " .
				" file_filename1, file_filename2, file_filename3 " .
				"from c_commu_topic_comment " .
				" where c_commu_topic_id = " .no_quote4db($value['c_commu_topic_id']).
				" and r_datetime = " . quote4db($value['r_datetime']);
		$temp = get_array_one4db($sql);

		//最新の書き込み番号
		$sql = "SELECT MAX(number) FROM c_commu_topic_comment".
			   " where c_commu_topic_id = " .no_quote4db($value['c_commu_topic_id']);

		$number = get_one4db($sql);

		$c_commu_topic_list[$key]['number'] = $number;
		$c_commu_topic_list[$key]['image_filename1'] = $temp['image_filename1'];
		$c_commu_topic_list[$key]['image_filename2'] = $temp['image_filename2'];
		$c_commu_topic_list[$key]['image_filename3'] = $temp['image_filename3'];
		$c_commu_topic_list[$key]['file_filename1'] = $temp['file_filename1'];
		$c_commu_topic_list[$key]['file_filename2'] = $temp['file_filename2'];
		$c_commu_topic_list[$key]['file_filename3'] = $temp['file_filename3'];
	}
	return $c_commu_topic_list;
}

/**
 * 参加コミュニティのリスト
 *
 * @param int $c_member_id
 * @param int $limit
 * @return	array コミュニティ情報
 */
function p_h_home_c_commu_list4c_member_id($c_member_id, $limit)
{
	$sql = "SELECT c.* FROM c_commu_member AS cm, c_commu AS c";
	$sql .= " WHERE cm.c_member_id=".quote4db($c_member_id);
	$sql .= " AND c.c_commu_id=cm.c_commu_id";
	$sql .= " ORDER BY RAND()";
	$sql .= " LIMIT ".no_quote4db($limit);
	$c_commu_list = get_array_list4db($sql);

	foreach($c_commu_list as $key => $value) {
		$c_commu_list[$key]['count_commu_members'] =
		_db_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
	}
	return $c_commu_list;
}

/**
 * メッセージを読んだことにする
 *
 * c_message.is_readを更新
 *
 * @return
 */
/**
メッセージを読んだことにする
！受信側の場合のみ

[引数]
$target_c_message_id
$u (c_member_id)

[返り値]

*/
function p_h_message_update_c_message_is_read4c_message_id($target_c_message_id, $u)
{
	$sql = "UPDATE c_message SET is_read=1";
	$sql .= " WHERE c_message_id=". quote4db($target_c_message_id);
	$sql .= " AND c_member_id_to=". quote4db($u);
	$sql .= " LIMIT 1";
	return mysql_query($sql);
}

//shou050603
/**
 * 未読メッセージの数を数える
 *
 * @return  num_message_not_is_read
 */
/**

[引数]
$u (c_member_id)

[返り値]

*/
function p_h_message_count_c_message_not_is_read4c_member_to_id($u)
{
	$sql = "select count(*) from c_message";
	$sql .= " WHERE is_read=0 AND is_send=1";
	$sql .= " AND c_member_id_to=". quote4db($u);
	return get_one4db( $sql );
}

/**
メッセージ取得

[引数]
$c_message_id
$u

[返り値]
is_received
r_datetime
c_member_id_from
c_member_nickname_from
c_member_nickname_to
c_member_id_to
subject
body
is_syoudaku
*/
function p_h_message_c_message4c_message_id($c_message_id,$u){
	$c_message = _db_c_message4c_message_id($c_message_id);

	if($c_message['c_member_id_to'] == $u) {
		// 受信メッセージ
		$c_message['is_received'] = true;
		$c_message['image_filename_disp'] = $c_message['c_member_image_filename_from'];
	} elseif ($c_message['c_member_id_from'] == $u) {
		// 送信メッセージ
		$c_message['is_received'] = false;
		$c_message['image_filename_disp'] = $c_message['c_member_image_filename_to'];
	}

	return $c_message;
}

/**
 * メンバーからの受信メッセージ(範囲指定)
 *
 * @param	int $c_member_id
 * @param	int	$page			取得するページ番号
 * @param	int	$page_size		1ページ当たりの数
 * @return	array_of_array
 * 				c_message.*
 * 				nickname		: 送信者名
 * 				image_filename	: 送信者画像
 * @see		h_message_box.php
 */
/**
メンバーからの受信メッセージ

[引数]
$c_member_id
$page_size	１ページに表示する数
$page_number	ページ番号

[返り値]
tplからの要求
is_read
r_datetime
nickname
c_message_id
subject
*/
//shou050614
function p_h_message_box_c_message_received_user_list4c_member_id4range($c_member_id, $page_number, $page_size)
{
	$start = ($page_number - 1) * $page_size;

	$sql = "SELECT * FROM c_message";
	$where .= "c_member_id_to = ". quote4db($c_member_id) .
			" AND is_deleted_to = 0" .
			" AND is_send = 1";
	$sql .= " WHERE $where";
	$sql .= " ORDER BY r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$c_message_list = get_array_list4db($sql);

	foreach($c_message_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_from']);
		$c_message_list[$key]['nickname'] = $c_member['nickname'];
		$c_message_list[$key]['image_filename'] = $c_member['image_filename'];
	}

	$sql = "SELECT COUNT(*) FROM c_message" .
			" WHERE $where";

	$total_num = get_one4db($sql);

	if ($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if ($page_number >= $total_page_num) {
			$next = false;
		} else {
			$next = true;
		}
		if ($page_number <= 1) {
			$prev = false;
		} else {
			$prev = true;
		}
	}

	return array($c_message_list , $prev , $next);
}

/**
 * 送信メッセージリスト取得(範囲指定)
 *
 * @param	int $c_member_id
 * @param	int	$page_number	取得するページ番号
 * @param	int	$page_size		1ページ当たりの数
 * @return	array_of_array
 * 				c_message.*
 * 				nickname		: 受信者名
 * 				image_filename	: 受信者画像
 * @see		h_message_box.php
 */
/**
送信メッセージリスト取得

[引数]
$page_size	１ページに表示する数
$page_number	ページ番号

[返り値]
is_read
r_datetime
nickname
c_message_id
subject
*/
//shou050614
function p_h_message_box_c_message_sent_list4c_member_id4range($c_member_id, $page_number, $page_size)
{
	$start = ($page_number - 1) * $page_size;

	$sql = "SELECT * FROM c_message";
	$where = "c_member_id_from = " . quote4db($c_member_id) .
			" AND is_deleted_from = 0" .
			" AND is_send = 1";
	$sql .= " WHERE $where";
	$sql .= " ORDER BY r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($start).", ".no_quote4db($page_size);
	$c_message_list = get_array_list4db($sql);

	foreach($c_message_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
		$c_message_list[$key]['nickname'] = $c_member['nickname'];
		$c_message_list[$key]['image_filename'] = $c_member['image_filename'];
	}

	$sql = 	"SELECT COUNT(*) FROM c_message WHERE $where";
	$total_num = get_one4db($sql);

	if ($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if ($page_number >= $total_page_num) {
			$next = false;
		} else {
			$next = true;
		}
		if ($page_number <= 1) {
			$prev = false;
		} else {
			$prev = true;
		}
	}

	return array($c_message_list , $prev , $next);
}

//shou050609
/**
 * 下書き保存メッセージリスト取得(範囲指定)
 *
 * @param	int $c_member_id
 * @param	int	$page_number	取得するページ番号
 * @param	int	$page_size		1ページ当たりの数
 * @return	array_of_array
 * 				c_message.*
 * 				nickname		: 受信者名
 * 				image_filename	: 受信者画像
 * @see		h_message_box.php
 */
/**
下書き保存メッセージリスト

[引数]
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
r_datetime
nickname
c_message_id
subject
*/
//shou050614
function p_h_message_box_c_message_save_list4c_member_id4range($c_member_id, $page_number, $page_size)
{
	$start = ($page_number - 1) * $page_size;

	$sql = "SELECT * FROM c_message";
	$where = "c_member_id_from = ".quote4db($c_member_id) .
			" AND is_send = 0" .
			" AND is_deleted_from = 0";
	$sql .= " WHERE $where";
	$sql .= " ORDER BY r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($start).", ".no_quote4db($page_size);
	$c_message_list = get_array_list4db($sql);

	foreach($c_message_list as $key => $value) {
		$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
		$c_message_list[$key]['nickname'] = $c_member['nickname'];
		$c_message_list[$key]['image_filename'] = $c_member['image_filename'];
	}

	$sql = "SELECT COUNT(*) FROM c_message WHERE $where";
	$total_num = get_one4db($sql);

	if ($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if ($page_number >= $total_page_num) {
			$next = false;
		} else {
			$next = true;
		}
		if ($page_number <= 1){
			$prev = false;
		} else {
			$prev = true;
		}
	}

	return array($c_message_list , $prev , $next);
}

//shou050609
//shou050614
/**
 * ごみ箱メッセージリスト取得(範囲指定)
 *
 * @param	int $c_member_id
 * @param	int	$page_number	取得するページ番号
 * @param	int	$page_size		1ページ当たりの数
 * @return	array_of_array
 * 				c_message.*
 * 				nickname		: 受信者名
 * 				image_filename	: 受信者画像
 * @see		h_message_box.php
 */
/**
ごみ箱メッセージリスト

[引数]
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
r_datetime
nickname
c_message_id
subject
*/
function p_h_message_box_c_message_trash_list4c_member_id4range($c_member_id, $page_number, $page_size)
{
	$start = ($page_number - 1) * $page_size;

	$where = "(" .
			"c_member_id_from = " . quote4db($c_member_id) .
			" AND is_deleted_from = 1" .
			" AND is_kanzen_sakujo_from = 0" .
		") OR (" .
			"c_member_id_to = " . quote4db($c_member_id) .
			" AND is_deleted_to = 1" .
			" AND is_kanzen_sakujo_to = 0" .
		")";

	$sql = "SELECT * FROM c_message" .
			" WHERE {$where}" .
			" ORDER BY r_datetime DESC" .
			" LIMIT " . no_quote4db($start) . ", " . no_quote4db($page_size);
	$c_message_list = get_array_list4db($sql);

	$sql = 	"SELECT COUNT(*) FROM c_message WHERE $where";
	$total_num = get_one4db($sql);

	if ($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if ($page_number >= $total_page_num) {
			$next = false;
		} else {
			$next = true;
		}
		if ($page_number <= 1) {
			$prev = false;
		} else {
			$prev = true;
		}
	}

	foreach($c_message_list as $key => $value) {
		if ($value['c_member_id_to'] == $c_member_id) {
			$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_from']);
		} else {
			$c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
		}
		$c_message_list[$key]['nickname'] = $c_member['nickname'];
		$c_message_list[$key]['image_filename'] = $c_member['image_filename'];
	}

	return array($c_message_list , $prev , $next);
}

/**
 * 都道府県リスト
[引数]

[返り値]

 * @return	array_of_array  c_profile_pref_list
 *							c_profile_pref_id => name
 */
function p_regist_prof_c_profile_pref_list4null() {
	$sql = 'SELECT `c_profile_pref_id` , `pref` , `sort_order` '
	." FROM c_profile_pref WHERE 1 ORDER BY sort_order";
	$array_list = get_array_list4db($sql);

	$pref_list = array();
	foreach ($array_list as $value) {
		$key = $value['c_profile_pref_id'];
		$pref_list[$key] = $value['pref'];
	}
	return $pref_list;
}

/**
 * 月リスト
[引数]

[返り値]

 *
 * @return	array_of_array	c_profile_grad_year
 *							c_profile_month_id => name
 */
function p_regist_prof_c_profile_month_list4null(){
	$list = array(
		"1" => "1",
		"2" => "2",
		"3" => "3",
		"4" => "4",
		"5" => "5",
		"6" => "6",
		"7" => "7",
		"8" => "8",
		"9" => "9",
		"10" => "10",
		"11" => "11",
		"12" => "12",
	);
	return $list;
}

/** 関数
 * k_p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
 *
 * コミュニティメール受信設定を取得
 *
 * [引数]
 * c_commu_id
 * c_member_id
 *
 * [戻り値]
 * is_receive_mail
 *
 */
function p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
{
	$sql = "SELECT is_receive_mail ";
	$sql .= " FROM c_commu_member ";
	$sql .= " WHERE c_commu_id=". quote4db($c_commu_id) .
			" AND c_member_id=". quote4db($c_member_id);
	return get_one4db($sql);
}

/** 関数
 * p_c_home_is_receive_mail_pc4c_commu_id4c_member_id($c_commu_id, $c_member_id)
 *
 * コミュニティメール(PC)受信設定を取得
 *
 * [引数]
 * c_commu_id
 * c_member_id
 *
 * [戻り値]
 * is_receive_mail_pc
 *
 */
function p_c_home_is_receive_mail_pc4c_commu_id4c_member_id($c_commu_id, $c_member_id)
{
	$sql = "SELECT is_receive_mail_pc ";
	$sql .= " FROM c_commu_member ";
	$sql .= " WHERE c_commu_id=". quote4db($c_commu_id) .
			" AND c_member_id=". quote4db($c_member_id);
	return get_one4db($sql);
}

/**
 * 日リスト
[引数]

[返り値]

 *
 * @return	array_of_array	c_profile_day
 *							c_profile_day_id => name
 */
function p_regist_prof_c_profile_day_list4null(){
	$list = array(
		"1" => "1",
		"2" => "2",
		"3" => "3",
		"4" => "4",
		"5" => "5",
		"6" => "6",
		"7" => "7",
		"8" => "8",
		"9" => "9",
		"10" => "10",
		"11" => "11",
		"12" => "12",
		"13" => "13",
		"14" => "14",
		"15" => "15",
		"16" => "16",
		"17" => "17",
		"18" => "18",
		"19" => "19",
		"20" => "20",
		"21" => "21",
		"22" => "22",
		"23" => "23",
		"24" => "24",
		"25" => "25",
		"26" => "26",
		"27" => "27",
		"28" => "28",
		"29" => "29",
		"30" => "30",
		"31" => "31",
	);
	return $list;
}

function _db_c_commu_category4null(){
	$sql = 'SELECT c_commu_category.*'
		. ' FROM c_commu_category, c_commu_category_parent'
		. ' WHERE c_commu_category.c_commu_category_parent_id = c_commu_category_parent.c_commu_category_parent_id';
	return  get_array_list4db( $sql );
}

/**
あしあとを付ける

*/
function p_etc_do_ashiato($c_member_id_to, $c_member_id_from)
{
	// 同一人物の場合は記録しない
	if ($c_member_id_to == $c_member_id_from) {
		return false;
	}

	// 一定時間以内の連続アクセスは記録しない
	$wait = date('Y-m-d H:i:s', strtotime('-1 minute'));
	$sql = "SELECT COUNT(*) FROM c_ashiato" .
			" WHERE r_datetime > ". quote4db($wait).
			" AND c_member_id_to = ". quote4db($c_member_id_to).
			" AND c_member_id_from = ". quote4db($c_member_id_from).
			" LIMIT 1";
	if (get_one4db($sql)) {
		return false;
	}

	$sql = 'INSERT INTO c_ashiato (c_member_id_from, c_member_id_to, r_datetime, r_date) '
		. ' VALUES ('.quotearray4db($c_member_id_from, $c_member_id_to).', NOW(), NOW())';
	if (_insert4db($sql) <= 0) {
		return false;
	}

	if ($ashiato_mail_num = p_h_ashiato_ashiato_mail_num4c_member_id($c_member_id_to)) {
		//総足あと数を取得
		$ashiato_num = p_h_ashiato_c_ashiato_num4c_member_id($c_member_id_to);

		//あしあとお知らせメールを送る
		if ($ashiato_num == $ashiato_mail_num) {
			do_common_send_ashiato_mail($c_member_id_to, $c_member_id_from);
		}
	}

	return true;
}

/**
秘密の質問を得る

*/
function p_common_c_password_query4null(){
	$sql =	"SELECT `c_password_query_id` , `c_password_query_question` ".
			"FROM c_password_query";
	$arr = get_array_list4db($sql);

	$ret = array();
	foreach($arr as $key => $value){
		$c_password_query_id = $value['c_password_query_id'];
		$ret[$c_password_query_id] = $value['c_password_query_question'];
	}

	return $ret;
}

/**
アクセス日時を更新

*/
function p_common_do_access($c_member_id){
	$sql =	"UPDATE c_member SET access_date=NOW() ".
			"WHERE c_member_id=".quote4db($c_member_id);
	return _mysql_query4db($sql);
}

/**
アクティブユーザーか？

*/
function p_common_is_active_c_member_id($c_member_id){
	$is_active = false;
	$c_member = db_common_c_member4c_member_id($c_member_id);

	if( $c_member ){
		$is_active = true;
	}

	return $is_active;
}

/**
RSS日記を使用しているか？

[引数]
$c_member_id

[返り値]
is_rss_diary
*/
function p_common_is_rss_diary4c_member_id($c_member_id){
	$is_rss_diary = false;
	{
		$c_member =db_common_c_member4c_member_id($c_member_id);

		if( $c_member['rss'] ){
			$is_rss_diary = true;
		}
	}
	return $is_rss_diary;
}

function p_common_c_commu4c_commu_id($target_c_commu_id){
	return _db_c_commu4c_commu_id($target_c_commu_id);
}

/**
 * コミュニティ管理者かどうか？
 */
function p_common_is_c_commu_admin4c_member_id($c_commu_id,$c_member_id)
{
	return  _db_is_c_commu_admin($c_commu_id, $c_member_id);
}

function p_common_is_c_commu_member4c_commu_idAc_member_id($c_commu_id, $c_member_id)
{
	return _db_is_c_commu_member($c_commu_id, $c_member_id);
}

/*
 * イベントのメンバーかどうか
 */
function p_common_is_c_event_member4c_commu_topic_idAc_member_id($c_commu_topic_id,$u){
	return _db_is_c_event_member($c_commu_topic_id,$u);
}

/*
 * イベントの管理者かどうか
 */
function p_common_is_c_event_admin4c_commu_topic_idAc_member_id($c_commu_topic_id,$u){
	return _db_is_c_event_admin($c_commu_topic_id,$u);
}

function p_common_is_c_commu_view4c_commu_idAc_member_id($c_commu_id,$c_member_id){
	$ret = false;
	$c_commu = _db_c_commu4c_commu_id($c_commu_id);

	$is_c_commu_member = _db_is_c_commu_member($c_commu_id, $c_member_id);

	switch($c_commu['public_flag']){
		case "public":
			$ret = true;
			break;
		case "auth_public":
			$ret = true;
			break;
		case "auth_sns":
			$ret = true;
			break;
		case "auth_commu_member":
			if( $is_c_commu_member ){
				$ret = true;
			}else{
				$ret = false;
			}
			break;
	}
	return $ret;
}

function p_common_is_friend($c_member_id1, $c_member_id2){
	return _db_is_friend($c_member_id1, $c_member_id2);
}

/**
セッションからc_member_preを返す

*/
function p_common_c_member_pre4c_member_pre_session($session){
	$sql = "SELECT * FROM c_member_pre" .
		" WHERE session=".quote4db($session);
	$c_member = get_array_one4db($sql);

	//秘密の質問
	$c_password_query_id = $c_member['c_password_query_id'];
	$c_password_query_list = p_common_c_password_query4null();

	$c_member['c_password_query_name'] = $c_password_query_list["$c_password_query_id"];

	$sql = "SELECT *" .
		" FROM c_member_pre_profile" .
			" INNER JOIN c_profile USING (c_profile_id)" .
		" WHERE c_member_pre_id = " . quote4db($c_member['c_member_pre_id']);
	$c_member['profile'] = get_array_list4db($sql);

	return $c_member;
}

function n_regist_intro_is_active_sid($sid)
{
	$sql = "SELECT * FROM c_member_pre"
		." WHERE session=". quote4db($sid);
	return get_array_one4db($sql);
}

function p_common_is_active_c_diary_id($c_diary_id)
{
	$sql = "SELECT count(*) FROM c_diary WHERE c_diary_id=".quote4db($c_diary_id);
	if (get_one4db($sql)) {
		return true;
	} else {
		return false;
	}
}

// 前日のアクセスランキング
function p_h_ranking_c_ashiato_ranking($limit)
{
	$today = date("Y-m-d 00:00:00");
	$yesterday = date("Y-m-d 00:00:00", strtotime("-1 day"));

	$sql = "SELECT c_member_id_to as c_member_id, count(*) as count" .
		" FROM c_ashiato" .
		" INNER JOIN c_member ON c_ashiato.c_member_id_to = c_member.c_member_id" .
		" WHERE r_datetime >= '$yesterday' AND r_datetime < '$today'" .
		" GROUP BY c_member_id_to" .
		" ORDER BY count DESC" .
		" LIMIT $limit";
	return get_array_list4db($sql);
}

function p_h_ranking_c_friend_ranking($limit)
{
	$sql = "SELECT c_member_id_to as c_member_id, count(*) as count" .
		" FROM c_friend" .
		" GROUP BY c_member_id_to" .
		" ORDER BY count DESC" .
		" LIMIT " .no_quote4db($limit);
	return get_array_list4db($sql);
}

function p_h_ranking_c_commu_member_ranking($limit)
{
	$sql = "SELECT c_commu_id, count(*) as count" .
		" FROM c_commu_member" .
		" GROUP BY c_commu_id" .
		" ORDER BY count DESC" .
		" LIMIT " .no_quote4db($limit);
	return get_array_list4db($sql);
}

// 前日のランキング
function p_h_ranking_c_commu_topic_comment_ranking($limit)
{
	$today = date("Y-m-d 00:00:00");
	$yesterday = date("Y-m-d 00:00:00", strtotime("-1 day"));

	$sql = "SELECT c_commu_id, count(*) as count" .
		" FROM c_commu_topic_comment" .
		" WHERE r_datetime >= '$yesterday' AND r_datetime < '$today'" .
		" GROUP BY c_commu_id" .
		" ORDER BY count DESC" .
		" LIMIT " .no_quote4db($limit);
	return get_array_list4db($sql);
}

function p_h_bookmark_list($c_member_id, $page, $page_size){
	$start = ($page - 1) * $page_size;

	$sql = "select c_member_id, nickname, image_filename, access_date"
		." from c_member as cm, c_bookmark as cb"
		." where cm.c_member_id = cb.c_member_id_to and "
		." cb.c_member_id_from = ".no_quote4db($c_member_id)
		." order by cb.r_datetime desc"
		." LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$lst = get_array_list4db($sql);

	foreach($lst as $key => $value){
		$lst[$key]['profile'] = db_common_c_member_profile_list4c_member_id($value['c_member_id']);
		$lst[$key]['last_login'] = p_f_home_last_login4access_date($value['access_date']);
	}

	$sql = "select count(*)"
		." from c_member as cm, c_bookmark as cb"
		." where cm.c_member_id = cb.c_member_id_to and "
		." cb.c_member_id_from = ".no_quote4db($c_member_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	return array($lst,$prev,$next,$total_num);
}

function p_c_topic_list_c_topic_list4target_c_commu_id($target_c_commu_id,$page,$page_size = 20, $c_member_id){
	$start = ($page - 1) * $page_size;

	$sql = " select cct.c_commu_topic_id , max(cctc.r_datetime) as newest_write_datetime " .
			" from c_commu_topic as cct, c_commu_topic_comment as cctc " .
			" where cct.c_commu_topic_id = cctc.c_commu_topic_id " .
			" and cct.c_commu_id = " . no_quote4db($target_c_commu_id).
			" group by c_commu_topic_id " .
			" order by newest_write_datetime desc".
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);
	$lst = get_array_list4db($sql);

	foreach($lst as $key=>$value){
		$sql = "select cct.c_commu_topic_id, cct.name, cct.r_datetime, cctc.body, cctc.image_position, cct.event_flag, " .
				" cctc.image_filename1, cctc.image_filename2, cctc.image_filename3, " .
				" cctc.file_filename1, cctc.file_filename2, cctc.file_filename3 " .
				" from c_commu_topic as cct, c_commu_topic_comment as cctc " .
				" where cct.c_commu_topic_id = cctc.c_commu_topic_id" .
				" and cctc.number = 0" .
				" and cct.c_commu_topic_id = ". no_quote4db($value['c_commu_topic_id']);
		$lst[$key] = get_array_one4db($sql);
	}

	//キーがc_commu_topic_id、値が書き込み数の配列をつくる
	$sql = "select c_commu_topic_id , MAX(number) as num " .
			"from c_commu_topic_comment " .
			"group by c_commu_topic_id ";
	$lst2 = get_array_list4db($sql);
	$write_num = array();
	foreach($lst2 as $key => $value){
		$write_num[$value['c_commu_topic_id']] = $value['num'];
	}

	foreach($lst as $key => $value){

		$lst[$key][is_c_event_member] = _db_is_c_event_member($value['c_commu_topic_id'],$c_member_id);
		$lst[$key][is_c_topic_admin] = _db_is_c_topic_admin($value['c_commu_topic_id'],$c_member_id);
		$lst[$key][write_num] = $write_num[$value['c_commu_topic_id']];
	}

	$sql =   "select count(*) from c_commu_topic where c_commu_id = ".quotearray4db($target_c_commu_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}
	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($lst, $prev, $next, $total_num, $start_num, $end_num);

}

function c_topic_detail_c_topic4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT ct.*, ctc.*, c_member.nickname" .
		" FROM c_commu_topic AS ct" .
			" LEFT JOIN c_member USING (c_member_id)" .
			", c_commu_topic_comment AS ctc" .
		" WHERE ct.c_commu_topic_id = ctc.c_commu_topic_id " .
			" AND ct.c_commu_topic_id = ".no_quote4db($c_commu_topic_id) .
			" AND ctc.number = 0";

	return get_array_one4db($sql);
}

function c_event_detail_c_topic4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT cct.*, cctc.*, cm.nickname, cpp.pref" .
		" FROM c_commu_topic as cct" .
		" LEFT JOIN c_commu_topic_comment as cctc ON cct.c_commu_topic_id = cctc.c_commu_topic_id" .
		" LEFT JOIN c_member as cm ON cct.c_member_id = cm.c_member_id" .
		" LEFT JOIN c_profile_pref as cpp ON cct.open_pref_id = cpp.c_profile_pref_id" .
		" WHERE cct.c_commu_topic_id = ". quote4db($c_commu_topic_id) .
			" AND cctc.delete_reason IS NULL " .
			" AND cctc.number = 0";
	$lst = get_array_one4db($sql);

	$sql = "SELECT COUNT(*) FROM c_event_member" .
		" WHERE c_commu_topic_id = " . quote4db($c_commu_topic_id);
	$lst['member_num'] = get_one4db($sql);

	return $lst;
}

function c_event_detail_c_topic_write4c_commu_topic_id($c_commu_topic_id,$page,$page_size){
	$start = ($page - 1) * $page_size;

	$sql = "SELECT ctc.*, c_member.nickname " .
		" FROM c_commu_topic_comment AS ctc" .
			" LEFT JOIN c_member USING (c_member_id)" .
		" WHERE ctc.c_commu_topic_id = ".quote4db($c_commu_topic_id).
			" AND ctc.number > 0 " .
		" ORDER BY ctc.r_datetime DESC " .
		" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);
	$lst = get_array_list4db($sql);

	$sql = "SELECT count(*) FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_id = ".quotearray4db($c_commu_topic_id).
		" AND number > 0";
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}
	$lst = array_reverse($lst);

	$start = reset($lst);
	$start_num = $start['number'];

	$end = end($lst);
	$end_num = $end['number'];

	return array($lst, $prev, $next, $total_num, $start_num, $end_num);
}

function c_event_write_delete_confirm_c_commu_topic_comment4c_commu_topic_comment_id($c_commu_topic_comment_id){

	$sql = "select tc.*,cm.nickname from c_commu_topic_comment as tc " .
			" LEFT JOIN c_member as cm ON cm.c_member_id = tc.c_member_id " .
			" where tc.c_commu_topic_comment_id = ".quotearray4db($c_commu_topic_comment_id);

	return get_array_one4db($sql);
}

function c_event_member_list4c_commu_topic_id($c_commu_topic_id,$limit){
	$sql = "select cm.* from c_member as cm , c_event_member as cem " .
			"where cm.c_member_id = cem.c_member_id " .
			"and cem.c_commu_topic_id = ".quotearray4db($c_commu_topic_id);
	if($limit)$sql .= " LIMIT ".no_quote4db($limit);
	return get_array_list4db($sql);
}

function count_c_event_member_list4c_commu_topic_id($c_commu_topic_id){
	$sql = "select count(*) from c_member as cm , c_event_member as cem " .
			"where cm.c_member_id = cem.c_member_id " .
			"and cem.c_commu_topic_id = ".quotearray4db($c_commu_topic_id);

	return get_one4db($sql);
}

function p_c_event_mail_list4c_commu_topic_id($c_commu_topic_id){

	$sql = "select cm.* from c_member as cm , c_event_member as cem " .
			"where cm.c_member_id = cem.c_member_id " .
			"and cem.c_commu_topic_id = ".quotearray4db($c_commu_topic_id);

	return get_array_list4db($sql);
}

function p_c_event_mail_confirm_list4c_member_ids($c_member_ids){

	$c_member_id_str = no_quote4db(implode(',', $c_member_ids));

	$sql = "select * from c_member " .
			"where c_member_id in (".no_quote4db($c_member_id_str).") ";

	return get_array_list4db($sql);
}

function p_c_event_add_year4null(){
	return array(date("Y"),date("Y", mktime (0,0,0,1,1,date("Y")+1)));
}

function p_c_event_add_confirm_event4request()
{
	$rule = array(
		'target_c_commu_id' => array(
			'type' => 'int',
			'default' => '',
		),
		'title' => array(
			'type' => 'string',
			'default' => '',
		),
		'open_date_year' => array(
			'type' => 'int',
			'default' => '',
		),
		'open_date_month' => array(
			'type' => 'int',
			'default' => '',
		),
		'open_date_day' => array(
			'type' => 'int',
			'default' => '',
		),
		'open_date_comment' => array(
			'type' => 'string',
			'default' => '',
		),
		'open_pref_id' => array(
			'type' => 'int',
			'default' => '',
		),
		'open_pref_comment' => array(
			'type' => 'string',
			'default' => '',
		),
		'detail' => array(
			'type' => 'string',
			'default' => '',
		),
		'invite_period_year' => array(
			'type' => 'int',
			'default' => '',
		),
		'invite_period_month' => array(
			'type' => 'int',
			'default' => '',
		),
		'invite_period_day' => array(
			'type' => 'int',
			'default' => '',
		),
		'image_filename1' => array(
			'type' => 'string',
			'default' => '',
		),
		'image_filename2' => array(
			'type' => 'string',
			'default' => '',
		),
		'image_filename3' => array(
			'type' => 'string',
			'default' => '',
		),
	);
	$validator = new Validator($rule, $_REQUEST);
	$validator->validate();

	$result = $validator->getParams();
	$result['c_commu_id'] = $result['target_c_commu_id'];
	return $result;
}
//shou050607
/**
 * c_commu_category_parent_listを取得
 *
 * @param
 * @return	array $c_commu_category_parent_list
 */
function _db_c_commu_category_parent_list4null() {
	$sql = 'SELECT c_commu_category_parent_id,name'
		. ' FROM c_commu_category_parent '
		. ' ORDER BY sort_order';
	return get_array_list4db( $sql );
}

//shou050607
function check_search_word($search_word)
{
	$search_word = str_replace ( "_", "\_", $search_word);
	$search_word = str_replace ( "%", "\%", $search_word);
	return $search_word;
}

function p_common_c_diary_list4c_member_id($target_c_member_id,$num)
{
	$sql = "select *" .
	" from c_diary where c_member_id = ".quotearray4db($target_c_member_id)." order by r_datetime desc";
	$sql .= " LIMIT $num";
	$lst = get_array_list4db($sql);

	foreach($lst as $key => $value) {
		$lst[$key]['comment_count'] = p_common_count_c_diary_comment4c_diary_id($value['c_diary_id']);
	}

	return $lst;
}

/**
 * 日記コメント記入履歴取得
 *
 * @param	int c_member_id
 * @param	int limit
 * @return	array_of_array  (c_diary.*, nickname)
 */
function p_h_home_c_diary_my_comment_list4c_member_id($c_member_id, $limit)
{
	$sql = "SELECT d.c_diary_id" .
			", d.subject" .
			", m.c_member_id" .
			", m.nickname" .
			", MAX(dc.r_datetime) AS r_datetime" .
			", COUNT(DISTINCT dc.c_diary_comment_id) AS num_comment" .
		" FROM c_diary AS d" .
			" INNER JOIN c_diary_comment AS dc USING (c_diary_id)" .
			" INNER JOIN c_member AS m ON (d.c_member_id = m.c_member_id)".
			", c_diary_comment AS mydc" .
		" WHERE mydc.c_member_id = " . quote4db($c_member_id) .
			" AND mydc.c_diary_id = d.c_diary_id" .
			" AND mydc.c_member_id <> d.c_member_id" .
			" AND DATE_ADD(mydc.r_datetime, INTERVAL 15 DAY) > NOW()" .
		" GROUP BY dc.c_diary_id" .
		" ORDER BY r_datetime DESC" .
		" LIMIT " . no_quote4db($limit);

	return get_array_list4db($sql);
}

function p_h_diary_comment_list_c_diary_my_comment_list4c_member_id($c_member_id, $limit)
{
	$sql = "SELECT d.c_diary_id" .
			", d.subject" .
			", m.c_member_id" .
			", m.nickname" .
			", MAX(dc.r_datetime) AS r_datetime" .
			", COUNT(DISTINCT dc.c_diary_comment_id) AS num_comment" .
		" FROM c_diary AS d" .
			" INNER JOIN c_diary_comment AS dc USING (c_diary_id)" .
			" INNER JOIN c_member AS m ON (d.c_member_id = m.c_member_id)".
			", c_diary_comment AS mydc" .
		" WHERE mydc.c_member_id = " . quote4db($c_member_id) .
			" AND mydc.c_diary_id = d.c_diary_id" .
			" AND mydc.c_member_id <> d.c_member_id" .
		" GROUP BY dc.c_diary_id" .
		" ORDER BY r_datetime DESC" .
		" LIMIT " . no_quote4db($limit);

	return get_array_list4db($sql);}

function p_h_home_c_friend_intro_list4c_member_id($target_c_member_id, $limit = 0)
{
	$sql =	"select c_member_id,".
				"image_filename,".
				"nickname,".
				"intro,".
				"c_member_id_from,".
				"c_member_id_to ".
			"from c_member,".
				"c_friend ".
			"where c_member.c_member_id = c_friend.c_member_id_from ".
				"and c_friend.c_member_id_to = ".quotearray4db($target_c_member_id).
				" AND intro != '' ".
			"order by rand()";
	if ($limit) {
		$sql .= " LIMIT " . no_quote4db($limit);
	}
	$result = get_array_list4db($sql);

	return $result;
}

function p_h_review_add_category($c_review_category_id = ""){

	if($c_review_category_id){
		$sql = "select * from c_review_category" .
				" where c_review_category_id = ".no_quote4db($c_review_category_id);

		$list = get_array_one4db($sql);
	}
	else{
		$sql = "select * from c_review_category";
		$list = get_array_list4db($sql);
	}
	return $list;

}

function p_h_review_add_category_disp(){
	$category = p_h_review_add_category();

	$category_disp = array();
	foreach($category as $value){
		$category_disp[$value['c_review_category_id']] = $value['category_disp'];
	}

	return $category_disp;
}

function p_h_review_add_search_result($keyword, $category_id, $page)
{

	$sql = "SELECT category FROM c_review_category " .
			"WHERE c_review_category_id = " . no_quote4db($category_id);
	if (!$category = get_one4db($sql)) {
		return null;
	}

	require_once(DOCUMENT_ROOT . '/lib/pear/Services/Amazon.php');
	$amazon =& new Services_Amazon(AMAZON_TOKEN, AMAZON_ACCESS_KEY, AMAZON_AFFID);
	$amazon->setLocale(AMAZON_LOCALE);

	$options = array(
		'Keywords' =>  mb_convert_encoding($keyword, 'utf-8'),
		'ItemPage' => $page,
		'ResponseGroup' => 'Images,ItemAttributes',
	);
	$result = $amazon->ItemSearch($category, $options);
	if (PEAR::isError($result)) {
		return null;
	}

	mb_convert_variables("EUC-JP", "auto", $result);

	return array($result['Item'], $page, $result['TotalPages']);
}

function p_h_review_write_product4asin($asin){
	require_once(DOCUMENT_ROOT . '/lib/pear/Services/Amazon.php');
	$amazon =& new Services_Amazon(AMAZON_TOKEN, AMAZON_ACCESS_KEY, AMAZON_AFFID);
	$amazon->setLocale(AMAZON_LOCALE);
	$options = array(
		'ResponseGroup' => 'Images,ItemAttributes',
	);
	$result = $amazon->itemLookup($asin, $options);
	if (PEAR::isError($result)) {
		return null;
	}

	mb_convert_variables("EUC-JP", "auto", $result);
	if (isset($result['Item'][0])) {
		return $result['Item'][0];
	}
}

/*
 * orderby:
 * 		r_datetime 	=> 作成順
 * 		r_num		=> 登録数順
 */
function p_h_review_search_result4keyword_category($keyword, $category_id , $orderby, $page = 1, $page_size = 30){
	$from = " FROM c_review INNER JOIN c_review_comment USING (c_review_id)";

	$where = " WHERE 1";
	if ($keyword)
		$where .= " AND c_review.title LIKE '%" .no_quote4db($keyword). "%'";
	if ($category_id)
		$where .= " AND c_review.c_review_category_id = " .no_quote4db($category_id);

	switch ($orderby) {
	case "r_datetime":
	default:
		$order = " ORDER BY r_datetime DESC";
		break;
	case "r_num":
		$order = " ORDER BY write_num DESC, r_datetime DESC";
		break;
	}

	$start = ($page - 1) * $page_size;

	$sql = "SELECT" .
			" c_review.*" .
			", MAX(c_review_comment.r_datetime) as r_datetime" .
			", COUNT(c_review_comment.c_review_comment_id) AS write_num" .
		$from .
		$where .
		" GROUP BY c_review.c_review_id" .
		$order .
		" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$lst = get_array_list4db($sql);

	//$lstに書き込み数を追加	+ レビュー書き込み内容と日付を追加
	foreach($lst as $key => $value){
		$sql = "SELECT body FROM c_review_comment" .
			" WHERE c_review_id = " . $value['c_review_id'] .
			" ORDER BY r_datetime DESC" .
			" LIMIT 1";
		$lst[$key]['body'] = get_one4db($sql);
	}

	$sql = "SELECT COUNT(DISTINCT c_review.c_review_id)" . $from . $where;
	$total_num = get_one4db($sql);
	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($lst, $prev, $next, $total_num, $start_num, $end_num);
}

function p_h_review_list_product_c_review4c_review_id($c_review_id){
	$sql = "select * from c_review as cr, c_review_category as crc " .
			" where cr.c_review_category_id = crc.c_review_category_id " .
			" and c_review_id = " . no_quote4db($c_review_id);
	return get_array_one4db($sql);
}

function p_h_review_list_product_c_review_list4c_review_id($c_review_id, $page, $page_size=30){
	$start = ($page - 1) * $page_size;

	$sql = "select crc.*, cm.c_member_id, cm.nickname, cm.image_filename from c_review_comment as crc , c_member as cm" .
			" where crc.c_member_id = cm.c_member_id " .
			" and c_review_id = " . no_quote4db($c_review_id) .
			" order by r_datetime desc ".
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);
	$list = get_array_list4db($sql);

	$sql =   "select count(*) from c_review_comment where c_review_id =" . quote4db($c_review_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);
}

function p_fh_review_list_product_c_review_list4c_member_id($c_member_id, $page, $page_size=30){
	$start = ($page - 1) * $page_size;

	$sql = "select crc.*, cr.* , crc2.category_disp " .
			" from c_review_comment as crc , c_review as cr , c_review_category as crc2 " .
			" where crc.c_review_id = cr.c_review_id " .
			" and cr.c_review_category_id = crc2.c_review_category_id " .
			" and crc.c_member_id = " . no_quote4db($c_member_id) .
			" order by crc.r_datetime desc " .
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);
	$list = get_array_list4db($sql);

	//それぞれのレビューの書き込み数を取得
	$sql = "select c_review_id , count(*) as num from c_review_comment " .
			" group by c_review_id ";
	$temp = get_array_list4db($sql);
	$write_num = array();
	foreach($temp as $key => $value){
		$write_num[$value['c_review_id']] = $value['num'];
	}

	//$lstに書き込み数を追加
	foreach($list as $key => $value){
		$list[$key]['write_num'] = $write_num[$value['c_review_id']];
	}

	$sql =   "select count(*) from c_review_comment where c_member_id =" . quote4db($c_member_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);
}

//shou050621
/**
年月日で指定された
メンバーの日記のリストを得る

[引数]
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
r_datetime
c_diary_id
subject
num_comment
*/
function p_fh_diary_list_diary_list_date4c_member_id($target_c_member_id, $year, $month,$day=0)
{
	$next_month = $month+1;
	if($month >= 12){
		$next_month = 1;
		$next_year	= $year + 1;
	}else{

		$next_month = $month + 1;
		$next_year	= $year;

	}

	//日まで指定する
	if($day){

		$s_date = "$year-$month-$day 00:00:00";
		$e_date = "$year-$month-$day 23:59:59";

	}else{

		$s_date = "$year-$month-1 00:00:00";
		$e_date = "$next_year-$next_month-1 00:00:00";

	}

	$select = "SELECT *" .
			" FROM c_diary" .
			" WHERE c_member_id= ".quotearray4db($target_c_member_id).
			" and r_datetime >= ".quote4db($s_date).
			" and r_datetime <  ".quote4db($e_date);
	$order = " ORDER BY r_datetime DESC";

	$sql = $select . $order;

	$list = get_array_list4db($sql);

	foreach($list as $key => $c_diary){
		$list[$key]['num_comment'] = p_common_count_c_diary_comment4c_diary_id($c_diary['c_diary_id']);
	}

	return array($list , false, false);
}

/**
 * 日記ページの「各月の日記」用
 *
 * 日記を最初に書いた月からスタートしてみる
 */
function p_fh_diary_list_date_list4c_member_id($c_member_id)
{
	$sql = "SELECT r_datetime FROM c_diary" .
   		" WHERE c_member_id = " . quote4db($c_member_id) .
   		" ORDER BY r_datetime" .
   		" LIMIT 1";
	if (!$first_datetime = get_one4db($sql)) {
		return array();
	}

	$start_date = getdate(strtotime($first_datetime));
	$end_date =  getdate();

	$date = array();
	$year = $start_date['year'];
	$month = $start_date['mon'];
	while(1) {
		$date[] =  array(
			'year' => $year,
			'month' => $month,
		);

		if ($end_date['year'] <= $year
			&& $end_date['mon'] <= $month) {
			break;
		}

		$month++;
		if($month > 12){
			$month = 1;
			$year++;
		}
	}

	return array_reverse($date);
}

function p_h_review_add_write_c_review_comment4asin_c_member_id($asin, $c_member_id){
	$sql = "select * from c_review as cr, c_review_comment as crc " .
			" where cr.c_review_id = crc.c_review_id " .
			" and cr.asin = " . quote4db($asin) .
			" and crc.c_member_id = ". no_quote4db($c_member_id);
	return get_array_one4db($sql);
}

function p_h_review_clip_list_h_review_clip_list4c_member_id($c_member_id, $page, $page_size=30){
	$start = ($page - 1) * $page_size;

	$sql = "select * from c_review_clip as crc , c_review as cr " .
			" where crc.c_review_id = cr.c_review_id" .
			" and c_member_id = " . no_quote4db($c_member_id).
			" order by crc.r_datetime" .
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$list = get_array_list4db($sql);

	//それぞれのレビューの書き込み数を取得
	$sql = "select c_review_id , count(*) as num from c_review_comment " .
			" group by c_review_id ";
	$temp = get_array_list4db($sql);
	$write_num = array();
	foreach($temp as $key => $value){
		$write_num[$value['c_review_id']] = $value['num'];
	}

	//カテゴリの表示名を取得
	$category_disp = p_h_review_add_category_disp();

	//$lstに書き込み数 + カテゴリ名　を追加
	foreach($list as $key => $value){
		$list[$key]['write_num'] = $write_num[$value['c_review_id']];
		$list[$key]['category_disp'] = $category_disp[$value['c_review_category_id']];
	}

	$sql =   "select count(*) from c_review_clip where c_member_id =" . quote4db($c_member_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);

}

function p_c_member_review_c_member_review4c_commu_id($c_commu_id, $page, $page_size=20){
	$start = ($page - 1) * $page_size;

	$sql = " select cr.*, ccr.*, crc.category_disp " .
			" from c_commu_review as ccr, c_review as cr , c_review_category as crc" .
			" where ccr.c_review_id = cr.c_review_id " .
			" and cr.c_review_category_id = crc.c_review_category_id " .
			" and ccr.c_commu_id =  " .no_quote4db($c_commu_id).
			" order by ccr.r_datetime" .
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$list = get_array_list4db($sql);

	$sql =   "select count(*) from c_commu_review where c_commu_id =" . quote4db($c_commu_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);

}

function c_member_review_add_confirm_c_member_review4c_review_id($c_review_id, $c_member_id){

	$c_review_id_str = implode(',', $c_review_id);
	$sql = "select * from c_review as cr, c_review_comment as crc , c_review_category as crc2 " .
			" where cr.c_review_id = crc.c_review_id " .
			" and cr.c_review_category_id = crc2.c_review_category_id " .
			" and crc.c_member_id = ". no_quote4db($c_member_id).
			" and cr.c_review_id in (".no_quote4db($c_review_id_str).")";

	$list = get_array_list4db($sql);
	return $list;
}

function p_common_is_c_event_member($c_commu_topic_id, $c_member_id)
{
  $sql = "SELECT COUNT(*) FROM c_event_member" .
	  " WHERE c_commu_topic_id=". quote4db($c_commu_topic_id) .
	  " AND c_member_id=". quote4db($c_member_id);
  return get_one4db($sql);
}

function p_h_calendar_birth4c_member_id($month, $c_member_id)
{
  $sql = "SELECT c_member_id_to FROM c_friend" .
	" WHERE c_member_id_from=". quote4db($c_member_id);
  $ids = get_one_list4db($sql);
  $ids[] = $c_member_id;
  $ids = implode(", ", $ids);

  $sql = "SELECT * FROM c_member" .
	" WHERE c_member_id IN (". no_quote4db($ids) . ")" .
	" AND birth_month = ". quote4db($month);
  $list = get_array_list4db($sql);
  $res = array();
  foreach ($list as $item) {
	$day = intval($item['birth_day']);
	$res[$day][] = $item;
  }

  return $res;
}

function p_h_calendar_c_schedule_list4date($year, $month, $day, $c_member_id)
{
	$date = quote4db(sprintf("%04d-%02d-%02d", $year, $month, $day));

	$sql = "SELECT * FROM c_schedule" .
		" WHERE c_member_id=".quote4db($c_member_id) .
		" AND start_date <= {$date}" .
		" AND end_date >= {$date}";
	return get_array_list4db($sql);
}

function p_common_c_schedule4c_schedule_id($c_schedule_id)
{
  $sql = "SELECT * FROM c_schedule" .
	  " WHERE c_schedule_id=". quote4db($c_schedule_id);
  return get_array_one4db($sql);
}

function p_h_manage_friend_c_friend_list_disp4c_member_id($target_c_member_id,$limit){
	$sql =	"select c_member_id,".
				"image_filename,".
				"nickname,".
				"intro,".
				"c_member_id_from,".
				"c_member_id_to ".
			"from c_member,".
				"c_friend ".
			"where c_member.c_member_id = c_friend.c_member_id_from ".
				"and c_friend.c_member_id_to = ".quotearray4db($target_c_member_id)." ".
			"order by rand()";
	if($limit)$sql=$sql." LIMIT $limit";
//				"AND intro != '' ";
	$result = get_array_list4db($sql);

	foreach($result as $key=>$value) {
		$c_friend = p_common_c_friend4c_member_id_from4c_member_id_to( $value['c_member_id_to'], $value['c_member_id_from'] );
		$result[$key]['intro'] = $c_friend['intro'];

		$result[$key]['friend_count'] = p_common_count_friends4c_member_id($value['c_member_id_from']);
	}
	return $result;
}

//shou050623
//c_member_id から自分の日記についてるコメントID(複数)を取得
function p_fh_diary_c_diary_comment_id_list4c_member_id($target_c_member_id)
{
  $sql = "SELECT cdc.c_diary_comment_id FROM c_diary as cd,c_diary_comment as cdc" .
	  " WHERE cd.c_member_id=". quote4db($target_c_member_id).
	  " AND cd.c_diary_id=cdc.c_diary_id";
  return get_one_list4db($sql);
}

/*shou050623

年月 から日記のある日(複数)を取得

param	$year
		$month
		$target_c_member_id

return	$date_list
*/
function p_fh_diary_list_calendar_list4c_member_id($year,$month,$target_c_member_id)
{
  $sql = "SELECT cdc.c_diary_comment_id FROM c_diary as cd,c_diary_comment as cdc" .
	  " WHERE cd.c_member_id=". quote4db($target_c_member_id).
	  " AND cd.c_diary_id=cdc.c_diary_id";
  return get_one_list4db($sql);
}

function p_h_calendar_event4c_member_id($year, $month, $c_member_id)
{
  $sql = "SELECT c_commu_id FROM c_commu_member" .
	" WHERE c_member_id=" . quote4db($c_member_id);
  $ids = get_one_list4db($sql);
  $ids = implode(", ", $ids);
  if (!$ids) {
	return array();
  }

  $sql = "SELECT * FROM c_commu_topic" .
	" WHERE c_commu_id IN ($ids)" .
	" AND event_flag=1" .
	" AND open_date > '".sprintf("%04d-%02d", no_quote4db($year), no_quote4db($month))."-00'" .
	" AND open_date <= '".sprintf("%04d-%02d", no_quote4db($year), no_quote4db($month))."-31'";
  $list = get_array_list4db($sql);

  $res = array();
  foreach ($list as $item) {
	$item['is_join'] = p_common_is_c_event_member($item['c_commu_topic_id'], $c_member_id);

	$day = date('j', strtotime($item['open_date']));
	$res[$day][] = $item;
  }

  return $res;
}

/*
shou050623

新着日記検索
書き込まれてから１週間の全体に公開されている日記を検索
検索ポイントはタイトル、本文
空白（全角半角問わない）でand検索可
*/
function p_h_diary_list_all_search_c_diary4c_diary($keyword,$page_size,$page){

	$page = intval($page);
	$page_size = intval($page_size);

	$where = " WHERE 1";

//and検索を実装
//subject,body を検索
  if($keyword){
	  	$keyword = no_quote4db($keyword);

		//全角空白を半角に統一
		$keyword = str_replace("　", " ", $keyword);
		$keyword_list = explode(" ", $keyword);

		for($i=0;$i < count($keyword_list);$i++){
			$keyword = check_search_word( $keyword_list[$i] );

			$where .= " and (c_diary.subject like '%".$keyword."%' ";
			$where .= " or c_diary.body like '%".$keyword."%') ";
		}
  }
	$where .= " AND c_member.c_member_id = c_diary.c_member_id";
	$where .= " AND c_member.public_flag_diary = 'public'";

  $select = "SELECT c_diary.*";
  $from = " FROM c_diary, c_member";
  $limit = " LIMIT " . no_quote4db(($page-1)*$page_size) . ",".no_quote4db($page_size);
  $order = " ORDER BY r_datetime desc";

  $sql = $select . $from . $where . $order . $limit;

  $list = get_array_list4db($sql);
	foreach ($list as $key => $value) {
		$list[$key]['c_member'] = db_common_c_member_with_profile($value['c_member_id']);

		$c_diary_id = $value['c_diary_id'];
		$sql = "SELECT COUNT(*) ";
		$sql .= "FROM c_diary_comment ";
		$sql .= "WHERE c_diary_id=".quote4db($c_diary_id);
		$list[$key]['comment_count'] = get_one4db($sql);
	}

  $sql =
	"SELECT count(*) "
	. $from
	. $where ;
  $total_num = get_one4db($sql);

  if($total_num != 0){
	$total_page_num =  ceil($total_num / $page_size);
	if($page >= $total_page_num){
	  $next = false;
	}else{
	  $next = true;
	}
	if($page <= 1){
	  $prev = false;
	}else{
	  $prev = true;
	}
  }
  return array($list , $prev , $next, $total_num);
}

/*
指定された年月に日記を書いている日のリストを返す
書いていれば		日記の数
書いていなければ	0
を入れる
*/
function p_h_diary_is_diary_written_list4date($year, $month, $c_member_id)
{
	$is_written_list = array();

	$sql = "SELECT EXTRACT(DAY FROM r_datetime) as day, COUNT(*)" .
		" FROM c_diary" .
		" WHERE c_member_id = " . quote4db($c_member_id) .
		" AND EXTRACT(YEAR FROM r_datetime) = " . quote4db(sprintf('%04d', $year)) .
		" AND EXTRACT(MONTH FROM r_datetime) = " . quote4db(sprintf('%02d', $month)) .
		" GROUP BY day";

	return get_assoc4db($sql);
}

function p_f_home_last_login4access_date($access_date){

	list($access_date_ymd, $access_date_hms) = explode(" ",$access_date);
	list($access_date_year, $access_date_month, $access_date_day) = explode("-",$access_date_ymd);
	list($access_date_hour, $access_date_minute, $access_date_second) = explode(":",$access_date_hms);
	$access_date_time = mktime($access_date_hour, $access_date_minute, $access_date_second, $access_date_month, $access_date_day, $access_date_year);
	$diff = mktime() - $access_date_time;

	$m_diff = ceil($diff / 60);		//時間差　分
	$h_diff = ceil($diff / (60*60));//時間差　時
	$d_diff = ceil($diff / (60*60*24));//時間差　日

	if($m_diff <= 60){

		if($m_diff<= 3){
			$last_login = "3分以内";

		}else if($m_diff<=5){
			$last_login = "5分以内";

		}else if($m_diff<=10){
			$last_login = "10分以内";

		}else if($m_diff<=15){
			$last_login = "15分以内";

		}else if($m_diff<=30){
			$last_login = "30分以内";

		}else if($m_diff<=45){
			$last_login = "45分以内";

		}else{
			$last_login = "60分以内";
		}
	}
	else if($h_diff <= 24){
		$last_login = $h_diff."時間以内";
	}
	else if($d_diff <= 3){
		$last_login = $d_diff."日以内";
	}
	else{
		$last_login = "3日以上";
	}

	return $last_login;
}

function p_common_age4birth($by, $bm, $bd){
	$ty = date("Y");
	$tm = date("m");
	$td = date("d");

	$age = $ty - $by;
	if($tm * 100 + $td < $bm * 100 + $bd) $age--;
	return $age;
}

function p_c_edit_is_topic4c_commu_id($c_commu_id){
	$sql = "select c_commu_topic_id from c_commu_topic " .
			"where c_commu_id = ". no_quote4db($c_commu_id);
	return get_one4db($sql);
}

function p_h_search_result_search($cond, $cond_like, $page_size, $page, $c_member_id, $profiles)
{
	$page = intval($page);
	$page_size = intval($page_size);

	$where = " WHERE 1";

	foreach ($cond as $key => $value) {
		if ($value) {
			if($key == 'image'){
				$where .= " AND image_filename != ''";
			}
			else{
				$where .= " AND ". no_quote4db($key) ." = ".quote4db($value);
				if ($key == 'birth_year') {
					$where .= " AND public_flag_birth_year = 'public'";
				}
			}
		}
	}
	foreach ($cond_like as $key => $value) {
		if ($value) {
		   	$where .= " AND $key LIKE '%".no_quote4db($value)."%'";
		}
	}

	$from = " FROM c_member";
	$order = " ORDER BY c_member_id DESC";

	$sql = "SELECT c_member_id"
		. $from
		. $where
		. $order
		;

	$result_ids = get_one_list4db($sql);

	foreach ($profiles as $key => $value) {
		$sql = "SELECT c_member_id FROM c_member_profile";

		$sql .= " WHERE c_profile_id = ". quote4db($value['c_profile_id']) .
				" AND public_flag = 'public'";
		if ($value['form_type'] == "text" || $value['form_type'] == 'textarea') {
			$sql .= " AND value LIKE '%". no_quote4db($value['value']) ."%'";
		}
		elseif (is_array($value['c_profile_option_id'])) {
			$values = implode(',', array_map('quote4db', $value['c_profile_option_id']));
			$sql .= " AND c_profile_option_id IN (". $values .")";
		}
		else {
			$sql .= " AND c_profile_option_id = ". quote4db($value['c_profile_option_id']);
		}
		$sql .= " ORDER BY c_member_id DESC";

		$ids = get_one_list4db($sql);
		$result_ids = array_values(array_intersect($result_ids, $ids));
	}

	$start = ($page - 1) * $page_size;

	$list = array();
	for ($i = $start; $i < $start + $page_size && $result_ids[$i]; $i++) {
		$c_member = db_common_c_member_with_profile($result_ids[$i], 'public');
		$c_member['last_login'] = p_f_home_last_login4access_date($c_member['access_date']);
		$list[] = $c_member;
	}

	$total_num = count($result_ids);

	if($total_num != 0) {
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = $page + 1;
		}
		if($page <= 1){
			$prev = false;
		}else{
	  		$prev = $page - 1;
		}
  	}
  	return array($list , $prev , $next, $total_num);
}

function p_c_com_add_is_commu4c_commu_name($c_commu_name){

	$sql = "select c_commu_id " .
			" from c_commu " .
			" where name = " . quote4db($c_commu_name);
	return get_one4db($sql);
}

function p_h_diary_list_all_c_rss_cache_list($limit)
{
	$limit = intval($limit);

	$sql = "SELECT * FROM c_rss_cache" .
			" WHERE 1" .
			" ORDER BY r_datetime DESC" .
			" LIMIT ". no_quote4db($limit);
	$lst = get_array_list4db($sql);

	foreach ($lst as $key => $value) {
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	return $lst;
}

function p_h_diary_list_friend_c_rss_cache_list($c_member_id, $limit)
{
	$limit = intval($limit);

	$sql = "SELECT c_rss_cache.* FROM c_rss_cache, c_friend" .
			" WHERE c_friend.c_member_id_from=". quote4db($c_member_id) .
			" AND c_rss_cache.c_member_id=c_friend.c_member_id_to" .
			" ORDER BY r_datetime DESC" .
			" LIMIT ". no_quote4db($limit);
	$lst = get_array_list4db($sql);

	foreach ($lst as $key => $value) {
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	return $lst;
}

function p_fh_diary_list_date_c_rss_cache_list($c_member_id,$year,$month,$day)
{
		$next_month = $month+1;
	if($month >= 12){
		$next_month = 1;
		$next_year	= $year + 1;
	}else{

		$next_month = $month + 1;
		$next_year	= $year;

	}

	//日まで指定する
	if($day){

		$s_date = "$year-$month-$day 00:00:00";
		$e_date = "$year-$month-$day 23:59:59";

	}else{

		$s_date = "$year-$month-1 00:00:00";
		$e_date = "$next_year-$next_month-1 00:00:00";

	}

	$sql = "SELECT * FROM c_rss_cache" .
			" WHERE c_member_id=". quote4db($c_member_id) .
			" and r_datetime >= ".quote4db($s_date).
			" and r_datetime <  ".quote4db($e_date).
			" ORDER BY r_datetime DESC";
	$lst = get_array_list4db($sql);

	foreach ($lst as $key => $value) {
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	return $lst;
}

function p_fh_diary_list_c_rss_cache_list($c_member_id,$page_size, $page)
{

	$sql = "SELECT * FROM c_rss_cache" .
			" WHERE ".
			" c_member_id=". quote4db($c_member_id) .
			" ORDER BY r_datetime DESC".
			" LIMIT ".no_quote4db(($page-1)*$page_size).",".no_quote4db($page_size);
	$lst = get_array_list4db($sql);
	foreach ($lst as $key => $value) {
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	return $lst;
}

function p_fh_diary_list_c_rss_cache_list_date($c_member_id,$year,$month,$day=0)
{
	$next_month = $month+1;
	if($month >= 12){
		$next_month = 1;
		$next_year	= $year + 1;
	}else{

		$next_month = $month + 1;
		$next_year	= $year;

	}

	if($day){

		$s_date = "$year-$month-$day 00:00:00";
		$e_date = "$year-$month-$day 23:59:59";

	}else{

		$s_date = "$year-$month-1 00:00:00";
		$e_date = "$next_year-$next_month-1 00:00:00";

	}

	$select = "SELECT *" .
			" FROM c_rss_cache" .
			" WHERE c_member_id= ".quotearray4db($c_member_id).
			" and r_datetime >= ".quote4db($s_date).
			" and r_datetime <  ".quote4db($e_date);
	$order = " ORDER BY r_datetime DESC";
	$sql = $select . $order;

	$lst = get_array_list4db($sql);
	foreach ($lst as $key => $value) {
		$lst[$key]['c_member'] = db_common_c_member4c_member_id($value['c_member_id']);
	}

	return $lst;
}

function p_h_home_c_review_list4c_member_id($c_member_id){
	$sql = 	"select cm.nickname, cr.c_review_id, cr.title, crc.r_datetime " .
			" from  c_member as cm ".
			" LEFT JOIN c_review_comment as crc ON crc.c_member_id=cm.c_member_id" .
			" LEFT JOIN c_review as cr ON cr.c_review_id=crc.c_review_id".
			" where cm.c_member_id = " .quote4db($c_member_id).
			" AND crc.c_member_id != ''" .
			" order by crc.r_datetime desc " .
			" limit 0,5 ";

	$result = get_array_list4db($sql);
	return $result;
}

function p_h_home_c_friend_review_list4c_member_id($c_member_id){

	$sql = 	"select cm.nickname, cr.c_review_id, cr.title, crc.r_datetime " .
			" from  c_member as cm, c_friend as cf, c_review as cr, c_review_comment as crc " .
			" where cr.c_review_id = crc.c_review_id " .
			" and cf.c_member_id_to = crc.c_member_id " .
			" and cf.c_member_id_to = cm.c_member_id " .
			" and cf.c_member_id_from = ". quote4db($c_member_id) .
			" order by crc.r_datetime desc " .
			" limit 0,5 ";

	$result = get_array_list4db($sql);
	return $result;
}

function p_h_home_c_friend_review_list_more4c_member_id($c_member_id, $page, $page_size){

	$start = ($page - 1) * $page_size;
	$date =date("Y-m-d", mktime (0,0,0,date("m"), date("d")-7, date("Y")));

	$sql = 	"select cm.nickname, cr.c_review_id, cr.title, crc.r_datetime " .
			" from  c_member as cm, c_friend as cf, c_review as cr, c_review_comment as crc " .
			" where cr.c_review_id = crc.c_review_id " .
			" and cf.c_member_id_to = crc.c_member_id " .
			" and cf.c_member_id_to = cm.c_member_id " .
			" and cf.c_member_id_from = ". quote4db($c_member_id) .
			" and crc.r_datetime > $date" .
			" order by crc.r_datetime desc " .
			" LIMIT ".no_quote4db($start).",". no_quote4db($page_size);

	$list = get_array_list4db($sql);

	$sql = 	"select count(*) " .
			" from  c_friend as cf, c_review_comment as crc " .
			" where cf.c_member_id_to = crc.c_member_id " .
			" and cf.c_member_id_from = ". quote4db($c_member_id);
	$total_num = get_one4db($sql);

	if($total_num != 0){
		$total_page_num =  ceil($total_num / $page_size);
		if($page >= $total_page_num){
			$next = false;
		}else{
			$next = true;
		}
		if($page <= 1){
			$prev = false;
		}else{
			$prev = true;
		}
	}

	$start_num = ($page - 1) * $page_size + 1 ;
	$end_num =   ($page - 1) * $page_size + $page_size > $total_num ? $total_num : ($page - 1) * $page_size + $page_size ;

	return array($list, $prev, $next, $total_num, $start_num, $end_num);
}

function h_invite_inviting_member4c_member_id($c_member_id){
	$sql = "select * from c_member_pre" .
			" where c_member_id_invite = ". no_quote4db($c_member_id);
	return get_array_list4db($sql);
}

function p_h_home_birthday_flag4c_member_id($c_member_id){
	$c_member = db_common_c_member4c_member_id($c_member_id);

	$birthday = $c_member['birth_month'] . "-" . $c_member['birth_day'];

	if(date("n-j")==$birthday){
		return true;
	}else{
		return false;
	}
}

function p_h_config_c_member_id_block4c_member_id($c_member_id){

	$sql = "select c_member_id_block " .
			" from c_access_block " .
			" where c_member_id = ". no_quote4db($c_member_id);
	return get_one_list4db($sql);
}

function p_common_is_access_block($c_member_id, $target_c_member_id){
	$sql = "select c_access_block_id from c_access_block " .
			" where c_member_id =" . no_quote4db($target_c_member_id).
			" and c_member_id_block = "	. no_quote4db($c_member_id);
	return get_one4db($sql);
}

function p_c_home_new_commu_review4c_commu_id( $target_c_commu_id , $limit)
{
	$sql = "select ccr.c_review_id, cr.title, ccr.r_datetime " .
			" from c_commu_review as ccr , c_review as cr " .
			" where ccr.c_review_id = cr.c_review_id " .
			" and ccr.c_commu_id = ". no_quote4db($target_c_commu_id) .
			" order by ccr.r_datetime desc " .
			" limit 0, $limit";
	$list = get_array_list4db($sql);

   return $list;
}

// 誕生日まであと何日？
function db_common_count_days_birthday4c_member_id($c_member_id)
{
	$c_member = db_common_c_member4c_member_id($c_member_id);

	// 今日の00:00:00
	$today = strtotime("00:00:00");

	// 今年の誕生日
	$birthday_thisyear = strtotime(date('Y')."/".$c_member['birth_month']."/".$c_member['birth_day']);
	// 来年の誕生日
	$birthday_nextyear = strtotime((date('Y')+1)."/".$c_member['birth_month']."/".$c_member['birth_day']);

	// 次の誕生日
	if ($birthday_thisyear < $today) {
		$birthday_next = $birthday_nextyear;
	} else {
		$birthday_next = $birthday_thisyear;
	}

	// 24 * 60 * 60 = 86400
	return ($birthday_next - $today) / 86400;
}

function p_h_search_result_check_profile($profile)
{
	$result_list = array();

	foreach ($profile as $key => $v) {
		if (!$v) {
			continue;
		}

		$sql = "SELECT * FROM c_profile" .
				" WHERE name = ". quote4db($key);
		$c_profile = get_array_one4db($sql);
		if (!($c_profile && $c_profile['disp_search'])) continue;

 		$public_flags = array('public', 'friend', 'private');
		if (!$c_profile['public_flag_edit']
			&& $c_profile['public_flag_default'] != 'public') {
			// 公開項目以外は除外
			continue;
		}

		switch ($c_profile['form_type']) {
		case "text":
		case "textarea":
			$value = $v;
			$c_profile_option_id = 0;
			break;
		case "select":
		case "radio":
			$value = "";
			$c_profile_option_id = $v;
			break;
		case "checkbox":
			$value = array();
			$c_profile_option_id = $v;
			break;
		default:
			break;
		}

		$result_list[$c_profile['name']] = array(
			"c_profile_id" => $c_profile['c_profile_id'],
			"c_profile_option_id" => $c_profile_option_id,
			"value" => $value,
			"form_type" => $c_profile['form_type'],
		);
	}

	return $result_list;
}

function p_h_search_list_count_c_member_profile()
{
	$sql = "SELECT c_profile_option_id, COUNT(DISTINCT c_member_id) AS cnt" .
		" FROM c_member_profile" .
		" WHERE public_flag = 'public'" .
		" AND c_profile_option_id > 0" .
		" GROUP BY c_profile_option_id";
	$list = get_array_list4db($sql);
	$res = array();
	foreach ($list as $item) {
		$res[$item['c_profile_option_id']] = $item['cnt'];
	}

	return $res;
}

function p_h_home_birth4c_member_id($month, $day, $c_member_id)
{
	$sql = "SELECT c_member_id_to FROM c_friend" .
		" WHERE c_member_id_from=". quote4db($c_member_id);
	$ids = get_one_list4db($sql);
	$ids[] = $c_member_id;
	$ids = implode(", ", $ids);

	$sql = "SELECT * FROM c_member" .
		" WHERE c_member_id IN (". no_quote4db($ids) . ")" .
		" AND birth_day = " . quote4db($day) .
		" AND birth_month = " . quote4db($month);
	$list = get_array_list4db($sql);

	return $list;
}

function p_h_home_event4c_member_id($year, $month, $day, $c_member_id)
{
	$sql = "SELECT c_commu_id FROM c_commu_member" .
		" WHERE c_member_id=" . quote4db($c_member_id);
	$ids = get_one_list4db($sql);
	$ids = implode(", ", $ids);
	if (!$ids) {
		return array();
	}

	$today = sprintf("%04d-%02d-%02d", $year, $month, $day);
	$sql = "SELECT * FROM c_commu_topic" .
		" WHERE c_commu_id IN ($ids)" .
		" AND event_flag=1" .
		" AND open_date = " . quote4db($today);
	$list = get_array_list4db($sql);

	foreach ($list as $key => $item) {
		$list[$key]['is_join'] = p_common_is_c_event_member($item['c_commu_topic_id'], $c_member_id);
	}
	return $list;
}

function p_f_home_c_rss_cache_list4c_member_id($c_member_id, $limit = 5)
{
	$sql = "SELECT * FROM c_rss_cache" .
		" WHERE c_member_id = " . quote4db($c_member_id) .
		" ORDER BY r_datetime DESC" .
		" LIMIT " . no_quote4db($limit);
	return get_array_list4db($sql);
}

function count_all_members() {
	$sql = "select count(*) from c_member";
	return get_one4db($sql);
}

function get_commu_topic_comment_id ($c_commu_topic_id) {
	$sql = "SELECT c_commu_topic_comment_id "
		. "FROM c_commu_topic_comment "
		. "WHERE c_commu_topic_id=". quote4db($c_commu_topic_id)
		." and number=0";
	return get_one4db($sql);
}

