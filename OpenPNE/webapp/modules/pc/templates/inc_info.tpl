<!--　インフォメーション　＆　カレンダー　-->
<table border="0" cellspacing="0" cellpadding="0" style="width:720px;" class="info">
<tr>
<td style="width:20px;"><img src="./skin/dummy.gif" style="width:20px;height:1px;" class="dummy"></td>
<td style="width:700px;" align="center" valign="middle">

<!--ここから：運営者からのお知らせ-->
<div class="border_07 bg_07">
<table border="0" cellspacing="1" cellpadding="0" style="width:700px;" class="info_body">
<tr>
<td align="center" style="width:105px;" class="bg_07"><img src="./skin/inc_info/icon_information.gif" alt="お知らせ" style="width:91px;height:14px;"></td>
<td class="bg_02" style="width:595px;">
<table border="0" cellspacing="0" cellpadding="0">
<!--ここから：リスト-->
<tr>
<td>

<div class="padding_s">

({$site_info|smarty:nodefaults|default:"&nbsp;"})

</div>

</td>
</tr>
<!--ここまで：リスト-->
({if $num_f_confirm_list })
<tr>
<td>

<div class="padding_s">

★<span class="caution">承認待ちのメンバーが({$num_f_confirm_list})名います！</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">承認・拒否</span></a>

</div>

</td>
</tr>
({/if})


<!--リスト５-->
({if $num_message_not_is_read })
<tr>
<td>

<div class="padding_s">

★<span class="caution">新着メッセージが({$num_message_not_is_read})件あります！</span>&nbsp;<a href="page.php?p=h_message_box"><span class="b_b">メッセージを読む</span></a></td>

</div>

</tr>
({/if})
<!--リスト６-->
({if $num_diary_not_is_read })
<tr>
<td>

<div class="padding_s">

★<span class="caution">({$num_diary_not_is_read})件の日記に対して新着コメントがあります！</span>&nbsp;<a href="page.php?p=fh_diary&target_c_diary_id=({$first_diary_read})"><span class="caution">日記を見る</span></a></td>

</div>

</tr>
({/if})

<!--リスト７-->
({if $num_h_confirm_list })
<tr>
<td>

<div class="padding_s">

★<span class="caution">コミュニティ参加承認待ちのメンバーが({$num_h_confirm_list})名います！</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">承認・拒否</span></a></td>

</div>

</tr>
({/if})

<!--リスト８-->
({if $anatani_c_commu_admin_confirm_list})
<tr>
<td>

<div class="padding_s">

★<span class="caution">コミュニティ管理人交代依頼が({$num_anatani_c_commu_admin_confirm_list})件きています。</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">承認・拒否</span></a></td>

</div>

</tr>
({/if})
</table>
</td>
</tr>
<!--ここまで：運営者からのお知らせ-->


({*
<!--ここから：新着日記-->
<tr>
<td align="center" style="width:105px;" class="bg_07"><img src="./skin/inc_info/icon_diary.gif" alt="新着日記" style="width:91px;height:14px;"></td>
<td class="bg_02" style="width:595px;">
<table border="0" cellspacing="0" cellpadding="0">
<!--ここから：リスト-->
<tr>
<td>
<div class="padding_s">

({foreach from=$diaries item='diary'})
({$diary.r_datetime|date_format:"%m月%d日 %R"})
<a href="/page.php?p=fh_diary&amp;target_c_diary_id=({$diary.c_diary_id})">({$diary.subject})</a>
({if $diary.image_filename_1 || $diary.image_filename_2 || $diary.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})
（({$diary.c_member.nickname})）
<br>
({/foreach})

</div>
</td>
</tr>
<!--ここまで：リスト-->

</table>
</td>
</tr>
*})
</table>
</div>
<!--ここまで：新着日記-->

</td>
</tr>
</table>


