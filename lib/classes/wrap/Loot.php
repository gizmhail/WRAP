<?php



/**
 * Skeleton subclass for representing a row from the 'Loot' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.wrap
 */
class Loot extends BaseLoot {
	function wowheadUrl(){
		//TODO use description
		$url = "http://fr.wowhead.com/search?q=".rawurlencode($this->getLootname());
		if(preg_match("|(http://[a-z.]*wowhead.com/item=[^\s]*)|",$this->getComment(),$matches)){
			$url = $matches[1];
		}
		return $url;
	}
} // Loot
