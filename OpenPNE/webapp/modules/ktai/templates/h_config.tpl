({$inc_ktai_header|smarty:nodefaults})

<center>設定変更</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

以下の変更にはパスワードの入力が必要です。<br>
<br>
◆<a href="ktai_page.php?p=h_config_mail&amp;({$tail})">携帯メールアドレス変更</a><br>
({if $smarty.const.OPENPNE_ENABLE_PC})
◆<a href="ktai_page.php?p=h_pc_send&amp;({$tail})">PCメールアドレス登録</a><br>
({/if})
<br>
◆<a href="ktai_page.php?p=h_config_password&amp;({$tail})">パスワード変更</a><br>
◆<a href="ktai_page.php?p=h_config_password_query&amp;({$tail})">秘密の質問答え設定</a><br>
◆<a href="ktai_page.php?p=h_config_easy_login&amp;({$tail})">かんたんログイン設定</a><br>
<br>
◇<a href="ktai_page.php?p=h_taikai_confirm&amp;({$tail})">退会手続き</a><br>

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})