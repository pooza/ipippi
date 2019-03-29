({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">ｺﾐｭﾆﾃｨ：({$c_commu.name})</font></center>
<hr>

■トピックリスト<br>
<br>
({foreach from=$c_topic_list item=item})
<a href="ktai_page.php?p=c_bbs&amp;target_c_commu_topic_id=({$item.c_commu_topic_id})&amp;({$tail})">({$item.name})</a>(({$item.write_num}))<br>
({/foreach})

({* pager *})
({if $is_prev || $is_next})
<br>
({if $is_prev})
<a href="ktai_page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;page=({$page})&amp;direc=-1&amp;({$tail})">前へ</a>
({/if})
({if $is_next})
<a href="ktai_page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;page=({$page})&amp;direc=1&amp;({$tail})">次へ</a>
({/if})
({/if})

<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">ｺﾐｭﾆﾃｨに戻る</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})