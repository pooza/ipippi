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

<!-- ********************************** -->
<!-- ******�������顧��ӥ塼���****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05" align="center">
<!-- *�������顧��ӥ塼��񤯡�����* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">��ӥ塼���</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01" class="bg_05">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:548px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" valign="middle">

<!-- �������顧�����ơ�����ȡ�両������ʸ -->
<div style="padding:10px 30px 10px 30px;text-align:left;">

��ӥ塼��񤭤������ʤ򸡺����ޤ���<br>
������ɤ����Ϥ����������륫�ƥ�������򤷤Ƥ���������<br>


</div>
<!-- �����ޤǡ������ơ�����ȡ�両������ʸ -->


<!-- �������顧�����ơ�����ȡ�両���ե����� -->
<div style="padding:10px 0px;text-align:center;">

<form action="page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="p" value="h_review_add">
<input type="hidden" name="search_flag" value="1">
�������&nbsp;<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">
<input name="keyword" size="15" value="({$keyword})">
&nbsp;���ƥ���&nbsp;<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">
<select name="category_id">
<option value="" selected="selected">���򤷤Ƥ�������
({html_options options=$category_disp selected=$category_id})
</select>
&nbsp;<input type="submit" name="button" value="���� ����">
</form>

</div>
<!-- �����ޤǡ������ơ�����ȡ�両���ե����� -->

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ������ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ���ӥ塼��񤯡������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ���ӥ塼���****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({if $search_result})
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
<!-- *�������顧�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="c_00"><span class="b_b">({$keyword})�θ������</span>&nbsp;&nbsp;***&nbsp;<span class="b_b">({$total_num})��</span>&nbsp;���������ޤ�����</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
<!-- �������顧����ɽ������ -->
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

({if $is_prev}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page-1})">����ɽ��</a>&nbsp;&nbsp;({/if})
({$start_num})���({$end_num})���ɽ��&nbsp;&nbsp;
({if $is_next}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page+1})">����ɽ��</a>({/if})

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
<!-- �����ޤǡ�����ɽ������ -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- *�������顧����������ơ�侦�ʾ���* -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$search_result item=product key=key})
<!--����ӥ塼1��ʬ��������-->
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:180px;" class="bg_02" rowspan="5" align="center">

<div class="padding_s">

({strip})
<a href="({$product.DetailPageURL})" target="_blank">
({if $product.MediumImage})<img src="({$product.MediumImage.URL})"><br>({/if})
�ܺ٤򸫤�
</a>
({/strip})

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

<span class="b_b">({$product.ItemAttributes.Title})</span>

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

����

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left">

<div class="padding_s">

({if $product.ItemAttributes.Publisher})
<div>����: ({$product.ItemAttributes.Publisher})</div>
({/if})

({if $product.ItemAttributes.Platform})
<div>�о�: ({$product.ItemAttributes.Platform})</div>
({/if})

({if $product.ItemAttributes.ReleaseDate})
<div>ȯ��: ({$product.ItemAttributes.ReleaseDate|bs_date_format:'Yǯn��j��'})</div>
({/if})

({if $product.ItemAttributes.Creator})
<p>
({foreach from=$product.ItemAttributes.Creator item='creator' name='creators'})
({$creator.Role}): ({$creator._content})
({if !$smarty.foreach.creators.last})<br>({/if})
({/foreach})
</p>
({/if})

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

<a href="page.php?p=h_review_add_write&category_id=({$category_id})&asin=({$product.ASIN})">��ӥ塼���</a>

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
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����ɽ������ -->
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

({if $is_prev}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page-1})">����ɽ��</a>&nbsp;&nbsp;({/if})
({$start_num})���({$end_num})���ɽ��&nbsp;&nbsp;
({if $is_next}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page+1})">����ɽ��</a>({/if})

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
<!-- �����ޤǡ�����ɽ������ -->
({*�������顧footer*})
<!-- *�����ޤǡ������������* -->
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
({/if})

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
