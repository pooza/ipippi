({$inc_ktai_header|smarty:nodefaults})

メッセージBOX<br>
<hr>

({$c_message.r_date|date_format:"%Y/%m/%d %H:%M"})<br>
({if $c_message.c_member_id_to==$u})<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_message.c_member_id_from})&amp;({$tail})">({$c_message.c_member_nickname_from})</a>
({else})({$c_message.c_member_nickname_from})
({/if})
＞＞
({if $c_message.c_member_id_to==$u})({$c_message.c_member_nickname_to})
({else})<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_message.c_member_id_to})&amp;({$tail})">({$c_message.c_member_nickname_to})</a>
({/if})
<br>
<br>
({$c_message.subject})<br>
<br>
({$c_message.body|nl2br})
({if $com_url})<a href="({$com_url})">ｺﾐｭﾆﾃｨﾍﾟｰｼﾞ</a>({/if})
({if $friend_url})<a href="({$friend_url})">({$WORD_FRIEND_HALF})のﾍﾟｰｼﾞ</a>({/if})
<br>
({if $c_message.is_syoudaku})
<a href="./ktai_page.php?p=h_confirm_list&amp;({$tail})">承認待ちﾘｽﾄ</a><br>
({/if})
({if $c_message.c_member_id_to==$u})
<hr>
■返信を書く<br>
<form action="do_ktai.php" method="POST">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_message_insert_message">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="c_message_id" value="({$c_message.c_message_id})">
<input type="hidden" name="target_c_member_id" value="({$c_message.c_member_id_from})">
<font color=red>({if $msg})({$msg})<br>({/if})</font>
ﾀｲﾄﾙ:<br>
<input type="text" name="subject" value="Re:({$c_message.subject})" size="14"><br>
本文:<br>
<textarea cols="14" rows="6" name="body"></textarea><br>
<br>
<input type="submit" value="送信">
</form>
({/if})
<hr>
<a href="ktai_page.php?p=h_message_box&amp;({$tail})">ﾒｯｾｰｼﾞﾎﾞｯｸｽ</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})