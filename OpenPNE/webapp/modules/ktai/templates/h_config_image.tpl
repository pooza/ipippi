({$inc_ktai_header|smarty:nodefaults})

<center>�ץ�ե�����̿�����</center>
<hr>
({if $c_member.image_filename})
���ߤμ̿�:[<a href="img.php?filename=({$c_member.image_filename})&amp;f=jpg">��</a>]<br>
<img src="img.php?filename=({$c_member.image_filename})&amp;w=120&amp;h=120&amp;f=jpg"><br>
[<a href="do_ktai.php?cmd=h_config_image_delete_image&amp;({$tail})">���</a>]<br>
({else})
���ߡ��ץ�ե�����̿�����Ͽ����Ƥ��ޤ���<br>
({/if})
<br>
�ʲ��Υ��ɥ쥹�˼̿���ź�դ����������Ƥ���������<br>
<a href="mailto:({$mail_address})">�᡼������</a><br>
<br>
<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})