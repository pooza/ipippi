({$inc_header|smarty:nodefaults})

<h2>�����桼�������ԥ᡼������</h2>

({if $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_NONE})
<p>������Ͽ���Ǥ��ʤ�����ˤʤäƤ���Τ������Ǥ��ޤ���</p>
({else})
<p>���Ϥ��줿�᡼�륢�ɥ쥹���ˡ�({$SNS_NAME})�פؤξ��Ծ����������ޤ���</p>
<ul>
<li class="caution">ID���֤Υ桼��������ξ��ԥ᡼��Ȥ�����������ޤ���</li>
<li class="caution">������Ͽ�ѤߤΥ᡼�륢�ɥ쥹�ؤ���������ޤ���</li>
<li class="caution">���٤����̤Υ᡼�륢�ɥ쥹����ꤹ��ȥ����ƥ�¦�����꤭��ʤ���ǽ��������ޤ���</li>
</ul>

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('send_invites','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
�᡼�륢�ɥ쥹<br>
<textarea cols="50" rows="8" name="mails">({$requests.mails})</textarea><br>
<div class="caution">��ʣ���Υ᡼�륢�ɥ쥹���˥᡼�������������ϡ����ԤǶ��ڤä����Ϥ��Ƥ���������</div>
<br>
����ʸ<br>
<textarea cols="60" rows="5" name="message">({$requests.message})</textarea><br>
<br>
<input type="submit" class="submit" value="��ǧ����">
</form>
({/if})

({$inc_footer|smarty:nodefaults})