<?php
function normalAction_sns_kiyaku($smarty,$requests)
{
	$smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('sns_kiyaku'));

	$smarty->ext_display("sns_kiyaku.tpl");
}

