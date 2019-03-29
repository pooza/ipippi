({$inc_ktai_header|smarty:nodefaults})

<center>メールアドレス登録</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

パスワードを入力してください。<br>
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="update_ktai_address">
<input type="hidden" name="ses" value="({$ses})">
携帯ﾒｰﾙｱﾄﾞﾚｽ<br>
({$pre.ktai_address})<br>
ﾊﾟｽﾜｰﾄﾞ<br>
<input name="password" type="text" istyle="3" mode="alphabet" value=""><br>
<input name="submit" value="送信" type="submit"><br>
</form>

<hr>

({$inc_ktai_footer|smarty:nodefaults})