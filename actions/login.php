<?php

include "../header.inc.php";
//TODO Temporary solution, fix it

$authOk = loginOk();
$expectedHash = expectedHash();

if(!$authOk&&isset($_REQUEST['login'])&&isset($_REQUEST['password'])){
	$clientHash = md5($_REQUEST['login'].":".$_REQUEST['password']);
	if($clientHash == $expectedHash){
                $authOk = true;
        }
}

if(isset($_REQUEST['logout'])){
	setcookie('authhash','',0,'/');
}else if($authOk){
	$ok = setcookie('authhash',$expectedHash,time()+3600*24*365,'/');
}else{
?>
<form method='post'>
	<input name='returnUrl' type='hidden' value='<? echo isset($_REQUEST['returnUrl'])?$_REQUEST['returnUrl']:''?>'/>
	<input name='login'/>
	<br/>
	<input name='password' type='password'/>
	<br/>
	<input value='login' type='submit'/>
</form>
<?php
}

if($authOk){
	if(isset($_REQUEST['returnUrl'])){
		header('Location: '.$_REQUEST['returnUrl']);
	}else{
		?>
		<a href='?logout=1'>Logout</a>
		<?
	}
}
