({$inc_ktai_header|smarty:nodefaults})

<center>PC���ɥ쥹��Ͽ</center>
<hr>
�ʲ������PC�᡼�륢�ɥ쥹�����Ϥ��Ƥ�������<br>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_pc_send_insert_c_pc_address_pre">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
PC�Ҏ��َ��Ďގڎ�<br>
<input type="text" name="pc_address" istyle="3" mode="alphabet" maxlength="100"><br>
<input type="submit" value="����"><br>
</form>

<br>
�Ϥ����᡼��˵��ܤ��Ƥ���URL�˥����������ơ��ѥ���ɤ����Ϥ������Ͽ����λ���ޤ���

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})