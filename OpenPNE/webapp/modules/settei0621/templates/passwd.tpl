({$inc_header|smarty:nodefaults})

<h2>パスワード再発行</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<p><a href="page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})" target="_blank">({$c_member.nickname})さん</a>のパスワードを変更します。</p>

<ul>
<li class="caution">パスワードは8～40文字の半角英数で入力してください。</li>
<li class="caution">パスワード変更ボタンを押すと、ユーザに新しいパスワードの書かれたメールが送信されます。</li>
</ul>

<table>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<tr>
<th>
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('passwd','do')})">
<input type="hidden" name="target_c_member_id" value="({$c_member.c_member_id})">
新しいパスワード</td>
<td><input type="password" name="password" size="40"></td>
</tr>
<tr>
<th>新しいパスワード(確認)</th>
<td><input type="password" name="password2" size="40"></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="パスワード変更"></td>
</tr>
</form>
</table>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})" onClick="history.back(); return false;" onKeyPress="history.back(); return false;">前のページにもどる</a></p>

({$inc_footer|smarty:nodefaults})
