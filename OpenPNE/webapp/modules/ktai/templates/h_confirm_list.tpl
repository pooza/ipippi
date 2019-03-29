({$inc_ktai_header|smarty:nodefaults})

¾µÇ§ÂÔ¤Á¥ê¥¹¥È<br>
<hr>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

[({$WORD_FRIEND_HALF})Øİ¸¾µÇ§ÂÔ¤Á]<br>
({if $anatani_c_friend_confirm_list})
({foreach from=$anatani_c_friend_confirm_list item=anatani_c_friend_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anatani_c_friend_confirm.c_member_id_from})&amp;({$tail})">({$anatani_c_friend_confirm.nickname})</a><br>
Ò¯¾°¼Ş<br>
({$anatani_c_friend_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_insert_c_friend&target_c_friend_confirm_id=({$anatani_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">¾µÇ§</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_friend_confirm&target_c_friend_confirm_id=({$anatani_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">µñÈİ</a>]<br>
<br>
({/foreach})
({/if})

[ºĞ­ÆÃ¨»²²Ã¾µÇ§ÂÔ¤Á]<br>
({if $anatani_c_commu_member_confirm_list})
({foreach from=$anatani_c_commu_member_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
Ò¯¾°¼Ş<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_insert_c_commu_member&target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;({$tail})">¾µÇ§</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_member_confirm&target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;({$tail})">µñÈİ</a>]<br>
<br>
({/foreach})
({/if})

[ºĞ­ÆÃ¨´ÉÍı¼Ô¸òÂå¾µÇ§ÂÔ¤Á]<br>
({if $anatani_c_commu_admin_confirm_list})
({foreach from=$anatani_c_commu_admin_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
Ò¯¾°¼Ş<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_update_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">¾µÇ§</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">µñÈİ</a>]<br>
<br>
({/foreach})
({/if})

[({$WORD_FRIEND_HALF})Øİ¸Í×ÀÁÃæ]<br>
({if $anataga_c_friend_confirm_list})
({foreach from=$anataga_c_friend_confirm_list item=anataga_c_friend_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anataga_c_friend_confirm.c_member_id_to})&amp;({$tail})">({$anataga_c_friend_confirm.nickname})</a><br>
Ò¯¾°¼Ş<br>
({$anataga_c_friend_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_friend_confirm&target_c_friend_confirm_id=({$anataga_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">°ÍÍêºï½ü</a>]<br>
<br>
({/foreach})
({/if})

[ºĞ­ÆÃ¨Í×ÀÁÃæ]<br>
({if $anataga_c_commu_member_confirm_list})
({foreach from=$anataga_c_commu_member_confirm_list item=anataga_c_commu_member_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anataga_c_commu_member_confirm.c_member_id_admin})&amp;({$tail})">({$anataga_c_commu_member_confirm.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$anataga_c_commu_member_confirm.c_commu_id})&amp;({$tail})">({$anataga_c_commu_member_confirm.c_commu_name})</a><br>
Ò¯¾°¼Ş<br>
({$anataga_c_commu_member_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_member_confirm&target_c_commu_member_confirm_id=({$anataga_c_commu_member_confirm.c_commu_member_confirm_id})&amp;({$tail})">°ÍÍêºï½ü</a>]<br><br>
({/foreach})
({/if})

[ºĞ­ÆÃ¨´ÉÍı¼Ô¸òÂåÍ×ÀÁÃæ]<br>
({if $anataga_c_commu_admin_confirm_list})
({foreach from=$anataga_c_commu_admin_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
Ò¯¾°¼Ş<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">°ÍÍêºï½ü</a>]<br>
<br>
({/foreach})
({/if})

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">Î°Ñ</a>

({$inc_ktai_footer|smarty:nodefaults})