<!--������ե��᡼����󡡡�������������-->
<table border="0" cellspacing="0" cellpadding="0" style="width:720px;" class="info">
<tr>
<td style="width:20px;"><img src="./skin/dummy.gif" style="width:20px;height:1px;" class="dummy"></td>
<td style="width:700px;" align="center" valign="middle">

<!--�������顧���ļԤ���Τ��Τ餻-->
<div class="border_07 bg_07">
<table border="0" cellspacing="1" cellpadding="0" style="width:700px;" class="info_body">
<tr>
<td align="center" style="width:105px;" class="bg_07"><img src="./skin/inc_info/icon_information.gif" alt="���Τ餻" style="width:91px;height:14px;"></td>
<td class="bg_02" style="width:595px;">
<table border="0" cellspacing="0" cellpadding="0">
<!--�������顧�ꥹ��-->
<tr>
<td>

<div class="padding_s">

({$site_info|smarty:nodefaults|default:"&nbsp;"})

</div>

</td>
</tr>
<!--�����ޤǡ��ꥹ��-->
({if $num_f_confirm_list })
<tr>
<td>

<div class="padding_s">

��<span class="caution">��ǧ�Ԥ��Υ��С���({$num_f_confirm_list})̾���ޤ���</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">��ǧ������</span></a>

</div>

</td>
</tr>
({/if})


<!--�ꥹ�ȣ�-->
({if $num_message_not_is_read })
<tr>
<td>

<div class="padding_s">

��<span class="caution">�����å�������({$num_message_not_is_read})�濫��ޤ���</span>&nbsp;<a href="page.php?p=h_message_box"><span class="b_b">��å��������ɤ�</span></a></td>

</div>

</tr>
({/if})
<!--�ꥹ�ȣ�-->
({if $num_diary_not_is_read })
<tr>
<td>

<div class="padding_s">

��<span class="caution">({$num_diary_not_is_read})����������Ф��ƿ��女���Ȥ�����ޤ���</span>&nbsp;<a href="page.php?p=fh_diary&target_c_diary_id=({$first_diary_read})"><span class="caution">�����򸫤�</span></a></td>

</div>

</tr>
({/if})

<!--�ꥹ�ȣ�-->
({if $num_h_confirm_list })
<tr>
<td>

<div class="padding_s">

��<span class="caution">���ߥ�˥ƥ����þ�ǧ�Ԥ��Υ��С���({$num_h_confirm_list})̾���ޤ���</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">��ǧ������</span></a></td>

</div>

</tr>
({/if})

<!--�ꥹ�ȣ�-->
({if $anatani_c_commu_admin_confirm_list})
<tr>
<td>

<div class="padding_s">

��<span class="caution">���ߥ�˥ƥ������͸�����꤬({$num_anatani_c_commu_admin_confirm_list})�來�Ƥ��ޤ���</span>&nbsp;<a href="page.php?p=h_confirm_list"><span class="b_b">��ǧ������</span></a></td>

</div>

</tr>
({/if})
</table>
</td>
</tr>
<!--�����ޤǡ����ļԤ���Τ��Τ餻-->


({*
<!--�������顧��������-->
<tr>
<td align="center" style="width:105px;" class="bg_07"><img src="./skin/inc_info/icon_diary.gif" alt="��������" style="width:91px;height:14px;"></td>
<td class="bg_02" style="width:595px;">
<table border="0" cellspacing="0" cellpadding="0">
<!--�������顧�ꥹ��-->
<tr>
<td>
<div class="padding_s">

({foreach from=$diaries item='diary'})
({$diary.r_datetime|date_format:"%m��%d�� %R"})
<a href="/page.php?p=fh_diary&amp;target_c_diary_id=({$diary.c_diary_id})">({$diary.subject})</a>
({if $diary.image_filename_1 || $diary.image_filename_2 || $diary.image_filename_3})<img src="./skin/icon_camera.gif" class="icon">({/if})
��({$diary.c_member.nickname})��
<br>
({/foreach})

</div>
</td>
</tr>
<!--�����ޤǡ��ꥹ��-->

</table>
</td>
</tr>
*})
</table>
</div>
<!--�����ޤǡ���������-->

</td>
</tr>
</table>


