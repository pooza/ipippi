({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">�Ҏ��������ޤ�����</font></center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="c_invite_insert_c_message_commu_invite">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_commu_id" value="({$target_c_commu_id})">
<font color=red>({if $msg})({$msg})<br>({/if})</font>
������<br>
<SELECT name="target_c_member_id">
({foreach from=$c_friend_list item=c_friend})
<OPTION value="({$c_friend.c_member_id})">({$c_friend.nickname})</a> 
({/foreach})
</SELECT>
<br>
�Ҏ���������<br>
<textarea name="body">({$c_commu.name})�Υ��ߥ�˥ƥ������äƤߤޤ������褫�ä�����ˤɤ��Ǥ�����</textarea><br>
<input type="submit" value="����">
</form>
������������ϥ�����ȤʤäƤ��ޤ������ꤿ���Ҏݎʎގ����؎��Ĥ�ɽ������ʤ��ä���硢
<a href="ktai_page.php?p=c_invite&amp;target_c_commu_id=({$target_c_commu_id})&amp;({$tail})">����</a>�򲡤��Ʋ��̤򹹿����Ƥ�������
<hr>

<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$target_c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})