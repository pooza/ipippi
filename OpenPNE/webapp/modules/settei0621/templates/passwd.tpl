({$inc_header|smarty:nodefaults})

<h2>�ѥ���ɺ�ȯ��</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<p><a href="page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})" target="_blank">({$c_member.nickname})����</a>�Υѥ���ɤ��ѹ����ޤ���</p>

<ul>
<li class="caution">�ѥ���ɤ�6��12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ���������</li>
<li class="caution">�ѥ�����ѹ��ܥ���򲡤��ȡ��桼���˿������ѥ���ɤν񤫤줿�᡼�뤬��������ޤ���</li>
</ul>

<table>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<tr>
<th>
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('passwd','do')})">
<input type="hidden" name="target_c_member_id" value="({$c_member.c_member_id})">
�������ѥ����</td>
<td><input type="password" name="password" size="12"></td>
</tr>
<tr>
<th>�������ѥ����(��ǧ)</th>
<td><input type="password" name="password2" size="12"></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="�ѥ�����ѹ�"></td>
</tr>
</form>
</table>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})" onClick="history.back(); return false;" onKeyPress="history.back(); return false;">���Υڡ����ˤ�ɤ�</a></p>

({$inc_footer|smarty:nodefaults})
