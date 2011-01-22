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

	static function sortByPriority($i1,$i2){
		global $wrapRules;
		//If confirmed, use rules to know if it is more important than tokens
		if($wrapRules['ConfirmedAreTakenFirst']){
			if($i1->getStatus() == INSCRIPTION_STATUS_CONFIRMED && $i2->getStatus != INSCRIPTION_STATUS_CONFIRMED) return -1;
			if($i2->getStatus() == INSCRIPTION_STATUS_CONFIRMED && $i1->getStatus != INSCRIPTION_STATUS_CONFIRMED) return 1;
		}
		//Is playing ?
		if($i1->hasPlayingStatus() && ! $i2->hasPlayingStatus()) return -1;
		if($i2->hasPlayingStatus() && ! $i1->hasPlayingStatus()) return 1;
		//Token priority
		$playerPriority = Player::sortByPriority($i1->getPlayer(),$i2->getPlayer());
		if($playerPriority!=0) return $playerPriority;
		//INscription in tme
		if($i1->getInscription() && ! $i2->getInscription()) return -1;
		if($i2->getInscription() && ! $i1->getInscription()) return 1;
		//Week period analisys
		$playerInscriptions1 = $i1->getPlayer()->inscriptionForRaidPeriod($i1->getRaid()->getRaidPeriod());
		$playerInscriptions2 = $i2->getPlayer()->inscriptionForRaidPeriod($i2->getRaid()->getRaidPeriod());
		//TODO Add depriorisation due to unnoticed absence here
		$passCount1 = 0;
		$inscriptionInTimeCount1 = 0;
		$passCount2 = 0;
		foreach($playerInscriptions1 as $pi){
			if($pi->getInscription())$inscriptionInTimeCount1++;
			if($pi->getStatus() == INSCRIPTION_STATUS_PASSED)$passCount1++;
		}
		$passCount2 = 0;
		$inscriptionInTimeCount2 = 0;
		foreach($playerInscriptions2 as $pi){
			if($pi->getInscription())$inscriptionInTimeCount2++;
			if($pi->getStatus() == INSCRIPTION_STATUS_PASSED)$passCount2++;
		}
		//Had due passed previously during the week
//echo "$passCount1 $passCount2 $inscriptionInTimeCount1 $inscriptionInTimeCount2<br/>";
		if($passCount1 > $passCount2) return -1;
		if($passCount2 > $passCount1) return 1;
		//Has minimum number of inscription for raid period?
		if($inscriptionInTimeCount1 > $inscriptionInTimeCount2) return -1;
		if($inscriptionInTimeCount2 > $inscriptionInTimeCount1) return 1;
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
