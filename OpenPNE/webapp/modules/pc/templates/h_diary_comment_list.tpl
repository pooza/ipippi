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

<table class="container" border="0" cellspacing="0" cellpadding="0">
<tr><td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******ここから：メッセージテーブル****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_01">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
({*ここから：header*})
<!-- 小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">日記コメント記入履歴</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->

({if $total_num})
<!-- ここから：主内容＞＞タブ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:634px;" align="right" class="bg_02">

<div class="padding_s">

({if $is_prev})
<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=-1">前を表示</a>&nbsp;&nbsp;
({/if})({$pager.start})件～({$total_num})件を表示({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=1">次を表示</a>
({/if})

</div>

</td>
</tr>
</table>
<!-- ここまで：主内容＞＞タブ -->
<!-- ここから：主内容＞＞コメント一覧 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$h_diary_comment_list item=item})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:180px;" class="bg_05">

<div class="padding_s">

({$item.r_datetime|date_format:"%Y/%m/%d %H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:453px;" class="bg_02">

<div class="padding_s">

<a href="page.php?p=fh_diary&target_c_diary_id=({$item.c_diary_id})">({$item.subject}) (({$item.num_comment}))</a> (({$item.nickname}))

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
<!-- ここまで：主内容＞＞コメント一覧 -->
<!-- ここから：主内容＞＞タブ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:634px;" align="right" class="bg_02">

<div class="padding_s">

({if $is_prev})
<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=-1">前を表示</a>&nbsp;&nbsp;
({/if})({$pager.start})件～({$total_num})件を表示({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=1">次を表示</a>
({/if})

</div>

</td>
</tr>
</table>
<!-- ここまで：主内容＞＞タブ -->

({else})
<!-- ここから：主内容＞＞メッセージ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td align="center" class="bg_02">

<div style="padding:10px;">

まだ({$WORD_MY_FRIEND})の日記がありません。

</div>

</td>
</tr>
</table>
<!-- ここまで：主内容＞＞メッセージ -->

({/if})

<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：メッセージテーブル****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">


({***************************})
({**ここまで：メインコンテンツ**})
({***************************})
</td></tr>
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
