({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���ӎҎ��َ��Ďގڎ��ѹ�</font></center>
<hr>
����Ͽ�Ҏ��َ��Ďގڎ�(��������)���ѹ�<br>
<br>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})
���������ӎҎ��َ��Ďގڎ������Ϥ��������ܥ���򲡤��Ƥ���������<br>
<br>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_config_mail_insert_c_ktai_address_pre">
<textarea name="ktai_address" rows="1" istyle="3" mode="alphabet" maxlength="100"></textarea><br>
<input type="submit" value="�᡼������"><br>
</form>

<br>
�Ϥ����᡼��˵��ܤ��Ƥ���URL�˥����������ơ��ѥ���ɤ����Ϥ�����ѹ�����λ���ޤ���

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})