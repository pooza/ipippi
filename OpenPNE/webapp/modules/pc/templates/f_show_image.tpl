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

<!-- ***************************** -->
<!-- ******�������顧�̿�����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧XXX ����μ̿�����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:528px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">
({if $target_member.c_member_id != $u})
({$target_member.nickname}) �����
({/if})
�̿�����
</span></td>
</tr>
</table>
</div>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<div class="border_01 bg_02">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:190px;" align="center">

({if $target_member.image_filename_1})
<img src="img.php?filename=({$target_member.image_filename_1})&h=180&w=180" class="icon">
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>
<td style="width:190px;" align="center">

({if $target_member.image_filename_2})
<img src="img.php?filename=({$target_member.image_filename_2})&h=180&w=180" class="icon">
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>
<td style="width:190px;" align="center">

({if $target_member.image_filename_3})
<img src="img.php?filename=({$target_member.image_filename_3})&h=180&w=180" class="icon">
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>
</tr>
</table>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ�XXX ����μ̿������������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��̿�����****** -->
<!-- ***************************** -->


<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ******************************************* -->
<!-- ******�������顧���С��Υȥåץڡ��������****** -->
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=f_home&target_c_member_id=({$target_member.c_member_id})">
({if $target_member.c_member_id != $u})
���Υ��С���
({/if})
�ȥåץڡ��������
</a>
<!-- ******�����ޤǡ����С��Υȥåץڡ��������****** -->
<!-- ******************************************* -->

<img src="./skin/dummy.gif" class="v_spacer_l">
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
