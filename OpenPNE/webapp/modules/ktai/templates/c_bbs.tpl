({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">
���Ў��ƎÎ���({$c_commu.name})<br>
</font></center>
<hr>

({if $c_commu_topic})

<center>({$c_commu_topic.name})</center>
<hr>

({if $c_commu_topic.event_flag != 1})

<a href="ktai_page.php?p=f_home&target_c_member_id=({$c_commu_topic.c_member_id})&amp;({$tail})">({$c_commu_topic.nickname|default:"&nbsp;"})</a> 
<br>
({$c_commu_topic.body|nl2br|default:"&nbsp;"})<br>
({if $c_commu_topic.image_filename1})������[<a href="img.php?filename=({$c_commu_topic.image_filename1})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename1})&amp;f=jpg">��</a>]<br>({/if})
({if $c_commu_topic.image_filename2})������[<a href="img.php?filename=({$c_commu_topic.image_filename2})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename2})&amp;f=jpg">��</a>]<br>({/if})
({if $c_commu_topic.image_filename3})������[<a href="img.php?filename=({$c_commu_topic.image_filename3})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename3})&amp;f=jpg">��</a>]<br>({/if})
({$c_commu_topic.r_datetime|date_format:"%m/%d %H:%M"})
<br>

({else})

<a href="ktai_page.php?p=f_home&target_c_member_id=({$c_commu_topic.c_member_id})&amp;({$tail})">({$c_commu_topic.nickname|default:"&nbsp;"})</a> <br>
����������<br>
({$c_commu_topic.open_date|date_format:"%Yǯ%m��%d��"}) ({$c_commu_topic.open_date_comment})<br> 
���ž�ꡧ<br>
({$c_commu_topic.pref}) ({$c_commu_topic.open_pref_comment})<br>
({if $c_commu_topic.invite_period != '0000-00-00'})
�罸���¡�<br>
({$c_commu_topic.invite_period|date_format:"%Yǯ%m��%d��"})<br>
({/if})
�ܺ١�<br>
({$c_commu_topic.body|nl2br|default:"&nbsp;"})<br>
({if $c_commu_topic.image_filename1})������[<a href="img.php?filename=({$c_commu_topic.image_filename1})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename1})&amp;f=jpg">��</a>]<br>({/if})
({if $c_commu_topic.image_filename2})������[<a href="img.php?filename=({$c_commu_topic.image_filename2})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename2})&amp;f=jpg">��</a>]<br>({/if})
({if $c_commu_topic.image_filename3})������[<a href="img.php?filename=({$c_commu_topic.image_filename3})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$c_commu_topic.image_filename3})&amp;f=jpg">��</a>]<br>({/if})
({$c_commu_topic.r_datetime|date_format:"%m/%d %H:%M"})<br>

<a href="ktai_page.php?p=c_event_member_list&target_c_commu_topic_id=({$c_commu_topic.c_commu_topic_id})&({$tail})">���üԥꥹ��</a>

({/if})

({/if})

({if $is_c_commu_view})
<hr>
({foreach from=$c_commu_topic_comment_list item=item})
({if $item.delete_reason})
({$item.number}).<br>
<font color="red">�������ޤ�����</font><br>
({$item.r_datetime|date_format:"%m/%d %H:%M"})<br><br>
({else})
({if $item.number != 0})
({$item.number}).({if $item.nickname})<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id})&amp;({$tail})">({$item.nickname})</a>({/if})
<br>
({$item.body|nl2br|default:"&nbsp;"})<br>
({if $item.image_filename1})������[<a href="img.php?filename=({$item.image_filename1})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$item.image_filename1})&amp;f=jpg">��</a>]<br>({/if})
({if $item.image_filename2})������[<a href="img.php?filename=({$item.image_filename2})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$item.image_filename2})&amp;f=jpg">��</a>]<br>({/if})
({if $item.image_filename3})������[<a href="img.php?filename=({$item.image_filename3})&amp;w=120&amp;h=120&amp;f=jpg">��</a>/<a href="img.php?filename=({$item.image_filename3})&amp;f=jpg">��</a>]<br>({/if})
({$item.r_datetime|date_format:"%m/%d %H:%M"})
<br>
({if ($item.c_member_id == $u || $target_diary_writer==$u) && $item.number != 0})
[<a href="do_ktai.php?cmd=c_bbs_delete_c_commu_topic_comment&target_c_commu_topic_comment_id=({$item.c_commu_topic_comment_id})&amp;({$tail})">���</a>]<br>
({/if})
<br>
({/if})
({/if})
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$c_commu_topic_id})&amp;page=({$page-1})&amp;({$tail})">����</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$c_commu_topic_id})&amp;page=({$page+1})&amp;({$tail})">����</a>({/if})
<br>
({/if})

({if $is_c_commu_member})
<hr>

({if $msg})
<a name="comment"><font color="red">({$msg})</font></a><br>
<br>
({/if})

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="c_bbs_insert_c_commu_topic_comment">
<input type="hidden" name="target_c_commu_topic_id" value="({$c_commu_topic_id})">
<textarea name="body"></textarea><br>
({if $c_commu_topic.event_flag})
({if !$is_c_event_admin})
({if !$is_c_event_member})
<input name="join_event" type="submit" value="���٥�Ȥ˻��ä���"><br>
({else})
<input name="cancel_event" type="submit" value="���ä򥭥�󥻥뤹��"><br>
({/if})
({/if})
<input name="write_comment" type="submit" value="�����ȤΤ߽񤭹���">
({else})
<input type="submit" value="�񤭹���">
({/if})
</form>
({/if})
({/if})
<hr>

<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})