<?php



/**
 * 色々
 */

 /*メッセージコードからメッセージを得る*/
function k_p_common_msg4msg_id($msg_id)
{
	if($msg_id == null){
		return null;
	}
	
	$msg = 
	array(
        0   => "ログインに失敗しました",
        1   => "本文を入力して下さい",
        2   => "タイトルを入力して下さい",
        3   => "承認が完了しました",
        4   => "承認依頼を削除しました",
        5   => "このフレンドは、現在リンク承認待ちです",
        6   => "このフレンドは、すでにリンク済みです",
        7   => "教える".WORD_MY_FRIEND_HALF."を選択してださい",
        8   => "メッセージを入力してください",
        9   => "このユーザは既に登録済みです",
        10  => "管理者なので退会できません",
        11  => "このコミュニティのメンバではありません",
        12  => "メールアドレスを入力してください",
        13  => "携帯アドレスには送信できません",
        14  => "かんたんﾛｸﾞｲﾝに失敗しました。通常ﾛｸﾞｲﾝ後、設定してください",
        15  => "ログインしてください",
        16  => "携帯アドレス以外は指定できません",
        17  => "このアドレスはすでに登録されています",
        18  => "パスワードが違います",
        19  => "携帯メールアドレスを登録しました",
        20  => "パスワードは6〜12文字の半角英数で入力してください",
        21  => "パスワードを変更しました",
        22  => "質問を選択してください",
        23  => "答えを入力してください",
        24  => "秘密の質問・答えを変更しました",
        25  => "パスワード再発行できませんでした",
        26  => "新しいパスワードをメールで送信しました",
        27  => "携帯の個体識別番号を取得できませんでした",
        28  => "かんたんログイン設定を完了しました",
        29  => "かんたんログイン設定を解除しました",
        30  => "招待メールを送信しました",
        31  => "メールアドレスを正しく入力してください",
    );
	
	return $msg[$msg_id];
}



/***
 * 共通
 */

 /*ニックネームとメンバＩＤだけを返す関数
 よく使いそうなので共通化します
 */
 function k_p_common_c_member4c_member_id($c_member_id)
 {
	 $sql = "SELECT c_member_id, nickname FROM c_member WHERE c_member_id=".quote4db($c_member_id);
	 return get_array_one4db($sql);
 }
 
 /*コミュニティ名とcomＩＤだけを返す関数
 */
 
 function k_p_common_c_commu4c_commu_id($c_commu_id)
 {
	 $sql = "SELECT c_commu_id, name FROM c_commu WHERE c_commu_id=".quote4db($c_commu_id);
	 return get_array_one4db($sql);
 }
 
 /*コミュニティのメンバ数を返す*/
 function k_p_common_count_c_commu_member_list4c_commu_id($c_commu_id) {
    $sql = "SELECT count(*) FROM c_commu_member WHERE c_commu_id=".quote4db($c_commu_id);
    $list = get_one_list4db($sql);
    return $list[0];
}


/*メンバの友達数を返す*/
function k_p_common_count_friends4c_member_id($c_member_id) {
    $sql = "SELECT count(*) FROM c_friend WHERE c_member_id_from=".quote4db($c_member_id);
    $list = get_one_list4db($sql);
    return $list[0];
}


/*fhのタイプを返す*/
/**
fhページのタイプを取得
[引数]
$target_c_member_id	対象のメンバID
$u					自分のメンバID

[返り値]
f or h
*/
function k_p_fh_common_get_type($target_c_member_id,$u){
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


/*アクセス日時を記録*/

function k_p_common_do_access($c_member_id){
	$sql =	"UPDATE c_member SET access_date=NOW() ".
			"WHERE c_member_id=".quote4db($c_member_id);
	return _mysql_query4db($sql);
}


/*あしあと*/
function k_p_etc_do_ashiato($c_member_id_to, $c_member_id_from){
	return p_etc_do_ashiato($c_member_id_to, $c_member_id_from);
}



/*************************************************
 * 
 * h_home 関連
 *
 *************************************************/

 /** 関数
  * k_p_h_home_c_member4c_member_id($c_member_id)
  * メンバＩＤからメンバ情報を取得
  * 
  * [引数]
  * c_member_id
  * 
  * [戻り値]
  * c_member_id
  * nickname
  * pc_address→変更by大串2005/03/25
  *
  * (チェックＯＫ)
  */
 
 function k_p_h_home_c_member4c_member_id($c_member_id)
 {
 	 $sql = "SELECT c_member_id, nickname, pc_address FROM c_member WHERE c_member_id=".quote4db($c_member_id);
	 return get_array_one4db($sql);
	 //return k_p_common_c_member4c_member_id($c_member_id);
 }
 
  
 
/**　関数(2005/2/8:hosoba)
 * k_p_h_home_c_message_received_unread_all_count4c_member_id($c_member_id)
 * 
 * 未読メッセージ数（メンバー、企業の両方）を取得
 * 
 * [引数]
 * int $c_member_id
 * 
 * [戻り値]
 * 未読メッセージ数（メンバー、企業の両方）
 * 
 * 
 * （チェックしました）
 */

function k_p_h_home_c_message_received_unread_all_count4c_member_id($c_member_id)
{
    $sql = "SELECT COUNT(*) FROM c_message" .
            " WHERE c_member_id_to=".quote4db($c_member_id) .
            " AND is_read=0 AND is_send=1";
    return get_one4db($sql);
}



/** 関数(2005/2/8:hosoba)
 * k_p_h_home_c_diary_friend_list4c_member_id($c_member_id, $limit)
 * 
フレンド最新日記リスト取得

[引数]
$c_member_id
$limit

[返り値]
r_datetime
nickname
c_diary_id
subject
image_filename
comment_count


（チェックしました）
*/

function k_p_h_home_c_diary_friend_list4c_member_id($c_member_id, $limit)
{
    $sql = "SELECT c_diary.*";
    $sql .= " FROM c_diary, c_friend";
    $sql .= " WHERE c_friend.c_member_id_from=".quote4db($c_member_id);
    $sql .= " AND c_diary.c_member_id=c_friend.c_member_id_to";
    $sql .= " ORDER BY c_diary.r_datetime DESC";
    $sql .= " LIMIT ". no_quote4db($limit);
    $c_diary_friend_list = get_array_list4db($sql);
    
    foreach($c_diary_friend_list as $key => $value) {
		$c_member = k_p_common_c_member4c_member_id($value['c_member_id']);
        $c_diary_friend_list[$key]['nickname'] = $c_member['nickname'];
		
	}
	
	
	//コメント数を取得
	foreach ($c_diary_friend_list as $key => $value){
		$c_diary_id = $value['c_diary_id'];
		$sql = "SELECT COUNT(*) ";
		$sql .= "FROM c_diary_comment ";
		$sql .= "WHERE c_diary_id=".quote4db($c_diary_id);
		
		$c_diary_friend_list[$key]['comment_count'] = get_one4db($sql);
	}
	
	return $c_diary_friend_list;
}
 
function k_p_h_home_c_commu_list_lastupdate4c_member_id($c_member_id, $limit)
{

    $from = " FROM c_commu_member AS cm, c_commu AS c ";

    $where = " WHERE cm.c_member_id=".quote4db($c_member_id);
    $where .= " AND c.c_commu_id=cm.c_commu_id";

    $order = " ORDER BY RAND()";
    $sql_limit = " LIMIT ". no_quote4db($limit);
    
	$sql = "SELECT DISTINCT c.*" . $from .$where . $order . $sql_limit;
	
    $c_commu_list = get_array_list4db($sql);
	
	foreach($c_commu_list as $key => $value) {
        $c_commu_list[$key]['count_members'] =
            k_p_common_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
    }
	
	return $c_commu_list;
}


/**　関数(2005/2/8:hosoba)
 * k_p_h_home_c_friend_list_random4c_member_id($c_member_id, $limit)
 * 
 * Myのフレンドのランダムなリストを得る
 *
 * [引数]
 * $c_member_id
 * $limit
 * 
 * [戻り値]
 * array of array:
 * 	c_friend.*
 *  c_member.nickname
 * count_friend
 * 
 * 
 * （チェックしました）
 */
 
 function k_p_h_home_c_friend_list_random4c_member_id($c_member_id, $limit)
 {
	$sql = "SELECT cf.* , cm.nickname";
	$sql .= " FROM c_friend AS cf, c_member AS cm";
	$sql .= " WHERE cf.c_member_id_from=".quote4db($c_member_id) .
            " AND cm.c_member_id=cf.c_member_id_to";
	$sql .= " ORDER BY RAND()";
	$sql .= " LIMIT ". no_quote4db($limit);
	 
	$c_friend_list = get_array_list4db($sql);
	
	foreach($c_friend_list as $key => $value){
		$c_friend_list[$key]['count_friend'] = k_p_common_count_friends4c_member_id($value['c_member_id_to']);
	}
	
	return $c_friend_list;
 }
 

 
 
/*****************************************************
 * h_message_box 関連
 * 
 * 
 *****************************************************/

function k_p_h_message_box_c_message_received_list4c_member_id4range($c_member_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);
    
    $start = ($page - 1) * $page_size;
    
    $sql = "SELECT * FROM c_message";
    $sql .= " WHERE c_member_id_to = ".quote4db($c_member_id) .
            " AND is_deleted_to = 0" .
            " AND is_send = 1";
    $sql .= " ORDER BY r_datetime DESC";
    $sql .= " LIMIT $start, $page_size";
	
    $c_message_list = get_array_list4db($sql);
    
    foreach($c_message_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_from']);
        $c_message_list[$key]['nickname'] = $c_member['nickname'];
    }

	$sql = "SELECT COUNT(*) FROM c_message" .
			" WHERE c_member_id_to = ".quote4db($c_member_id) .
            " AND is_deleted_to = 0" .
            " AND is_send = 1";
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

	return array($c_message_list , $prev , $next, $total_num);
}

function k_p_h_message_box_c_message_sent_list4c_member_id4range($c_member_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    
	$start = ($page - 1) * $page_size;
        
    $sql = "SELECT * FROM c_message";
    $sql .= " WHERE c_member_id_from = ".quote4db($c_member_id) .
            " AND is_deleted_from = 0" .
            " AND is_send = 1";
    $sql .= " ORDER BY r_datetime DESC";
    $sql .= " LIMIT $start, $page_size";
    $c_message_list = get_array_list4db($sql);
    
    foreach($c_message_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
        $c_message_list[$key]['nickname'] = $c_member['nickname'];
    }
	
	$sql = "SELECT COUNT(*) FROM c_message" .
			" WHERE c_member_id_from = ".quote4db($c_member_id) .
            " AND is_deleted_from = 0" .
            " AND is_send = 1";
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

	return array($c_message_list , $prev , $next, $total_num);	
}
 
 
 
/****************************************************
 * h_message 関連
 * 
 */

 /** 関数
  * k_p_h_message_c_message4c_message_id($c_message_id)
  * メッセージＩＤからメッセージとニックネームを取得
  * 
  * [引数]
  * $c_message_id
  * 
  * [戻り値]
  * c_message.*
  * c_member_nickname_from,	: 送信者ニックネーム
  * c_member_nickname_to	: 受信者ニックネーム
  * 
  */
function k_p_h_message_c_message4c_message_id($c_message_id)
{
	return _db_c_message4c_message_id($c_message_id);
}



/*********************************************************
 * 
 * h_message_send 関連
 * 
 *********************************************************/

 
 /** 関数
  * k_p_h_message_send_c_friend_list_random4c_member_id
  * 
  * 友達ランダム５０人
  *  k_p_c_invite_c_friend_list_random4c_member_id と同じ
  *  
  *  [引数]
  *  $c_member_id
  *  
  *  [戻り値]
  * c_member_id (友達の)
  * nickname
  */
 
 function k_p_h_message_send_c_friend_list_random4c_member_id($c_member_id)
 {
	$sql = "SELECT cf.c_member_id_to, cm.nickname";
	$sql .= " FROM c_friend AS cf, c_member AS cm";
	$sql .= " WHERE cf.c_member_id_from=". quote4db($c_member_id) .
            " AND cf.c_member_id_to=cm.c_member_id";
	$sql .= " ORDER BY RAND()";
	$sql .= " LIMIT 50";
	
	return get_array_list4db($sql);
 }

/********************************************************
 * h_diary_edit 関連
 * 
 ******************************************************/

function k_p_h_diary_edit_c_diary4c_diary_id($c_diary_id)
{
    return k_p_fh_diary_c_diary4c_diary_id($c_diary_id);
}
 
 /*********************************************************
  * h_com_category 関連
  * 
  ********************************************************/
 
 /** 関数
  * k_p_h_com_category_c_commu_category_name4c_commu_category_id($c_commu_category_id)
  * コミュニティの小カテゴリＩＤから小カテゴリ名を得る
  * 
  * [引数]
  * $c_commu_category_id
  * 
  * [戻り値]
  * name
  * 
  */ 
 
  function k_p_h_com_category_c_commu_category_name4c_commu_category_id($c_commu_category_id)
  {
	  $sql = "SELECT name FROM c_commu_category" .
            " WHERE c_commu_category_id=".quote4db($c_commu_category_id);
	  return get_one4db($sql);
  }
  
  
 /** 関数
 k_p_h_com_category_c_commu_list4c_commu_category_id($c_commu_category_id, $page_size, $page)
 コミュニティの小カテゴリから、コミュニティリストを得る
 取得範囲を指定できる
 IDが新しいもの順

[引数]
$c_commu_category_id
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
c_commu_id
name
count_members
prev 「前へ」があるかどうか
next 「次へ」があるかどうか


*/

function k_p_h_com_category_c_commu_list4c_commu_category_id($c_commu_category_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    
    $sql = "SELECT  c_commu_id, name "
                . " FROM c_commu "
                . " WHERE c_commu_category_id=".quote4db($c_commu_category_id)
                . " ORDER BY c_commu_id DESC "
                . " LIMIT ".($page_size*($page-1)).",$page_size";
      
    $c_commu_list = get_array_list4db($sql);
    $sql = "select count(*) from c_commu" .
            " where c_commu_category_id= ".quote4db($c_commu_category_id);

	//各コミュの人数を取得
	foreach($c_commu_list as $key => $value){
		$c_commu_list[$key]['count_members'] =
            _db_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
	}	
	

       $total_num = get_one4db($sql);
    
//       print "page_size" . $page_size;
//       print "page:" .$page;
//       print "total_num:" . $total_num;
    
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
       return array($c_commu_list , $prev , $next);
    
}
function  k_p_h_com_category_c_commu_list4c_commu_category_id_search($c_commu_category_id, $page_size, $page, $search_word)
{
    $start = ($page - 1) * $page_size;
    
    $select = "SELECT *";
    $from = " FROM c_commu";
        
    $where = " WHERE 1";
    if ($search_word) {
        $search_word = no_quote4db($search_word);
        $where .= " AND search_word LIKE '%$search_word%'";
    }
    if ($c_commu_category_id != "all" && $c_commu_category_id) {
        $where .= " AND c_commu_category_id=".quote4db($c_commu_category_id);
    }
//    $where .= " AND cc.c_commu_category_id=c.c_commu_category_id";
    
//    $order = " ORDER BY name";
    $order = " ORDER BY access_date DESC";
    $limit = " LIMIT ".no_quote4db($start).",".no_quote4db($page_size);

    $sql = $select.$from.$where.$order.$limit;
    $list = get_array_list4db($sql);
    
    foreach ($list as $key => $value) {
        $sql = "SELECT COUNT(*) FROM c_commu_member" .
            " WHERE c_commu_id=".quote4db($value['c_commu_id']);
        $list[$key]['count_commu_member'] = get_one4db($sql);
    }
    
    $sql = "SELECT count(*)".$from.$where;
    $total_num = get_one4db($sql);
    
    if($total_num != 0){
         $total_page_num =  ceil($total_num / $page_size);
         if($page >= $total_page_num){
            $next = false;
         } else {
            $next = true;
         }
         
         if($page <= 1){
            $prev = false;
         } else {
            $prev = true;
         }
     }
     
     return array($list, $prev, $next, $total_num);
}


/** 関数
 * k_p_h_com_category_c_commu_category_parent_id4c_commu_category_id($c_commu_category_id)
 * 
 */

function k_p_h_com_category_c_commu_category_parent_id4c_commu_category_id($c_commu_category_id)
{
	$sql = "SELECT c_commu_category_parent_id FROM c_commu_category" .
            " WHERE c_commu_category_id=".quote4db($c_commu_category_id);
	
	return get_one4db($sql);
}

 
/*********************************************************
 * h_com_find_all 関連
 * 
 ********************************************************/
 
 /** 関数
  * k_p_h_com_find_all_c_commu_list_lastupdated($limit)
  * 参加不参加にかかわらず、最新書き込みのあったコミュニティリストを取得
  * 
  * [引数]
  * $limit
  * 
  * [戻り値]
  * c_commu_id
  * name
  * 
  * (チェックＯＫ)
  * 
  */
 function k_p_h_com_find_all_c_commu_list_lastupdated($limit)
 {
 	$sql = "SELECT c_commu_id, MAX(r_datetime) as updatetime" .
		" FROM c_commu_topic_comment" .
		" GROUP BY c_commu_id" .
		" ORDER BY updatetime DESC" .
		" LIMIT " . no_quote4db($limit);
	$comments = get_array_list4db($sql);
	
	$c_commu_list = array();
	foreach ($comments as $comment) {
		$c_commu = k_p_common_c_commu4c_commu_id($comment['c_commu_id']);
		$c_commu['updatetime'] = $comment['updatetime'];
		$c_commu_list[] = $c_commu;
	}
	return $c_commu_list;
 }
 
 
 /**　関数
  * k_p_h_com_find_all_c_commu_category_parent_list()
  * 全ての中カテゴリのリストを取得する
  * 
  * [引数]
  * なし
  * 
  * [戻り値]
  * c_commu_category_parent.*
  * 
  * （チェックＯＫ）
  */

function k_p_h_com_find_all_c_commu_category_parent_list()
{
	$sql = "SELECT * FROM c_commu_category_parent WHERE 1 ORDER BY sort_order";
	
	return get_array_list4db($sql);
}



/******************************************************
 * h_com_find_result 関連
 * 
 *****************************************************/

 /**　関数
  * k_p_h_com_find_result_search_c_commu4c_commu_category_parent_id($search_word, $c_commu_category_parent_id, $page, $page_size)
  * 中カテゴリＩＤ内で、search_wordに基づくコミュニティ検索を行う。
  * 
  * [引数]
  * $search_word
  * $c_commu_category_parent_id (全カテゴリの場合は"all")
  * $page_size
  * $page
  * 
  * [戻り値]
  * list
  * [0](array of array)
  * 	 c_commu_id
  * 	 name
  * 	 count_commu_member 
  * [1]count_result (検索結果の全件数)
  * [2]prev 「前へ」があるかどうか
  * [3]next 「次へ」があるかどうか
  * 
  * 
  * 
  */
 function k_p_h_com_find_result_search_c_commu4c_commu_category_parent_id($search_word, $c_commu_category_parent_id, $page_size, $page)
 {
    $page = intval($page);
    $page_size = intval($page_size);    
    
    $start = ($page - 1) * $page_size;
    
    $select = "SELECT c.*";
    $from = " FROM c_commu AS c, c_commu_category AS cc";
        
    $where = " WHERE 1";
    if ($search_word) {
        $search_word = no_quote4db($search_word);
        $where .= " AND c.search_word LIKE '%$search_word%'";
    }
    if ($c_commu_category_parent_id != "all" && $c_commu_category_parent_id) {
        $where .= " AND cc.c_commu_category_parent_id=".quote4db($c_commu_category_parent_id);
    }
    $where .= " AND cc.c_commu_category_id=c.c_commu_category_id";
    
//    $order = " ORDER BY c.name";
    $order = " ORDER BY c.access_date DESC";
    $limit = " LIMIT ".no_quote4db($start)."," . no_quote4db($page_size);

    $sql = $select.$from.$where.$order.$limit;
	$list = get_array_list4db($sql);
	
    foreach ($list as $key => $value) {
        $sql = "SELECT COUNT(*) FROM c_commu_member" .
            " WHERE c_commu_id=".quote4db($value['c_commu_id']);
        $list[$key]['count_commu_member'] = get_one4db($sql);
    }
    
	$sql = "SELECT count(*)".$from.$where;
	$total_num = get_one4db($sql);
	
	if($total_num != 0){
         $total_page_num =  ceil($total_num / $page_size);
         if($page >= $total_page_num){
            $next = false;
         } else {
            $next = true;
         }
         
         if($page <= 1){
            $prev = false;
         } else {
            $prev = true;
         }
     }
	 
     return array($list , $total_num ,$prev , $next);
}


 
 
 /**********************************************************
  * f_friend_find 関連
  * 
  ******************************************************/
 
  /** 関数
   * k_p_h_friend_find($nickname,$page_size,$page)
   * フレンド検索
   * IDが新しい順
   * 取得範囲を指定できる
   *
   * [引数]
   * $nickname
   * $page_size
   * $page
   * 
   * [戻り値]
   * list
   * [0]array of array
   * 	c_member_id
   * 	nickname
   * 	count_friend
   * [1]count_result (検索結果の全件数)
   * [2]prev 「前へ」があるかどうか
   * [3]next 「次へ」があるかどうか
   *     	
   */
function k_p_h_friend_find($nickname, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    
    $start = ($page - 1) * $page_size;
    $limit = " LIMIT ".no_quote4db($start).",". no_quote4db($page_size);
    
  $where = " where 1";

  if($nickname){
    $nickname = no_quote4db($nickname);
    $where .= " and c_member.nickname like '%$nickname%'";
  }

  $from = " FROM c_member";
  $order = " ORDER BY c_member_id DESC";

  $sql = "SELECT c_member_id, nickname "
    . $from
    . $where
    . $order 
    . $limit;

  $list = get_array_list4db($sql);
  
  foreach($list as $key => $value){
	  $list[$key]['count_friend'] = 
	  	p_common_count_friends4c_member_id($value['c_member_id']);
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
  return array($list , $total_num, $prev , $next);
}

/************************************************************
 * h_com_category_parents 関連
 * 
 *********************************************************/

 /**　関数
  * k_p_h_com_category_parents_c_commu_category_list4c_commu_category_parent_id($c_commu_category_parent_id)
  * 中カテゴリに属する小カテゴリのリストを取得する。
  * 
  * [引数]
  * $c_commu_category_parent_id
  * 
  * [戻り値]
  * c_commu_category.*
  * 
  */
 
 function k_p_h_com_category_parents_c_commu_category_list4c_commu_category_parent_id($c_commu_category_parent_id)
 {
	 $sql = "SELECT * FROM c_commu_category" .
            " WHERE c_commu_category_parent_id=".quote4db($c_commu_category_parent_id);
	 
	 return get_array_list4db($sql);
 }
 
 
 /** 関数
  * k_p_h_com_category_parents_c_commu_category_parent_name4c_commu_category_id($c_commu_category_parent_id)
  * 小カテゴリＩＤから中カテゴリの名前を取得する。
  *
  * [引数]
  * $c_commu_category_id
  * 
  * [戻り値]
  * name
  * 
  * （チェックＯＫ）
  */
 
function k_p_h_com_category_parents_c_commu_category_parent_name4c_commu_category_parent_id($c_commu_category_parent_id)
{
	$sql = "SELECT name FROM c_commu_category_parent ";
	$sql.= " WHERE c_commu_category_parent_id=".quote4db($c_commu_category_parent_id);
	
	return get_one4db($sql);
}
 


/**********************************************************
 * h_confirm_list 関連
 * 
 ***********************************************************/

/** 関数
 * k_p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($c_member_id_to)
 * あなたにフレンドリンクを要請しているメンバー(リンク承認待ち)
 * 
 * @param	int $c_member_id_to	: 要請されている方(あなた)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: 要請している人の名前
 * 				message_disp    : 表示用メッセージ
 */

function k_p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($c_member_id_to)
{
    $sql = "SELECT * FROM c_friend_confirm WHERE c_member_id_to=".quote4db($c_member_id_to);
    $sql .= " ORDER BY r_datetime DESC";
    $c_friend_confirm_list = get_array_list4db($sql);
    
    foreach ($c_friend_confirm_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_from']);
        $c_friend_confirm_list[$key]['nickname'] = $c_member['nickname'];
    }
    return $c_friend_confirm_list;
}


/**　関数
 * k_p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($c_member_id_from)
 * あなたがフレンドリンクを要請しているメンバー(リンク要請中)
 * 
 * @param	int $c_member_id_from	: 要請している方(あなた)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: 要請されている人の名前
 * 				message_disp	: 表示用メッセージ
 */
function k_p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($c_member_id_from)
{
    $sql = "SELECT * FROM c_friend_confirm" .
            " WHERE c_member_id_from=".quote4db($c_member_id_from);
    $sql .= " ORDER BY r_datetime DESC";
    $c_friend_confirm_list = get_array_list4db($sql);
    
    foreach ($c_friend_confirm_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_to']);
        $c_friend_confirm_list[$key]['nickname'] = $c_member['nickname'];
    }
    return $c_friend_confirm_list;
}


/** 関数
 * k_p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($c_member_id)
 * あなたに(の)管理コミュニティに参加を希望しているメンバー(参加承認待ち)
 * 
 * @param	int $c_member_id	: 要請されている方(あなた＝管理者)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*
 * 				c_commu_name	: コミュニティの名前
 * 				nickname		: 要請している人の名前
 * 				message_disp    : 表示用メッセージ
 */

function k_p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($c_member_id)
{
    $sql = "SELECT cmc.*, c.name AS c_commu_name";
    $sql .= " FROM c_commu_member_confirm AS cmc, c_commu AS c";
    $sql .= " WHERE c.c_member_id_admin=".quote4db($c_member_id) .
            " AND cmc.c_commu_id=c.c_commu_id";
    $c_commu_member_confirm_list = get_array_list4db($sql);
    
    foreach ($c_commu_member_confirm_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id']);
        $c_commu_member_confirm_list[$key]['nickname'] = $c_member['nickname'];
    }
    return $c_commu_member_confirm_list;
}


/** 関数
 * k_p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($c_member_id)
 * あなたがコミュニティ参加要請しているコミュニティ(参加要請中)
 * 
 * @param	int $c_member_id	: 要請している方(あなた)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*,
 * 				c_commu_name		: コミュニティの名前
 * 				c_member_id_admin	: 管理者のメンバーID
 * 				nickname			: 管理者の名前
 */
function k_p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($c_member_id)
{
    $sql = "SELECT cmc.*, c.name AS c_commu_name, c.c_member_id_admin";
    $sql .= " FROM c_commu_member_confirm AS cmc, c_commu AS c";
    $sql .= " WHERE cmc.c_member_id=".quote4db($c_member_id) .
            " AND cmc.c_commu_id=c.c_commu_id";
    $c_commu_member_confirm_list = get_array_list4db($sql);
    
    foreach ($c_commu_member_confirm_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id_admin']);
        $c_commu_member_confirm_list[$key]['nickname'] = $c_member['nickname'];
    }
    return $c_commu_member_confirm_list;
}



/*********************************************************
 * f_home 関連
 * 
 *******************************************************/

/** 関数
 * k_p_f_home_c_diary_list4c_member_id($target_c_member_id, $limit)
 * ターゲットメンバの最新日記のリストを返す
 * 
 * [引数]
 * $target_c_member_id
 * $limit
 * 
 * [戻り値]
 * c_diary_id
 * r_date
 * subject
 * count_comment
 * 
 * (チェックＯＫ)
 */

function k_p_f_home_c_diary_list4c_member_id($target_c_member_id, $limit)
{
	//日記リスト
	$sql = "SELECT c_diary_id, r_date, subject ,image_filename_1 ";
	$sql .= "FROM c_diary ";
	$sql .= "WHERE c_member_id=".quote4db($target_c_member_id);
	$sql .= " ORDER BY r_date DESC ";
	$sql.= "LIMIT ". no_quote4db($limit);
	
	$c_diary_list = get_array_list4db($sql);
	
	//コメント数
	foreach($c_diary_list as $key => $value){
		$c_diary_id = $value['c_diary_id'];
		
		$sql = "SELECT COUNT(*) ";
		$sql .= "FROM c_diary_comment ";
		$sql .= "WHERE c_diary_id=".quote4db($c_diary_id);
		$c_diary_list[$key]['count_comment'] = get_one4db($sql);
	}
	
	return $c_diary_list;
}


/** 関数
 * k_p_f_home_c_friend_list_random4c_member_id($target_c_member_id, $limit)
 * ターゲットメンバのフレンドのランダムなリストを返す
 * 
 * [引数]
 * $target_c_member_id
 * $limit
 * 
 * [戻り値]
 * c_friend.*
 * nickname
 * count_friend
 * 
 */
function k_p_f_home_c_friend_list_random4c_member_id($target_c_member_id, $limit)
{
	return k_p_h_home_c_friend_list_random4c_member_id($target_c_member_id, $limit);
}

 
/**　関数
 * k_p_f_home_c_commu_list_lastupdated4c_member_id($target_c_member_id, $limit)
 * 参加コミュニティリスト最新書き込み順
 * 自主公式混合
 * 
 * k_p_h_home_c_commu_list_lastupdate4c_member_id($c_member_id, $limit)
 * と同じです。
 * 
 */

 function k_p_f_home_c_commu_list_lastupdated4c_member_id($target_c_member_id, $limit)
 {
	 return k_p_h_home_c_commu_list_lastupdate4c_member_id($target_c_member_id, $limit);
 }
 
 
 /**　関数
  * k_p_f_home_relationship4two_members($c_member_id, $target_c_member_id)
  * ２つのメンバＩＤからその２人の関係を返す。
  * 
  * [引数]
  * $c_member_id
  * $target_c_member_id
  * 
  * [戻り値]
  * bool friend (フレンドかどうか)
  * bool wait (リンク承認待ち)
  * 
  */
 
  function k_p_f_home_relationship4two_members($c_member_id, $target_c_member_id)
  {
	  $relation = array(
		'friend' => false,
		'wait' => false);
	  
	  //リンク承認待ちかどうかをチェック
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_friend_confirm ";
	  $sql .= "WHERE c_member_id_from=". quote4db($c_member_id) .
            " AND c_member_id_to=". quote4db($target_c_member_id);
	  
	  if(get_one4db($sql)){
		  //リンク承認待ちなら
		  $relation['wait'] = true;
		  return $relation;
	  }
	  
	  //友達かどうかチェック
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_friend ";
	  $sql .= "WHERE c_member_id_from=". quote4db($c_member_id) .
            " AND c_member_id_to=". quote4db($target_c_member_id); 
	  
	  if(get_one4db($sql)){
		  //友達なら
		  $relation['friend'] = true;
		  return $relation;
	  }
	  
	  //他人
	  return $relation;
	  
  }
 
  
  
  
/***********************************************************
 * f_message_send 関連
 * 
 *********************************************************/

 /**　関数
  * k_p_f_message_send_c_member4c_member_id($target_c_member_id)
  * メンバの情報(ID,ニックネーム)を取得
  * 
  * k_p_f_message_send_c_member4c_member_id($c_member_id)と同じ
  * 
  * [引数]
  * $c_memnber_id
  * 
  * [戻り値]
  * c_member_id
  * nickname
  * 
  * (チェックＯＫ)
  */

  function k_p_f_message_send_c_member4c_member_id($target_c_member_id)
  {
	return k_p_common_c_member4c_member_id($target_c_member_id);
  }
 
  
  
 /****************************************************:
  * f_link_request, f_link_request_err 関連
  * 
  */
 
  /**　関数
   * k_f_link_request_c_member4c_member_id($c_member_id)
   * 
   * k_p_h_home_c_member4c_member_id($c_member_id)　と同じ。
   * IDとニックネームが返される
   */
  
  function k_f_link_request_c_member4c_member_id($c_member_id)
  {
	  return k_p_common_c_member4c_member_id($c_member_id);
  } 
  
  
  
/************************************************************
 * 
 * fh_friend_list 関連
 * 
 ************************************************************/

 /** 関数
  * k_p_fh_friend_list_friend_list4c_member_id($c_member_id,$page_size,$page)
  * 
  * [引数]
  * $c_member_id
  * $page_size
  * $page
  * 
  * [戻り値]
  * image_filename
  * c_member_id
  * nickname
  * access_date
  * c_member_id
  * 
  * (チェックＯＫ)
  */
 
function k_p_fh_friend_list_friend_list4c_member_id($c_member_id,$page_size,$page)
{
    $page = intval($page);
    $page_size = intval($page_size);	
	
	$sql = 
		"SELECT ".
			"`c_friend_id`,".
			"`c_member_id_from`,".
			"`c_member_id_to`,".
			"`r_datetime`".
		" FROM ".
			"c_friend".
		" WHERE c_member_id_from=".quote4db($c_member_id).
        " ORDER BY r_datetime DESC".
		" LIMIT ".(($page-1)*$page_size)."," .no_quote4db($page_size);
        

    $c_friend_list = get_array_list4db($sql);
 
    foreach($c_friend_list as $key => $value) {
        $c_member = db_common_c_member4c_member_id($value['c_member_id_to']);
        
        $c_friend_list[$key]['image_filename'] = $c_member['image_filename'];
        $c_friend_list[$key]['c_member_id'] = $c_member['c_member_id'];
        $c_friend_list[$key]['nickname'] = $c_member['nickname'];
        $c_friend_list[$key]['access_date'] = $c_member['access_date'];
        
        $c_friend_list[$key]['friend_count'] = k_p_common_count_friends4c_member_id($c_member['c_member_id']);
        
    }
    	
	
    $sql = "select count(*) from c_friend" .
            " where c_member_id_from=".quote4db($c_member_id);
	
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
    return array($c_friend_list , $prev , $next);
}


/** 関数
 * k_p_fh_friend_list_c_member4c_member_id($c_member_id)
 * メンバの情報（ID, ニックネーム）を取得
 * 
 * [引数]
 * $c_member_id
 * 
 * [戻り値]
 * c_member_id
 * nickname
 * 
 * (チェックＯＫ)
 */

function k_p_fh_friend_list_c_member4c_member_id($c_member_id)
{
	return k_p_common_c_member4c_member_id($c_member_id);
}



/*********************************************************
 * fh_diary_list 関連
 * 
 *******************************************************/

 /** 関数
  * k_p_fh_diary_list_c_diary_list4c_member_id($c_member_id, $page_size, $page)
  * 最新日記リストを取得。
  * 取得範囲を指定できる。
  * 
  * [引数]
  * $c_member_did
  * $page_size
  * $page
  * 
  * [戻り値]
  * (list)
  * [0]array
  * 	c_diary_id
  * 	r_date
  * 	subject
  *		image_filename
  * 	nickname
  * 	count_comment
  * [1]prev 「前へ」があるかどうか
  * [2]next 「次へ」があるかどうか
  * 
  */
 //shou050601
  function k_p_fh_diary_list_c_diary_list4c_member_id($c_member_id, $page_size, $page)
  {
    
    $page = intval($page);
    $page_size = intval($page_size);    
	  $start = $page_size*($page - 1);
	  
	  $sql = "SELECT cd.c_diary_id, cd.r_date, cd.subject, ";
	  $sql .= " cd.image_filename_1, ";
	  $sql .= " cd.image_filename_2, ";
	  $sql .= " cd.image_filename_3, ";
	  $sql .= " cm.nickname ";
	  $sql .= " FROM c_diary AS cd, c_member AS cm ";
	  $sql .= " WHERE cd.c_member_id=".quote4db($c_member_id);
	  $sql .= " AND cm.c_member_id=".quote4db($c_member_id);
	  $sql .= " ORDER BY r_datetime DESC ";
	  $sql .= " LIMIT $start,".no_quote4db($page_size);
	  
	  $c_diary_list = get_array_list4db($sql);
	  
	  foreach($c_diary_list as $key => $value){
		  $c_diary_id = $value['c_diary_id'];
		  $sql = "SELECT COUNT(*) FROM c_diary_comment" .
                " WHERE c_diary_id=".quote4db($c_diary_id);
		  $c_diary_list[$key]['count_comment'] = get_one4db($sql);
	  }
	  
	$sql = "SELECT count(*) FROM c_diary" .
            " WHERE c_member_id=".quote4db($c_member_id);

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
    return array($c_diary_list , $prev , $next);
	  
  }
 

 /** 関数 
  * k_p_fh_diary_list_c_member4c_member_id($c_member_id)
  * ＩＤとニックネームを返す
  */ 
 
  function k_p_fh_diary_list_c_member4c_member_id($c_member_id)
  {
	  return k_p_common_c_member4c_member_id($c_member_id);
  }
  
  
 
/***************************************************
 * fh_diary 関連
 * 
 **************************************************/   
  
 /** 関数
  * k_p_fh_diary_c_diary4c_diary_id($c_diary_id)
  * c_diary_idからc_diaryを得る
  * 
  * [引数]
  * $c_diary_id
  * 
  * [戻り値]
  * c_diary.*
  * 
  */
 
  function k_p_fh_diary_c_diary4c_diary_id($c_diary_id)
  {
	  $sql = "SELECT * FROM c_diary WHERE c_diary_id=".quote4db($c_diary_id);
	  $tmp = get_array_one4db($sql);
      return $tmp;
  }
 
  
  /** 関数
   * k_p_fh_diary_c_diary_comment4c_diary_id($c_diary_id)
   * 日記へのコメントリストを取得
   * 
   * 
   * [引数]
   * $c_diary_id
   * 
   * [戻り値]
   * c_diary_comment.*
   * nickname
   */
  
  function k_p_fh_diary_c_diary_comment_list4c_diary_id($c_diary_id)
  {
	  $sql = "SELECT * FROM c_diary_comment ";
	  $sql .= " WHERE c_diary_id=".quote4db($c_diary_id);
	  $sql .= " ORDER BY r_datetime ";
	  $c_diary_comment_list = get_array_list4db($sql);
	  
	  foreach($c_diary_comment_list as $key => $value){
		  $c_member = db_common_c_member4c_member_id_LIGHT($value['c_member_id']);
		  $c_diary_comment_list[$key]['nickname'] = $c_member['nickname'];
	  }
	  
	  return $c_diary_comment_list;
  }
  
  
  /** 関数
   * k_p_fh_diary_c_member4c_diary_id($c_diary_id)
   * 日記ＩＤからその日記を書いたメンバＩＤとニックネームを得る
   * 
   * [引数]
   * $c_diary_id
   * 
   * [戻り値]
   * c_member_id
   * nickname
   * 
   */
  
   function k_p_fh_diary_c_member4c_diary_id($c_diary_id)
   {
	   $sql = "SELECT cm.c_member_id, cm.nickname ";
	   $sql .= " FROM c_member AS cm, c_diary AS cd ";
	   $sql .= " WHERE cd.c_diary_id=".quote4db($c_diary_id);
	   $sql .= " AND cm.c_member_id=cd.c_member_id ";
	   
	   return get_array_one4db($sql);
   }
  
   
 /** 関数
  * k_p_fh_diary_c_diary_id4c_diary_comment_id($c_diary_comment_id) 
  * 
  */
   
function k_p_fh_diary_c_diary_id4c_diary_comment_id($c_diary_comment_id)
{
	$sql = "SELECT c_diary_id ";
	$sql .= " FROM c_diary_comment ";
	$sql .= " WHERE c_diary_comment_id=".quote4db($c_diary_comment_id);
	
	return get_one4db($sql);
}
	
	
   
/*******************************************************
 * fh_com_list 関連
 * 
 ***************************************************/

 /** 関数
  *  k_p_fh_com_list_c_commu_list4c_member_id($c_member_id, $page_size, $page)
  *  
  *  自主・公式混合で参加コミュニティリストを取得
  *  範囲を指定できる
  *  ＩＤが新しいもの順
  *  
  *  [引数]
  *  $page ページ
  *  $page_size　１ページに表示する件数
  *  
  *  [戻り値]
  *  c_commu
  *  	name
  *  	c_commu_id
  *  	count_members
  *  prev 「次へ」があるかどうか
  *  next　「前へ」
  */
function k_p_fh_com_list_c_commu_list4c_member_id($c_member_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    $start = ($page - 1) * $page_size;
    
    $sql = "SELECT name, c_commu.c_commu_id FROM c_commu_member , c_commu";
    $sql .= " WHERE c_commu_member.c_member_id=".quote4db($c_member_id);
    $sql .= " AND c_commu.c_commu_id=c_commu_member.c_commu_id";
    $sql .= " ORDER BY c_commu.c_commu_id DESC ";
    $sql .= " LIMIT $start, $page_size";
	
    $c_commu_list = get_array_list4db($sql);
    
    foreach($c_commu_list as $key => $value) {
        $c_commu_list[$key]['count_members'] =
            _db_count_c_commu_member_list4c_commu_id($value['c_commu_id']);
    }
    $sql = "select count(*) from c_commu_member ,c_commu" .
            " where c_commu_member.c_commu_id=c_commu.c_commu_id" .
            " and c_member_id=".quote4db($c_member_id);

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
    return array($c_commu_list , $prev , $next);
}


/** 関数
 * k_p_fh_com_list_c_member4c_member_id($c_member_id)
 * k_p_h_home_c_member4c_member_id($c_member_id)と同じ
 */

function k_p_fh_com_list_c_member4c_member_id($c_member_id)
{
	return k_p_common_c_member4c_member_id($c_member_id);
}


/** 関数
 * 
 */

/*Excelリストに加える！*/
 
 function k_p_fh_com_list_c_commu_list_count4c_member_id($c_member_id)
 {
	 $sql = "SELECT COUNT(*) FROM c_commu_member" .
            " WHERE c_member_id=".quote4db($c_member_id);
	 return get_one4db($sql);
 }

/****************************************************
 * c_home 関連
 * 
 ****************************************************/

 /** 関数
  * k_p_c_home_c_commu4c_commu_id($c_commu_id)
  * コミュＩＤからc_commuを返す
  * 
  * [引数]
  * $c_commu_id
  * 
  * [戻り値]
  * c_commu.*
  * count_member
  * 
  */

 function k_p_c_home_c_commu4c_commu_id($c_commu_id)
 {
	 $c_commu = _db_c_commu4c_commu_id($c_commu_id);
	 
	 $c_commu['count_member'] = _db_count_c_commu_member_list4c_commu_id($c_commu_id);
     
	 return $c_commu;
 }
 
 
 /**　関数
  * k_p_c_home_relationship_between_member_commu($c_commu_id, $c_member_id)
  * メンバＩＤのメンバと、コミュニティＩＤのコミュニティの関係を返す
  * 
  * [引数]
  * $c_commu_id
  * $c_member_id
  * 
  * [戻り値]
  * bool join (参加or不参加)
  * bool wait (参加承認待ち)
  * 
  */
  
  function k_p_c_home_relationship_between_member_commu($c_commu_id, $c_member_id)
  {
	  $relation = array(
		'join' => false,
		'wait' => false);
	  
	  //参加承認待ちかどうかをチェック
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_commu_member_confirm ";
	  $sql .= "WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id);
	  
	  if(get_one4db($sql)){
		  //承認待ちなら
		  $relation['wait'] = true;
		  return $relation;
	  }
	  
	  //参加してるかどうかチェック
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_commu_member ";
	  $sql .= "WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id); 
	  
	  if(get_one4db($sql)){
		  //参加なら
		  $relation['join'] = true;
		  return $relation;
	  }
	  
	  //参加も要請もしてない
	  return $relation;	  
	  
  }


/** 関数
 * k_p_c_home_c_commu_member_list_random4c_commu_id($c_commu_id, $limit)
 * コミュニティのメンバリストをランダムに取得
 * 
 * [引数]
 * $c_member_id
 * $limit
 * 
 * [戻り値]
 * aray of array
 * 	c_member_id
 *  nickname
 *  count_friend
 */    
    
 function k_p_c_home_c_commu_member_list_random4c_commu_id($c_commu_id, $limit)
 {
	 $sql = "SELECT cm.c_member_id, cm.nickname ";
	 $sql .= "FROM c_member AS cm , c_commu_member AS ccm ";
	 $sql .= "WHERE ccm.c_commu_id=".quote4db($c_commu_id) .
            " AND ccm.c_member_id=cm.c_member_id ";
	 $sql .= "ORDER BY RAND() ";
	 $sql .= "LIMIT ". no_quote4db($limit);
	 
	 $c_commu_member_list = get_array_list4db($sql);
	 
	 foreach($c_commu_member_list as $key => $value){
		 $c_commu_member_list[$key]['count_friend'] = 
		 	k_p_common_count_friends4c_member_id($value['c_member_id']);
	 }
	 
	 return $c_commu_member_list;
 }

 
/**　関数
 * k_p_c_home_c_commu_topic_list_all4c_commu_id($c_commu_id)
 * コミュニティの掲示板を全て表示
 * 
 * [引数]
 * $c_commu_id
 * 
 * [戻り値]
 * c_commu_topic.*
 * 
 */
function k_p_c_home_c_commu_topic_list_all4c_commu_id($c_commu_id)
{
    $sql = "SELECT * FROM c_commu_topic WHERE c_commu_id=".quote4db($c_commu_id);
    $sql .= " ORDER BY c_commu_topic_id DESC";

    return get_array_list4db($sql);
}
  
  /** 関数
  * k_p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
  * 
  * コミュニティメール(ktai)受信設定を取得
  * 
  * [引数]
  * c_commu_id
  * c_member_id
  * 
  * [戻り値]
  * is_receive_mail
  */ 
  
  
  function k_p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
  {
	  $sql = "SELECT is_receive_mail ";
	  $sql .= " FROM c_commu_member ";
	  $sql .= " WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id);
	  
	  return get_one4db($sql);
  }

  /** 関数
  * p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
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
  
  function k_p_c_home_is_receive_mail_pc4c_commu_id4c_member_id($c_commu_id, $c_member_id)
  {
	  $sql = "SELECT is_receive_mail_pc ";
	  $sql .= " FROM c_commu_member ";
	  $sql .= " WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id);
	  
	  return get_one4db($sql);
  }
   
   
  
  
/**************************************************:
 * c_member_list 関連
 * 
 * 
 **************************************************/

 /** 関数
  * 
  * k_p_c_member_list_c_members_disp4c_commu_id($c_commu_id, $page_size, $page)
  * コミュニティメンバのリストをID新しいもの順に取得する。
  * 取得する範囲を指定できる。
  * 
  * [引数]
  * $c_commu_id
  * $page_size
  * $page
  * 
  * [戻り値]
  * (list)
  * c_member_id
  * nickname
  * friend_count
  * prev  「前へ」があるかどうか
  * next　「次へ」があるかどうか
  * 
  */

function k_p_c_member_list_c_members_disp4c_commu_id($c_commu_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    
	$sql = 'SELECT c_member.c_member_id, nickname '
        . ' FROM c_member, c_commu_member'
        . ' WHERE c_member.c_member_id = c_commu_member.c_member_id' .
                ' AND c_commu_member.c_commu_id = '. quote4db($c_commu_id)  
		. ' ORDER BY c_member.c_member_id DESC limit '. ($page-1) * $page_size . ', '. $page_size;
    $list = get_array_list4db($sql);
    
    foreach($list as $key => $value) {
        $list[$key]['friend_count'] = k_p_common_count_friends4c_member_id($value['c_member_id']);
    }
    
    
    $sql = "select count(*) from c_commu_member where c_commu_id = ".quote4db($c_commu_id);
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
    return array($list , $prev , $next);
} 


/**関数
 * k_p_c_member_list_c_commu_member_count4c_commu_id($c_commu_id)
 * コミュニティメンバ数を返す
 * 
 * [引数]
 * $c_commu_id
 * 
 * [戻り値]
 * int メンバ数
 * 
 * 
 */


function k_p_c_member_list_c_commu_member_count4c_commu_id($c_commu_id)
{
	$sql = 'SELECT count( * ) '
        . ' FROM c_commu_member'
        . ' WHERE c_commu_id ='. quote4db($c_commu_id); 
    
    return get_one4db($sql);
}



/******************************************************
 * c_bbs 関連
 * 
 *****************************************************/

 /** 関数
  * k_p_c_bbs_c_commu_topic_name4c_commu_topic_id($c_commu_topic_id)
  * トピック名を取得
  * 
  * [引数]
  * $c_commu_topic_id
  * 
  * [戻り値]
  * name
  * 
  */
 
function k_p_c_bbs_c_commu_topic_name4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT name FROM c_commu_topic" .
            " WHERE c_commu_topic_id=".quote4db($c_commu_topic_id);
	return get_one4db($sql);
}


/** 関数
 k_p_c_bbs_c_commu_topic_comment_list4c_c_commu_topic_id($target_c_commu_topic_id, $c_member_id, $page_size, $page)
 
トピックのコメントリストを取得
引数のメンバＩＤが書き込んだコメントに対しては、
is_c_commu_topic_comment_admin=1が返る。

[引数]
$target_c_commu_topic_id
$c_member_id
$page_size	１ページに表示する数
$page	ページ番号

[返り値]
number
c_member_id
nickname
r_datetime
c_commu_topic_comment_id 
body
is_c_commu_topic_comment_admin
*/

function k_p_c_bbs_c_commu_topic_comment_list4c_c_commu_topic_id($target_c_commu_topic_id, $c_member_id, $page_size, $page)
{
    $page = intval($page);
    $page_size = intval($page_size);    
    
    $sql = "SELECT c_commu_topic_comment.*, c_member.nickname" .
		" FROM c_commu_topic_comment" .
			" LEFT JOIN c_member USING (c_member_id)" .
		" WHERE c_commu_topic_id = ".quote4db($target_c_commu_topic_id) .
		" ORDER BY number DESC" .
        " LIMIT ".($page_size*($page-1)).",$page_size";
    $list = get_array_list4db($sql);
    
    $sql = "SELECT COUNT(*) FROM c_commu_topic_comment" .
		" WHERE c_commu_topic_id = ".quote4db($target_c_commu_topic_id);

	foreach($list as $key => $value){
		if($list[$key]['c_member_id'] == $c_member_id){
			$list[$key]['is_c_commu_topic_comment_admin'] = true;
		}
	}

    $total_num = get_one4db($sql) - 1;
    if ($total_num > 0) {
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
    return array($list , $prev , $next);
}
 
/** 関数
 * k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id)
 * トピックＩＤからコミュニティIDと名前を取得
 * 
 */

 function k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT cc.c_commu_id , cc.name FROM c_commu_topic AS cct, c_commu AS cc ";
	$sql .= " WHERE cct.c_commu_topic_id=".quote4db($c_commu_topic_id);
	$sql .= " AND cc.c_commu_id=cct.c_commu_id ";
	
	return get_array_one4db($sql);
}

/** 関数
 * k_p_c_bbs_is_admin4c_member_id_c_commu_topic_id($c_member_id, $c_commu_topic_id)
 * 指定したメンバがコミュニティ管理者かどうかを判定
 * 
 * [引数]
 * $c_member_id
 * $c_commu_topic_id
 * 
 * [戻り値]
 * bool
 */

function k_p_c_bbs_is_admin4c_member_id_c_commu_topic_id($c_member_id, $c_commu_topic_id)
{
	$c_commu = k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id);
	$c_commu_id = $c_commu['c_commu_id'];
	
	$sql = "SELECT c_member_id_admin";
	$sql .= " FROM c_commu";
	$sql .= " WHERE c_commu_id=".quote4db($c_commu_id);
	
	$c_commu_id_admin = get_one4db($sql);
	
	if($c_member_id == $c_commu_id_admin){
		return true;
	}
	return false;
}

 
 
 /** 関数
  * k_p_c_bbs_c_member_admin4c_commu_topic_id($c_commu_topic_id)
  * コミュニティの管理者(ID, nickname)を取得
  * 
  */

 function k_p_c_bbs_c_member_admin4c_commu_topic_id($c_commu_topic_id)
 {
	$c_commu = k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id);
	$c_commu_id = $c_commu['c_commu_id'];
	
	$sql = "SELECT c_member_id_admin , nickname";
	$sql .= " FROM c_commu, c_member";
	$sql .= " WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=c_member_id_admin";
	
	return get_array_one4db($sql);
	
 }
  
 

/*****************************************************
 * c_invite 関連
 * 
 *****************************************************/

 /** 関数
  * k_p_c_invite_c_friend_list_random4c_member_id4c_commu_id($c_member_id, $c_commu_id, $limit)
  * 
  * Myフレンドから指定コミュに参加していない人をランダムに選ぶ
  * 
  * [引数]
  * $c_member_id
  * $c_commu_id
  * $limit
  * 
  * [戻り値]
  * c_member_id (フレンドの)
  * nickname
  */
 
 function k_p_c_invite_c_friend_list_random4c_member_id4c_commu_id($c_member_id, $c_commu_id, $limit)
 {
	//友達リスト
	$sql = "select c_member_id_to from c_friend where c_member_id_from =".quote4db($c_member_id);
	$friend_list = get_one_list4db($sql);
	
	//参加者リスト
	$sql = "select c_member_id from c_commu_member where c_commu_id =".quote4db($c_commu_id);
	$member_list = get_one_list4db($sql);
	
	//友達リストから参加者リストを引く
	$result = array_diff($friend_list,$member_list);
	
	
	if($result==null) {
		return null;
	} else {
		$result = implode ( ",", $result);
		
		$sql = 'SELECT c_member_id, nickname'
	        . ' FROM c_member'
	        . ' WHERE c_member_id'
	        . ' IN ( '. no_quote4db($result). ') '
			. ' ORDER BY RAND()'
			. " LIMIT ". no_quote4db($limit);
	    
	    return get_array_list4db($sql);
	}
 }

/** 関数
 * k_p_c_bbs_c_member_admin4c_commu_topic_id($c_commu_topic_id)
 * 
 * 
 */
function k_p_h_message_ktai_url4url($str, $tail)
{
	$matches = array();
	$abs = preg_quote(ABSOLUTE_PATH, '/');

	$pat = '/(<a[[:blank:]]href=\\")?'.$abs.'page.php(\?p=c_home.+target_c_commu_id=\d+)(<\/a>)?$/';
	if (preg_match($pat, $str, $matches)) {
		if($matches[2]) $com_url = ABSOLUTE_PATH."ktai_page.php".$matches[2]."&$tail";
		$str = preg_replace($pat, "", $str);
	}

	$pat = '/'.$abs.'page.php(\?p=f_home.+target_c_member_id=\d+)$/';
	if (preg_match($pat, $str,$matches)) {
		if($matches[1]) $friend_url = ABSOLUTE_PATH."ktai_page.php".$matches[1]."&$tail";
		$str = preg_replace($pat, "", $str);
	}
	
	return array($str, $com_url, $friend_url);
}
 
function k_p_c_event_member_list4c_commu_topic_id($c_commu_topic_id, $page_size, $page){
	$sql = "select cm.* from c_member as cm , c_event_member as cem " .
			"where cm.c_member_id = cem.c_member_id " .
			"and cem.c_commu_topic_id = ".quotearray4db($c_commu_topic_id);
	if($page_size)$sql .= " LIMIT ".no_quote4db(($page-1)*$page_size.",".$page_size);
	
	$list[0] = get_array_list4db($sql);
	
	$total_c_event_membet=k_p_count_c_event_member_list4c_commu_topic_id($c_commu_topic_id);
	$start_num=($page-1)*$page_size+1;
	$end_num=($page)*$page_size;
	if($end_num>$total_c_event_membet)$end_num=$total_c_event_membet;
	$end_page=ceil($total_c_event_membet/$page_size);
	
	$list[1] = $start_num!=1;
	$list[2] = $end_num!=$total_c_event_membet;
	
	
	return $list;	
}

function k_p_count_c_event_member_list4c_commu_topic_id($c_commu_topic_id){
	$sql = "select count(*) from c_member as cm , c_event_member as cem " .
			"where cm.c_member_id = cem.c_member_id " .
			"and cem.c_commu_topic_id = ".quotearray4db($c_commu_topic_id);
			
	return get_one4db($sql);
}

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
function k_p_h_diary_list_friend_h_diary_list_friend4c_member_id($c_member_id, $page_size, $page)
{	
	$from = "c_diary, c_friend";
	$where = "c_friend.c_member_id_from=". quote4db($c_member_id) .
			" AND c_diary.c_member_id = c_friend.c_member_id_to";
	
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
function k_p_h_home_c_commu_topic_comment_list4c_member_id($c_member_id,$page_size,$page)
{
    $sql = "SELECT cc.c_commu_topic_id, c.name AS c_commu_name, ct.name AS c_commu_topic_name , cm.c_member_id, cc.number, max(cc.r_datetime) as r_datetime";
    $sql .= " FROM c_commu_member AS cm, c_commu_topic_comment AS cc";
    $sql .= ", c_commu AS c, c_commu_topic AS ct";
    $sql .= " WHERE cm.c_member_id=". quote4db($c_member_id);
    $sql .= " AND cc.c_commu_id=cm.c_commu_id";
    $sql .= " AND c.c_commu_id=cm.c_commu_id";
    $sql .= " AND ct.c_commu_id=cm.c_commu_id";
    $sql .= " AND ct.c_commu_topic_id=cc.c_commu_topic_id";
    $sql .= " group by c_commu_topic_id, c_commu_name, c_commu_topic_name ,c_member_id ";
    $sql .= " ORDER BY r_datetime DESC";
    $sql .= " LIMIT ". no_quote4db($page_size * ($page - 1)). ",". no_quote4db($page_size);
    $c_commu_topic_list = get_array_list4db($sql);

    foreach($c_commu_topic_list as $key => $value) {
        //最新の書き込み番号
        $sql = "SELECT MAX(number) FROM c_commu_topic_comment".
               " where c_commu_topic_id = " .no_quote4db($value['c_commu_topic_id']);

        $number = get_one4db($sql);

        $c_commu_topic_list[$key]['number'] = $number;
    }
    
    $sql = "SELECT count(*) ";
    $sql .= " FROM c_commu_member AS cm";
    $sql .= ", c_commu AS c, c_commu_topic AS ct";
    $sql .= " WHERE cm.c_member_id=". quote4db($c_member_id);
    $sql .= " AND c.c_commu_id=cm.c_commu_id";
    $sql .= " AND ct.c_commu_id=cm.c_commu_id";
    
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
    
    return array($c_commu_topic_list , $prev , $next, $total_num);
}
?>