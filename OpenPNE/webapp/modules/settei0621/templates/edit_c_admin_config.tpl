({$inc_header|smarty:nodefaults})

<h2>SNS�����ѹ�</h2>

({if $msg})<p class="caution">({$msg})</p>({/if})

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_admin_config','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<table>

<tr>
<th>SNS̾</th>
<td><input name="SNS_NAME" type="text" class="text" value="({$c_admin_config.SNS_NAME})" size="30"></td>
</tr>
<tr>
<th>�����ѥ᡼�륢�ɥ쥹</th>
<td><input name="ADMIN_EMAIL" type="text" class="text" value="({$c_admin_config.ADMIN_EMAIL})" size="40"><br>
<span class="caution">���桼����������᡼���From�����ꤵ��ޤ�</span></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>������/�����ץ���</th>
<td>
<input name="IS_CLOSED_SNS" id="IS_CLOSED_SNS_1" type="radio" value="1"({if $c_admin_config.IS_CLOSED_SNS !== "0"}) checked="checked"({/if})><label for="IS_CLOSED_SNS_1">������</label>
<span class="caution">(���üԤξ��Ԥ��ʤ������Ͽ�Ǥ��ޤ���)</span><br>
<input name="IS_CLOSED_SNS" id="IS_CLOSED_SNS_0" type="radio" value="0"({if $c_admin_config.IS_CLOSED_SNS === "0"}) checked="checked"({/if})><label for="IS_CLOSED_SNS_0">�����ץ���</label>
<span class="caution">(���üԤξ��Ԥʤ��Ǥ���Ͽ�Ǥ��ޤ�)</span><br>
</td>
</tr>
<tr>
<th>PC�ǻ�������</th>
<td>
<select name="OPENPNE_ENABLE_PC">
<option value="1"({if $c_admin_config.OPENPNE_ENABLE_PC !== "0"}) selected="selected"({/if})>���ѲĤˤ���</option>
<option value="0"({if $c_admin_config.OPENPNE_ENABLE_PC === "0"}) selected="selected"({/if})>�����ԲĤˤ���</option>
</select>
</td>
</tr>
<tr>
<th>�����ǻ�������</th>
<td>
<select name="OPENPNE_ENABLE_KTAI">
<option value="1"({if $c_admin_config.OPENPNE_ENABLE_KTAI !== "0"}) selected="selected"({/if})>���ѲĤˤ���</option>
<option value="0"({if $c_admin_config.OPENPNE_ENABLE_KTAI === "0"}) selected="selected"({/if})>�����ԲĤˤ���</option>
</select>
</td>
</tr>
<tr>
<th>��Ͽ�β���</th>
<td>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_PCKTAI" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_PCKTAI})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PCKTAI}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_PCKTAI">PC������ξ��������Ͽ��</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_PC" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_PC})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PC}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_PC">PC����Τ���Ͽ��</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_KTAI" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_KTAI})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_KTAI}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_KTAI">���Ӥ���Τ���Ͽ��</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_NONE" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_NONE})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_NONE}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_NONE">��Ͽ������</label><br>
</td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>Amazon������������ID</th>
<td><input name="AMAZON_AFFID" type="text" class="text" value="({$c_admin_config.AMAZON_AFFID})" size="30"><br>
<span class="caution">�����ˤ���ȥ�ӥ塼��ǽ�������ư���ʤ��ʤ�ޤ�</span></td>
</tr>
<tr>
<th>������ڡ���URL</th>
<td><input name="LOGIN_URL_PC" type="text" class="text" value="({$c_admin_config.LOGIN_URL_PC})" size="50"><br>
<span class="caution">
�������ڡ����������ڡ��������ꤹ����˻��ꤷ�ޤ���<br>
���Υڡ����ˤ�<a href="#form">������ե�����</a>���֤��Ƥ���ɬ�פ�����ޤ���</span></td>
</tr>
<tr>
<th>PC�ǥۡ���<br>���֥������塼��</th>
<td><select name="DISPLAY_SCHEDULE_HOME">
<option value="1"({if $c_admin_config.DISPLAY_SCHEDULE_HOME !== "0"}) selected="selected"({/if})>ɽ������</option>
<option value="0"({if $c_admin_config.DISPLAY_SCHEDULE_HOME === "0"}) selected="selected"({/if})>ɽ�����ʤ�</option>
</select></td>
</tr>

<tr>
<th>�ǥ��꡼�˥塼��<br>�������٤�����</th>
<td>
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_mon" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_mon">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_tue" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_tue">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_wed" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_wed">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_thu" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_thu">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_fri" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_fri">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_sat" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_sat">��</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_sun" type="checkbox" value="��"({if in_array("��", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_sun">��</label>
<p class="caution">���桼�����Ϥ��������ꤷ�������˼�������ʳ��ˡ�<br>
�������ס��ּ������ʤ��פ�����Ǥ��ޤ���<br>
��äơ�������0�Ĥ⤷����7�����򤹤�Τϰ�̣������ޤ���</p>
</td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>(�᡼����)����å����ԡ�</th>
<td><input name="CATCH_COPY" type="text" class="text" value="({$c_admin_config.CATCH_COPY})" size="30"></td>
</tr>
<tr>
<th>(�᡼����)���Ĳ��</th>
<td><input name="OPERATION_COMPANY" type="text" class="text" value="({$c_admin_config.OPERATION_COMPANY})" size="30"></td>
</tr>
<tr>
<th>(�᡼����)Copyright</th>
<td><input name="COPYRIGHT" type="text" class="text" value="({$c_admin_config.COPYRIGHT})" size="30"></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>(ʸ��)�ե���</th>
<td><input name="WORD_FRIEND" type="text" class="text" value="({$c_admin_config.WORD_FRIEND})" size="30"></td>
</tr>
<tr>
<th>(ʸ��)�ޥ��ե���</th>
<td><input name="WORD_MY_FRIEND" type="text" class="text" value="({$c_admin_config.WORD_MY_FRIEND})" size="30"></td>
</tr>
<tr>
<th>(ʸ��)(����)�̎ڎݎĎ�</th>
<td><input name="WORD_FRIEND_HALF" type="text" class="text" value="({$c_admin_config.WORD_FRIEND_HALF})" size="30"></td>
</tr>
<tr>
<th>(ʸ��)(����)�ώ��̎ڎݎĎ�</th>
<td><input name="WORD_MY_FRIEND_HALF" type="text" class="text" value="({$c_admin_config.WORD_MY_FRIEND_HALF})" size="30"></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>


<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="�����ѹ�"></td>
</tr>
</table>
</form>

<hr>

<h3><a name="form">����������ե�������HTML</a></h3>

<p>�����˥�����ڡ��������ꤹ����ϡ�
�ʲ���HTML��Ȥäƥե������������Ƥ���������</p>

<textarea cols="84" rows="11">
&lt;form action="({$smarty.const.ABSOLUTE_PATH})do_normal.php" method="post"&gt;
&lt;input name="cmd" type="hidden" value="login"&gt;
&lt;dl&gt;
&lt;dt&gt;&lt;label for="username"&gt;�᡼�륢�ɥ쥹&lt;/label&gt;&lt;/dt&gt;
&lt;dd&gt;&lt;input type="text" name="username" id="username" value="" tabindex="1"&gt;&lt;/dd&gt;
&lt;dt&gt;&lt;label for="password"&gt;�ѥ����&lt;/label&gt;&lt;/dt&gt;
&lt;dd&gt;&lt;input type="password" name="password" id="password" tabindex="2"&gt;&lt;/dd&gt;
&lt;dd&gt;&lt;input type="submit" value="������" tabindex="3"&gt;&lt;/dd&gt;
&lt;/dl&gt;
&lt;/form&gt;
</textarea>

({$inc_footer|smarty:nodefaults})