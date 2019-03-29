({$inc_ktai_header|smarty:nodefaults})

<font color="red">入力エラー</font>
<hr>
({foreach from=$errors item=item})
({$item|smarty:nodefaults})<br>
({/foreach})

({$inc_ktai_footer|smarty:nodefaults})