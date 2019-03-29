<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
   "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="Content-Style-Type" content="text/css">
<title>【管理】({$SNS_NAME})</title>
<link rel="stylesheet" href="modules/admin/admin.css" type="text/css">
</head>

<body>

<h1>({$SNS_NAME})管理ページ</h1>

({if $display_navi})
<div id="site_navi">
<p>管理メニュー</p>
<ol>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_member')})">メンバーリスト(メッセージ送信 / 強制退会)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})">お知らせ、利用規約変更、HTML挿入</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('send_invites')})">新規ユーザー招待メール送信</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_image')})">画像管理(画像一覧＆削除)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_sns_config')})">デザインスキン・色変更</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_banner')})">バナー管理</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_kakikomi')})">書き込み管理</a></li>
</ol>

({if $ADMIN_INIT_CONFIG})
<p>初期設定</p>
<ol>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_config')})">SNS設定変更</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_profile')})">プロフィール項目変更</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_category')})">コミュニティカテゴリ変更</a></li>
</ol>
({/if})

<p>
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_admin_password')})">管理用パスワード変更</a><br>
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('update_hash_table')})">管理用ページ名をランダム生成</a><br>
<a href="module_do.php?m=({$module_name})&amp;cmd=({$hash_tbl->hash('logout','do')})&amp;sessid=({$PHPSESSID})">ログアウト</a>
</p>
</div>
({/if})

<hr>