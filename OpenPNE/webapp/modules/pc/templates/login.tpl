({$inc_html_header|smarty:nodefaults})
<body>
({ext_include file="inc_extension_pagelayout_top.tpl"})
<div id="container_login"><div class="w_screen">
<img src="img.php?filename=skin_login" class="bg">
<a class="patentsalon" href="http://www.patentsalon.com/" target="_blank"><img src="./skin/dummy.gif" alt="パテントサロン"></a>
({if $top_banner_html})
<div class="banner">
({$top_banner_html|smarty:nodefaults})
</div>
({elseif $INC_PAGE_HEADER.c_banner_id})
<div class="banner">
({strip})
({if $INC_PAGE_HEADER.a_href})
	<a href="do_normal.php?cmd=inc_click_top_banner&amp;target_c_banner_id=({$INC_PAGE_HEADER.c_banner_id})" target="_blank">
		<img src="img.php?filename=({$INC_PAGE_HEADER.image_filename})">
	</a>
({else})
	<img src="img.php?filename=({$INC_PAGE_HEADER.image_filename})">
({/if})
({/strip})
</div>
({/if})

<form action="do_normal.php" method="post" name="login" id="login">
<input name="cmd" type="hidden" value="login">
<input class="text" tabindex="1" name="username" id="username" type="text">
<input class="text" tabindex="2" name="password" id="password" type="password">
<input type="image" tabindex="3" name="submit" src="./skin/dummy.gif" border="0" id="button_login" alt="ログイン">
</form>

({if !$IS_CLOSED_SNS && (($smarty.const.OPENPNE_REGIST_FROM) & ($smarty.const.OPENPNE_REGIST_FROM_PC))})
<a href="./normal.php?p=public_invite" id="button_new_regist"><img src="./skin/dummy.gif" alt="新規登録"></a>
({/if})

<div class="msg lh_130">
<span class="password_query"><a href="./normal.php?p=password_query">&gt;パスワードを忘れた方はこちらへ</a></span>
</div>

<div class="footer">

({$inc_page_footer|smarty:nodefaults})

</div>

</div></div>

({ext_include file="inc_extension_pagelayout_bottom.tpl"})
</body>
</html>
