<?php

/**
 * メールから日記を追加
 */
function mail_insert_c_diary($c_member_id, $subject, $body)
{
    $sql = "INSERT INTO c_diary(c_member_id, subject, body, r_datetime, r_date, is_checked)" .
		" VALUES (".quotearray4db($c_member_id, $subject, $body).", NOW(), NOW(), 1)";
    return _insert4db($sql);
}
/**
 * 日記に画像を追加する
 */
function mail_update_c_diary_image($c_diary_id, $image_filename_1)
{
    if(!$c_diary_id) {
        return false;
    }

    $sql = "UPDATE c_diary" .
   		" SET image_filename_1 = " . quote4db($image_filename_1) .
        " WHERE c_diary_id = " . quote4db($c_diary_id);
    return _mysql_query4db($sql);
}
/**
 * 掲示板書き込みに画像を追加する
 */
function mail_update_c_commu_topic_comment_image($c_commu_topic_comment_id, $image_filename)
{
    if(!$c_commu_topic_comment_id) {
        return false;
    }

    $sql = "UPDATE c_commu_topic_comment" .
   		" SET image_filename1 = " . quote4db($image_filename) .
		" WHERE c_commu_topic_comment_id = " . quote4db($c_commu_topic_comment_id);
    return _mysql_query4db($sql);
}
/**
 * トピックIDからトピック情報を取得
 * 
 * @param int c_commu_topic_id
 * @return array_of_array c_commu_topic.*, commu_name
 */
function mail_c_commu_topic4c_commu_topic_id($c_commu_topic_id)
{
    $sql = "SELECT t.*, c.name AS commu_name" .
		" FROM c_commu_topic AS t, c_commu AS c" .
        " WHERE t.c_commu_topic_id = " . quote4db($c_commu_topic_id) .
        " AND c.c_commu_id = t.c_commu_id";
    return get_array_one4db($sql);
}

/**
 * トピックコメント書き込み
 * 
 * @param   int    $c_commu_id
 * @param   int    $c_commu_topic_id
 * @param   int    $c_member_id
 * @param   string $body
 * @return  int insert_id
 */
function mail_insert_c_commu_topic_comment($c_commu_id, $c_commu_topic_id, $c_member_id, $body)
{
    $insert_id = _do_insert_c_commu_topic_comment($c_commu_id, $c_commu_topic_id, $c_member_id, $body);
    do_common_update_c_commu_access_date($c_commu_id);
    return $insert_id;
}

function mail_insert_c_member_ktai_pre($session, $ktai_address, $c_member_id_invite)
{
    $sql = "INSERT INTO c_member_ktai_pre(session, ktai_address, c_member_id_invite, r_datetime)" .
		" VALUES(" . quotearray4db($session, $ktai_address, $c_member_id_invite) .", NOW())";
    return _insert4db($sql);
}

/**
 * 画像をc_imageに登録する
 */
function mail_insert_c_image($image_data, $filename)
{
	$image_data = base64_encode($image_data);
	$sql = "INSERT INTO c_image (filename, bin, r_datetime)" .
		" VALUES (" .quotearray4db($filename, $image_data) .", NOW())";
	return _insert4db($sql);
}

function mail_c_member_ktai_pre4ktai_address($ktai_address)
{
	$sql = "SELECT * FROM c_member_ktai_pre" .
		" WHERE ktai_address = " . quote4db($ktai_address) .
		" LIMIT 1";
	return get_array_one4db($sql);
}

/**
 * メイン画像を登録する
 */
function mail_update_c_member_image($c_memer_id, $image_filename, $img_num)
{
	$img_num = intval($img_num);
	
    $sql = "UPDATE c_member SET" .
    		" image_filename = ". quote4db($image_filename).
    		", image_filename_{$img_num} = ". quote4db($image_filename).
        " WHERE c_member_id=". quote4db($c_memer_id);
    return _mysql_query4db($sql);
}

?>
