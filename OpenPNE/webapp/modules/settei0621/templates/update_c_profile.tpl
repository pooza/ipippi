({$inc_header|smarty:nodefaults})

<h2>�ץ�ե���������Խ�</h2>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<table>
<tr>
<th>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_profile','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="c_profile_id" value="({$requests.c_profile_id})">
����̾</th>
<td><input type="text" name="caption" value="({$c_profile.caption})" size="30"></td>
</tr>
<tr>
<th>
����̾</th>
<td><input type="text" name="name" value="({$c_profile.name})" size="20"><span class="caution">��Ⱦ�ѱѿ� �� _ �Τ�</span></td>
</tr>
<tr>
<th>ɬ��</th>
<td><input type="checkbox" name="is_required" value="1"({if $c_profile.is_required}) checked="checked"({/if})></td>
</tr>
<tr>
<th>�������������</th>
<td>
<label><input type="radio" name="public_flag_edit" value="0"({if !$c_profile.public_flag_edit}) checked="checked"({/if})>����</label>
<label><input type="radio" name="public_flag_edit" value="1"({if $c_profile.public_flag_edit}) checked="checked"({/if})>�桼��������</label></td>
</tr>
<tr>
<th>��������<br>�ǥե������</th>
<td><select name="public_flag_default">
<option value="public"({if $c_profile.public_flag_default == 'public'}) selected="selected"({/if})>�����˸���</option>
<option value="friend"({if $c_profile.public_flag_default == 'friend'}) selected="selected"({/if})>({$smarty.const.WORD_MY_FRIEND})�ޤǸ���</option>
<option value="private"({if $c_profile.public_flag_default == 'private'}) selected="selected"({/if})>�������ʤ�</option>
</select></td>
</tr>
<tr>
<th>�¤ӽ�</th>
<td><input type="text" name="sort_order" value="({$c_profile.sort_order})" size="10"></td>
</tr>
<tr>
<th>������Ͽ</th>
<td>
<label><input type="radio" name="disp_regist" value="1"({if $c_profile.disp_regist}) checked="checked"({/if})>ɽ������</label>
<label><input type="radio" name="disp_regist" value="0"({if !$c_profile.disp_regist}) checked="checked"({/if})>ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>�ץ�ե������ѹ�</th>
<td>
<label><input type="radio" name="disp_config" value="1"({if $c_profile.disp_config}) checked="checked"({/if})>ɽ������</label>
<label><input type="radio" name="disp_config" value="0"({if !$c_profile.disp_config}) checked="checked"({/if})>ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>���С�����</th>
<td>
<label><input type="radio" name="disp_search" value="1"({if $c_profile.disp_search}) checked="checked"({/if})>ɽ������</label>
<label><input type="radio" name="disp_search" value="0"({if !$c_profile.disp_search}) checked="checked"({/if})>ɽ�����ʤ�</label></td>
</tr>
<tr>
<th>�ե����ॿ����</th>
<td><select name="form_type">
<option value="text"({if $c_profile.form_type == 'text'}) selected="selected"({/if})>�ƥ�����</option>
<option value="textarea"({if $c_profile.form_type == 'textarea'}) selected="selected"({/if})>�ƥ�����(ʣ����)</option>
<option value="select"({if $c_profile.form_type == 'select'}) selected="selected"({/if})>ñ������(�ץ������)</option>
<option value="radio"({if $c_profile.form_type == 'radio'}) selected="selected"({/if})>ñ������(�饸���ܥ���)</option>
<option value="checkbox"({if $c_profile.form_type == 'checkbox'}) selected="selected"({/if})>ʣ������</option>
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
<td><input type="submit" class="submit" value="�Խ�"></td>
</tr>
</table>
</form>

({$inc_footer|smarty:nodefaults})