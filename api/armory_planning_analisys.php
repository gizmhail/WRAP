<?php

include "../header.inc.php";

$planningPushes = array();
if(is_file($planningCacheFile)){
        $planningPushes = unserialize(file_get_contents($planningCacheFile));
}

$players = array();
foreach($planningPushes as $planningPush){
	$raid = RaidQuery::create()->findByArmoryid($planningPush['raidId'])->getFirst();
	if(!$raid){
		$allRaids = RaidQuery::create()->find();
		foreach($allRaids as $r){
			$timeDiff = abs($r->getDate()-$planningPush['dateTimeAnalisys']);
			if($timeDiff < 3600*2){
				//Same raid
				$r->setArmoryid($planningPush['raidId']);
				$r->save();
				$raid = $r;
			}
		}
	}
	$inscriptions = explode(";",$planningPush['data']);
	$raidStatus = array();
	foreach($inscriptions as $inscription){
		list($player,$status) = explode(":",$inscription);
		if(trim($player)=='')continue;
		$raidStatus[$player] = $status;
		$p = PlayerQuery::create()->findByPlayerName($player)->getFirst();
		if(!$p){
			$p = new Player();
			$p->setPlayerName($player);
			$p->initTokens();
			$p->setLastScan(0);
			$p->setStatus(PLAYER_STATUS_ACTIVE);
			$p->save();
		}
		$i = RaidHasPlayerQuery::create()->filterByRaidIdRaid($planningPush['raidId'])->filterByPlayerIdPlayer($p->getIdPlayer())->find()->getFirst();	
		if(!$i){
			$i = new RaidhasPlayer();
			$i->setPlayerIdPlayer($p->getIdPlayer());
			$i->setRaidIdRaid($planningPush['raidId']);
			$i->setHistory('');//TODO
			$i->setStatus(translateInscriptionStatus($status));
			$i->checkInscription();
			$i->save();
		}
	}
}

//Reset file
file_put_contents($planningCacheFile,serialize(array()));

function translateInscriptionStatus($status){
	$s = INSCRIPTION_STATUS_REFUSED;
	switch($status){
		case "confirmé":
			$s = INSCRIPTION_STATUS_CONFIRMED;
			break;
		case "accepté":	
		case "inscrit":
			$s = INSCRIPTION_STATUS_ACCEPTED;
			break;
		case "tentative":
			$s = INSCRIPTION_STATUS_UNCERTAIN;
			break;
		case "refusé":
			$s = INSCRIPTION_STATUS_REFUSED;
			break;
	}
	return $s;
}
header('Content-type: text/plain; charset=UTF-8');
echo "Done.";

