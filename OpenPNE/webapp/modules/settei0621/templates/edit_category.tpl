({$inc_header|smarty:nodefaults})

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<h2>�楫�ƥ������</h2>

<table>
<tr>
<th>����̾</th>
<th>�¤ӽ�<br>(����)</th>
<th colspan="2">���</th>
<th>�����ƥ���</th>
</tr>
({foreach from=$c_commu_category_parent_list item=item})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_commu_category_parent','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_commu_category_parent_id" value="({$item.c_commu_category_parent_id})">
<input type="text" name="name" value="({$item.name})" size="20"></td>
<td><input type="text" name="sort_order" value="({$item.sort_order})" size="5"></td>
<td><input type="submit" class="submit" value="�ѹ�"></td>
</form>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_commu_category_parent','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_commu_category_parent_id" value="({$item.c_commu_category_parent_id})">
<input type="submit" class="submit" value="���">
</td>
</form>
<td><a href="#opt_({$item.name})">����</a></td>
</tr>
({/foreach})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_commu_category_parent','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="text" name="name" value="" size="20"></td>
<td><input type="text" name="sort_order" value="" size="5"></td>
<td colspan="2"><input type="submit" class="submit" value="�����ɲ�"></td>
<td>&nbsp;</td>
</form>
</tr>
</table>

<hr>

<h2>�����ƥ������</h2>

({foreach from=$c_commu_category_parent_list item=item})
<h3><a name="opt_({$item.name})">({$item.name})</a></h3>

<table>
<tr>
<th>����̾</th>
<th>�¤ӽ�</th>
<th colspan="2">���</th>
</tr>
({foreach from=$c_commu_category_list[$item.c_commu_category_parent_id] item=option})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_commu_category','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_commu_category_id" value="({$option.c_commu_category_id})">
<input type="text" name="name" value="({$option.name})" size="20"></td>
<td><input type="text" name="sort_order" value="({$option.sort_order})" size="5"></td>
<td><input type="submit" class="submit" value="�ѹ�"></td>
</form>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_commu_category','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_commu_category_id" value="({$option.c_commu_category_id})">
<input type="submit" class="submit" value="���">
</td>
</form>
</tr>
({/foreach})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_commu_category','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_commu_category_parent_id" value="({$item.c_commu_category_parent_id})">
<input type="text" name="name" value="" size="20"></td>
<td><input type="text" name="sort_order" value="" size="5"></td>
<td colspan="2"><input type="submit" class="submit" value="�����ɲ�"></td>
</form>
</tr>
</table>

({/foreach})

({$inc_footer|smarty:nodefaults})