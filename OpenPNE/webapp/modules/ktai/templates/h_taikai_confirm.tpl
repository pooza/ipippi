({$inc_ktai_header|smarty:nodefaults})

<center>����³��</center>
<hr>
��������񤷤Ƥ������Ǥ�����<br>
<br>
��񤹤���ϡ���ǧ�Τ���ѥ���ɤ����Ϥ��Ƥ���������<br>
({if $msg})<font color="red">({$msg})</font><br>({/if})

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_taikai">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
�ѥ����<br>
<input type="text" name="password" istyle="3" mode="alphabet" maxlength="12"><br>
<input type="submit" value="��񤹤�"><br>
</form>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">�����ѹ�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})