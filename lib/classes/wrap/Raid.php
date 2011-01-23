<?php



/**
 * Skeleton subclass for representing a row from the 'Raid' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.wrap
 */
class Raid extends BaseRaid {
	/*
	 * Return true if edition is currently possible
	 * (ie, if token impact has yet be analysed : to edit, analyse cancel is needed first)
	 */
	function editionAllowed(){
		return loginOk()&&!$this->getRaidperiod()->getAnalysed()&&!$this->getAnalysed();
	}

	function preSave(){
                if($this->isModified()){
                        $text = 'R:'.microtime(true).';'.$this->getDate().';'.$this->getStatus().';'.$this->getAnalysed();
                        logChange($text);       
                }       
                return parent::preSave();
        }
	function allStatus(){
		return array(
			RAID_STATUS_DONE,
			RAID_STATUS_POSSIBLE,
			RAID_STATUS_PLANNED,
			RAID_STATUS_CANCELED
		);
	}

} // Raid
