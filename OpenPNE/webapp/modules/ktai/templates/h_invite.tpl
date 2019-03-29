({$inc_ktai_header|smarty:nodefaults})

<center>友人をSNSに招待する</center>
<hr>
({if $msg})
<font color=red>({$msg})</font><br>
<br>
({/if})

({if $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_NONE})
現在、新規登録を停止しています。
({else})
招待したい友人・知人のメールアドレスを記入してください。<br>
({if $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_PC})
※携帯アドレスには招待できません。<br>
({elseif $smarty.const.OPENPNE_REGIST_FROM == $smarty.const.OPENPNE_REGIST_FROM_KTAI})
※PCアドレスには招待できません。<br>
({/if})

<form action="do_ktai.php" method="post">
<input type="hidden" name="dummy" value="符号形式確認文字列">
<input type="hidden" name="cmd" value="h_invite_insert_c_invite">
<input type="hidden" name="ksid" value="({$PHPSESSID})">
ﾒｰﾙｱﾄﾞﾚｽ<br>
<input type="text" name="mail_address" istyle="3" mode="alphabet" maxlength="100"><br>
ﾒｯｾｰｼﾞ<br>
<textarea name="body" cols="15"></textarea><br>
<input type="submit" value="送信">
</form>
({/if})

<hr>
<a href="ktai_page.php?p=h_home&({$tail})">ﾎｰﾑ</a>

({$inc_ktai_footer|smarty:nodefaults})