({$inc_header|smarty:nodefaults})

<h2>�����ѥѥ�����ѹ�</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<p>�����ڡ����ѤΥѥ���ɤ��ѹ����뤳�Ȥ��Ǥ��ޤ���</p>

<ul>
<li class="caution">�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ���������</li>
</ul>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<table>
<tr>
<th>
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_admin_user_password','do')})">
���ߤΥѥ����</th>
<td><input type="password" name="old_password" value=""></td>
</tr>
<tr>
<th>�������ѥ����</th>
<td><input type="password" name="new_password" value=""></td>
</tr>
<tr>
<th>�������ѥ����(��ǧ)</th>
<td><input type="password" name="new_password2" value=""></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" value="�ѹ�" class="submit"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})