({$inc_header|smarty:nodefaults})

<h2>�Хʡ����</h2>

<p>�����˺�����Ƥ������Ǥ�����</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_banner','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_banner_id" value="({$requests.c_banner_id})">
<input type="submit" class="submit" value="���">
</form>

({$inc_footer|smarty:nodefaults})
