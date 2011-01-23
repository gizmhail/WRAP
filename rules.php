<?
$wrapRules = array();
$wrapRules['raidDefaultDays'] = array('Wednesday + 20 hours + 30 minutes','Friday  + 20 hours + 30 minutes','Monday  + 20 hours + 30 minutes');
$wrapRules['raidStartTokens'] = 25;
$wrapRules['raidStartGoldTokens'] = 0;
$wrapRules['MinimulmDelayToAllowAutomaticInscriptionFromArmory'] = 40*3600;
$wrapRules['ConfirmedAreTakenFirst'] = true;
$wrapRules['RaidSlotTokenPrice'] = 1;
$wrapRules['InscriptionByWeekExpected'] = 2;
$wrapRules['TokenForExpectedInscriptions'] = 1+$wrapRules['InscriptionByWeekExpected']*$wrapRules['RaidSlotTokenPrice']; 
