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
<p style="margin-top:0">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('list_c_member')})">
メールアドレス検索(完全一致)：
<input type="text" name="mail_address" value="({$requests.mail_address})" size="30">
<input type="submit" class="submit" value="検索">
</p>
</form>

({if $pager})
<form action="module_page.php" method="get">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('list_c_member')})">
表示件数：
<select name="page_size">
<option value="10"({if $pager.page_size==10}) selected="selected"({/if})>10件</option>
<option value="20"({if $pager.page_size==20}) selected="selected"({/if})>20件</option>
<option value="50"({if $pager.page_size==50}) selected="selected"({/if})>50件</option>
<option value="100"({if $pager.page_size==100}) selected="selected"({/if})>100件</option>
</select>
<input type="submit" class="submit" value="変更">
<div class="caution">※表示件数を多くすると処理が重くなり、サーバーに負荷がかかります。</div>
</form>
({/if})

({if $pager})
<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) 人中 ({$pager.start_num}) - ({$pager.end_num})人目を表示しています
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">前へ</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">次へ</a>
({/if})
</div>
<!-- pager_end -->
({/if})

<form action="module_page.php" method="post" name="formSendMessages">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('send_messages')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<table style="font-size:small">

({capture name="table_header"})
<tr>
<th colspan="3">操作</th>
<th>ID</th>
<th>ニックネーム</th>
<th>最終ログイン</th>
<th>登録日</th>
<th>招待者</th>
<th colspan="3">画像</th>
<th colspan="3">生年月日</th>
({foreach from=$c_profile_list item=prof})
<th>({$prof.caption})</th>
({/foreach})
<th>ID</th>
<th>PCアドレス</th>
<th>携帯アドレス</th>
<th>登録時アドレス</th>
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
<td>({if $item.c_member_id != 1})<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_member_confirm')})&amp;target_c_member_id=({$item.c_member_id})">強制退会</a>({else})&nbsp;({/if})</td>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('passwd')})&amp;target_c_member_id=({$item.c_member_id})">パスワード再発行</a></td>
<td class="idnumber">({$item.c_member_id})</td>
<td><a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id})" target="_blank">({$item.nickname})</a></td>
<td>({if $item.r_date != '0000-00-00 00:00:00'})({$item.access_date|date_format:"%y-%m-%d %H:%M"})({else})&nbsp;({/if})</td>
<td>({if $item.r_date != '0000-00-00 00:00:00'})({$item.r_date|date_format:"%y-%m-%d"})({else})&nbsp;({/if})</td>
<td>({if $item.c_member_id_invite})({$item.c_member_id_invite}):<a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id_invite})" target="_blank">({$item.c_member_invite.nickname})</a>({else})&nbsp;({/if})</td>
<td>({if $item.image_filename_1})<a href="img.php?filename=({$item.image_filename_1})" target="_blank">●</a>({else})×({/if})</td>
<td>({if $item.image_filename_2})<a href="img.php?filename=({$item.image_filename_2})" target="_blank">●</a>({else})×({/if})</td>
<td>({if $item.image_filename_3})<a href="img.php?filename=({$item.image_filename_3})" target="_blank">●</a>({else})×({/if})</td>
<td class="number">({if $item.birth_year})({$item.birth_year})年({else})&nbsp;({/if})</td>
<td class="number">({if $item.birth_month})({$item.birth_month})月({else})&nbsp;({/if})</td>
<td class="number">({if $item.birth_day})({$item.birth_day})日({else})&nbsp;({/if})</td>
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
<a href="#" onClick="return checkAll();" onKeyPress="return checkAll();">全てをチェック</a> / <a href="#" onClick="return clearAll();" onKeyPress="return clearAll();">全てのチェックをはずす</a>
</p>
チェックしたメンバーに対して、<br>
<input type="submit" class="submit" value="メッセージを送信する">
</form>

({if $pager})
<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) 人中 ({$pager.start_num}) - ({$pager.end_num})人目を表示しています
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">前へ</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">次へ</a>
({/if})
</div>
<!-- pager_end -->
({/if})

<div class="caution">※パスワード、秘密の質問の答えは不可逆な暗号化を施してデータベースへ保存しているため、元の文字列を知ることができません。</div>

({$inc_footer|smarty:nodefaults})