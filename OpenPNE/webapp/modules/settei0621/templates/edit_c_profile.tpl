({$inc_header|smarty:nodefaults})

({if $msg})
<p class="caution">({$msg})</p>
({/if})

<h2>�ץ�ե�������ܰ���</h2>

<p>��<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('insert_c_profile')})">�ץ�ե���������ɲ�</a></p>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_profile_sort_order','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<table style="font-size:small">
<tr>
<th colspan="2">���</th>
<th>ID</th>
<th>����̾</th>
<th>����̾</th>
<th>ɬ��</th>
<th>��������<br>�Ǥ��뤫</th>
<th>��������<br>�ǥե������</th>
<th>�ե�����<br>������</th>
<th>�¤ӽ�<br>(����)</th>
<th>�����</th>
<th>��Ͽ</th>
<th>�ѹ�</th>
<th>����</th>
</tr>

({capture name="nick"})
<tr style="background:#eee">
<td>&nbsp;</td>
<td>&nbsp;</td>
<td class="idnumber">-</td>
<td>�˥å��͡���</td>
<td>&nbsp;</td>
<td style="text-align:center">��</td>
<td style="text-align:center">��</td>
<td>�����˸���</td>
<td>�ƥ�����</td>
<td class="number"><input type="text" name="sort_order_nick" size="5" value="({$smarty.const.SORT_ORDER_NICK})"></td>
<td>&nbsp;</td>
<td style="text-align:center">��</td>
<td style="text-align:center">��</td>
<td style="text-align:center">��</td>
</tr>
({/capture})

({foreach name=prof from=$c_profile_list item=item})

({if !$_cnt_nick && $item.sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})

({if !$_cnt_birth && $item.sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})

<tr>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('update_c_profile')})&amp;c_profile_id=({$item.c_profile_id})">�ѹ�</a></td>
<td><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_profile')})&amp;c_profile_id=({$item.c_profile_id})">���</a></td>
<td class="idnumber">({$item.c_profile_id})</td>
<td>({$item.caption})</td>
<td>({$item.name})</td>
<td style="text-align:center">({if $item.is_required})��({else})��({/if})</td>
<td style="text-align:center">({if $item.public_flag_edit})��({else})��({/if})</td>
<td>({if $item.public_flag_default == 'private'})�������ʤ�({elseif $item.public_flag_default == 'friend'})({$smarty.const.WORD_MY_FRIEND})�ޤǸ���({else})�����˸���({/if})</td>
<td>({if $item.form_type == 'text'})�ƥ�����({elseif $item.form_type == 'textarea'})�ƥ�����(ʣ����)({elseif $item.form_type == 'select'})ñ������(�ץ������)({elseif $item.form_type == 'radio'})ñ������(�饸���ܥ���)({elseif $item.form_type == 'checkbox'})ʣ������({/if})</td>
<td class="number">({$item.sort_order})</td>
<td>({if $item.form_type == 'select' || $item.form_type == 'checkbox'})<a href="#opt_({$item.name})">����</a>({else})&nbsp;({/if})</td>
<td style="text-align:center">({if $item.disp_regist})��({else})��({/if})</td>
<td style="text-align:center">({if $item.disp_config})��({else})��({/if})</td>
<td style="text-align:center">({if $item.disp_search})��({else})��({/if})</td>
</tr>
({/foreach})

({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})

<tr>
<td colspan="9">&nbsp;</td>
<td class="number"><input class="submit" type="submit" value="�ѹ�"></td>
<td colspan="4">&nbsp;</td
</tr>
</table>
</form>

<h2>�ץ�ե�������������</h2>

<ul class="caution">
<li>����ܤ��Ĥ����ѹ��Ǥ��ޤ���</li>
<li>������������Ȥ������������򤷤Ƥ����桼�������ͤ�(���Ȥ�ɬ�ܹ��ܤǤ��äƤ�)���ˤʤ�ޤ���</li>
</ul>

({foreach from=$c_profile_list item=item})
({if $item.form_type == 'select' || $item.form_type == 'checkbox' || $item.form_type == 'radio'})

<h3><a name="opt_({$item.name})">({$item.caption})</a></h3>

<table>
<tr>
<th>����̾</th>
<th>�¤ӽ�</th>
<th colspan="2">���</th>
</tr>
({foreach from=$item.options item=option})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_profile_option','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_profile_option_id" value="({$option.c_profile_option_id})">
<input type="text" name="value" value="({$option.value})" size="20"></td>
<td><input type="text" name="sort_order" value="({$option.sort_order})" size="5"></td>
<td><input type="submit" class="submit" value="�ѹ�"></td>
</form>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_c_profile_option','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_profile_option_id" value="({$option.c_profile_option_id})">
<input type="submit" class="submit" value="���">
</td>
</form>
</tr>
</form>
({/foreach})
<tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<td>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_profile_option','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_profile_id" value="({$item.c_profile_id})">
<input type="text" name="value" value="" size="20"></td>
<td><input type="text" name="sort_order" value="" size="5"></td>
<td colspan="2"><input type="submit" class="submit" value="�����ɲ�"></td>
</form>
</tr>
</table>

({/if})
({/foreach})

({$inc_footer|smarty:nodefaults})