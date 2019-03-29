({$inc_ktai_header|smarty:nodefaults})

<center>退会手続き</center>
<hr>
本当に退会してもよろしいですか？<br>
<br>
退会する場合は、確認のためパスワードを入力してください。<br>
({if $msg})<font color="red">({$msg})</font><br>({/if})

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_taikai">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
パスワード<br>
<input type="text" name="password" istyle="3" mode="alphabet" maxlength="12"><br>
<input type="submit" value="退会する"><br>
</form>

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">設定変更</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})