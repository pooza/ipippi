({$inc_ktai_header|smarty:nodefaults})

<center><font color="orange">��������</font></center>
<hr>

���ʤ��Υڡ�����ˬ�줿�ͤ����Ǥ���<br>

({foreach from=$c_ashiato_list item=c_ashiato})

({$c_ashiato.r_datetime|date_format:"%m/%d %H:%M"}) <a href="ktai_page.php?p=f_home&target_c_member_id=({$c_ashiato.c_member_id_from })&amp;({$tail})">({$c_ashiato.nickname|default:"&nbsp;"})</a><br>

({/foreach})
<br>
<hr>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})