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

({if $target_friend_list_disp})

<!-- *********************************************** -->
<!-- ******�������顧�ޥ��ե��ɰ����ʥ���ͭ���****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ޥ��ե��ɰ���������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">({$WORD_FRIEND})�ꥹ��</span></td>
<td style="width:378px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�ڡ����ڤ��ؤ����֡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_05" align="center">

<div class="padding_s">

[({foreach from=$page_num item=item})
({if $item!=$page})<a href="page.php?p=fh_friend_list&amp;page=({$item})&amp;target_c_member_id=({$target_member.c_member_id})">({$item})</a>
({else})({$item})
({/if})
({/foreach})]

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ����֡��� -->
<!-- �������顧�ڡ����ڤ��ؤ���˥塼���� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev})&nbsp;<a href="page.php?p=fh_friend_list&amp;target_c_member_id=({$target_member.c_member_id})&amp;direc=-1&amp;page=({$page})">����ɽ��</a>&nbsp;({/if})
({$start_num})���({$end_num})���ɽ��&nbsp;
({if $is_next})&nbsp;<a href="page.php?p=fh_friend_list&amp;target_c_member_id=({$target_member.c_member_id})&amp;direc=1&amp;page=({$page})">����ɽ��</a>&nbsp;({/if})
&nbsp;

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ���˥塼���� -->
<!-- �������顧����ͥ���ȥ˥å��͡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({if $target_friend_list_disp.0})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=0 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=0 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.5})
<!-- �������顧����ͥ����������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=5 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ����������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡����������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=5 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡����������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.10})
<!-- �������顧����ͥ����仰���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=10 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ����仰���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡����仰���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=10 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ��˥å��͡����仰���� -->
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.15})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=15 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=15 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ��˥å��͡���������� -->
({*********})
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.20})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=20 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=20 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.25})
<!-- �������顧����ͥ�����ϻ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=25 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ�����ϻ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡�����ϻ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=25 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡�����ϻ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.30})
<!-- �������顧����ͥ����伷���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=30 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ����伷���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡����伷���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=30 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ��˥å��͡����伷���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})

({if $target_friend_list_disp.35})
<!-- �������顧����ͥ�����Ȭ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=35 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ�����Ȭ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡�����Ȭ���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=35 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡�����Ȭ���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.40})
<!-- �������顧����ͥ���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=40 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡���������� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=40 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
<!-- �����ޤǡ��˥å��͡���������� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({/if})
({*********})
({if $target_friend_list_disp.45})
<!-- �������顧����ͥ����佽���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=45 num=5})
<td style="width:111px;" class="bg_03" align="center">
<img src="./skin/dummy.gif" class="v_spacer_l">
({if $item})
<a href=page.php?p=f_home&target_c_member_id=({$item.c_member_id})>
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=76&h=76" class="pict"></a>
({else})
<img src="./skin/dummy.gif" class="dummy" style="width:76px;height:76px;">
({/if})
<img src="./skin/dummy.gif" class="v_spacer_l">
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ�����ͥ����佽���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!-- �������顧�˥å��͡����佽���� -->
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({t_loop from=$target_friend_list_disp start=45 num=5})
<td style="width:111px;" class="bg_02" align="center">
({if $item})
<img src="./skin/dummy.gif" class="v_spacer_s">
({$item.nickname})(({$item.friend_count}))
<img src="./skin/dummy.gif" class="v_spacer_s">
({else})
&nbsp;
({/if})
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
({/t_loop})
</tr>
({*********})
<!-- �����ޤǡ��˥å��͡����佽���� -->
<tr>
<td style="width:564px;height:1px;" class="bg_01" colspan="11"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/if})

</table>
<!-- �����ޤǡ�����ͥ���ȥ˥å��͡��� -->
<!-- �������顧�ڡ����ڤ��ؤ����֡��� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_05" align="center">

<div class="padding_s">

[({foreach from=$page_num item=item})
({if $item!=$page})<a href="page.php?p=fh_friend_list&amp;page=({$item})&amp;target_c_member_id=({$target_member.c_member_id})">({$item})</a>
({else})({$item})
({/if})
({/foreach})]

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ����֡��� -->
<!-- �������顧�ڡ����ڤ��ؤ���˥塼���� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:562px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev})&nbsp;<a href="page.php?p=fh_friend_list&amp;target_c_member_id=({$target_member.c_member_id})&amp;direc=-1&amp;page=({$page})">����ɽ��</a>&nbsp;({/if})
({$start_num})���({$end_num})���ɽ��&nbsp;
({if $is_next})&nbsp;<a href="page.php?p=fh_friend_list&amp;target_c_member_id=({$target_member.c_member_id})&amp;direc=1&amp;page=({$page})">����ɽ��</a>&nbsp;({/if})
&nbsp;

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:564px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ��ڡ����ڤ��ؤ���˥塼���� -->
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ޥ��ե��ɰ����������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ޥ��ե��ɰ����ʥ���ͭ���****** -->
<!-- *********************************************** -->

({else})

<!-- *********************************************** -->
<!-- ******�������顧�ޥ��ե��ɰ����ʥ���̵����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ޥ��ե��ɰ���������* -->
({*�������顧header*})
<!-- �������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:150px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">({$WORD_MY_FRIEND})����</span></td>
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

({$WORD_MY_FRIEND})��Ͽ������ޤ���

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
<!-- *�����ޤǡ��ޥ��ե��ɰ����������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ޥ��ե��ɰ����ʥ���̵����****** -->
<!-- *********************************************** -->

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
