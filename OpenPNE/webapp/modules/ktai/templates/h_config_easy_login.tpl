({$inc_ktai_header|smarty:nodefaults})

<center>���󤿤����������</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

({if $is_registered})

<font color="orange">���󤿤����������ѤߤǤ���</font><br>
�ѹ�����ˤ�
({/if})

�ѥ���ɤ����Ϥ��ơ�����ܥ���򲡤��Ƥ���������

<form action="do_ktai.php" method="post" utn>
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_config_easy_login">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
�ѥ���ɡ�<br>
<input type="text" name="password" istyle="3" mode="alphabet" value=""><br>
({if $is_registered})
<input type="submit" name="update" value="�ѹ�">
<input type="submit" name="delete" value="���"><br>
({else})
<input type="submit" name="update" value="����������������"><br>
({/if})
</form>

<br>
����������ǤϷ��Ӥθ��μ����ֹ�������Ǥ��ʤ����ᤴ���Ѥˤʤ�ޤ���<br>
<a href="ktai_normal.php?p=whatis_easy_login">&gt;&gt;���󤿤�ێ��ގ��ݤȤ�</a>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})