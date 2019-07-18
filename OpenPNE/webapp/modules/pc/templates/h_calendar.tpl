({$inc_html_header|smarty:nodefaults})
<body>
({ext_include file="inc_extension_pagelayout_top.tpl"})
<table class="mainframe" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="container inc_page_header">
({$inc_page_header|smarty:nodefaults})
</td>
</tr>
<tr>
<td class="container inc_navi">
({$inc_navi|smarty:nodefaults})
</td>
</tr>
<tr>
<td class="container main_content">
<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ****************************** -->
<!-- ******ここから：カレンダー****** -->
<form name="regForm" action="" method="post">

<table border="0" cellspacing="0" cellpadding="0" style="width:684px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:670px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：カレンダー＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:670px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:622px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">
({$ym.year_disp})年({$ym.month_disp})月のカレンダー
</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<!-- ここから：主内容＞＞天気予報を見る -->
<table border="0" cellspacing="0" cellpadding="0" style="width:670px;" class="border_01">
<tr>
<td style="width:468px;padding:2px 0px;" class="bg_05">
&nbsp;<img src="./skin/icon_weather_FC.gif" class="icon">
<a href="({$weather_url})" target="_blank">天気予報を見る</a>

&nbsp;<img src="./skin/icon_schedule.gif" class="icon">
<a href="page.php?p=h_schedule_add" target="_blank">予定を追加</a>&nbsp;

</td>
<td style="width:200px;padding:2px 0px;" class="bg_05" align="right">
<a href="page.php?p=h_calendar&amp;year=({$ym.year_prev})&amp;month=({$ym.month_prev})">&lt;&lt;&nbsp;前の月</a>
|
<a href="page.php?p=h_calendar">今月</a>
|
<a href="page.php?p=h_calendar&amp;year=({$ym.year_next})&amp;month=({$ym.month_next})">次の月&nbsp;&gt;&gt;</a>&nbsp;
</td>
</tr>
</table>
<!-- ここまで：主内容＞＞天気予報を見る -->
<!-- ここから：主内容＞＞カレンダー -->
<table border="0" cellspacing="1" cellpadding="0" style="width:670px;" class="border_01">
<tr>
<td style="width:14%;padding:2px;" class="bg_02 c_02">日</td>
<td style="width:14%;padding:2px;" class="bg_02">月</td>
<td style="width:14%;padding:2px;" class="bg_02">火</td>
<td style="width:14%;padding:2px;" class="bg_02">水</td>
<td style="width:14%;padding:2px;" class="bg_02">木</td>
<td style="width:14%;padding:2px;" class="bg_02">金</td>
<td style="width:14%;padding:2px;" class="bg_02 c_03">土</td>
</tr>
({foreach from=$calendar item=week})
<tr>
({foreach from=$week item=item})
({if $item.now})
<td style="height:65px;padding:2px;" align="left" valign="top" class="bg_09">
({else})
<td style="height:65px;padding:2px;" align="left" valign="top" class="bg_02">
({/if})
({if $item.day})
({if $item.now})
<span class="b_b">({$item.day})</span>
({else})
({$item.day})
({/if})<br>
<a href="page.php?p=h_schedule_add&amp;year=({$ym.year_disp})&amp;month=({$ym.month_disp})&amp;day=({$item.day})" target="_blank"><img src="./skin/icon_schedule.gif" class="icon"></a><br>

({* イベント *})
({foreach from=$item.event item=item_event})
<img src="./skin/icon_event_({if $item_event.is_join})R({else})B({/if}).gif" class="icon"><a href="page.php?p=c_event_detail&amp;target_c_commu_topic_id=({$item_event.c_commu_topic_id})">({$item_event.name})</a><br>
({/foreach})

({* スケジュール *})
({foreach from=$item.schedule item=item_schedule})
<img src="./skin/icon_pen.gif" class="icon"><a href="page.php?p=h_schedule&amp;target_c_schedule_id=({$item_schedule.c_schedule_id})" target="_blank">({$item_schedule.title})</a><br>
({/foreach})
({else})
&nbsp;
({/if})
</td>
({/foreach})
</tr>
({/foreach})
</table>
<!-- ここまで：主内容＞＞カレンダー -->
<!-- ここから：主内容＞＞天気予報を見る -->
<table border="0" cellspacing="0" cellpadding="0" style="width:670px;" class="border_01">
<tr>
<td style="width:668px;padding:2px 0px;" class="bg_09">
※<img src="./skin/icon_schedule.gif" class="icon">アイコンをクリックすると予定を入力することができます。予定は他の人には公開されません。<br>
※プレゼント箱は({$WORD_MY_FRIEND})の誕生日、青色の旗はイベント、赤色の旗は参加イベントを意味します。
</td>
</tr>
</table>
<!-- ここまで：主内容＞＞天気予報を見る -->
<!-- ここから：主内容＞＞天気予報を見る -->
<table border="0" cellspacing="0" cellpadding="0" style="width:670px;" class="border_01">
<tr>
<td style="width:668px;padding:2px 0px;" align="right" class="bg_05">
<a href="page.php?p=h_calendar&amp;year=({$ym.year_prev})&amp;month=({$ym.month_prev})">&lt;&lt;&nbsp;前の月</a>
|
<a href="page.php?p=h_calendar">今月</a>
|
<a href="page.php?p=h_calendar&amp;year=({$ym.year_next})&amp;month=({$ym.month_next})">次の月&nbsp;&gt;&gt;</a>&nbsp;
</td>
</tr>
</table>
<!-- ここまで：主内容＞＞天気予報を見る -->
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：カレンダー＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
</form>
<!-- ******ここまで：カレンダー****** -->
<!-- ****************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({***************************})
({**ここまで：メインコンテンツ**})
({***************************})
</td>
</tr>
</table>({*END:container*})
</td>
</tr>
<tr>
<td class="container inc_page_footer">
({$inc_page_footer|smarty:nodefaults})
</td>
</tr>
</table>
({ext_include file="inc_extension_pagelayout_bottom.tpl"})
</body>
</html>
