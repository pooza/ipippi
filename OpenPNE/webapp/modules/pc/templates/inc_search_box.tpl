<table border="0" cellspacing="0" cellpadding="0" style="width:720px;">
<tr>
<td style="width:720px;height:2px;" colspan="2"><img src="./skin/dummy.gif" style="width:720px;height:2px;" class="dummy"></td>
</tr>
<tr>
<td width="600" align="center">

({*ここから：本体*})
<div class="bg_01 bg_09" style="width:600px;height:24px;border-left:none 0px;border-right:none 0px;border-top:none 0px;">
<form action="./do.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="cmd" value="h_home_search">

<table border="0" cellspacing="0" cellpadding="0" class="search_bar" style="width:600px;height:24px;">
<tr>
<td align="center" style="height:24px;">
<img src="./skin/inc_search_box/icon.gif" alt="search" style="width:62px;height:20px;" class="icon">
<input type="text" size="30" name="q" class="text border_01" value=""	style="width:180px;">
<input type="image" src="./skin/inc_search_box/button_1.gif" value="diary" alt="日記" border="0" name="diary" class="button" style="width:62px;height:20px;">
<input type="image" src="./skin/inc_search_box/button_2.gif" value="community" alt="コミュニティ" border="0" name="community" class="button" style="width:62px;height:20px;">
<input type="image" src="./skin/inc_search_box/button_3.gif" value="web" alt="web" border="0" name="web" class="button" style="width:62px;height:20px;">
</td>
</tr>
</table>

</form>
</div>
({*ここまで：本体*})

</td>
<td width="120" align="right" nowrap>
<span style="font-size:10px">現在の会員数: ({$count_all_members|number_format})名</span>
</td>
</tr>
<tr>
<td style="width:720px;height:2px;" colspan="2"><img src="./skin/dummy.gif" style="width:720px;height:2px;" class="dummy"></td>
</tr>
</table>


<img src="./skin/dummy.gif" class="v_spacer_m">