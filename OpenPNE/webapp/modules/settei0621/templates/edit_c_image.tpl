({$inc_header|smarty:nodefaults})

<h2>��������</h2>

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<h3>��������</h3>

<p><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})">����������</a></p>

<h3>������ǡ����١�������Ͽ</h3>

<p class="caution">��Ʊ���ե�����̾�Ǵ�����Ͽ����Ƥ�������������硢��񤭤���ޤ���</p>

<form action="module_do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_image','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<dl>
<dt>�ե�����̾��</dd>
<dd><input type="text" name="filename" value="" size="30"></dd>
<dt>������</dt>
<dd><input type="file" name="upfile"></dd>
<dd><input type="submit" class="submit" value="��Ͽ"></dd>
</dl>
</form>

<h3>�ǡ����١�����β�����ɽ��</h3>

<form action="module_page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('edit_c_image')})">
<dl>
<dt>�ե�����̾��</dt>
<dd><input type="text" name="filename" value="({$requests.filename})" size="30"></dd>
<dt>ɽ��������(�ºݤ�꾮�������Ͻ̾�����ޤ�)</dt>
<dd>��:<input type="text" name="w" value="({$requests.w})" size="4">px&nbsp;
�⤵:<input type="text" name="h" value="({$requests.h})" size="4">px</dd>
<dd><input type="submit" class="submit" value="ɽ��"></dd>
</dl>
</form>

<p class="caution">���ե�����̾�ˤϥ桼���ڡ����Υ������ˤ���<br>
��img.php?filename=****&h=180&w=180�פ�****����ʬ�����Ϥ��Ƥ���������</p>

({if $requests.filename})

({if $is_image})
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_image','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="filename" value="({$requests.filename})">
<img src="img.php?filename=({$requests.filename})&amp;w=({$requests.w})&amp;h=({$requests.h})"><br>
<input type="submit" class="submit" value="���β�����������">
</form>
({else})
<em>({$requests.filename})</em> ����Ͽ����Ƥ��ޤ���
({/if})

({/if})

({$inc_footer|smarty:nodefaults})