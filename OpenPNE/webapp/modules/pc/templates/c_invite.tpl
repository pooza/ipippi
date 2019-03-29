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

<!-- ************************************ -->
<!-- ******ここから：コミュニティ勧誘****** -->
<form action="do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="c_invite_insert_c_message_commu_invite">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *ここから：コミュニティ勧誘＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:528px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">このコミュニティを({$WORD_MY_FRIEND})に教える</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：コミュニティ勧誘文章 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;">
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:564px;" class="bg_09" align="left">

<div class="padding_w_s lh_120">

({$WORD_MY_FRIEND})に、このコミュニティの紹介メッセージを送信します。

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：コミュニティ勧誘文章 -->
<!-- ここから：主内容 -->
<table border="0"cellspacing="0" cellpadding="0" style="width:566px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
<td style="width:150px;" class="bg_05">

<div class="padding_s">

ニックネーム

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:412px;" class="bg_02">

<div class="padding_s">

<table>
({foreach from=$c_invite_list item=c_invite})
({counter assign=_cnt})
({if $_cnt % 3 == 1})<tr>({/if})
	<td><input type="checkbox" id="m({$c_invite.c_member_id})" name="c_member_id_list[]" value="({$c_invite.c_member_id})" class="no_bg"></td>
	<td style="padding-right:1em"><label for="m({$c_invite.c_member_id})">({$c_invite.nickname})</label></td>
({if $_cnt % 3 == 0})</tr>({/if})
({/foreach})
({if $_cnt % 3 != 0})</tr>({/if})
</table>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05">

<div class="padding_s">

メッセージ（任意）

</div>

</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
<td class="bg_02">

<div class="padding_s">

<textarea name="body" rows="6" cols="50"></textarea>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" colspan="3" align="left">

<div class="padding_w_s lh_120">

<div style="text-align:center;padding-bottom:10px;">

<input type="submit" value="　送　　信　">

</div>

※({$WORD_MY_FRIEND})以外にこのコミュニティを教えたい場合、<br>
その人のページから直接メッセージを送ってください。<br>
メール内にコミュニティのURLを貼付すると便利です。<br>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：コミュニティ勧誘＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</form>
<!-- ******ここまで：コミュニティ勧誘****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<img src="./skin/dummy.gif" class="v_spacer_l">

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
