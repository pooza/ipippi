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

({if $is_h_prof})({* -------- ��ʬ�Υץ�ե������ǧ��:�������� -------- *})

<tr>
<td class="container" align="center">

<img src="./skin/dummy.gif" class="v_spacer_s">

<!-- ************************************ -->
<!-- ******�������顧�ץ�ե������ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:680px;margin:0px auto;" class="border_07">
({*********})
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:666px;" class="bg_00"><img src="./skin/dummy.gif" style="width:666px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧������* -->

<table class="container" border="0" cellspacing="1" cellpadding="4" style="width:666px;">
<tr>
<td style="width:664px;" class="bg_02">

<div class="padding_s">

<span class="c_01">��¾�Υ��С����鸫�����ʤ��Υڡ����Ϥ��Τ褦�ˤʤ�ޤ���<br>
�ץ�ե�������ѹ�������&nbsp;��<a href="page.php?p=h_config_prof">�ץ�ե������ѹ�</a>��&nbsp;��ꤪ���ʤ��ޤ���</span>

</div>

</td>
</tr>
</table>

<!-- *�����ޤǡ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ******�����ޤǡ��ץ�ե������ǧ****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</td>
</tr>

({* -------- ��ʬ�Υץ�ե������ǧ��:�����ޤ� -------- *})

({else})({* -------- ¾���С��Υץ�ե�����:�������� -------- *})


({if !$is_friend})
<tr>
<td class="container f_link_request_box" align="center">

<img src="./skin/dummy.gif" class="v_spacer_s">

<!-- ********************************** -->
<!-- ******�������顧ͧ�Ͱ������ɲ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:680px;margin:0px auto;" class="border_07">
({*********})
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:666px;" class="bg_00"><img src="./skin/dummy.gif" style="width:666px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧������* -->

<table class="container" border="0" cellspacing="1" cellpadding="4" style="width:666px;">
<tr>
<td style="width:460px;" class="bg_09">
<span class="c_01">&nbsp;��&nbsp;({$target_c_member.nickname})�����ľ�ܤ�ͧ�͡��οͤξ�硢({$WORD_MY_FRIEND})�������ɲä��ޤ��礦��</span>
</td>
<td style="width:203px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1"><a href="do.php?cmd=f_link_request&target_c_member_id=({$target_c_member.c_member_id})&amp;sessid=({$PHPSESSID})">({$WORD_MY_FRIEND})���ɲ�</a>
</td>
</tr>
</table>

<!-- *�����ޤǡ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:666px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ******�����ޤǡ�ͧ�Ͱ������ɲ�****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_s">

</td>
</tr>
({/if})
({if $is_friend && $my_friend_intro==''})
<tr>
<td class="container" align="center">

<img src="./skin/dummy.gif" class="v_spacer_s">

<!-- ********************************** -->
<!-- ******�������顧�Ҳ�ʸ�Υ�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:680px;margin:0px auto;" class="border_07">
({*********})
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:666px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧������* -->

<table class="container" border="0" cellspacing="1" cellpadding="4" style="width:666px;">
({*********})
<tr>
<td style="width:460px;" class="bg_09">

<span class="c_01">&nbsp;��&nbsp;({$target_c_member.nickname})�����ߤ�ʤ˾Ҳ𤷤ޤ��礦��</span>

</td>
<td style="width:203px;" class="bg_02">

<img src="./skin/dummy.gif" class="icon arrow_1"><a href="page.php?p=f_intro_edit&target_c_member_id=({$target_c_member.c_member_id})">�Ҳ�ʸ���</a>

</td>
</tr>
({*********})
</table>

<!-- *�����ޤǡ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
({*********})
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ******�����ޤǡ��Ҳ�ʸ�Υ�����****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</td>
</tr>
({/if})

({/if})({* -------- ¾���С��Υץ�ե�����:�����ޤ� -------- *})


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

<!-- **************************************** -->
<!-- ******�������顧ͧ�ͤμ̿��ڤӥ˥å��͡�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:254px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:254px;height:7px;" class="dummy"></td>
<td style="width:7px;height:7px;" class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center" class="bg_01">
<!-- *�������顧ͧ�ͤμ̿��ڤӥ˥å��͡������������* -->
({*�������顧header*})
({if !$is_h_prof})
<!-- �������顧ͧ�ͤȤδط� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:256px;">
<tr>
<td align="center" class="bg_05">
({if ($is_friend || $friend_path)})
({$c_member.nickname}) 
({if $friend_path}) �� <a href="page.php?p=f_home&target_c_member_id=({$friend_path.c_member_id})">({$friend_path.nickname})</a>({/if})
�� <a href="page.php?p=f_home&target_c_member_id=({$target_c_member.c_member_id})">({$target_c_member.nickname})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
</table>
<!-- �����ޤǡ�ͧ�ͤȤδط� -->
({/if})
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧�̿� -->
<div class="border_07 bg_02" align="center">

<table border="0" cellspacing="0" cellpadding="0" style="width:254px;">
<tr>
<td align="center">

<img src="./skin/dummy.gif" class="v_spacer_m">

<img src="img.php?filename=({if $target_c_member.image_filename})({$target_c_member.image_filename})({else})no_image.gif({/if})&w=180&h=180" class="pict">

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $target_c_member.image_filename})
<table border="0" cellspacing="0" cellpadding="0">
<tr>
<td>
<img src="./skin/dummy.gif" class="v_spacer_s">
({if $is_h_prof})
<a href="page.php?p=h_config_image">
<img src="./skin/button_edit_photo.gif"></a>
({else})
<a href="page.php?p=f_show_image&target_c_member_id=({$target_c_member.c_member_id})">
<img src="./skin/button_show_photo.gif"></a>
({/if})
<img src="./skin/dummy.gif" class="v_spacer_s">
</td>
</tr>
</table>
({/if})

</td>
</tr>
</table>

</div>
<!-- �����ޤǡ��̿� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧ͧ�ͤΥ˥å��͡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:256px;">
<tr>
<td align="center" class="bg_05">
<img src="./skin/dummy.gif" class="v_spacer_m">
({$target_c_member.nickname})����(({$c_friend_count}))<br>
(�ǽ��������({$target_c_member.last_login}))<br>
</td>
</tr>
</table>
<!-- �����ޤǡ�ͧ�ͤΥ˥å��͡��� -->
({*�������顧footer*})
<!-- *�����ޤǡ�ͧ�ͤμ̿��ڤӥ˥å��͡������������* -->
</td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ�ͧ�ͤμ̿��ڤӥ˥å��͡�����****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[4]})
({$inc_entry_point[4]|smarty:nodefaults})
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
<td style="width:241px;" class="bg_06"><span class="b_b c_00">({$WORD_FRIEND})�ꥹ��</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧����ͥ���ȥ˥å��͡��� -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_friend_list[0]})
({*������img*})
<tr>

({t_loop from=$c_friend_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">

<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({if $item.image_filename})<img src="./img.php?filename=({$item.image_filename})&w=76&h=76" class="pict">({else})<img src="./img.php?filename=no_image.gif&w=76&h=76" class="pict">({/if})</a>

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

<!-- �����ޤǡ�����ͥ���ȥ˥å��͡��� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">

<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td align="left" style="width:136px;padding:2px 0px;" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_friend_list&target_c_member_id=({$target_c_member_id})">���Ƥ򸫤�(({$c_friend_count})��)</a>
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

({if $inc_entry_point[5]})
({$inc_entry_point[5]|smarty:nodefaults})
({/if})

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ�����****** -->
({if $c_commu_list})
<table border="0" cellspacing="0" cellpadding="0" style="width:268px;margin:0px auto;" class="border_07">
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
<!-- �������顧����ͥ���ȥ˥å��͡��� -->
<table border="0" cellspacing="1" cellpadding="2" style="width:268px" class="bg_07">

({if $c_commu_list[0]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_list start=0 num=3})
({if $item})
<td style="width:88px;" class="bg_03" align="center">

<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">({if $item.image_filename})<img src="./img.php?filename=({$item.image_filename})&w=76&h=76" class="pict">({else})<img src="./img.php?filename=no_logo_small.gif&w=76&h=76" class="pict">({/if})</a>

</td>
({else})
<td style="width:88px;" class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_list start=0 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">

({$item.name})(({$item.count_commu_member}))

</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_list[3]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_list start=3 num=3})
({if $item})
<td class="bg_03" align="center">

<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">({if $item.image_filename})<img src="./img.php?filename=({$item.image_filename})&w=76&h=76" class="pict">({else})<img src="./img.php?filename=no_logo_small.gif&w=76&h=76" class="pict">({/if})</a>

</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_list start=3 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">

({$item.name})(({$item.count_commu_member}))

</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

({/if})

({*************************************************************})

({if $c_commu_list[6]})
<!-- ������img -->
<tr>

({t_loop from=$c_commu_list start=6 num=3})
({if $item})
<td class="bg_03" align="center">

<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">({if $item.image_filename})<img src="./img.php?filename=({$item.image_filename})&w=76&h=76" class="pict">({else})<img src="./img.php?filename=no_logo_small.gif&w=76&h=76" class="pict">({/if})</a>

</td>
({else})
<td class="bg_03"><img src="./skin/dummy.gif" style="width:84px;height:84px;" class="dummy"></td>
({/if})
({/t_loop})

</tr>

<!-- ������name -->
<tr>

({t_loop from=$c_commu_list start=6 num=3})
({if $item})
<td class="bg_02" align="center">
<a href="./page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">
({$item.name})(({$item.count_commu_member}))
</a>
</td>
({else})
<td class="bg_02" align="center"><img src="./skin/dummy.gif" style="height:1em;" class="dummy"></td>
({/if})

({/t_loop})

</tr>

({/if})

</table>
<!-- �����ޤǡ�����ͥ���ȥ˥å��͡��� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:268px">
<tr>
<td style="width:1px;" class="bg_07"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:115px;"><img src="./skin/dummy.gif" style="width:115px;height:1px;" class="dummy"></td>
<td style="width:136px;padding:2px 0px;" align="left" class="lh_110">
<img src="./skin/dummy.gif" class="icon arrow_1">
<a href="page.php?p=fh_com_list&target_c_member_id=({$target_c_member_id})">���Ƥ򸫤�(({$user_count}))</a>
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

({if $inc_entry_point[6]})
({$inc_entry_point[6]|smarty:nodefaults})
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

({if $inc_entry_point[7]})
({$inc_entry_point[7]|smarty:nodefaults})
({/if})

<!-- ************************************ -->
<!-- ******�������顧�ץ�ե��������****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:440px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:426px;" class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<!-- *�������顧�ץ�ե��������������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:424px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:100px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�ץ�ե�����</span></td>
<td style="width:290px;" align="right" class="bg_06">({if $is_h_prof})<a href="page.php?p=h_config_prof">�ץ�ե������ѹ�</a>&nbsp;&nbsp;({else})&nbsp;({/if})</td>
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
({capture name="nick"})
<!-- �������顧�����ơ�˥å��͡��� -->
({if $target_c_member.nickname})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">�˥å��͡���</span></td>
<td style="width:342px;" class="bg_02">

({$target_c_member.nickname})

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�˥å��͡��� -->
({/capture})
({foreach from=$target_c_member.profile key=key item=item})

({if !$_cnt_nick && $profile_list[$key].sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})

({if !$_cnt_birth && $profile_list[$key].sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})

<!-- �������顧�����ơ�({$item.caption}) -->
({if $item.value})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">({$item.caption})</span></td>
<td style="width:342px;" class="bg_02">

({if $item.form_type == 'textarea'})
	({$item.value|t_url2a|nl2br})
({elseif $item.form_type == 'checkbox'})
	({$item.value|@t_implode:", "})
({else})
	({$item.value})
({/if})

({if $is_h_prof && $item.public_flag == 'friend'})
<span class="caution">��({$WORD_MY_FRIEND})�ޤǸ���</span>
({/if})

</td>
</tr>
({/if})
<!-- �����ޤǡ������ơ�({$item.caption}) -->
({/foreach})

({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})

<!-- �������顧�����ơ�ǿ������� -->
({if $c_diary_list&&($target_c_member.public_flag_diary == "public"||$is_friend||$is_h_prof)})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">�ǿ�������</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$c_diary_list item=c_diary})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$c_diary.r_date|date_format:"%m��%d��"})��&nbsp;<a href="page.php?p=fh_diary&target_c_diary_id=({$c_diary.c_diary_id})">({$c_diary.subject|default:"&nbsp;"})</a><br>
({/foreach})

<!-- �������顧�����ơ�ǿ���������եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=fh_diary_list&target_c_member_id=({$target_c_member_id})">��ä��ɤ�</a>
</td>
</tr>
</table>
<!-- �����ޤǡ������ơ�ǿ���������եå�����˥塼 -->

</td>
</tr>
({/if})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">���������ϰ�</span></td>
<td style="width:342px;" class="bg_02">
({if $target_c_member.public_flag_diary=='public'})�����˸���({/if})
({if $target_c_member.public_flag_diary=='friend'})({$WORD_FRIEND})�ޤǸ���({/if})
</td>
</tr>

<!-- �����ޤǡ������ơ�ǿ������� -->
<!-- �������顧�����ơ�ǿ���Blog -->
({if $c_rss_cache_list})
<tr>
<td style="width:80px;" class="bg_09"><span class="c_01">�ǿ���Blog</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$c_rss_cache_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="({$item.link})" target="_blank">({$item.subject|default:"&nbsp;"})</a><br>
({/foreach})

<!-- �������顧�����ơ�ǿ���Blog��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=fh_diary_list&amp;target_c_member_id=({$target_c_member_id})#blog">��ä��ɤ�</a>
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
<td style="width:80px;" class="bg_09"><span class="c_01">�ǿ��Τ��������ӥ塼</span></td>
<td style="width:342px;" class="bg_02">

({foreach from=$c_review_list item=item})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">({$item.r_datetime|date_format:"%m��%d��"})��&nbsp;<a href="./page.php?p=h_review_list_product&c_review_id=({$item.c_review_id})">({$item.title|t_truncate:40})</a><br>
({/foreach})

<!-- �������顧�����ơ�ǿ��Τ��������ӥ塼��եå�����˥塼 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:333px;">
<tr>
<td style="width:222px;" class="bg_02"><img src="./skin/dummy.gif" class="dummy"></td>
<td style="text-align:left;padding:1px 0px;" class="bg_02">
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=fh_review_list_member&target_c_member_id=({$target_c_member_id})">��ä��ɤ�</a>
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
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="height:1px;" class="dummy"></td>
</tr>
</table>
</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ץ�ե���������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:426px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ץ�ե��������****** -->
<!-- ************************************ -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[8]})
({$inc_entry_point[8]|smarty:nodefaults})
({/if})

<!-- ******************************** -->
<!-- ******�������顧¾��ɾ������****** -->
({if $c_friend_comment_list})
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
<td style="width:390px;" class="bg_06"><span class="b_b">({$WORD_FRIEND})����ξҲ�ʸ</span></td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- ������ -->
<div class="bg_04" style="width:424px;">
<table border="0" cellspacing="1" cellpadding="7" style="width:424px;">
({foreach from=$c_friend_comment_list item=item})
<tr>
<td align="center" style="width:125px;" class="bg_03">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({if $item.image_filename})<img src="./img.php?filename=({$item.image_filename})&w=76&h=76" class="pict">({else})<img src="./img.php?filename=no_image.gif&w=76&h=76" class="pict">({/if})<br>({$item.nickname})</a>

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
<a href="page.php?p=fh_intro&target_c_member_id=({$target_c_member_id})">���Ƹ���</a>
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
({/if})
<!-- ******�����ޤǡ�¾��ɾ������****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_m">

({if $inc_entry_point[9]})
({$inc_entry_point[9]|smarty:nodefaults})
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
