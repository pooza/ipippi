({$inc_header|smarty:nodefaults})

<h2>管理用ページ名をランダム生成</h2>

<p>管理ページのページ名を推測できないようにランダム文字列で置換します。</p>

<form action="module_do.php" method="post">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_hash_table','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="submit" class="submit" value="　実 行　">
</form>

<p>ページ名を元の状態に戻します。(デバッグ用)</p>

<form action="module_do.php" method="post">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_hash_table','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="submit" class="submit" value="　リセット　">
</form>

({$inc_footer|smarty:nodefaults})
