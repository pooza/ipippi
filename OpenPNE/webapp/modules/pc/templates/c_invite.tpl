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

<!-- ************************************ -->
<!-- ******�������顧���ߥ�˥ƥ���Ͷ****** -->
<form action="do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="c_invite_insert_c_message_commu_invite">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:580px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:566px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *�������顧���ߥ�˥ƥ���Ͷ������* -->
({*�������顧header*})
<!-- �������顧�������ȥ� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:528px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">���Υ��ߥ�˥ƥ���({$WORD_MY_FRIEND})�˶�����</span></td>
</tr>
</table>
<!-- �����ޤǡ��������ȥ� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧���ߥ�˥ƥ���Ͷʸ�� -->
<table border="0" cellspacing="0" cellpadding="0" style="width:566px;">
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:564px;" class="bg_09" align="left">

<div class="padding_w_s lh_120">

({$WORD_MY_FRIEND})�ˡ����Υ��ߥ�˥ƥ��ξҲ��å��������������ޤ���

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ����ߥ�˥ƥ���Ͷʸ�� -->
<!-- �������顧������ -->
<table border="0"cellspacing="0" cellpadding="0" style="width:566px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
<td style="width:150px;" class="bg_05">

<div class="padding_s">

�˥å��͡���

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:412px;" class="bg_02">

<div class="padding_s">

<table>
({foreach from=$c_invite_list item=c_invite})
({counter assign=_cnt})
({if $_cnt % 3 == 1})<tr>({/if})
	<td><input type="checkbox" id="m({$c_invite.c_member_id})" name="c_member_id_list[]" value="({$c_invite.c_member_id})" class="no_bg"></td>
	<td style="padding-right:1em"><label for="m({$c_invite.c_member_id})">({$c_invite.nickname})</label></td>
({if $_cnt % 3 == 0})</tr>({/if})
({/foreach})
({if $_cnt % 3 != 0})</tr>({/if})
</table>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_05">

<div class="padding_s">

��å�������Ǥ�ա�

</div>

</td>

<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px; height:1px;" class="dummy"></td>
<td class="bg_02">

<div class="padding_s">

<textarea name="body" rows="6" cols="50"></textarea>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" colspan="3" align="left">

<div class="padding_w_s lh_120">

<div style="text-align:center;padding-bottom:10px;">

<input type="submit" value="������������">

</div>

��({$WORD_MY_FRIEND})�ʳ��ˤ��Υ��ߥ�˥ƥ��򶵤�������硢<br>
���οͤΥڡ�������ľ�ܥ�å����������äƤ���������<br>
�᡼����˥��ߥ�˥ƥ���URL��Ž�դ���������Ǥ���<br>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:566px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ����ߥ�˥ƥ���Ͷ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</form>
<!-- ******�����ޤǡ����ߥ�˥ƥ���Ͷ****** -->
<!-- ************************************ -->

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
