<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>�ڴ�����({$SNS_NAME})</title>
<link rel="stylesheet" href="modules/admin/admin.css" type="text/css">
</head>

<body>

<h1>({$SNS_NAME})�����ڡ���</h1>

({if $display_navi})
<div id="site_navi">
<p>������˥塼</p>
<ol>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})">���С��ꥹ��(��å��������� / �������)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})">���Τ餻�����ѵ����ѹ���HTML����</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('send_invites')})">�����桼�������ԥ᡼������</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_image')})">��������(�������������)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_sns_config')})">�ǥ����󥹥��󡦿��ѹ�</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_banner')})">�Хʡ�����</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_kakikomi')})">�񤭹��ߴ���</a></li>
</ol>

({if $ADMIN_INIT_CONFIG})
<p>�������</p>
<ol>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_config')})">SNS�����ѹ�</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_profile')})">�ץ�ե���������ѹ�</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_category')})">���ߥ�˥ƥ����ƥ����ѹ�</a></li>
</ol>
({/if})

<p>
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_admin_password')})">�����ѥѥ�����ѹ�</a><br>
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('update_hash_table')})">�����ѥڡ���̾�����������</a><br>
<a href="module_do.php?m=({$module_name})&amp;cmd=({$hash_tbl->hash('logout','do')})&amp;sessid=({$PHPSESSID})">��������</a>
</p>
</div>
({/if})

<hr>