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

<!-- ******************************************* -->
<!-- ******�������顧�������塼�����ϥե�����****** -->
<form action="page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="p" value="h_schedule_add_confirm">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *�������顧�������塼�����ϥե���������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
<tr>
<td class="bg_06"><img src="./skin/content_header_1.gif" style="width: 30px;height: 20px;" class="dummy" align="left">

<div class="b_b c_00" style="padding:3px;">

ͽ����ɲä���

</div>

</td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
({*********})
<tr>
<td>
<table border="0" style="width:564px;" cellspacing="0" cellpadding="0">
({********})
<!-- �������顧�������塼��ե�����䥿���ȥ� -->
<tr>
<td align="center" class="border_01" style="width:110px;border-width:0px 1px 1px 0px;">

<div class="padding_s">

�����ȥ�

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

<input name="title" value="({$input.title})" style="width: 400">

</div>

</td>
</tr>
<!-- �����ޤǡ��������塼��ե�����䥿���ȥ� -->
({********})
<!-- �������顧�������塼��ե�����䳫������ -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px">

<div class="padding_s">

��������

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

<select name="start_year">
({foreach from=$year_list item=item})
<option value="({$item})"({if $item==$input.start_year}) selected({/if})>({$item})
({/foreach})
</select>ǯ
<select name="start_month">
({foreach from=$month_list item=item})
<option value="({$item})"({if $item==$input.start_month}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="start_day">
({foreach from=$day_list item=item})
<option value="({$item})"({if $item==$input.start_day}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="start_hour"><option value="" selected>--
({foreach from=$hour_list item=item})
<option value="({$item})"({if $item==$input.start_hour}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="start_minute"><option value="" selected>--
({foreach from=$minute_list item=item})
<option value="({$item})"({if $item==$input.start_minute}) selected({/if})>({$item})
({/foreach})
</select>ʬ

</div>

</td>
</tr>
<!-- �����ޤǡ��������塼��ե�����䳫������ -->
({********})
<!-- �������顧�������塼��ե�����佪λ���� -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">

������λ

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

<select name="end_year"><option value="">----
({foreach from=$year_list item=item})
<option value="({$item})"({if $item==$input.end_year}) selected({/if})>({$item})
({/foreach})
</select>ǯ
<select name="end_month"><option value="">--
({foreach from=$month_list item=item})
<option value="({$item})"({if $item==$input.end_month}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="end_day"><option value="">--
({foreach from=$day_list item=item})
<option value="({$item})"({if $item==$input.end_day}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="end_hour"><option value="" selected>--
({foreach from=$hour_list item=item})
<option value="({$item})"({if $item==$input.end_hour}) selected({/if})>({$item})
({/foreach})
</select>��
<select name="end_minute"><option value="" selected>--
({foreach from=$minute_list item=item})
<option value="({$item})"({if $item==$input.end_minute}) selected({/if})>({$item})
({/foreach})
</select>ʬ

</div>

</td>
</tr>
<!-- �����ޤǡ��������塼��ե�����佪λ���� -->
({********})
<!-- �������顧�������塼��ե������ܺ٥ƥ����� -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">

�ܡ�����

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

<textarea name="body" style="width:400;height:150">({$input.body})</textarea>

</div>

</td>
</tr>
<!-- �����ޤǡ��������塼��ե������ܺ٥ƥ����� -->
({********})
<!-- �������顨�������塼��ե�����䤪�Τ餻�᡼������ -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">���Τ餻�᡼��</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td valign="middle">

<input type="checkbox" name="is_receive_mail" value="1" align="middle"({if $input.is_receive_mail}) checked="checked"({/if}) class="no_bg">

</td>
<td valign="middle">
��ͽ��������ī�����Υ᡼�뤬�Ϥ��ޤ�<br>
��<span>�����������Ͽ�᡼�륢�ɥ쥹�Ǥ�</span>
</td>
</tr>
</table>

</div>

</td>
</tr>
<!-- �����ޤǡ��������塼��ե�����䤪�Τ餻�᡼������ -->
({********})
<!-- �������塼��ե�����䥵�֥ߥåȥܥ��� -->
<tr>
<td class="bg_03" align="center" colspan="2">

<div class="padding_w_m">

<input type="submit" value="�� ��ǧ���� ��">

</div>

</td>
</tr>
({********})
</table>
</td>
</tr>
({*********})
</table>
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�������顧footer*})
<!-- *�����ޤǡ��������塼�����ϥե���������* -->
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
<!-- ******�����ޤǡ��������塼�����ϥե�����****** -->
<!-- ******************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/dummy.gif" class="v_spacer_l">

<a href='javascript:window.close()'>���Υ�����ɥ����Ĥ���</a>

<img src="./skin/dummy.gif" class="v_spacer_l">
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
