({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">({$target_c_member.nickname})さんにﾒｯｾｰｼﾞを送る</font></center>
<hr>
<font color=red>({if $msg})({$msg})<br>({/if})</font>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="f_message_send_insert_c_message">
<input type="hidden" name="c_member_id_to" value="({$target_c_member.c_member_id})">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
ﾀｲﾄﾙ<br>
<input type="text" name="subject"><br>
本文<br>
<textarea name="body"></textarea><br>
<input type="submit" value="送信">
</form>
<hr>
<a href="ktai_page.php?p=f_home&target_c_member_id=({$target_c_member.c_member_id})&({$tail})">({$target_c_member.nickname})さんのﾄｯﾌﾟ</a><br>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})