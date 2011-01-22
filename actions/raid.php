<?php

include "../header.inc.php";
$id = isset($_REQUEST['raidId'])?$_REQUEST['raidId']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
if(!$raid->editionAllowed()){
	echo 'Edition not allowed : remove analyse on raid and/or period first';
	exit;
}
$inscriptionCount = isset($_REQUEST['inscriptionCount'])?$_REQUEST['inscriptionCount']:0;

$index = 0;
while($index < $inscriptionCount){
	$playerId = $_REQUEST["playerId_".$index];
	$player = PlayerQuery::create()->filterByIdPlayer($playerId)->findOne();
	if(!$player) throw new Exception('Unknown player '.$playerId);
	$inscriptionIntime = isset($_REQUEST["inscription_".$index])?1:0;
	$status = $_REQUEST["status_".$index];
	$inscription = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->filterByPlayerIdPlayer($playerId)->findOne();
	if(!$inscription){
		$inscription = new RaidHasPlayer();
		$inscription->setPlayer($player);
		$inscription->setRaid($raid);
	}
	$inscription->setStatus($status);
	$inscription->setInscription($inscriptionIntime);
	$inscription->save();
	$index++;
}

header('Location: '.$_REQUEST['returnUrl']);
