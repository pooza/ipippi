({$inc_ktai_header|smarty:nodefaults})

承認待ちリスト<br>
<hr>
({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

[({$WORD_FRIEND_HALF})ﾘﾝｸ承認待ち]<br>
({if $anatani_c_friend_confirm_list})
({foreach from=$anatani_c_friend_confirm_list item=anatani_c_friend_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anatani_c_friend_confirm.c_member_id_from})&amp;({$tail})">({$anatani_c_friend_confirm.nickname})</a><br>
ﾒｯｾｰｼﾞ<br>
({$anatani_c_friend_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_insert_c_friend&target_c_friend_confirm_id=({$anatani_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">承認</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_friend_confirm&target_c_friend_confirm_id=({$anatani_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">拒否</a>]<br>
<br>
({/foreach})
({/if})

[ｺﾐｭﾆﾃｨ参加承認待ち]<br>
({if $anatani_c_commu_member_confirm_list})
({foreach from=$anatani_c_commu_member_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
ﾒｯｾｰｼﾞ<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_insert_c_commu_member&target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;({$tail})">承認</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_member_confirm&target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;({$tail})">拒否</a>]<br>
<br>
({/foreach})
({/if})

[ｺﾐｭﾆﾃｨ管理者交代承認待ち]<br>
({if $anatani_c_commu_admin_confirm_list})
({foreach from=$anatani_c_commu_admin_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
ﾒｯｾｰｼﾞ<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_update_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">承認</a>]
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">拒否</a>]<br>
<br>
({/foreach})
({/if})

[({$WORD_FRIEND_HALF})ﾘﾝｸ要請中]<br>
({if $anataga_c_friend_confirm_list})
({foreach from=$anataga_c_friend_confirm_list item=anataga_c_friend_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anataga_c_friend_confirm.c_member_id_to})&amp;({$tail})">({$anataga_c_friend_confirm.nickname})</a><br>
ﾒｯｾｰｼﾞ<br>
({$anataga_c_friend_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_friend_confirm&target_c_friend_confirm_id=({$anataga_c_friend_confirm.c_friend_confirm_id})&amp;({$tail})">依頼削除</a>]<br>
<br>
({/foreach})
({/if})

[ｺﾐｭﾆﾃｨ要請中]<br>
({if $anataga_c_commu_member_confirm_list})
({foreach from=$anataga_c_commu_member_confirm_list item=anataga_c_commu_member_confirm})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$anataga_c_commu_member_confirm.c_member_id_admin})&amp;({$tail})">({$anataga_c_commu_member_confirm.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$anataga_c_commu_member_confirm.c_commu_id})&amp;({$tail})">({$anataga_c_commu_member_confirm.c_commu_name})</a><br>
ﾒｯｾｰｼﾞ<br>
({$anataga_c_commu_member_confirm.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_member_confirm&target_c_commu_member_confirm_id=({$anataga_c_commu_member_confirm.c_commu_member_confirm_id})&amp;({$tail})">依頼削除</a>]<br><br>
({/foreach})
({/if})

[ｺﾐｭﾆﾃｨ管理者交代要請中]<br>
({if $anataga_c_commu_admin_confirm_list})
({foreach from=$anataga_c_commu_admin_confirm_list item=item})
<a href="ktai_page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})&amp;({$tail})">({$item.nickname})</a><br>
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.c_commu_name})</a><br>
ﾒｯｾｰｼﾞ<br>
({$item.message|nl2br})<br>
[<a href="do_ktai.php?cmd=h_confirm_list_delete_c_commu_admin_confirm&target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;({$tail})">依頼削除</a>]<br>
<br>
({/foreach})
({/if})

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})