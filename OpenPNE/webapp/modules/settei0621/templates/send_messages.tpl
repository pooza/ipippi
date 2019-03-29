({$inc_header|smarty:nodefaults})

<h2>メッセージ送信</h2>

<p>選択したユーザにメッセージを送信します。タイトルと本文を入力してください。</p>
<p class="caution">※このメッセージは、ID1番のユーザから送信されます。</p>

<div id="page_navi">
◆送信先
<ul>
({foreach from=$c_member_list item=item})
<li><a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id})" target="_blank">({$item.nickname})</a></li>
({/foreach})
</ul>
</div>

<div style="float:left">
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('send_messages','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
({foreach from=$c_member_list item=item})
<input type="hidden" name="c_member_ids[]" value="({$item.c_member_id})">
({/foreach})
<dl>
<dt>タイトル</dt>
<dd><input type="text" name="subject" size="50" value="({$requests.subject})"></dd>
<dt>本文</dt>
<dd><textarea name="body" cols="50" rows="10">({$requests.body})</textarea></dd>
<dd><input type="submit" class="submit" value="メッセージ送信"></dd>
</dl>
</form>
</div>

({$inc_footer|smarty:nodefaults})