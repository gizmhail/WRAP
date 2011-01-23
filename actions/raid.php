<?php

include "../header.inc.php";
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
			//NO token impact
			//TODO
		}else{
			$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->find();
			$impacts = array();
			foreach($inscriptions as $inscription){
				$tokenImpact = $inscription->impact();
				if($tokenImpact != 0){
					$impacts[] = array(
						"player" => $inscription->getPlayer(),
						"impact" => $tokenImpact,
					);
				}
			}
			if(!$confirmed){
				header('Content-Type: text/html; charset=utf-8'); 
						?>
						<h1>
							Switch raid <? echo date("d/m",$raid->getDate())?> 
							from <? echo lang($raid->getStatus());?> to status <?echo lang($raidStatus);?>
						</h1>
						<h2>Impact</h2>
						<ul>
						<?
						foreach($impacts as $impact){
							if(($raidStatus == RAID_STATUS_DONE)){
								$tokenImpact = (($impact['impact']>0)?'+':'').$impact['impact'];
								
							}else{
								$tokenImpact = (($impact['impact']>0)?'':'+').(-1*$impact['impact']);
							}
							?>
							<li>
								<? echo $impact['player']->getPlayerName()?>:
								<b><? echo $tokenImpact?><img src='../images/token.png' width='20px'/></b>
							</li>
							<hr/>
							<?php					
						}
						?>
						</ul>
						<a href='?confirmed=true&<? echo "raidStatus=$raidStatus&raidId=$id&returnUrl=".rawurlencode($_REQUEST['returnUrl']);?>'>Confirm ?</a>
						<?php
						unset($_REQUEST['returnUrl']);
			}else{	

				if($raid->getStatus() == RAID_STATUS_DONE){
					//Cancelation of analysis
					foreach($impacts as $impact){
						$impact['player']->setTokenCount($impact['player']->getTokenCount()-$impact['impact']);
						$impact['player']->save();
					}
					$raid->setStatus($raidStatus);
					$raid->setAnalysed(false);
					$raid->save();
				}else if($raidStatus == RAID_STATUS_DONE){
					//Analysis
					foreach($impacts as $impact){
						$impact['player']->setTokenCount($impact['player']->getTokenCount()+$impact['impact']);
						$impact['player']->save();
					}
					$raid->setStatus($raidStatus);
					$raid->setAnalysed(true);
					$raid->save();
				}
			}
		}
	}
}

if(isset($_REQUEST['returnUrl'])){
	header('Location: '.$_REQUEST['returnUrl']);
}
