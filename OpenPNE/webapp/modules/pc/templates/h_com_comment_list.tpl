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
({**�������顧�ᥤ�󥳥�ƥ��**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ��ǿ��񤭹��߰���****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;" class="border_01">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
({*�������顧header*})
<!-- �������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:240px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ��ǿ��񤭹���</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->

({if $total_num})
<!-- �������顧�����ơ����С��������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="1" style="width:636px;" class="border_01">
<tr>
<td style="width:634px;" align="right" class="bg_02">

<div class="padding_s">

({if $is_prev})
<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=-1">����ɽ��</a>&nbsp;&nbsp;
({/if})({$pager.start})���({$total_num})���ɽ��({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=1">����ɽ��</a>
({/if})

</div>

</td>
</tr>
</table>
<!-- �����ޤǡ������ơ����С��������ɽ������ -->
<!-- �������顧�����ơ�䥳���Ȱ��� -->
<table border="0" cellspacing="1" cellpadding="0" style="width:636px;">
({foreach from=$h_com_comment_list item=item})
<tr>
<td style="width:180px;" class="bg_05">

<div class="padding_s">

({$item.r_datetime|date_format:"%Yǯ%m��%d�� %H:%M"})

</div>

</td>
<td style="width:453px;" class="bg_02">

<div class="padding_s">

<a href=page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})>({$item.c_commu_topic_name}) (({$item.number}))</a> (({$item.c_commu_name}))
({if $item.image_filename1 || $item.image_filename2 || $item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1 || $item.file_filename2 || $item.file_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})<br>

</div>

</td>
</tr>
({/foreach})
</table>
<!-- �����ޤǡ������ơ�䥳���Ȱ��� -->
<!-- �������顧�����ơ����С��������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="1" style="width:636px;" class="border_01">
<tr>
<td style="width:634px;" align="right" class="bg_02">

<div class="padding_s">

({if $is_prev})
<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=-1">����ɽ��</a>&nbsp;&nbsp;
({/if})({$pager.start})���({$total_num})���ɽ��({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_diary_list_friend&amp;page=({$page})&amp;direc=1">����ɽ��</a>
({/if})

</div>

</td>
</tr>
</table>
<!-- �����ޤǡ������ơ����С��������ɽ������ -->

({else})

<!-- �������顧�����ơ��0�� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_02" align="center" valign="middle">

<div class="padding_s">

�ޤ�({$WORD_MY_FRIEND})������������ޤ���

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ��0�� -->

({/if})

<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ��ǿ��񤭹��߰���****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<img src="./skin/dummy.gif" class="v_spacer_l">

<img src="./skin/dummy.gif" class="v_spacer_l">

({***************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ��**})
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
