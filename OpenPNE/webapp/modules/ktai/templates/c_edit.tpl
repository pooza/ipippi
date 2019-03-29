({$inc_ktai_header|smarty:nodefaults})

<center>ｺﾐｭﾆﾃｨ編集</center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">
<input type="hidden" name="cmd" value="c_edit_update_c_commu">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
ｶﾃｺﾞﾘ<br>
<select name="c_commu_category_id">
({foreach from=$c_commu_category_list item=c_commu_category})
<option value="({$c_commu_category.c_commu_category_id})">({$c_commu_category.name})
({/foreach})
</select><br>
ｺﾐｭﾆﾃｨ名<br>
<input type="text" name="name" value="({$c_commu.name})"><br>
説明文<br>
<textarea name="info">({$c_commu.info})</textarea><br>
参加・公開<br>
<input type="radio" name="public_flag" value="public"({if $c_commu.public_flag=='public'}) checked({/if})>誰でも参加可能、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_public"({if $c_commu.public_flag=='auth_public'}) checked({/if})>参加には管理人の承認が必要、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_commu_member"({if $c_commu.public_flag=='auth_commu_member'}) checked({/if})>参加には管理人の承認が必要、掲示板はｺﾐｭﾆﾃｨﾒﾝﾊﾞｰにのみ公開<br>
<input type="submit" value="編集">
</form>

<hr>
<a href="ktai_page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})&amp;({$tail})">ｺﾐｭﾆﾃｨﾄｯﾌﾟに戻る</a><br>

({$inc_ktai_footer|smarty:nodefaults})