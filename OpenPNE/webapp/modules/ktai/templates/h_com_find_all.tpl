({$inc_ktai_header|smarty:nodefaults})

���Ў��ƎÎ�<br>
<hr>
�ǿ��񤭹���<br>
({foreach from=$c_commu_list_lastupdated item=item})
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.name})</a><br>
({/foreach})
<hr>
���Ў��ƎÎ�̾��õ��
<form action="ktai_page.php" method="get">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="p" value="h_com_find_result">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="text" name="search_word" class="text">
<br>
<select name="target_c_commu_category_id">
<option value="all">���٤ƤΎ��Î��ގ�
({foreach from=$c_commu_category_list item=item})
<option value="({$item.c_commu_category_id})">({$item.name})
({/foreach})
</select>
<br>
<input type="submit" value="����">
</form>
<hr>
���ƥ�����<br>

({foreach from=$c_commu_category_parent_list item=ccpl})
<hr>
��({$ccpl.name})��<br>

({foreach from=$c_commu_category_list item=cccl})

({if $ccpl.c_commu_category_parent_id == $cccl.c_commu_category_parent_id })

({$cccl.icon})<a href="ktai_page.php?p=h_com_category&amp;target_c_commu_category_id=({$cccl.c_commu_category_id})&amp;({$tail})">({$cccl.name})</a><br>

({/if})

({/foreach})
<br>
({/foreach})

<hr>
<a href="ktai_page.php?p=h_com_add&amp;({$tail})">���Ў��ƎÎ�����</a>

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})