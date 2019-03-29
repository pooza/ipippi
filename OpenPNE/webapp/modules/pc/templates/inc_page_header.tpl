({* before_login / after_login *})
<div class="w_screen inc_page_header ({$before_after})_login">

({* skin_before_header / skin_after_header *})
({* bg_before / bg_after *})
<img src="img.php?filename=skin_({$before_after})_header" class="bg_({$before_after})">

({if $top_banner_html})
<div class="banner">
({$top_banner_html|smarty:nodefaults})
</div>
({elseif $INC_PAGE_HEADER.c_banner_id})
<div class="banner">
({strip})
({if $INC_PAGE_HEADER.a_href})
	({if $before_after == "before"})
	<a href="do_normal.php?cmd=inc_click_top_banner&amp;target_c_banner_id=({$INC_PAGE_HEADER.c_banner_id})" target="_blank">
	({else})
	<a href="do.php?cmd=inc_click_top_banner&amp;target_c_banner_id=({$INC_PAGE_HEADER.c_banner_id})&amp;sessid=({$PHPSESSID})" target="_blank">
	({/if})
		<img src="img.php?filename=({$INC_PAGE_HEADER.image_filename})">
	</a>
({else})
	<img src="img.php?filename=({$INC_PAGE_HEADER.image_filename})">
({/if})
({/strip})
</div>
({/if})

({if $before_after == "before"})
<a class="logo_home" href="({$login_url})"><img src="./skin/dummy.gif" alt="({$smarty.const.SNS_NAME})"></a>
({else})
<a class="logo_home" href="./page.php?p=h_home"><img src="./skin/dummy.gif" alt="({$smarty.const.SNS_NAME})"></a>

<a class="main_menu h_home" href="./page.php?p=h_home"><img src="./skin/dummy.gif" alt="マイホーム"></a>
<a class="main_menu h_invite" href="./page.php?p=h_invite"><img src="./skin/dummy.gif" alt="({$smarty.const.WORD_FRIEND})を招待する"></a>
<a class="main_menu h_diary_list_all" href="./page.php?p=h_diary_list_all"><img src="./skin/dummy.gif" alt="新着日記一覧"></a>
<a class="main_menu h_ranking" href="./page.php?p=h_zyunban0621"><img src="./skin/dummy.gif" alt="ランキング"></a>
<a class="main_menu h_config" href="./page.php?p=h_config"><img src="./skin/dummy.gif" alt="設定変更"></a>
<a class="main_menu logout" href="./do.php?cmd=inc_page_header_logout&amp;sessid=({$PHPSESSID})"><img src="./skin/dummy.gif" alt="ログアウト"></a>

<a class="search_menu h_search" href="./page.php?p=h_search"><img src="./skin/dummy.gif" alt="メンバー検索"></a>
<a class="search_menu h_com_find_all" href="./page.php?p=h_com_find_all"><img src="./skin/dummy.gif" alt="コミュニティ"></a>
<a class="search_menu h_review_search" href="./page.php?p=h_review_search"><img src="./skin/dummy.gif" alt="レビュー"></a>
({/if})

<a class="patentsalon" href="http://www.patentsalon.com/" target="_blank"><img src="./skin/dummy.gif" alt="パテントサロン"></a>

</div>