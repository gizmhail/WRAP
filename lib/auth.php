<?php

//TODO Temporary solution, fix it
function expectedHash(){
	global $wrapMainLogin,$wrapMainPassword;
	return md5("$wrapMainLogin:$wrapMainPassword");
}

function loginOk(){
	$expectedHash = expectedHash();
	$authOk = false;
	if(isset($_COOKIE['authhash'])){
		if($_COOKIE['authhash'] == $expectedHash){
			$authOk = true;
		}
	}
	return $authOk;
}

