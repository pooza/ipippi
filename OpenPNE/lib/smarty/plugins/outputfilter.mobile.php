<?php
function smarty_outputfilter_mobile ($source, &$smarty) {
	$source = mb_convert_kana($source, 'kas');
	$source = mb_convert_encoding($source, 'sjis');
	return $source;
}
?>
