({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">({$target_c_member.nickname})�����({$WORD_FRIEND_HALF})�˲ä���</font></center>
<hr>
({$WORD_FRIEND_HALF})��������Ҏ��������ޤ�����������ǧ������Ƥ�������
<hr>
({if $msg})({$msg})<br>({/if})
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="f_link_request_insert_c_friend_confirm">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_member_id" value="({$target_c_member.c_member_id})">
�Ҏ���������<br>
<textarea name="body"></textarea><br>
<input type="submit" value="����">
</form>
<hr>

<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">({$target_c_member.nickname})����ΎĎ��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})