({$inc_ktai_header|smarty:nodefaults})

<center>ͧ�ͤ�SNS�˾��Ԥ���</center>
<hr>
({if $msg})
<font color=red>({$msg})</font><br>
<br>
({/if})

({if $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_NONE})
���ߡ�������Ͽ����ߤ��Ƥ��ޤ���
({else})
���Ԥ�����ͧ�͡��οͤΥ᡼�륢�ɥ쥹�������Ƥ���������<br>
({if $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PC})
�����ӥ��ɥ쥹�ˤϾ��ԤǤ��ޤ���<br>
({elseif $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_KTAI})
��PC���ɥ쥹�ˤϾ��ԤǤ��ޤ���<br>
({/if})

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="��������ǧʸ����">
<input type="hidden" name="cmd" value="h_invite_insert_c_invite">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
�Ҏ��َ��Ďގڎ�<br>
<input type="text" name="mail_address" istyle="3" mode="alphabet" maxlength="100"><br>
�Ҏ���������<br>
<textarea name="body" cols="15"></textarea><br>
<input type="submit" value="����">
</form>
({/if})

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">�Ύ���</a>

({$inc_ktai_footer|smarty:nodefaults})