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
<!-- ******ここから：一括メッセージを送る****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_01">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
({*ここから：header*})
<!-- 小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:528px;" class="bg_06"><span class="b_b c_00">一括メッセージを送る</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;">
({*********})
<tr>
<td style="width:566px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:150pxpx;" class="bg_05" align="center">

<div class="padding_s">

<span class="c_01">名　　前</span>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:413px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_mail_member item=c_member})
<div>
<a href="page.php?p=f_home&target_c_member_id=({$c_member.c_member_id})">({$c_member.nickname})</a><br>
</div>
({/foreach})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center">

<div class="padding_s">

メッセージ

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td  class="bg_02">

<div class="padding_s">

({$body|nl2br})

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td align="center" class="bg_02" colspan="3">

<div style="padding:10px 0px; align="center">

<table border="0" cellspacing="0" cellpadding="0" style="width:100%;height:2em;">
<tr>
<td style="width:50%;text-align:right;">

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="c_event_mail">
<input type="hidden" name="c_commu_id" value="({$c_commu_id})">
<input type="hidden" name="c_commu_topic_id" value="({$c_commu_topic_id})">
<input type="hidden" name="c_member_ids" value="({$c_member_ids})">
<input type="hidden" name="body" value="({$body})">
<input type="hidden" name="event_member_id" value="118949">
<input type="hidden" name="body" value="({$body})">
<input type="hidden" name="c_member_ids" value="({$c_member_ids})">
<input type="hidden" name="body" value="({$body})">
<input type="hidden" name="event_member_id" value="118949">
({foreach from=$c_mail_member item=c_member})
<input type="hidden" name="c_member_ids[]" value="({$c_member.c_member_id})">
({/foreach})
<input type="submit" value="　送　　　信　">&nbsp;
</form>

</td>
<td style="width:50%;text-align:left;">

<form action="page.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="p" value="c_event_mail">
<input type="hidden" name="target_c_commu_topic_id" value="({$c_commu_topic_id})">
&nbsp;<input type="submit" value="　キャンセル　">
</form>

</td>
</tr>
</table>

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
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
<!-- ******ここまで：一括メッセージを送る****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- **************************************** -->
<!-- ******ここから：コミュニティトップへ****** -->
<div id="link_community_top" align="center">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;
<a href="./page.php?p=c_home&target_c_commu_id=({$c_commu_id})">[({$c_commu.name})]コミュニティトップへ</a>

</div>
<!-- ******ここまで：コミュニティトップへ****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">
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