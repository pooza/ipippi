({$inc_header|smarty:nodefaults})

<h2>SNS設定変更</h2>

({if $msg})<p class="caution">({$msg})</p>({/if})

<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('update_c_admin_config','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<table>

<tr>
<th>SNS名</th>
<td><input name="SNS_NAME" type="text" class="text" value="({$c_admin_config.SNS_NAME})" size="30"></td>
</tr>
<tr>
<th>管理用メールアドレス</th>
<td><input name="ADMIN_EMAIL" type="text" class="text" value="({$c_admin_config.ADMIN_EMAIL})" size="40"><br>
<span class="caution">※ユーザに送られるメールのFromに設定されます</span></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>招待制/オープン制</th>
<td>
<input name="IS_CLOSED_SNS" id="IS_CLOSED_SNS_1" type="radio" value="1"({if $c_admin_config.IS_CLOSED_SNS !== "0"}) checked="checked"({/if})><label for="IS_CLOSED_SNS_1">招待制</label>
<span class="caution">(参加者の招待がなければ登録できません)</span><br>
<input name="IS_CLOSED_SNS" id="IS_CLOSED_SNS_0" type="radio" value="0"({if $c_admin_config.IS_CLOSED_SNS === "0"}) checked="checked"({/if})><label for="IS_CLOSED_SNS_0">オープン制</label>
<span class="caution">(参加者の招待なしでも登録できます)</span><br>
</td>
</tr>
<tr>
<th>PC版使用設定</th>
<td>
<select name="OPENPNE_ENABLE_PC">
<option value="1"({if $c_admin_config.OPENPNE_ENABLE_PC !== "0"}) selected="selected"({/if})>使用可にする</option>
<option value="0"({if $c_admin_config.OPENPNE_ENABLE_PC === "0"}) selected="selected"({/if})>使用不可にする</option>
</select>
</td>
</tr>
<tr>
<th>携帯版使用設定</th>
<td>
<select name="OPENPNE_ENABLE_KTAI">
<option value="1"({if $c_admin_config.OPENPNE_ENABLE_KTAI !== "0"}) selected="selected"({/if})>使用可にする</option>
<option value="0"({if $c_admin_config.OPENPNE_ENABLE_KTAI === "0"}) selected="selected"({/if})>使用不可にする</option>
</select>
</td>
</tr>
<tr>
<th>登録の可否</th>
<td>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_PCKTAI" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_PCKTAI})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PCKTAI}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_PCKTAI">PC・携帯両方から登録可</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_PC" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_PC})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PC}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_PC">PCからのみ登録可</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_KTAI" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_KTAI})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_KTAI}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_KTAI">携帯からのみ登録可</label><br>
<input name="OPENPNE_REGIST_FROM" id="OPENPNE_REGIST_FROM_NONE" type="radio" value="({$smarty.const.OPENPNE_REGIST_FROM_NONE})"({if $c_admin_config.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_NONE}) checked="checked"({/if})><label for="OPENPNE_REGIST_FROM_NONE">登録一時停止</label><br>
</td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>AmazonアソシエイトID</th>
<td><input name="AMAZON_AFFID" type="text" class="text" value="({$c_admin_config.AMAZON_AFFID})" size="30"><br>
<span class="caution">※空にするとレビュー機能が正常に動かなくなります</span></td>
</tr>
<tr>
<th>ログインページURL</th>
<td><input name="LOGIN_URL_PC" type="text" class="text" value="({$c_admin_config.LOGIN_URL_PC})" size="50"><br>
<span class="caution">
※外部ページをログインページに設定する場合に指定します。<br>
そのページには<a href="#form">ログインフォーム</a>を置いておく必要があります。</span></td>
</tr>
<tr>
<th>PC版ホーム<br>週間スケジュール</th>
<td><select name="DISPLAY_SCHEDULE_HOME">
<option value="1"({if $c_admin_config.DISPLAY_SCHEDULE_HOME !== "0"}) selected="selected"({/if})>表示する</option>
<option value="0"({if $c_admin_config.DISPLAY_SCHEDULE_HOME === "0"}) selected="selected"({/if})>表示しない</option>
</select></td>
</tr>

<tr>
<th>デイリーニュース<br>受信頻度の設定</th>
<td>
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_mon" type="checkbox" value="月"({if in_array("月", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_mon">月</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_tue" type="checkbox" value="火"({if in_array("火", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_tue">火</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_wed" type="checkbox" value="水"({if in_array("水", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_wed">水</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_thu" type="checkbox" value="木"({if in_array("木", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_thu">木</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_fri" type="checkbox" value="金"({if in_array("金", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_fri">金</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_sat" type="checkbox" value="土"({if in_array("土", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_sat">土</label>&nbsp;
<input name="DAILY_NEWS_DAY[]" id="DAILY_NEWS_DAY_sun" type="checkbox" value="日"({if in_array("日", $c_admin_config.DAILY_NEWS_DAY)}) checked="checked"({/if})><label for="DAILY_NEWS_DAY_sun">日</label>
<p class="caution">※ユーザーはここで設定した曜日に受信する以外に、<br>
「毎日」、「受信しない」が選択できます。<br>
よって、ここで0個もしくは7個選択するのは意味がありません。</p>
</td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>(メール用)キャッチコピー</th>
<td><input name="CATCH_COPY" type="text" class="text" value="({$c_admin_config.CATCH_COPY})" size="30"></td>
</tr>
<tr>
<th>(メール用)運営会社</th>
<td><input name="OPERATION_COMPANY" type="text" class="text" value="({$c_admin_config.OPERATION_COMPANY})" size="30"></td>
</tr>
<tr>
<th>(メール用)Copyright</th>
<td><input name="COPYRIGHT" type="text" class="text" value="({$c_admin_config.COPYRIGHT})" size="30"></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>

<tr>
<th>(文言)フレンド</th>
<td><input name="WORD_FRIEND" type="text" class="text" value="({$c_admin_config.WORD_FRIEND})" size="30"></td>
</tr>
<tr>
<th>(文言)マイフレンド</th>
<td><input name="WORD_MY_FRIEND" type="text" class="text" value="({$c_admin_config.WORD_MY_FRIEND})" size="30"></td>
</tr>
<tr>
<th>(文言)(携帯)ﾌﾚﾝﾄﾞ</th>
<td><input name="WORD_FRIEND_HALF" type="text" class="text" value="({$c_admin_config.WORD_FRIEND_HALF})" size="30"></td>
</tr>
<tr>
<th>(文言)(携帯)ﾏｲﾌﾚﾝﾄﾞ</th>
<td><input name="WORD_MY_FRIEND_HALF" type="text" class="text" value="({$c_admin_config.WORD_MY_FRIEND_HALF})" size="30"></td>
</tr>

<tr><td colspan="2" style="padding:0;background:#000"><img src="skin/dummy.gif" height="1"></td></tr>


<tr>
<th>&nbsp;</th>
<td><input type="submit" class="submit" value="設定変更"></td>
</tr>
</table>
</form>

<hr>

<h3><a name="form">外部ログインフォーム用HTML</a></h3>

<p>外部にログインページを設定する場合は、
以下のHTMLを使ってフォームを作成してください。</p>

<textarea cols="84" rows="11">
&lt;form action="({$smarty.const.ABSOLUTE_PATH})do_normal.php" method="post"&gt;
&lt;input name="cmd" type="hidden" value="login"&gt;
&lt;dl&gt;
&lt;dt&gt;&lt;label for="username"&gt;メールアドレス&lt;/label&gt;&lt;/dt&gt;
&lt;dd&gt;&lt;input type="text" name="username" id="username" value="" tabindex="1"&gt;&lt;/dd&gt;
&lt;dt&gt;&lt;label for="password"&gt;パスワード&lt;/label&gt;&lt;/dt&gt;
&lt;dd&gt;&lt;input type="password" name="password" id="password" tabindex="2"&gt;&lt;/dd&gt;
&lt;dd&gt;&lt;input type="submit" value="ログイン" tabindex="3"&gt;&lt;/dd&gt;
&lt;/dl&gt;
&lt;/form&gt;
</textarea>

({$inc_footer|smarty:nodefaults})