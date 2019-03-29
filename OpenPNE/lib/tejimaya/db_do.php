<?php

/**
 * トピック情報取得
 *
 * @param	int	$c_commu_topic_id
 * @return	array $c_commu_topic
 */
function _do_c_bbs_c_commu_topic4c_commu_topic_id($c_commu_topic_id){
	$sql = "SELECT * FROM c_commu_topic"
		." WHERE c_commu_topic_id=". quote4db($c_commu_topic_id);
	return get_array_one4db($sql);
}

/**
 * 書き込み番号取得
 *
 * @param  int $c_commu_topic_id
 * @return int 書き込み番号
 */
function _do_c_commu_topic_comment_number4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT MAX(number) FROM c_commu_topic_comment"
		." WHERE c_commu_topic_id=". quote4db($c_commu_topic_id);
	$array = get_one_list4db($sql);

	//トピック作成時
	if( $array[0] == "" ){

	return 0;// + 1;

	}else{	//普通のトピックコメント書き込み時

	return $array[0] + 1;

	}

}

/**
 * フレンド申し込み挿入
 *
 * @param	int	   $c_member_id_from
 * @param	int	   $c_member_id_to
 * @param  string $message
 * @return int insert_id
 *

 * @TODO: 重複チェック
 */
function _do_insert_c_friend_confirm($c_member_id_from, $c_member_id_to, $message){

	$sql = "INSERT INTO c_friend_confirm(c_member_id_from, c_member_id_to, message, r_datetime)"
		." VALUES(". quotearray4db($c_member_id_from, $c_member_id_to, $message). ", NOW())";
	return _insert4db($sql);
}

/**
 * 日記コメント追加
 *
 * @param	int    $c_member_id
 * @param	int    $c_diary_id
 * @param	string $body
 * @return int    insert_id
 */
function _do_insert_c_diary_comment($c_member_id, $c_diary_id, $body)
{
	$sql = "INSERT INTO c_diary_comment(c_member_id, c_diary_id, body, r_datetime)";
	$sql .= " VALUES(".quotearray4db($c_member_id, $c_diary_id, $body).", NOW())";

	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_insert_id($GLOBALS['db']);
}

/**
 * 日記コメント情報をIDから取得
 *
 * @param	int $c_diary_comment_id
 * @return array
 * 				c_diary_comemnt.*
 * 				c_diary.c_member_id AS c_member_id_author
 */
function _do_c_diary_comment4c_diary_comment_id($c_diary_comment_id)
{
	$sql = "SELECT dc.*, d.c_member_id AS c_member_id_author";
	$sql .= " FROM c_diary_comment AS dc, c_diary AS d";
	$sql .= " WHERE dc.c_diary_comment_id=".quote4db($c_diary_comment_id);
	$sql .= " AND dc.c_diary_id=d.c_diary_id LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * コミュニティ作成
 *
 * コミュニティを作成して、管理者をコミュニティのメンバーに加える
 *
 * @param  int     $c_member_id
 * @param  string  $name
 * @param  int     $c_commu_category_id
 * @param  string  $info  : 説明文
 * @param  enum('public', 'authpublic', 'authprivate')  $public_flag
 * @return int  insert_id
 */
function _do_insert_c_commu($c_member_id, $name, $c_commu_category_id, $info, $public_flag, $image_filename="")
{
	$sql = "INSERT INTO c_commu";
	$sql .= "(name, c_member_id_admin, info, c_commu_category_id, public_flag, search_word, image_filename, r_datetime, r_date, access_date)";
	$sql .= " VALUES(";
	$sql .= quotearray4db($name, $c_member_id, $info, $c_commu_category_id, $public_flag, $name, $image_filename).", NOW(), NOW(), NOW())";
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_insert_id($GLOBALS['db']);
}

//shou050604
//メッセージは既読にするを追加
//shou050610
//ごみ箱へ表示できるように修正
/**
 * メッセージ削除(ID指定)
 * この時メッセージは既読にする
 * @param	int	$c_message_id
 * @param	int $c_member_id
 * @return	bool  削除が成功したかどうか
 */
function _do_delete_c_message4c_message_id($c_message_id, $c_member_id)
{

	$message = _db_c_message4c_message_id($c_message_id);
	if ($message['c_member_id_to'] == $c_member_id) { // 受信メッセージ
		if($message['is_deleted_to']) return false;
		$tmp = "to";
	} elseif ($message['c_member_id_from'] == $c_member_id) { // 送信メッセージ
		if($message['is_deleted_from']) return false;
		$tmp = "from";
	} else {
		// 削除権限なし
		exit('削除できません');
	}

	$sql = "UPDATE c_message SET is_deleted_$tmp=1";

	if($tmp == "to"){

		$sql .= ", is_read = 1";

	}

	$sql .= " WHERE c_message_id=".quote4db($c_message_id)." LIMIT 1";
	return mysqli_query($GLOBALS['db'], $sql);
}

//shou050615
//下書き保存をごみ箱へ
/**
 * メッセージ削除(ID指定)
 * @param	int	$c_message_id
 * @param	int $c_member_id
 * @return	bool  削除が成功したかどうか
 */
function do_h_message_box_delete_save_message($c_message_id, $c_member_id)
{
	$sql = "UPDATE c_message SET is_deleted_from = 1" .
		" WHERE c_member_id_from = " . quote4db($c_member_id) .
		" AND c_message_id = " . quote4db($c_message_id) .
		" LIMIT 1";
	return _mysql_query4db($sql);
}

/**
 * メッセージ作成
 *
 * @param	int	$c_member_id_from
 * @param	int	$c_member_id_to
 * @param	string	$subject
 * @param	string	$body
 * @return	int	$insert_id
 */
function _do_insert_c_message($c_member_id_from, $c_member_id_to, $subject, $body)
{
	$sql = "INSERT INTO c_message(c_member_id_from, c_member_id_to, subject, body, r_datetime,is_send)" .
		" VALUES(".quotearray4db($c_member_id_from,$c_member_id_to,$subject,$body).", NOW(),1)";
	_insert4db($sql);
}
/**
 * 承認メッセージ作成
 *
 * @param   int $c_member_id_from
 * @param   int $c_member_id_to
 * @param   string  $subject
 * @param   string  $body
 * @return  int $insert_id
 */
function _do_insert_c_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body)
{
	$sql = "INSERT INTO c_message(c_member_id_from, c_member_id_to, subject, body, r_datetime, is_syoudaku, is_send, is_read)";
	$sql .= " VALUES(".quotearray4db($c_member_id_from, $c_member_id_to, $subject, $body).", NOW(), 1, 1, 1)";
	_insert4db($sql);
}

/**
 * 友達リンク要請削除
 *
 * @param	int $c_friend_confirm_id
 * @param	int $u		: 自分のc_member_id
 * @return bool  削除成功？
 */
function _do_delete_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id, $u)
{
	$cfc = _do_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id);
	if ($cfc['c_member_id_from'] != $u && $cfc['c_member_id_to'] != $u) {
		return false;
	}

	$sql = "DELETE FROM c_friend_confirm" .
			" WHERE c_friend_confirm_id=".quote4db($c_friend_confirm_id);
	return mysqli_query($GLOBALS['db'], $sql);
}

/**
 * コミュニティ参加要請を削除
 *
 */
function _do_delete_c_commu_member_confirm4c_commu_member_confirm_id($c_commu_member_confirm_id, $u)
{
	$cmc = _do_c_commu_member_confirm4c_commu_member_confirm_id($c_commu_member_confirm_id);
	if ($cmc['c_member_id'] != $u && $cmc['c_member_id_admin'] != $u) {
		return false;
	}

	$sql = "DELETE FROM c_commu_member_confirm";
	$sql .= " WHERE c_commu_member_confirm_id=".quote4db($c_commu_member_confirm_id);
	return mysqli_query($GLOBALS['db'], $sql);
}

/**
 * 管理者交代の要請を削除
 *
 * @param	int $c_commu_admin_confirm_id
 * @param	int $u			: 自分のc_member_id
 * @return	bool
 */
function _do_delete_c_commu_admin_confirm($c_commu_admin_confirm_id, $u)
{
	$cac = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($c_commu_admin_confirm_id);
	if ($cac['c_member_id_to'] != $u && $cac['c_member_id_admin'] != $u) {
		return false;
	}

	$sql = "DELETE FROM c_commu_admin_confirm";
	$sql .= " WHERE c_commu_admin_confirm_id=". quote4db($c_commu_admin_confirm_id) .
			" LIMIT 1";
	return mysqli_query($GLOBALS['db'], $sql);
}

/**
 * トピックコメント書き込み
 *
 * @param	int	   $c_commu_id
 * @param	int    $c_commu_topic_id
 * @param	int    $c_member_id
 * @param	string $body
 * @return int insert_id
 *

 */
function _do_insert_c_commu_topic_comment($c_commu_id, $c_commu_topic_id, $c_member_id, $body)
{
	$number = _do_c_commu_topic_comment_number4c_commu_topic_id($c_commu_topic_id);

	$sql = "INSERT INTO c_commu_topic_comment"
	  ."(c_commu_id, c_member_id, c_commu_topic_id, number, body, r_datetime, r_date)"
	  ." VALUES(".quotearray4db($c_commu_id, $c_member_id, $c_commu_topic_id, $number, $body).", NOW(), NOW())";
	return _insert4db($sql);
}

function do_c_event_edit_update_c_commu_topic($c_commu_topic_id, $update_c_commu_topic){

	$sets = array();
	foreach ($update_c_commu_topic as $key => $value) {
		$sets[] = "`{$key}`=". quote4db($value);
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_commu_topic SET $sets " .
			" , r_datetime = now() " .
		" WHERE c_commu_topic_id=". quote4db($c_commu_topic_id);

	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);

}

function do_c_event_edit_update_c_commu_topic_comment($c_commu_topic_id,$update_c_commu_topic_comment){

	$sets = array();
	foreach ($update_c_commu_topic_comment as $key => $value) {
		$sets[] = "`{$key}`=". quote4db($value);
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_commu_topic_comment SET $sets" .
			" , r_datetime = now() " .
		" WHERE c_commu_topic_id=". quote4db($c_commu_topic_id)
		." and number=0";

	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_c_event_edit_delete_c_commu_topic_comment_image($c_commu_topic_id,$pic_delete){

	$sql = "update c_commu_topic_comment set image_filename". $pic_delete .
		  " = ''" .
		  " , r_datetime = now() " .
		  " where c_commu_topic_id=". quote4db($c_commu_topic_id)
		." and number=0";

	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_c_event_edit_delete_c_commu_topic_comment_file($c_commu_topic_id,$file_index){

	$sql = "select file_filename" . $file_index . " "
		. "FROM c_commu_topic_comment "
		. "WHERE c_commu_topic_id=". quote4db($c_commu_topic_id)
		." and number=0";
	$name = get_one4db($sql);

	$sql = "update c_commu_topic_comment set file_filename". $file_index .
		  " = ''" .
		  " , r_datetime = now() " .
		  " where c_commu_topic_id=". quote4db($c_commu_topic_id)
		." and number=0";
	_mysql_query4db($sql);

	$dest_dir = DOCUMENT_ROOT . '/var/file/' . sprintf("%010d", get_commu_topic_comment_id($c_commu_topic_id));
	$filepath = $dest_dir . '/' . md5($name);
	if (is_writeable($filepath)) {
		unlink($filepath);
	}

	return mysqli_errno($GLOBALS['db']);
}

/**
 * 友達リンク要請情報をIDから取得
 *
 * @param	int $c_friend_confirm_id
 * @return	array c_friend_confirm.*
 */
function _do_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id)
{
	$sql = 'SELECT * FROM c_friend_confirm';
	$sql .= " WHERE c_friend_confirm_id=".quote4db($c_friend_confirm_id) .
			" LIMIT 1";

	return get_array_one4db($sql);
}

/**
 * コミュニティ参加要請情報をIDから取得
 *
 * @param	int $c_commu_member_confirm_id
 * @return	array
 * 				c_commu_member_confirm.*,
 * 				c_member_id_admin
 */
function _do_c_commu_member_confirm4c_commu_member_confirm_id($c_commu_member_confirm_id)
{
	$sql = "SELECT cmc.*, c.c_member_id_admin";
	$sql .= " FROM c_commu_member_confirm AS cmc, c_commu AS c";
	$sql .= " WHERE cmc.c_commu_member_confirm_id=".quote4db($c_commu_member_confirm_id);
	$sql .= " AND cmc.c_commu_id=c.c_commu_id LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * 日記コメント削除
 *
 * @param	int $c_diary_comment_id
 * @param	int $u	: 削除しようとしている人の c_member_id
 */
//shou050624
function _do_delete_c_diary_comment($c_diary_comment_id, $u)
{
	$dc = _do_c_diary_comment4c_diary_comment_id($c_diary_comment_id);
	if ($dc['c_member_id'] != $u && $dc['c_member_id_author'] != $u) {
		return false;
	}

	$sql = "UPDATE c_diary_comment "
		. " SET delete_reason='BY_USER' "
		. " WHERE c_diary_comment_id=".quote4db($c_diary_comment_id)
		. " LIMIT 1";
	return mysqli_query($GLOBALS['db'], $sql);
}

/**
 * コミュニティ設定変更
 *
 * @param	int    $c_commu_id
 * @param	int    $u   : 管理者の更新はしない(管理者かどうかの確認用)
 * @param	string $name
 * @param	int    $c_commu_category_id
 * @param	string $info
 * @param	enum(string or int) $public_flag
 * 						('public'(0), 'authpublic'(1), 'authprivate'(2))
 * @return bool
 *

 */
function _do_update_c_commu($c_commu_id, $u, $name, $c_commu_category_id, $info, $public_flag, $image_filename="", $is_send_join_mail=1)
{
	$sql = "UPDATE c_commu" .
		" SET c_commu_category_id=". quote4db($c_commu_category_id) .
		", name=". quote4db($name) .
		", info=". quote4db($info) .
		", public_flag=". quote4db($public_flag) .
		", is_send_join_mail = " . quote4db($is_send_join_mail) .
		($image_filename ? ", image_filename=".quote4db($image_filename) : " ").
		" WHERE c_commu_id=". quote4db($c_commu_id);
	return _mysql_query4db($sql);
}

function do_common_c_commu4c_commu_id($c_commu_id){
	return _db_c_commu4c_commu_id($c_commu_id);
}
function do_common_c_member_pre4sid($sid)
{
	$sql = "SELECT * FROM c_member_pre" .
			" WHERE session=". quote4db($sid) .
			" LIMIT 1";
	return get_array_one4db($sql);
}

function do_common_is_friend_link_wait($c_member_id_from, $c_member_id_to){
	//from→to
	{
		$sql = "SELECT count(*)";
		$sql .= " FROM  c_friend_confirm";
		$sql .= " WHERE c_member_id_from=". quote4db($c_member_id_from);
		$sql .= " AND c_member_id_to=". quote4db($c_member_id_to);

		$countA = get_one4db( $sql );
	}
	//to→from
	{
		$sql = "SELECT count(*)";
		$sql .= " FROM  c_friend_confirm";
		$sql .= " WHERE c_member_id_from=". quote4db($c_member_id_to);
		$sql .= " AND c_member_id_to=". quote4db($c_member_id_from);

		$countB = get_one4db( $sql );
	}

	$ret = false;
	if( ($countA > 0) || ($countB > 0) ){
		$ret = true;
	}
	return $ret;
}

define('STATUS_F_LINK_FLAT',	"1");//フレンドリクエスト(承認送信画面)
define('STATUS_F_LINK_WAIT',	"2");//フレンドリクエスト(リンク承認待ち)
define('STATUS_F_LINK_ALREADY',	"3");//フレンドリクエスト(フレンドリンク済)

function do_common_get_f_link_status($c_member_id_from,$c_member_id_to){
	$is_friend		= _db_is_friend($c_member_id_from, $c_member_id_to);
	$is_link_wait	= do_common_is_friend_link_wait($c_member_id_from, $c_member_id_to);

	$ret = STATUS_F_LINK_ALREADY;
	//友達でない＆リンク承認待ちでない
	if( ($is_friend==false) && ($is_link_wait==false) ){
		$ret = STATUS_F_LINK_FLAT;
	}
	//友達でない＆リンク承認待ち
	elseif( ($is_friend==false) && ($is_link_wait==true) ){
		$ret = STATUS_F_LINK_WAIT;
	}

	return $ret;
}

function do_common_is_c_commu_member($c_commu_id, $c_member_id){
	return _db_is_c_commu_member($c_commu_id, $c_member_id);
}

function do_common_is_commu_admin($c_commu_id, $c_member_id){
	return _db_is_c_commu_admin($c_commu_id, $c_member_id);
}

function do_common_is_c_commu_join_wait($c_commu_id, $c_member_id)
{
	{
		$sql = "SELECT count(*)";
		$sql .= " FROM  c_commu_member_confirm";
		$sql .= " WHERE c_commu_id=". quote4db($c_commu_id);
		$sql .= " AND c_member_id=". quote4db($c_member_id);

		$countA = get_one4db( $sql );
	}
//	print "countA=".$countA;

	$ret = false;
	if( $countA > 0 ){
		$ret = true;
	}
	return $ret;
}

define('STATUS_C_JOIN_REQUEST_FREE',	"1");//コミュニティ参加(承認必要なし)
define('STATUS_C_JOIN_REQUEST_NEED',	"2");//コミュニティ参加(承認必要)
define('STATUS_C_JOIN_WAIT',			"3");//コミュニティ参加(承認待ち)
define('STATUS_C_JOIN_ALREADY',			"4");//コミュニティ参加(既に参加)

function do_common_get_c_join_status($c_member_id,$c_commu_id){

	$is_c_commu_member		= do_common_is_c_commu_member($c_commu_id, $c_member_id);
	$is_wait				= do_common_is_c_commu_join_wait($c_commu_id, $c_member_id);
	$c_commu				= do_common_c_commu4c_commu_id($c_commu_id);
	$is_join_request_free	= false;
	if( $c_commu['public_flag'] == "public" ){
		$is_join_request_free	= true;
	}

	$ret = STATUS_C_JOIN_ALREADY;
	//メンバーである
	if( $is_c_commu_member == true ){
	}
	//メンバーで無い
	else{
		if($is_wait == true){
			$ret = STATUS_C_JOIN_WAIT;
		}else{
			if( $is_join_request_free == true ){
				$ret = STATUS_C_JOIN_REQUEST_FREE;
			}else{
				$ret = STATUS_C_JOIN_REQUEST_NEED;
			}
		}
	}
	return $ret;
}

/**

*/
function do_common_is_friend($c_member_id_from,$c_member_id_to){

	$sql =	"SELECT count(*) FROM c_friend".
			" WHERE c_member_id_from=". quote4db($c_member_id_from).
			" AND c_member_id_to=". quote4db($c_member_id_to);
	$retA = get_one4db($sql);

	$sql =	"SELECT count(*) FROM c_friend".
			" WHERE c_member_id_from=". quote4db($c_member_id_to).
			" AND c_member_id_to=". quote4db($c_member_id_from);
	$retB = get_one4db($sql);

	if( ($retA > 0) && ($retB > 0) ){
		$ret = true;
	}else{
		$ret = false;
	}

	return $ret;
}

/*

*/
function do_common_link_friend_TEST($c_member_id_from, $c_member_id_to)
{
	$ret = false;

	$sql = "INSERT INTO c_friend(c_member_id_from, c_member_id_to, r_datetime)" .
	   " VALUES(".quotearray4db($c_member_id_from,$c_member_id_to).", NOW())";
	$insert_A = _insert4db($sql);

	$sql = "INSERT INTO c_friend(c_member_id_from, c_member_id_to, r_datetime)" .
	   " VALUES(".quotearray4db($c_member_id_to,$c_member_id_from).", NOW())";
	$insert_B = _insert4db($sql);

	return $ret;
}

/*

*/
function do_common_link_friend($c_member_id_from, $c_member_id_to)
{
	$ret = false;

	if( ($c_member_id_from > 0) && ($c_member_id_to > 0) ){
		$ret = do_common_is_friend($c_member_id_from,$c_member_id_to);
		if($ret==false){
			$sql = "INSERT INTO c_friend(c_member_id_from, c_member_id_to, r_datetime)";
			$sql .= " VALUES(".quotearray4db($c_member_id_from, $c_member_id_to).", NOW())";
			$insert_A = _insert4db($sql);

			$sql = "INSERT INTO c_friend(c_member_id_from, c_member_id_to, r_datetime)";
			$sql .= " VALUES(".quotearray4db($c_member_id_to, $c_member_id_from).", NOW())";
			$insert_B = _insert4db($sql);
		}
		if( $insert_A && $insert_B ){
			$ret = true;
		}
	}

	return $ret;
}

/**
 * 友達追加
 * (h_confirm_list)
 *
 * @param	int $c_friend_confirm_id
 * @param	int $u			: 自分のc_member_id
 * @return bool  削除成功？
 */
function do_h_confirm_list_insert_c_friend($c_friend_confirm_id, $u)
{
	$cfc = _do_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id);
	if ($cfc['c_member_id_to'] != $u) {
		exit('追加できません');
	}

	$c_member_id_from = $cfc['c_member_id_from'];
	$c_member_id_to = $cfc['c_member_id_to'];

	do_common_link_friend($c_member_id_from,$c_member_id_to);

	_do_delete_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id, $u);

}

function do_h_confirm_list_delete_c_friend_confirm($c_friend_confirm_id, $u)
{
	return _do_delete_c_friend_confirm4c_friend_confirm_id($c_friend_confirm_id, $u);
}

/**
 * コミュニティ参加要請を承認
 * (h_confirm_list)
 */
function do_h_confirm_list_insert_c_commu_member(
	$target_c_commu_member_confirm_id, $u, $is_receive_mail)
{
	$ret = _do_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id);

	$c_member_id = $ret['c_member_id'];
	$c_commu_id = $ret['c_commu_id'];

	$sql = "INSERT INTO c_commu_member"
		."(c_member_id, c_commu_id, is_receive_mail, r_datetime)"
		." VALUES(".quotearray4db($c_member_id, $c_commu_id, $is_receive_mail).", NOW())";
	mysqli_query($GLOBALS['db'], $sql);

	return _do_delete_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id,$u);
}

function do_h_confirm_list_delete_c_commu_member_confirm($target_c_commu_member_confirm_id, $u)
{
	return _do_delete_c_commu_member_confirm4c_commu_member_confirm_id($target_c_commu_member_confirm_id,$u);
}

/**
 * 管理者交代
 *
 * @param	int $c_commu_admin_confirm
 * @param	int $u : 自分のc_membmer_id
 * @return bool
 */
function do_h_confirm_list_update_c_commu_admin($c_commu_admin_confirm_id, $u)
{
	$cac = _db_c_commu_admin_confirm4c_commu_admin_confirm_id($c_commu_admin_confirm_id);
	if ($cac['c_member_id_to'] != $u) {
		return false;
	}

	$sql = "UPDATE c_commu" .
			" SET c_member_id_admin=". quote4db($u) .
			" WHERE c_commu_id=". quote4db($cac['c_commu_id']);
	if(!mysqli_stmt_execute(mysqli_prepare($GLOBALS['db'], $sql))) {
		return false;
	}
	return _do_delete_c_commu_admin_confirm($c_commu_admin_confirm_id, $u);
}

function do_h_confirm_list_delete_c_commu_admin_confirm($c_commu_admin_confirm_id, $u)
{
	return _do_delete_c_commu_admin_confirm($c_commu_admin_confirm_id, $u);
}

/**
トピックコメント書き込み

c_member_id
target_c_commu_topic_id
body

@return insert_id
*/
function do_c_bbs_insert_c_commu_topic_comment($c_member_id,$target_c_commu_topic_id,$body){

	$c_commu_topic = _do_c_bbs_c_commu_topic4c_commu_topic_id($target_c_commu_topic_id);

	$target_c_commu_topic_id = $c_commu_topic['c_commu_topic_id'];
	$target_c_commu_id  = $c_commu_topic['c_commu_id'];

	$insert_id = _do_insert_c_commu_topic_comment($target_c_commu_id, $target_c_commu_topic_id, $c_member_id, $body);
	do_common_update_c_commu_access_date($target_c_commu_id);
	return $insert_id;
}
function do_c_bbs_update_c_commu_topic_comment_image($c_commu_topic_comment_id, $image_filename)
{
	if(!$c_commu_topic_comment_id) {
		return false;
	}

	$sql = "UPDATE c_commu_topic_comment" .
			" SET image_filename=". quote4db($image_filename) .
			" WHERE c_commu_topic_comment_id=". quote4db($c_commu_topic_comment_id);
	return mysqli_query($GLOBALS['db'], $sql);
}

/**
トピックコメント削除

target_c_commu_topic_comment_id

*/
function do_c_bbs_delete_c_commu_topic_comment($c_commu_topic_comment_id)
{
	$sql = "SELECT image_filename1, image_filename2, image_filename3" .
		" FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_comment_id = " . quote4db($c_commu_topic_comment_id);
	$topic_comment = get_array_one4db($sql);
	image_data_delete($topic_comment['image_filename1']);
	image_data_delete($topic_comment['image_filename2']);
	image_data_delete($topic_comment['image_filename3']);

	$sql = "UPDATE c_commu_topic_comment "
		. "SET delete_reason='BY_USER' "
		. "WHERE c_commu_topic_comment_id = " . quote4db($c_commu_topic_comment_id);
	_mysql_query4db($sql);
}

/**
トピックコメントIDからトピックを得る

target_c_commu_topic_comment_id

*/
function do_c_bbs_c_commu_topic_comment4c_commu_topic_comment_id($target_c_commu_topic_comment_id){
	$sql = "SELECT * FROM c_commu_topic_comment"
		." WHERE c_commu_topic_comment_id=". quote4db($target_c_commu_topic_comment_id);
	return get_array_one4db($sql);
}

/**
トピック削除

target_c_commu_topic_id

*/
function do_c_bbs_delete_c_commu_topic($c_commu_topic_id)
{
	// c_commu_topic_comment(画像)
	$sql = "SELECT image_filename1, image_filename2, image_filename3" .
		" FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_id = " . quote4db($c_commu_topic_id);
	$topic_comment_list = get_array_list4db($sql);
	foreach ($topic_comment_list as $topic_comment) {
		image_data_delete($topic_comment['image_filename1']);
		image_data_delete($topic_comment['image_filename2']);
		image_data_delete($topic_comment['image_filename3']);
	}

	$sql = "DELETE FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_id = " . quote4db($c_commu_topic_id);
	_mysql_query4db($sql);

	// c_event_member
   	$sql = "DELETE FROM c_event_member" .
		" WHERE c_commu_topic_id = " . quote4db($c_commu_topic_id);
	_mysql_query4db($sql);

	// c_commu_topic
	$sql = "DELETE FROM c_commu_topic" .
		" WHERE c_commu_topic_id = " . quote4db($c_commu_topic_id);
	_mysql_query4db($sql);
}

/**
コミュニティトピック作成

target_c_commu_topic_id

*/
function do_c_home_insert_c_commu_topic($target_c_commu_id,$c_member_id,$name,$body){
	$sql = "INSERT INTO c_commu_topic"
	  ."(c_commu_id, c_member_id, name, r_datetime, r_date)"
	  ." VALUES(".quotearray4db($target_c_commu_id, $c_member_id, $name).", NOW(), NOW())";
	$c_commu_topic_id = _insert4db($sql);
	$c_commu_topic_comment_id = _do_insert_c_commu_topic_comment($target_c_commu_id, $c_commu_topic_id, $c_member_id, $body);
	do_common_update_c_commu_access_date($target_c_commu_id);

	return array($c_commu_topic_id, $c_commu_topic_comment_id);
}

/**
 * コミュニティお知らせメール受信設定変更
 */
function do_c_home_update_is_receive_mail($target_c_commu_id, $u, $is_receive_mail, $is_receive_mail_pc)
{
	$sql = "UPDATE c_commu_member" .
		" SET is_receive_mail=". quote4db($is_receive_mail) .
		" , is_receive_mail_pc=". quote4db($is_receive_mail_pc).
		" WHERE c_commu_id=". quote4db($target_c_commu_id) .
		" AND c_member_id=". quote4db($u) .
		" LIMIT 1";
	return mysqli_query($GLOBALS['db'], $sql);
}

function do_c_event_add_insert_c_commu_topic($event){
	foreach($event as $key => $value){
		if($value!="now()"){
			if(is_null($value)) $value="";
			$event[$key] = quote4db($value);
		}
	}

	$keys = array_keys($event);
	$keys_str = implode(",",$keys);
	$event_str = implode(",",$event);

	$sql = "insert c_commu_topic($keys_str)"
		  ." values($event_str)";

	mysqli_query($GLOBALS['db'], $sql);

	$sql = "select c_commu_topic_id from c_commu_topic where c_commu_id=".no_quote4db($event['c_commu_id'])." order by r_datetime desc";
	$id = get_one4db($sql);
	return $id;
}

function do_c_event_add_insert_c_commu_topic_comment($event){
	foreach($event as $key => $value){
		if($value!="now()"){
			if(is_null($value)) $value="";
			$event[$key] = quote4db($value);
		}
	}

	$keys = array_keys($event);
	$keys_str = implode(",",$keys);
	$event_str = implode(",",$event);
	$sql = "insert c_commu_topic_comment($keys_str)"
		  ." values($event_str)";
	mysqli_query($GLOBALS['db'], $sql);

	$sql = "select c_commu_topic_comment_id from c_commu_topic_comment order by r_datetime desc limit 1";
	$c_commu_topic_comment_id = get_one4db($sql);
	return $c_commu_topic_comment_id;
}

function do_c_event_add_insert_c_event_member($c_commu_topic_id, $c_member_id){
	$sql = "select * from c_event_member " .
			"where c_commu_topic_id = ". no_quote4db($c_commu_topic_id) .
			" and c_member_id = " . no_quote4db($c_member_id);
	$is_member = get_one4db($sql);

	if(!$is_member){
		$sql = "insert c_event_member(c_commu_topic_id, c_member_id, is_admin, r_datetime)" .
				" values(". quotearray4db($c_commu_topic_id, $c_member_id) .", 0, now())";
		mysqli_query($GLOBALS['db'], $sql);
	}

}

function do_c_event_add_delete_c_event_member($c_commu_topic_id, $c_member_id){
	$sql = "delete from c_event_member" .
			" where c_commu_topic_id = ". no_quote4db($c_commu_topic_id) .
			" and c_member_id = " . no_quote4db($c_member_id);
	mysqli_query($GLOBALS['db'], $sql);

}

function do_c_event_add_insert_c_event_member_as_admin($c_commu_topic_id, $c_member_id){
	$sql = "insert c_event_member(c_commu_topic_id, c_member_id, is_admin, r_datetime) " .
			"values(". quotearray4db($c_commu_topic_id, $c_member_id). " , 1, now())";

	mysqli_query($GLOBALS['db'], $sql);

}

/**
コミュニティに参加

target_c_commu_id

*/
function do_inc_join_c_commu($target_c_commu_id,$c_member_id){
	$sql = "INSERT INTO c_commu_member"
	  ."(c_member_id, c_commu_id, r_datetime)"
	  ." VALUES(".quotearray4db($c_member_id, $target_c_commu_id).", NOW())";

	return _insert4db($sql);
}

/**
 * 日記削除
 * コメント、画像も削除
 *
 * @param int $target_c_diary_id
 */
function do_fh_diary_delete_c_diary($c_diary_id)
{
	$sql = "DELETE FROM c_diary_comment" .
		" WHERE c_diary_id = " . quote4db($c_diary_id);
	_mysql_query4db($sql);

	$c_diary = p_fh_diary_c_diary4c_diary_id($c_diary_id);

	image_data_delete($c_diary['image_filename_1']);
	image_data_delete($c_diary['image_filename_2']);
	image_data_delete($c_diary['image_filename_3']);

	$sql = "DELETE FROM c_diary" .
   		" WHERE c_diary_id = " . quote4db($c_diary_id);
	_mysql_query4db($sql);
}

/**
日記にコメントを追加

target_c_diary_id

*/
function do_fh_diary_insert_c_diary_comment($c_member_id,$target_c_diary_id,$body){
	return _do_insert_c_diary_comment($c_member_id, $target_c_diary_id, $body);
}

/**
日記のコメントを削除

target_c_diary_id

*/
//shou050623
function do_fh_diary_delete_c_diary_comment($target_c_diary_comment_id,$c_member_id){
	_do_delete_c_diary_comment($target_c_diary_comment_id, $c_member_id);
}

/**
日記のコメントを削除

c_member_id_from
c_member_id_to

*/
function do_fh_friend_list_delete_c_friend($c_member_id_from, $c_member_id_to){
	$sql = "DELETE FROM c_friend";
	$sql .= " WHERE c_member_id_from=". quote4db($c_member_id_from);
	$sql .= " AND c_member_id_to=". quote4db($c_member_id_to);
	mysqli_query($GLOBALS['db'], $sql);

	$sql = "DELETE FROM c_friend";
	$sql .= " WHERE c_member_id_from=". quote4db($c_member_id_to);
	$sql .= " AND c_member_id_to=". quote4db($c_member_id_from);
	mysqli_query($GLOBALS['db'], $sql);

	return mysqli_errno($GLOBALS['db']);
}

/**
日記コメントＩＤから日記コメントを得る

target_c_diary_id

*/
function do_fh_diary_c_diary_comment4c_diary_comment_id($target_c_diary_comment_id){
	return _do_c_diary_comment4c_diary_comment_id($target_c_diary_comment_id);
}

/**
メッセージ送信

*/
function do_f_message_send_insert_c_message($c_member_id_to,$c_member_id_from,$subject,$body){
	$sql = "INSERT INTO c_message(c_member_id_to, c_member_id_from, subject, body, r_datetime, is_send)" .
		" VALUES(".quotearray4db($c_member_id_to,$c_member_id_from,$subject,$body).",now(), 1)";

	return _insert4db($sql);
}

/**
コミュニティ作成

*/
function do_h_com_add_insert_c_commu($c_member_id,$name,$c_commu_category_id,$info,$public_flag, $image_filename=""){
	return _do_insert_c_commu($c_member_id, $name, $c_commu_category_id, $info, $public_flag,$image_filename);
}

/**
日記を書く

*/
//shou050610
//修正
function do_h_diary_edit_insert_c_diary($c_member_id, $subject, $body){
	if (!$subject) {
		$subject = "無題";
	}

	$sql = "INSERT INTO c_diary(c_member_id, subject, body, r_datetime, r_date, is_checked)";
	$sql .= " VALUES(".quotearray4db($c_member_id, $subject, $body).", NOW(), NOW(), 1)";

	return _insert4db($sql);
}

/**
日記を編集

*/
//shou050610
function do_h_diary_edit_update_c_diary($c_diary_id,$subject,$body,$image_filename_1='' ,$image_filename_2='',$image_filename_3='', $image_position = 'TOP'){

	$sql =	"UPDATE c_diary".
			" SET subject=". quote4db($subject) .
			", body=". quote4db($body) .
			", image_position=" .quote4db($image_position);

	if( $image_filename_1 ){
		$sql .= ", image_filename_1=". quote4db($image_filename_1);
	}
	if( $image_filename_2 ){
		$sql .= ", image_filename_2=". quote4db($image_filename_2);
	}
	if( $image_filename_3 ){
		$sql .= ", image_filename_3=". quote4db($image_filename_3);
	}

	$sql .= " WHERE c_diary_id=". quote4db($c_diary_id);

	mysqli_query($GLOBALS['db'], $sql);

//echo "<br>sql=$sql<br>";exit;
	return mysqli_errno($GLOBALS['db']);
}

/**
メッセージを送る

*/
function do_h_message_insert_message($c_member_id_to,$c_member_id_from,$subject,$body){
	return do_f_message_send_insert_c_message($c_member_id_to,$c_member_id_from,$subject,$body);
}

/**
メッセージを削除
*/
function do_h_message_box_delete_message($c_message_id, $c_member_id){
	return _do_delete_c_message4c_message_id($c_message_id, $c_member_id);
}

/**
メッセージをごみ箱から元に戻す
*/
function do_h_message_box_move_message($c_message_id, $c_member_id,$to)
{
	// 受信メッセージだった場合
	$sql = "UPDATE c_message SET is_deleted_from = 0" .
   		" WHERE c_message_id = " . quote4db($c_message_id) .
   		" AND c_member_id_from = " . quote4db($c_member_id);
   	_mysql_query4db($sql);

	// 送信メッセージだった場合
	// 下書きメッセージだった場合
	$sql = "UPDATE c_message SET is_deleted_to = 0" .
   		" WHERE c_message_id = " . quote4db($c_message_id) .
   		" AND c_member_id_to = " . quote4db($c_member_id);
   	_mysql_query4db($sql);
}

/**
紹介文を削除

*/
function do_fh_intro_delete_intro($c_member_id_from,$c_member_id_to){
	$sql = "UPDATE c_friend SET intro=''" .
		" WHERE c_member_id_from=". quote4db($c_member_id_from) .
		" AND c_member_id_to=". quote4db($c_member_id_to);
	return _mysql_query4db($sql);
}

/**
フレンドリクエストを送る

*/
function do_f_link_request_insert_c_friend_confirm($c_member_id_from, $c_member_id_to, $message){
	return _do_insert_c_friend_confirm($c_member_id_from, $c_member_id_to, $message);
}

/**
フレンド紹介文入力・編集

*/
function do_f_intro_edit_update_c_friend($c_member_id_from, $c_member_id_to, $intro){

	$sql = "UPDATE c_friend SET intro=". quote4db($intro) .
		", r_datetime_intro=NOW()" .
		" WHERE c_member_id_from=". quote4db($c_member_id_from) .
		" AND c_member_id_to=". quote4db($c_member_id_to);
	_mysql_query4db($sql);
}

/**
コミュニティ参加リクエスト

*/
function do_c_join_request_insert_c_commu_member_confirm($c_commu_id, $c_member_id, $message)
{
	$sql = "INSERT INTO" .
		" c_commu_member_confirm(c_commu_id, c_member_id, message, r_datetime)" .
	   " VALUES(".quotearray4db($c_commu_id,$c_member_id,$message).", NOW())";
	return _insert4db($sql);
}

/**
コミュニティを友人に教える

*/
function do_c_invite_insert_c_message_commu_invite($subject,$body,$c_member_id_from,$c_member_id_to)
{
	do_f_message_send_insert_c_message($c_member_id_to,$c_member_id_from,$subject,$body);
	return true;
}

/**
コミュニティを削除

*/
function do_c_edit_delete_c_commu($c_commu_id)
{
	$sql = "SELECT * FROM c_commu WHERE c_commu_id = " . quote4db($c_commu_id);
	$c_commu = get_array_one4db($sql);

	// 画像削除
	image_data_delete($c_commu['image_filename']);

	// c_commu_admin_confirm
	$sql = "DELETE FROM c_commu_admin_confirm" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

	// c_commu_member
	$sql = "DELETE FROM c_commu_member" .
   		" WHERE c_commu_id = " . quote4db($c_commu_id);
   	_mysql_query4db($sql);

	// c_commu_member_confirm
	$sql = "DELETE FROM c_commu_member_confirm" .
   		" WHERE c_commu_id = " . quote4db($c_commu_id);
   	_mysql_query4db($sql);

   	// c_commu_review
   	$sql = "DELETE FROM c_commu_review" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

   	///トピック関連
   	$sql = "SELECT * FROM c_commu_topic" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	$topic_list = get_array_list4db($sql);

	foreach ($topic_list as $topic) {
		// c_commu_topic_comment(画像)
		$sql = "SELECT image_filename1, image_filename2, image_filename3" .
			" FROM c_commu_topic_comment" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		$topic_comment_list = get_array_list4db($sql);
		foreach ($topic_comment_list as $topic_comment) {
			image_data_delete($topic_comment['image_filename1']);
			image_data_delete($topic_comment['image_filename2']);
			image_data_delete($topic_comment['image_filename3']);
		}

		$sql = "DELETE FROM c_commu_topic_comment" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		_mysql_query4db($sql);

	   	// c_event_member
   		$sql = "DELETE FROM c_event_member" .
			" WHERE c_commu_topic_id = " . quote4db($topic['c_commu_topic_id']);
		_mysql_query4db($sql);
	}

	// c_commu_topic
	$sql = "DELETE FROM c_commu_topic" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);

   	// c_commu
   	$sql = "DELETE FROM c_commu" .
		" WHERE c_commu_id = " . quote4db($c_commu_id);
	_mysql_query4db($sql);
}

/**
コミュニティ写真削除

*/
function do_c_edit_image_delete_c_commu_image($target_c_commu_id){
	$sql = "UPDATE c_commu SET image_filename=''"
		." WHERE c_commu_id=". quote4db($target_c_commu_id);
	return _mysql_query4db($sql);
}

/**
コミュニティ画像の変更

*/
function do_c_edit_image_h_com_add_insert_c_commu($target_c_commu_id,$image_filename){

	$sql = "UPDATE c_commu" .
			" SET image_filename=". quote4db($image_filename) .
			" WHERE c_commu_id=". quote4db($target_c_commu_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
メンバーをコミュニティからの削除

*/
function do_c_edit_member_delete_c_commu_member($target_c_commu_id,$target_c_member_id){
	$sql = "DELETE FROM c_commu_member";
	$sql .= " WHERE c_member_id=". quote4db($target_c_member_id);
	$sql .= " AND c_commu_id=". quote4db($target_c_commu_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
コミュニティ管理者交代要請を取り消し

*/
function do_c_edit_member_delete_c_commu_admin_confirm($target_c_commu_admin_confirm_id)
{
	$sql = "DELETE FROM c_commu_admin_confirm";
	$sql .= " WHERE c_commu_admin_confirm_id=".quote4db($target_c_commu_admin_confirm_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
コミュニティ管理者交代依頼メッセージ送信

*/
function do_c_admin_request_insert_c_commu_admin_confirm($target_c_commu_id,$target_c_member_id,$body="")
{
	$sql = "INSERT INTO c_commu_admin_confirm(c_commu_id, c_member_id_to, message, r_datetime)"
		." VALUES(".quotearray4db($target_c_commu_id, $target_c_member_id, $body).", NOW())";
	return _insert4db($sql);
}

/**
招待メール送信

*/
function do_h_invite_insert_c_inivte($c_member_id_invite,$pc_address,$message,$session){

	$sql = "INSERT INTO c_member_pre".
	"(pc_address,regist_address,c_member_id_invite,session, r_date)".
	" VALUES(".quotearray4db($pc_address, $pc_address, $c_member_id_invite, $session).", now())";

	return _insert4db($sql);
}

/**
招待メール送信

*/
function do_h_invite_update_c_inivte($c_member_id_invite,$pc_address,$message,$session){
	$sql =	"UPDATE c_member_pre ".
			"SET c_member_id_invite=". quote4db($c_member_id_invite) .
			", session=". quote4db($session) .
			", regist_address=". quote4db($pc_address) .
			", r_date=now() ".
			" WHERE pc_address=". quote4db($pc_address);

	return _mysql_query4db($sql);
}

/**
プロフィール画像の変更

*/
function do_h_config_image($c_member_id,$image_filename){
	$sql = "UPDATE c_member" .
		" SET image_filename=". quote4db($image_filename) .
		" WHERE c_member_id=". quote4db($c_member_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
プロフィール画像の変更
050714新規作成
メンバーの三つの画像対応用

*/
function do_h_config_image_new($c_member_id,$image_filename,$img_num){
	$sql = "UPDATE c_member" .
		" SET image_filename_".no_quote4db($img_num)."=". quote4db($image_filename) .
		" WHERE c_member_id=". quote4db($c_member_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
プロフィール画像の削除

*/
function do_h_config_image_delete_c_member_image($c_member_id){
	$sql = "UPDATE c_member SET image_filename=''"
		." WHERE c_member_id=". quote4db($c_member_id);
	return _mysql_query4db($sql);
}

/**
プロフィール画像の削除
三枚の画像に対応
*/
function do_h_config_image_delete_c_member_image_new($c_member_id,$img_num){
	$sql = "UPDATE c_member SET " ;
	if($img_num==1)$sql .= " image_filename_1=image_filename_2, " ;
	if($img_num==1||$img_num==2)$sql .= " image_filename_2=image_filename_3," ;
	$sql .= " image_filename_3=''"
		." WHERE c_member_id=". quote4db($c_member_id);

	return _mysql_query4db($sql);
}

/**
プロフィール画像の削除時にそれがメイン画像だった場合はメイン画像を
変更。

*/
function do_h_config_image_change_c_member_main_image($c_member_id,$img_num){
	$sql = "UPDATE c_member" .
   		" SET image_filename = image_filename_" . no_quote4db($img_num) .
		" WHERE c_member_id = " . quote4db($c_member_id);
	return _mysql_query4db($sql);
}

/*

*/
function do_h_config_1(
				$target_c_member_id			,
				$pc_address
	){

	$session = md5(uniqid(rand(), 1));
	//プレにある
	if( do_common_c_pc_address_pre4pc_address($pc_address) ){
		$sql = "UPDATE c_pc_address_pre SET ".
			"c_member_id			= ".quote4db($target_c_member_id).
			",pc_address			= ".quote4db($pc_address).
			",session				= ".quote4db($session).
			",r_datetime			= NOW()".
			" WHERE pc_address		= ".quote4db($pc_address);
		_mysql_query4db($sql);
	} else {
		$sql = "INSERT INTO c_pc_address_pre(c_member_id, pc_address, session, r_datetime)"
		   ." VALUES(".quotearray4db($target_c_member_id,$pc_address,$session).", NOW())";
		$insert_id = _insert4db($sql);
	}

	do_h_config_1_mail_send($target_c_member_id, $session, $pc_address);

	return $insert_id;
}

/*

*/
function do_common_update_password($c_member_id, $password)
{
	$sql = "UPDATE c_member_secure" .
		" SET hashed_password = ". quote4db(md5($password)).
		" WHERE c_member_id	= ". quote4db($c_member_id);

	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/*

*/
function do_h_config_3(
				$target_c_member_id,
				$is_receive_mail,
				$rss,
				$ashiato_mail_num,
				$is_receive_daily_news,
				$c_password_query_id,
				$c_password_query_answer,
				$public_flag_diary
	){
	$sql = "UPDATE c_member SET ".
	"is_receive_mail	  = ".quote4db($is_receive_mail).
	",is_receive_daily_news	  = ".quote4db($is_receive_daily_news).
	",rss			  = ".quote4db($rss).
	",ashiato_mail_num        = ".no_quote4db($ashiato_mail_num).
	",c_password_query_id     = ".no_quote4db($c_password_query_id).
	",public_flag_diary     = ".quote4db($public_flag_diary).
	" WHERE c_member_id	  = ".quote4db($target_c_member_id);
	mysqli_query($GLOBALS['db'], $sql);

	if( !empty($c_password_query_answer) ){
		$sql = "UPDATE c_member_secure SET ".
		"hashed_password_query_answer = ".quote4db( md5($c_password_query_answer) ).
		" WHERE c_member_id	  = ".quote4db($target_c_member_id);
		mysqli_query($GLOBALS['db'], $sql);
	}
	return mysqli_errno($GLOBALS['db']);
}

function insert_rss_cache($rss, $target_c_member_id)
{
	$rss_item_list = rss_get_new($rss);

	foreach ($rss_item_list as $item) {
		// 最新のものと比較
		if (!db_is_duplicated_rss_cache($target_c_member_id, $item) &&
			!db_is_future_rss_item($item)) {

			$id = db_is_updated_rss_cache($target_c_member_id, $item);
			if ($id) {
				// update
				db_update_c_rss_cache($id, $item);
			} else {
				// insert
				$id = db_insert_c_rss_cache($target_c_member_id, $item);
			}
		}
	}

}

/**
 * メンバーのRSSを削除する
 */
function delete_rss_cache($target_c_member_id){
	$sql="DELETE FROM c_rss_cache WHERE c_member_id=".quote4db($target_c_member_id);
	mysqli_query($GLOBALS['db'], $sql);
}

function _do_c_member4c_member_id($c_member_id) {
	$sql = 'SELECT nickname, pc_address'
		. ' FROM c_member'
		. ' WHERE c_member_id ='.quote4db($c_member_id).' LIMIT 1';
	return get_array_one4db($sql);
}

function do_f_link_request_c_member4c_member_id($c_member_id) {
	return _do_c_member4c_member_id($c_member_id);
}

function do_h_message_insert_message_c_member4c_member_id( $c_member_id) {
	return _do_c_member4c_member_id($c_member_id);
}

function do_f_message_insert_message_c_member4c_member_id( $c_member_id) {
	return _do_c_member4c_member_id($c_member_id);
}

function do_h_invite_insert_c_invite_c_member4c_member_id($c_member_id) {
	return _do_c_member4c_member_id($c_member_id);
}

function do_c_join_request_insert_c_commu_member_confirm_c_member4c_member_id($c_member_id) {
	return _do_c_member4c_member_id($c_member_id);
}

function do_c_join_request_insert_c_commu_member_confirm_c_admin4c_commu_id($c_commu_id) {
	$sql = 'SELECT c_member_id, nickname, c_commu.name, pc_address ' .
		' FROM c_commu, c_member' .
		' WHERE c_commu_id=' . quote4db($c_commu_id) .
		' AND c_member_id_admin=c_member.c_member_id';
	return get_array_one4db($sql);
}

// message box にメッセージ挿入
function do_c_join_request_insert_c_commu_member_confirm_insert_c_message($c_member_id_to,$c_member_id_from,$subject,$body){
	return do_f_message_send_insert_c_message($c_member_id_to, $c_member_id_from, $subject, $body);
}

/**
サイドのバナーをクリック

*/
function do_inc_click_side_banner($target_c_banner_id,$c_member_id,$clicked_from){
	$sql = "INSERT INTO c_banner_log(r_datetime,r_date,c_banner_id,c_member_id,clicked_from)"
	." VALUES(NOW(),NOW(),".quotearray4db($target_c_banner_id,$c_member_id,$clicked_from).")";
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

/**
トップバナー情報を取得

*/
function do_inc_click_top_banner_c_banner4c_banner_id($c_banner_id)
{
	$sql = "SELECT a_href,c_banner_id,image_filename,nickname,type FROM c_banner" .
		" WHERE c_banner_id=".quote4db($c_banner_id);
	return get_array_one4db($sql);
}

/**
サイドバナー情報を取得

*/
function do_inc_click_side_banner_c_banner4c_banner_id($c_banner_id)
{
	$sql = "SELECT a_href,c_banner_id,image_filename,nickname,type FROM c_banner" .
		" WHERE c_banner_id=".quote4db($c_banner_id);
	return get_array_one4db($sql);
}

/**
本登録完了

*/
function do_regist_prof_do_regist($sid)
{
	//sidからpreの内容を引き出す
	$sql = "SELECT * FROM c_member_pre"
		." WHERE session='$sid'";
	$pre = get_array_one4db($sql);

	$sql = "INSERT INTO c_member".
		"(nickname" .
		", birth_year" .
		", birth_month" .
		", birth_day" .
		", public_flag_birth_year" .
		", r_date" .
		", is_receive_mail" .
		", is_receive_daily_news" .
		", c_member_id_invite" .
		", c_password_query_id" .
		")".
		" VALUES(".
		quotearray4db(
			$pre['nickname'],
			$pre['birth_year'],
			$pre['birth_month'],
			$pre['birth_day'],
			$pre['public_flag_birth_year']).
		",NOW()".
		",1" .
		",1".
		",".quotearray4db(
			$pre['c_member_id_invite'],
			$pre['c_password_query_id']).
		")";
	$c_member_id_new = _insert4db($sql);

	$sql = "INSERT INTO c_member_secure" .
		"(c_member_id," .
		" hashed_password," .
		" hashed_password_query_answer," .
		" pc_address," .
		" regist_address)" .
		" VALUES(" .
		quotearray4db(
			$c_member_id_new,
			md5($pre['password']),
			md5($pre['c_password_query_answer']),
			t_encrypt($pre['pc_address']),
			t_encrypt($pre['pc_address'])).
		")";
	_insert4db($sql);

	$sql = "SELECT * FROM c_member_pre_profile" .
		" WHERE c_member_pre_id = " . quote4db($pre['c_member_pre_id']);
	$profs = get_array_list4db($sql);
	foreach ($profs as $item) {
		do_config_prof_insert_c_member_profile($c_member_id_new
			, $item['c_profile_id']
			, $item['c_profile_option_id']
			, $item['value']
			, $item['public_flag']);
	}

	return $c_member_id_new;
}

/**
パスワードクエリが合っているか判定

*/
function do_password_query_is_password_query_complete($pc_address, $query_id, $query_answer)
{
	$sql = "SELECT c_member.c_member_id" .
		" FROM c_member, c_member_secure" .
		" WHERE c_member_secure.pc_address = " . quote4db(t_encrypt($pc_address)) .
		" AND c_member.c_password_query_id = " . quote4db($query_id) .
		" AND c_member_secure.hashed_password_query_answer = " . quote4db(md5($query_answer)) .
		" AND c_member.c_member_id = c_member_secure.c_member_id" .
		" LIMIT 1";

	return get_one4db($sql);
}

/**

*/
function do_password_query_c_member4pc_address($pc_address){
	$sql =	"SELECT * ".
			"FROM c_member ".
			"WHERE pc_address=".quote4db($pc_address);
	$arr = get_array_one4db($sql);
	return $arr;
}

function do_common_delete_c_member_pre4sid($sid){

	$sql = "DELETE FROM c_member_pre WHERE session=".quote4db($sid);
	return _mysql_query4db($sql);
}

/**
 * トピック情報取得
 *
 * @param	int	$c_commu_topic_id
 * @return	array $c_commu_topic
 */
function do_common_c_commu_topic4c_commu_topic_id($c_commu_topic_id,$c_member_id){
	$sql = "SELECT * FROM c_commu_topic"
		." WHERE c_commu_topic_id=".quote4db($c_commu_topic_id);
	$one = get_array_one4db($sql);

	if( $one['c_member_id'] == $c_member_id ){
		$one['is_c_commu_topic_admin'] = true;
	}

	return $one;
}

/**
 * 仮登録(new)
 */
function do_regist_prof_new($session, $prof_list)
{
	$sets = array();
	foreach ($prof_list as $key => $value) {
		$sets[] = "`{$key}`=". quote4db($value);
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_member_pre SET $sets" .
		" WHERE session=". quote4db($session);

	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_regist_prof_update_c_member_pre_profile($c_member_pre_id, $c_member_profile_list)
{
	foreach ($c_member_profile_list as $item) {
		$sql = "DELETE FROM c_member_pre_profile" .
				" WHERE c_member_pre_id = ". quote4db($c_member_pre_id).
				" AND c_profile_id = ". quote4db($item['c_profile_id']);
		_mysql_query4db($sql);

		if ($item['value']) {
			if (is_array($item['value'])) {
				foreach ($item['value'] as $key => $value) {
					do_regist_prof_insert_c_member_pre_profile($c_member_pre_id, $item['c_profile_id'], $key, $value, $item['public_flag']);
				}
			} else {
				do_regist_prof_insert_c_member_pre_profile($c_member_pre_id, $item['c_profile_id'], $item['c_profile_option_id'], $item['value'], $item['public_flag']);
			}
		}
	}
}

function do_regist_prof_insert_c_member_pre_profile($c_member_pre_id, $c_profile_id, $c_profile_option_id, $value, $public_flag)
{
	$sql = "INSERT INTO c_member_pre_profile(" .
		"c_member_pre_id, c_profile_id, c_profile_option_id, value, public_flag" .
		") VALUES(" .
		quotearray4db($c_member_pre_id, $c_profile_id, $c_profile_option_id, $value, $public_flag).
		")";
	return 	_insert4db($sql);
}

function do_common_c_member_list4null(){
	$sql =	"SELECT c_member_id, is_receive_mail, is_receive_daily_news ".
			"FROM c_member";

	$list = get_array_list4db( $sql );

	return $list;
}

function do_common_c_member_list4birthday()
{
	// この日が誕生日の人を対称にする
	// http://www.gnu.org/software/tar/manual/html_chapter/tar_7.html
	$target_date = "+1 week";

	$timestamp = strtotime($target_date);
	$month = date("n", $timestamp);
	$day   = date("j", $timestamp);

	$sql = "SELECT * FROM c_member" .
		" WHERE birth_month = $month" .
		" AND birth_day = $day";
	return get_array_list4db($sql);
}
function do_common_c_friend_list4c_member_id($c_member_id)
{
	$sql = "SELECT c_member.* FROM c_friend, c_member" .
		" WHERE c_friend.c_member_id_from=". quote4db($c_member_id) .
		" AND c_member.c_member_id=c_friend.c_member_id_to";
	return get_array_list4db($sql);
}

/**
*/
function do_common_insert_search_log($c_member_id, $searchword){
	if($searchword){
		$sql = "INSERT INTO c_searchlog (c_member_id,searchword,r_datetime)"
		." VALUES(".quotearray4db($c_member_id,$searchword).",NOW())";
		mysqli_query($GLOBALS['db'], $sql);
		$ret = mysqli_errno($GLOBALS['db']);
	}
	return $ret;
}

/*
*/
function do_common_c_member_pre4pc_address($pc_address){
	$sql =	"SELECT * ".
			"FROM c_member_pre ".
			"WHERE pc_address=".quote4db($pc_address);
	$arr = get_array_one4db($sql);
	return $arr;
}

function do_common_c_member4pc_address($pc_address){
	$sql =	"SELECT * ".
			"FROM c_member ".
			"WHERE pc_address=".quote4db($pc_address).
			" LIMIT 1";
	return get_array_one4db($sql);
}

function do_common_c_pc_address_pre4pc_address($pc_address){
	$sql =	"SELECT * ".
			"FROM c_pc_address_pre".
			" WHERE pc_address=".quote4db($pc_address) .
			" LIMIT 1";
	return get_array_one4db($sql);
}

function do_common_c_pc_address_pre4sid($sid){
	$sql =	"SELECT * ".
			"FROM c_pc_address_pre".
			" WHERE session=".quote4db($sid) .
			" LIMIT 1";
	return get_array_one4db($sql);
}

function do_common_update_c_member_pc_address4c_member_id($c_member_id, $pc_address)
{
	$sql = "UPDATE c_member_secure".
			" SET pc_address = " . quote4db(t_encrypt($pc_address)) .
			" WHERE c_member_id = " . quote4db($c_member_id);
	return _mysql_query4db($sql);
}

function do_common_delete_c_pc_address_pre4sid($sid){
	$sql = "DELETE FROM c_pc_address_pre WHERE session=".quote4db($sid);
	return _mysql_query4db($sql);
}

function do_change_mail($sid,$password){
	if (!$c_pc_address_pre = do_common_c_pc_address_pre4sid($sid)) {
		return false;
	}

	$c_member_id = $c_pc_address_pre['c_member_id'];
	$pc_address = $c_pc_address_pre['pc_address'];

	if(!db_common_authenticate_password($c_member_id, $password)) {
		return false;
	}

	do_common_update_c_member_pc_address4c_member_id($c_member_id, $pc_address);
	do_common_delete_c_pc_address_pre4sid($sid);
	return true;
}

function do_common_update_c_commu_access_date($c_commu_id)
{
	$sql = "UPDATE c_commu SET access_date=NOW()" .
			" WHERE c_commu_id=".quote4db($c_commu_id) .
			" LIMIT 1";
	return mysqli_query($GLOBALS['db'], $sql);
}

function do_insert_c_member_ktai_pre($session, $ktai_address, $c_member_id_invite)
{
	$session = mysqli_real_escape_string($GLOBALS['db'], $session);
	$ktai_address = mysqli_real_escape_string($GLOBALS['db'], $ktai_address);
	$c_member_id_invite = mysqli_real_escape_string($GLOBALS['db'], $c_member_id_invite);

	$sql = "INSERT INTO c_member_ktai_pre(session, ktai_address, r_datetime, c_member_id_invite)" .
			" VALUES('$session', '$ktai_address', NOW(), $c_member_id_invite)";
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_insert_id($GLOBALS['db']);
}

/**
 * 仮登録(new)
 */
function do_config_prof_new($c_member_id, $prof_list)
{
	$sets = array();
	foreach ($prof_list as $key => $value) {
		$sets[] = "`{$key}`=". quote4db($value);
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_member SET $sets" .
		" WHERE c_member_id=". quote4db($c_member_id);
	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);
}
/**
退会

*/
function do_inc_leave_c_commu($target_c_commu_id,$c_member_id){
	$sql = "DELETE c_commu_member FROM c_commu_member" .
		" WHERE c_member_id=". quote4db($c_member_id) .
		" AND c_commu_id=". quote4db($target_c_commu_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

//shou050616
/**
 * メッセージを下書き保存する
 */
function insert_message_to_is_save($c_member_id_to,$c_member_id_from,$subject,$body,$jyusin_message_id)
{

	$sql = "INSERT INTO c_message(c_member_id_to, c_member_id_from, subject, body, r_datetime, hensinmoto_c_message_id)" .
		" VALUES(".quotearray4db($c_member_id_to,$c_member_id_from,$subject,$body).",now(),".quote4db($jyusin_message_id).")";

	return _insert4db($sql);
}

//shou050617
/**
 * メッセージの下書きを更新
 */
function update_message_to_is_save($c_message_id,$subject,$body,$is_send=0)
{
	$sql = "UPDATE c_message SET subject=". quote4db($subject)
		.  ",body=". quote4db($body)
		.  ",r_datetime=now()"
		.  ",is_send=". quote4db($is_send)
		.  " WHERE c_message_id=".quote4db($c_message_id);
	_mysql_query4db($sql);
}

/**
 * お気に入りに追加
 */
function do_f_bookmark_add($c_member_id_from,$c_member_id_to){
	$sql = "insert c_bookmark values('', ".quotearray4db($c_member_id_from, $c_member_id_to)." ,now())";
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);

}

/*
 * お気に入り削除
 */
function do_h_bookmark_delete($c_member_id, $target_c_member_id){
	if(empty($c_member_id) || empty($target_c_member_id)){
		return null;
	}
	$sql = "delete from c_bookmark"
		  ." where c_member_id_from = " . no_quote4db($c_member_id)
		  ." and c_member_id_to = ". no_quote4db($target_c_member_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);

}

/**
メッセージ完全削除(ごみ箱からさえ見えなくする、復元方法はなし)

*/
function do_delete_c_message_from_trash($target_c_message_id){

	$sql = "UPDATE c_message SET is_kanzen_sakujo_from=1"
		  ." WHERE c_message_id=".quote4db($target_c_message_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_delete_c_message_to_trash($target_c_message_id){

	$sql = "UPDATE c_message SET is_kanzen_sakujo_to=1"
		  ." WHERE c_message_id=".quote4db($target_c_message_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

//shou050616
/**

返信側に受信メッセージIDを渡す

*/
function do_update_is_hensinmoto_c_message_id($jyusin_c_message_id, $hensin_c_message_id){

	$sql = "UPDATE c_message SET hensinmoto_c_message_id=". quote4db($jyusin_c_message_id).
		" WHERE c_message_id=".quote4db($hensin_c_message_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);

}

//shou050616
/**

返信側にある返信元メッセージIDを取得

*/
function do_get_hensinmoto_id($hensin_c_message_id){

	$sql = "select hensinmoto_c_message_id from c_message".
		" WHERE c_message_id=".quote4db($hensin_c_message_id);

	return get_one4db($sql);

}

//shou050616
/**

返信済みにする

*/
function do_update_is_hensin($target_c_message_id){
	$sql = "UPDATE c_message SET is_hensin=1".
		" WHERE c_message_id=".quote4db($target_c_message_id);
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);

}
function do_c_review_add_insert_c_review($product, $c_review_category_id){
	$sql = "select c_review_id from c_review " .
			"where asin = ". quote4db($product['ASIN']);
	$result = get_one4db($sql);

	if(!$result){
		$insert_value = array(
			"title"						=> $product['ItemAttributes']['Title'],
			"release_date"				=> $product['ItemAttributes']['ReleaseDate'],
			"manufacturer"				=> $product['ItemAttributes']['Manufacturer'],
			"c_review_category_id"		=> $c_review_category_id,
			"image_small"				=> $product['SmallImage']['URL'],
			"image_medium"				=> $product['MediumImage']['URL'],
			"image_large"				=> $product['LargeImage']['URL'],
			"url"						=> $product['DetailPageURL'],
			"asin"						=> $product['ASIN'],
			"list_price"				=> $product['ItemAttributes']['ListPrice']['Amount'],
			"retail_price"				=> $product['ourprice']
		);

		if (isset($product['ItemAttributes']['Creator'])) {
			$authors = array();
			foreach ($product['ItemAttributes']['Creator'] as $author) {
				$authors[] = $author['_content'];
			}
			$insert_value['author'] = implode(',', $authors);
		}

		if (isset($product['ItemAttributes']['OurPrice'])) {
			$insert_value['retail_price'] = $product['ItemAttributes']['OurPrice']['Amount'];
		}

		foreach($insert_value as $key => $value){
			if(is_null($value)) $value="";
			$insert_value[$key] = quote4db($value);
		}

		$keys = array_keys($insert_value);
		$keys_str = implode(",",$keys);
		$insert_str = implode(",",$insert_value);

		$sql = "insert c_review($keys_str, r_datetime) " .
				" values($insert_str, now())";
		mysqli_query($GLOBALS['db'], $sql);

		$sql = "select c_review_id from c_review " .
				"where asin = ". quote4db($product['ASIN']);
		$c_review_id = get_one4db($sql);

		return $c_review_id;
	}

	return $result;
}

function do_c_review_add_insert_c_review_comment($c_review_id , $c_member_id, $body, $satisfaction_level){
	$sql = "insert c_review_comment(c_review_id, c_member_id, body, satisfaction_level, r_datetime) " .
			"values(". quotearray4db($c_review_id, $c_member_id, $body, $satisfaction_level) .", now())";

	mysqli_query($GLOBALS['db'], $sql);
}

function do_c_review_add_c_review_category_id4category($category){
	$sql = "select c_review_category_id from c_review_category where category = " . quote4db($category);
	return get_one4db($sql);
}

function do_h_review_edit_update_c_review_comment($c_review_comment_id, $body, $satisfaction_level){
	$sql = "update c_review_comment set body = " .quote4db($body) .
			" , satisfaction_level = " .no_quote4db($satisfaction_level) .
			" , r_datetime = now() ".
			" where c_review_comment_id = ". no_quote4db($c_review_comment_id);
	mysqli_query($GLOBALS['db'], $sql);
}

function do_h_review_edit_delete_c_review_comment($c_review_comment_id){
	$sql = "delete from c_review_comment where c_review_comment_id = ". no_quote4db($c_review_comment_id);
	mysqli_query($GLOBALS['db'], $sql);
}

function do_h_review_edit_c_review_comment4c_review_comment_id_c_member_id($c_review_comment_id, $c_member_id){
	$sql = "select * from c_review_comment " .
			" where c_review_comment_id = " . no_quote4db($c_review_comment_id).
			" and c_member_id = ". quote4db($c_member_id);
	return get_array_one4db($sql);
}

function do_h_review_clip_add_c_review_id4c_review_id_c_member_id($c_review_id, $c_member_id){
	$sql = "select c_review_clip_id from c_review_clip " .
			" where c_review_id = " .no_quote4db($c_review_id).
			" and c_member_id = " . no_quote4db($c_member_id);
	return get_one4db($sql);
}

function do_h_review_clip_add_insert_c_review_clip($c_review_id, $c_member_id){
	$sql = "insert c_review_clip(c_member_id, c_review_id, r_datetime) " .
			" values(".no_quote4db($c_member_id).", ".no_quote4db($c_review_id).", now())";

	mysqli_query($GLOBALS['db'], $sql);

}

function do_c_member_review_c_review_id4c_review_id_c_member_id($c_review_id, $c_member_id, $c_commu_id){
	$sql = "select c_commu_review_id from c_commu_review " .
			" where c_commu_id = " .no_quote4db($c_commu_id).
			" and c_review_id = " .no_quote4db($c_review_id).
			" and c_member_id = " . no_quote4db($c_member_id);
	return get_one4db($sql);
}

function do_c_member_review_insert_c_commu_review($c_review_id, $c_member_id, $c_commu_id){
	$sql = "insert c_commu_review(c_commu_id, c_review_id, c_member_id, r_datetime) " .
			" values(".no_quote4db($c_commu_id).", ".no_quote4db($c_review_id).", ".no_quote4db($c_member_id).", now())";

	mysqli_query($GLOBALS['db'], $sql);
}

function do_h_schedule_add_insert_c_schedule(
  $c_member_id, $title, $body,
  $start_date, $start_time,
  $end_date, $end_time,
  $is_receive_mail)
{
  if (is_null($start_time)) {
	$start_time = 'NULL';
  } else {
	$start_time = quote4db($start_time);
  }
  if (is_null($end_time)) {
	$end_time = 'NULL';
  } else {
	$end_time = quote4db($end_time);
  }

  $sql = "INSERT INTO c_schedule(c_member_id, title, body, start_date, start_time, end_date, end_time, is_receive_mail)" .
	" VALUES (".
	quote4db($c_member_id).",".
	quote4db($title).",".
	quote4db($body).",".
	quote4db($start_date).",".
	$start_time.",".
	quote4db($end_date).",".
	$end_time.",".
	quote4db($is_receive_mail).")";

  return _insert4db($sql);
}

function do_h_schedule_edit_update_c_schedule(
  $c_member_id, $title, $body,
  $start_date, $start_time,
  $end_date, $end_time,
  $is_receive_mail,
  $c_schedule_id)
{
  if (is_null($start_time)) {
	$start_time = 'NULL';
  } else {
	$start_time = quote4db($start_time);
  }
  if (is_null($end_time)) {
	$end_time = 'NULL';
  } else {
	$end_time = quote4db($end_time);
  }

  $sql = "UPDATE c_schedule SET c_member_id=".quote4db($c_member_id) .
	", title=".quote4db($title).
	", body=".quote4db($body).
	", start_date=".quote4db($start_date).
	", start_time=".$start_time.
	", end_date=".quote4db($end_date).
	", end_time=".$end_time.
	", is_receive_mail=".quote4db($is_receive_mail).
	" WHERE c_schedule_id=".quote4db($c_schedule_id);

  return _insert4db($sql);
}

function do_h_schedule_delte_delete_c_schedule4c_schedule_id($c_schedule_id)
{
  $sql = "DELETE FROM c_schedule WHERE c_schedule_id=". quote4db($c_schedule_id);
  _mysql_query4db($sql);
}

function do_common_c_member_id4ktai_address($ktai_address)
{
	if (!$ktai_address) {
		return null;
	}
	$ktai_address = mysqli_real_escape_string($GLOBALS['db'], $ktai_address);

	$sql = "SELECT c_member_id FROM c_member_secure" .
   		" WHERE ktai_address = " . quote4db(t_encrypt($ktai_address)) .
   		" LIMIT 1";
	return get_one4db($sql);
}

function _do_insert_c_image($filename, $filepath)
{
	if (!is_readable($filepath)) return false;

	$fp = fopen($filepath, "rb");
	$image_data = fread($fp, filesize($filepath));
	fclose($fp);

	// 画像かどうかのチェック
	if (!@imagecreatefromstring($image_data)) return false;

	$image_data = base64_encode($image_data);
	$sql = "INSERT INTO c_image (filename, bin, r_datetime)" .
		" VALUES (" . quotearray4db($filename, $image_data) .", NOW())";
	return _insert4db($sql);
}

function do_c_diary_edit_delete_c_diary_image($c_diary_id, $pic_delete){

	$sql = "update c_diary set image_filename_". $pic_delete .
		  " = ''" .
		  " where c_diary_id=". quote4db($c_diary_id);
	_mysql_query4db($sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_bookmark_add_is_bookmark($c_member_id_from,$c_member_id_to){

	$sql = "select c_bookmark_id from c_bookmark " .
			" where c_member_id_from = " .no_quote4db($c_member_id_from).
			" and c_member_id_to = " . no_quote4db($c_member_id_to);
	return get_one4db($sql);
}

function do_h_review_clip_list_delete_c_review_clip($c_member_id , $c_review_clips){

	if($c_review_clips){
		$c_review_clip_str = implode(",", $c_review_clips);
	}
	else{
		return false;
	}

	$sql = "delete from c_review_clip " .
			" where c_member_id = " . no_quote4db($c_member_id) .
			" and c_review_id in (" . no_quote4db($c_review_clip_str) . ")";
	mysqli_query($GLOBALS['db'], $sql);

	return true;
}

function do_h_invite_delete_member_delete_c_member_pre($c_member_id, $delete_target_c_member_id){

	$delete_target_member = implode(",", $delete_target_c_member_id);

	$sql = "delete from c_member_pre " .
			" where c_member_id_invite =" . no_quote4db($c_member_id).
			" and c_member_pre_id in (" . no_quote4db($delete_target_member) .")";
	mysqli_query($GLOBALS['db'], $sql);
}

function do_h_invite_delete_member_delete_c_member_ktai_pre($c_member_id, $delete_target_c_member_id){
	$delete_target_member = implode(",", $delete_target_c_member_id);

	$sql = "delete from c_member_ktai_pre " .
			" where c_member_id_invite =" . no_quote4db($c_member_id).
			" and c_member_ktai_pre_id in (" . no_quote4db($delete_target_member) .")";
	mysqli_query($GLOBALS['db'], $sql);

}

function do_common_update_c_member_text($c_member_id, $text_number, $text)
{
	$field = "text" . intval($text_number);
	$sql = "UPDATE c_member SET {$field}=". quote4db($text) .
		" WHERE c_member_id=". quote4db($c_member_id);
	return _mysql_query4db($sql);
}

function do_h_config_3_insert_c_access_block($c_member_id, $c_member_id_block){
	$c_member_id_block = array_unique($c_member_id_block);
	$sql = "select c_member_id from c_member " .
			" where c_member_id in ('".implode("','", $c_member_id_block)."')";
	$c_member_id_block = get_one_list4db($sql);

	$sql = "delete from c_access_block " .
			" where c_member_id = ". no_quote4db($c_member_id);
	mysqli_query($GLOBALS['db'], $sql);

	foreach($c_member_id_block as $id){
		if($id != $c_member_id){
			$sql = "insert c_access_block values('', ".no_quote4db($c_member_id)."," .no_quote4db($id).
					", now())";
			mysqli_query($GLOBALS['db'], $sql);
		}
	}
}

//◆メッセージ受信メール
function do_common_send_message($c_member_id_from, $c_member_id_to, $subject, $body){

	//メッセージ
  	_do_insert_c_message($c_member_id_from, $c_member_id_to, $subject, $body);

	do_common_send_message_mail_send($c_member_id_to, $c_member_id_from);
}
//◆承認依頼メッセージ受信メール
function do_common_send_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body){

	//メッセージ
	_do_insert_c_message_syoudaku($c_member_id_from, $c_member_id_to, $subject, $body);

  do_common_send_message_syoudaku_mail_send($c_member_id_to, $c_member_id_from);
}

// コミュニティ紹介
function do_common_send_message_syoukai_commu($c_member_id_from, $c_member_id_to, $subject, $body)
{
	//メッセージ
	_do_insert_c_message($c_member_id_from, $c_member_id_to, $subject, $body);

  	do_common_send_message_syoukai_commu_mail_send($c_member_id_to, $c_member_id_from);
}
// メンバー紹介
function do_common_send_message_syoukai_member($c_member_id_from, $c_member_id_to, $subject, $body)
{
	//メッセージ
	_do_insert_c_message($c_member_id_from, $c_member_id_to, $subject, $body);

  	do_common_send_message_syoukai_member_mail_send($c_member_id_to, $c_member_id_from);
}

function do_h_review_edit_c_review4c_review_comment_id($c_review_comment_id){
	$sql = "SELECT c_review.* FROM c_review, c_review_comment" .
		" WHERE c_review_comment.c_review_comment_id=".no_quote4db($c_review_comment_id).
		" AND c_review_comment.c_review_id=c_review.c_review_id";
	return get_array_one4db($sql);
}

function do_config_prof_check_profile($profile_list, $public_flag_list)
{
	$result_list = array();

	foreach ($profile_list as $key => $v) {
		$sql = "SELECT c_profile_id, is_required, public_flag_edit, public_flag_default, form_type, name" .
				" FROM c_profile" .
				" WHERE name = ". quote4db($key);
		$c_profile = get_array_one4db($sql);

		switch ($c_profile['form_type']) {
		case "text":
		case "textarea":
			$value = $v;
			$c_profile_option_id = 0;
			break;
		case "select":
		case "radio":
			$sql = "SELECT value FROM c_profile_option" .
				" WHERE c_profile_option_id = ". quote4db($v).
				" AND c_profile_id = ". quote4db($c_profile['c_profile_id']);
			$value = get_one4db($sql);
			$c_profile_option_id = $v;
			break;
		case "checkbox":
			$value = array();
			$c_profile_option_id = $v;
			if (!$v) break;

			$sql = "SELECT c_profile_option_id, value FROM c_profile_option" .
				" WHERE c_profile_option_id IN (". implode(",", array_map("quote4db", $v)). ")" .
				" AND c_profile_id = ". quote4db($c_profile['c_profile_id']).
				" ORDER BY sort_order";
			$list = get_array_list4db($sql);
			foreach ($list as $item) {
				$value[$item['c_profile_option_id']] = $item['value'];
			}
			break;
		default:
			$value = "";
			$c_profile_option_id = 0;
			break;
		}

		$public_flags = array('public', 'friend', 'private');
		if ($c_profile['public_flag_edit']
			&& in_array($public_flag_list[$key], $public_flags)) {
			$public_flag = $public_flag_list[$key];
		} else {
			$public_flag = $c_profile['public_flag_default'];
		}

		$result_list[$c_profile['name']] = array(
			"c_profile_id" => $c_profile['c_profile_id'],
			"c_profile_option_id" => $c_profile_option_id,
			"value" => $value,
			"public_flag" => $public_flag,
		);
	}

	return $result_list;
}

function do_config_prof_update_c_member_profile($c_member_id, $c_member_profile_list)
{
	foreach ($c_member_profile_list as $item) {
		$sql = "DELETE FROM c_member_profile" .
				" WHERE c_member_id = ". quote4db($c_member_id).
				" AND c_profile_id = ". quote4db($item['c_profile_id']);
		_mysql_query4db($sql);

		if ($item['value']) {
			if (is_array($item['value'])) {
				foreach ($item['value'] as $key => $value) {
					do_config_prof_insert_c_member_profile($c_member_id, $item['c_profile_id'], $key, $value, $item['public_flag']);
				}
			} else {
				do_config_prof_insert_c_member_profile($c_member_id, $item['c_profile_id'], $item['c_profile_option_id'], $item['value'], $item['public_flag']);
			}
		}
	}
}

function do_config_prof_insert_c_member_profile($c_member_id, $c_profile_id, $c_profile_option_id, $value, $public_flag)
{
	$sql = "INSERT INTO c_member_profile(" .
		"c_member_id, c_profile_id, c_profile_option_id, value, public_flag" .
		") VALUES(" .
		quotearray4db($c_member_id, $c_profile_id, $c_profile_option_id, $value, $public_flag).
		")";
	return 	_insert4db($sql);
}

function do_common_c_member_ktai_pre4ktai_address($ktai_address){
	$sql =	"SELECT * ".
			"FROM c_member_ktai_pre ".
			"WHERE ktai_address=".quote4db($ktai_address);
	$arr = get_array_one4db($sql);
	return $arr;
}

function k_h_invite_inviting_member4c_member_id($c_member_id){
	$sql = "select * from c_member_ktai_pre" .
			" where c_member_id_invite = ". no_quote4db($c_member_id);
	return get_array_list4db($sql);

}

//対象のアドレスが、登録されてるか否か
function p_is_sns_join4mail_address($mail_address)
{
	$sql = "SELECT c_member_id FROM c_member_secure WHERE pc_address=".quotearray4db( t_encrypt($mail_address) )." LIMIT 1";
	$array = get_array_one4db($sql);

	$sql = "SELECT c_member_id FROM c_member_secure WHERE ktai_address=".quotearray4db( t_encrypt($mail_address) )." LIMIT 1";
	$k_array = get_array_one4db($sql);

	//対象のアドレスが登録済み
	if($array['c_member_id'] || $k_array['c_member_id']){

		return true;
	}else{

		return false;
	}

}

//c_member_ktai_preを更新
function do_update_c_member_ktai_pre($session, $ktai_address, $c_member_id_invite)
{
	$session = mysqli_real_escape_string($GLOBALS['db'], $session);
	$ktai_address = mysqli_real_escape_string($GLOBALS['db'], $ktai_address);
	$c_member_id_invite = mysqli_real_escape_string($GLOBALS['db'], $c_member_id_invite);

	$sql = "UPDATE c_member_ktai_pre set ".
		" session = " .quote4db($session) .
		" , ktai_address = " .quote4db($ktai_address) .
		" , r_datetime = NOW() ".
		" , c_member_id_invite = " .quote4db($c_member_id_invite).
		" WHERE ktai_address=". quote4db($ktai_address);

	return mysqli_query($GLOBALS['db'], $sql);
}

/**
トップのバナーをクリック

*/
function do_inc_click_top_banner($target_c_banner_id,$c_member_id,$clicked_from){
	$sql = "INSERT INTO c_banner_log(r_datetime,r_date,c_banner_id,c_member_id,clicked_from)"
	." VALUES(NOW(),NOW(),".quotearray4db($target_c_banner_id,$c_member_id,$clicked_from).")";
	mysqli_query($GLOBALS['db'], $sql);
	return mysqli_errno($GLOBALS['db']);
}

function do_common_c_review_id4c_review_comment_id($c_review_comment_id)
{
	$sql = "SELECT c_review_id FROM c_review_comment" .
		" WHERE c_review_comment_id = " . quote4db($c_review_comment_id);
	return get_one4db($sql);
}

function do_common_count_c_review_comment4c_review_id($c_review_id)
{
	$sql = "SELECT COUNT(*) FROM c_review_comment" .
		" WHERE c_review_id = " . quote4db($c_review_id);
	return get_one4db($sql);
}

function do_delete_c_review4c_review_id($c_review_id)
{
	// c_review
	$sql = "DELETE FROM c_review" .
		" WHERE c_review_id = " . quote4db($c_review_id);
	_mysql_query4db($sql);

	// c_review_clip
	$sql = "DELETE FROM c_review_clip" .
		" WHERE c_review_id = " . quote4db($c_review_id);
	_mysql_query4db($sql);

	// c_commu_review
	$sql = "DELETE FROM c_commu_review" .
		" WHERE c_review_id = " . quote4db($c_review_id);
	_mysql_query4db($sql);
}

