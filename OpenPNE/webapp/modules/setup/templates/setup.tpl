<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=EUC-JP">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>({$smarty.const.SNS_NAME}) ���åȥ��å�</title>
<link rel="stylesheet" href="modules/admin/admin.css" type="text/css">
</head>

<body>

<div class="caution">
��ɬ������������򤷤Ƥ��饻�åȥ��å׼¹Ԥ��Ƥ���������
<ul class="caution">
<li>�ǡ����١����κ���</li>
<li>ver1.8_mysql_001_table_structure.sql �μ¹�</li>
<li>ver1.8_mysql_002_init_data.sql �μ¹�</li>
<li>config.inc ������</li>
</ul>
</div>

<p>����桼���Υ�������������򤷤ޤ���<br>
�ץ�ե�����䤽��¾��������ܤϥ����������ꤷ�Ƥ���������</p>

<p>�����ѥ�������Ȥϴ������̤ؤΥ������ѤǤ���<br>
����桼���Υѥ���ɤȤ��̤Τ�Τ����ꤷ�Ƥ���������</p>

({if $requests.msg})
<p class="caution">({$requests.msg})</p>
({/if})

<form action="module_do_normal.php">
<input type="hidden" name="m" value="setup">
<input type="hidden" name="cmd" value="setup">
<table>
<tr>
<th colspan="2">����桼��</th>
</tr>
<tr>
<th>PC���ɥ쥹</th>
<td><input type="text" name="pc_address" value="" size="30"></td>
</tr>
<tr>
<th>�ѥ����</th>
<td><input type="password" name="password" value="" size="15"></td>
</tr>

<tr>
<th colspan="2">�����ѥ��������</th>
</tr>
<tr>
<th>�桼��̾</th>
<td><input type="text" name="admin_username" value="" size="20"></td>
</tr>
<tr>
<th>�ѥ����</th>
<td><input type="password" name="admin_password" value="" size="15"></td>
</tr>

<tr>
<th>&nbsp;</th>
<td><input type="submit" value="���åȥ��å׼¹�"></td>
</tr>
</table>
</form>

</body>
</html>