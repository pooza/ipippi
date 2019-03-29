<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>({$smarty.const.SNS_NAME}) セットアップ</title>
<link rel="stylesheet" href="modules/admin/admin.css" type="text/css">
</head>

<body>

<div class="caution">
※必ず下記の設定をしてからセットアップ実行してください。
<ul class="caution">
<li>データベースの作成</li>
<li>ver1.8_mysql_001_table_structure.sql の実行</li>
<li>ver1.8_mysql_002_init_data.sql の実行</li>
<li>config.inc の設定</li>
</ul>
</div>

<p>初期ユーザのログイン情報の設定をします。<br>
プロフィールやその他の設定項目はログイン後に設定してください。</p>

<p>管理用アカウントは管理画面へのログイン用です。<br>
初期ユーザのパスワードとは別のものを設定してください。</p>

({if $requests.msg})
<p class="caution">({$requests.msg})</p>
({/if})

<form action="module_do_normal.php">
<input type="hidden" name="m" value="setup">
<input type="hidden" name="cmd" value="setup">
<table>
<tr>
<th colspan="2">初期ユーザ</th>
</tr>
<tr>
<th>PCアドレス</th>
<td><input type="text" name="pc_address" value="" size="30"></td>
</tr>
<tr>
<th>パスワード</th>
<td><input type="password" name="password" value="" size="15"></td>
</tr>

<tr>
<th colspan="2">管理用アカウント</th>
</tr>
<tr>
<th>ユーザ名</th>
<td><input type="text" name="admin_username" value="" size="20"></td>
</tr>
<tr>
<th>パスワード</th>
<td><input type="password" name="admin_password" value="" size="15"></td>
</tr>

<tr>
<th>&nbsp;</th>
<td><input type="submit" value="セットアップ実行"></td>
</tr>
</table>
</form>

</body>
</html>