({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">�Ҏ��������ޤ�����</font></center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_message_send_insert_message">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_member_id" value="({$target_member.c_member_id})">
<font color=red>({if $msg})({$msg})<br>({/if})</font>
������<br>
<SELECT name="target_c_member_id">
({foreach from=$c_friend_list item=c_friend})
<OPTION value="({$c_friend.c_member_id_to})">({$c_friend.nickname})</a> 
({/foreach})
</SELECT>
<br>
�����Ď�<br>
<input type="text" name="subject"><br> 
��ʸ<br>
<textarea name="body"></textarea><br>
<input type="submit" value="����">
</form>
������������ϥ�����ȤʤäƤ��ޤ������ꤿ���Ҏݎʎގ����؎��Ĥ�ɽ������ʤ��ä���硢
<a href="ktai_page.php?p=h_message_send&amp;({$tail})">����</a>�򲡤��Ʋ��̤򹹿����Ƥ�������
<hr>

<a href="ktai_page.php?p=h_message_box&amp;({$tail})">�Ҏ��������ގΎގ�����</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})