({$inc_header|smarty:nodefaults})

<h2>画像削除</h2>

<p>本当に削除してもよろしいですか？</p>

<p><a href="img.php?filename=({$c_image.filename})" target="_blank"
><img src="img.php?filename=({$c_image.filename})&amp;w=120&amp;h=120"></a>
</p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_image4c_image_id','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_image_id" value="({$requests.target_c_image_id})">
<input type="submit" class="submit" value="削除">
</form>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})" onClick="history.back(); return false;" onKeyPress="history.back(); return false;">画像一覧にもどる</a></p>

({$inc_footer|smarty:nodefaults})
