</td>

<td class="ext_sub_container_right" align="left" valign="top">
({**********************************})
({**ここから：サイドコンテンツ領域**})
({**********************************})

({if $side_banner_html || $inc_side_banner})

<table border="0" cellspacing="0" cellpadding="0" style="width:216px;margin:6px;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:202px;" class="bg_00"><img src="/skin/dummy.gif" style="width:202px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:200px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="/skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:164px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">新着日記</span></td>
</tr>
</table>
</div>
<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:202px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="/skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center">
<table border="0" cellspacing="1" cellpadding="4" style="width:200px;">
<tr>
<td class="bg_02">

<table border="0" cellspacing="1">

({foreach from=$diaries item='diary'})
<tr>
<td valign="top"><img src="/skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"></td>
<td>
	<a href="/page.php?p=fh_diary&target_c_diary_id=({$diary.c_diary_id})">({$diary.subject|t_truncate:40})</a>
	(<a href="/page.php?p=f_home&target_c_member_id=({$diary.c_member_id})">({$diary.c_member.nickname|t_truncate:20})</a>)
	(({$diary.comment_count}))
</td>
<tr>
({/foreach})

</table>

<div align="right">
	<img src="/skin/dummy.gif" class="icon arrow_1">&nbsp;
	<a href="/page.php?p=h_diary_list_all">一覧</a>
</div>

</td>
</tr>
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="/skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_01" colspan="3"><img src="/skin/dummy.gif" style="height:1px;" class="dummy"></td>
</tr>
</table>
</div>
</td>
<td class="bg_00"><img src="/skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:202px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

<table border="0" cellspacing="0" cellpadding="0" style="width:216px;margin:6px;" class="border_07">
<tr>
<td style="width:7px;" class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td style="width:202px;" class="bg_00"><img src="/skin/dummy.gif" style="width:202px;height:7px;" class="dummy"></td>
<td style="width:7px;" class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_01">
<div class="border_01">
<table border="0" cellspacing="0" cellpadding="0" style="width:200px;">
<tr>
<td style="width:36px;" class="bg_06"><img src="/skin/content_header_1.gif" style="width:30px;height:20px;" class="dummy"></td>
<td style="width:164px;padding:2px 0px;" class="bg_06"><span class="b_b c_00">新着BLOG</span></td>
</tr>
</table>
</div>
<div class="bg_00">
<table border="0" cellspacing="0" cellpadding="0" style="width:202px;">
<tr>
<td style="width:1px;" class="bg_01"><img src="/skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
<td class="bg_01" align="center">
<table border="0" cellspacing="1" cellpadding="4" style="width:200px;">
<tr>
<td class="bg_02">

<table border="0" cellspacing="1">

({foreach from=$blog_entries item='entry'})
<tr>
<td valign="top"><img src="/skin/dummy.gif" style="width:14px;height:14px;" class="icon icon_1"></td>
<td>
	<a href="({$entry.link})" target="_blank">({$entry.subject|t_truncate:40})</a>
	(<a href="/page.php?p=f_home&target_c_member_id=({$entry.c_member_id})">({$entry.c_member.nickname|t_truncate:20})</a>)
</td>
<tr>
({/foreach})

</table>

<div align="right">
<img src="/skin/dummy.gif" class="icon arrow_1">&nbsp;
<a href="/page.php?p=h_diary_list_all#recent_blog_entries">一覧</a>
</div>

</td>
</tr>
</table>
</td>
<td style="width:1px;" class="bg_01"><img src="/skin/dummy.gif" style="width:1px;height:1px;" class="dummy"></td>
</tr>
<tr>
<td class="bg_01" colspan="3"><img src="/skin/dummy.gif" style="height:1px;" class="dummy"></td>
</tr>
</table>
</div>
</td>
<td class="bg_00"><img src="/skin/dummy.gif"></td>
</tr>
<tr>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:202px;height:7px;" class="dummy"></td>
<td class="bg_00"><img src="/skin/dummy.gif" style="width:7px;height:7px;" class="dummy"></td>
</tr>
</table>

({/if})

({**********************************})
({**ここまで：サイドコンテンツ領域**})
({**********************************})
</td>

</tr>
</table>

</div>

({$inc_extension_pagelayout_bottom|smarty:nodefaults})
