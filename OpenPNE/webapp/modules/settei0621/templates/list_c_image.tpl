({$inc_header|smarty:nodefaults})

<form action="module_page.php" method="get">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('list_c_image')})">
ɽ�������
<select name="page_size">
<option value="20"({if $pager.page_size==20}) selected="selected"({/if})>20��</option>
<option value="50"({if $pager.page_size==50}) selected="selected"({/if})>50��</option>
<option value="100"({if $pager.page_size==100}) selected="selected"({/if})>100��</option>
<option value="500"({if $pager.page_size==500}) selected="selected"({/if})>500��</option>
</select>
<input type="submit" class="submit" value="�ѹ�">
<div class="caution">��ɽ�������¿������Ƚ������Ť��ʤꡢ�����С�����٤�������ޤ���</div>
</form>

<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) ���� ({$pager.start_num}) - ({$pager.end_num})���ܤ�ɽ�����Ƥ��ޤ�
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">����</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">����</a>
({/if})
</div>
<!-- pager_end -->


<table>
({foreach name=c_image from=$c_image_list item=item})
({if $smarty.foreach.c_image.iteration % 5 == 1})<tr>({/if})

<td style="font-size:10pt">
({$item.r_datetime|date_format:"%Y/%m/%d %H:%M"})
<div style="width:120px; height:120px">
<a href="img.php?filename=({$item.filename})" target="_blank"
><img src="img.php?filename=({$item.filename})&amp;w=120&amp;h=120"
></a></div>
({$item.filename})<br>
[<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('delete_c_image_confirm')})&amp;target_c_image_id=({$item.c_image_id})">���</a>]
</td>

({if $smarty.foreach.c_image.iteration % 5 == 0})</tr>({/if})
({/foreach})
</table>


<!-- pager_begin -->
<div class="pager">
({$pager.total_num}) ���� ({$pager.start_num}) - ({$pager.end_num})���ܤ�ɽ�����Ƥ��ޤ�
<br>
({if $pager.prev_page})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$pager.prev_page})&amp;page_size=({$pager.page_size})">����</a>&nbsp;
({/if})
({foreach from=$pager.disp_pages item=i})
({if $i == $pager.page})
&nbsp;<strong>({$i})</strong>&nbsp;
({else})
<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$i})&amp;page_size=({$pager.page_size})">&nbsp;({$i})&nbsp;</a>
({/if})
({/foreach})
({if $pager.next_page})
&nbsp;<a href="module_page.php?m=({$module_name})&amp;p=({$hash_tbl->hash('list_c_image')})&amp;page=({$pager.next_page})&amp;page_size=({$pager.page_size})">����</a>
({/if})
</div>
<!-- pager_end -->

({$inc_footer|smarty:nodefaults})