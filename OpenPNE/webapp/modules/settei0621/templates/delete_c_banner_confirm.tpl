({$inc_header|smarty:nodefaults})

<h2>バナー削除</h2>

<p>本当に削除してもよろしいですか？</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_banner','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_banner_id" value="({$requests.c_banner_id})">
<input type="submit" class="submit" value="削除">
</form>

({$inc_footer|smarty:nodefaults})
