({$inc_header|smarty:nodefaults})

<h2>�񤭹��ߴ���</h2>
({if $msg})
<p class="caution">({$msg})</p>
({/if})

<p>ID��Ⱦ�ѿ��������Ϥ��Ƥ���������</p>

({* ���� *})
<h3>����</h3>
<div class="caution">
URL�㡧(�أأؤ�ID)<br>
({$smarty.const.ABSOLUTE_PATH})page.php?p=fh_diary&amp;target_c_diary_id=�أأ�<br>
</div>
<form action="module_page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<p>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('delete_kakikomi')})">
ID��<input type="text" name="target_c_diary_id" value="({$requests.target_c_diary_id})" size="6">
<input type="submit" class="submit" value="��ǧ">
</p>
</form>

({if $c_diary})
<table>
<tr>
<th>�����ȥ�</th>
<td>({$c_diary.subject})</td>
</tr>
<tr>
<th>��ʸ</th>
<td style="width:360px">({$c_diary.body|t_truncate:200})</td>
</tr>
<tr>
<th>URL</th>
<td><a href="page.php?p=fh_diary&amp;target_c_diary_id=({$c_diary.c_diary_id})" target="_blank">URL</a></td>
</tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<tr>
<th><input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_kakikomi_c_diary','do')})">
<input type="hidden" name="target_c_diary_id" value="({$c_diary.c_diary_id})">
&nbsp;</th>
<td><input type="submit" class="submit" value="�������"></td>
</tr>
</form>
</table>
({/if})

<hr>

({* ���ߥ�˥ƥ� *})
<h3>���ߥ�˥ƥ�</h3>
<div class="caution">
URL�㡧(�أأؤ�ID)<br>
({$smarty.const.ABSOLUTE_PATH})page.php?p=c_home&amp;target_c_commu_id=�أأ�<br>
</div>
<form action="module_page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<p>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('delete_kakikomi')})">
ID��<input type="text" name="target_c_commu_id" value="({$requests.target_c_commu_id})" size="6">
<input type="submit" class="submit" value="��ǧ">
</p>
</form>

({if $c_commu})
<table>
<tr>
<th>���ߥ�˥ƥ�̾</th>
<td style="width:360px">({$c_commu.name})</td>
</tr>
<tr>
<th>����</th>
<td>({$c_commu.info|t_truncate:200})</td>
</tr>
<tr>
<th>URL</th>
<td><a href="page.php?p=c_home&amp;target_c_commu_id=({$c_commu.c_commu_id})" target="_blank">URL</a></td>
</tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<tr>
<th><input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_kakikomi_c_commu','do')})">
<input type="hidden" name="target_c_commu_id" value="({$c_commu.c_commu_id})">
&nbsp;</th>
<td><input type="submit" class="submit" value="�������"></td>
</tr>
</form>
</table>
({/if})

<hr>

({* ���ߥ�˥ƥ��ȥԥå� *})
<h3>���ߥ�˥ƥ��ȥԥå������٥��</h3>
<div class="caution">
URL�㡧(�أأؤ�ID)<br>
({$smarty.const.ABSOLUTE_PATH})page.php?p=c_topic_detail&amp;target_c_commu_topic_id=�أأ�<br>
({$smarty.const.ABSOLUTE_PATH})page.php?p=c_event_detail&amp;target_c_commu_topic_id=�أأ�
</div>
<form action="module_page.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<p>
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="p" value="({$hash_tbl->hash('delete_kakikomi')})">
ID��<input type="text" name="target_c_commu_topic_id" value="({$requests.target_c_commu_topic_id})" size="6">
<input type="submit" class="submit" value="��ǧ">
</p>
</form>

({if $c_commu_topic})
<table>
<tr>
<th>�ȥԥå�(���٥��)̾</th>
<td style="width:360px">({$c_commu_topic.name})</td>
</tr>
<tr>
<th>URL</th>
<td><a href="page.php?p=c_topic_detail&amp;target_c_commu_topic_id=({$c_commu_topic.c_commu_topic_id})" target="_blank">URL</a></td>
</tr>
<form action="module_do.php" method="post">
<input type="hidden" name="dummy" value="���α��被���ܸ�ʸ��������Ƚ��ʸ����">
<tr>
<th><input type="hidden" name="sessid" value="({$PHPSESSID})">
<input type="hidden" name="m" value="({$module_name})">
<input type="hidden" name="cmd" value="({$hash_tbl->hash('delete_kakikomi_c_commu_topic','do')})">
<input type="hidden" name="target_c_commu_topic_id" value="({$c_commu_topic.c_commu_topic_id})">
&nbsp;</th>
<td><input type="submit" class="submit" value="�������"></td>
</tr>
</form>
</table>
({/if})

({$inc_footer|smarty:nodefaults})