({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">ｺﾐｭﾆﾃｨﾒﾝﾊﾞｰ(({$count_member}))</font></center>
<hr>
({foreach from=$c_member_list item=c_member })
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})&({$tail})">({$c_member.nickname})</a>(({$c_member.friend_count}))<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu_id})&amp;page=({$page})&amp;direc=-1&amp;({$tail})">前へ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=c_member_list&amp;target_c_commu_id=({$c_commu_id})&amp;page=({$page})&amp;direc=1&amp;({$tail})">次へ</a>({/if})

({/if})
<br>
<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu_id})&amp;({$tail})">ｺﾐｭﾆﾃｨﾄｯﾌﾟ</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})