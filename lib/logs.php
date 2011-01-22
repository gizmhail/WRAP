<?php

function logChange($text){
	global $wrapUpdateLog;
	file_put_contents($wrapUpdateLog,"$text\n",FILE_APPEND);
}
