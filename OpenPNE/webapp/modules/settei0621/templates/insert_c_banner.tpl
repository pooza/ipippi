({$inc_header|smarty:nodefaults})

<h2>バナー追加</h2>

<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<table>
<tr>
<th>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_banner','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
画像</th>
<td><input type="file" name="upfile"></td>
</tr>
<tr>
<th>リンク先</th>
<td><input type="text" name="a_href" value="" size="40"></td>
</tr>
<tr>
<th>表示位置</th>
<td>
<select name="type">
<option value="TOP">TOP</option>
({*
<option value="SIDE">SIDE</option>
*})
</select>
</td>
</tr>
<tr>
<th>バナー名</th>
<td><input type="text" name="nickname" value="" size="20"></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="追加"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})