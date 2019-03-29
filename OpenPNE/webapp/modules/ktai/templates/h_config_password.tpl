({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">パスワード変更</font></center>
<hr>
◆パスワードの変更<br>
<br>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})
現在のパスワードと新しいパスワードを入力してください。<br>
<br>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_config_password_update_password">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
現在のパスワード：<br>
<input type="text" name="old_password" istyle="3" mode="alphabet" maxlength="12"><br>
新しいパスワード：<br>
<input type="text" name="new_password" istyle="3" mode="alphabet" maxlength="12"><br>
<input type="submit" value="変更"><br>
</form>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">設定変更</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})