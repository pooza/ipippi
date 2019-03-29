({$inc_ktai_header|smarty:nodefaults})

<center>プロフィール写真設定</center>
<hr>
({if $c_member.image_filename})
現在の写真:[<a href="img.php?filename=({$c_member.image_filename})&amp;f=jpg">大</a>]<br>
<img src="img.php?filename=({$c_member.image_filename})&amp;w=120&amp;h=120&amp;f=jpg"><br>
[<a href="do_ktai.php?cmd=h_config_image_delete_image&amp;({$tail})">削除</a>]<br>
({else})
現在、プロフィール写真は登録されていません。<br>
({/if})
<br>
以下のアドレスに写真を添付して送信してください。<br>
<a href="mailto:({$mail_address})">メール送信</a><br>
<br>
<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})