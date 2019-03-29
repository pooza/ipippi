({$inc_ktai_header|smarty:nodefaults})

<center>PCアドレス登録</center>
<hr>
以下の欄にPCメールアドレスを入力してください<br>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_pc_send_insert_c_pc_address_pre">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
PCﾒｰﾙｱﾄﾞﾚｽ<br>
<input type="text" name="pc_address" istyle="3" mode="alphabet" maxlength="100"><br>
<input type="submit" value="送信"><br>
</form>

<br>
届いたメールに記載してあるURLにアクセスして、パスワードを入力すると登録が完了します。

<hr>
<a href="ktai_page.php?p=h_config&amp;({$tail})">設定変更</a><br>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})