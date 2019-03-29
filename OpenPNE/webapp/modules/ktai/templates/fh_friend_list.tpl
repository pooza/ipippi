({$inc_ktai_header|smarty:nodefaults})

({$target_c_member.nickname}) さんの({$WORD_FRIEND_HALF})一覧<br>
<hr>

({foreach from=$target_friend_list item=target_friend})
<!--*VV matrix_L VV*-->
<a href="./ktai_page.php?p=f_home&target_c_member_id=({$target_friend.c_member_id})&amp;({$tail})">({$target_friend.nickname})</a>(({$target_friend.friend_count}))
<br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=fh_friend_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;page=({$page-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=fh_friend_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;page=({$page+1})&amp;({$tail})">次へ</a>({/if})

({/if})
<br>
<hr>
({if $INC_NAVI_type=="f"})
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">({$target_c_member.nickname})さんのﾄｯﾌﾟ</a><br>
({/if})
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})