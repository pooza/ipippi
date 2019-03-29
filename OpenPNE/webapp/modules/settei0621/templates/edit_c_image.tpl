({$inc_header|smarty:nodefaults})

<h2>画像管理</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<h3>画像一覧</h3>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})">画像一覧へ</a></p>

<h3>画像をデータベースに登録</h3>

<p class="caution">※同じファイル名で既に登録されている画像がある場合、上書きされます。</p>

<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_image','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<dl>
<dt>ファイル名：</dd>
<dd><input type="text" name="filename" value="" size="30"></dd>
<dt>画像：</dt>
<dd><input type="file" name="upfile"></dd>
<dd><input type="submit" class="submit" value="登録"></dd>
</dl>
</form>

<h3>データベース内の画像を表示</h3>

<form action="module_page.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('edit_c_image')})">
<dl>
<dt>ファイル名：</dt>
<dd><input type="text" name="filename" value="({$requests.filename})" size="30"></dd>
<dt>表示サイズ(実際より小さい場合は縮小されます)</dt>
<dd>幅:<input type="text" name="w" value="({$requests.w})" size="4">px&nbsp;
高さ:<input type="text" name="h" value="({$requests.h})" size="4">px</dd>
<dd><input type="submit" class="submit" value="表示"></dd>
</dl>
</form>

<p class="caution">※ファイル名にはユーザページのソースにある<br>
「img.php?filename=****&h=180&w=180」の****の部分を入力してください。</p>

({if $requests.filename})

({if $is_image})
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_image','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="({$requests.filename})">
<img src="img.php?filename=({$requests.filename})&amp;w=({$requests.w})&amp;h=({$requests.h})"><br>
<input type="submit" class="submit" value="この画像を削除する">
</form>
({else})
<em>({$requests.filename})</em> は登録されていません。
({/if})

({/if})

({$inc_footer|smarty:nodefaults})