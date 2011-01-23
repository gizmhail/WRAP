<?php



/**
 * Skeleton subclass for representing a row from the 'Player' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.wrap
 */
class Player extends BasePlayer {
	//var $inscriptionByRaidPeriodCache = array();
	function initTokens(){
		//TODO Use rules
		global $wrapRules;
		$this->setTokenCount($wrapRules['raidStartTokens']);
		$this->setGoldTokenCount($wrapRules['raidStartGoldTokens']);
	}

	function preSave(){
                if($this->isModified()){
                        $text = 'P:'.microtime(true).';'.$this->getPlayerName().';'.$this->getTokenCount().':'.$this->getGoldTokenCount();
                        logChange($text);       
                }       
                return parent::preSave();
        }

	function armoryUrl(){
		global $wowServer;
		return "http://eu.battle.net/wow/fr/character/".strtolower($wowServer)."/".rawurlencode($this->getPlayerName())."/advanced";
	}

	/*
	 * Find all inscription of a plyer during a raid period
	 * Create inscriptions if missing for a given raid (with no answer status)
	 */
	function inscriptionForRaidPeriod($raidPeriod){
		//if(isset($this->inscriptionByRaidPeriodCache[$raidPeriod->getIdRaidPeriod()]))return $this->inscriptionByRaidPeriodCache[$raidPeriod->getIdRaidPeriod()];
		$inscriptions = array();
		foreach($raidPeriod->getRaids() as $raid){
			$inscription = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->filterByPlayerIdPlayer($this->getIdPlayer())->findOne();
			if(!$inscription){
				$inscription = new RaidHasPlayer();
				$inscription->setStatus(INSCRIPTION_STATUS_NOANSWER);
				$inscription->setInscription(0);
				$inscription->setPlayer($this);
				$inscription->setRaid($raid);
				$inscription->save();
			}
			$inscriptions[$raid->getIdRaid()]  =$inscription;
		}
		//$this->inscriptionByRaidPeriodCache[$raidPeriod->getIdRaidPeriod()] = $inscriptions;
		return $inscriptions;
	}
	
	static function sortByPriority($p1,$p2){
		//Gold token available ?
		if($p1->getGoldTokenCount() > 0 && $p2->getGoldTokenCount() == 0) return -1;
		if($p2->getGoldTokenCount() > 0 && $p1->getGoldTokenCount() == 0) return 1;
		//Token count
		if($p1->getTokenCount() > $p2->getTokenCount()) return -1;
		if($p2->getTokenCount() > $p1->getTokenCount()) return 1;
		return 0;
	}

} // Player
