<?php

function lang($value){
	global $wrapLang;
	$text = (isset($wrapLang[$value]))?$wrapLang[$value]:$value;
	return $text;
}
