({$inc_header|smarty:nodefaults})

<p>�����ѤΥ��������̾�ȥѥ���ɤ����Ϥ��Ƥ���������</p>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<form  action="module_page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<table>
<tr>
<th>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('top')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input name="cmd" type="hidden" value="login">
������̾</th>
<td><input tabindex="1" name="username" type="text" size="20"></td>
</tr>
<tr>
<th>�ѥ����</th>
<td><input tabindex="2" name="password" type="password" size="20"></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" tabindex="3" value="������"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})