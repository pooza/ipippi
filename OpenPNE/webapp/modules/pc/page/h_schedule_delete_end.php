<?php

//---------------------------------------------------------------------------
	//	File:h_schedule_delete_end.tpl
//---------------------------------------------------------------------------
function pageAction_h_schedule_delete_end($smarty,$requests) {
	$u = $GLOBALS['AUTH']->uid();

	$smarty->ext_display("h_schedule_delete_end.tpl");
}

