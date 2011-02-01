<?php



/**
 * Skeleton subclass for representing a row from the 'Raid_has_Player' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.wrap
 */
class RaidHasPlayer extends BaseRaidHasPlayer {

	function setStatus($status){
		if($status != $this->getStatus()){
			$history = $this->parsedHistory();
			$history[microtime(true)] = $status;
			$this->setHistory(serialize($history));
		}
		return parent::setStatus($status);
	}

	function preSave(){
		if($this->isModified()){
			$text = 'RHP:'.microtime(true).';'.$this->getRaid()->getIdRaid().';'.$this->getPlayer()->getPlayerName().';'.$this->getStatus().';'.$this->getInscription();
			logChange($text);	
		}	
		return parent::preSave();
	}

	function checkInscription($ignoreMinimumDelay = false){
		global $wrapRules; 
		switch($this->getStatus()){
			case INSCRIPTION_STATUS_ACCEPTED:
			case INSCRIPTION_STATUS_CONFIRMED:
				if($ignoreMinimumDelay || (($this->getRaid()->getDate() - time())>$wrapRules['MinimulmDelayToAllowAutomaticInscriptionFromArmory'])){
					$this->setInscription(1);
				}
				break;
			default:
				$this->setInscription(0);
		}
	}

	function impact(){
		global $wrapRules; 
		$impact = 0;
		if($this->getStatus() == INSCRIPTION_STATUS_TAKEN){
			$impact = -$wrapRules['RaidSlotTokenPrice'];
		}
		if($this->getStatus() == INSCRIPTION_STATUS_MISING){
			$impact = -$wrapRules['RaidSlotTokenPrice'];
		}
		if($this->getStatus() == INSCRIPTION_STATUS_PASSED){
			$impact = $wrapRules['RaidPassedTokenGift'];
		}
		return $impact;
	}

	static function sortByPriority($i1,$i2){
		//Week period analisys
		$playerInscriptions1 = $i1->getPlayer()->inscriptionForRaidPeriod($i1->getRaid()->getRaidPeriod());
		$playerInscriptions2 = $i2->getPlayer()->inscriptionForRaidPeriod($i2->getRaid()->getRaidPeriod());
		$passCount1 = 0;
		$playedCount1 = 0;
		$inscriptionInTimeCount1 = 0;
		foreach($playerInscriptions1 as $pi){
			if($pi->getInscription())$inscriptionInTimeCount1++;
			if($pi->getStatus() == INSCRIPTION_STATUS_PASSED)$passCount1++;
			if($pi->getStatus() == INSCRIPTION_STATUS_TAKEN)$playedCount1++;
		}
		$passCount2 = 0;
		$inscriptionInTimeCount2 = 0;
		$playedCount2 = 0;
		foreach($playerInscriptions2 as $pi){
			if($pi->getInscription())$inscriptionInTimeCount2++;
			if($pi->getStatus() == INSCRIPTION_STATUS_PASSED)$passCount2++;
			if($pi->getStatus() == INSCRIPTION_STATUS_TAKEN)$playedCount2++;
		}
		$inscriptionInTimeCount1 = min($inscriptionInTimeCount1,$wrapRules['InscriptionByWeekExpected']);
		$inscriptionInTimeCount2 = min($inscriptionInTimeCount2,$wrapRules['InscriptionByWeekExpected']);	global $wrapRules;

		foreach($wrapRules["prioritysortOrder"] as $prioritysortOrder){
			//echo $i1->getPlayer()->getPlayerName()."/".$i2->getPlayer()->getPlayerName().$prioritysortOrder."<br/>";
			switch($prioritysortOrder){
			case "PRIORITY_TAKEN":	
				//For presentation purposes: Taken is displayed first
				if($i1->getStatus() == INSCRIPTION_STATUS_TAKEN && $i2->getStatus != INSCRIPTION_STATUS_TAKEN) return -1;
				if($i2->getStatus() == INSCRIPTION_STATUS_TAKEN && $i1->getStatus != INSCRIPTION_STATUS_TAKEN) return 1;
				break;
			case "PRIORITY_CONFIRMED":
				if($i1->getStatus() == INSCRIPTION_STATUS_CONFIRMED && $i2->getStatus != INSCRIPTION_STATUS_CONFIRMED) return -1;
				if($i2->getStatus() == INSCRIPTION_STATUS_CONFIRMED && $i1->getStatus != INSCRIPTION_STATUS_CONFIRMED) return 1;
				break;
			case "PRIORITY_UNCERTAIN":
				if($i1->getStatus() == INSCRIPTION_STATUS_UNCERTAIN && $i2->getStatus != INSCRIPTION_STATUS_UNCERTAIN) return -1;
				if($i2->getStatus() == INSCRIPTION_STATUS_UNCERTAIN && $i1->getStatus != INSCRIPTION_STATUS_UNCERTAIN) return 1;
				break;
			case "PRIORITY_PASSED":
				if($i1->getStatus() == INSCRIPTION_STATUS_PASSED && $i2->getStatus != INSCRIPTION_STATUS_PASSED) return -1;
				if($i2->getStatus() == INSCRIPTION_STATUS_PASSED && $i1->getStatus != INSCRIPTION_STATUS_PASSED) return 1;
				break;

			case "PRIORITY_ISPLAYING":
				//Is playing ?
				if($i1->hasPlayingStatus() && ! $i2->hasPlayingStatus()) return -1;
				if($i2->hasPlayingStatus() && ! $i1->hasPlayingStatus()) return 1;
				break;
				//Token priority
				$playerPriority = Player::sortByPriority($i1->getPlayer(),$i2->getPlayer());
				if($playerPriority!=0) return $playerPriority;
				break;
			case "PRIORITY_INSCRIPTIONINTIME":
				//Inscription in time
				if($i1->getInscription() && ! $i2->getInscription()) return -1;
				if($i2->getInscription() && ! $i1->getInscription()) return 1;
				break;
			case "PRIORITY_TOKEN":
				//Token priority
				$playerPriority = Player::sortByPriority($i1->getPlayer(),$i2->getPlayer());
				if($playerPriority!=0) return $playerPriority;
				break;
			case "PRIORITY_LESSUNNOTICEDANSENCE":
				//TODO Add depriorisation due to unnoticed absence here
				break;

			case "PRORITY_WEEK_PLAYEDENOUGH":
				//One has played enough
				if(($playedCount1 < $wrapRules['InscriptionByWeekExpected']) && ($playedCount2 >= $wrapRules['InscriptionByWeekExpected'])) return -1; 
				if(($playedCount2 < $wrapRules['InscriptionByWeekExpected']) && ($playedCount1 >= $wrapRules['InscriptionByWeekExpected'])) return 1; 
				break;
			case "PRORITY_WEEK_PASSED":
				//Has passed previously during the week
				if($passCount1 > $passCount2) return -1;
				if($passCount2 > $passCount1) return 1;
				break;
			case "PRORITY_WEEK_MINIMUMNUMBEROFINSCRIPTION":
				//Has minimum number of inscription for raid period?
				if($inscriptionInTimeCount1 > $inscriptionInTimeCount2) return -1;
				if($inscriptionInTimeCount2 > $inscriptionInTimeCount1) return 1;
				break;
			}
		}
		return 0;
	}

	function hasPlayingStatus(){
		$playing = false;
		switch($this->getStatus()){
			case INSCRIPTION_STATUS_ACCEPTED:
			case INSCRIPTION_STATUS_CONFIRMED:
			case INSCRIPTION_STATUS_TAKEN:
				$playing = true;
				break;
		}
		return $playing;
	}

	function parsedHistory(){
		$history = unserialize($this->getHistory());
		if($history == false){
			$history = array();
			//Temporary fix for legacy formats
			$h = explode(" > ",$this->getHistory());
			foreach($h as $hEntry){
				list($historyTime,$historyStatus) = explode (":",$hEntry);
				$history[$historyTime] = $historyStatus;
			}
		}
		ksort($history);
		return $history;
	}

	static function allStatus(){
		return array(
			INSCRIPTION_STATUS_ACCEPTED,
			INSCRIPTION_STATUS_PASSED,
			INSCRIPTION_STATUS_TAKEN,
			INSCRIPTION_STATUS_CONFIRMED,
			INSCRIPTION_STATUS_REFUSED,
			INSCRIPTION_STATUS_UNCERTAIN,
			INSCRIPTION_STATUS_NOANSWER,
			INSCRIPTION_STATUS_MISING,
			INSCRIPTION_STATUS_EXCUSED,
		);
	}
} // RaidHasPlayer
