({$inc_ktai_header|smarty:nodefaults})

<center>�᡼�륢�ɥ쥹��Ͽ</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

�ѥ���ɤ����Ϥ��Ƥ���������<br>
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="update_ktai_address">
<input type="hidden" name="ses" value="({$ses})">
���ӎҎ��َ��Ďގڎ�<br>
({$pre.ktai_address})<br>
�ʎߎ��܎��Ď�<br>
<input name="password" type="text" istyle="3" mode="alphabet" value=""><br>
<input name="submit" value="����" type="submit"><br>
</form>

<hr>

({$inc_ktai_footer|smarty:nodefaults})