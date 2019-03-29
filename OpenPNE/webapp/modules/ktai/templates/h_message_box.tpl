({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">ﾒｯｾｰｼﾞBOX</font></center>
<hr>
<a href="ktai_page.php?p=h_message_send&({$tail})">ﾒｯｾｰｼﾞを書く</a><br>
<br>
[受信ﾒｯｾｰｼﾞ（({$count_messages_received})）]<br>
({if $count_messages_received})
({foreach from=$c_message_received_list item=c_message_received})
<tr>
({$c_message_received.r_datetime|date_format:"%Y/%m/%d"})-({$c_message_received.nickname|default:"&nbsp;"})さん<br>
<a href="ktai_page.php?p=h_message&target_c_message_id=({$c_message_received.c_message_id})&({$tail})">({$c_message_received.subject|default:"&nbsp;"})</a><br>
({/foreach})
({else})
ﾒｯｾｰｼﾞはありません
({/if})
<br>
({if $is_prev_r || $is_next_r})
<br>
({if $is_prev_r})<a href="ktai_page.php?p=h_message_box&amp;page_r=({$page_r-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next_r})<a href="ktai_page.php?p=h_message_box&amp;page_r=({$page_r+1})&amp;({$tail})">次へ</a>({/if})
<br>
({/if})


<br>
[送信済ﾒｯｾｰｼﾞ（({$count_messages_sent})）]<br>
({if $count_messages_sent})
({foreach from=$c_message_sent_list item=c_message_sent})
({$c_message_sent.r_datetime|date_format:"%Y/%m/%d"})-({$c_message_sent.nickname|default:"&nbsp;"})さん<br>
<a href="ktai_page.php?p=h_message&target_c_message_id=({$c_message_sent.c_message_id})&({$tail})">({$c_message_sent.subject|default:"&nbsp;"})</a><br>
({/foreach})
({else})
ﾒｯｾｰｼﾞはありません
({/if})
<br>
({if $is_prev_s || $is_next_s})
<br>
({if $is_prev_s})<a href="ktai_page.php?p=h_message_box&amp;page_s=({$page_s-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next_s})<a href="ktai_page.php?p=h_message_box&amp;page_s=({$page_s+1})&amp;({$tail})">次へ</a>({/if})
<br>
({/if})

<br>
<a href="ktai_page.php?p=h_message_send&({$tail})">ﾒｯｾｰｼﾞを書く</a><br>
<hr>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})