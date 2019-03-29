({$inc_ktai_header|smarty:nodefaults})({strip})

<center>ﾌﾟﾛﾌｨｰﾙ変更</center>
<hr>
<font color="red">*</font>は必須項目。<br>

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_config_prof_update_c_member">

({capture name="nick"})
<font color="red">*</font>ﾆｯｸﾈｰﾑ<br>
<input type="text" name="nickname" value="({$c_member.nickname})"><br>
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

({if $profile.disp_config})

	({if $profile.is_required})<font color="red">*</font>({/if})
	({$profile.caption})<br>
	
	({if $profile.form_type == 'text'})
		<input type="text" name="profile[({$profile.name})]" value="({$c_member.profile[$profile.name].value})">
	({elseif $profile.form_type == 'textarea'})
		<textarea name="profile[({$profile.name})]">({$c_member.profile[$profile.name].value})</textarea>
	({elseif $profile.form_type == 'select' || $profile.form_type == 'radio'})
		<select name="profile[({$profile.name})]">
			<option value="">選択してください
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
<input type="submit" value="変更する">
</form>

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({/strip})({$inc_ktai_footer|smarty:nodefaults})