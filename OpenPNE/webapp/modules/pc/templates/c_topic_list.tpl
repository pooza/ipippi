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

({*���ߥ�˥ƥ��Υ��С��Ǥʤ��Ȥ�������ξ��*})
({if $is_warning }) 

<!-- ************************************** -->
<!-- ******�������顧�Ǽ���ɽ�����·ٹ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�Ǽ���ɽ�����·ٹ������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�Ǽ���</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01 bg_09" align="center">
 
<img src="./skin/dummy.gif" class="v_spacer_l">

<div style="width:570px;padding:40px 10px;margin:0px auto;" class="border_01 bg_03">
������Υ��ߥ�˥ƥ��Τ��ᡢ���ߥ�˥ƥ��˻��ä��ʤ��ȷǼ��Ĥ򸫤뤳�ȤϽ���ޤ���
</div>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��Ǽ���ɽ�����·ٹ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��Ǽ���ɽ�����·ٹ�****** -->
<!-- ************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({else}) 

<!-- ************************************ -->
<!-- ******�������顧�����ȥԥå�����****** -->
<form action="page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="c_topic_add">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�����ȥԥå�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">[({$c_commu.name})]&nbsp;�������ȥԥå����������</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01 bg_09" align="center">
 
<img src="./skin/dummy.gif" class="v_spacer_l">

<div style="width:570px;padding:40px 10px;margin:0px auto;" class="border_01 bg_03">

<input type="radio" name="event_flag" value="0" checked="checked" class="no_bg"> �ȥԥå��������<br>
<input type="radio" name="event_flag" value="1" class="no_bg"> ���٥�Ȥ������<br>

<img src="./skin/dummy.gif" class="v_spacer_l">

<input type="submit" value="���� �� �� ����">

</div>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ������ȥԥå������������* -->
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
<!-- ******�����ޤǡ������ȥԥå�����****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({if $c_topic_list })

<!-- ******************************** -->
<!-- ******�������顧�ȥԥå�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ȥԥå�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�ȥԥå�����</span></td>
</tr>
</table>
</div>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�����ơ��ɽ������ڤ��ؤ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:300px;" class="bg_02" align="center">
<div style="padding:4px 3px;">
�Ƕ�񤭹��ߤ����ä���Τ�����ɽ�����Ƥ��ޤ���
</div>
</td>
<td style="width:332px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})<a href="page.php?p=c_topic_list&target_c_commu_id=({$c_commu.c_commu_id})&direc=-1&page=({$page})">������ɽ��</a> ({/if})
&nbsp;&nbsp;({$start_num})���({$end_num})���ɽ��&nbsp;&nbsp;
({if $is_next})<a href="page.php?p=c_topic_list&target_c_commu_id=({$c_commu.c_commu_id})&direc=1&page=({$page})">����ɽ����</a>({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ��ɽ������ڤ��ؤ� -->
<!-- �������顧�����ơ��ȥԥå����� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_topic_list item=item})
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle" rowspan="5">

<div class="padding_s">

({$item.r_datetime|date_format:"%m��%d��"})<br>({$item.r_datetime|date_format:"%H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

&nbsp;<a href="page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})">({$item.name})</a>
({if $item.event_flag})(���٥��)({/if})

({if $item.image_filename1||$item.image_filename2||$item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1||$item.file_filename2||$item.file_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:523px;" class="bg_01" align="center" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">

<div class="padding_s lh_120">

({if $item.image_position=="TOP"})
({if  $item.image_filename1|| $item.image_filename2|| $item.image_filename3})
<div>
({if $item.image_filename1})<a href="img.php?filename=({$item.image_filename1})" target="_blank"><img src="./img.php?filename=({$item.image_filename1})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename2})<a href="img.php?filename=({$item.image_filename2})" target="_blank"><img src="./img.php?filename=({$item.image_filename2})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename3})<a href="img.php?filename=({$item.image_filename3})" target="_blank"><img src="./img.php?filename=({$item.image_filename3})&h=120&w=120"></a>&nbsp;({/if})
</div>
({/if})
({/if})
({$item.body|t_url2a|nl2br})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:523px;" class="bg_01" align="center" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div style="text-align:right;" class="padding_s lh_120">

({if $item.is_c_topic_admin || $is_c_commu_admin})
<a href="page.php?p=c_topic_edit&target_c_commu_topic_id=({$item.c_commu_topic_id})">�Խ�</a>&nbsp;
({/if})
<a href="page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})">��äȸ���(({$item.write_num}))</a>

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- �����ޤǡ������ơ��ȥԥå����� -->
<!-- �������顧�����ơ��ɽ������ڤ��ؤ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})<a href="page.php?p=c_topic_list&target_c_commu_id=({$c_commu.c_commu_id})&direc=-1&page=({$page})">������ɽ��</a> ({/if})
&nbsp;&nbsp;({$start_num})���({$end_num})���ɽ��&nbsp;&nbsp;
({if $is_next})<a href="page.php?p=c_topic_list&target_c_commu_id=({$c_commu.c_commu_id})&direc=1&page=({$page})">����ɽ����</a>({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ��ɽ������ڤ��ؤ� -->
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ȥԥå������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ȥԥå�����****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({/if})

({/if})

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
