({$inc_header|smarty:nodefaults})

<h2>�����桼�������ԥ᡼������</h2>

({if $requests.pc_mails})
({if !(($smarty.const.OPENPNE_REGIST_FROM) & ($smarty.const.OPENPNE_REGIST_FROM_PC))})
PC�������Ͽ�Ǥ��ʤ�����ˤʤäƤ��ޤ���<br>
<div class="caution">���ʲ��Υ��ɥ쥹�ˤ���������ޤ���</div>
({else})
PC���ɥ쥹
({/if})
<ul>
({foreach from=$requests.pc_mails item=item})
<li>({$item})</li>
({/foreach})
</ul>
({/if})

({if $requests.ktai_mails})
({if !(($smarty.const.OPENPNE_REGIST_FROM) & ($smarty.const.OPENPNE_REGIST_FROM_KTAI))})
���Ӥ������Ͽ�Ǥ��ʤ�����ˤʤäƤ��ޤ���<br>
<div class="caution">���ʲ��Υ��ɥ쥹�ˤ���������ޤ���</div>
({else})
���ӥ��ɥ쥹
({/if})
<ul>
({foreach from=$requests.ktai_mails item=item})
<li>({$item})</li>
({/foreach})
</ul>
({/if})

({if $requests.error_mails})
�ʲ��Υ��ɥ쥹����Ͽ�ѤߤΤ�����������ޤ���
<ul>
({foreach from=$requests.error_mails item=item})
<li>({$item})</li>
({/foreach})
</ul>
({/if})

({if !$cannot_send})
�������Ƥ������Ǥ�����
({/if})
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('send_invites','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="mails" value="({$requests.mails})">
<input type="hidden" name="message" value="({$requests.message})">
({if !$cannot_send})<input type="submit" name="complete" class="submit" value="����">&nbsp;({/if})
<input type="submit" name="input" class="submit" value="����">
</form>

<hr>

({if $pc_subject || $ktai_subject})
<h3>���ԥ᡼�����Ƴ�ǧ(���ѹ��ϤǤ��ޤ���)</h3>

({if $pc_subject})
<h4>PC����</h4>
<table>
<tr>
<th>��̾</th>
<td>({$pc_subject})</td>
</tr>
<tr>
<th>��ʸ</th>
<td><textarea rows="10" cols="72" readonly="readonly">({$pc_body})</textarea></td>
</tr>
</table>
({/if})

({if $ktai_subject})
<h4>���Ӹ���</h4>
<table>
<tr>
<th>��̾</th>
<td>({$ktai_subject})</td>
</tr>
<tr>
<th>��ʸ</th>
<td><textarea rows="10" cols="72" readonly="readonly">({$ktai_body})</textarea></td>
</tr>
</table>
({/if})
({/if})

({$inc_footer|smarty:nodefaults})