({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">ﾒｯｾｰｼﾞを送る</font></center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_message_send_insert_message">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_member_id" value="({$target_member.c_member_id})">
<font color=red>({if $msg})({$msg})<br>({/if})</font>
送信先<br>
<SELECT name="target_c_member_id">
({foreach from=$c_friend_list item=c_friend})
<OPTION value="({$c_friend.c_member_id_to})">({$c_friend.nickname})</a> 
({/foreach})
</SELECT>
<br>
ﾀｲﾄﾙ<br>
<input type="text" name="subject"><br> 
本文<br>
<textarea name="body"></textarea><br>
<input type="submit" value="送信">
</form>
送信先の選択肢はランダムとなっています。送りたいﾒﾝﾊﾞｰがﾘｽﾄに表示されなかった場合、
<a href="ktai_page.php?p=h_message_send&amp;({$tail})">ここ</a>を押して画面を更新してください
<hr>

<a href="ktai_page.php?p=h_message_box&amp;({$tail})">ﾒｯｾｰｼﾞﾎﾞｯｸｽ</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})