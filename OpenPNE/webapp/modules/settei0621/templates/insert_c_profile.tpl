({$inc_header|smarty:nodefaults})

<h2>�ץ�ե���������ɲ�</h2>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<table>
<tr>
<th>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('insert_c_profile','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
����̾</th>
<td><input type="text" name="caption" value="" size="30"></td>
</tr>
<tr>
<th>
����̾</th>
<td><input type="text" name="name" value="" size="20"><span class="caution">��Ⱦ�ѱѿ� �� _ �Τ�</span></td>
</tr>
<tr>
<th>ɬ��</th>
<td><input type="checkbox" name="is_required" value="1"></td>
</tr>
<tr>
<th>�������������</th>
<td>
<label><input type="radio" name="public_flag_edit" value="0" checked="checked">����</label>
<label><input type="radio" name="public_flag_edit" value="1">�桼��������</label></td>
</tr>
<tr>
<th>��������<br>�ǥե������</th>
<td><select name="public_flag_default">
<option value="public">�����˸���</option>
<option value="friend">({$smarty.const.WORD_MY_FRIEND})�ޤǸ���</option>
<option value="private">�������ʤ�</option>
</select></td>
</tr>
<tr>
<th>�¤ӽ�</th>
<td><input type="text" name="sort_order" value="" size="10"></td>
</tr>
<tr>
<th>������Ͽ</th>
<td>
<label><input type="radio" name="disp_regist" value="1" checked="checked">ɽ������</label>
<label><input type="radio" name="disp_regist" value="0">ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>�ץ�ե������ѹ�</th>
<td>
<label><input type="radio" name="disp_config" value="1" checked="checked">ɽ������</label>
<label><input type="radio" name="disp_config" value="0">ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>���С�����</th>
<td>
<label><input type="radio" name="disp_search" value="1" checked="checked">ɽ������</label>
<label><input type="radio" name="disp_search" value="0">ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>�ե����ॿ����</th>
<td><select name="form_type">
<option value="text" selected="selected">�ƥ�����</option>
<option value="textarea">�ƥ�����(ʣ����)</option>
<option value="select">ñ������(�ץ������)</option>
<option value="radio">ñ������(�饸���ܥ���)</option>
<option value="checkbox">ʣ������</option>
</select></td>
</tr>
<tr>
<td colspan="2" class="caution" style="background-color:#ddd;color:#000;padding-left:1em;">�ʲ��ι��ܤϥե����ॿ���פ�<br>
�֥ƥ����ȡס��֥ƥ�����(ʣ����)�פξ��Τ�ͭ���Ǥ���</td>
</tr>
<tr>
<th>�����ͥ�����</th>
<td><select name="val_type">
<option value="string"({if $c_profile.val_type == 'string'}) selected="selected"({/if})>ʸ����</option>
<option value="int"({if $c_profile.val_type == 'int'}) selected="selected"({/if})>����</option>
<option value="regexp"({if $c_profile.val_type == 'regexp'}) selected="selected"({/if})>����ɽ��</option>
</select></td>
</tr>
<tr>
<th>����ɽ��</th>
<td><input type="text" name="val_regexp" value="({$c_profile.val_regexp})" size="30"><br>
<span class="caution">�������ͥ����פǡ�����ɽ���פ���������Τ�ͭ��<br>
��: /[a-e]\d+/</span></td>
</tr>
<tr>
<th>�Ǿ���&#xff5e;������</th>
<td><input type="text" name="val_min" value="({if $c_profile.val_min != 0})({$c_profile.val_min})({/if})" size="10">&#xff5e;<input type="text" name="val_max" value="({if $c_profile.val_max != 0})({$c_profile.val_max})({/if})" size="10"><br>
<span class="caution">�������ͥ����פ��ֿ��͡פξ��Ͽ��ͤ��ϰϡ�<br>
����ʳ��ξ���(Ⱦ�Ѥ�)ʸ����</span></td>
</tr>
<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="�ɲ�"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})