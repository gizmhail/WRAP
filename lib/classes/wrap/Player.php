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
	function initTokens(){
		//TODO Use rules
		global $wrapRules;
		$this->setTokenCount($wrapRules['raidStartTokens']);
		$this->setGoldTokenCount($wrapRules['raidStartGoldTokens']);
	}

	function armoryUrl(){
		global $wowServer;
		return "http://eu.battle.net/wow/fr/character/".strtolower($wowServer)."/".rawurlencode($this->getPlayerName())."/advanced";
	}

} // Player
