({$inc_ktai_header|smarty:nodefaults})

<center>���Ў��ƎÎ��Խ�</center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">
<input type="hidden" name="cmd" value="c_edit_update_c_commu">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
���Î��ގ�<br>
<select name="c_commu_category_id">
({foreach from=$c_commu_category_list item=c_commu_category})
<option value="({$c_commu_category.c_commu_category_id})">({$c_commu_category.name})
({/foreach})
</select><br>
���Ў��ƎÎ�̾<br>
<input type="text" name="name" value="({$c_commu.name})"><br>
����ʸ<br>
<textarea name="info">({$c_commu.info})</textarea><br>
���á�����<br>
<input type="radio" name="public_flag" value="public"({if $c_commu.public_flag=='public'}) checked({/if})>ï�Ǥ⻲�ò�ǽ���Ǽ��Ĥ������˸���<br>
<input type="radio" name="public_flag" value="auth_public"({if $c_commu.public_flag=='auth_public'}) checked({/if})>���äˤϴ����ͤξ�ǧ��ɬ�ס��Ǽ��Ĥ������˸���<br>
<input type="radio" name="public_flag" value="auth_commu_member"({if $c_commu.public_flag=='auth_commu_member'}) checked({/if})>���äˤϴ����ͤξ�ǧ��ɬ�ס��Ǽ��Ĥώ��Ў��ƎÎ��Ҏݎʎގ��ˤΤ߸���<br>
<input type="submit" value="�Խ�">
</form>

<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎ߤ����</a><br>

({$inc_ktai_footer|smarty:nodefaults})