({$inc_header|smarty:nodefaults})

<script type="text/javascript">
<!--
function switchTextarea(position, enable) {
  if (position == "top") {
    document.form_top_banner.top_banner_html.disabled = !enable;
    if (enable)
      document.form_top_banner.top_banner_html.focus();
  } else {
    document.form_side_banner.side_banner_html.disabled = !enable;
    if (enable)
      document.form_side_banner.side_banner_html.focus();
  }
}
function disableTextarea() {}
function disableTextarea_top(){ switchTextarea("top", false); }
function disableTextarea_side(){ switchTextarea("side", false); }
function disableTextarea_top_side(){ switchTextarea("top", false);
                                     switchTextarea("side", false); }

window.onload = disableTextarea({if !$top_banner_html})_top({/if})({if !$side_banner_html})_side({/if})

//-->
</script>

<h2>バナー管理</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<p>★<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('insert_c_banner')})">バナー追加</a></p>

<h3>■トップバナー</h3>
<p>468 x 60 ピクセルの画像を設定してください。</p>

<form action="module_do.php" method="post" name="form_top_banner">
<table>
<tr>
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_top_banner_html','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input tabindex="1" type="radio" name="disp_type" value="img" onClick="switchTextarea('top', false);" onKeyPress="switchTextarea('top', false);"({if !$top_banner_html}) checked="checked"({/if})></td>
<td>

<h4>★<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('insert_c_banner')})">バナー画像を追加</a></h4>
({if $c_banner_top_list})
<table>
<tr>
<th colspan="2">操作</th>
<th>ID</th>
<th>画像</th>
<th>リンク先</th>
<th>表示位置</th>
<th>バナー名</th>
<th>表示設定</th>
</tr>
({foreach from=$c_banner_top_list item=item})
<tr>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('update_c_banner')})&amp;c_banner_id=({$item.c_banner_id})">変更</a></td>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_banner_confirm')})&amp;c_banner_id=({$item.c_banner_id})">削除</a></td>
<td class="idnumber">({$item.c_banner_id})</td>
<td><a href="img.php?filename=({$item.image_filename})" target="_blank"><img src="img.php?filename=({$item.image_filename})&amp;w=200&amp;h=200"></a></td>
<td>({$item.a_href})</td>
<td>({$item.type})</td>
<td>({$item.nickname})</td>
<td>({if !$item.is_hidden})表示する({else})表示しない({/if})</td>
</tr>
({/foreach})
</table>
({/if})

</td>
<td rowspan="2"><input tabindex="4" type="submit" class="submit" value="確定"></td>
</tr>
<tr>
<td><input tabindex="2" type="radio" name="disp_type" value="html" onClick="switchTextarea('top', true);" onKeyPress="switchTextarea('top', true);"({if $top_banner_html}) checked="checked"({/if})></td>
<td><h4>★任意HTMLで表示</h4>
<textarea tabindex="3" cols="72" rows="6" name="top_banner_html">({$top_banner_html})</textarea></td>
</tr>
</table>
</form>

({*
<h3>■サイドバナー</h3>

<form action="module_do.php" method="post" name="form_side_banner">
<table>
<tr>
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_side_banner_html','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input tabindex="5" type="radio" name="disp_type" value="img" onClick="switchTextarea('side', false);" onKeyPress="switchTextarea('side', false);"({if !$side_banner_html}) checked="checked"({/if})></td>
<td>

<h4>★<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('insert_c_banner')})">バナー画像を追加</a></h4>
({if $c_banner_side_list})
<table>
<tr>
<th colspan="2">操作</th>
<th>ID</th>
<th>画像</th>
<th>リンク先</th>
<th>表示位置</th>
<th>バナー名</th>
<th>表示設定</th>
</tr>
({foreach from=$c_banner_side_list item=item})
<tr>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('update_c_banner')})&amp;c_banner_id=({$item.c_banner_id})">変更</a></td>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_banner_confirm')})&amp;c_banner_id=({$item.c_banner_id})">削除</a></td>
<td class="idnumber">({$item.c_banner_id})</td>
<td><a href="img.php?filename=({$item.image_filename})" target="_blank"><img src="img.php?filename=({$item.image_filename})&amp;w=200&amp;h=200"></a></td>
<td>({$item.a_href})</td>
<td>({$item.type})</td>
<td>({$item.nickname})</td>
<td>({if !$item.is_hidden})表示する({else})表示しない({/if})</td>
</tr>
({/foreach})
</table>
({/if})

</td>
<td rowspan="2"><input tabindex="8" type="submit" class="submit" value="確定"></td>
</tr>
<tr>
<td><input tabindex="6" type="radio" name="disp_type" value="html" onClick="switchTextarea('side', true);" onKeyPress="switchTextarea('side', true);"({if $side_banner_html}) checked="checked"({/if})></td>
<td><h4>★任意HTMLで表示</h4>
<textarea tabindex="7" cols="72" rows="6" name="side_banner_html">({$side_banner_html})</textarea></td>
</tr>
</table>
</form>
*})

({$inc_footer|smarty:nodefaults})