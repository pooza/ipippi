({$inc_header|smarty:nodefaults})

<div id="page_navi">
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=h_home">【PC版】 h_homeのお知らせ</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_h_home">【携帯】 h_homeのお知らせ</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_fh_diary">【携帯】 fh_diaryのお知らせ</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_f_home">【携帯】 f_homeのお知らせ</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=k_c_home">【携帯】 c_homeのお知らせ</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=sns_kiyaku">利用規約</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=sns_privacy">プライバシーポリシー</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_footer_before">ログイン前フッター</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_footer_after">ログイン後フッター</a></li>
</ul>

<h2>PC版全ページ共通</h2>
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_html_head">HTML挿入(HTML head内)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_top">HTML挿入(ページ上部)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_page_bottom">HTML挿入(ページ下部)</a></li>
</ul>

<h2>携帯版全ページ共通</h2>
<ul>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_html_head">HTML挿入(HTML head内)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_header">HTML挿入(ページ上部)</a></li>
<li><a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('edit_c_admin_info')})&amp;target=inc_ktai_footer">HTML挿入(ページ下部)</a></li>
</ul>
</div>

<div id="page_body">

({if $requests.target == 'h_home'})
＜ＰＣ版＞ホームのお知らせ
({elseif $requests.target == 'k_h_home'})
＜携帯版＞ホームのお知らせ
({elseif $requests.target == 'k_fh_diary'})
＜携帯版＞日記ページのお知らせ
({elseif $requests.target == 'k_f_home'})
＜携帯版＞フレンドページのお知らせ
({elseif $requests.target == 'k_c_home'})
＜携帯版＞コミュニティページのお知らせ
({elseif $requests.target == 'sns_kiyaku'})
利用規約
({elseif $requests.target == 'sns_privacy'})
プライバシーポリシー
({elseif $requests.target == 'inc_html_head'})
【PC版】HTML挿入(HTML head内)
({elseif $requests.target == 'inc_page_top'})
【PC版】HTML挿入(ページ上部)
({elseif $requests.target == 'inc_page_bottom'})
【PC版】HTML挿入(ページ下部)
({elseif $requests.target == 'inc_ktai_html_head'})
【携帯】HTML挿入(HTML head内)
({elseif $requests.target == 'inc_ktai_header'})
【携帯】HTML挿入(ページ上部)
({elseif $requests.target == 'inc_ktai_footer'})
【携帯】HTML挿入(ページ下部)
({/if})

({if $msg})
<div class="caution">({$msg})</div>
({/if})

<form action="module_do.php" method="post">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('edit_c_admin_info','do')})">
<input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="target" value="({$requests.target})">
<textarea name="body" cols="({$cols|default:60})" rows="({$rows|default:10})">({$c_siteadmin.body})</textarea><br>
<input type="submit" class="submit" value="変更">
</form>

({if $requests.target == 'sns_kiyaku' || $requests.target == 'sns_privacy'})
<p class="caution">※HTMLタグは使用<strong>できません</strong>が、URLはリンクされます。</p>
<p><a href="normal.php?p=({$requests.target})" target="_blank">({$requests.target})</a>
({else})
<p class="caution">※HTMLタグが使用できますが、タグの閉じ忘れ等がありますと表示が崩れるなどの問題が起こることがありますのでご注意ください。</p>
({/if})

</div>

({$inc_footer|smarty:nodefaults})