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

<!-- ******************************** -->
<!-- ******�������顧�ե��ɾ�ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ե��ɾ�ǧ������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ʤ���({$WORD_FRIEND})��󥯤��������Ƥ�����С�
</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�����ơ���å����� -->
<div align="center" style="padding:3px;text-align:center;" class="border_01 bg_03">

({if $anatani_c_friend_confirm_list})
�ʲ��οͤ����ʤ���({$WORD_FRIEND})��󥯤��������Ƥ��ޤ���<br>
���äξ�ǧ�ޤ��ϵ��ݤ����򤷤Ƥ���������
({else})
����({$WORD_FRIEND})��󥯤��������Ƥ���С��Ϥ��ޤ���
({/if})

</div>
<!-- �����ޤǡ������ơ���å����� -->
({if $anatani_c_friend_confirm_list})
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ����С����� -->
<div class="border_01 bg_08" style="width:562px;margin:0px auto;>
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$anatani_c_friend_confirm_list item=item})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="top" rowspan="5">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id_from})">
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=60&h=60"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

̾&nbsp;&nbsp;��

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id_from})">({$item.nickname})</a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:459px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">

<div class="padding_s">

��å�����

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$item.message|nl2br})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="center" valign="middle">

<table border="0" cellspacing="0" cellpadding="0" style="width:371px;">
<tr>
<td style="width:99px;" class="bg_02" align="left">
<img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy">
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:271px;" class="bg_03" align="center">

<div class="padding_s">

<a href="do.php?cmd=h_confirm_list_insert_c_friend&amp;target_c_friend_confirm_id=({$item.c_friend_confirm_id})&amp;sessid=({$PHPSESSID})"><img src="./skin/btn/syounin.gif" class="icon"></a>&nbsp;
<a href="do.php?cmd=h_confirm_list_delete_c_friend_confirm&amp;target_c_friend_confirm_id=({$item.c_friend_confirm_id})&amp;sessid=({$PHPSESSID})" ><img src="./skin/btn/kyohi.gif" class="icon"></a>

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
({/foreach})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>
<!-- �����ޤǡ������ơ����С����� -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
({/if})
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ե��ɾ�ǧ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ե��ɾ�ǧ****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- **************************************** -->
<!-- ******�������顧���ߥ�˥ƥ����þ�ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ����þ�ǧ������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ʤ��δ������ߥ�˥ƥ��˻��ä��˾���Ƥ�����С�</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�����ơ���å����� -->
<div class="border_01 bg_09" align="center" style="padding:3px;text-align:center;" class="border_01 bg_03">

({if $anatani_c_commu_member_confirm_list})
�ʲ��οͤ����ʤ����������Ƥ��륳�ߥ�˥ƥ��ؤλ��ä��˾���Ƥ��ޤ���<br>
���äξ�ǧ�ޤ��ϵ��ݤ����򤷤Ƥ�������
({else})
���ߤ��ʤ��δ������ߥ�˥ƥ��˻��ä��������Ƥ���С��Ϥ��ޤ���
({/if})

</div>
<!-- �����ޤǡ������ơ���å����� -->
({if $anatani_c_commu_member_confirm_list})
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ����С����� -->
<div class="border_01 bg_08" style="width:562px;margin:0px auto;>
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$anatani_c_commu_member_confirm_list item=item})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="top" rowspan="7">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})">
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=60&h=60"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

̾&nbsp;&nbsp;��

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname})</a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:459px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">

<div class="padding_s">

���ô�˾<br>���ߥ�˥ƥ�

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">({$item.c_commu_name})</a>

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">

<div class="padding_s">

��å�����

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$item.message|nl2br})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="center" valign="middle">

<table border="0" cellspacing="0" cellpadding="0" style="width:371px;">
<tr>
<td style="width:99px;" class="bg_02" align="left">

<img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy">

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:271px;" class="bg_03" align="center">

<div class="padding_s">

<a href="do.php?cmd=h_confirm_list_insert_c_commu_member&amp;target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;is_receive_mail=({$item.is_receive_mail})&amp;sessid=({$PHPSESSID})" ><img src="./skin/btn/syounin.gif" class="icon"></a>&nbsp;
<a href="do.php?cmd=h_confirm_list_delete_c_commu_member_confirm&amp;target_c_commu_member_confirm_id=({$item.c_commu_member_confirm_id})&amp;sessid=({$PHPSESSID})" ><img src="./skin/btn/kyohi.gif" class="icon"></a>

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
({/foreach})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>
<!-- �����ޤǡ������ơ����С����� -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
({/if})
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ����þ�ǧ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ����þ�ǧ****** -->
<!-- **************************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ********************************************* -->
<!-- ******�������顧���ߥ�˥ƥ������͸��徵ǧ****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧���ߥ�˥ƥ������͸��徵ǧ������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:458px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���ʤ��˥��ߥ�˥ƥ������Ը�����˾���Ƥ�����С�</span></td>
<td style="width:140px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�����ơ���å����� -->
<div class="border_01 bg_09" align="center" style="padding:3px;text-align:center;" class="border_01 bg_03">

({if $anatani_c_commu_admin_confirm_list})
�ʲ��οͤ����ʤ��˥��ߥ�˥ƥ������Ը�����˾���Ƥ��ޤ���<br>
����ξ�ǧ�ޤ��ϵ��ݤ����򤷤Ƥ�������
({else})
���ߤ��ʤ��˥��ߥ�˥ƥ������Ը�����������Ƥ���С��Ϥ��ޤ���
({/if})

</div>
<!-- �����ޤǡ������ơ���å����� -->
({if $anatani_c_commu_admin_confirm_list})
<div class="border_01 bg_05" align="center">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- �������顧�����ơ����С����� -->
<div class="border_01 bg_08" style="width:562px;margin:0px auto;>
<img src="./skin/dummy.gif" class="v_spacer_m">
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;">
({*********})
<tr>
<td style="width:550px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$anatani_c_commu_admin_confirm_list item=item})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:90px;" class="bg_03" align="center" valign="top" rowspan="7">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})">
<img src="img.php?filename=({if $item.image_filename})({$item.image_filename})({else})no_image.gif({/if})&w=60&h=60"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

̾&nbsp;&nbsp;��

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id_admin})">({$item.nickname})</a>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:459px;" class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">

<div class="padding_s">

���ô�˾<br>���ߥ�˥ƥ�

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

<a href="page.php?p=c_home&target_c_commu_id=({$item.c_commu_id})">({$item.c_commu_name})</a>

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05" align="center" valign="middle">

<div class="padding_s">

��å�����

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">

<div class="padding_s">

({$item.message|nl2br})

</div>

</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:85px;" class="bg_05" align="center" valign="middle"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:371px;" class="bg_02" align="center" valign="middle">

<table border="0" cellspacing="0" cellpadding="0" style="width:371px;">
<tr>
<td style="width:99px;" class="bg_02" align="left">
<img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy">
</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:271px;" class="bg_03" align="center">
<div class="padding_s">
<a href="do.php?cmd=h_confirm_list_update_c_commu_admin_confirm&amp;target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;sessid=({$PHPSESSID})"><img src="./skin/btn/syounin.gif" class="icon"></a>&nbsp;
<a href="do.php?cmd=h_confirm_list_delete_c_commu_admin_confirm&amp;target_c_commu_admin_confirm_id=({$item.c_commu_admin_confirm_id})&amp;sessid=({$PHPSESSID})"><img src="./skin/btn/kyohi.gif" class="icon"></a>
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
({/foreach})
</table>
<img src="./skin/dummy.gif" class="v_spacer_m">
</div>
<!-- �����ޤǡ������ơ����С����� -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
({/if})
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ������͸��徵ǧ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ����ߥ�˥ƥ������͸��徵ǧ****** -->
<!-- ********************************************* -->

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
