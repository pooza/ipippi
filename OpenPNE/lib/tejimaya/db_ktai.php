<?php

/**
 * 新着メッセージ数取得
 */
function count_c_message_unread4c_member_id($c_member_id)
{
	$sql = "SELECT COUNT(*) FROM c_message" .
			" WHERE c_member_id_to=" .
			quote4db($c_member_id) . " AND is_read=0 AND is_send=1";
	return get_one4db($sql);
}

/**
 * 参加コミュニティ
 * 最新書き込み順
 */
function c_commu_list_lastupdate4c_member_id($c_member_id, $limit)
{
	$sql = "SELECT DISTINCT c.*";

	$sql .= " FROM c_commu_member AS cm, c_commu_topic_comment AS ctc";
	$sql .= ", c_commu AS c";

	$sql .= " WHERE cm.c_member_id=".quote4db($c_member_id);
	$sql .= " AND ctc.c_commu_id=cm.c_commu_id";
	$sql .= " AND c.c_commu_id=cm.c_commu_id";

	$sql .= " ORDER BY ctc.r_datetime DESC";
	$sql .= " LIMIT ".no_quote4db($limit);

	return get_array_list4db($sql);
}

/**
 * 携帯認証用
 * @todo 適切な場所へ移す
 */
function k_auth($c_member_id)
{
	$sql = "SELECT c_member_id FROM c_member" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	return get_one4db($sql);
}
function k_auth_login($ktai_address, $password)
{
	if(!$ktai_address or !$password) {
		return false;
	}

	$sql = "SELECT c_member_id FROM c_member_secure" .
			" WHERE ktai_address = " . quote4db(t_encrypt($ktai_address)) .
			" AND hashed_password=" . quote4db(md5($password));
	return get_one4db($sql);
}

function fetch_inc_ktai_header()
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign("sns_name", SNS_NAME);
	$inc_smarty->assign('inc_ktai_html_head', p_common_c_siteadmin4target_pagename('inc_ktai_html_head'));
	$inc_smarty->assign('inc_ktai_header', p_common_c_siteadmin4target_pagename('inc_ktai_header'));

	$inc_smarty->ext_set_call_type('ktai');
	return $inc_smarty->ext_fetch('inc_ktai_header.tpl');
}
function fetch_inc_ktai_footer()
{
	$inc_smarty = new TejimayaSmarty($GLOBALS['__SMARTY']);
	$inc_smarty->assign('inc_ktai_footer', p_common_c_siteadmin4target_pagename('inc_ktai_footer'));

	$inc_smarty->ext_set_call_type('ktai');
	return $inc_smarty->ext_fetch('inc_ktai_footer.tpl');
}

function k_do_update_ktai_address($c_member_id, $ktai_address)
{
	$sql = "UPDATE c_member_secure" .
   		" SET ktai_address = " . quote4db(t_encrypt($ktai_address)) .
		" WHERE c_member_id = " . quote4db($c_member_id);
	mysqli_stmt_execute(mysqli_prepare($GLOBALS['db'], $sql));
}

/**
 * 携帯アドレス変更
 */
function k_do_insert_c_ktai_address_pre($c_member_id, $session, $ktai_address)
{
	$sql = "INSERT INTO c_ktai_address_pre(c_member_id, session, ktai_address, r_datetime)" .
			" VALUES(".quotearray4db($c_member_id,$session,$ktai_address) .", NOW())";
	return _insert4db($sql);
}

function k_do_delete_ktai_address_pre($c_ktai_address_pre_id)
{
	$sql = "DELETE FROM c_ktai_address_pre" .
			" WHERE c_ktai_address_pre_id=".quote4db($c_ktai_address_pre_id);
	mysqli_stmt_execute(mysqli_prepare($GLOBALS['db'], $sql));
}

function c_ktai_address_pre4session($session)
{
	$sql = "SELECT * FROM c_ktai_address_pre" .
			" WHERE session=". quote4db($session);
	return get_array_one4db($sql);
}

function c_member_ktai_pre4session($session)
{
	$sql = "SELECT * FROM c_member_ktai_pre" .
			" WHERE session=". quote4db($session);
	return get_array_one4db($sql);
}

function k_do_insert_c_member($profs)
{
	$sql = "INSERT INTO c_member" .
			"(nickname," .
			"birth_year," .
			"birth_month," .
			"birth_day," .
			"public_flag_birth_year," .
			"access_date," .
			"r_date," .
			"is_receive_ktai_mail," .
			"c_member_id_invite," .
			"c_password_query_id)" .
			" VALUES" .
			"(" . quotearray4db(
				$profs['nickname'],
				$profs['birth_year'],
				$profs['birth_month'],
				$profs['birth_day'],
				$profs['public_flag_birth_year']) .
			", NOW()" .
			", NOW()" .
			", 1" .
			", " . quote4db($profs['c_member_id_invite']) .
			", " . quote4db($profs['c_password_query_id']) .
			")";
	if (!$c_member_id = _insert4db($sql)) {
		return false;
	}

	$sql = "INSERT INTO c_member_secure" .
			"(c_member_id," .
			"hashed_password," .
			"hashed_password_query_answer," .
			"ktai_address," .
			"regist_address)" .
			" VALUES" .
			"(" . quotearray4db(
				$c_member_id,
				md5($profs['password']),
				md5($profs['password_query_answer']),
				t_encrypt($profs['ktai_address']),
				t_encrypt($profs['ktai_address'])) .
			")";
	_insert4db($sql);

	return $c_member_id;
}

function k_do_delete_c_member_ktai_pre($c_member_ktai_pre_id)
{
	$sql = "DELETE FROM c_member_ktai_pre" .
			" WHERE c_member_ktai_pre_id=".quote4db($c_member_ktai_pre_id);
	mysqli_stmt_execute(mysqli_prepare($GLOBALS['db'], $sql));
}

function k_do_update_c_member($c_member_id, $props)
{
	$props = array_map("mysqli_real_escape_string", $props);
	foreach ($props as $key => $value) {
		$sets[] = "$key='$value'";
	}
	$sets = implode(",", $sets);

	$sql = "UPDATE c_member SET $sets WHERE c_member_id=".quote4db($c_member_id);
	mysqli_stmt_execute(mysqli_prepare($GLOBALS['db'], $sql));
}

/**
 * メンバーIDからハッシュ化されたパスワードを取得
 * (携帯の認証に暫定的に用いる)
 *
 * @param int $c_member_id
 * @return string hashed password
 */
function k_common_hashed_password4c_member_id($c_member_id)
{
	$sql = "SELECT hashed_password FROM c_member_secure" .
		" WHERE c_member_id = " . quote4db($c_member_id);
	return get_one4db($sql);
}

function k_do_delete_c_member_ktai_pre4ktai_address($ktai_address)
{
	$sql = "DELETE FROM c_member_ktai_pre" .
		" WHERE ktai_address = " . quote4db($ktai_address);
	_mysql_query4db($sql);
}

function k_do_delete_c_ktai_address_pre4ktai_address($ktai_address)
{
	$sql = "DELETE FROM c_ktai_address_pre" .
		" WHERE ktai_address = " . quote4db($ktai_address);
	_mysql_query4db($sql);
}

function db_ktai_update_password_query($u, $c_password_query_id, $password_query_answer)
{
	$sql = "UPDATE c_member" .
		" SET c_password_query_id = " . quote4db($c_password_query_id) .
		" WHERE c_member_id = " . quote4db($u);
	_mysql_query4db($sql);

	$sql = "UPDATE c_member_secure" .
		" SET hashed_password_query_answer = " . quote4db(md5($password_query_answer)) .
		" WHERE c_member_id = " . quote4db($u);
	_mysql_query4db($sql);
}

function db_ktai_is_password_query_complete($ktai_address, $query_id, $query_answer)
{
	$sql = "SELECT c_member.c_member_id" .
		" FROM c_member, c_member_secure" .
		" WHERE c_member_secure.ktai_address = " . quote4db(t_encrypt($ktai_address)) .
		" AND c_member.c_password_query_id = " . quote4db($query_id) .
		" AND c_member_secure.hashed_password_query_answer = " . quote4db(md5($query_answer)) .
		" AND c_member.c_member_id = c_member_secure.c_member_id" .
		" LIMIT 1";

	return get_one4db($sql);
}

function k_common_get_easy_access_id()
{
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$easy_access_id = '';

	// DoCoMo
	if (!strncmp($ua, 'DoCoMo', 6)) {
		// 携帯・自動車電話
		if (substr($ua, 7, 3) === '1.0') {
			// 『/』区切りで最後のものを取る
			$pieces = explode('/', $ua);
			$ser = array_pop($pieces);

			if (!strncmp($ser, 'ser', 3)) {
				$easy_access_id = $ser;
			}
		}
		// FOMA
		elseif (substr($ua, 7, 3) === '2.0') {
			$icc = substr($ua, -24, -1);

			if (!strncmp($icc, 'icc', 3)) {
				$easy_access_id = $icc;
			}
		}
	}

	// Vodafone(PDC)
	elseif (!strncmp($ua, 'J-PHONE', 7)) {
		$pieces = explode('/', $ua);
		$sn = array_shift(explode(' ', $pieces[3]));

		if (!strncmp($sn, 'SN', 2)) {
			$easy_access_id = $sn;
		}
	}
	// Vodafone(3G)
	//* Up.Browser を搭載しているものがある
	//* MOTは製造番号を取得できない
	elseif (!strncmp($ua, 'Vodafone', 8)) {
		$pieces = explode('/', $ua);
		$sn = array_shift(explode(' ', $pieces[4]));

		if (!strncmp($sn, 'SN', 2)) {
			$easy_access_id = $sn;
		}
	}

	// au
	elseif (!strncmp($ua, 'KDDI', 4)
		  || !strncasecmp($ua, 'up.browser', 10)
		) {
		//サブスクラバID(au)
		if ($_SERVER['HTTP_X_UP_SUBNO']) {
			$easy_access_id = $_SERVER['HTTP_X_UP_SUBNO'];
		}
	}

	return $easy_access_id;
}

function db_ktai_update_easy_access_id($c_member_id, $easy_access_id)
{
	$sql = 'UPDATE c_member_secure' .
		' SET easy_access_id = ' . quote4db(t_encrypt($easy_access_id)) .
		' WHERE c_member_id = ' . quote4db($c_member_id);
	_mysql_query4db($sql);
}

function db_ktai_c_member_id4easy_access_id($easy_access_id)
{
	if (!$easy_access_id) return false;

	$sql = "SELECT c_member_id FROM c_member_secure" .
		" WHERE easy_access_id = " . quote4db(t_encrypt($easy_access_id));
	return get_one4db($sql);
}

