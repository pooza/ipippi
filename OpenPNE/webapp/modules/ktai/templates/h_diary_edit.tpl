({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">�������</font></center>
<hr>
({if $msg})<font color="red">({$msg})</font><br>({/if})
<FORM action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
�����Ď�<br>
<input size="14" name="subject" value="({$target_c_diary.subject})"><BR>
��ʸ<BR>
<TEXTAREA name=body rows=6 cols=14>({$target_c_diary.body})</TEXTAREA><br>
<input type="submit" value="����" class="submit">
<input type="hidden" name="cmd" value="h_diary_edit_insert_c_diary">
({if $target_c_diary.c_diary_id})<input type="hidden" name="target_c_diary_id" value="({$target_c_diary.c_diary_id})">({/if})
<input type="hidden" name="ksid" value="({$PHPSESSID})">
</FORM>
<hr>
<a href="ktai_page.php?p=fh_diary_list&({$tail})">�����؎���</a><br>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>
</a>

({$inc_ktai_footer|smarty:nodefaults})