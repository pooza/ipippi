({$inc_ktai_header|smarty:nodefaults})

<center>���Ў��ƎÎ�����</center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="p" value="c_home">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_com_add_insert_c_commu">
���Î��ގ�<br>
<select name="c_commu_category_id">
({foreach from=$c_commu_category_list item=c_commu_category})
<option value="({$c_commu_category.c_commu_category_id})">({$c_commu_category.name})
({/foreach})
</select><br>
���Ў��ƎÎ�̾<br>
<input type="text" name="name" value=""><br>
����ʸ<br>
<textarea name="info"></textarea><br>
���á�����<br>
<input type="radio" name="public_flag" value="public" checked>ï�Ǥ⻲�ò�ǽ���Ǽ��Ĥ������˸���<br>
<input type="radio" name="public_flag" value="auth_public">���äˤϴ����ͤξ�ǧ��ɬ�ס��Ǽ��Ĥ������˸���<br>
<input type="radio" name="public_flag" value="auth_commu_member">���äˤϴ����ͤξ�ǧ��ɬ�ס��Ǽ��Ĥώ��Ў��ƎÎ��Ҏݎʎގ��ˤΤ߸���<br>
<input type="submit" value="����">
</form>

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})