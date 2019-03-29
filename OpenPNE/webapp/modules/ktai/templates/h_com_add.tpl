({$inc_ktai_header|smarty:nodefaults})

<center>ｺﾐｭﾆﾃｨ作成</center>
<hr>
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="p" value="c_home">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_com_add_insert_c_commu">
ｶﾃｺﾞﾘ<br>
<select name="c_commu_category_id">
({foreach from=$c_commu_category_list item=c_commu_category})
<option value="({$c_commu_category.c_commu_category_id})">({$c_commu_category.name})
({/foreach})
</select><br>
ｺﾐｭﾆﾃｨ名<br>
<input type="text" name="name" value=""><br>
説明文<br>
<textarea name="info"></textarea><br>
参加・公開<br>
<input type="radio" name="public_flag" value="public" checked>誰でも参加可能、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_public">参加には管理人の承認が必要、掲示板は全員に公開<br>
<input type="radio" name="public_flag" value="auth_commu_member">参加には管理人の承認が必要、掲示板はｺﾐｭﾆﾃｨﾒﾝﾊﾞｰにのみ公開<br>
<input type="submit" value="送信">
</form>

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})