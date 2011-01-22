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
