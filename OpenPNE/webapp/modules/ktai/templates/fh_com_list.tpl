({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">参加コミュニティリスト(({$count_commus}))</font></center>
<hr>

({foreach from=$c_commu_list item=c_commu})
<a href="ktai_page.php?p=c_home&target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">({$c_commu.name})</a>(({$c_commu.count_members}))<br>
({/foreach})
<br>
({if $is_prev || $is_next})

({if $is_prev})<a href="ktai_page.php?p=fh_com_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;page=({$page-1})&amp;({$tail})">前へ</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=fh_com_list&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;page=({$page+1})&amp;({$tail})">次へ</a>({/if})

({/if})
<hr>
({if $INC_NAVI_type=="f"})
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$target_c_member.c_member_id})&amp;({$tail})">({$target_c_member.nickname})さんのﾄｯﾌﾟ</a><br>
({/if})
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})