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

<!-- ******************************************** -->
<!-- ******�������顧�������塼���ɲ����Ƴ�ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *�������顧�������塼���ɲ����Ƴ�ǧ����* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" align="center" cellpadding="0" style="width:566px;" class="border_01">
<tr>
<td class="bg_06"><img src="./skin/content_header_1.gif" style="width: 30px;height: 20px;" class="dummy" align="left"><div class="b_b c_00" style="padding:3px 0px;">�ʲ������ƤǤ�����Ǥ�����</div>
</td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- *�������顧�������塼��ܺ�* -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
({*********})
<!-- *�������顧�������塼��ܺ١䥿���ȥ�* -->
<tr>
<td align="center" class="border_01" style="width:110px;border-width:0px 1px 1px 0px;">

<div class="padding_s">

�����ȥ�

</div>

</td>
<td class="border_01" style="width:454px;border-width:0px 0px 1px 0px;">

<div class="padding_s">

({$input.title})

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١䥿���ȥ�* -->
({*********})
<!-- *�������顧�������塼��ܺ١䳫������* -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px">

<div class="padding_s">

��������

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

({$input.start_year|string_format:"%04d"}) ǯ
({$input.start_month|string_format:"%02d"}) ��
({$input.start_day|string_format:"%02d"}) ��
({if is_null($input.start_hour)})
--
({else})
({$input.start_hour|string_format:"%02d"})
({/if}) ��
({if is_null($input.start_minute)})
--
({else})
({$input.start_minute|string_format:"%02d"})
({/if}) ʬ

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١䳫������* -->
({*********})
<!-- *�������顧�������塼��ܺ١佪λ����* -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">

������λ

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

({$input.end_year|string_format:"%04d"}) ǯ
({$input.end_month|string_format:"%02d"}) ��
({$input.end_day|string_format:"%02d"}) ��
({if is_null($input.end_hour)})
--
({else})
({$input.end_hour|string_format:"%02d"})
({/if}) ��
({if is_null($input.end_minute)})
--
({else})
({$input.end_minute|string_format:"%02d"})
({/if}) ʬ

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١佪λ����* -->
({*********})
<!-- *�������顧�������塼��ܺ١�ܺ٥ƥ�����* -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">

�ܡ�����

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

({$input.body|nl2br})&nbsp;

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١�ܺ٥ƥ�����* -->
({*********})
<!-- *�������顧�������塼��ܺ١䤪�Τ餻�᡼��̵ͭ* -->
<tr>
<td align="center" class="border_01" style="border-width:0px 1px 1px 0px;">

<div class="padding_s">

���Τ餻�᡼��

</div>

</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

({if $input.is_receive_mail})
�������
({else})
�������ʤ�
({/if})

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١䤪�Τ餻�᡼��̵ͭ* -->
({*********})
<!-- *�����ޤǡ��������塼��ܺ�* -->
<!-- *�������顧�ɲý����ܥ���* -->
<tr>
<td class="bg_03" colspan="2" class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_w_s" align="center">

<table border="0" cellspacing="0" cellpadding="6" style="width:240px;">
<tr>
<td>

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_schedule_add_insert_c_schedule">
<input type="hidden" name="title" value="({$input.title})">
<input type="hidden" name="body" value="({$input.body})">
<input type="hidden" name="start_year" value="({$input.start_year})">
<input type="hidden" name="start_month" value="({$input.start_month})">
<input type="hidden" name="start_day" value="({$input.start_day})">
<input type="hidden" name="start_hour" value="({$input.start_hour})">
<input type="hidden" name="start_minute" value="({$input.start_minute})">
<input type="hidden" name="end_year" value="({$input.end_year})">
<input type="hidden" name="end_month" value="({$input.end_month})">
<input type="hidden" name="end_day" value="({$input.end_day})">
<input type="hidden" name="end_hour" value="({$input.end_hour})">
<input type="hidden" name="end_minute" value="({$input.end_minute})">
<input type="hidden" name="is_receive_mail" value="({$input.is_receive_mail})">
<input type="submit" value="�� �ɡ����� ��">
</form>

</td>
<td>

<form action="page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_schedule_add">
<input type="hidden" name="title" value="({$input.title})">
<input type="hidden" name="body" value="({$input.body})">
<input type="hidden" name="start_year" value="({$input.start_year})">
<input type="hidden" name="start_month" value="({$input.start_month})">
<input type="hidden" name="start_day" value="({$input.start_day})">
<input type="hidden" name="start_hour" value="({$input.start_hour})">
<input type="hidden" name="start_minute" value="({$input.start_minute})">
<input type="hidden" name="end_year" value="({$input.end_year})">
<input type="hidden" name="end_month" value="({$input.end_month})">
<input type="hidden" name="end_day" value="({$input.end_day})">
<input type="hidden" name="end_hour" value="({$input.end_hour})">
<input type="hidden" name="end_minute" value="({$input.end_minute})">
<input type="hidden" name="is_receive_mail" value="({$input.is_receive_mail})">
<input type="submit" value="�� �������� ��"><br>
</form>

</td>
</tr>
</table>

</td>
</tr>
<!-- *�����ޤǡ��ܥ���* -->
({*********})
</table>
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- *̵��* -->
({*�����ޤǡ�footer*})
<!-- *�������顧�������塼���ɲ����Ƴ�ǧ����* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��������塼���ɲ����Ƴ�ǧ****** -->
<!-- ************************************ -->

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
