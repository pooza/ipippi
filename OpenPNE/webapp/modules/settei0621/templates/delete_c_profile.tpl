({$inc_header|smarty:nodefaults})

<h2>�ץ�ե�������ܺ��</h2>

<p>�����˺�����Ƥ������Ǥ�����</p>
<p class="caution">�����ι��ܤ��Ф���桼�����������ͤ⼺���ޤ���</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_profile','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_profile_id" value="({$requests.c_profile_id})">
<input type="submit" class="submit" value="���">
</form>

({$inc_footer|smarty:nodefaults})