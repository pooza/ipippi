({$inc_ktai_header|smarty:nodefaults})

<center>({$SNS_NAME})������</center>
<hr>

({if $msg})
<font color="red">({$msg})</font><br>
({/if})
<br>

<form action="do_ktai_normal.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="login">
({if $ktai_address})
<input type="hidden" name="ktai_address" value="({$ktai_address})">
({else})
�����ӥ��ɥ쥹<br>
<textarea name="ktai_address" rows="1" istyle="3" mode="alphabet" maxlength="100"></textarea><br>
({/if})
���ѥ����<br>
<input name="password" type="text" istyle="3" mode="alphabet" value=""><br>
<input name="submit" value="������" type="submit"><br>
</form>
<br>

<form action="do_ktai_normal.php" method="post" utn>
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="easy_login">
({if $ktai_address})
<input type="hidden" name="ktai_address" value="({$ktai_address})">
({/if})
�����󤿤������<br>
<input type="submit" value="������"><br>
<a href="ktai_normal.php?p=whatis_easy_login">&gt;&gt;���󤿤�ێ��ގ��ݤȤ�</a>
</form>

<br>
<font color="orange">�����Ύ͎ߎ����ޤ�̎ގ����ώ������Ƥ�������</font>
<hr>

({if $ktai_address})
<a href="ktai_normal.php?p=login">&gt;&gt;���ӥ��ɥ쥹������</a><br>
({/if})
<a href="ktai_normal.php?p=password_query">&gt;&gt;�ѥ���ɤ�˺�줿��</a><br>
<hr>

({if $IS_CLOSED_SNS})

({$SNS_NAME})�Ͼ������Υ��������ͥåȥ���󥰥����ӥ��Ǥ���<br>
��Ͽ�ˤ�({$SNS_NAME})���üԤ���ξ��Ԥ�ɬ�פǤ���

({elseif !((($smarty.const.OPENPNE_REGIST_FROM) & ($smarty.const.OPENPNE_REGIST_FROM_KTAI)) >> 1)})

������Ͽ��PC����ԤäƤ���������

({else})

������Ͽ����ˤϰʲ��Υ�󥯤��顢��ʸ�����Ϥ����˥᡼����������Ƥ���������<br>
<br>
<a href="mailto:get@({$smarty.const.MAIL_SERVER_DOMAIN})">���᡼�����Ͽ����</a><br>
<br>
�����ʤ餺���ѵ����Ʊ�դ��Ƥ�����Ͽ��ԤäƤ���������<br>
��<a href="ktai_normal.php?p=sns_kiyaku">���ѵ���</a><br>
��<a href="ktai_normal.php?p=sns_privacy">�ץ饤�Х����ݥꥷ��</a><br>

({/if})

({$inc_ktai_footer|smarty:nodefaults})