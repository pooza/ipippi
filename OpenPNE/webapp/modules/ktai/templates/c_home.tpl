({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���Ў��ƎÎ���({$c_commu.name})</font></center>
<hr>
({if $c_siteadmin})
({$c_siteadmin|smarty:nodefaults})
<hr>
({/if})
({$c_commu.info|nl2br})<br>
({if $c_commu.image_filename})
���Ў��ƎÎ�������[<a href="img.php?filename=({$c_commu.image_filename})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu.image_filename})&amp;f=jpg">��</a>]<br>({/if})
({if !$relation_c_member_and_c_commu.join && !$relation_c_member_and_c_commu.wait})
<a href="do_ktai.php?cmd=inc_join_c_commu&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ύ��Ў��ƎÎ��˻���</a><br>
({/if})
<hr>
({if $is_c_commu_view})
���ȥԥå��ꥹ��<br>
({foreach from=$new_topic_comment item=item})
[({$item.r_datetime|date_format:"%m/%d"})]<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$item.c_commu_topic_id})&amp;({$tail})">({$item.name})</a>(({$item.count_comments}))<br>
({foreachelse})
�ȥԥå��Ϥ���ޤ���<br>
({/foreach})
({if $new_topic_comment})
��<a href="ktai_page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">��äȸ���</a><br>
({/if})
<br>
�����٥�ȥꥹ��<br>
({foreach from=$new_topic_comment_event item=item})
[({$item.r_datetime|date_format:"%m/%d"})]<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$item.c_commu_topic_id})&amp;({$tail})">({$item.name})</a>(({$item.count_comments}))<br>
({foreachelse})
���٥�ȤϤ���ޤ���<br>
({/foreach})
({if $new_topic_comment_event})
��<a href="ktai_page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">��äȸ���</a><br>
({/if})
({if $relation_c_member_and_c_commu.join})
<br>
��<a href="ktai_page.php?p=c_topic_add&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">�ȥԥå�����</a><br>
({/if})
({/if})
<br>

������:<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_commu.c_member_id_admin})&amp;({$tail})">({$c_commu.c_member_admin.nickname})</a><br>
<br>
�����Ў��ƎÎ��Ҏݎʎގ�(({$c_commu.count_member}))<br>
({foreach from=$c_commu_member_list item=c_commu_member })
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_commu_member.c_member_id})&({$tail})">({$c_commu_member.nickname})<br>
({/foreach})
<br>
<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&({$tail})">������ɽ��</a><br>
<br>
<a href="ktai_page.php?p=c_invite&amp;target_c_commu_id=({$c_commu.c_commu_id})&({$tail})">���Ў��ƎÎ��򤹤����</a><br>
({if !$relation_c_member_and_c_commu.join&&!$relation_c_member_and_c_commu.wait})
<a href="do_ktai.php?cmd=inc_join_c_commu&amp;target_c_commu_id=({$c_commu.c_commu_id})&({$tail})">���Ύ��Ў��ƎÎ��˻���</a><br>
({/if})
({if $relation_c_member_and_c_commu.join&&$c_commu.c_member_id_admin!=$u})
<a href="do_ktai.php?cmd=inc_leave_c_commu&amp;target_c_commu_id=({$c_commu.c_commu_id})&({$tail})">���Ύ��Ў��ƎÎ��������</a><br>
({/if})

({if $relation_c_member_and_c_commu.join})
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
���Ύ��Ў��ƎÎ��ν񤭹��ߤ򎹎������Ҏ��٤�<br>
<input type="radio" value="1" name="is_receive_mail"({if $is_receive_mail}) checked="checked"({/if})>�������<br>
<input type="radio" value="0" name="is_receive_mail"({if !$is_receive_mail}) checked="checked"({/if})>�������ʤ�<br>
({if $smarty.const.OPENPNE_ENABLE_PC})
���Ύ��Ў��ƎÎ��ν񤭹��ߤ�PC�Ҏ��٤�<br>
<input type="radio" value="1" name="is_receive_mail_pc"({if $is_receive_mail_pc}) checked="checked"({/if})>�������<br>
<input type="radio" value="0" name="is_receive_mail_pc"({if !$is_receive_mail_pc}) checked="checked"({/if})>�������ʤ�<br>
({/if})
<input type="hidden" name="cmd" value="c_home_update_is_receive_mail">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">
<input type="submit" value="����"><br>
</form>
({/if})

<hr>
({if $u == $c_commu.c_member_id_admin})
<a href="ktai_page.php?p=c_edit&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Խ�</a><br>
<a href="ktai_page.php?p=c_edit_member&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ҏݎʎގ��Խ�</a><br>
<br>
({/if})
<a href="ktai_page.php?p=h_com_find_all&amp;({$tail})">���Ў��ƎÎ����������</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})