<?php

include "../header.inc.php";
if(!loginOK()){
	header("Location:login.php?returnUrl=".rawurlencode($_REQUEST['returnUrl']));
}


$id = isset($_REQUEST['raidId'])?$_REQUEST['raidId']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
if($raid->editionAllowed()){
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
}

//Raid status and token impact
if(isset($_REQUEST['raidStatus'])){
	$raidStatus = $_REQUEST['raidStatus'];
	$confirmed = isset($_REQUEST['confirmed']);
	if($raidStatus != $raid->getStatus()){
		if($raid->getStatus() != RAID_STATUS_DONE&&$raidStatus != RAID_STATUS_DONE){
			//No token impact
			$raid->setStatus($raidStatus);
                        $raid->save();
		}else{
			if(!$confirmed){
				header('Content-Type: text/html; charset=utf-8'); 
				?>
				<h1>
					Switch raid <? echo date("d/m",$raid->getDate())?> 
					from <? echo lang($raid->getStatus());?> to status <?echo lang($raidStatus);?>
				</h1>
				<h2>Impact</h2>
				<? raidImpactHtml($raid,$raidStatus == RAID_STATUS_DONE)?>
				<a href='?confirmed=true&<? echo "raidStatus=$raidStatus&raidId=$id&returnUrl=".rawurlencode($_REQUEST['returnUrl']);?>'>Confirm ?</a>
				<?php
				unset($_REQUEST['returnUrl']);
			}else{	

				if($raid->getStatus() == RAID_STATUS_DONE){
					//Cancelation of analysis
					$raid->doCancelAnalysis($raidStatus);
				}else if($raidStatus == RAID_STATUS_DONE){
					//Analysis
					$raid->doAnalysis($raidStatus);
				}
			}
		}
	}
}

if(isset($_REQUEST['returnUrl'])){
	header('Location: '.$_REQUEST['returnUrl']);
}
