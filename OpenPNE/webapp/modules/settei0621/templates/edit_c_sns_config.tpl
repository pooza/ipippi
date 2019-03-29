({$inc_header|smarty:nodefaults})

<h2>デザインスキン・色変更</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<ul>
<li><a href="#skin">スキン画像変更</a></li>
<li><a href="#color">色変更</a></li>
<li><a href="#css">カスタムCSS追加</a></li>
</ul>


<hr>

<h3><a name="skin">スキン画像変更</a></h3>

<p class="caution">画像が変更されていてもブラウザ上では以前のキャッシュ画像が表示されてしまうことがあります。<br>
その場合はこのページを再読み込みして確認してください。</p>

<table>
<tr>
<th>skin_after_header</th>
<th>skin_before_header</th>
<th>skin_footer</th>
<th>skin_login</th>
</tr>
<tr>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_after_header" target="_blank"><img src="img.php?filename=skin_after_header&amp;w=180&amp;h=180"></a></td>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_before_header" target="_blank"><img src="img.php?filename=skin_before_header&amp;w=180&amp;h=180"></a></td>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_footer" target="_blank"><img src="img.php?filename=skin_footer&amp;w=180&amp;h=180"></a></td>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_login" target="_blank"><img src="img.php?filename=skin_login&amp;w=180&amp;h=180"></a></td>
</tr>
<tr>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_after_header">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_before_header">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_footer">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_login">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
</tr>

<tr>
<th>skin_navi_h</th>
<th>skin_navi_f</th>
<th>skin_navi_c</th>
<td rowspan="3">&nbsp;</td>
</tr>
<tr>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_navi_h" target="_blank"><img src="img.php?filename=skin_navi_h&amp;w=180&amp;h=180"></a></td>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_navi_f" target="_blank"><img src="img.php?filename=skin_navi_f&amp;w=180&amp;h=180"></a></td>
<td style="text-align:center; vertical-align:middle;"><a href="img.php?filename=skin_navi_c" target="_blank"><img src="img.php?filename=skin_navi_c&amp;w=180&amp;h=180"></a></td>
</tr>
<tr>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_h">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_f">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_c">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
</tr>
</table>

<table>
<tr>
<th>no_image.gif</th>
<th>no_logo.gif</th>
<th>no_logo_small.gif</th>
</tr>
<tr>
<td style="text-align:center; vertical-align:middle;"><img src="img.php?filename=no_image.gif&amp;w=180&amp;h=180"></td>
<td style="text-align:center; vertical-align:middle;"><img src="img.php?filename=no_logo.gif&amp;w=180&amp;h=180"></td>
<td style="text-align:center; vertical-align:middle;"><img src="img.php?filename=no_logo_small.gif&amp;w=80&amp;h=80"></td>
</tr>
<tr>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_image.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_logo.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_logo_small.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="変更">
</form>
</td>
</tr>
</table>


<hr>

<h3><a name="color">色変更</a></h3>

<p class="caution">色の指定は16進数表記で行ってください。</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_sns_config','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">

<table style="float:left; margin: 0 5px;">
({foreach from=$border_names item=item})
<tr>
<th>({$item})</th>
<td>#<input type="text" name="({$item})" value="({$c_sns_config[$item]})" size="8" maxlength="6"></td>
</tr>
({/foreach})
</table>

<table style="float;left; margin: 0 5px;">
({foreach from=$bg_names item=item})
<tr>
<th>({$item})</th>
<td>#<input type="text" name="({$item})" value="({$c_sns_config[$item]})" size="8" maxlength="6"></td>
</tr>
({/foreach})
</table>

<div style="margin: 5px;"><input type="submit" class="submit" value="変更"></div>
</form>


<hr>

<h3><a name="css">カスタムCSS追加</a></h3>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_siteadmin_css','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">

<textarea name="body" cols="72" rows="20">({$inc_custom_css})</textarea>
<div style="margin: 5px;"><input type="submit" class="submit" value="変更"></div>
</form>

({$inc_footer|smarty:nodefaults})