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
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>
<td class="left_content_175" align="center" valign="top">
({***********************************})
({**�������顧�ᥤ�󥳥�ƥ��(��)*******})
({***********************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- *********************************************** -->
<!-- ******�������顧��å������ܥå�������˥塼****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:165px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:151px;" class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_10" align="center">
<!-- *�������顧��å������ܥå�������˥塼������* -->
({*�������顧header*})
<!-- ̵�� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
({if $box != "inbox"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
({/if})
<img src="./skin/dummy.gif" style="width:14px;height:" class="icon icon_1"><a href="page.php?p=h_message_box&amp;box=inbox">������å�����</a>
</div>

({if $box != "outbox"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
({/if})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&amp;box=outbox">�����ѥ�å�����</a>
</div>

({if $box != "savebox"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
({/if})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&amp;box=savebox">����</a>
</div>

({if $box != "trash"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
({/if})
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&amp;box=trash">����Ȣ</a>
</div>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ���å������ܥå�������˥塼�������* -->
</td>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_10"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ���å������ܥå�������˥塼****** -->
<!-- *********************************************** -->

({********************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})
</td>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>
<td class="right_content_535" align="center" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʱ���**})
({********************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- **************************** -->
<!-- ******�������顧��å�����ɽ����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:520px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:506px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧��å�����ɽ���������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:506px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:468px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">��å������ξܺ�</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:504px;">
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="6"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" rowspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" align="center" rowspan="5" class="bg_03">

<div class="padding_s">

<a href="page.php?p=f_home&amp;target_c_member_id=({if $c_message.is_received})({$c_message.c_member_id_from})({else})({$c_message.c_member_id_to})({/if})"><img src="img.php?filename=({if $c_message.image_filename_disp})({$c_message.image_filename_disp})({else})no_image.gif({/if})&amp;w=120&amp;h=120"></a>

</div>

</td>
<td style="width:1px;" class="bg_01" rowspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:63px;" class="bg_05" align="right">

<div class="padding_s">

({if $c_message.is_received})
���п� :
({else})
�� �� :
({/if})

</div>

</td>
<td style="width:330px;" class="bg_05" align="left">

<div class="padding_s">

({if $c_message.is_received})
<a href="page.php?p=f_home&target_c_member_id=({$c_message.c_member_id_from})">({$c_message.c_member_nickname_from})</a>
({else})
<a href="page.php?p=f_home&target_c_member_id=({$c_message.c_member_id_to})">({$c_message.c_member_nickname_to})</a>
({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" rowspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="2"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_05" align="right">

<div class="padding_s">

������ :

</div>

</td>
<td class="bg_05" align="left">

<div class="padding_s">

({$c_message.r_datetime|date_format:"%Yǯ%m��%d�� %H:%M"})

</div>

</td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="2"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_05" align="right">

<div class="padding_s">

�̾ :

</div>

</td>
<td class="bg_05" align="left">

<div class="padding_s">

({$c_message.subject})

</div>

</td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="6"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td align="left" valign="top" colspan="6" class="bg_02">

<div class="padding_w_m">

({$c_message.body|t_url2a|nl2br})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- �������顧���ޥ�ɡ� -->
<table border="0" cellspacing="0" cellpadding="0" class="border_01" style="width: 504px;">
<tr>
<td style="width:340px;height:2em;" class="bg_03" align="left">

<div class="padding_s">

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_message_id[]" value=({$c_message.c_message_id})>
<input type="hidden" name="cmd" value="h_message_box_delete_message">
<input type="hidden" name="box" value="({$box})">

({if $box == 'trash'})
<input type="submit" name="move" value="�����᤹">
({/if})
<input type="submit" name="remove" value="�� ��">

</form>

</div>

</td>
<td style="width:164px;" class="bg_03" align="right">

<div class="padding_s">

({if $box == 'inbox' || !$box })
<form action="page.php?p=f_message_send&target_c_message_id=({$c_message.c_message_id})&jyusin_c_message_id=({$jyusin_c_message_id})" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="target_c_member_id" value="({$c_message.c_member_id_from})
">
<input name="hensin2" type="submit" value="���ֿ����롡">
</form>
({/if})

</div>

</td>
</tr>
</table>
<!-- �����ޤǡ����ޥ�ɡ� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ���å�����ɽ����������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ���å�����ɽ����****** -->
<!-- **************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

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
