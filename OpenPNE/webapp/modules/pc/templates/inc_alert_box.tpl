({if $msg || $msg1 || $msg2 || $msg3 || $err_msg})
<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ************************* -->
<!-- ******�������顧�ٹ�****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:({if $width})({$width})({else})580({/if})px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:({if $width})({$width-14})({else})566({/if})px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *�������顧�ٹ������* -->
({*�������顧header*})
<!-- ̵�� -->
({*�����ޤǡ�header*})
({*�������顧body*})
<!-- �������顧������ -->
<table border="0" cellspacing="0" cellpadding="0" style="width:({if $width})({$width-16})({else})564({/if})px;">
<tr>
<td style="width:({if $width})({$width-16})({else})564({/if})px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:150px;" class="bg_03" align="center" valign="middle">
<!-- �������顧�����ơ�ٹ𥢥����� -->
<img src="./skin/dummy.gif" class="v_spacer_l">
<img src="./skin/icon_alert_l.gif" class="icon">
<img src="./skin/dummy.gif" class="v_spacer_l">
<!-- �����ޤǡ������ơ�ٹ𥢥����� -->
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:({if $width})({$width-153})({else})427({/if})px;height:50px;" class="bg_02" align="left" valign="middle">
<div style="padding:8px 6px;" class="caution">
<!-- �������顧�����ơ�ٹ�ʸ���� -->
({if $msg})({$msg})<br>({/if})
({if $msg1})({$msg1})<br>({/if})
({if $msg2})({$msg2})<br>({/if})
({if $msg3})({$msg3})<br>({/if})
({foreach from=$err_msg item=item})
({$item})</br>
({/foreach})
<!-- �����ޤǡ������ơ�ٹ�ʸ���� -->
</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
</table>
<!-- �����ޤǡ������� -->
({*�����ޤǡ�body*})
({*�������顧footer*})
<!-- ̵�� -->
({*�����ޤǡ�footer*})
<!-- *�����ޤǡ��ٹ�������* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******�����ޤǡ��ٹ�****** -->
<!-- ************************* -->

({/if})
