({$inc_html_header|smarty:nodefaults})
<body>
({ext_include file="inc_extension_pagelayout_top.tpl"})
<table class="mainframe" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="container inc_page_header">
({$inc_page_header|smarty:nodefaults})
</td>
</tr>
({if $inc_entry_point[1]})
<tr>
<td class="container">
({$inc_entry_point[1]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container inc_navi">
({$inc_navi|smarty:nodefaults})
</td>
</tr>
({if $inc_entry_point[2]})
<tr>
<td class="container">
({$inc_entry_point[2]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container main_content" align="center">

({ext_include file="inc_alert_box.tpl"})({* ���顼��å���������ƥ� *})

</td>
</tr>
<tr>
<td class="container main_content">

<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="left_content" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})

({if $inc_entry_point[3]})
({$inc_entry_point[3]|smarty:nodefaults})
({/if})

<!-- *********************************************** -->
<!-- ******�������顧���ߥ�˥ƥ��μ̿��ڤ�̾����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:254px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:254px;height:7px;" class="dummy"></td>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center" class="bg_01">
<!-- *�������顧���ߥ�˥ƥ��μ̿��ڤ�̾�����������* -->
({*�������顧header*})
<!-- ̵�� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧�̿� -->
<div class="border_07 bg_02" align="center">

<table border="0" cellspacing="0" cellpadding="0" style="width:254px;">
<tr>
<td align="center">

<img src="./skin/dummy.gif" class="v_spacer_m">

<img src="./img.php?filename=({if $c_commu.image_filename})({$c_commu.image_filename})&w=180&h=180({else})no_logo.gif&w=180&h=180({/if})" class="pict">

<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
</tr>
</table>

</div>
<!-- �����ޤǡ��̿� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧��ʬ��̾�� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:256px;">
<tr>
<td align="center" class="bg_05">
<img src="./skin/dummy.gif" class="v_spacer_m">
({$c_commu.name})
</td>
</tr>
</table>
<!-- �����ޤǡ����ߥ�˥ƥ���̾�� -->
({*�������顧footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ��μ̿��ڤ�̾�����������* -->
</td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ��μ̿��ڤ�̾����****** -->
<!-- *********************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[4]})
({$inc_entry_point[4]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******�������顧���С�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td>
<!-- *�������顧���С������������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px" class="border_07">
<tr>
<td style="width:25px;" class="bg_06"><img src="./skin/icon_title_1.gif" style="width:25px;height:19px;" class="dummy"></td>
<td style="width:241px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ����С�</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧����ͥ����̾�� -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_commu_member_list[0]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_member_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_member_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})����(({$item.friend_count|default:"0"}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_member_list[3]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_member_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_member_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})����(({$item.friend_count|default:"0"}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_member_list[6]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_member_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_member_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})����(({$item.friend_count|default:"0"}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

</table>

<!-- �����ޤǡ�����ͥ����̾�� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">
<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=c_member_list&target_c_commu_id=({$c_commu.c_commu_id})">���Ƥ򸫤�(({$c_commu.member_count})��)</a>
({if $is_c_commu_admin})
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=c_edit_member&target_c_commu_id=({$c_commu.c_commu_id})">���С�����</a>
({/if})
</td>
<td style="width:15px;"><img src="./skin/dummy.gif" style="width:15px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:268px;" class="bg_07" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ�����˥塼 -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����С������������* -->
</td>
</tr>
</table>
<!-- ******�����ޤǡ����С�����****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[5]})
({$inc_entry_point[5]|smarty:nodefaults})
({/if})

({********************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})
</td>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="right_content" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʱ���**})
({********************************})

({if $inc_entry_point[6]})
({$inc_entry_point[6]|smarty:nodefaults})
({/if})

<!-- **************************************** -->
<!-- ******�������顧���ߥ�˥ƥ��������****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧���ߥ�˥ƥ��������������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:100px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ�</span></td>
<td style="width:290px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:426px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center">
<table border="0" cellspacing="1" cellpadding="4" style="width:424px;">
<!-- �������顧�����ơ䥳�ߥ�˥ƥ���̾�� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ߥ�˥ƥ�̾</span></td>
<td style="width:342px;" class="bg_02">

({$c_commu.name})

</td>
</tr>
<!-- �����ޤǡ������ơ䥳�ߥ�˥ƥ���̾�� -->
<!-- �������顧�����ơ䳫���� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">������</span></td>
<td style="width:342px;" class="bg_02">

({$c_commu.r_datetime|date_format:"%Yǯ%m��%d��"})

</td>
</tr>
<!-- �����ޤǡ������ơ䳫���� -->
<!-- �������顧�����ơ������ -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">������</span></td>
<td style="width:342px;" class="bg_02">

<a href="page.php?p=f_home&amp;target_c_member_id=({$c_commu.c_member_id_admin})">({$c_commu.c_member_admin.nickname})</a>

</td>
</tr>
<!-- �����ޤǡ������ơ������ -->
<!-- �������顧�����ơ䥫�ƥ��� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ƥ���</span></td>
<td style="width:342px;" class="bg_02">

({$c_commu.c_commu_category.name|default:"&nbsp;"})

</td>
</tr>
<!-- �����ޤǡ������ơ䥫�ƥ��� -->
<!-- �������顧�����ơ���С��� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���С���</span></td>
<td style="width:342px;" class="bg_02">

({$c_commu.member_count|default:"��"})��

</td>
</tr>
<!-- �����ޤǡ������ơ���С��� -->
<!-- �������顧�����ơ仲�þ��ȸ�����٥� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���þ���<br>�����ϰ�</span></td>
<td style="width:342px;" class="bg_02">

({if $c_commu.public_flag == 'public'})
����Ǥ⻲�äǤ���(����)
({elseif $c_commu.public_flag == 'auth_public'})
�����ͤξ�ǧ��ɬ��(����)
({elseif $c_commu.public_flag == 'auth_sns'})
�����ͤξ�ǧ��ɬ��(����)
({elseif $c_commu.public_flag == 'auth_commu_member'})
�����ͤξ�ǧ��ɬ��(�����)
({/if})

</td>
</tr>
<!-- �����ޤǡ������ơ仲�þ��ȸ�����٥� -->
<!-- �������顧�����ơ䥳�ߥ�˥ƥ������� -->
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ߥ�˥ƥ�<br>����ʸ</span></td>
<td style="width:342px;" class="bg_02">

({$c_commu.info|t_url2a|nl2br})

</td>
</tr>
<!-- �����ޤǡ������ơ䥳�ߥ�˥ƥ������� -->
({if $is_c_commu_member || $c_commu.public_flag neq "auth_commu_member"})
<!-- �������顧�����ơ俷��Υȥԥå��񤭹��� -->
({if $new_topic_comment})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ߥ�˥ƥ�<br>�Ǽ���</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$new_topic_comment item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})">({$item.name})</a>
({if $item.image_filename1 || $item.image_filename2 || $item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1 || $item.file_filename2 || $file.image_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})<br>
({/foreach})

<!-- �������顧�����ơ俷��Υȥԥå��񤭹��ߡ�եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})">��ä��ɤ�</a>
</td>
</tr>
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_topic_add&amp;target_c_commu_id=({$c_commu.c_commu_id})">�ȥԥå������</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ俷��Υȥԥå��񤭹��ߡ�եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ俷��Υȥԥå��񤭹��� -->
<!-- �������顧�����ơ俷��Υ��٥�Ƚ񤭹��� -->
({if $new_topic_comment_event})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">�����<br>���٥��<br>�񤭹���</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$new_topic_comment_event item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=c_event_detail&amp;target_c_commu_topic_id=({$item.c_commu_topic_id})">({$item.name})</a>
({if $item.image_filename1 || $item.image_filename2 || $item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1 || $item.file_filename2 || $file.image_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})
<br>
({/foreach})

<!-- �������顧�����ơ俷��Υ��٥�Ƚ񤭹��ߡ�եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_topic_list&amp;target_c_commu_id=({$c_commu.c_commu_id})">��ä��ɤ�</a>
</td>
</tr>
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_event_add&amp;target_c_commu_id=({$c_commu.c_commu_id})">���٥�Ȥ����</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ俷��Υ��٥�Ƚ񤭹��ߡ�եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ俷��Υ��٥�Ƚ񤭹��� -->
<!-- �������顧�����ơ俷��Τ��������ӥ塼 -->
({if $new_commu_review})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">�����<br>��������<br>��ӥ塼</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$new_commu_review item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_2">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|truncate:40})</a><br>
({/foreach})

<!-- �������顧�����ơ俷��Τ��������ӥ塼��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_member_review&target_c_commu_id=({$c_commu.c_commu_id})">��ä��ɤ�</a>

</td>
</tr>
<tr>
<td style="width:180px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=c_member_review_add&target_c_commu_id=({$c_commu.c_commu_id})">���������Ǻ�</a>

</td>
</tr>
</table>
<!-- �����ޤǡ������ơ俷��Τ��������ӥ塼��եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ俷��Τ��������ӥ塼 -->
({/if})
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
({if !$new_topic_comment || !$new_topic_comment_event || $is_c_commu_admin})
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:271px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="width:151px;padding:5px 0px;" class="bg_02 lh_140">
({if $is_c_commu_member || $c_commu.public_flag neq "auth_commu_member"})
({if !$new_topic_comment})
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=c_topic_add&amp;target_c_commu_id=({$c_commu.c_commu_id})">�ȥԥå������</a>
<br>
({/if})
({if !$new_topic_comment_event})
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=c_event_add&amp;target_c_commu_id=({$c_commu.c_commu_id})">���٥�Ȥ����</a>
<br>
({/if})
({/if})
({if $is_c_commu_admin})
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=c_edit&amp;target_c_commu_id=({$c_commu.c_commu_id})">���ߥ�˥ƥ������ѹ�</a>
<br>
({/if})
<br>
</td>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;height:1px;" class="bg_04" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
({/if})
<!-- �����ޤǡ�����˥塼 -->
({*�����ޤǡ�footer*})
({*�������顧*})

({if $is_c_commu_member})
<!-- �������顧������ -->
<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="cmd" value="c_home_update_is_receive_mail">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">

<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:426px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center">
<table border="0" cellspacing="1" cellpadding="4" style="width:424px;">
({if $smarty.const.OPENPNE_ENABLE_KTAI})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ߥ�˥ƥ�<br>�񤭹��ߤ�<br>���ӥ᡼���</span></td>
<td style="width:342px;" class="bg_02">

<input type="radio" value="1" name="is_receive_mail"({if $is_receive_mail}) checked="checked"({/if}) class="no_bg">�������<br>
<input type="radio" value="0" name="is_receive_mail"({if !$is_receive_mail}) checked="checked"({/if}) class="no_bg">�������ʤ�

</td>
</tr>
({/if})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���ߥ�˥ƥ�<br>�񤭹��ߤ�<br>PC�᡼���</span></td>
<td style="width:342px;" class="bg_02">

<input type="radio" value="1" name="is_receive_mail_pc"({if $is_receive_mail_pc}) checked="checked"({/if}) class="no_bg">�������<br>
<input type="radio" value="0" name="is_receive_mail_pc"({if !$is_receive_mail_pc}) checked="checked"({/if}) class="no_bg">�������ʤ�

</td>
</tr>
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">&nbsp;</span></td>
<td style="width:342px;" class="bg_02">

<input type="submit" value="�᡼����������ѹ�">

</td>
</tr>
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
</div>

</form>
({/if})
({*�����ޤǡ�*})
<!-- *�����ޤǡ����ߥ�˥ƥ���������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ��������****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[7]})
({$inc_entry_point[7]|smarty:nodefaults})
({/if})

({********************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ�ġʱ���**})
({********************************})
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
