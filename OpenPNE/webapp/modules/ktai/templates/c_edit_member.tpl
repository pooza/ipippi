({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���Ў��ƎÎ��Ҏݎʎގ����Խ�</font></center>
<hr>
�Ҏݎʎގ�����({$count_member|default:"0"})��<br>
({foreach from=$c_member_list item=item})
({$item.nickname})
({if $item.c_member_id==$u})��({else})<a href="do_ktai.php?cmd=c_edit_member_delete_c_commu_member&target_c_commu_id=({$c_commu.c_commu_id})&amp;target_c_member_id=({$item.c_member_id})&amp;({$tail})">���</a>({/if})<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;page=({$page})&amp;direc=-1&amp;({$tail})">����</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;page=({$page})&amp;direc=1&amp;({$tail})">����</a>({/if})
<br>
({/if})

({if count($c_member_list) > 1})
<hr>

�������͸��������
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="c_edit_member_insert_c_commu_admin_confirm">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">
�Ҏݎʎގ�<br>
<select name="target_c_member_id">
({foreach from=$c_member_list item=item})
({if $item.c_member_id != $u})
<option value="({$item.c_member_id})">({$item.nickname})
({/if})
({/foreach})
</select><br>
�Ҏ���������<br>
<textarea name="body"></textarea><br>
<input type="submit" value="����">
</form>
({/if})

<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})