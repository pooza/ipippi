({$inc_header|smarty:nodefaults})

<script type="text/javascript">
<!--
function checkAll(){
	var sm = document.formSendMessages;
	var len = sm.elements.length;
	for (var i = 0; i < len; i++) {
	    sm.elements[i].checked = true;
	}
	return false;
}

function clearAll(){
	var sm = document.formSendMessages;
	var len = sm.elements.length;
	for (var i = 0; i < len; i++) {
	    sm.elements[i].checked = false;
	}
	return false;
}
//-->
</script>

<form action="module_page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<p style="margin-top:0">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('list_c_member')})">
�᡼�륢�ɥ쥹����(��������)��
<input type="text" name="mail_address" value="({$requests.mail_address})" size="30">
<input type="submit" class="submit" value="����">
</p>
</form>

({if $pager})
<form action="module_page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('list_c_member')})">
ɽ�������
<select name="page_size">
<option value="10"({if $pager.page_size==10}) selected="selected"({/if})>10��</option>
<option value="20"({if $pager.page_size==20}) selected="selected"({/if})>20��</option>
<option value="50"({if $pager.page_size==50}) selected="selected"({/if})>50��</option>
<option value="100"({if $pager.page_size==100}) selected="selected"({/if})>100��</option>
</select>
<input type="submit" class="submit" value="�ѹ�">
<div class="caution">��ɽ�������¿������Ƚ������Ť��ʤꡢ�����С�����٤�������ޤ���</div>
</form>
({/if})

({if $pager})
<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) ���� ({$pager.start_num}) - ({$pager.end_num})���ܤ�ɽ�����Ƥ��ޤ�
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">����</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">����</a>
({/if})
</div>
<!-- pager_end -->
({/if})

<form action="module_page.php" method="post" name="formSendMessages">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('send_messages')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<table style="font-size:small">

({capture name="table_header"})
<tr>
<th colspan="3">���</th>
<th>ID</th>
<th>�˥å��͡���</th>
<th>�ǽ�������</th>
<th>��Ͽ��</th>
<th>���Լ�</th>
<th colspan="3">����</th>
<th colspan="3">��ǯ����</th>
({foreach from=$c_profile_list item=prof})
<th>({$prof.caption})</th>
({/foreach})
<th>ID</th>
<th>PC���ɥ쥹</th>
<th>���ӥ��ɥ쥹</th>
<th>��Ͽ�����ɥ쥹</th>
</tr>
({/capture})

<thead>
({$smarty.capture.table_header|smarty:nodefaults})
</thead>
<tfoot>
({$smarty.capture.table_header|smarty:nodefaults})
</tfoot>
<tbody>
({foreach from=$c_member_list item=item})
<tr>
<td>({if $item.c_member_id != 1})<input type="checkbox" name="c_member_ids[]" value="({$item.c_member_id})">({else})&nbsp;({/if})</td>
<td>({if $item.c_member_id != 1})<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_member_confirm')})&amp;target_c_member_id=({$item.c_member_id})">�������</a>({else})&nbsp;({/if})</td>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('passwd')})&amp;target_c_member_id=({$item.c_member_id})">�ѥ���ɺ�ȯ��</a></td>
<td class="idnumber">({$item.c_member_id})</td>
<td><a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id})" target="_blank">({$item.nickname})</a></td>
<td>({if $item.r_date != '0000-00-00 00:00:00'})({$item.access_date|date_format:"%y-%m-%d %H:%M"})({else})&nbsp;({/if})</td>
<td>({if $item.r_date != '0000-00-00 00:00:00'})({$item.r_date|date_format:"%y-%m-%d"})({else})&nbsp;({/if})</td>
<td>({if $item.c_member_id_invite})({$item.c_member_id_invite}):<a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id_invite})" target="_blank">({$item.c_member_invite.nickname})</a>({else})&nbsp;({/if})</td>
<td>({if $item.image_filename_1})<a href="img.php?filename=({$item.image_filename_1})" target="_blank">��</a>({else})��({/if})</td>
<td>({if $item.image_filename_2})<a href="img.php?filename=({$item.image_filename_2})" target="_blank">��</a>({else})��({/if})</td>
<td>({if $item.image_filename_3})<a href="img.php?filename=({$item.image_filename_3})" target="_blank">��</a>({else})��({/if})</td>
<td class="number">({if $item.birth_year})({$item.birth_year})ǯ({else})&nbsp;({/if})</td>
<td class="number">({if $item.birth_month})({$item.birth_month})��({else})&nbsp;({/if})</td>
<td class="number">({if $item.birth_day})({$item.birth_day})��({else})&nbsp;({/if})</td>
({foreach from=$c_profile_list item=prof})
<td>({strip})
({if $prof.form_type == "checkbox"})
	({$item.profile[$prof.name].value|@t_implode:","|t_truncate:30})
({else})
	({$item.profile[$prof.name].value|t_truncate:30})
({/if})
({/strip})</td>
({/foreach})
<td class="idnumber">({$item.c_member_id})</td>
<td>({if $item.secure.pc_address})<a href="mailto:({$item.secure.pc_address|escape:"hexentity"})">({$item.secure.pc_address|t_truncate:"30"|escape:"hexentity"})</a>({else})&nbsp;({/if})</td>
<td>({if $item.secure.ktai_address})<a href="mailto:({$item.secure.ktai_address})">({$item.secure.ktai_address|t_truncate:"30"})</a>({else})&nbsp;({/if})</td>
<td>({if $item.secure.regist_address})({$item.secure.regist_address})({else})&nbsp;({/if})</td>
</tr>
({/foreach})
</tbody>

</table>

<p>
<a href="#" onClick="return checkAll();" onKeyPress="return checkAll();">���Ƥ�����å�</a> / <a href="#" onClick="return clearAll();" onKeyPress="return clearAll();">���ƤΥ����å���Ϥ���</a>
</p>
�����å��������С����Ф��ơ�<br>
<input type="submit" class="submit" value="��å���������������">
</form>

({if $pager})
<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) ���� ({$pager.start_num}) - ({$pager.end_num})���ܤ�ɽ�����Ƥ��ޤ�
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">����</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">����</a>
({/if})
</div>
<!-- pager_end -->
({/if})

<div class="caution">���ѥ���ɡ���̩�μ�����������ԲĵդʰŹ沽��ܤ��ƥǡ����١�������¸���Ƥ��뤿�ᡢ����ʸ������Τ뤳�Ȥ��Ǥ��ޤ���</div>

({$inc_footer|smarty:nodefaults})