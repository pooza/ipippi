({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">��̩�μ��䡦��������</font></center>
<hr>
����̩�μ��䡦�������ѹ�<br>
<br>
�ѥ���ɤ�˺�줿���ˡ��ѥ���ɤ��ȯ�Ԥ��뤿�����̩�μ���Ȥ������������ꤹ�뤳�Ȥ��Ǥ��ޤ���<br>
<br>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_config_password_query_update_password_query">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
���ߤΥѥ���ɡ�<br>
<input type="text" name="password" istyle="3" mode="alphabet" maxlength="12"><br>
<br>
��̩�μ��䡧<br>
<select name="c_password_query_id">
<option value="0">���򤷤Ƥ�������
({foreach from=$password_query_list key=key item=item})
<option value="({$key})">({$item})
({/foreach})
</select><br>
��̩�μ����������<br>
<input type="text" name="password_query_answer" istyle="3" mode="alphabet" maxlength="12"><br>
<input type="submit" value="����"><br>
</form>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})