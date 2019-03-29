({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">室社鹿屡偲耳者爵写酌鴫(({$count_member}))</font></center>
<hr>
({foreach from=$c_member_list item=c_member })
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})&({$tail})">({$c_member.nickname})</a>(({$c_member.friend_count}))<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu_id})&amp;page=({$page})&amp;direc=-1&amp;({$tail})">ﾁｰ､ﾘ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu_id})&amp;page=({$page})&amp;direc=1&amp;({$tail})">ｼ｡､ﾘ</a>({/if})

({/if})
<br>
<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu_id})&amp;({$tail})">室社鹿屡偲耳柴識捨釈</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">斜鴫紗</a>

({$inc_ktai_footer|smarty:nodefaults})