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
({**�������顧�ᥤ�󥳥�ƥ��**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************* -->
<!-- ******�������顧����****** -->
<form action="page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_search_result">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;;margin:0px auto;" class="border_07">
({*********})
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧����* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">��&nbsp;��</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- ��������: �����ե����� �쥤�����ȥơ��֥� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
({*********})

({foreach from=$profile_list item=profile})
({if $profile.disp_search})
<tr>
<td style="width:150px;" class="bg_05" align="left" valign="middle">
<img src="./skin/dummy.gif" class="v_spacer_s">
<span class="c_01" style="padding:5px;">
({$profile.caption})
</span>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>

<td style="width:421px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

({if $profile.form_type == 'select' || $profile.form_type == 'radio'})
	<select name="profile[({$profile.name})]">
	<option value="0" selected="selected">���ꤷ�ʤ�</option>
	({foreach from=$profile_list[$profile.name].options item=item})
	<option value="({$item.c_profile_option_id})">({$item.value})</option>
	({/foreach})
	</select>
({elseif $profile.form_type == 'checkbox'})
({* ñ������ѥ����� *})
	<select name="profile[({$profile.name})]">
	<option value="0" selected="selected">���ꤷ�ʤ�</option>
	({foreach from=$profile_list[$profile.name].options item=item})
	<option value="({$item.c_profile_option_id})">({$item.value})</option>
	({/foreach})
	</select>
({* ʣ������ѥ����� *})
	({*
	({foreach from=$profile_list[$profile.name].options item=item})
	<input type="checkbox" name="profile[({$profile.name})][]" value="({$item.c_profile_option_id})">({$item.value})
	({/foreach})
	*})
({elseif $profile.form_type == 'text' || $profile.form_type == 'textarea'})
	<input name="profile[({$profile.name})]" size="30" type="text">
({/if})

</div>
</td>
</tr>
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({/foreach})

<tr>
<td style="width:150px;" class="bg_05" align="left" valign="middle">
<img src="./skin/dummy.gif" class="v_spacer_s">
<span class="c_01" style="padding:5px;">
���ܤΰ���
</span>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>

<td style="width:421px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">
�������ܤ����ɽ�����ޤ�&nbsp;&nbsp;<a href="page.php?p=h_search_list">�����򸫤�</a>
</div>
</td>
</tr>
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:150px;" class="bg_05" align="left" valign="middle">
<img src="./skin/dummy.gif" class="v_spacer_s">
<span class="c_01" style="padding:5px;">
�̿���̵ͭ
</span>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>

<td style="width:421px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<input type="checkbox" name="image" value="1" class="no_bg">ͭ�Τ�

</div>

</td>
</tr>
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:572px;" class="bg_03" align="center" valign="middle" colspan="3">
<div style="padding:6px 100px;">

<table border="0" cellspacing="0" cellpadding="0" style="width:200px;height:20px;">
<tr>
<td>

<div align="center" style="text-align:center;">

<input type="submit" value="��������������">

</div>

</td>
</tr>
</table>

</div>
</td>
</tr>
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤ�: �����ե����� �쥤�����ȥơ��֥� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ�����* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</form>
<!-- ******�����ޤǡ�����****** -->
<!-- ************************* -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ***************************** -->
<!-- ******�������顧�˥å��͡��ม��****** -->
<form action="page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_search_result">
<input type="hidden" name="is_n" value="1">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�˥å��͡��ม��* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�˥å��͡���Ǹ�������</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<!-- �������顧������ -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:564px;height:50px;" class="bg_03" align="center" valign="middle">

<!--  �������顧 �˥å��͡��ม���ե����� �쥤�����ȥơ��֥� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">

<tr>
<td style="width:150px;" class="bg_05" align="left" valign="middle">
<img src="./skin/dummy.gif" class="v_spacer_s">
<span class="c_01" style="padding:5px;">�˥å��͡���</span>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>

<td style="width:421px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input name="nickname" size="30" type="text">

</div>
</td>
</tr>

<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

<tr>
<td style="width:562px;" class="bg_03" align="center" valign="middle" colspan="3">
<div style="padding:6px 100px;">

<table border="0" cellspacing="0" cellpadding="0" style="width:200px;height:20px;">
<tr><td>
<div align="center" style="text-align:center;">
<input type="submit" value="��������������">
</div>
</td></tr>
</table>

</div>
</td>
</tr>

</form>

</table>
<!--  �����ޤǡ� �˥å��͡��ม���ե����� �쥤�����ȥơ��֥� -->

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �����ޤǡ������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��˥å��͡��ม��* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</div>
<!-- ******�����ޤǡ��˥å��͡��ม��****** -->
<!-- *********************************************** -->


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
