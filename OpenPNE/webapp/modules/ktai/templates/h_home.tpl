({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">({$c_member.nickname})����ΎΎ���</font></center>
<hr>
({if $c_siteadmin})
({$c_siteadmin|smarty:nodefaults})
<hr>
({/if})

({if $num_f_confirm_list})
<a href="ktai_page.php?p=h_confirm_list&amp;({$tail})"><font color="red">����ǧ�Ԥ��ΎҎݎʎގ�({$num_f_confirm_list})̾</font></a><br>
({/if})

({if $num_message_not_is_read})
<a href="ktai_page.php?p=h_message_box&amp;({$tail})"><font color="red">������Ҏ���������({$num_message_not_is_read})��</font></a></font><br>
({/if})

({if $num_diary_not_is_read})
<a href="ktai_page.php?p=fh_diary&target_c_diary_id=({$first_diary_read})&amp;({$tail})"><font color="red">��({$num_diary_not_is_read})�������˿��厺�Ҏݎ�</font></a><br>
({/if})

({if $num_h_confirm_list })
<a href="ktai_page.php?p=h_confirm_list&amp;({$tail})"><font color="red">�����Ў��ƎÎ����þ�ǧ�Ԥ�({$num_h_confirm_list})̾</font></a><br>
({/if})

({if $anatani_c_commu_admin_confirm_list})
<a href="ktai_page.php?p=h_confirm_list&amp;({$tail})"><font color="red">�����Ў��ƎÎ������͸������({$num_anatani_c_commu_admin_confirm_list})��</font></a><br>
({/if})

({if $anatani_c_commu_admin_confirm_list||$num_f_confirm_list||$num_message_not_is_read||$num_diary_not_is_read||$num_h_confirm_list||$anatani_c_commu_admin_confirm_list})
<br>
({/if})

<a href="ktai_page.php?p=h_message_box&({$tail})">�Ҏ���������BOX</a><br>
<a href="ktai_page.php?p=h_confirm_list&amp;({$tail})">��ǧ�Ԥ��ꥹ��</a><br>
<a href="ktai_page.php?p=fh_diary_list&amp;({$tail})">my����</a><br>
<a href="ktai_page.php?p=h_diary_edit&amp;({$tail})">���������</a><br>
<br>

���ߤβ����:<br>
({$count_all_members|number_format})̾<br><br>

({if $c_diary_friend_list})
<font color="green">[({$WORD_FRIEND_HALF})�ǿ�����]</font><br>
({foreach from=$c_diary_friend_list item=item})
({$item.r_date|date_format:"%m/%d"})(({$item.nickname|t_truncate:17:""}))<br>
<a href="ktai_page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})&amp;({$tail})">({$item.subject|t_truncate:20:"..."})</a>(({$item.comment_count}))<br>
({/foreach})
<a href="ktai_page.php?p=h_diary_list_friend&amp;({$tail})">����äȸ���</a><br>
<br>
({/if})

({if $c_diary_my_comment_list})
<font color="green">[�������Ҏݎĵ�������]</font><br>
({foreach from=$c_diary_my_comment_list item=item})
({$item.r_datetime|date_format:"%m/%d"})(({$item.nickname|t_truncate:17:""}))<br>
<a href="ktai_page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})&amp;({$tail})">({$item.subject|t_truncate:20:"..."})</a>(({$item.num_comment}))<br>
({/foreach})
<a href="ktai_page.php?p=h_diary_comment_list&amp;({$tail})">����äȸ���</a><br>
<br>
({/if})

({if $c_commu_topic_list})
<font color="green">[���Ў��ƎÎ��ǿ��񤭹���]</font><br>
({foreach from=$c_commu_topic_list item=item})
({$item.r_datetime|date_format:"%m/%d"})(({$item.c_commu_name|t_truncate:17:""}))<br>
<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$item.c_commu_topic_id})&amp;({$tail})">({$item.c_commu_topic_name|t_truncate:19:"..."})</a>(({$item.number}))<br>
({/foreach})
<a href="ktai_page.php?p=h_com_comment_list&amp;({$tail})">����äȸ���</a><br>
<br>
({/if})

<font color="green">[���Î��Ў��ƎÎ�({if $count_commu})(({$count_commu}))({/if})]</font><br>
({if $c_commu_list})
({foreach from=$c_commu_list item=commu})
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$commu.c_commu_id})&amp;({$tail})">({$commu.name})</a>(({$commu.count_members}))<br>
({/foreach})
<a href="ktai_page.php?p=fh_com_list&amp;({$tail})">����äȸ���</a><br>
({else})
���ä��Ƥ��ޤ���<br>
({/if})
<br>
({if $c_friend_list})
<font color="green">[({$WORD_FRIEND_HALF})�؎���]</font><br>
({foreach from=$c_friend_list item=friend})
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$friend.c_member_id_to})&amp;({$tail})">({$friend.nickname})</a>��({$friend.count_friend})��<br>
({/foreach})
<a href="ktai_page.php?p=fh_friend_list&amp;({$tail})">����äȸ���</a><br>
({else})
({$WORD_FRIEND_HALF})�؎��Ĥʤ�<br>
({/if})
<hr>
({if $smarty.const.OPENPNE_REGIST_FROM != $smarty.const.OPENPNE_REGIST_FROM_NONE})
<a href="ktai_page.php?p=h_invite&amp;({$tail})">ͧ�ͤ���</a><br>
<br>
({/if})
<a href="ktai_page.php?p=h_config_prof&amp;({$tail})">�̎ߎێ̎������ѹ�</a><br>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<br>

<a href="ktai_normal.php?p=sns_kiyaku">���ѵ���</a><br>
<a href="ktai_normal.php?p=sns_privacy">�̎ߎ׎��ʎގ����Ύߎ؎���</a><br>

({$inc_ktai_footer|smarty:nodefaults})