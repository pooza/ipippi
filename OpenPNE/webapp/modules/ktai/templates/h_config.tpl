({$inc_ktai_header|smarty:nodefaults})

<center>�����ѹ�</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
<br>
({/if})

�ʲ����ѹ��ˤϥѥ���ɤ����Ϥ�ɬ�פǤ���<br>
<br>
��<a href="ktai_page.php?p=h_config_mail&amp;({$tail})">���ӥ᡼�륢�ɥ쥹�ѹ�</a><br>
({if $smarty.const.OPENPNE_ENABLE_PC})
��<a href="ktai_page.php?p=h_pc_send&amp;({$tail})">PC�᡼�륢�ɥ쥹��Ͽ</a><br>
({/if})
<br>
��<a href="ktai_page.php?p=h_config_password&amp;({$tail})">�ѥ�����ѹ�</a><br>
��<a href="ktai_page.php?p=h_config_password_query&amp;({$tail})">��̩�μ�����������</a><br>
��<a href="ktai_page.php?p=h_config_easy_login&amp;({$tail})">���󤿤����������</a><br>
<br>
��<a href="ktai_page.php?p=h_taikai_confirm&amp;({$tail})">����³��</a><br>

<hr>
<a href="ktai_page.php?p=h_home&amp;({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})