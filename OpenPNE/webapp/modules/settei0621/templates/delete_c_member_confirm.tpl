({$inc_header|smarty:nodefaults})

<p>�����ˤ��Υ桼����������񤵤��Ƥ������Ǥ�����</p>
<p class="caution">��������񤵤���ȡ����Υ桼�����˴ؤ������Ϻ�����층���᤹���ȤϤǤ��ޤ���</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_member','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_member_id" value="({$c_member.c_member_id})">
<input type="submit" class="submit" value="������񤵤���">
</form>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})" onClick="history.back(); return false;" onKeyPress="history.back(); return false;">�桼�����ꥹ�Ȥˤ�ɤ�</a></p>

({if $c_member.image_filename_1})<a href="img.php?filename=({$c_member.image_filename_1})" target="_blank"><img src="img.php?filename=({$c_member.image_filename_1})&amp;w=120&amp;h=120"></a>({/if})
({if $c_member.image_filename_2})<a href="img.php?filename=({$c_member.image_filename_2})" target="_blank"><img src="img.php?filename=({$c_member.image_filename_2})&amp;w=120&amp;h=120"></a>({/if})
({if $c_member.image_filename_3})<a href="img.php?filename=({$c_member.image_filename_3})" target="_blank"><img src="img.php?filename=({$c_member.image_filename_3})&amp;w=120&amp;h=120"></a>({/if})

<table>
<tr>
<th>ID</th>
<td>({$c_member.c_member_id})</td>
</tr>
<tr>
<th>�˥å��͡���</th>
<td><a href="page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})" target="_blank">({$c_member.nickname})</a></td>
</tr>
<tr>
<th>�ǽ�������</th>
<td>({$c_member.access_date|date_format:"%y-%m-%d %H:%M"})</td>
</tr>
<tr>
<th>��Ͽ��</th>
<td>({$c_member.r_date|date_format:"%y-%m-%d"})</td>
</tr>
<tr>
<th>��ǯ����</th>
<td>({if $c_member.birth_year})({$c_member.birth_year})ǯ({else})&nbsp;({/if})
({if $c_member.birth_month})({$c_member.birth_month})��({else})&nbsp;({/if})
({if $c_member.birth_day})({$c_member.birth_day})��({else})&nbsp;({/if})</td>
</tr>
({foreach from=$c_profile_list item=prof})
<tr>
<th>({$prof.caption})</th>
<td>({$c_member.profile[$prof.name].value|t_truncate:60|nl2br})</td>
</tr>
({/foreach})
<tr>
<th>PC���ɥ쥹</th>
<td>({if $c_member.secure.pc_address})<a href="mailto:({$c_member.secure.pc_address|escape:"hexentity"})">({$c_member.secure.pc_address|t_truncate:"30"|escape:"hexentity"})</a>({else})&nbsp;({/if})</td>
</tr>
<tr>
<th>���ӥ��ɥ쥹</th>
<td>({if $c_member.secure.ktai_address})<a href="mailto:({$c_member.secure.ktai_address})">({$c_member.secure.ktai_address|t_truncate:"30"})</a>({else})&nbsp;({/if})</td>
</tr>
<tr>
<th>��Ͽ���ɥ쥹</th>
<td>({if $c_member.secure.regist_address})({$c_member.secure.regist_address})({else})&nbsp;({/if})</td>
</tr>
</table>

({$inc_footer|smarty:nodefaults})