({$inc_header|smarty:nodefaults})

<h2>�Хʡ�����</h2>

<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<table>
<tr>
<th>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_banner','do')})">
<input type="hidden" name="c_banner_id" value="({$c_banner.c_banner_id})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
����</th>
<td>
<a href="img.php?filename=({$c_banner.image_filename})" target="_blank"><img src="img.php?filename=({$c_banner.image_filename})&amp;w=200&amp;h=200"></a><br>
<input type="file" name="upfile"></td>
</tr>
<tr>
<th>
�����</th>
<td><input type="text" name="a_href" value="({$c_banner.a_href})" size="40"></td>
</tr>
<tr>
<th>ɽ������</th>
<td>
<select name="type">
<option value="TOP"({if $c_banner.type=="TOP"}) selected="selected"({/if})>TOP</option>
<option value="SIDE"({if $c_banner.type=="SIDE"}) selected="selected"({/if})>SIDE</option>
</select>
</td>
</tr>
<tr>
<th>�Хʡ�̾</th>
<td><input type="text" name="nickname" value="({$c_banner.nickname})" size="20"></td>
</tr>
<tr>
<th>ɽ������</th>
<td>
<select name="is_hidden">
<option value="0"({if !$c_banner.is_hidden}) selected="selected"({/if})>ɽ������</option>
<option value="1"({if $c_banner.is_hidden}) selected="selected"({/if})>ɽ�����ʤ�</option>
</select>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="�ѹ�"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})
