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
<table border="0" cellspacing="0" cellpadding="0" style="width:575px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:561px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:559px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:523px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ����С�</span></td>
</tr>
</table>
</div>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:561px;">
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:559px;" class="bg_02" align="center" valign="middle">
<div style="padding:4px 3px;text-align:center;">

[ ({foreach from=$page_num item=item})
({if $item!=$page})<a href="page.php?p=c_member_list&page=({$item})&target_c_commu_id=({$c_commu_id})">({$item})</a>
({else})({$item})
({/if})
 ({/foreach})]

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:559px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})<a href="page.php?p=c_member_list&direc=-1&page=({$page})&target_c_commu_id=({$c_commu_id})">����</a>({/if})��
({$start_num})���({$end_num})���ɽ��
({if $is_next})<a href="page.php?p=c_member_list&direc=1&page=({$page})&target_c_commu_id=({$c_commu_id})">����</a>({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<table border="0" cellspacing="0" cellpadding="0" style="width:561px;">
({*********})
({*---------------�������顧�����ܡ�����-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=0 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=0 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[5]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=5 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=5 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[10]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=10 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=10 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[15]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=15 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=15 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[20]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=20 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=20 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[25]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=25 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=25 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[30]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=30 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=30 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[35]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=35 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=35 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�����ܡ�����-------------------*})
({if $c_member_list[40]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=40 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ������ܡ�����-------------------*})
({*---------------�������顧�����ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=40 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ������ܡ��˥å��͡���-------------------*})
({*---------------�������顧�������ܡ�����-------------------*})
({if $c_member_list[45]})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=45 num=5})
<td style="width:111px;" class="bg_03" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
({if $item.c_member_id == $c_commu.c_member_id_admin})<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})"><img src="./img.php?filename=({if $item.image_filename})({$item.image_filename})&w=72&h=72({else})no_image.gif&w=72&h=72({/if})" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:72px;height:72px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({*---------------�����ޤǡ��������ܡ�����-------------------*})
({*---------------�������顧�������ܡ��˥å��͡���-------------------*})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$c_member_list start=45 num=5})
<td style="width:111px;" class="bg_02" align="center" valign="middle">

<img src="./skin/dummy.gif" class="v_spacer_m">
({if $item})
<a href="./page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname|default:"&nbsp;"})</a>
({else})
&nbsp;
({/if})
<img src="./skin/dummy.gif" class="v_spacer_m">

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})
({*---------------�����ޤǡ��������ܡ��˥å��͡���-------------------*})
</table>
<table border="0" cellspacing="0" cellpadding="0" style="width:561px;">
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:559px;" class="bg_02" align="center" valign="middle">
<div style="padding:4px 3px;text-align:center;">

[ ({foreach from=$page_num item=item})
({if $item!=$page})<a href="page.php?p=c_member_list&page=({$item})&target_c_commu_id=({$c_commu_id})">({$item})</a>
({else})({$item})
({/if})
 ({/foreach})]

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:559px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $is_prev})<a href="page.php?p=c_member_list&direc=-1&page=({$page})&target_c_commu_id=({$c_commu_id})">����</a>({/if})��
({$start_num})���({$end_num})���ɽ��
({if $is_next})<a href="page.php?p=c_member_list&direc=1&page=({$page})&target_c_commu_id=({$c_commu_id})">����</a>({/if})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:561px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
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
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����С�����****** -->
<!-- ******************************** -->

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
