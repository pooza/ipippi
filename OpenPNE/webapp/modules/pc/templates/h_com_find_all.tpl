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
({capture name="keyword_url"})({$keyword|escape:url})({/capture})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ��������¤��ؤ�</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:562px;margin:0px auto;">
({*********})
<tr>
<td style="width:562px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:560px;" class="bg_02" align="left" valign="middle">
<div style="padding:4px 3px;">

<!-- �������顧�����ơ���¤��ؤ������ƥ��ꡦ���� -->

<form action="page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_com_find_all">

�¤��ؤ�<img src="./skin/icon_arrow_2.gif" class="icon">

<a href="./page.php?p=h_com_find_all&amp;val_order=count&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;category_id=({$search_val_list.category_id})">���С�����</a>
|
<a href="page.php?p=h_com_find_all&amp;val_order=r_datetime&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;category_id=({$search_val_list.category_id})">��������</a>

<img src="./skin/dummy.gif" class="v_spacer_l">

�������<img src="./skin/icon_arrow_2.gif" class="icon">
<input name="keyword" size="15" value="({$keyword})">
&nbsp;���ƥ���<img src="./skin/icon_arrow_2.gif" class="icon">
<select name="category_id">
<option value="0">����ʤ�</option>
({foreach from=$c_commu_category_list item=parent})
({foreach from=$parent item=item})
<option value="({$item.c_commu_category_id})"({if $item.c_commu_category_id == $search_val_list.category_id}) selected="selected"({/if})>({$item.name})</option>
({/foreach})
({/foreach})
</select>
<input type="submit" value=" �� �� ">

</form>

<!-- �����ޤǡ������ơ���¤��ؤ������ƥ��ꡦ���� -->

<div style="text-align:right;padding:3px;">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=h_com_add">��������</a>&nbsp;(���������ˡ��������ߥ�˥ƥ����ʤ�������ǧ��������)&nbsp;&nbsp;
</div>

<hr>

<!-- �������顧�����ơ�䥳�ߥ�˥ƥ�ɽ�� -->
���ƥ���<img src="./skin/icon_arrow_2.gif" class="icon">

<table border="0" cellspacing="0" cellpadding="0" style="width:532px;">
({foreach from=$c_commu_category_parent_list item=item_parent})
<tr>
<td style="width:70px;" valign="top">

<div style="text-align:left;padding:3px;" class="b_b">
({$item_parent.name})
</div>

</td>
<td style="width:1em;" align="center" valign="top">

<div style="text-align:left;padding:3px;">
��
</div>

</td>
<td valign="top">

<div style="text-align:left;padding:3px;">
({foreach name=cccl from=$c_commu_category_list[$item_parent.c_commu_category_parent_id] item=item_cat})
<a href="page.php?p=h_com_find_all&amp;order=r_datetime&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;category_id=({$item_cat.c_commu_category_id})">({$item_cat.name})(({$item_cat.count_commu_category}))</a>
({if !$smarty.foreach.cccl.last}) - ({/if})
({/foreach})
</div>

</td>
</tr>
({/foreach})
</table>
<!-- �����ޤǡ������ơ�䥳�ߥ�˥ƥ�ɽ�� -->

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

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ�����****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:600px;padding:2px 0px;" class="bg_06"><span class="c_00"><span class="b_b">���ߥ�˥ƥ�����</span>&nbsp;&nbsp;***&nbsp;

({if $total_num})
	({$total_num})
({else})
	0
({/if})

��&nbsp;���������ޤ�����</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
({if $start_num != $end_num})
<!-- �������顧�����ơ�䥳�ߥ�˥ƥ��������ɽ������ -->
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

({if $is_prev})
<a href="page.php?p=h_com_find_all&amp;direc=-1&page=({$page})&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;val_order=({$search_val_list.val_order})&amp;category_id=({$search_val_list.category_id})">����ɽ��</a>&nbsp;&nbsp;
({/if})
({if $total_num})
({$start_num})���({$end_num})���ɽ��
({/if})
({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_com_find_all&amp;direc=1&amp;page=({$page})&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;val_order=({$search_val_list.val_order})&amp;category_id=({$search_val_list.category_id})">����ɽ��</a>
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
<!-- �����ޤǡ������ơ�䥳�ߥ�˥ƥ��������ɽ������ -->
({/if})
<!-- �������顧�����ơ�䥳�ߥ�˥ƥ��������� -->
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ�䥳�ߥ�˥ƥ��������Ρ��Υ롼����ʬ -->
({foreach from=$c_commu_search_list item=c_commu_search})
<div class="border_01 bg_09" style="width:562px;margin:0px auto;" align="center">
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="middle" rowspan="7">

<div class="padding_s">

<a href="page.php?p=c_home&target_c_commu_id=({$c_commu_search.c_commu_id})">({if $c_commu_search.image_filename})<img src="./img.php?filename=({$c_commu_search.image_filename})&w=72&h=72">({else})<img src="./img.php?filename=no_logo_small.gif&w=76&h=76">({/if})</a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="left" valign="middle">

<div class="padding_s">

���ߥ�˥ƥ�̾

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$c_commu_search.name})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:457px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

���С���

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$c_commu_search.count_commu_member})��

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="height:1px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

����ʸ

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$c_commu_search.info})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="height:1px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="left" valign="middle">

<div class="padding_s">

���ƥ���

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" valign="middle">

<table border="0" cellspacing="0" cellpadding="0" style="width:371px;">
<tr>
<td style="width:99px;" class="bg_02" align="left">

<div class="padding_s">

({$c_commu_search.c_commu_category_name})

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:271px;" class="bg_03" align="center">

<div class="padding_s">

<a href="./page.php?p=c_home&target_c_commu_id=({$c_commu_search.c_commu_id})"><img src="./skin/btn/shousai.gif" class="icon"></a>

</div>

</td>
</tr>
</table>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>

<img src="./skin/dummy.gif" class="v_spacer_l">
({/foreach})
<!-- �����ޤǡ������ơ�䥳�ߥ�˥ƥ��������Ρ��Υ롼����ʬ -->

</div>
<!-- �����ޤǡ���䥳�ߥ�˥ƥ��������� -->
({if $start_num != $end_num})
<!-- �������顧�����ơ�䥳�ߥ�˥ƥ��������ɽ������ -->
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

({if $is_prev})
<a href="page.php?p=h_com_find_all&amp;direc=-1&page=({$page})&amp;val_order=({$search_val_list.val_order})&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;category_id=({$search_val_list.category_id})">����ɽ��</a>&nbsp;&nbsp;
({/if})
({if $total_num})
({$start_num})���({$end_num})���ɽ��
({/if})
({if $is_next})
&nbsp;&nbsp;<a href="page.php?p=h_com_find_all&amp;direc=1&amp;page=({$page})&amp;val_order=({$search_val_list.val_order})&amp;keyword=({$smarty.capture.keyword_url|smarty:nodefaults})&amp;category_id=({$search_val_list.category_id})">����ɽ��</a>
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
<!-- �����ޤǡ������ơ�䥳�ߥ�˥ƥ��������ɽ������ -->
({/if})
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ�����****** -->
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
