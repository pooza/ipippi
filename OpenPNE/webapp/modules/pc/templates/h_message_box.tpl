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
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="left_content_175" align="center" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})

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
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&box=inbox">������å�����</a>
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">������å�����
({/if})
</div>

({if $box != "outbox"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&box=outbox">�����Ѥߥ�å�����</a>
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">�����Ѥߥ�å�����
({/if})
</div>

({if $box != "savebox"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&box=savebox">���񤭥�å�����</a>
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">���񤭥�å�����
({/if})
</div>

({if $box != "trash"})
<div align="left" style="padding:3px;" class="bg_02 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"><a href="page.php?p=h_message_box&box=trash">����Ȣ</a>
({else})
<div align="left" style="padding:3px;" class="bg_09 border_10">
<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">����Ȣ
({/if})
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

<img src="./skin/dummy.gif" class="v_spacer_l">

({********************************})
({**�����ޤǡ��ᥤ�󥳥�ƥ�ġʺ���**})
({********************************})
</td>
<td style="width:5px;"><img src="./skin/dummy.gif" style="width:5px;" class="dummy"></td>({*<--spacer*})
<td class="right_content_535" align="center" valign="top">
({********************************})
({**�������顧�ᥤ�󥳥�ƥ�ġʱ���**})
({********************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- **************************** -->
<!-- ******�������顧Box����****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:520px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:506px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧Box����������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:506px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:468px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">
({if $box == "inbox" || !$box })
������å�����
({elseif $box == "outbox"})
�����Ѥߥ�å�����
({elseif $box == "savebox"})
���񤭥�å�����
({elseif $box == "trash"})
����Ȣ
({/if})
</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->

<!-- �������顧�����ơ���å����� -->
<div align="left" style="padding:0px;" class="bg_09">

({*����å����������ġ�*})

</div>
<!-- �����ޤǡ������ơ���å����� -->

<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">

({if $box == "inbox" || !$box })

({if $count_c_message_ru_list})

<!-- �������顧�����ơ�����Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:50%;" class="bg_05" align="left">

<div class="padding_s">

&nbsp;<img src="./skin/icon_mail_4.gif" class="icon">&nbsp;��&nbsp;�ֿ��Ѥ�

</div>

</td>
<td class="bg_05" align="right">

<div class="padding_s">

({if $ru_data.is_ru_prev})
 <a href="page.php?p=h_message_box&ru_page=({$ru_data.ru_page-1})&box=inbox">����ɽ��</a>
({/if})
({$ru_data.ru_page*$page_size-$page_size+1})���
({if $ru_data.ru_page*$page_size > $count_c_message_ru_list })
({$count_c_message_ru_list+$ru_data.ru_page*$page_size-$page_size })
({else})
({$ru_data.ru_page*$page_size})
({/if})
���ɽ��
({if $ru_data.is_ru_next})
 <a href="page.php?p=h_message_box&ru_page=({$ru_data.ru_page+1})&box=inbox">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�����Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�����Ȣ���᡼�����ƥꥹ�� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:35px;height=19px;" class="bg_08">&nbsp;</td>
<td style="width:35px;" class="bg_08">���</td>
<td style="width:130px;" class="bg_08"><span class="b_b">������</span></td>
<td style="width:220px;" class="bg_08"><span class="b_b">�� ̾</span></td>
<td style="width:auto;" class="bg_08"><span class="b_b">�� ��</span></td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_message_ru_list item=c_message_ru})
<tr>
<td class="bg_({if $c_message_ru.is_read})02({else})09({/if})" align="center"><img src="./skin/icon_mail_({if $c_message_ru.is_hensin})4({elseif $c_message_ru.is_read})2({else})1({/if}).gif" class="icon"></td>
<td class="bg_({if $c_message_ru.is_read})02({else})09({/if})"><input name="c_message_id[]" value="({$c_message_ru.c_message_id})" type="checkbox" class="no_bg"></td>
<td class="bg_({if $c_message_ru.is_read})02({else})09({/if})">({$c_message_ru.nickname})</td>
<td class="bg_({if $c_message_ru.is_read})02({else})09({/if})"><a href="page.php?p=h_message&target_c_message_id=({$c_message_ru.c_message_id})&jyusin_c_message_id=({$c_message_ru.c_message_id})">({$c_message_ru.subject})</a></td>
<td class="bg_({if $c_message_ru.is_read})02({else})09({/if})">({$c_message_ru.r_datetime|date_format:"%m��%d��"})</td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- �����ޤǡ������ơ�����Ȣ���᡼�����ƥꥹ�� -->

<!-- �������顧�����ơ�����Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $ru_data.is_ru_prev})
 <a href="page.php?p=h_message_box&ru_page=({$ru_data.ru_page-1})&box=inbox">����ɽ��</a>
({/if})
({$ru_data.ru_page*$page_size-$page_size+1})���
({if $ru_data.ru_page*$page_size > $count_c_message_ru_list })
({$count_c_message_ru_list+$ru_data.ru_page*$page_size-$page_size })
({else})
({$ru_data.ru_page*$page_size})
({/if})
���ɽ��
({if $ru_data.is_ru_next})
 <a href="page.php?p=h_message_box&ru_page=({$ru_data.ru_page+1})&box=inbox">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�����Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�����Ȣ��������� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="left">

<div class="padding_s">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_message_box_delete_message">
<input type="hidden" name="box" value="({$box})">
<input type="submit" value="�� ��">

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�����Ȣ��������� -->

({else})

<!-- �������顧�����ơ�����Ȣ���᡼��ʥå��� -->
<div align="center" style="padding:20px 30px;" class="bg_02 border_01">

��å�����������ޤ���

</div>
<!-- �����ޤǡ������ơ�����Ȣ���᡼��ʥå��� -->

({/if})

({/if})

({if $box == "outbox"})

({if $count_c_message_s_list})

<!-- �������顧�����ơ�������Ѥ�Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $s_data.is_s_prev})
 <a href="page.php?p=h_message_box&s_page=({$s_data.s_page-1})&box=outbox">����ɽ��</a>
({/if})
({$s_data.s_page*$page_size-$page_size+1})���
({if $s_data.s_page*$page_size > $count_c_message_s_list })
({$count_c_message_s_list+$s_data.s_page*$page_size-$page_size })
({else})
({$s_data.s_page*$page_size})
({/if})
���ɽ��
({if $s_data.is_s_next})
 <a href="page.php?p=h_message_box&s_page=({$s_data.s_page+1})&box=outbox">����ɽ��</a>
({/if})
</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�������Ѥ�Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�������Ѥ�Ȣ���᡼�����ƥꥹ�� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:35px;height=19px;" class="bg_08">&nbsp;</td>
<td style="width:35px;" class="bg_08">���</td>
<td style="width:130px;" class="bg_08"><span class="b_b">�� ��</span></td>
<td style="width:220px;" class="bg_08"><span class="b_b">�� ̾</span></td>
<td style="width:auto;" class="bg_08"><span class="b_b">�� ��</span></td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_message_s_list item=c_message_s})
<tr>
<td class="bg_02" align="center"><img src="./skin/icon_mail_3.gif" class="icon"></td>
<td class="bg_02"><input name="c_message_id[]" value="({$c_message_s.c_message_id})" type="checkbox" class="no_bg"></td>
<td class="bg_02">({$c_message_s.nickname})</td>
<td class="bg_02"><a href="page.php?p=h_message&target_c_message_id=({$c_message_s.c_message_id})&box=outbox">({$c_message_s.subject})</a></td>
<td class="bg_02">({$c_message_s.r_datetime|date_format:"%m��%d��"})</td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- �����ޤǡ������ơ�������Ѥ�Ȣ���᡼�����ƥꥹ�� -->

<!-- �������顧�����ơ�������Ѥ�Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $s_data.is_s_prev})
 <a href="page.php?p=h_message_box&s_page=({$s_data.s_page-1})&box=outbox">����ɽ��</a>
({/if})
({$s_data.s_page*$page_size-$page_size+1})���
({if $s_data.s_page*$page_size > $count_c_message_s_list })
({$count_c_message_s_list+$s_data.s_page*$page_size-$page_size })
({else})
({$s_data.s_page*$page_size})
({/if})
���ɽ��
({if $s_data.is_s_next})
 <a href="page.php?p=h_message_box&s_page=({$s_data.s_page+1})&box=outbox">����ɽ��</a>
({/if})
</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�������Ѥ�Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�������Ѥ�Ȣ��������� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="left">

<div class="padding_s">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_message_box_delete_message">
<input type="hidden" name="box" value="({$box})">
<input type="submit" value="�� ��">

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�������Ѥ�Ȣ��������� -->

({else})

<!-- �������顧�����ơ�������Ѥ�Ȣ���᡼��ʥå��� -->
<div align="center" style="padding:20px 30px;" class="bg_02 border_01">

��å�����������ޤ���

</div>
<!-- �����ޤǡ������ơ�������Ѥ�Ȣ���᡼��ʥå��� -->

({/if})

({/if})

({if $box == "savebox"})

({if $count_c_message_save_list})

<!-- �������顧�����ơ�䲼����¸Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $save_data.is_save_prev})
 <a href="page.php?p=h_message_box&save_page=({$save_data.save_page-1})&box=savebox">����ɽ��</a>
({/if})
({$save_data.save_page*20-19})���
({if $save_data.save_page*20 > $count_c_message_save_list })
({$count_c_message_save_list+$save_data.save_page*20-20 })
({else})
({$save_data.save_page*20})
({/if})
���ɽ��
({if $save_data.is_save_next})
 <a href="page.php?p=h_message_box&save_page=({$save_data.save_page+1})&box=savebox">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䲼����¸Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�䲼����¸Ȣ���᡼�����ƥꥹ�� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:35px;height=19px;" class="bg_08">&nbsp;</td>
<td style="width:35px;" class="bg_08">���</td>
<td style="width:130px;" class="bg_08"><span class="b_b">�� ��</span></td>
<td style="width:220px;" class="bg_08"><span class="b_b">�� ̾</span></td>
<td style="width:auto;" class="bg_08"><span class="b_b">�� ��</span></td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_message_save_list item=c_message_save})
<tr>
<td class="bg_02" align="center"><img src="./skin/icon_mail_1.gif" class="icon"></td>
<td class="bg_02"><input name="c_message_id[]" value="({$c_message_save.c_message_id})" type="checkbox" class="no_bg"></td>
<td class="bg_02">({$c_message_save.nickname})</td>
<td class="bg_02"><a href="page.php?p=f_message_send&target_c_message_id=({$c_message_save.c_message_id})&jyusin_c_message_id=({$c_message_save.hensinmoto_c_message_id})&box=savebox">({$c_message_save.subject})</a></td>
<td class="bg_02">({$c_message_save.r_datetime|date_format:"%m��%d��"})</td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- �����ޤǡ������ơ�䲼����¸Ȣ���᡼�����ƥꥹ�� -->

<!-- �������顧�����ơ�䲼����¸Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $save_data.is_save_prev})
 <a href="page.php?p=h_message_box&save_page=({$save_data.save_page-1})&box=savebox">����ɽ��</a>
({/if})
({$save_data.save_page*20-19})���
({if $save_data.save_page*20 > $count_c_message_save_list })
({$count_c_message_save_list+$save_data.save_page*20-20 })
({else})
({$save_data.save_page*20})
({/if})
���ɽ��
({if $save_data.is_save_next})
 <a href="page.php?p=h_message_box&save_page=({$save_data.save_page+1})&box=savebox">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䲼����¸Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�䲼����¸Ȣ��������� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="left">

<div class="padding_s">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_message_box_delete_message">
<input type="hidden" name="box" value="savebox">
<input type="submit" value="�� ��">

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䲼����¸Ȣ��������� -->

({else})

<!-- �������顧�����ơ�䲼����¸Ȣ���᡼��ʥå��� -->
<div align="center" style="padding:20px 30px;" class="bg_02 border_01">

��å�����������ޤ���

</div>
<!-- �����ޤǡ������ơ�䲼����¸Ȣ���᡼��ʥå��� -->

({/if})

({/if})

({if $box == "trash"})

({if $count_c_message_trash_list})

<!-- �������顧�����ơ�䤴��Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:350px;" class="bg_05" align="left">

<div class="padding_s">

&nbsp;<img src="./skin/icon_mail_2.gif" class="icon">&nbsp;��&nbsp;����&nbsp;
&nbsp;<img src="./skin/icon_mail_3.gif" class="icon">&nbsp;��&nbsp;�����Ѥ�&nbsp;
&nbsp;<img src="./skin/icon_mail_1.gif" class="icon">&nbsp;��&nbsp;����

</div>

</td>
<td class="bg_05" align="right">

<div class="padding_s">

({if $trash_data.is_trash_prev})
 <a href="page.php?p=h_message_box&trash_page=({$trash_data.trash_page-1})&box=trash">����ɽ��</a>
({/if})
({$trash_data.trash_page*20-19})���
({if $trash_data.trash_page*20 > $count_c_message_trash_list })
({$count_c_message_trash_list+$trash_data.trash_page*20-20 })
({else})
({$trash_data.trash_page*20})
({/if})
���ɽ��
({if $trash_data.is_trash_next})
<a href="page.php?p=h_message_box&trash_page=({$trash_data.trash_page+1})&box=trash">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䤴��Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�䤴��Ȣ���᡼�����ƥꥹ�� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:35px;height=19px;" class="bg_08">&nbsp;</td>
<td style="width:35px;height=19px;" class="bg_08">&nbsp;</td>
<td style="width:130px;" class="bg_08"><span class="b_b">�� ��</span></td>
<td style="width:220px;" class="bg_08"><span class="b_b">�� ̾</span></td>
<td style="width:auto;" class="bg_08"><span class="b_b">�� ��</span></td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$c_message_trash_list item=c_message_trash})
<tr>
({strip})
<td class="bg_02" align="center">
({if $c_message_trash.c_member_id_to == $u})({* ������å����� *})
	<img src="./skin/icon_mail_2.gif" class="icon">
({else})
	({if $c_message_trash.is_send})({* ������å����� *})
		<img src="./skin/icon_mail_3.gif" class="icon">
	({else})({* ���񤭥�å����� *})
		<img src="./skin/icon_mail_1.gif" class="icon">
	({/if})
({/if})
</td>
({/strip})
<td class="bg_02"><input name="c_message_id[]" value="({$c_message_trash.c_message_id})" type="checkbox" class="no_bg"></td>
<td class="bg_02">({$c_message_trash.nickname})</td>
<td class="bg_02"><a href="page.php?p=h_message&target_c_message_id=({$c_message_trash.c_message_id})&box=trash">({$c_message_trash.subject})</a></td>
<td class="bg_02">({$c_message_trash.r_datetime|date_format:"%m��%d��"})</td>
</tr>
({*********})
<tr>
<td style="height=1px;" class="bg_01" colspan="4"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- �����ޤǡ������ơ�䤴��Ȣ���᡼�����ƥꥹ�� -->

<!-- �������顧�����ơ�䤴��Ȣ���ڡ����ڤ��ؤ����� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="right">

<div class="padding_s">

({if $trash_data.is_trash_prev})
<a href="page.php?p=h_message_box&trash_page=({$trash_data.trash_page-1})&box=trash">����ɽ��</a>
({/if})
({$trash_data.trash_page*20-19})���
({if $trash_data.trash_page*20 > $count_c_message_trash_list })
({$count_c_message_trash_list+$trash_data.trash_page*20-20 })
({else})
({$trash_data.trash_page*20})
({/if})
���ɽ��
({if $trash_data.is_trash_next})
<a href="page.php?p=h_message_box&trash_page=({$trash_data.trash_page+1})&box=trash">����ɽ��</a>
({/if})

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䤴��Ȣ���ڡ����ڤ��ؤ����� -->

<!-- �������顧�����ơ�䤴��Ȣ��������� -->
<table style="width:504px;" border="0" cellspacing="0" cellpadding="0" style="width:auto;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:100%;" class="bg_05" align="left">

<div class="padding_s">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_message_box_delete_message">
<input type="hidden" name="box" value="trash">

<input type="submit" name="move" value="�����᤹">
<input type="submit" name="remove" value="���">

</div>

</td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������ơ�䤴��Ȣ��������� -->

({else})

<!-- �������顧�����ơ�䤴��Ȣ���᡼��ʥå��� -->
<div align="center" style="padding:20px 30px;" class="bg_02 border_01">

��å�����������ޤ���

</div>
<!-- �����ޤǡ������ơ�䤴��Ȣ���᡼��ʥå��� -->

({/if})

({/if})

</form>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ�Box�����������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ�Box����****** -->
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
