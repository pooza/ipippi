({$inc_header|smarty:nodefaults})

<h2>��å���������</h2>

<p>���򤷤��桼���˥�å��������������ޤ��������ȥ����ʸ�����Ϥ��Ƥ���������</p>
<p class="caution">�����Υ�å������ϡ�ID1�֤Υ桼��������������ޤ���</p>

<div id="page_navi">
��������
<ul>
({foreach from=$c_member_list item=item})
<li><a href="page.php?p=f_home&amp;target_c_member_id=({$item.c_member_id})" target="_blank">({$item.nickname})</a></li>
({/foreach})
</ul>
</div>

<div style="float:left">
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('send_messages','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
({foreach from=$c_member_list item=item})
<input type="hidden" name="c_member_ids[]" value="({$item.c_member_id})">
({/foreach})
<dl>
<dt>�����ȥ�</dt>
<dd><input type="text" name="subject" size="50" value="({$requests.subject})"></dd>
<dt>��ʸ</dt>
<dd><textarea name="body" cols="50" rows="10">({$requests.body})</textarea></dd>
<dd><input type="submit" class="submit" value="��å���������"></dd>
</dl>
</form>
</div>

({$inc_footer|smarty:nodefaults})