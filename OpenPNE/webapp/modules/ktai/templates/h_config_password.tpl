({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">�ѥ�����ѹ�</font></center>
<hr>
���ѥ���ɤ��ѹ�<br>
<br>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})
���ߤΥѥ���ɤȿ������ѥ���ɤ����Ϥ��Ƥ���������<br>
<br>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_config_password_update_password">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
���ߤΥѥ���ɡ�<br>
<input type="text" name="old_password" istyle="3" mode="alphabet" maxlength="12"><br>
�������ѥ���ɡ�<br>
<input type="text" name="new_password" istyle="3" mode="alphabet" maxlength="12"><br>
<input type="submit" value="�ѹ�"><br>
</form>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})