({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">({$target_c_member.nickname})さんのﾎｰﾑ</font></center>
<hr>
({if $c_siteadmin})
({$c_siteadmin|smarty:nodefaults})
<hr>
({/if})
({if $target_c_member.image_filename})
<a href="img.php?filename=({$target_c_member.image_filename})&w=120&h=120&amp;f=jpg">写真を見る</a><br>
<br>
({/if})

({if $relation.wait==1})
現在、({$WORD_FRIEND_HALF})承認待ちです<br>
<br>
({/if})

({if $target_c_member.text4})
My News(({$target_c_member.text5|date_format:"%m/%d %H:%M"}))<br>
({$target_c_member.text4|nl2br})<br>
<br>
({/if})

<a href="ktai_page.php?p=f_message_send&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">ﾒｯｾｰｼﾞを送る</a><br>
<br>

({if $relation.friend==0})
({if $relation.wait==0})
<a href="ktai_page.php?p=f_link_request&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">({$WORD_MY_FRIEND_HALF})に加える</a><br>
<br>
({/if})
({/if})

({if $relation.friend||$target_c_member.public_flag_diary=="public"})
日記<br>
({foreach from=$c_diary_list item=c_diary})
({$c_diary.r_date|date_format:"%Y/%m/%d"})-<a href="ktai_page.php?p=fh_diary&target_c_diary_id=({$c_diary.c_diary_id})&({$tail})">({$c_diary.subject})</a>(({$c_diary.count_comment}))<br>
({/foreach})
<a href="ktai_page.php?p=fh_diary_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">→もっと読む</a><br>
<br>
({/if})
({$WORD_FRIEND_HALF})ﾘｽﾄ<br>
({foreach from=$c_friend_list item=c_friend})
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_friend.c_member_id_to})&amp;({$tail})">({$c_friend.nickname})</a>(({$c_friend.count_friend}))<br>
({/foreach})
<a href="ktai_page.php?p=fh_friend_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">→すべて表示</a><br>
<br>
参加ｺﾐｭﾆﾃｨ<br>
({foreach from=$c_commu_list item=c_commu})
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">({$c_commu.name})</a>(({$c_commu.count_members}))<br>
({/foreach})
<a href="ktai_page.php?p=fh_com_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">→すべて表示</a><br>
<br>
[ﾌﾟﾛﾌｨｰﾙ]<br>
({strip})
({capture name="nick"})
ﾆｯｸﾈｰﾑ：({$target_c_member.nickname})<br>
({/capture})

({foreach from=$target_c_member.profile key=key item=item})

({if !$_cnt_nick && $profile_list[$key].sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})

({if !$_cnt_birth && $profile_list[$key].sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})

({if $item.value})
({$item.caption})：

({if $item.form_type == 'textarea'})
	<br>({$item.value|nl2br})
({elseif $item.form_type == 'checkbox'})
	({$item.value|@t_implode:", "})
({else})
	({$item.value})
({/if})
<br>
({/if})
({/foreach})

({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})

({/strip})

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})