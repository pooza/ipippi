({$inc_header|smarty:nodefaults})

<h2>�ǥ����󥹥��󡦿��ѹ�</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<ul>
<li><a href="#skin">����������ѹ�</a></li>
<li><a href="#color">���ѹ�</a></li>
<li><a href="#css">��������CSS�ɲ�</a></li>
</ul>


<hr>

<h3><a name="skin">����������ѹ�</a></h3>

<p class="caution">�������ѹ�����Ƥ��Ƥ�֥饦����Ǥϰ����Υ���å��������ɽ������Ƥ��ޤ����Ȥ�����ޤ���<br>
���ξ��Ϥ��Υڡ�������ɤ߹��ߤ��Ƴ�ǧ���Ƥ���������</p>

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
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_after_header">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_before_header">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_footer">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_login">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
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
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_h">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_f">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="skin_navi_c">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
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
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_image.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_logo.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
<td>
<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_image_skin','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="no_logo_small.gif">
<input type="file" name="upfile">
<input type="submit" class="submit" value="�ѹ�">
</form>
</td>
</tr>
</table>


<hr>

<h3><a name="color">���ѹ�</a></h3>

<p class="caution">���λ����16�ʿ�ɽ���ǹԤäƤ���������</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
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

<div style="margin: 5px;"><input type="submit" class="submit" value="�ѹ�"></div>
</form>


<hr>

<h3><a name="css">��������CSS�ɲ�</a></h3>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_siteadmin_css','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">

<textarea name="body" cols="72" rows="20">({$inc_custom_css})</textarea>
<div style="margin: 5px;"><input type="submit" class="submit" value="�ѹ�"></div>
</form>

({$inc_footer|smarty:nodefaults})