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
<td class="container main_content" align="center">

({ext_include file="inc_alert_box.tpl"})({* ���顼��å���������ƥ� *})

<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**�������顧�ᥤ�󥳥�ƥ��**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******�������顧�ץ�ե������ѹ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ץ�ե������ѹ�������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06">
<span class="b_b c_00">�ץ�ե������ѹ�</span>&nbsp;&nbsp;(<span class="caution">��</span>�ι��ܤ�ɬ�ܤǤ�)
</td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
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

�˥å��͡��� <span class="caution">��</span>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:483px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$prof.nickname})

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

({$profile.caption})
({if $profile.is_required})
<span class="caution">��</span>
({/if})
 
</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({if $prof.profile[$profile.name].value})

({if $profile.form_type == 'textarea'})
	({$prof.profile[$profile.name].value|t_url2a|nl2br})
({elseif $profile.form_type == 'checkbox'})
	({$prof.profile[$profile.name].value|@t_implode:", "})
({else})
	({$prof.profile[$profile.name].value})
({/if})

({if $prof.profile[$profile.name].public_flag == 'friend'})
��({$WORD_MY_FRIEND})�ޤǸ�����
({elseif $prof.profile[$profile.name].public_flag == 'private'})
�ʸ������ʤ���
({/if})

({/if})

</div>

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

<div class="padding_w_m">

<table border="0" cellspacing="0" cellpadding="0" style="width:200px;height:3em;margin:0px auto;">
<tr>
<td style="width:45%;" align="center">

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_config_prof">
<input type="hidden" name="mode" value="register">
<input type="hidden" name="nickname" value="({$prof.nickname})">
<input type="hidden" name="birth_year" value="({$prof.birth_year})">
<input type="hidden" name="birth_month" value="({$prof.birth_month})">
<input type="hidden" name="birth_day" value="({$prof.birth_day})">
<input type="hidden" name="public_flag_birth_year" value="({$prof.public_flag_birth_year})">
({strip})
({foreach from=$prof.profile key=key item=item})
({if is_array($item.c_profile_option_id)})
	({foreach from=$item.c_profile_option_id item=i})
	({if $i})
	<input type="hidden" name="profile[({$key})][]" value="({$i})">
	({/if})
	({/foreach})
({elseif $item.c_profile_option_id})
	<input type="hidden" name="profile[({$key})]" value="({$item.c_profile_option_id})">
({else})
	<input type="hidden" name="profile[({$key})]" value="({$item.value})">
({/if})
<input type="hidden" name="public_flag[({$key})]" value="({$item.public_flag})">
({/foreach})
({/strip})
<input type="submit" value="���ѡ�����">
</form>

</td>
<td style="width:10%;"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:45%;" align="center">

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_config_prof">
<input type="hidden" name="mode" value="input">
<input type="hidden" name="nickname" value="({$prof.nickname})">
<input type="hidden" name="birth_year" value="({$prof.birth_year})">
<input type="hidden" name="birth_month" value="({$prof.birth_month})">
<input type="hidden" name="birth_day" value="({$prof.birth_day})">
<input type="hidden" name="public_flag_birth_year" value="({$prof.public_flag_birth_year})">
({strip})
({foreach from=$prof.profile key=key item=item})
({if is_array($item.c_profile_option_id)})
	({foreach from=$item.c_profile_option_id item=i})
	({if $i})
	<input type="hidden" name="profile[({$key})][]" value="({$i})">
	({/if})
	({/foreach})
({elseif $item.c_profile_option_id})
	<input type="hidden" name="profile[({$key})]" value="({$item.c_profile_option_id})">
({else})
	<input type="hidden" name="profile[({$key})]" value="({$item.value})">
({/if})
<input type="hidden" name="public_flag[({$key})]" value="({$item.public_flag})">
({/foreach})
({/strip})
<input type="submit" value="����������">
</form>

</td>
</tr>
</table>

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
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ץ�ե������ѹ��������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ץ�ե������ѹ�****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({***************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ��**})
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
