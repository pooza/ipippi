({$inc_html_header|smarty:nodefaults})
<body>
({ext_include file="inc_extension_pagelayout_top.tpl"})
<table class="mainframe" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="container inc_page_header">
({$inc_page_header|smarty:nodefaults})
</td>
</tr>
<tr>
<td class="container inc_navi">
({$inc_navi|smarty:nodefaults})
</td>
</tr>
<tr>
<td class="container main_content">
<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ******************************** -->
<!-- ******ここから：最新日記検索****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：最新日記検索＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">新着日記検索</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:562px;margin:0px auto;">
({*********})
<tr>
<td style="width:562px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:560px;" class="bg_02" align="left" valign="middle">
<div style="padding:6px;">

<!-- ここから：主内容＞＞カテゴリ・検索 -->

<form action="page.php" method="get">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="p" value="h_diary_list_all">

キーワード&nbsp;<img src="./skin/icon_arrow_2.gif" class="icon">
<input name="keyword" size="15" value="({$keyword})">

<input type="submit" value=" 検 索 ">

<img src="./skin/dummy.gif" class="v_spacer_m">

※タイトル、本文より検索を行います。スペースで区切ると複数キーワードでの検索ができます。

</form>

<!-- ここまで：主内容＞＞カテゴリ・検索 -->

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：最新日記検索＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：最新日記検索****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({* if $c_diary_search_list_count *})
<!-- ******************************** -->
<!-- ******ここから：新着日記一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：新着日記一覧＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06">
<span class="c_00">
({if $keyword})
<span class="b_b">新着日記({if $keyword})検索結果({/if})一覧</span>&nbsp;&nbsp;***&nbsp;

({if $c_diary_search_list_count})
	({$c_diary_search_list_count})
({else})
	0
({/if})

件&nbsp;が該当しました。
({else})
<span class="b_b">新着日記一覧</span>
({/if})
</span>
</td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->

<!-- ここから：主内容＞＞新着日記一覧件数表示タブ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})
<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=-1">前を表示</a>&nbsp;&nbsp;
({/if})
({if $c_diary_search_list_count})
({$pager.start})件～({$pager.end})件を表示
({/if})
({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=1">次を表示</a>
({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞新着日記一覧件数表示タブ -->
({* /if *})
<!-- ここから：主内容＞＞新着日記一覧本体 -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ここから：主内容＞＞新着日記一覧本体＞＞のループ部分 -->
({foreach from=$new_diary_list item=diary})
<div class="border_01 bg_09" style="width:562px;margin:0px auto;" align="center">
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="middle" rowspan="7">

<div class="padding_s">

<a href="page.php?p=fh_diary&target_c_diary_id=({$diary.c_diary_id})"><img src="img.php?filename=({if $diary.c_member.image_filename})({$diary.c_member.image_filename})({else})no_image.gif({/if})&w=76&h=76"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="left" valign="middle">

<div class="padding_s">

名&nbsp;&nbsp;前

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$diary.c_member.nickname})
({if $diary.c_member.profile.sex.value}) (({$diary.c_member.profile.sex.value}))({/if})
({if $diary.image_filename_1 || $diary.image_filename_2 || $diary.image_filename_3}) <img src="./skin/icon_camera.gif" class="icon">({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:457px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

タイトル

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$diary.subject})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="height:1px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

本&nbsp;&nbsp;文

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$diary.body|t_truncate:80:"…"})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="height:1px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

作成日時

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" valign="middle">

<table border="0" cellspacing="0" cellpadding="0" style="width:371px;">
<tr>
<td style="width:119px;" class="bg_02" align="left">

<div class="padding_s">

({$diary.r_datetime|date_format:"%m月%d日 %H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:251px;" class="bg_03" align="center">

<div class="padding_s">

<a href="page.php?p=fh_diary&target_c_diary_id=({$diary.c_diary_id})"><img src="./skin/btn/shousai.gif" class="icon"></a>

</div>

</td>
</tr>
</table>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>

<img src="./skin/dummy.gif" class="v_spacer_l">
({/foreach})
<!-- ここまで：主内容＞＞新着日記一覧本体＞＞のループ部分 -->

</div>
<!-- ここまで：＞＞新着日記一覧本体 -->

<!-- ここから：主内容＞＞新着日記一覧件数表示タブ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})
<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=-1">前を表示</a>&nbsp;&nbsp;
({/if})
({if $c_diary_search_list_count})
({$pager.start})件～({$pager.end})件を表示
({/if})
({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=1">次を表示</a>
({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞新着日記一覧件数表示タブ -->

<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：新着日記一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：新着日記一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">
({** /if **})


<a name="recent_blog_entries">
({if $c_rss_cache_list})
<!-- ******************************** -->
<!-- ******ここから：最新BLOG一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：最新BLOG一覧＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06">
<span class="c_00">
({if $keyword})
<span class="b_b">新着BLOG({if $keyword})検索結果({/if})一覧</span>&nbsp;&nbsp;***&nbsp;({$c_diary_search_list_count})件&nbsp;が該当しました。
({else})
<span class="b_b">新着BLOG一覧</span>
({/if})
</span>
</td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
({if $keyword})
<!-- ここから：主内容＞＞最新BLOG一覧件数表示タブ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})
<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=-1">前を表示</a>&nbsp;&nbsp;
({/if})
({$pager.start})件～({$pager.end})件を表示
({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_all&amp;keyword=({$keyword|escape:"url"})&amp;page=({$page})&amp;direc=1">次を表示</a>
({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞最新BLOG一覧件数表示タブ -->
({/if})
<!-- ここから：主内容＞＞最新BLOG一覧本体 -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ここから：主内容＞＞最新BLOG一覧本体＞＞のループ部分 -->
<div class="border_01 bg_09" style="width:562px;margin:0px auto;" align="center">
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_rss_cache_list item=item})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:180px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">({$item.r_datetime|date_format:"%Y年%m月%d日 %H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:367px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="({$item.link})" target="_blank">({$item.subject})</a> (({$item.c_member.nickname}))

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>
<!-- ここまで：主内容＞＞最新BLOG一覧本体＞＞のループ部分 -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- ここまで：＞＞最新BLOG一覧本体 -->
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：最新BLOG一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：最新BLOG一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">
({/if})

({***************************})
({**ここまで：メインコンテンツ**})
({***************************})
</td>
</tr>
</table>({*END:container*})
</td>
</tr>
<tr>
<td class="container inc_page_footer">
({$inc_page_footer|smarty:nodefaults})
</td>
</tr>
</table>
({ext_include file="inc_extension_pagelayout_bottom.tpl"})
</body>
</html>
