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

<!-- ************************************ -->
<!-- ******�������顧�������塼������ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *�������顧�������塼������ǧ����* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" align="center" cellpadding="0" style="width:566px;" class="border_01">
<tr><td class="bg_06"><img src="./skin/content_header_1.gif" style="width: 30px;height: 20px;" class="dummy" align="left"><div class="b_b c_00" style="padding:3px 0px;">����ͽ��������Ƥ�����Ǥ�����</div></td></tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- *�������顧�������塼��ܺ�* -->
<table border="0" cellspacing="0" align="center" cellpadding="0" style="width:566px;" class="border_01">
({*********})
<tr>
<td align="center">
<table border="0" style="width:564px;" cellspacing="0" cellpadding="0">
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

({$c_schedule.title})

</div>

</td>
</tr>
<!-- *�����ޤǡ��������塼��ܺ١䥿���ȥ�* -->
({*********})
<!-- *�������顧�������塼��ܺ١䳫������* -->
<tr>
<td align="center" class="border_01" style="width:110px;border-width:0px 1px 1px 0px">

<div class="padding_s">

��������

</div>
</td>
<td class="border_01" style="border-width:0px 0px 1px 0px;">

<div class="padding_s">

({$c_schedule.start_date|date_format:"%Y"}) ǯ
({$c_schedule.start_date|date_format:"%m"}) ��
({$c_schedule.start_date|date_format:"%d"}) ��
({if is_null($c_schedule.start_time)})
-- ��
-- ʬ
({else})
({$c_schedule.start_time|date_format:"%H"}) ��
({$c_schedule.start_time|date_format:"%M"}) ʬ
({/if})

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

({$c_schedule.end_date|date_format:"%Y"}) ǯ
({$c_schedule.end_date|date_format:"%m"}) ��
({$c_schedule.end_date|date_format:"%d"}) ��
({if is_null($c_schedule.end_time)})
-- ��
-- ʬ
({else})
({$c_schedule.end_time|date_format:"%H"}) ��
({$c_schedule.end_time|date_format:"%M"}) ʬ
({/if})

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

({$c_schedule.body|nl2br})&nbsp;

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

({if $c_schedule.is_receive_mail})
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
<!-- *�������顧���������󥻥�ܥ���* -->
<tr>
<td class="bg_03" align="center" colspan="2">

<div class="padding_w_m">

<table border="0" cellspacing="0" cellpadding="6" style="width:200px;">
<tr>
<td>

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_schedule_delete_delete_c_schedule">
<input type="hidden" name="target_c_schedule_id" value="({$c_schedule.c_schedule_id})">
<input type="submit" value="�� ����� ��"></form>

</td>
<td>

<form action="page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_schedule">
<input type="hidden" name="target_c_schedule_id" value="({$c_schedule.c_schedule_id})">
<input type="submit" value="������󥻥롡"></form>

</td>
</tr>
</table>

</div>

</td>
</tr>
<!-- *�����ޤǡ����������󥻥�ܥ���* -->
({*********})
</table>
</td>
</tr>
({*********})
</table>
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- *̵��* -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��������塼������ǧ����* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��������塼������ǧ****** -->
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
