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

({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})

<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******ここから：プロフィール変更****** -->
<form action="do.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="cmd" value="h_config_prof">
<input type="hidden" name="sessid" value="({$PHPSESSID})">

<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：プロフィール変更＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06">
<span class="b_b c_00">プロフィール変更</span>&nbsp;&nbsp;(<span class="caution">※</span>の項目は必須です)
</td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({capture name="nick"})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:150px;" class="bg_05" align="left" valign="middle">

<div class="padding_s">

ニックネーム <span class="caution">※</span>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:483px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<input name="nickname" value="({$c_member.nickname})" size="30"><br>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/capture})

({foreach from=$profile_list item=profile})

({if !$_cnt_nick && $profile.sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})

({if !$_cnt_birth && $profile.sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})

({if $profile.disp_config})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

({$profile.caption}) ({if $profile.is_required})<span class="caution">※</span>({/if})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<table style="width:100%;border-collapse:collapse;padding:0">
<tr>
<td style="padding:0;">

<div class="padding_s">

({strip})
({if $profile.form_type == 'text'})
	<input type="text" size="30" name="profile[({$profile.name})]" value="({$c_member.profile[$profile.name].value})">
({elseif $profile.form_type == 'textarea'})
	<textarea name="profile[({$profile.name})]" rows="6" cols="50">({$c_member.profile[$profile.name].value})</textarea>
({elseif $profile.form_type == 'select'})
	<select name="profile[({$profile.name})]">
	<option value="">選択してください</option>
	({foreach item=item from=$profile.options})
	<option value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value == $item.value}) selected="selected"({/if})>({$item.value|default:"--"})</option>
	({/foreach})
	</select>
({elseif $profile.form_type == 'radio'})
	<table>
	({foreach item=item from=$profile.options})
	({counter name=$profile.name assign=_cnt})
	({if $_cnt % 3 == 1})<tr>({/if})
		<td><input type="radio" name="profile[({$profile.name})]" value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value == $item.value}) checked="checked"({/if})></td>
		<td>({$item.value|default:"--"})</td>
	({if $_cnt % 3 == 0})</tr>({/if})
	({/foreach})
	({if $_cnt % 3 != 0})</tr>({/if})
	</table>
({elseif $profile.form_type == 'checkbox'})
	<input type="hidden" name="profile[({$profile.name})][]" value="0">
	
	<table>
	({foreach item=item from=$profile.options name=check})
	({counter name=$profile.name assign=_cnt})
	({if $_cnt % 3 == 1})<tr>({/if})
		<td><input type="checkbox" name="profile[({$profile.name})][]" value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value && in_array($item.value, $c_member.profile[$profile.name].value)}) checked="checked"({/if})></td>
		<td>({$item.value|default:"--"})</td>
	({if $_cnt % 3 == 0})</tr>({/if})
	({/foreach})
	({if $_cnt % 3 != 0})</tr>({/if})
	</table>
({/if})
({/strip})

</div>

</td>
({if $profile.public_flag_edit})
<td align="right">

<div class="padding_s">

<select name="public_flag[({$profile.name})]">
({html_options options=$public_flags selected=$c_member.profile[$profile.name].public_flag})
</select>

</div>

</td>
({/if})
</tr>
</table>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({/foreach})

({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})

<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" valign="middle" colspan="3">

<div style="padding:10px 60px;">

<div style="text-align:center;">

<input type="submit" value="　変　更　">

</div>

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：プロフィール変更＞＞内容* -->
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
<!-- ******ここまで：プロフィール変更****** -->
<!-- ************************************ -->

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
