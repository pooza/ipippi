({$inc_ktai_header|smarty:nodefaults})

���Ў��ƎÎ��������<br>
<hr>
({if $search_word})
��({$search_word})�פθ������<br>
({/if})
(({$count_total})��)<br>

({foreach from=$c_commu_search_result item=commu})
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$commu.c_commu_id})&amp;({$tail})">({$commu.name})</a>(({$commu.count_commu_member}))<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=h_com_find_result&amp;target_c_member_id=({$target_member.c_member_id})&amp;page=({$page-1})&search_word=({$search_word_encode})&target_c_commu_category_parent_id=({$target_c_commu_category_parent_id})&amp;({$tail})">����</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=h_com_find_result&amp;target_c_member_id=({$target_member.c_member_id})&amp;page=({$page+1})&search_word=({$search_word_encode})&target_c_commu_category_parent_id=({$target_c_commu_category_parent_id})&amp;({$tail})">����</a>({/if})

({/if})

<form action="ktai_page.php" method="get">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="p" value="h_com_find_result">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="text" name="search_word" class="text" value="({$search_word})">
<br>
<select name="target_c_commu_category_id">
<option value="all">���٤ƤΎ��Î��ގ�</option>
({foreach from=$c_commu_category_list item=item})
<option value="({$item.c_commu_category_id})" ({if $target_c_commu_category_id==$item.c_commu_category_id})selected({/if})>({$item.name})
({/foreach})
</select>
<br>
<input type="submit" value="����">
</form>
<hr>
<a href="ktai_page.php?p=h_com_find_all&({$tail})">���Ў��ƎÎ����������</a><br>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})