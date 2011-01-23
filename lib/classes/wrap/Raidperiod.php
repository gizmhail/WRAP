<?php



/**
 * Skeleton subclass for representing a row from the 'RaidPeriod' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.wrap
 */
class Raidperiod extends BaseRaidperiod {
	function analyseAvailable(){
		//TODO return true if il raid are in closed status (finished, cancelled)
		return true;
	}

	/*
	 * Return true if edition is currently possible
	 * (ie, if token impact has yet be analysed : to edit, analyse cancel is needed first)
	 */
	function editionAllowed(){
		return loginOk()&&!$this->getAnalysed();
	}

	function impact($impactIfActivated=true){
		global $wrapRules;
		$impacts = array();
		$raids = $this->getRaids();
		$playerInscriptionCounts = array();
		foreach($raids as $raid){
			$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
			foreach($inscriptions as $inscription){
				if($inscription->getInscription()){
					$playerInscriptionCounts[$inscription->getPlayer()->getIdPlayer()] += 1; 
				}
				$trackRaid = ($impactIfActivated)?!$raid->getAnalysed():$raid->getAnalysed();
				if($trackRaid){
					$impact = $inscription->impact();
					if($impact!=0) {
						$impacts[$inscription->getPlayer()->getIdPlayer()]['raidsNotAnalysed'][$raid->getIdRaid()] = $impact;
					}
				}
			}
		}
		foreach($playerInscriptionCounts as $playerId => $inscriptionCount){
			if($inscriptionCount >= $wrapRules['InscriptionByWeekExpected']){
				$impacts[$playerId]['inscriptionsInTime'] = $wrapRules['TokenForExpectedInscriptions']; 
			}
		}
		foreach($impacts as $playerId => $impactInfo){
			$total = isset($impactInfo['inscriptionsInTime'])?$impactInfo['inscriptionsInTime']:0;
			if(isset($impactInfo['raidsNotAnalysed'])){
				foreach($impactInfo['raidsNotAnalysed'] as $raidImpact){
					$total += $raidImpact;
				}
			}
			$impacts[$playerId]['total'] = $total;
		}
		return $impacts;
	}

	function doAnalysis($raidPeriodStatus=RAIDPERIOD_STATUS_DONE){
		$impactsByPlayer = $this->impact();
		foreach($impactsByPlayer as $playerId => $impacts){
			if(isset($impacts['inscriptionsInTime'])){
				$player = PlayerQuery::create()->filterByIdPlayer($playerId)->findOne();
				$player->setTokenCount($player->getTokenCount()+$impacts['inscriptionsInTime']);
				$player->save();
			}
		}
		foreach($this->getRaids() as $raid){
			if(!$raid->getAnalysed()){
				$raid->doAnalysis(RAID_STATUS_DONE);
			}
		}
		$this->setStatus($raidPeriodStatus);
		$this->setAnalysed(true);
		$this->save();
	}

	function doCancelAnalysis($raidPeriodStatus=RAIDPERIOD_STATUS_PLANNED){
		$impactsByPlayer = $this->impact();
		foreach($impactsByPlayer as $playerId => $impacts){
			if(isset($impacts['inscriptionsInTime'])){
				$player = PlayerQuery::create()->filterByIdPlayer($playerId)->findOne();
				$player->setTokenCount($player->getTokenCount()-$impacts['inscriptionsInTime']);
				$player->save();
			}
		}
		foreach($this->getRaids() as $raid){
			if($raid->getAnalysed()){
				$raid->doCancelAnalysis(RAID_STATUS_PLANNED);
			}
		}
		$this->setStatus($raidPeriodStatus);
		$this->setAnalysed(false);
		$this->save();
	}


	function allStatus(){
		return array(
			RAIDPERIOD_STATUS_DONE,
			RAIDPERIOD_STATUS_PLANNED
		);
	}

	function createRaids(){
		global $wrapRules;
		//1-  check that raids are not already created
		//TODO
		//2- find latest raid
		$latestRaid = RaidQuery::create()->orderByDate()->find()->getLast();
		if(is_null($latestRaid)){
			$latestRaid = time();
			if(count($wrapRules['raidDefaultDays']) > 0){
				$latestRaid = strtotime('last '.$wrapRules['raidDefaultDays'][0]);
			}
		}else{
			$latestRaid = $latestRaid->getDate();
		}
		//3- find raids date and create them
		$raidDates = array();
		foreach($wrapRules['raidDefaultDays'] as $raidDefaultDay){
			$latestRaid = strtotime('next '.$raidDefaultDay,$latestRaid);
			$raidDates[] = $latestRaid;
			$raid = new Raid();
			$raid->setDate($latestRaid);
			$raid->setStatus(RAID_STATUS_POSSIBLE);
			$raid->setAnalysed(false);
			$this->addRaid($raid);
		}

	}

	function startDate(){
		$raid = RaidQuery::create()->orderByDate()->findByRaidperiod($this)->getFirst();
		return $raid->getDate();
	}

	function endDate(){
		$raid = RaidQuery::create()->orderByDate()->findByRaidperiod($this)->getLast();
		return $raid->getDate();
	}

} // Raidperiod
