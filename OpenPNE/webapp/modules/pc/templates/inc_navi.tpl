<div class="w_screen inc_navi">
({if    $INC_NAVI_type=="h" || $INC_NAVI_type=="self" })

<img src="img.php?filename=skin_navi_h" class="bg">
<div class="h">

<a class="h_home" href="./page.php?p=h_home" ><img src="./skin/dummy.gif" alt="ホーム"></a>
<a class="fh_friend_list" href="./page.php?p=fh_friend_list"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})リスト"></a>
<a class="fh_diary_list" href="./page.php?p=fh_diary_list"><img src="./skin/dummy.gif" alt="日記"></a>
<a class="h_message_box" href="./page.php?p=h_message_box"><img src="./skin/dummy.gif" alt="メッセージ"></a>
<a class="h_ashiato" href="./page.php?p=h_ashiato"><img src="./skin/dummy.gif" alt="あしあと"></a>
<a class="h_favorite" href="./page.php?p=h_bookmark_list"><img src="./skin/dummy.gif" alt="お気に入り"></a>
<a class="h_review" href="./page.php?p=fh_review_list_member"><img src="./skin/dummy.gif" alt="マイレビュー"></a>
<a class="h_prof" href="./page.php?p=h_prof"><img src="./skin/dummy.gif" alt="プロフィール確認"></a>
<a class="h_config_prof" href="./page.php?p=h_config_prof"><img src="./skin/dummy.gif" alt="プロフィール変更"></a>

</div>

({elseif $INC_NAVI_type=="f" || $INC_NAVI_type=="other"})

<img src="img.php?filename=skin_navi_f" class="bg">
<div class="f">

<a class="f_home" href="./page.php?p=f_home&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="ホーム"></a>
<a class="fh_friend_list" href="./page.php?p=fh_friend_list&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_FRIEND})リスト"></a>
<a class="fh_diary_list" href="./page.php?p=fh_diary_list&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="日記を読む"></a>
<a class="f_message_send" href="./page.php?p=f_message_send&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="メッセージを送る"></a>
<a class="f_bookmark_add" href="./page.php?p=f_bookmark_add&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="お気に入りに追加"></a>
<a class="fh_review_list_member" href="./page.php?p=fh_review_list_member&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="おすすめレビュー"></a>
<a class="f_invite" href="./page.php?p=f_invite&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})に紹介"></a>
<a class="fh_link_request" href="./page.php?p=f_link_request&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})に追加"></a>
<a class="f_intro_edit" href="./page.php?p=f_intro_edit&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="紹介文を編集"></a>

</div>

({elseif $INC_NAVI_type=="c"})

<img src="img.php?filename=skin_navi_c" class="bg">
<div class="c">

<a class="c_home" href="./page.php?p=c_home&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="コミュニティトップ"></a>
<a class="c_bbs" href="./page.php?p=c_topic_list&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="掲示板"></a>
<a href="page.php?p=c_member_review&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})" class="c_member_review"><img src="./skin/dummy.gif" alt="メンバーレビュー"></a>
<a class="c_join" href="./page.php?p=c_join_commu&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="コミュニティに参加"></a>
<a class="c_invite" href="./page.php?p=c_invite&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})に教える"></a>
<a class="c_leave" href="./page.php?p=c_leave_commu&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="コミュニティを退会"></a>

</div>

({/if})
</div>