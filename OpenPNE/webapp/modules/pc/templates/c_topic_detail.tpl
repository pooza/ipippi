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
<td class="container main_content" align="center">
<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})

({if !$err_msg})

<!-- ******************************** -->
<!-- ******ここから：トピック表示****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:646px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：トピック表示＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:468px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">[({$c_commu.name})] トピック</span></td>
<td style="width:140px;" align="right" class="bg_06">&nbsp;</td>
</tr>
</table>
</div>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_03" align="center" valign="middle" rowspan="5">

<div class="padding_s">

({$c_topic.r_datetime|date_format:"%Y/%m/%d"})<br>({$c_topic.r_datetime|date_format:"%H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:531px;height:30px;" class="bg_05" align="left" valign="middle">
<div class="padding_s">

&nbsp;({$c_topic.name})

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:533px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:531px;height:30px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

&nbsp;<a href="page.php?p=f_home&target_c_member_id=({$c_topic.c_member_id})">({$c_topic.nickname})</a>

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:533px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:531px;height:50px;" class="bg_02" align="left" valign="middle">
<div class="padding_s lh_120">

({if $c_topic.image_position=="TOP"})
({if $c_topic.image_filename1||$c_topic.image_filename2||$c_topic.image_filename3})
<div>
({if $c_topic.image_filename1})<a href="img.php?filename=({$c_topic.image_filename1})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename1})&h=120&w=120"></a>&nbsp;({/if})
({if $c_topic.image_filename2})<a href="img.php?filename=({$c_topic.image_filename2})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename2})&h=120&w=120"></a>&nbsp;({/if})
({if $c_topic.image_filename3})<a href="img.php?filename=({$c_topic.image_filename3})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename3})&h=120&w=120"></a>&nbsp;({/if})
</div>
({/if})
({/if})

({$c_topic.body|t_url2a|nl2br})

({if $c_topic.file_filename1||$c_topic.file_filename2||$c_topic.file_filename3})
<br><br>
({if $c_topic.file_filename1})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$c_topic.c_commu_topic_comment_id})&filename=({$c_topic.file_filename1_url})">({$c_topic.file_filename1})</a>({/if})&nbsp;
({if $c_topic.file_filename2})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$c_topic.c_commu_topic_comment_id})&filename=({$c_topic.file_filename2_url})">({$c_topic.file_filename2})</a>({/if})&nbsp;
({if $c_topic.file_filename3})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$c_topic.c_commu_topic_comment_id})&filename=({$c_topic.file_filename3_url})">({$c_topic.file_filename3})</a>({/if})&nbsp;
({/if})

({if $c_topic.image_position=="BOTTOM"})
({if $c_topic.image_filename1||$c_topic.image_filename2||$c_topic.image_filename3})
<div>
({if $c_topic.image_filename1})<a href="img.php?filename=({$c_topic.image_filename1})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename1})&h=120&w=120"></a>&nbsp;({/if})
({if $c_topic.image_filename2})<a href="img.php?filename=({$c_topic.image_filename2})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename2})&h=120&w=120"></a>&nbsp;({/if})
({if $c_topic.image_filename3})<a href="img.php?filename=({$c_topic.image_filename3})" target="_blank"><img src="./img.php?filename=({$c_topic.image_filename3})&h=120&w=120"></a>&nbsp;({/if})
</div>
({/if})
({/if})
</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：トピック表示＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:566px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：トピック表示****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({if $c_topic_write })

<!-- ******************************** -->
<!-- ******ここから：書き込み一覧****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：書き込み一覧＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">書き込み</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<!-- ここから：主内容＞＞表示件数切り替え -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $all})
<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})">最新を表示</a>
({else})
<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;all=1">すべて表示</a>
({/if})
({if $is_next})<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;direc=1&amp;page=({$page})">＜前</a> ({/if})
({if $is_prev})<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;direc=-1&amp;page=({$page})">次＞</a> ({/if})
 ({$start_num})番～({$end_num})番を表示

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞表示件数切り替え -->
<!-- ここから：主内容＞＞書き込み内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({foreach from=$c_topic_write item=item})
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle" rowspan="3">

<div class="padding_s">

({$item.r_datetime|date_format:"%Y/%m/%d"})<br>
({$item.r_datetime|date_format:"%H:%M"})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:523px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<span class="b_b">({$item.number})</span>:&nbsp;
({if !$item.delete_reason})
<a href="page.php?p=f_home&target_c_member_id=({$item.c_member_id})">({$item.nickname})</a>&nbsp;
({if $c_member_id == $item.c_member_id || $c_member_id == $c_commu.c_member_id_admin})
<a href="page.php?p=c_topic_write_delete_confirm&amp;target_c_commu_topic_comment_id=({$item.c_commu_topic_comment_id})">削除</a><br>
({/if})
({/if})


</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:525px;" class="bg_01" align="center" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left" valign="middle">
<div class="padding_s lh_120">

({if $item.delete_reason})
<span style="color:#000066">削除されました。</span>
({else})

({if $item.image_position=="TOP"})
({if $item.image_filename1||$item.image_filename2||$item.image_filename3})
<div>
({if $item.image_filename1})<a href="img.php?filename=({$item.image_filename1})" target="_blank"><img src="./img.php?filename=({$item.image_filename1})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename2})<a href="img.php?filename=({$item.image_filename2})" target="_blank"><img src="./img.php?filename=({$item.image_filename2})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename3})<a href="img.php?filename=({$item.image_filename3})" target="_blank"><img src="./img.php?filename=({$item.image_filename3})&h=120&w=120"></a>&nbsp;({/if})
</div>
({/if})
({/if})

({$item.body|t_url2a|nl2br})

({if $item.file_filename1||$item.file_filename2||$item.file_filename3})
<br><br>
({if $item.file_filename1})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$item.c_commu_topic_comment_id})&filename=({$item.file_filename1_url})">({$item.file_filename1})</a>&nbsp;({/if})
({if $item.file_filename2})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$item.c_commu_topic_comment_id})&filename=({$item.file_filename2_url})">({$item.file_filename2})</a>&nbsp;({/if})
({if $item.file_filename3})<img src="./skin/icon_file.gif" class="icon"><a href="download.php?comment=({$item.c_commu_topic_comment_id})&filename=({$item.file_filename3_url})">({$item.file_filename3})</a>&nbsp;({/if})
({/if})

({if $item.image_position=="BOTTOM"})
({if $item.image_filename1||$item.image_filename2||$item.image_filename3})
<div>
({if $item.image_filename1})<a href="img.php?filename=({$item.image_filename1})" target="_blank"><img src="./img.php?filename=({$item.image_filename1})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename2})<a href="img.php?filename=({$item.image_filename2})" target="_blank"><img src="./img.php?filename=({$item.image_filename2})&h=120&w=120"></a>&nbsp;({/if})
({if $item.image_filename3})<a href="img.php?filename=({$item.image_filename3})" target="_blank"><img src="./img.php?filename=({$item.image_filename3})&h=120&w=120"></a>&nbsp;({/if})
</div>
({/if})
({/if})

({/if})

</div>
</td>
<td class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({/foreach})
</table>
<!-- ここまで：主内容＞＞書き込み内容 -->
<!-- ここから：主内容＞＞表示件数切り替え -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_02" align="right" valign="middle">
<div style="padding:4px 3px;">

({if $all})
<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})">最新を表示</a>
({else})
<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;all=1">すべて表示</a>
({/if})
({if $is_next})<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;direc=1&amp;page=({$page})">＜前</a> ({/if})
({if $is_prev})<a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_topic.c_commu_topic_id})&amp;direc=-1&amp;page=({$page})">次＞</a> ({/if})
({$start_num})番～({$end_num})番を表示

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞表示件数切り替え -->
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：書き込み一覧＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：書き込み一覧****** -->
<!-- ******************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({/if})
({/if})

({if $is_c_commu_member})

<!-- ********************************** -->
<!-- ******ここから：新しく書き込む****** -->
<form action="page.php" method="post"  enctype="multipart/form-data">
<input type="hidden" name="p" value="c_topic_write_confirm">
<input type="hidden" name="target_c_commu_topic_id" value="({$c_topic.c_commu_topic_id})">

<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01" align="center">
<!-- *ここから：新しく書き込む＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">新しく書き込む</span></td>
</tr>
</table>
</div>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

本　　文

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<textarea name="body" rows="10" cols="50" style="width: 415px">({$body})</textarea>

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

写　真 1

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="file" name="image_filename1" size="40">

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

写　真 2

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="file" name="image_filename2" size="40">

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

写真の位置

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="radio" name="image_position" value="TOP" class="no_bg" checked> 本文の上
<input type="radio" name="image_position" value="BOTTOM" class="no_bg"> 本文の下

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>

({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

添付ファイル 1

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="file" name="file_filename1" size="40">

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:110px;" class="bg_05" align="center" valign="middle">

<div class="padding_s">

添付ファイル 2

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:521px;" class="bg_02" align="left" valign="middle">
<div class="padding_s">

<input type="file" name="file_filename2" size="40">

</div>
</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- ここから：決定欄 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:634px;">
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:632px;" class="bg_05" align="center" valign="middle">

<div style="text-align:left;padding:10px 90px;">

<ul>
<li>公序良俗に反する表現・写真・イラストの掲載は禁止しています。
<li>添付できるファイルのサイズは1MBまでです。
<li>ファイル名に半角カタカナを使用することは出来ません。
<li>セキュリティの観点から、exeファイル等の添付を制限しています。
</ul>

<br>
<div style="text-align:center;">
<input type="submit" value="　確認画面　">
</div>

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:634px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：決定欄 -->
({*ここまで：footer*})
<!-- *ここまで：新しく書き込む＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

</form>
<!-- ******ここまで：新しく書き込む****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({/if})

<!-- **************************************** -->
<!-- ******ここから：コミュニティトップへ****** -->
<div id="link_community_top" align="center">

<img src="./skin/dummy.gif" class="icon arrow_1">&nbsp;
<a href="page.php?p=c_home&target_c_commu_id=({$c_commu.c_commu_id})">[({$c_commu.name})]コミュニティトップへ</a>

</div>
<!-- ******ここまで：コミュニティトップへ****** -->
<!-- **************************************** -->

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
