({$inc_ktai_header|smarty:nodefaults})

日記記入履歴<br>
<hr>

({foreach from=$c_diary_my_comment_list item=each_diary})
({$each_diary.r_datetime|date_format:"%m/%d"})(({$each_diary.nickname|t_truncate:17:""}))<br>
<a href="./ktai_page.php?p=fh_diary&amp;target_c_diary_id=({$each_diary.c_diary_id})&amp;({$tail})">({$each_diary.subject})</a>(({$each_diary.num_comment}))
<br>
({/foreach})


<br>
<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})
