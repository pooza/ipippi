({$inc_ktai_header|smarty:nodefaults})

ｺﾐｭﾆﾃｨ最新書き込み<br>
<hr>

({foreach from=$h_com_comment_list item=each_topic})
({$each_topic.r_datetime|date_format:"%m/%d"})(({$each_topic.c_commu_name|t_truncate:17:""}))<br>
<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$each_topic.c_commu_topic_id})&amp;({$tail})">({$each_topic.c_commu_topic_name})</a>(({$each_topic.number}))
<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=h_com_comment_list&amp;page=({$page-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=h_com_comment_list&amp;page=({$page+1})&amp;({$tail})">次へ</a>({/if})

({/if})
<br>
<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})
