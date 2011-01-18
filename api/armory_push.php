<?php
include "../header.inc.php";
header("Access-Control-Allow-Origin: *");
$dateTimeAnalisys = false;
if(isset($_GET['dateTime'])){
	if(preg_match("|^.*\((..)/(..)\) (..):(..)|",$_GET['dateTime'],$matches)){
		$_GET["dateTimeMatch"] = $matches;
		$hour = $matches[3];	
		$min = $matches[4];	
		$mon = $matches[1];	
		$day = $matches[2];	
		$dateTimeAnalisys = strtotime("$mon/$day $hour:$min");
	}
}


$planningPushes = array();
if(is_file($planningCacheFile)){
	$planningPushes = unserialize(file_get_contents($planningCacheFile));
}

if(isset($_GET['data'])){
	$push = array(
		"receiveTime" => time(),
		"dateTime" => $_GET['dateTime'],
		"raidId" => $_GET['raidId'],
		"data" => $_GET['data'],
	);
	if($dateTimeAnalisys !== false) $push['dateTimeAnalisys'] = $dateTimeAnalisys;
	$planningPushes[] = $push;
	file_put_contents($planningCacheFile,serialize($planningPushes));
}else{
	echo "<pre>";
	print_r($planningPushes);
	echo "</pre>";
}

