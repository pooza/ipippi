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

<!-- **************************************** -->
<!-- ******ここから：メッセージ送信先一覧****** -->
<form action="page.php" method="post">
<input type="hidden" name="p" value="c_event_mail_confirm">
<input type="hidden" name="target_c_commu_topic_id" value="({$c_commu_topic_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;" class="border_01">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:574px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:240px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">一括メッセージを送る</span></td>
<td style="width:388px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="1" cellpadding="3" style="width:574px;">
<tr>
<td class="bg_05" align="center">

<span class="c_01">名　　前</span>

</td>
<td  class="bg_02">

<table border="0" cellspacing="1" cellpadding="0">
({foreach from=$c_event_member_list item=c_member})
<tr>
<td>

<input type="checkbox" name="c_member_id[]" value="({$c_member.c_member_id})" checked="checked" class="no_bg">

</td>
<td><a href="page.php?p=f_home&target_c_member_id=({$c_member.c_member_id})">({$c_member.nickname})</a></td>
</tr>
({/foreach})
</table>
</td></tr>

<tr>
<td class="bg_05" align="center">

<span class="c_01">メッセージ</span>

</td>
<td  class="bg_02">

<textarea name="body" cols="40" rows="8"></textarea>

</td>
</tr>
<tr>
<td align="center" class="bg_02" colspan="2">

<br>
<input type="submit" value="　確認画面　">
<br><br>

</td>
</tr>
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</form>
</table>
<!-- ******ここまで：メッセージ送信先一覧****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">


<!-- **************************************** -->
<!-- ******ここから：コミュニティトップへ****** -->
<div id="link_community_top" align="center">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="./page.php?p=c_home&target_c_commu_id=({$c_commu_id})">[({$c_commu.name})]コミュニティトップへ</a>

<img src="./skin/dummy.gif" class="v_spacer_l">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_home">ホームに戻る</a>

</div>
<!-- ******ここまで：コミュニティトップへ****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

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
