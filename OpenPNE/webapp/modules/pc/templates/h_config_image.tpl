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

<!-- ******************************* -->
<!-- ******�������顧�̿����Խ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�̿����Խ�������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:528px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">�̿����Խ�����</span></td>
</tr>
</table>
</div>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<!-- �������顧�����ơ�䣱 -->
<div class="border_01 bg_02">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:188px;" align="center">

({if $c_member.image_filename_1})
<img src="img.php?filename=({$c_member.image_filename_1})&w=180&h=180"><br>
[ <a href="do.php?cmd=h_config_image_delete_c_member_image&img_num=1&amp;sessid=({$PHPSESSID})">���</a> | 
({if $c_member.image_filename_1==$c_member.image_filename})
�ᥤ��̿�
({else})
<a href="do.php?cmd=h_config_image_change_main_c_member_image&img_num=1&amp;sessid=({$PHPSESSID})">�ᥤ��̿�</a>
({/if})
 ]
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>

<td style="width:188px;" align="center">

({if $c_member.image_filename_2})
<img src="img.php?filename=({$c_member.image_filename_2})&w=180&h=180"><br>
[ <a href="do.php?cmd=h_config_image_delete_c_member_image&img_num=2&amp;sessid=({$PHPSESSID})">���</a> | 
({if $c_member.image_filename_2==$c_member.image_filename})
�ᥤ��̿�
({else})
<a href="do.php?cmd=h_config_image_change_main_c_member_image&img_num=2&amp;sessid=({$PHPSESSID})">�ᥤ��̿�</a>
({/if})
 ]
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>

<td style="width:188px;" align="center">

({if $c_member.image_filename_3})
<img src="img.php?filename=({$c_member.image_filename_3})&w=180&h=180"><br>
[ <a href="do.php?cmd=h_config_image_delete_c_member_image&img_num=3&amp;sessid=({$PHPSESSID})">���</a> | 
({if $c_member.image_filename_3==$c_member.image_filename})
�ᥤ��̿�
({else})
<a href="do.php?cmd=h_config_image_change_main_c_member_image&img_num=3&amp;sessid=({$PHPSESSID})">�ᥤ��̿�</a>
({/if})
 ]
({else})
<img src="img.php?filename=no_image.gif&w=180&h=180">
({/if})

</td>

</tr>
</table>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������ơ�䣲 -->
<!-- �������顧�����ơ�䣲 -->
<div class="border_01 bg_02">

<img src="./skin/dummy.gif" class="v_spacer_l">

<table border="0" cellspacing="0" cellpadding="0" style="width:564px;">
<tr>
<td style="width:230px;" align="center" valign="middle" rowspan="3">

<form  action="do.php" method="post" name="secondForm" id="secondForm" enctype="multipart/form-data">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input name="cmd" type="hidden" value="h_config_image">

<input name="upfile" type="file" value=" �� �� ">

<img src="./skin/dummy.gif" class="v_spacer_l">

<input type="submit" name="submit" value="�̿��򥢥åץ��ɤ���">

</td>
<td style="width:1em;" align="right" valign="top">��</td>
<td style="width:auto;" align="left" valign="top">

�̿��Ϻ���3��ޤǷǺܤǤ��ޤ���

</td>
</tr>
<tr>
<td style="width:1em;" align="right" valign="top">��</td>
<td style="width:auto;" align="left" valign="top">

300KB�����GIF��JPEG��PNG�ˤ��Ƥ���������

</td>
</tr>
<tr>
<td style="width:1em;" align="right" valign="top">��</td>
<td style="width:auto;" align="left" valign="top">

������������ο�����������̿���˽��Ū�����Фʼ̿�������¾���̤������Բ��˴�����̿��ηǺܤ϶ػߤ��Ƥ��ޤ����ǺܤϤ����Ȥ���Ǥ�Ǥ��ꤤ�פ��ޤ���

</td>
</tr>
</table>

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- �����ޤǡ������ơ�䣲 -->
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��̿����Խ��������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��̿����Խ�****** -->
<!-- ******************************* -->


<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************************** -->
<!-- ******�������顧�ȥåץڡ��������****** -->
<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;<a href="page.php?p=h_home">�ۡ�������</a>
<!-- ******�����ޤǡ��ȥåץڡ��������****** -->
<!-- ************************************** -->

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
