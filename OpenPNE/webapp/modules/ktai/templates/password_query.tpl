({$inc_ktai_header|smarty:nodefaults})

<center>({$SNS_NAME})パスワード再発行</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
({/if})
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="password_query">
携帯ﾒｰﾙｱﾄﾞﾚｽ<br>
<textarea name="ktai_address" rows="1" istyle="3" mode="alphabet" maxlength="100"></textarea><br>
秘密の質問<br>
<select name="c_password_query_id">
<option value="0">選択してください
({foreach from=$password_query_list key=key item=item})
<option value="({$key})">({$item})
({/foreach})
</select><br>
秘密の質問の答え<br>
<input type="text" name="password_query_answer" value=""><br>
<br>
<input type="submit" value="パスワード再発行"><br>
</form>

<hr>

<a href="ktai_normal.php?p=login">ログインページへ戻る</a>

({$inc_ktai_footer|smarty:nodefaults})