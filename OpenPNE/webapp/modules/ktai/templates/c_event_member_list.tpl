({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">���Ў��ƎÎ��Ҏݎʎގ�(({$count_member}))</font></center>
<hr>
({foreach from=$c_event_member_list item=c_member })
<a href="ktai_page.php?p=f_home&amp;target_c_member_id=({$c_member.c_member_id})&({$tail})">({$c_member.nickname})</a><br>
({/foreach})

({if $is_prev || $is_next})
<br>
({if $is_prev})<a href="ktai_page.php?p=c_event_member_list&amp;target_c_commu_topic_id=({$c_commu_topic_id})&amp;page=({$page})&amp;direc=-1&amp;({$tail})">����</a> ({/if})
({if $is_next})<a href="ktai_page.php?p=c_event_member_list&amp;target_c_commu_topic_id=({$c_commu_topic_id})&amp;page=({$page})&amp;direc=1&amp;({$tail})">����</a>({/if})

({/if})
<br>
<hr>
<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$c_commu_topic_id})&amp;({$tail})">���͎ގݎĎĎ��̎�</a><br>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu_id})&amp;({$tail})">���Ў��ƎÎ��Ď��̎�</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

</body>
</html>
