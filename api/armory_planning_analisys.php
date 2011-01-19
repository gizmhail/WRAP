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
				if($r->getStatus()== RAID_STATUS_POSSIBLE){
					$r->setStatus(RAID_STATUS_PLANNED);
				}
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
		$i = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->filterByPlayerIdPlayer($p->getIdPlayer())->find()->getFirst();	
		if(!$i){
			$newStatus = translateInscriptionStatus($status);
			$i = new RaidhasPlayer();
			$i->setPlayerIdPlayer($p->getIdPlayer());
			$i->setRaidIdRaid($raid->getIdRaid());
			$i->setHistory(time().':'.$newStatus);//TODO
			$i->setStatus($newStatus);
			$i->checkInscription();
			$i->save();
		}else{
			//Update if not WRAP status (only armory status can be overriden by armory info)
			$newStatus = translateInscriptionStatus($status);
			switch($newStatus){
				case "INSCRIPTION_STATUS_REFUSED":
				case "INSCRIPTION_STATUS_CONFIRMED":
				case "INSCRIPTION_STATUS_ACCEPTED":
				case "INSCRIPTION_STATUS_UNCERTAIN":
					if($newStatus != $i->getStatus()){
						$i->setStatus(translateInscriptionStatus($status));
			                        $i->checkInscription();
						$i->setHistory($i->getHistory()." > ".time().":".$newStatus);//TODO
	        	                	$i->save();
					}
					break;
			}
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
header('Location:../pages/raid_periods.php');

