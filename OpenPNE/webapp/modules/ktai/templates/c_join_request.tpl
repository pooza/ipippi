({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���Ў��ƎÎ��˻���</font></center>
<hr>
���Ύ��Ў��ƎÎ��˻��ä���ˤϡ����Ў��ƎÎ������Ԥξ�ǧ��ɬ�פǤ���<br>
<br>
���Ў��ƎÎ������Ԥؤλ��ô�˾�Ҏ��������ޤ�������������������Ƥ�������<br>
<hr>
({if $msg})
<font color="red">({$msg})</font><br>
({/if})
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="c_join_request_insert_c_commu_member_confirm">
<input type="hidden" name="target_c_commu_id" value="({$target_c_commu_id})">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
�Ҏ���������<br>
<textarea name="body"></textarea><br>
<input type="submit" value="����">
</form>
<hr>

<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$target_c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})