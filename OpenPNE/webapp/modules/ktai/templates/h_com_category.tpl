({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���Ў��ƎÎ���({$c_commu_category_name})</font></center>
<hr>
({if $search_word})
��({$search_word})�פθ������<br>
({/if})
(({$count_total})��)<br>

({foreach from=$c_commu_list item=c_commu})
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">({$c_commu.name})</a>(({$c_commu.count_commu_member}))<br>
({/foreach})
<br>
({if $is_prev})<a href="ktai_page.php?p=h_com_category&amp;target_c_commu_category_id=({$c_commu_category_id})&amp;page=({$page-1})&amp;({$tail})&amp;search_word=({$search_word_encode})">����</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=h_com_category&amp;target_c_commu_category_id=({$c_commu_category_id})&amp;page=({$page+1})&amp;({$tail})&amp;search_word=({$search_word_encode})">����</a>({/if})

<br>

<form action="ktai_page.php" method="GET">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="p" value="h_com_category">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_commu_category_id" value="({$c_commu_category_id})">
���Î��ގ��⤫�鸡��<br>
<input type="text" name="search_word" maxlength="64" value="({$search_word})"><br>
<input type="submit" value="����">
</form>

<hr>

<a href="ktai_page.php?p=h_com_find_all&amp;({$tail})">���Ў��ƎÎ����������</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})