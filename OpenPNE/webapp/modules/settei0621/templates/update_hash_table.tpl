({$inc_header|smarty:nodefaults})

<h2>�����ѥڡ���̾�����������</h2>

<p>�����ڡ����Υڡ���̾���¬�Ǥ��ʤ��褦�˥�����ʸ������ִ����ޤ���</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_hash_table','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="submit" class="submit" value="���� �ԡ�">
</form>

<p>�ڡ���̾�򸵤ξ��֤��ᤷ�ޤ���(�ǥХå���)</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_hash_table','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="submit" class="submit" value="���ꥻ�åȡ�">
</form>

({$inc_footer|smarty:nodefaults})
