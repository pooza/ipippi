<?php
function normalAction_sns_privacy($smarty,$requests)
{
	$smarty->assign('c_siteadmin', p_common_c_siteadmin4target_pagename('sns_privacy'));
	
	$smarty->ext_display("sns_privacy.tpl");
}

