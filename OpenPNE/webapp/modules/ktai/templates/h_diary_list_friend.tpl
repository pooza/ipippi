({$inc_ktai_header|smarty:nodefaults})

({$WORD_FRIEND_HALF})最新日記<br>
<hr>

({foreach from=$h_diary_list_friend item=each_diary})
({$each_diary.r_datetime|date_format:"%m/%d"})(({$each_diary.c_member.nickname|t_truncate:17:""}))<br>
<a href="ktai_page.php?p=fh_diary&amp;target_c_diary_id=({$each_diary.c_diary_id})&amp;({$tail})">({$each_diary.subject})</a>(({$each_diary.count_comments}))
<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=h_diary_list_friend&amp;page=({$page-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=h_diary_list_friend&amp;page=({$page+1})&amp;({$tail})">次へ</a>({/if})

({/if})
<br>
<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})
