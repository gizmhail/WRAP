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
	function checkInscription(){
		global $wrapRules; 
		switch($this->getStatus()){
			case INSCRIPTION_STATUS_ACCEPTED:
			case INSCRIPTION_STATUS_CONFIRMED:
				if((time()-$this->getRaid()->getDate())>$wrapRules['MinimulmDelayToAllowAutomaticInscriptionFromArmory']){
					$this->setInscription(1);
				}
				break;
			default:
				$this->setInscription(0);
		}
	}

} // RaidHasPlayer
