<?php



/**
 * ����
 */

 /*��å����������ɤ����å�����������*/
function k_p_common_msg4msg_id($msg_id)
{
	if($msg_id == null){
		return null;
	}
	
	$msg = 
	array(
        0   => "������˼��Ԥ��ޤ���",
        1   => "��ʸ�����Ϥ��Ʋ�����",
        2   => "�����ȥ�����Ϥ��Ʋ�����",
        3   => "��ǧ����λ���ޤ���",
        4   => "��ǧ����������ޤ���",
        5   => "���Υե��ɤϡ����ߥ�󥯾�ǧ�Ԥ��Ǥ�",
        6   => "���Υե��ɤϡ����Ǥ˥�󥯺ѤߤǤ�",
        7   => "������".WORD_MY_FRIEND_HALF."�����򤷤Ƥ�����",
        8   => "��å����������Ϥ��Ƥ�������",
        9   => "���Υ桼���ϴ�����Ͽ�ѤߤǤ�",
        10  => "�����ԤʤΤ����Ǥ��ޤ���",
        11  => "���Υ��ߥ�˥ƥ��Υ��ФǤϤ���ޤ���",
        12  => "�᡼�륢�ɥ쥹�����Ϥ��Ƥ�������",
        13  => "���ӥ��ɥ쥹�ˤ������Ǥ��ޤ���",
        14  => "���󤿤�ێ��ގ��ݤ˼��Ԥ��ޤ������̾�ێ��ގ��ݸ塢���ꤷ�Ƥ�������",
        15  => "�����󤷤Ƥ�������",
        16  => "���ӥ��ɥ쥹�ʳ��ϻ���Ǥ��ޤ���",
        17  => "���Υ��ɥ쥹�Ϥ��Ǥ���Ͽ����Ƥ��ޤ�",
        18  => "�ѥ���ɤ��㤤�ޤ�",
        19  => "���ӥ᡼�륢�ɥ쥹����Ͽ���ޤ���",
        20  => "�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ�������",
        21  => "�ѥ���ɤ��ѹ����ޤ���",
        22  => "��������򤷤Ƥ�������",
        23  => "���������Ϥ��Ƥ�������",
        24  => "��̩�μ��䡦�������ѹ����ޤ���",
        25  => "�ѥ���ɺ�ȯ�ԤǤ��ޤ���Ǥ���",
        26  => "�������ѥ���ɤ�᡼����������ޤ���",
        27  => "���Ӥθ��μ����ֹ������Ǥ��ޤ���Ǥ���",
        28  => "���󤿤�����������λ���ޤ���",
        29  => "���󤿤����������������ޤ���",
        30  => "���ԥ᡼����������ޤ���",
        31  => "�᡼�륢�ɥ쥹�����������Ϥ��Ƥ�������",
    );
	
	return $msg[$msg_id];
}



/***
 * ����
 */

 /*�˥å��͡���ȥ��УɣĤ������֤��ؿ�
 �褯�Ȥ������ʤΤǶ��̲����ޤ�
 */
 function k_p_common_c_member4c_member_id($c_member_id)
 {
	 $sql = "SELECT c_member_id, nickname FROM c_member WHERE c_member_id=".quote4db($c_member_id);
	 return get_array_one4db($sql);
 }
 
 /*���ߥ�˥ƥ�̾��com�ɣĤ������֤��ؿ�
 */
 
 function k_p_common_c_commu4c_commu_id($c_commu_id)
 {
	 $sql = "SELECT c_commu_id, name FROM c_commu WHERE c_commu_id=".quote4db($c_commu_id);
	 return get_array_one4db($sql);
 }
 
 /*���ߥ�˥ƥ��Υ��п����֤�*/
 function k_p_common_count_c_commu_member_list4c_commu_id($c_commu_id) {
    $sql = "SELECT count(*) FROM c_commu_member WHERE c_commu_id=".quote4db($c_commu_id);
    $list = get_one_list4db($sql);
    return $list[0];
}


/*���Ф�ͧã�����֤�*/
function k_p_common_count_friends4c_member_id($c_member_id) {
    $sql = "SELECT count(*) FROM c_friend WHERE c_member_id_from=".quote4db($c_member_id);
    $list = get_one_list4db($sql);
    return $list[0];
}


/*fh�Υ����פ��֤�*/
/**
fh�ڡ����Υ����פ����
[����]
$target_c_member_id	�оݤΥ���ID
$u					��ʬ�Υ���ID

[�֤���]
f or h
*/
function k_p_fh_common_get_type($target_c_member_id,$u){
	// �ʥӥ�������󥿥��� : "h" | "f" | "c" 
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


/*��������������Ͽ*/

function k_p_common_do_access($c_member_id){
	$sql =	"UPDATE c_member SET access_date=NOW() ".
			"WHERE c_member_id=".quote4db($c_member_id);
	return _mysql_query4db($sql);
}


/*��������*/
function k_p_etc_do_ashiato($c_member_id_to, $c_member_id_from){
	return p_etc_do_ashiato($c_member_id_to, $c_member_id_from);
}



/*************************************************
 * 
 * h_home ��Ϣ
 *
 *************************************************/

 /** �ؿ�
  * k_p_h_home_c_member4c_member_id($c_member_id)
  * ���УɣĤ�����о�������
  * 
  * [����]
  * c_member_id
  * 
  * [�����]
  * c_member_id
  * nickname
  * pc_address���ѹ�by���2005/03/25
  *
  * (�����å��ϣ�)
  */
 
 function k_p_h_home_c_member4c_member_id($c_member_id)
 {
 	 $sql = "SELECT c_member_id, nickname, pc_address FROM c_member WHERE c_member_id=".quote4db($c_member_id);
	 return get_array_one4db($sql);
	 //return k_p_common_c_member4c_member_id($c_member_id);
 }
 
  
 
/**���ؿ�(2005/2/8:hosoba)
 * k_p_h_home_c_message_received_unread_all_count4c_member_id($c_member_id)
 * 
 * ̤�ɥ�å��������ʥ��С�����Ȥ�ξ���ˤ����
 * 
 * [����]
 * int $c_member_id
 * 
 * [�����]
 * ̤�ɥ�å��������ʥ��С�����Ȥ�ξ����
 * 
 * 
 * �ʥ����å����ޤ�����
 */

function k_p_h_home_c_message_received_unread_all_count4c_member_id($c_member_id)
{
    $sql = "SELECT COUNT(*) FROM c_message" .
            " WHERE c_member_id_to=".quote4db($c_member_id) .
            " AND is_read=0 AND is_send=1";
    return get_one4db($sql);
}



/** �ؿ�(2005/2/8:hosoba)
 * k_p_h_home_c_diary_friend_list4c_member_id($c_member_id, $limit)
 * 
�ե��ɺǿ������ꥹ�ȼ���

[����]
$c_member_id
$limit

[�֤���]
r_datetime
nickname
c_diary_id
subject
image_filename
comment_count


�ʥ����å����ޤ�����
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
	
	
	//�����ȿ������
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


/**���ؿ�(2005/2/8:hosoba)
 * k_p_h_home_c_friend_list_random4c_member_id($c_member_id, $limit)
 * 
 * My�Υե��ɤΥ�����ʥꥹ�Ȥ�����
 *
 * [����]
 * $c_member_id
 * $limit
 * 
 * [�����]
 * array of array:
 * 	c_friend.*
 *  c_member.nickname
 * count_friend
 * 
 * 
 * �ʥ����å����ޤ�����
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
 * h_message_box ��Ϣ
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
 * h_message ��Ϣ
 * 
 */

 /** �ؿ�
  * k_p_h_message_c_message4c_message_id($c_message_id)
  * ��å������ɣĤ����å������ȥ˥å��͡�������
  * 
  * [����]
  * $c_message_id
  * 
  * [�����]
  * c_message.*
  * c_member_nickname_from,	: �����ԥ˥å��͡���
  * c_member_nickname_to	: �����ԥ˥å��͡���
  * 
  */
function k_p_h_message_c_message4c_message_id($c_message_id)
{
	return _db_c_message4c_message_id($c_message_id);
}



/*********************************************************
 * 
 * h_message_send ��Ϣ
 * 
 *********************************************************/

 
 /** �ؿ�
  * k_p_h_message_send_c_friend_list_random4c_member_id
  * 
  * ͧã�����ࣵ����
  *  k_p_c_invite_c_friend_list_random4c_member_id ��Ʊ��
  *  
  *  [����]
  *  $c_member_id
  *  
  *  [�����]
  * c_member_id (ͧã��)
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
 * h_diary_edit ��Ϣ
 * 
 ******************************************************/

function k_p_h_diary_edit_c_diary4c_diary_id($c_diary_id)
{
    return k_p_fh_diary_c_diary4c_diary_id($c_diary_id);
}
 
 /*********************************************************
  * h_com_category ��Ϣ
  * 
  ********************************************************/
 
 /** �ؿ�
  * k_p_h_com_category_c_commu_category_name4c_commu_category_id($c_commu_category_id)
  * ���ߥ�˥ƥ��ξ����ƥ���ɣĤ��龮���ƥ���̾������
  * 
  * [����]
  * $c_commu_category_id
  * 
  * [�����]
  * name
  * 
  */ 
 
  function k_p_h_com_category_c_commu_category_name4c_commu_category_id($c_commu_category_id)
  {
	  $sql = "SELECT name FROM c_commu_category" .
            " WHERE c_commu_category_id=".quote4db($c_commu_category_id);
	  return get_one4db($sql);
  }
  
  
 /** �ؿ�
 k_p_h_com_category_c_commu_list4c_commu_category_id($c_commu_category_id, $page_size, $page)
 ���ߥ�˥ƥ��ξ����ƥ��꤫�顢���ߥ�˥ƥ��ꥹ�Ȥ�����
 �����ϰϤ����Ǥ���
 ID����������ν�

[����]
$c_commu_category_id
$page_size	���ڡ�����ɽ�������
$page	�ڡ����ֹ�

[�֤���]
c_commu_id
name
count_members
prev �����ءפ����뤫�ɤ���
next �ּ��ءפ����뤫�ɤ���


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

	//�ƥ��ߥ�οͿ������
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


/** �ؿ�
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
 * h_com_find_all ��Ϣ
 * 
 ********************************************************/
 
 /** �ؿ�
  * k_p_h_com_find_all_c_commu_list_lastupdated($limit)
  * �����Ի��äˤ�����餺���ǿ��񤭹��ߤΤ��ä����ߥ�˥ƥ��ꥹ�Ȥ����
  * 
  * [����]
  * $limit
  * 
  * [�����]
  * c_commu_id
  * name
  * 
  * (�����å��ϣ�)
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
 
 
 /**���ؿ�
  * k_p_h_com_find_all_c_commu_category_parent_list()
  * ���Ƥ��楫�ƥ���Υꥹ�Ȥ��������
  * 
  * [����]
  * �ʤ�
  * 
  * [�����]
  * c_commu_category_parent.*
  * 
  * �ʥ����å��ϣˡ�
  */

function k_p_h_com_find_all_c_commu_category_parent_list()
{
	$sql = "SELECT * FROM c_commu_category_parent WHERE 1 ORDER BY sort_order";
	
	return get_array_list4db($sql);
}



/******************************************************
 * h_com_find_result ��Ϣ
 * 
 *****************************************************/

 /**���ؿ�
  * k_p_h_com_find_result_search_c_commu4c_commu_category_parent_id($search_word, $c_commu_category_parent_id, $page, $page_size)
  * �楫�ƥ���ɣ���ǡ�search_word�˴�Ť����ߥ�˥ƥ�������Ԥ���
  * 
  * [����]
  * $search_word
  * $c_commu_category_parent_id (�����ƥ���ξ���"all")
  * $page_size
  * $page
  * 
  * [�����]
  * list
  * [0](array of array)
  * 	 c_commu_id
  * 	 name
  * 	 count_commu_member 
  * [1]count_result (������̤������)
  * [2]prev �����ءפ����뤫�ɤ���
  * [3]next �ּ��ءפ����뤫�ɤ���
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
  * f_friend_find ��Ϣ
  * 
  ******************************************************/
 
  /** �ؿ�
   * k_p_h_friend_find($nickname,$page_size,$page)
   * �ե��ɸ���
   * ID����������
   * �����ϰϤ����Ǥ���
   *
   * [����]
   * $nickname
   * $page_size
   * $page
   * 
   * [�����]
   * list
   * [0]array of array
   * 	c_member_id
   * 	nickname
   * 	count_friend
   * [1]count_result (������̤������)
   * [2]prev �����ءפ����뤫�ɤ���
   * [3]next �ּ��ءפ����뤫�ɤ���
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
 * h_com_category_parents ��Ϣ
 * 
 *********************************************************/

 /**���ؿ�
  * k_p_h_com_category_parents_c_commu_category_list4c_commu_category_parent_id($c_commu_category_parent_id)
  * �楫�ƥ����°���뾮���ƥ���Υꥹ�Ȥ�������롣
  * 
  * [����]
  * $c_commu_category_parent_id
  * 
  * [�����]
  * c_commu_category.*
  * 
  */
 
 function k_p_h_com_category_parents_c_commu_category_list4c_commu_category_parent_id($c_commu_category_parent_id)
 {
	 $sql = "SELECT * FROM c_commu_category" .
            " WHERE c_commu_category_parent_id=".quote4db($c_commu_category_parent_id);
	 
	 return get_array_list4db($sql);
 }
 
 
 /** �ؿ�
  * k_p_h_com_category_parents_c_commu_category_parent_name4c_commu_category_id($c_commu_category_parent_id)
  * �����ƥ���ɣĤ����楫�ƥ����̾����������롣
  *
  * [����]
  * $c_commu_category_id
  * 
  * [�����]
  * name
  * 
  * �ʥ����å��ϣˡ�
  */
 
function k_p_h_com_category_parents_c_commu_category_parent_name4c_commu_category_parent_id($c_commu_category_parent_id)
{
	$sql = "SELECT name FROM c_commu_category_parent ";
	$sql.= " WHERE c_commu_category_parent_id=".quote4db($c_commu_category_parent_id);
	
	return get_one4db($sql);
}
 


/**********************************************************
 * h_confirm_list ��Ϣ
 * 
 ***********************************************************/

/** �ؿ�
 * k_p_h_confirm_list_anatani_c_friend_confirm_list4c_member_id($c_member_id_to)
 * ���ʤ��˥ե��ɥ�󥯤��������Ƥ�����С�(��󥯾�ǧ�Ԥ�)
 * 
 * @param	int $c_member_id_to	: ��������Ƥ�����(���ʤ�)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: �������Ƥ���ͤ�̾��
 * 				message_disp    : ɽ���ѥ�å�����
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


/**���ؿ�
 * k_p_h_confirm_list_anataga_c_friend_confirm_list4c_member_id($c_member_id_from)
 * ���ʤ����ե��ɥ�󥯤��������Ƥ�����С�(���������)
 * 
 * @param	int $c_member_id_from	: �������Ƥ�����(���ʤ�)
 * @return	array_of_array
 * 				c_friend_cofirm.*
 * 				nickname		: ��������Ƥ���ͤ�̾��
 * 				message_disp	: ɽ���ѥ�å�����
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


/** �ؿ�
 * k_p_h_confirm_list_anatani_c_commu_member_confirm_list4c_member_id($c_member_id)
 * ���ʤ���(��)�������ߥ�˥ƥ��˻��ä��˾���Ƥ�����С�(���þ�ǧ�Ԥ�)
 * 
 * @param	int $c_member_id	: ��������Ƥ�����(���ʤ��������)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*
 * 				c_commu_name	: ���ߥ�˥ƥ���̾��
 * 				nickname		: �������Ƥ���ͤ�̾��
 * 				message_disp    : ɽ���ѥ�å�����
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


/** �ؿ�
 * k_p_h_confirm_list_anataga_c_commu_member_confirm_list4c_member_id($c_member_id)
 * ���ʤ������ߥ�˥ƥ������������Ƥ��륳�ߥ�˥ƥ�(����������)
 * 
 * @param	int $c_member_id	: �������Ƥ�����(���ʤ�)
 * @return	array_of_array
 * 				c_commu_member_cofirm.*,
 * 				c_commu_name		: ���ߥ�˥ƥ���̾��
 * 				c_member_id_admin	: �����ԤΥ��С�ID
 * 				nickname			: �����Ԥ�̾��
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
 * f_home ��Ϣ
 * 
 *******************************************************/

/** �ؿ�
 * k_p_f_home_c_diary_list4c_member_id($target_c_member_id, $limit)
 * �������åȥ��Фκǿ������Υꥹ�Ȥ��֤�
 * 
 * [����]
 * $target_c_member_id
 * $limit
 * 
 * [�����]
 * c_diary_id
 * r_date
 * subject
 * count_comment
 * 
 * (�����å��ϣ�)
 */

function k_p_f_home_c_diary_list4c_member_id($target_c_member_id, $limit)
{
	//�����ꥹ��
	$sql = "SELECT c_diary_id, r_date, subject ,image_filename_1 ";
	$sql .= "FROM c_diary ";
	$sql .= "WHERE c_member_id=".quote4db($target_c_member_id);
	$sql .= " ORDER BY r_date DESC ";
	$sql.= "LIMIT ". no_quote4db($limit);
	
	$c_diary_list = get_array_list4db($sql);
	
	//�����ȿ�
	foreach($c_diary_list as $key => $value){
		$c_diary_id = $value['c_diary_id'];
		
		$sql = "SELECT COUNT(*) ";
		$sql .= "FROM c_diary_comment ";
		$sql .= "WHERE c_diary_id=".quote4db($c_diary_id);
		$c_diary_list[$key]['count_comment'] = get_one4db($sql);
	}
	
	return $c_diary_list;
}


/** �ؿ�
 * k_p_f_home_c_friend_list_random4c_member_id($target_c_member_id, $limit)
 * �������åȥ��ФΥե��ɤΥ�����ʥꥹ�Ȥ��֤�
 * 
 * [����]
 * $target_c_member_id
 * $limit
 * 
 * [�����]
 * c_friend.*
 * nickname
 * count_friend
 * 
 */
function k_p_f_home_c_friend_list_random4c_member_id($target_c_member_id, $limit)
{
	return k_p_h_home_c_friend_list_random4c_member_id($target_c_member_id, $limit);
}

 
/**���ؿ�
 * k_p_f_home_c_commu_list_lastupdated4c_member_id($target_c_member_id, $limit)
 * ���å��ߥ�˥ƥ��ꥹ�Ⱥǿ��񤭹��߽�
 * �����������
 * 
 * k_p_h_home_c_commu_list_lastupdate4c_member_id($c_member_id, $limit)
 * ��Ʊ���Ǥ���
 * 
 */

 function k_p_f_home_c_commu_list_lastupdated4c_member_id($target_c_member_id, $limit)
 {
	 return k_p_h_home_c_commu_list_lastupdate4c_member_id($target_c_member_id, $limit);
 }
 
 
 /**���ؿ�
  * k_p_f_home_relationship4two_members($c_member_id, $target_c_member_id)
  * ���ĤΥ��УɣĤ��餽�Σ��ͤδط����֤���
  * 
  * [����]
  * $c_member_id
  * $target_c_member_id
  * 
  * [�����]
  * bool friend (�ե��ɤ��ɤ���)
  * bool wait (��󥯾�ǧ�Ԥ�)
  * 
  */
 
  function k_p_f_home_relationship4two_members($c_member_id, $target_c_member_id)
  {
	  $relation = array(
		'friend' => false,
		'wait' => false);
	  
	  //��󥯾�ǧ�Ԥ����ɤ���������å�
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_friend_confirm ";
	  $sql .= "WHERE c_member_id_from=". quote4db($c_member_id) .
            " AND c_member_id_to=". quote4db($target_c_member_id);
	  
	  if(get_one4db($sql)){
		  //��󥯾�ǧ�Ԥ��ʤ�
		  $relation['wait'] = true;
		  return $relation;
	  }
	  
	  //ͧã���ɤ��������å�
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_friend ";
	  $sql .= "WHERE c_member_id_from=". quote4db($c_member_id) .
            " AND c_member_id_to=". quote4db($target_c_member_id); 
	  
	  if(get_one4db($sql)){
		  //ͧã�ʤ�
		  $relation['friend'] = true;
		  return $relation;
	  }
	  
	  //¾��
	  return $relation;
	  
  }
 
  
  
  
/***********************************************************
 * f_message_send ��Ϣ
 * 
 *********************************************************/

 /**���ؿ�
  * k_p_f_message_send_c_member4c_member_id($target_c_member_id)
  * ���Фξ���(ID,�˥å��͡���)�����
  * 
  * k_p_f_message_send_c_member4c_member_id($c_member_id)��Ʊ��
  * 
  * [����]
  * $c_memnber_id
  * 
  * [�����]
  * c_member_id
  * nickname
  * 
  * (�����å��ϣ�)
  */

  function k_p_f_message_send_c_member4c_member_id($target_c_member_id)
  {
	return k_p_common_c_member4c_member_id($target_c_member_id);
  }
 
  
  
 /****************************************************:
  * f_link_request, f_link_request_err ��Ϣ
  * 
  */
 
  /**���ؿ�
   * k_f_link_request_c_member4c_member_id($c_member_id)
   * 
   * k_p_h_home_c_member4c_member_id($c_member_id)����Ʊ����
   * ID�ȥ˥å��͡��ब�֤����
   */
  
  function k_f_link_request_c_member4c_member_id($c_member_id)
  {
	  return k_p_common_c_member4c_member_id($c_member_id);
  } 
  
  
  
/************************************************************
 * 
 * fh_friend_list ��Ϣ
 * 
 ************************************************************/

 /** �ؿ�
  * k_p_fh_friend_list_friend_list4c_member_id($c_member_id,$page_size,$page)
  * 
  * [����]
  * $c_member_id
  * $page_size
  * $page
  * 
  * [�����]
  * image_filename
  * c_member_id
  * nickname
  * access_date
  * c_member_id
  * 
  * (�����å��ϣ�)
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


/** �ؿ�
 * k_p_fh_friend_list_c_member4c_member_id($c_member_id)
 * ���Фξ����ID, �˥å��͡���ˤ����
 * 
 * [����]
 * $c_member_id
 * 
 * [�����]
 * c_member_id
 * nickname
 * 
 * (�����å��ϣ�)
 */

function k_p_fh_friend_list_c_member4c_member_id($c_member_id)
{
	return k_p_common_c_member4c_member_id($c_member_id);
}



/*********************************************************
 * fh_diary_list ��Ϣ
 * 
 *******************************************************/

 /** �ؿ�
  * k_p_fh_diary_list_c_diary_list4c_member_id($c_member_id, $page_size, $page)
  * �ǿ������ꥹ�Ȥ������
  * �����ϰϤ����Ǥ��롣
  * 
  * [����]
  * $c_member_did
  * $page_size
  * $page
  * 
  * [�����]
  * (list)
  * [0]array
  * 	c_diary_id
  * 	r_date
  * 	subject
  *		image_filename
  * 	nickname
  * 	count_comment
  * [1]prev �����ءפ����뤫�ɤ���
  * [2]next �ּ��ءפ����뤫�ɤ���
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
 

 /** �ؿ� 
  * k_p_fh_diary_list_c_member4c_member_id($c_member_id)
  * �ɣĤȥ˥å��͡�����֤�
  */ 
 
  function k_p_fh_diary_list_c_member4c_member_id($c_member_id)
  {
	  return k_p_common_c_member4c_member_id($c_member_id);
  }
  
  
 
/***************************************************
 * fh_diary ��Ϣ
 * 
 **************************************************/   
  
 /** �ؿ�
  * k_p_fh_diary_c_diary4c_diary_id($c_diary_id)
  * c_diary_id����c_diary������
  * 
  * [����]
  * $c_diary_id
  * 
  * [�����]
  * c_diary.*
  * 
  */
 
  function k_p_fh_diary_c_diary4c_diary_id($c_diary_id)
  {
	  $sql = "SELECT * FROM c_diary WHERE c_diary_id=".quote4db($c_diary_id);
	  $tmp = get_array_one4db($sql);
      return $tmp;
  }
 
  
  /** �ؿ�
   * k_p_fh_diary_c_diary_comment4c_diary_id($c_diary_id)
   * �����ؤΥ����ȥꥹ�Ȥ����
   * 
   * 
   * [����]
   * $c_diary_id
   * 
   * [�����]
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
  
  
  /** �ؿ�
   * k_p_fh_diary_c_member4c_diary_id($c_diary_id)
   * �����ɣĤ��餽��������񤤤����УɣĤȥ˥å��͡��������
   * 
   * [����]
   * $c_diary_id
   * 
   * [�����]
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
  
   
 /** �ؿ�
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
 * fh_com_list ��Ϣ
 * 
 ***************************************************/

 /** �ؿ�
  *  k_p_fh_com_list_c_commu_list4c_member_id($c_member_id, $page_size, $page)
  *  
  *  ���硦��������ǻ��å��ߥ�˥ƥ��ꥹ�Ȥ����
  *  �ϰϤ����Ǥ���
  *  �ɣĤ���������ν�
  *  
  *  [����]
  *  $page �ڡ���
  *  $page_size�����ڡ�����ɽ��������
  *  
  *  [�����]
  *  c_commu
  *  	name
  *  	c_commu_id
  *  	count_members
  *  prev �ּ��ءפ����뤫�ɤ���
  *  next�������ء�
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


/** �ؿ�
 * k_p_fh_com_list_c_member4c_member_id($c_member_id)
 * k_p_h_home_c_member4c_member_id($c_member_id)��Ʊ��
 */

function k_p_fh_com_list_c_member4c_member_id($c_member_id)
{
	return k_p_common_c_member4c_member_id($c_member_id);
}


/** �ؿ�
 * 
 */

/*Excel�ꥹ�Ȥ˲ä��롪*/
 
 function k_p_fh_com_list_c_commu_list_count4c_member_id($c_member_id)
 {
	 $sql = "SELECT COUNT(*) FROM c_commu_member" .
            " WHERE c_member_id=".quote4db($c_member_id);
	 return get_one4db($sql);
 }

/****************************************************
 * c_home ��Ϣ
 * 
 ****************************************************/

 /** �ؿ�
  * k_p_c_home_c_commu4c_commu_id($c_commu_id)
  * ���ߥ�ɣĤ���c_commu���֤�
  * 
  * [����]
  * $c_commu_id
  * 
  * [�����]
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
 
 
 /**���ؿ�
  * k_p_c_home_relationship_between_member_commu($c_commu_id, $c_member_id)
  * ���УɣĤΥ��Фȡ����ߥ�˥ƥ��ɣĤΥ��ߥ�˥ƥ��δط����֤�
  * 
  * [����]
  * $c_commu_id
  * $c_member_id
  * 
  * [�����]
  * bool join (����or�Ի���)
  * bool wait (���þ�ǧ�Ԥ�)
  * 
  */
  
  function k_p_c_home_relationship_between_member_commu($c_commu_id, $c_member_id)
  {
	  $relation = array(
		'join' => false,
		'wait' => false);
	  
	  //���þ�ǧ�Ԥ����ɤ���������å�
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_commu_member_confirm ";
	  $sql .= "WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id);
	  
	  if(get_one4db($sql)){
		  //��ǧ�Ԥ��ʤ�
		  $relation['wait'] = true;
		  return $relation;
	  }
	  
	  //���ä��Ƥ뤫�ɤ��������å�
	  $sql = "SELECT COUNT(*) ";
	  $sql .= "FROM c_commu_member ";
	  $sql .= "WHERE c_commu_id=".quote4db($c_commu_id) .
            " AND c_member_id=".quote4db($c_member_id); 
	  
	  if(get_one4db($sql)){
		  //���äʤ�
		  $relation['join'] = true;
		  return $relation;
	  }
	  
	  //���ä������⤷�Ƥʤ�
	  return $relation;	  
	  
  }


/** �ؿ�
 * k_p_c_home_c_commu_member_list_random4c_commu_id($c_commu_id, $limit)
 * ���ߥ�˥ƥ��Υ��Хꥹ�Ȥ������˼���
 * 
 * [����]
 * $c_member_id
 * $limit
 * 
 * [�����]
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

 
/**���ؿ�
 * k_p_c_home_c_commu_topic_list_all4c_commu_id($c_commu_id)
 * ���ߥ�˥ƥ��ηǼ��Ĥ�����ɽ��
 * 
 * [����]
 * $c_commu_id
 * 
 * [�����]
 * c_commu_topic.*
 * 
 */
function k_p_c_home_c_commu_topic_list_all4c_commu_id($c_commu_id)
{
    $sql = "SELECT * FROM c_commu_topic WHERE c_commu_id=".quote4db($c_commu_id);
    $sql .= " ORDER BY c_commu_topic_id DESC";

    return get_array_list4db($sql);
}
  
  /** �ؿ�
  * k_p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
  * 
  * ���ߥ�˥ƥ��᡼��(ktai)������������
  * 
  * [����]
  * c_commu_id
  * c_member_id
  * 
  * [�����]
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

  /** �ؿ�
  * p_c_home_is_receive_mail4c_commu_id4c_member_id($c_commu_id, $c_member_id)
  * 
  * ���ߥ�˥ƥ��᡼��(PC)������������
  * 
  * [����]
  * c_commu_id
  * c_member_id
  * 
  * [�����]
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
 * c_member_list ��Ϣ
 * 
 * 
 **************************************************/

 /** �ؿ�
  * 
  * k_p_c_member_list_c_members_disp4c_commu_id($c_commu_id, $page_size, $page)
  * ���ߥ�˥ƥ����ФΥꥹ�Ȥ�ID��������ν�˼������롣
  * ���������ϰϤ����Ǥ��롣
  * 
  * [����]
  * $c_commu_id
  * $page_size
  * $page
  * 
  * [�����]
  * (list)
  * c_member_id
  * nickname
  * friend_count
  * prev  �����ءפ����뤫�ɤ���
  * next���ּ��ءפ����뤫�ɤ���
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


/**�ؿ�
 * k_p_c_member_list_c_commu_member_count4c_commu_id($c_commu_id)
 * ���ߥ�˥ƥ����п����֤�
 * 
 * [����]
 * $c_commu_id
 * 
 * [�����]
 * int ���п�
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
 * c_bbs ��Ϣ
 * 
 *****************************************************/

 /** �ؿ�
  * k_p_c_bbs_c_commu_topic_name4c_commu_topic_id($c_commu_topic_id)
  * �ȥԥå�̾�����
  * 
  * [����]
  * $c_commu_topic_id
  * 
  * [�����]
  * name
  * 
  */
 
function k_p_c_bbs_c_commu_topic_name4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT name FROM c_commu_topic" .
            " WHERE c_commu_topic_id=".quote4db($c_commu_topic_id);
	return get_one4db($sql);
}


/** �ؿ�
 k_p_c_bbs_c_commu_topic_comment_list4c_c_commu_topic_id($target_c_commu_topic_id, $c_member_id, $page_size, $page)
 
�ȥԥå��Υ����ȥꥹ�Ȥ����
�����Υ��УɣĤ��񤭹���������Ȥ��Ф��Ƥϡ�
is_c_commu_topic_comment_admin=1���֤롣

[����]
$target_c_commu_topic_id
$c_member_id
$page_size	���ڡ�����ɽ�������
$page	�ڡ����ֹ�

[�֤���]
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
 
/** �ؿ�
 * k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id)
 * �ȥԥå��ɣĤ��饳�ߥ�˥ƥ�ID��̾�������
 * 
 */

 function k_p_c_bbs_c_commu4c_commu_topic_id($c_commu_topic_id)
{
	$sql = "SELECT cc.c_commu_id , cc.name FROM c_commu_topic AS cct, c_commu AS cc ";
	$sql .= " WHERE cct.c_commu_topic_id=".quote4db($c_commu_topic_id);
	$sql .= " AND cc.c_commu_id=cct.c_commu_id ";
	
	return get_array_one4db($sql);
}

/** �ؿ�
 * k_p_c_bbs_is_admin4c_member_id_c_commu_topic_id($c_member_id, $c_commu_topic_id)
 * ���ꤷ�����Ф����ߥ�˥ƥ������Ԥ��ɤ�����Ƚ��
 * 
 * [����]
 * $c_member_id
 * $c_commu_topic_id
 * 
 * [�����]
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

 
 
 /** �ؿ�
  * k_p_c_bbs_c_member_admin4c_commu_topic_id($c_commu_topic_id)
  * ���ߥ�˥ƥ��δ�����(ID, nickname)�����
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
 * c_invite ��Ϣ
 * 
 *****************************************************/

 /** �ؿ�
  * k_p_c_invite_c_friend_list_random4c_member_id4c_commu_id($c_member_id, $c_commu_id, $limit)
  * 
  * My�ե��ɤ�����ꥳ�ߥ�˻��ä��Ƥ��ʤ��ͤ�����������
  * 
  * [����]
  * $c_member_id
  * $c_commu_id
  * $limit
  * 
  * [�����]
  * c_member_id (�ե��ɤ�)
  * nickname
  */
 
 function k_p_c_invite_c_friend_list_random4c_member_id4c_commu_id($c_member_id, $c_commu_id, $limit)
 {
	//ͧã�ꥹ��
	$sql = "select c_member_id_to from c_friend where c_member_id_from =".quote4db($c_member_id);
	$friend_list = get_one_list4db($sql);
	
	//���üԥꥹ��
	$sql = "select c_member_id from c_commu_member where c_commu_id =".quote4db($c_commu_id);
	$member_list = get_one_list4db($sql);
	
	//ͧã�ꥹ�Ȥ��黲�üԥꥹ�Ȥ����
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

/** �ؿ�
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
�ե��ɤκǿ������ꥹ��

[����]
c_member_id
$page_size
$page

[�֤���]
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
���å��ߥ�˥ƥ�����񤭹��ߥꥹ�ȼ���

[����]
$c_member_id
$limit

[�֤���]
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
        //�ǿ��ν񤭹����ֹ�
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