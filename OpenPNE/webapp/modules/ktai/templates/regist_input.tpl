({$inc_ktai_header|smarty:nodefaults})({strip})

<center>({$SNS_NAME})��Ͽ</center>
<hr>
�ʲ��ι��ܤ����Ϥ��ơ���Ͽ��λ���Ƥ���������<br>
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="ses" value="({$ses})">
<input type="hidden" name="cmd" value="insert_c_member">

({capture name="nick"})
<font color="red">*</font>�˥å��͡���<br>
<input type="text" name="nickname"><br>
({/capture})
({capture name="birth"})
<font color="red">*</font>���ޤ줿ǯ<br>
<input type="text" name="birth_year" size="4" maxlength="4" istyle="4" mode="numeric">ǯ<br>
<select name="public_flag_birth_year">
	({foreach from=$public_flags key=key item=item})
	<option value="({$key})"({if $c_member.public_flag_birth_year == $key}) selected="selected"({/if})>({$item})
	({/foreach})
</select><br>

<font color="red">*</font>������<br>
<select name="birth_month">
	<option value="" selected="selected">--
	({foreach from=$month_list item=item})
	<option value="({$item})">({$item})
	({/foreach})
</select>��<br>
<select name="birth_day">
	<option value="" selected="selected">--
	({foreach from=$day_list item=item})
	<option value="({$item})">({$item})
	({/foreach})
</select>��<br>
({/capture})

({foreach from=$profile_list item=profile})

({if !$_cnt_nick && $profile.sort_order >= $smarty.const.SORT_ORDER_NICK})
({counter assign="_cnt_nick"})
({$smarty.capture.nick|smarty:nodefaults})
({/if})

({if !$_cnt_birth && $profile.sort_order >= $smarty.const.SORT_ORDER_BIRTH})
({counter assign="_cnt_birth"})
({$smarty.capture.birth|smarty:nodefaults})
({/if})

({if $profile.disp_regist})

	({if $profile.is_required})<font color="red">*</font>({/if})
	({$profile.caption})<br>
	
	({if $profile.form_type == 'text'})
		<input type="text" name="profile[({$profile.name})]" value="({$c_member.profile[$profile.name].value})">
	({elseif $profile.form_type == 'textarea'})
		<textarea name="profile[({$profile.name})]">({$c_member.profile[$profile.name].value})</textarea>
	({elseif $profile.form_type == 'select' || $profile.form_type == 'radio'})
		<select name="profile[({$profile.name})]">
			<option value="">���򤷤Ƥ�������
			({foreach item=item from=$profile.options})
			<option value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value == $item.value}) selected="selected"({/if})>({$item.value|default:"--"})
			({/foreach})
		</select>
	({elseif $profile.form_type == 'checkbox'})
		<input type="hidden" name="profile[({$profile.name})][]" value="0">
		({foreach item=item from=$profile.options name=check})
		<input type="checkbox" name="profile[({$profile.name})][]" value="({$item.c_profile_option_id})"({if $c_member.profile[$profile.name].value && in_array($item.value, $c_member.profile[$profile.name].value)}) checked="checked"({/if})>({$item.value|default:"--"})
		({/foreach})
	({/if})
	<br>
	
	({if $profile.public_flag_edit})
	<select name="public_flag[({$profile.name})]">
		({foreach from=$public_flags key=key item=item})
		<option value="({$key})"({if $c_member.profile[$profile.name].public_flag == $key}) selected="selected"({/if})>({$item})
		({/foreach})	
	</select>
	<br>
	({/if})

({/if})
({/foreach})

({if !$_cnt_nick})({$smarty.capture.nick|smarty:nodefaults})({/if})
({if !$_cnt_birth})({$smarty.capture.birth|smarty:nodefaults})({/if})

<br>
<font color="red">*</font>�ѥ����<br>
<input type="text" name="password" maxlength="12" istyle="3" mode="alphabet"><br>
<font color="red">���ѥ���ɤ�6-12ʸ����Ⱦ�ѱѿ������Ϥ��Ƥ�������</font><br>

<br>
<font color="red">*</font>��̩�μ���<br>
<select name="c_password_query_id">
	<option value="0">���򤷤Ƥ�������
	({foreach from=$password_query_list key=key item=item})
	<option value="({$key})">({$item})
	({/foreach})
</select><br>

<font color="red">*</font>��̩�μ��������<br>
<input type="text" name="password_query_answer" value=""><br>
���ѥ���ɤ�˺�줿���γ�ǧ�˻��Ѥ��ޤ���<br>

<br>
<input type="submit" value=" ��Ͽ ">
</form>

({/strip})({$inc_ktai_footer|smarty:nodefaults})