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

({if $fh_com_list_user})

<!-- ************************************************* -->
<!-- ******�������顧���ߥ�˥ƥ������ʥ���ͭ���****** -->
<div id="commu_list" class="border_07" style="width:580px;margin:0px auto;">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ�����������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ��ꥹ��</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�ڡ����ڤ��ؤ����֡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_10" align="center">
[({foreach from=$page_list item=item})
({if $item == $page})
({$item})
({else})
<a href="page.php?p=fh_com_list&amp;page=({$item})&amp;target_c_member_id=({$target_member.c_member_id})">({$item})</a>
({/if})
({/foreach})]
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ����֡��� -->
<!-- �������顧�ڡ����ڤ��ؤ���˥塼���� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_10" align="right">
({if $pager.prev_page})
<a href="page.php?p=fh_com_list&amp;page=({$pager.prev_page})&amp;target_c_member_id=({$target_member.c_member_id})">����ɽ��</a>&nbsp;
({/if})
({$pager.start_num})���({$pager.end_num})���ɽ��
({if $pager.next_page})
&nbsp;<a href="page.php?p=fh_com_list&amp;page=({$pager.next_page})&amp;target_c_member_id=({$target_member.c_member_id})">����ɽ��</a>
({/if})
&nbsp;
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ���˥塼���� -->
<!-- �������顧����ͥ����̾�� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

({if $fh_com_list_user.0})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=0 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=0 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.5})
<!-- �������顧����ͥ����������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=5 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ����������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾����������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=5 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾����������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.10})
<!-- �������顧����ͥ����仰���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=10 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ����仰���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾����仰���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=10 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾����仰���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.15})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=15 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=15 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.20})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=20 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=20 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.25})
<!-- �������顧����ͥ�����ϻ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=25 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ�����ϻ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾�����ϻ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=25 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾�����ϻ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.30})
<!-- �������顧����ͥ����伷���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=30 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ����伷���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾����伷���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=30 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾����伷���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.35})
<!-- �������顧����ͥ�����Ȭ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=35 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ�����Ȭ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾�����Ȭ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=35 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾�����Ȭ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.40})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=40 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=40 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

({if $fh_com_list_user.45})
<!-- �������顧����ͥ����佽���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=45 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
({if $item.c_member_id_admin == $target_member.c_member_id })<img src="./skin/icon_crown.gif" class="icon"><br>({/if})
<a href=page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_logo_small.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�����ͥ����佽���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧̾����佽���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$fh_com_list_user start=45 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.name})(({$item.count_members}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ�̾����佽���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})

</table>
<!-- �����ޤǡ�����ͥ����̾�� -->
<!-- �������顧�ڡ����ڤ��ؤ����֡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_10" align="center">
[({foreach from=$page_list item=item})
({if $item == $page})
({$item})
({else})
<a href="page.php?p=fh_com_list&amp;page=({$item})&amp;target_c_member_id=({$target_member.c_member_id})">({$item})</a>
({/if})
({/foreach})]
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ����֡��� -->
<!-- �������顧�ڡ����ڤ��ؤ���˥塼���� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_10" align="right">
({if $pager.prev_page})
<a href="page.php?p=fh_com_list&amp;page=({$pager.prev_page})&amp;target_c_member_id=({$target_member.c_member_id})">����ɽ��</a>&nbsp;
({/if})
({$pager.start_num})���({$pager.end_num})���ɽ��
({if $pager.next_page})
&nbsp;<a href="page.php?p=fh_com_list&amp;page=({$pager.next_page})&amp;target_c_member_id=({$target_member.c_member_id})">����ɽ��</a>
({/if})
&nbsp;
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ���˥塼���� -->
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
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</div>
<!-- ******�����ޤǡ����ߥ�˥ƥ������ʥ���ͭ���****** -->
<!-- ************************************************* -->

({else})

<!-- ************************************************* -->
<!-- ******�������顧���ߥ�˥ƥ������ʥ���̵����****** -->
<div id="no_commu_list" class="border_07" style="width:580px;margin:0px auto;">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ�����������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ߥ�˥ƥ�����</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �������顧������ -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:564px;height:50px;" class="bg_03" align="center" valign="middle">

���ä��Ƥ��륳�ߥ�˥ƥ��Ϥ���ޤ���

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<!-- �����ޤǡ������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
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
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</div>
<!-- ******�����ޤǡ����ߥ�˥ƥ������ʥ���̵����****** -->
<!-- ************************************************* -->

({/if})

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
