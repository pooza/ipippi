({$inc_header|smarty:nodefaults})

<div id="page_navi">
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=h_home">��PC�ǡ� h_home�Τ��Τ餻</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_h_home">�ڷ��ӡ� h_home�Τ��Τ餻</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_fh_diary">�ڷ��ӡ� fh_diary�Τ��Τ餻</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_f_home">�ڷ��ӡ� f_home�Τ��Τ餻</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_c_home">�ڷ��ӡ� c_home�Τ��Τ餻</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=sns_kiyaku">���ѵ���</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=sns_privacy">�ץ饤�Х����ݥꥷ��</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_footer_before">���������եå���</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_footer_after">�������եå���</a></li>
</ul>

<h2>PC�����ڡ�������</h2>
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_html_head">HTML����(HTML head��)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_top">HTML����(�ڡ�������)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_bottom">HTML����(�ڡ�������)</a></li>
</ul>

<h2>���������ڡ�������</h2>
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_html_head">HTML����(HTML head��)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_header">HTML����(�ڡ�������)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_footer">HTML����(�ڡ�������)</a></li>
</ul>
</div>

<div id="page_body">

({if $requests.target == 'h_home'})
��У��ǡ�ۡ���Τ��Τ餻
({elseif $requests.target == 'k_h_home'})
������ǡ�ۡ���Τ��Τ餻
({elseif $requests.target == 'k_fh_diary'})
������ǡ������ڡ����Τ��Τ餻
({elseif $requests.target == 'k_f_home'})
������ǡ�ե��ɥڡ����Τ��Τ餻
({elseif $requests.target == 'k_c_home'})
������ǡ䥳�ߥ�˥ƥ��ڡ����Τ��Τ餻
({elseif $requests.target == 'sns_kiyaku'})
���ѵ���
({elseif $requests.target == 'sns_privacy'})
�ץ饤�Х����ݥꥷ��
({elseif $requests.target == 'inc_html_head'})
��PC�ǡ�HTML����(HTML head��)
({elseif $requests.target == 'inc_page_top'})
��PC�ǡ�HTML����(�ڡ�������)
({elseif $requests.target == 'inc_page_bottom'})
��PC�ǡ�HTML����(�ڡ�������)
({elseif $requests.target == 'inc_ktai_html_head'})
�ڷ��ӡ�HTML����(HTML head��)
({elseif $requests.target == 'inc_ktai_header'})
�ڷ��ӡ�HTML����(�ڡ�������)
({elseif $requests.target == 'inc_ktai_footer'})
�ڷ��ӡ�HTML����(�ڡ�������)
({/if})

({if $msg})
<div class="caution">({$msg})</div>
({/if})

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('edit_c_admin_info','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="target" value="({$requests.target})">
<textarea name="body" cols="({$cols|default:60})" rows="({$rows|default:10})">({$c_siteadmin.body})</textarea><br>
<input type="submit" class="submit" value="�ѹ�">
</form>

({if $requests.target == 'sns_kiyaku' || $requests.target == 'sns_privacy'})
<p class="caution">��HTML�����ϻ���<strong>�Ǥ��ޤ���</strong>����URL�ϥ�󥯤���ޤ���</p>
<p><a href="normal.php?p=({$requests.target})" target="_blank">({$requests.target})</a>
({else})
<p class="caution">��HTML���������ѤǤ��ޤ������������Ĥ�˺����������ޤ���ɽ���������ʤɤ����꤬�����뤳�Ȥ�����ޤ��ΤǤ���դ���������</p>
({/if})

</div>

({$inc_footer|smarty:nodefaults})