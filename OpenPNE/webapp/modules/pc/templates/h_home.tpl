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
<td class="container inc_search_box">
({ext_include file="inc_search_box.tpl"})
</td>
</tr>
<tr>
<td class="container inc_info">
({ext_include file="inc_info.tpl"})
</td>
</tr>
({if $inc_entry_point[3]})
<tr>
<td class="container">
({$inc_entry_point[3]|smarty:nodefaults})
</td>
</tr>
({/if})
<tr>
<td class="container main_content">
<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="left_content" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})

({if $inc_entry_point[4]})
({$inc_entry_point[4]|smarty:nodefaults})
({/if})

<!-- **************************************** -->
<!-- ******�������顧��ʬ�μ̿��ڤӥ˥å��͡�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:254px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:254px;height:7px;" class="dummy"></td>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center" class="bg_01">
<!-- *�������顧��ʬ�μ̿��ڤӥ˥å��͡������������* -->
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

<img src="./img.php?filename=({if $c_member.image_filename})({$c_member.image_filename})&w=180&h=180({else})no_image.gif&w=180&h=180({/if})" class="pict" alt="�̿�" style="margin:2px">

<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<a href="page.php?p=h_config_image">
<img src="./skin/button_edit_photo.gif"></a>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
<tr>
<td>
<a href="page.php?p=h_prof">
<img src="./skin/button_prof_conf.gif"></a>
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
</table>

</td>
</tr>
</table>

</div>
<!-- �����ޤǡ��̿� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧��ʬ�Υ˥å��͡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:256px;">
<tr>
<td align="center" class="bg_05">
<img src="./skin/dummy.gif" class="v_spacer_m">
({$c_member.nickname})���� (({$c_friend_count}))
</td>
</tr>
</table>
<!-- �����ޤǡ���ʬ�Υ˥å��͡��� -->
({*�������顧footer*})
<!-- *�����ޤǡ���ʬ�μ̿��ڤӥ˥å��͡������������* -->
</td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ���ʬ�μ̿��ڤӥ˥å��͡�����****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[5]})
({$inc_entry_point[5]|smarty:nodefaults})
({/if})

<!-- ********************************** -->
<!-- ******�������顧ͧ�͡��οͰ���****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td>
<!-- *�������顧ͧ�͡��οͰ����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px" class="border_07">
<tr>
<td style="width:25px;" class="bg_06"><img src="./skin/icon_title_1.gif" style="width:25px;height:19px;" class="dummy"></td>
<td style="width:241px;" class="bg_06"><span class="b_b c_00">({$WORD_MY_FRIEND})�ꥹ��</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_friend_list[0]})
({*������img*})
<tr>

({t_loop from=$c_friend_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({*������name*})
<tr>

({t_loop from=$c_friend_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_friend_list[3]})
<!-- ������img -->
<tr>

({t_loop from=$c_friend_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">
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

({t_loop from=$c_friend_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_friend_list[6]})
<!-- ������img -->
<tr>

({t_loop from=$c_friend_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">
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

({t_loop from=$c_friend_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
({$item.nickname})(({$item.friend_count}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})

({/t_loop})

</tr>

({/if})

</table>

<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">
<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_friend_list">���Ƥ򸫤�(({$c_friend_count})��)</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_invite">({$WORD_FRIEND})���Ԥ���</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_search">���С�����</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_manage_friend">({$WORD_MY_FRIEND})����</a>
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
<!-- *�����ޤǡ�ͧ�͡��οͰ����������* -->
</td>
</tr>
</table>
<!-- ******�����ޤǡ�ͧ�͡��οͰ���****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[6]})
({$inc_entry_point[6]|smarty:nodefaults})
({/if})

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ�����****** -->
({if $c_commu_user_list})
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin;margin:0px auto;" class="border_07">
<tr>
<td>
<!-- *�������顧���ߥ�˥ƥ������������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px" class="border_07">
<tr>
<td style="width:25px;" class="bg_06"><img src="./skin/icon_title_1.gif" style="width:25px;height:19px;" class="dummy"></td>
<td style="width:241px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ��ꥹ��</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_commu_user_list[0]})
({*������img*})
<tr>

({t_loop from=$c_commu_user_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({*������name*})
<tr>

({t_loop from=$c_commu_user_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_user_list[3]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_user_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_user_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_user_list[6]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_user_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">
({if $item.c_member_id_admin == $c_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
<img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_logo_small.gif&w=76&h=76({/if})" class="pict"></a>
</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_user_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_members}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

</table>

<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">

<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_com_list">���Ƥ򸫤�(({$fh_com_count_user}))</a>
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
<!-- *�����ޤǡ����ߥ�˥ƥ������������* -->
</td>
</tr>
</table>
({/if})
<!-- ******�����ޤǡ����ߥ�˥ƥ�����****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[7]})
({$inc_entry_point[7]|smarty:nodefaults})
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

({if $inc_entry_point[8]})
({$inc_entry_point[8]|smarty:nodefaults})
({/if})

({if $inc_entry_point[9]})
({$inc_entry_point[9]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******�������顧�ǿ��������****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧�ǿ��������������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:100px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�ǿ�����</span></td>
<td style="width:290px;" align="right" class="bg_06">({*<a href="javascript:void(0);">���Ӥ���ǿ����������å�</a>*})&nbsp;</td>
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
<table border="0" cellspacing="1" style="width:424px;">
<!-- �������顧�����ơ�ե��ɺǿ����� -->
({if $c_diary_friend_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})�ǿ�����</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_friend_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject|default:"&nbsp;"})</a>&nbsp;(({$item.nickname|default:"&nbsp;"}))
({if $item.image_filename_1 || $item.image_filename_2 || $item.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- �������顧�����ơ�ե��ɺǿ�������եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_diary_list_friend">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ե��ɺǿ�������եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ե��ɺǿ����� -->
<!-- �������顧�����ơ�ޥ��ե��ɺǿ�Blog -->
({if $c_rss_cache_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})�ǿ�Blog</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_rss_cache_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="({$item.link})" target="_blank">({$item.subject|default:"&nbsp;"})</a>(({$item.c_member.nickname|default:"&nbsp;"}))<br>
({/foreach})

</div>

<!-- �������顧�����ơ�ޥ��ե��ɺǿ�Blog��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_diary_list_friend#blog">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ޥ��ե��ɺǿ�Blog��եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ޥ��ե��ɺǿ�Blog -->

<!-- �������顧�����ơ������ؤΥ����� -->
({if $c_diary_my_comment_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">���������ȵ�������</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_my_comment_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject})(({$item.num_comment}))</a>&nbsp;(({$item.nickname}))<br>
({/foreach})

</div>

<!-- �������顧�����ơ������ؤΥ����ȡ�եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=h_diary_comment_list">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ������ؤΥ����ȡ�եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ������ؤΥ����� -->
<!-- �������顧�����ơ䥳�ߥ�˥ƥ��ǿ��񤭹��� -->
({if $c_commu_topic_comment_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">���ߥ�˥ƥ��ǿ��񤭹���</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_commu_topic_comment_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_2">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=c_topic_detail&target_c_commu_topic_id=({$item.c_commu_topic_id})">({$item.c_commu_topic_name})(({$item.number}))</a>&nbsp;(({$item.c_commu_name}))
({if $item.image_filename1 || $item.image_filename2 || $item.image_filename3})<img src="./skin/icon_camera.gif" class="icon">({/if})
({if $item.file_filename1 || $item.file_filename2 || $item.file_filename3})<img src="./skin/icon_file.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- �������顧�����ơ䥳�ߥ�˥ƥ��ǿ��񤭹��ߡ�եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_com_comment_list">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ䥳�ߥ�˥ƥ��ǿ��񤭹��ߡ�եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ䥳�ߥ�˥ƥ��ǿ��񤭹��� -->
<!-- �������顧�����ơ�ޥ��ե��ɺǿ���ӥ塼 -->
({if $c_friend_review_list})
<tr>
<td style="width:80px;" class="bg_09">

<div class="padding_s">

<span class="c_01">({$WORD_MY_FRIEND})<br>�ǿ�<br>��ӥ塼</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_friend_review_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|t_truncate:30})</a>&nbsp;(({$item.nickname}))<br>
({/foreach})

</div>

<!-- �������顧�����ơ�ޥ��ե��ɺǿ���ӥ塼��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=h_friend_review_list">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ޥ��ե��ɺǿ���ӥ塼��եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ޥ��ե��ɺǿ���ӥ塼 -->
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ʾ�������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ǿ��������****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[10]})
({$inc_entry_point[10]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******�������顧���ʾ������****** -->
({if $c_diary_list || $c_blog_list || $c_review_list})
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧���ʾ�������������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:390px;padding:2px 0px;" class="bg_06"><b class="c_00">�Ƕ����������ӥ塼</b></td>
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
<td class="bg_01">
<table border="0" cellspacing="1" cellpadding="0" style="width:424px;">
<!-- �������顧�����ơ�ǿ������� -->
({if $c_diary_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">�ǿ�������</span>

</div>

</td>
<td style="width:342px;" class="bg_02">

<div class="padding_s">

({foreach from=$c_diary_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=fh_diary&amp;target_c_diary_id=({$item.c_diary_id})">({$item.subject|t_truncate:40})</a>
({if $item.image_filename_1 || $item.image_filename_2 || $item.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})<br>
({/foreach})

</div>

<!-- �������顧�����ơ�ǿ���������եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_diary_list">��ä��ɤ�</a>
</td>
</tr>
<tr>
<td class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1" class="diary2">
<a href="page.php?p=h_diary_add">�������</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ǿ���������եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ǿ������� -->
<!-- �������顧�����ơ�ǿ���Blog -->
({if $c_blog_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">�ǿ���Blog</span>

</div>

</td>
<td class="bg_02">

<div class="padding_s">

({foreach from=$c_blog_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_2">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="({$item.link})" target="_blank">({$item.subject|t_truncate:40})</a><br>
({/foreach})

</div>

<!-- �������顧�����ơ�ǿ���Blog��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_diary_list#blog">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ǿ���Blog��եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ǿ���Blog -->
<!-- �������顧�����ơ�ǿ��Τ��������ӥ塼 -->
({if $c_review_list})
<tr>
<td style="width:80px;" class="bg_09" nowrap="nowrap">

<div class="padding_s">

<span class="c_01">�ǿ���<br>��������<br>��ӥ塼</span>

</div>

</td>
<td class="bg_02">

<div class="padding_s">

({foreach from=$c_review_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_3">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="./page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|t_truncate:30})</a><br>
({/foreach})

</div>

<!-- �������顧�����ơ�ǿ��Τ��������ӥ塼��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="./page.php?p=fh_review_list_member">��ä��ɤ�</a>
</td>
</tr>
<tr>
<td class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="./page.php?p=h_review_add">��ӥ塼���</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ǿ��Τ��������ӥ塼��եå�����˥塼 -->

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�ǿ��Τ��������ӥ塼 -->
</table>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:426px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:424px;height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ʾ�������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ʾ������****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">
({/if})

({if $inc_entry_point[11]})
({$inc_entry_point[11]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******�������顧¾��ɾ������****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧¾��ɾ�������������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:34px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:390px;" class="bg_06"><span class="b_b">({$WORD_MY_FRIEND})����ξҲ�ʸ</span></td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- ������ -->
<div class="bg_04" style="width:424px;">
<table border="0" cellspacing="1" cellpadding="7" style="width:424px;">
({foreach from=$c_friend_intro_list item=item})
<tr>
<td align="center" style="width:125px;" class="bg_03">
<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=76&h=76({else})no_image.gif&w=76&h=76({/if})" border="0" alt="�̿�"><br>({$item.nickname})</a>
</td>
<td style="width:300px;" class="bg_02">
({$item.intro|t_truncate:"200"|t_url2a|nl2br})
</td>
</tr>
({/foreach})
</table>
</div>
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:321px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="width:101px;padding:5px 0px;" class="bg_02 lh_140">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_intro">���Ƹ���</a>
<br>
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=h_manage_friend">�Ҳ�ʸ���</a>
</td>
<td style="width:1px;" class="bg_04"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;height:1px;" class="bg_04" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
({*�����ޤǡ�footer*})
</div>
<!-- *�����ޤǡ�¾��ɾ�������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ�¾��ɾ������****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[12]})
({$inc_entry_point[12]|smarty:nodefaults})
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
({if $rss})
<br>
({foreach from=$news item=entry})
<a href="({$entry.link})" target="_blank">({$entry.title})</a><br>
({/foreach})
({/if})
</body>
</html>
