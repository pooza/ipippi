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

<!-- ******************************** -->
<!-- ******�������顧���С�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���С�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06"><span class="c_00"><span class="b_b">������̰���</span>&nbsp;&nbsp;***&nbsp;({$pager.total_num})&nbsp;̾ ���������ޤ�����</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->

<!-- �������顧�����ơ����С��������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">
&nbsp;&nbsp;
({if $pager.page_prev})
<a href="page.php?p=h_search_result&amp;page=({$pager.page_prev})&amp;({$search_condition})">����ɽ��</a>
({/if})

({if $pager.total_num})
({$pager.disp_start})���({$pager.disp_end})���ɽ��
({/if})

({if $pager.page_next})
<a href="page.php?p=h_search_result&amp;page=({$pager.page_next})&amp;({$search_condition})">����ɽ��</a>
({/if})
</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ����С��������ɽ������ -->

<!-- �������顧�����ơ����С��ץ�ե������������ -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ����С��ץ�ե�����������Ρ��Υ롼����ʬ -->
({foreach from=$target_friend_list item=item})
<div class="border_01 bg_09" style="width:562px;margin:0px auto;" align="center">
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="9"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center" rowspan="9"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="middle" rowspan="9">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center" rowspan="9"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:100px;" class="bg_05" align="left" valign="middle">

<div class="padding_s">
�˥å��͡���
</div>

</td>
<td style="width:1px;" class="bg_01" align="center" rowspan="9"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:363px;" class="bg_02" align="left" valign="middle" colspan="3">

<div class="padding_s">
({$item.nickname})
</div>

</td>
<td style="width:1px;" class="bg_01" align="center" rowspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_05" align="left" valign="middle">
<div class="padding_s">
���ʾҲ�
</div>
</td>
<td class="bg_02" align="left" valign="middle" colspan="3">
<div class="padding_s">
({$item.profile.self_intro.value|t_truncate:150})
</div>
</td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="height:1px;" class="bg_01" align="center" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">
�ǽ�������
</div>

</td>
<td class="bg_02" align="left" valign="middle" style="width:100px;">

<div class="padding_s">
({$item.last_login})
</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:262px;" class="bg_03" align="center">

<div class="padding_s">
<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./skin/btn/shousai.gif" alt="�ܺ٤򸫤�"></a>
</div>

</td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="9"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>

<img src="./skin/dummy.gif" class="v_spacer_l">
({/foreach})
<!--�������ץ�ե�����ɽ�������ޤǡ�����-->
<!-- �����ޤǡ������ơ����С��ץ�ե�����������Ρ��Υ롼����ʬ -->

</div>
<!-- �����ޤǡ������С��ץ�ե������������ -->

<!-- �������顧�����ơ����С��������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

&nbsp;&nbsp;
({if $pager.page_prev})
<a href="page.php?p=h_search_result&amp;page=({$pager.page_prev})&amp;({$search_condition})">����ɽ��</a>
({/if})

({if $pager.total_num})
({$pager.disp_start})���({$pager.disp_end})���ɽ��
({/if})

({if $pager.page_next})
<a href="page.php?p=h_search_result&amp;page=({$pager.page_next})&amp;({$search_condition})">����ɽ��</a>
({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ����С��������ɽ������ -->

<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����С������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����С�����****** -->
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
