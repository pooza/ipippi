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

<!-- ********************************** -->
<!-- ******�������顧���������ӥ塼�������¤��ؤ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05" align="center">
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">
���������ӥ塼�������¤��ؤ�
</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01 bg_05">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:548px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" valign="middle">

<form action="page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_review_search">
<table border="0" cellspacing="0" cellpadding="3" style="width:546px;">
<!-- �������顧�����ơ�Ƹ����ե����� -->
<tr>
<td style="width:90px;" align="right">

<div class="padding_s">

�¤��ؤ�&nbsp;<img src="./skin/icon_arrow_2.gif" class="icon">

</div>

</td>
<td style="width:456px;">

<div class="padding_s">

<a href="page.php?p=h_review_search&keyword=({$keyword|escape:"url"})&category=({$category})&orderby=r_num">��Ͽ����</a>
|
<a href="page.php?p=h_review_search&keyword=({$keyword|escape:"url"})&category=({$category})&orderby=r_datetime">��������</a>

</div>

</td>
</tr>
({*********})
<tr>
<td valign="top" align="right">

<div class="padding_s">

�������&nbsp;<img src="./skin/icon_arrow_2.gif" class="icon">

</div>

</td>
<td valign="top">

<div class="padding_s">

<input type="text" name="keyword" value="({$keyword})" size="15">&nbsp;
&nbsp;���ƥ���&nbsp;<img src="./skin/icon_arrow_2.gif" class="icon">
<select name="category">
<option value="">����ʤ�</option>
({html_options options=$category_disp selected=$category})
</select>
<input type="submit" value="���� ����">

</div>

</td>
</tr>
<!-- �����ޤǡ������ơ�Ƹ����ե����� -->
({*********})
<!-- �������顧�����ơ��ӥ塼����������� -->
<tr>
<td align="center" valign="middle" colspan="2">

<div class="padding_s">

<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="./page.php?p=h_review_add")>��ӥ塼���������</a>

</div>

</td>
</tr>
<!-- �����ޤǡ������ơ��ӥ塼����������� -->
({*********})
<tr>
<td align="center" valign="middle" colspan="2">

<hr>

</td>
</tr>
({********})
<!-- �������顧�����ơ䥫�ƥ����� -->
<tr>
<td valign="top" align="right">

<div class="padding_s">

���ƥ���&nbsp;<img src="./skin/icon_arrow_2.gif" class="icon">

</div>

</td>
<td valign="top">

<div class="padding_s">

({foreach from=$category_disp key=key item=item})
({if $key!=1}) - ({/if})
<a href="page.php?p=h_review_search&category=({$key})">({$item})</a>
({/foreach})

</div>

</td>
</tr>
<!-- �����ޤǡ������ơ䥫�ƥ����� -->
({********})
</table>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
</form>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����������ӥ塼�������¤��ؤ�****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({* if $result *})
<!-- ************************************ -->
<!-- ******�������顧�������****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *�������顧������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="c_00"><span class="b_b">��ӥ塼����</span>&nbsp;&nbsp;***&nbsp;<span class="b_b">
({if $total_num})
	({$total_num})
({else})
	0
({/if})
��</span>&nbsp;���������ޤ�����</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
<!-- �������顧��ӥ塼�������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev})<a href="page.php?p=h_review_search&keyword=({$keyword})&category=({$category})&orderby=({$orderby})&direc=-1&page=({$page})">����ɽ��</a> ({/if})
({if $total_num})
({$start_num})���({$end_num})���ɽ��
({/if})
({if $is_next})<a href="page.php?p=h_review_search&keyword=({$keyword})&category=({$category})&orderby=({$orderby})&direc=1&page=({$page})">����ɽ��</a>({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ���ӥ塼�������ɽ������ -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- *�������顧������* -->
<!-- *�������顧����������ơ�侦�ʾ���* -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$result item=item})
<!--����ӥ塼1��ʬ��������-->
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:180px;" class="bg_02" rowspan="7" align="center">

<div class="padding_s">

<a href="({$item.url})" target="_blank"><img src="({$item.image_medium})"><br>�ܺ٤򸫤�</a>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:70px;" class="bg_03" align="center">

<div class="padding_s">

�����ȥ�

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:382px;">

<div class="padding_s">

<span class="b_b">({$item.title})</span>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;height:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:455px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_03" align="center">

<div class="padding_s">

�ǿ���ӥ塼

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left">

<div class="padding_s">

({$item.body|t_url2a|nl2br})

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;height:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_03" align="center">

<div class="padding_s">

��������

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left">

<div class="padding_s">

({$item.r_datetime|date_format:"%m��%d�� %H:%M"})
</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;height:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="right" colspan="3">

<div class="padding_s">
<a href="page.php?p=h_review_list_product&amp;c_review_id=({$item.c_review_id})">���ƤΥ�ӥ塼�򸫤� (({$item.write_num|default:0}))</a>
({*<a href="page.php?p=h_review_add_write&category_id=({$item.c_review_category_id})&asin=({$item.asin})">��ӥ塼���</a>*})

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!--����ӥ塼1��ʬ�����ޤ�-->
({/foreach})
</table>
<!-- *�����ޤǡ�����������ơ�侦�ʾ���* -->
<!-- *�����ޤǡ�������* -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧��ӥ塼�������ɽ������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev})<a href="page.php?p=h_review_search&keyword=({$keyword})&category=({$category})&orderby=({$orderby})&direc=-1&page=({$page})">����ɽ��</a> ({/if})
({if $total_num})
({$start_num})���({$end_num})���ɽ��
({/if})
({if $is_next})<a href="page.php?p=h_review_search&keyword=({$keyword})&category=({$category})&orderby=({$orderby})&direc=1&page=({$page})">����ɽ��</a>({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ���ӥ塼�������ɽ������ -->
({*�������顧footer*})
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��������****** -->
<!-- ************************************ -->
({* /if *})


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
