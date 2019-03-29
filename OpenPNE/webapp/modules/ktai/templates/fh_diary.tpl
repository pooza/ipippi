({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">({$target_diary_writer.nickname})さんの日記</font></center>
<hr>
({if $c_siteadmin})
({$c_siteadmin|smarty:nodefaults})
<hr>
({/if})
({$target_c_diary.r_datetime|date_format:"%Y/%m/%d %H:%M"})<br>
({$target_c_diary.subject})<br>
<br>
({$target_c_diary.body|nl2br})<br>
<br>
({if $target_c_diary.image_filename_1})
画像1を見る:[<a href="img.php?filename=({$target_c_diary.image_filename_1})&amp;w=120&amp;h=120&amp;f=jpg">小</a>/<a href="img.php?filename=({$target_c_diary.image_filename_1})&amp;f=jpg">大</a>]<br>
({/if})
({if $target_c_diary.image_filename_2})
画像2を見る:[<a href="img.php?filename=({$target_c_diary.image_filename_2})&amp;w=120&amp;h=120&amp;f=jpg">小</a>/<a href="img.php?filename=({$target_c_diary.image_filename_2})&amp;f=jpg">大</a>]<br>
({/if})
({if $target_c_diary.image_filename_3})
画像3を見る:[<a href="img.php?filename=({$target_c_diary.image_filename_3})&amp;w=120&amp;h=120&amp;f=jpg">小</a>/<a href="img.php?filename=({$target_c_diary.image_filename_3})&amp;f=jpg">大</a>]<br>
({/if})
({if $target_diary_writer.c_member_id==$u})
[<a href="ktai_page.php?p=h_diary_edit&target_c_diary_id=({$target_c_diary.c_diary_id})&amp;({$tail})">日記を編集</a>]<br>
[<a href="do_ktai.php?cmd=fh_diary_delete_c_diary&target_c_diary_id=({$target_c_diary.c_diary_id})&amp;({$tail})">日記を削除</a>]<br>
({/if})

({if $c_diary_comment})
<hr>
■ｺﾒﾝﾄ<br>
({foreach from=$c_diary_comment item=c_diary_comment_})
({if $c_diary_comment_.delete_reason})
<font color="red">削除されました。</font><br>
({$c_diary_comment_.r_datetime|date_format:"%m/%d %H:%M"})
({else})
({if $c_diary_comment_.nickname})<a href="ktai_page.php?p=f_home&target_c_member_id=({$c_diary_comment_.c_member_id})&amp;({$tail})">({$c_diary_comment_.nickname})</a>({/if}) ({if $c_diary_comment_.c_member_id == $u || $target_diary_writer.c_member_id==$u})
[<a href="do_ktai.php?cmd=fh_diary_delete_c_diary_comment&target_c_diary_comment_id=({$c_diary_comment_.c_diary_comment_id})&amp;({$tail})">削除</a>]
({/if})<br>
({$c_diary_comment_.body|nl2br|default:"&nbsp;"})<br>
({$c_diary_comment_.r_datetime|date_format:"%m/%d %H:%M"})
({/if})
<br><br>

({/foreach})
({/if})
<hr>
■ｺﾒﾝﾄを書く
<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<font color=red>({if $msg})({$msg})<br>({/if})</font>
<input type="hidden" name="cmd" value="fh_diary_insert_c_diary_comment">
<input type="hidden" name="target_c_diary_id" value="({$target_c_diary.c_diary_id})">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
<textarea name="body"></textarea><br>
<input type="submit" value="書き込む">
</form>
<hr>
<a href="ktai_page.php?p=fh_diary_list&target_c_member_id=({$target_diary_writer.c_member_id})&amp;({$tail})">
({$target_diary_writer.nickname})さんの日記ﾘｽﾄ
</a><br>
<a href="ktai_page.php?p=h_home&amp;({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})