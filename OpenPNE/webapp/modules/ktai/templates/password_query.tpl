({$inc_ktai_header|smarty:nodefaults})

<center>({$SNS_NAME})�ѥ���ɺ�ȯ��</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
({/if})
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="password_query">
���ӎҎ��َ��Ďގڎ�<br>
<textarea name="ktai_address" rows="1" istyle="3" mode="alphabet" maxlength="100"></textarea><br>
��̩�μ���<br>
<select name="c_password_query_id">
<option value="0">���򤷤Ƥ�������
({foreach from=$password_query_list key=key item=item})
<option value="({$key})">({$item})
({/foreach})
</select><br>
��̩�μ��������<br>
<input type="text" name="password_query_answer" value=""><br>
<br>
<input type="submit" value="�ѥ���ɺ�ȯ��"><br>
</form>

<hr>

<a href="ktai_normal.php?p=login">������ڡ��������</a>

({$inc_ktai_footer|smarty:nodefaults})