<?php

$returnUrl = isset($_REQUEST['returnUrl'])?$_REQUEST['returnUrl']:$_SERVER['HTTP_REFERER'];
include "../header.inc.php";
if(!loginOK()){
        header("Location:login.php?returnUrl=".rawurlencode($returnUrl));
}

if(isset($_REQUEST['delete'])){
	$id = (isset($_REQUEST['id']))?$_REQUEST['id']:'';
	if(isset($_REQUEST['confirm'])){
		$loot = LootQuery::create()->filterByIdLoot($id)->findOne();
		$loot->delete();
	}else{
		echo "<a href='?delete=true&confirm=true&id=$id&returnUrl=".rawurlencode($returnUrl)."'>Confirm loot deletion ?</a>";
		exit;
	}
}else{
	$id = (isset($_REQUEST['id']))?$_REQUEST['id']:'';
	$raidId = (isset($_REQUEST['raidId']))?$_REQUEST['raidId']:'';
	$playerId = (isset($_REQUEST['playerId']))?$_REQUEST['playerId']:'';
	$name = (isset($_REQUEST['name']))?$_REQUEST['name']:'';
	$description = (isset($_REQUEST['description']))?$_REQUEST['description']:'';
	if($id == ''){
		$loot = new Loot();
	}else{
		$loot = LootQuery::create()->filterByIdLoot($id)->findOne();
	}
	$loot->setRaidIdRaid($raidId);
	$loot->setPlayerIdPlayer($playerId);
	$loot->setLootName($name);
	$loot->setComment($description);
	$loot->save();
}


header('Location: '.$returnUrl);

