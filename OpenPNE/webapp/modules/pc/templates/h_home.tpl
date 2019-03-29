({$inc_html_header|smarty:nodefaults})
<body>
({ext_include file="inc_extension_pagelayout_top.tpl"})
<table class="mainframe" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="container inc_page_header">
({$inc_page_header|smarty:nodefaults})
</td>
</tr>
({if $inc_entry_point[1]})
<tr>
<td class="container">
({$inc_entry_point[1]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container inc_navi">
({$inc_navi|smarty:nodefaults})
</td>
</tr>
({if $inc_entry_point[2]})
<tr>
<td class="container">
({$inc_entry_point[2]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container inc_search_box">
({ext_include file="inc_search_box.tpl"})
</td>
</tr>
<tr>
<td class="container inc_info">
({ext_include file="inc_info.tpl"})
</td>
</tr>
({if $inc_entry_point[3]})
<tr>
<td class="container">
({$inc_entry_point[3]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container main_content">
<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="left_content" valign="top">
({********************************})
({**ここから：メインコンテンツ（左）**})
({********************************})

({if $inc_entry_point[4]})
({$inc_entry_point[4]|smarty:nodefaults})
({/if})

<!-- **************************************** -->
<!-- ******ここから：自分の写真及びニックネーム覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:254px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:254px;height:7px;" class="dummy"></td>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center" class="bg_01">
<!-- *ここから：自分の写真及びニックネーム覧＞＞内容* -->
({*ここから：header*})
<!-- 無し -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：写真 -->
<div class="border_07 bg_02" align="center">

<table border="0" cellspacing="0" cellpadding="0" style="width:254px;">
<tr>
<td align="center">

<img src="./skin/dummy.gif" class="v_spacer_m">

<img src="./img.php?filename=({if $c_member.image_filename})({$c_member.image_filename})&w=180&h=180({else})no_image.gif&w=180&h=180({/if})" class="pict" alt="写真" style="margin:2px">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<a href="page.php?p=h_config_image">
<img src="./skin/button_edit_photo.gif"></a>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
<tr>
<td>
<a href="page.php?p=h_prof">
<img src="./skin/button_prof_conf.gif"></a>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
</table>

</td>
</tr>
</table>

</div>
<!-- ここまで：写真 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- ここから：自分のニックネーム -->
<table border="0" cellspacing="0" cellpadding="0" style="width:256px;">
<tr>
<td align="center" class="bg_05">
<img src="./skin/dummy.gif" class="v_spacer_m">
({$c_member.nickname})さん (({$c_friend_count}))
</td>
</tr>
</table>
<!-- ここまで：自分のニックネーム -->
({*ここから：footer*})
<!-- *ここまで：自分の写真及びニックネーム覧＞＞内容* -->
</td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：自分の写真及びニックネーム覧****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[5]})
({$inc_entry_point[5]|smarty:nodefaults})
({/if})

<!-- ********************************** -->
<!-- ******ここから：友人・知人一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td>
<!-- *ここから：友人・知人一覧＞＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px" class="border_07">
<tr>
<td style="width:25px;" class="bg_06"><img src="./skin/icon_title_1.gif" style="width:25px;height:19px;" class="dummy"></td>
<td style="width:241px;" class="bg_06"><span class="b_b c_00">({$WORD_MY_FRIEND})リスト</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_friend_list[0]})
({*１行目img*})
<tr>

({t_loop from=$c_friend_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({*１行目name*})
<tr>

({t_loop from=$c_friend_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_friend_list[3]})
<!-- ２行目img -->
<tr>

({t_loop from=$c_friend_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ２行目name -->
<tr>

({t_loop from=$c_friend_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_friend_list[6]})
<!-- ３行目img -->
<tr>

({t_loop from=$c_friend_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})
</tr>

<!-- ３行目name -->
<tr>

({t_loop from=$c_friend_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})

({/t_loop})

</tr>

({/if})

</table>

<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- ここから：小メニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">
<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_friend_list">全てを見る(({$c_friend_count})人)</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_invite">({$WORD_FRIEND})を招待する</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_search">メンバー検索</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_manage_friend">({$WORD_MY_FRIEND})管理</a>
</td>
<td style="width:15px;"><img src="./skin/dummy.gif" style="width:15px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:268px;" class="bg_07" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- ここまで：小メニュー -->
({*ここまで：footer*})
<!-- *ここまで：友人・知人一覧＞＞内容* -->
</td>
</tr>
</table>
<!-- ******ここまで：友人・知人一覧****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[6]})
({$inc_entry_point[6]|smarty:nodefaults})
({/if})

<!-- ************************************ -->
<!-- ******ここから：コミュニティ一覧****** -->
({if $c_commu_user_list})
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin;margin:0px auto;" class="border_07">
<tr>
<td>
<!-- *ここから：コミュニティ一覧＞＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px" class="border_07">
<tr>
<td style="width:25px;" class="bg_06"><img src="./skin/icon_title_1.gif" style="width:25px;height:19px;" class="dummy"></td>
<td style="width:241px;" class="bg_06"><span class="b_b c_00">コミュニティリスト</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_commu_user_list[0]})
({*１行目img*})
<tr>

({t_loop from=$c_commu_user_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({*１行目name*})
<tr>

({t_loop from=$c_commu_user_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_user_list[3]})
<!-- ２行目img -->
<tr>

({t_loop from=$c_commu_user_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ２行目name -->
<tr>

({t_loop from=$c_commu_user_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_user_list[6]})
<!-- ３行目img -->
<tr>

({t_loop from=$c_commu_user_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ３行目name -->
<tr>

({t_loop from=$c_commu_user_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

</table>

<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- ここから：小メニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">

<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_com_list">全てを見る(({$fh_com_count_user}))</a>
</td>
<td style="width:15px;"><img src="./skin/dummy.gif" style="width:15px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

<tr>
<td style="width:268px;" class="bg_07" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

</table>
<!-- ここまで：小メニュー -->
({*ここまで：footer*})
<!-- *ここまで：コミュニティ一覧＞＞内容* -->
</td>
</tr>
</table>
({/if})
<!-- ******ここまで：コミュニティ一覧****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[7]})
({$inc_entry_point[7]|smarty:nodefaults})
({/if})

({********************************})
({**ここまで：メインコンテンツ（左）**})
({********************************})
</td>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="right_content" valign="top">
({********************************})
({**ここから：メインコンテンツ（右）**})
({********************************})

({if $inc_entry_point[8]})
({$inc_entry_point[8]|smarty:nodefaults})
({/if})

({if $inc_entry_point[9]})
({$inc_entry_point[9]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******ここから：最新情報一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *ここから：最新情報一覧＞内容* -->
({*ここから：header*})
<!-- 小タイトル -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:100px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">最新情報</span></td>
<td style="width:290px;" align="right" class="bg_06">({*<a href="javascript:void(0);">携帯から最新情報をチェック</a>*})&nbsp;</td>
</tr>
</table>
</div>
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:426px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center">
<table border="0" cellspacing="1" style="width:424px;">
<!-- ここから：主内容＞フレンド最新日記 -->
({if $c_diary_friend_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})最新日記</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_friend_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject|default:"&nbsp;"})</a>&nbsp;(({$item.nickname|default:"&nbsp;"}))
({if $item.image_filename_1 || $item.image_filename_2 || $item.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- ここから：主内容＞フレンド最新日記＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_diary_list_friend">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞フレンド最新日記＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞フレンド最新日記 -->
<!-- ここから：主内容＞マイフレンド最新Blog -->
({if $c_rss_cache_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})最新Blog</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_rss_cache_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="({$item.link})" target="_blank">({$item.subject|default:"&nbsp;"})</a>(({$item.c_member.nickname|default:"&nbsp;"}))<br>
({/foreach})

</div>

<!-- ここから：主内容＞マイフレンド最新Blog＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_diary_list_friend#blog">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞マイフレンド最新Blog＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞マイフレンド最新Blog -->

<!-- ここから：主内容＞日記へのコメント -->
({if $c_diary_my_comment_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">日記コメント記入履歴</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_my_comment_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject})(({$item.num_comment}))</a>&nbsp;(({$item.nickname}))<br>
({/foreach})

</div>

<!-- ここから：主内容＞日記へのコメント＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=h_diary_comment_list">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞日記へのコメント＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞日記へのコメント -->
<!-- ここから：主内容＞コミュニティ最新書き込み -->
({if $c_commu_topic_comment_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">コミュニティ最新書き込み</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_commu_topic_comment_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_2">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})">({$item.c_commu_topic_name})(({$item.number}))</a>&nbsp;(({$item.c_commu_name}))
({if $item.image_filename1 || $item.image_filename2 || $item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1 || $item.file_filename2 || $item.file_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- ここから：主内容＞コミュニティ最新書き込み＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_com_comment_list">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞コミュニティ最新書き込み＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞コミュニティ最新書き込み -->
<!-- ここから：主内容＞マイフレンド最新レビュー -->
({if $c_friend_review_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})<br>最新<br>レビュー</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_friend_review_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|t_truncate:30})</a>&nbsp;(({$item.nickname}))<br>
({/foreach})

</div>

<!-- ここから：主内容＞マイフレンド最新レビュー＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=h_friend_review_list">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞マイフレンド最新レビュー＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞マイフレンド最新レビュー -->
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：自己情報一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：最新情報一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[10]})
({$inc_entry_point[10]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******ここから：自己情報一覧****** -->
({if $c_diary_list || $c_blog_list || $c_review_list})
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *ここから：自己情報一覧＞＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:390px;padding:2px 0px;" class="bg_06"><b class="c_00">最近の日記・レビュー</b></td>
</tr>
</table>
</div>
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:426px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01">
<table border="0" cellspacing="1" cellpadding="0" style="width:424px;">
<!-- ここから：主内容＞最新の日記 -->
({if $c_diary_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">最新の日記</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject|t_truncate:40})</a>
({if $item.image_filename_1 || $item.image_filename_2 || $item.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- ここから：主内容＞最新の日記＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_diary_list">もっと読む</a>
</td>
</tr>
<tr>
<td class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1" class="diary2">
<a href="page.php?p=h_diary_add">日記を書く</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞最新の日記＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞最新の日記 -->
<!-- ここから：主内容＞最新のBlog -->
({if $c_blog_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">最新のBlog</span>

</div>

</td>
<td class="bg_02">

<div class="padding_s">

({foreach from=$c_blog_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_2">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="({$item.link})" target="_blank">({$item.subject|t_truncate:40})</a><br>
({/foreach})

</div>

<!-- ここから：主内容＞最新のBlog＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_diary_list#blog">もっと読む</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞最新のBlog＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞最新のBlog -->
<!-- ここから：主内容＞最新のおすすめレビュー -->
({if $c_review_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">最新の<br>おすすめ<br>レビュー</span>

</div>

</td>
<td class="bg_02">

<div class="padding_s">

({foreach from=$c_review_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">({$item.r_datetime|date_format:"%m月%d日"})…&nbsp;<a href="./page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|t_truncate:30})</a><br>
({/foreach})

</div>

<!-- ここから：主内容＞最新のおすすめレビュー＞フッターメニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="./page.php?p=fh_review_list_member">もっと読む</a>
</td>
</tr>
<tr>
<td class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="./page.php?p=h_review_add">レビューを書く</a>
</td>
</tr>
</table>
<!-- ここまで：主内容＞最新のおすすめレビュー＞フッターメニュー -->

</td>
</tr>
({/if})
<!-- ここまで：主内容＞最新のおすすめレビュー -->
</table>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:426px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:424px;height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：自己情報一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：自己情報一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">
({/if})

({if $inc_entry_point[11]})
({$inc_entry_point[11]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******ここから：他者評価一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：他者評価一覧＞＞内容* -->
({*ここから：header*})
<!-- 小タイトル -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:34px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:390px;" class="bg_06"><span class="b_b">({$WORD_MY_FRIEND})からの紹介文</span></td>
</tr>
</table>
</div>
({*ここまで：header*})
({*ここから：body*})
<!-- 主内容 -->
<div class="bg_04" style="width:424px;">
<table border="0" cellspacing="1" cellpadding="7" style="width:424px;">
({foreach from=$c_friend_intro_list item=item})
<tr>
<td align="center" style="width:125px;" class="bg_03">
<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" border="0" alt="写真"><br>({$item.nickname})</a>
</td>
<td style="width:300px;" class="bg_02">
({$item.intro|t_truncate:"200"|t_url2a|nl2br})
</td>
</tr>
({/foreach})
</table>
</div>
({*ここまで：body*})
({*ここから：footer*})
<!-- 小メニュー -->
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:321px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="width:101px;padding:5px 0px;" class="bg_02 lh_140">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_intro">全て見る</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_manage_friend">紹介文を書く</a>
</td>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;height:1px;" class="bg_04" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
({*ここまで：footer*})
</div>
<!-- *ここまで：他者評価一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：他者評価一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[12]})
({$inc_entry_point[12]|smarty:nodefaults})
({/if})

({********************************})
({**ここまで：メインコンテンツ（右）**})
({********************************})
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
({if $rss})
<br>
({foreach from=$news item=entry})
<a href="({$entry.link})" target="_blank">({$entry.title})</a><br>
({/foreach})
({/if})
</body>
</html>
