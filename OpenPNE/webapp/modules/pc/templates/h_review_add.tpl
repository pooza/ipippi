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

({ext_include file="inc_alert_box.tpl"})({* エラーメッセージコンテナ *})

<table class="container" border="0" cellspacing="0" cellpadding="0">({*BEGIN:container*})
<tr>
<td class="full_content" align="center">
({***************************})
({**ここから：メインコンテンツ**})
({***************************})

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ********************************** -->
<!-- ******ここから：レビューを書く****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_05" align="center">
<!-- *ここから：レビューを書く＞内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">レビューを書く</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
({*ここまで：header*})
({*ここから：body*})
<!-- ここから：主内容 -->
<div class="border_01" class="bg_05">

<img src="./skin/dummy.gif" class="v_spacer_l">

<!-- ここから：主内容＞＞内枠 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:550px;margin:0px auto;" class="border_01">
({*********})
<tr>
<td style="width:548px;height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="center" valign="middle">

<!-- ここから：主内容＞＞内枠＞＞検索説明文 -->
<div style="padding:10px 30px 10px 30px;text-align:left;">

レビューを書きたい商品を検索します。<br>
キーワードを入力し、該当するカテゴリを選択してください。<br>


</div>
<!-- ここまで：主内容＞＞内枠＞＞検索説明文 -->


<!-- ここから：主内容＞＞内枠＞＞検索フォーム -->
<div style="padding:10px 0px;text-align:center;">

<form action="page.php" method="post">
<input type="hidden" name="dummy" value="雀の往来←日本語文字コード判別文字列">
<input type="hidden" name="p" value="h_review_add">
<input type="hidden" name="search_flag" value="1">
キーワード&nbsp;<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">
<input name="keyword" size="15" value="({$keyword})">
&nbsp;カテゴリ&nbsp;<img src="./skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1">
<select name="category_id">
<option value="" selected="selected">選択してください
({html_options options=$category_disp selected=$category_id})
</select>
&nbsp;<input type="submit" name="button" value="　検 索　">
</form>

</div>
<!-- ここまで：主内容＞＞内枠＞＞検索フォーム -->

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：主内容＞＞内枠 -->

<img src="./skin/dummy.gif" class="v_spacer_l">

</div>
<!-- ここまで：主内容 -->
({*ここまで：body*})
({*ここから：footer*})
<!-- 無し -->
({*ここまで：footer*})
<!-- *ここまで：レビューを書く＞＞内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：レビューを書く****** -->
<!-- ********************************** -->

<img src="./skin/dummy.gif" class="v_spacer_l">

({if $search_result})
<!-- ************************************ -->
<!-- ******ここから：検索結果****** -->
<table border="0" cellspacing="0" cellpadding="0" style="width:650px;margin:0px auto;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:636px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td align="center">
<!-- *ここから：検索結果内容* -->
({*ここから：header*})
<!-- ここから：小タイトル -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
<tr>
<td style="width:36px;" class="bg_06"><img src="./skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:598px;padding:2px 0px;" class="bg_06"><span class="c_00"><span class="b_b">({$keyword})の検索結果</span>&nbsp;&nbsp;***&nbsp;<span class="b_b">({$total_num})件</span>&nbsp;が該当しました。</span></td>
</tr>
</table>
<!-- ここまで：小タイトル -->
<!-- ここから：次前表示上段 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page-1})">前を表示</a>&nbsp;&nbsp;({/if})
({$start_num})件～({$end_num})件を表示&nbsp;&nbsp;
({if $is_next}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page+1})">次を表示</a>({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：次前表示上段 -->
({*ここまで：header*})
({*ここから：body*})
<!-- *ここから：検索結果内容＞＞商品情報* -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;" class="border_01">
({*********})
<tr>
<td style="width:636px;height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
({foreach from=$search_result item=product key=key})
<!--▼レビュー1つ分ここから-->
<tr>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:180px;" class="bg_02" rowspan="5" align="center">

<div class="padding_s">

({strip})
<a href="({$product.DetailPageURL})" target="_blank">
({if $product.MediumImage})<img src="({$product.MediumImage.URL})"><br>({/if})
詳細を見る
</a>
({/strip})

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:70px;" class="bg_03" align="center">

<div class="padding_s">

タイトル

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:382px;">

<div class="padding_s">

<span class="b_b">({$product.ItemAttributes.Title})</span>

</div>

</td>
<td style="width:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;height:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:455px;" class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_03" align="center">

<div class="padding_s">

説明

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="left">

<div class="padding_s">

({if $product.ItemAttributes.Publisher})
<div>販売: ({$product.ItemAttributes.Publisher})</div>
({/if})

({if $product.ItemAttributes.Platform})
<div>対象: ({$product.ItemAttributes.Platform})</div>
({/if})

({if $product.ItemAttributes.ReleaseDate})
<div>発売: ({$product.ItemAttributes.ReleaseDate|bs_date_format:'Y年n月j日'})</div>
({/if})

({if $product.ItemAttributes.Creator})
<p>
({foreach from=$product.ItemAttributes.Creator item='creator' name='creators'})
({$creator.Role}): ({$creator._content})
({if !$smarty.foreach.creators.last})<br>({/if})
({/foreach})
</p>
({/if})

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;height:1px;" class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" colspan="5"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_02" align="right" colspan="3">

<div class="padding_s">

<a href="page.php?p=h_review_add_write&category_id=({$category_id})&asin=({$product.ASIN})">レビューを書く</a>

</div>

</td>
<td class="bg_01"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="height:1px;" class="bg_01" colspan="7"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<!--▲レビュー1つ分ここまで-->
({/foreach})
</table>
<!-- *ここまで：検索結果内容＞＞商品情報* -->
({*ここまで：body*})
({*ここから：footer*})
<!-- ここから：次前表示下段 -->
<table border="0" cellspacing="0" cellpadding="0" style="width:636px;">
({*********})
<tr>
<td style="width:636px;" class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td style="width:634px;" class="bg_05" align="right">

<div class="padding_s">

({if $is_prev}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page-1})">前を表示</a>&nbsp;&nbsp;({/if})
({$start_num})件～({$end_num})件を表示&nbsp;&nbsp;
({if $is_next}) <a href="page.php?p=h_review_add&amp;keyword=({$keyword|escape:"url"})&amp;search_flag=1&amp;category_id=({$category_id})&amp;page=({$page+1})">次を表示</a>({/if})

</div>

</td>
<td style="width:1px;" class="bg_01" align="center"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
<tr>
<td class="bg_01" colspan="3"><img src="./skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
({*********})
</table>
<!-- ここまで：次前表示下段 -->
({*ここから：footer*})
<!-- *ここまで：検索結果内容* -->
</td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="./skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>
<!-- ******ここまで：検索結果****** -->
<!-- ************************************ -->
({/if})

<img src="./skin/dummy.gif" class="v_spacer_l">

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
