<div class="w_screen inc_navi">
({if    $INC_NAVI_type=="h" || $INC_NAVI_type=="self" })

<img src="img.php?filename=skin_navi_h" class="bg">
<div class="h">

<a class="h_home" href="./page.php?p=h_home" ><img src="./skin/dummy.gif" alt="�ۡ���"></a>
<a class="fh_friend_list" href="./page.php?p=fh_friend_list"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})�ꥹ��"></a>
<a class="fh_diary_list" href="./page.php?p=fh_diary_list"><img src="./skin/dummy.gif" alt="����"></a>
<a class="h_message_box" href="./page.php?p=h_message_box"><img src="./skin/dummy.gif" alt="��å�����"></a>
<a class="h_ashiato" href="./page.php?p=h_ashiato"><img src="./skin/dummy.gif" alt="��������"></a>
<a class="h_favorite" href="./page.php?p=h_bookmark_list"><img src="./skin/dummy.gif" alt="����������"></a>
<a class="h_review" href="./page.php?p=fh_review_list_member"><img src="./skin/dummy.gif" alt="�ޥ���ӥ塼"></a>
<a class="h_prof" href="./page.php?p=h_prof"><img src="./skin/dummy.gif" alt="�ץ�ե������ǧ"></a>
<a class="h_config_prof" href="./page.php?p=h_config_prof"><img src="./skin/dummy.gif" alt="�ץ�ե������ѹ�"></a>

</div>

({elseif $INC_NAVI_type=="f" || $INC_NAVI_type=="other"})

<img src="img.php?filename=skin_navi_f" class="bg">
<div class="f">

<a class="f_home" href="./page.php?p=f_home&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="�ۡ���"></a>
<a class="fh_friend_list" href="./page.php?p=fh_friend_list&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_FRIEND})�ꥹ��"></a>
<a class="fh_diary_list" href="./page.php?p=fh_diary_list&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="�������ɤ�"></a>
<a class="f_message_send" href="./page.php?p=f_message_send&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="��å�����������"></a>
<a class="f_bookmark_add" href="./page.php?p=f_bookmark_add&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="������������ɲ�"></a>
<a class="fh_review_list_member" href="./page.php?p=fh_review_list_member&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="���������ӥ塼"></a>
<a class="f_invite" href="./page.php?p=f_invite&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})�˾Ҳ�"></a>
<a class="fh_link_request" href="./page.php?p=f_link_request&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})���ɲ�"></a>
<a class="f_intro_edit" href="./page.php?p=f_intro_edit&amp;target_c_member_id=({$INC_NAVI_c_member_id_friend})"><img src="./skin/dummy.gif" alt="�Ҳ�ʸ���Խ�"></a>

</div>

({elseif $INC_NAVI_type=="c"})

<img src="img.php?filename=skin_navi_c" class="bg">
<div class="c">

<a class="c_home" href="./page.php?p=c_home&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="���ߥ�˥ƥ��ȥå�"></a>
<a class="c_bbs" href="./page.php?p=c_topic_list&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="�Ǽ���"></a>
<a href="page.php?p=c_member_review&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})" class="c_member_review"><img src="./skin/dummy.gif" alt="���С���ӥ塼"></a>
<a class="c_join" href="./page.php?p=c_join_commu&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="���ߥ�˥ƥ��˻���"></a>
<a class="c_invite" href="./page.php?p=c_invite&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="({$WORD_MY_FRIEND})�˶�����"></a>
<a class="c_leave" href="./page.php?p=c_leave_commu&amp;target_c_commu_id=({$INC_NAVI_c_commu_id})"><img src="./skin/dummy.gif" alt="���ߥ�˥ƥ������"></a>

</div>

({/if})
</div>