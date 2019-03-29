({$inc_ktai_header|smarty:nodefaults})

ｺﾐｭﾆﾃｨ<br>
<hr>
最新書き込み<br>
({foreach from=$c_commu_list_lastupdated item=item})
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$item.c_commu_id})&amp;({$tail})">({$item.name})</a><br>
({/foreach})
<hr>
ｺﾐｭﾆﾃｨ名で探す
<form action="ktai_page.php" method="get">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="p" value="h_com_find_result">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="text" name="search_word" class="text">
<br>
<select name="target_c_commu_category_id">
<option value="all">すべてのｶﾃｺﾞﾘ
({foreach from=$c_commu_category_list item=item})
<option value="({$item.c_commu_category_id})">({$item.name})
({/foreach})
</select>
<br>
<input type="submit" value="検索">
</form>
<hr>
カテゴリ別<br>

({foreach from=$c_commu_category_parent_list item=ccpl})
<hr>
【({$ccpl.name})】<br>

({foreach from=$c_commu_category_list item=cccl})

({if $ccpl.c_commu_category_parent_id == $cccl.c_commu_category_parent_id })

({$cccl.icon})<a href="ktai_page.php?p=h_com_category&amp;target_c_commu_category_id=({$cccl.c_commu_category_id})&amp;({$tail})">({$cccl.name})</a><br>

({/if})

({/foreach})
<br>
({/foreach})

<hr>
<a href="ktai_page.php?p=h_com_add&amp;({$tail})">ｺﾐｭﾆﾃｨ作成</a>

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})