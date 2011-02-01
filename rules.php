<?
$wrapRules = array();
$wrapRules['raidDefaultDays'] = array('Wednesday + 20 hours + 30 minutes','Friday  + 20 hours + 30 minutes','Monday  + 20 hours + 30 minutes');
$wrapRules['raidStartTokens'] = 25;
$wrapRules['raidStartGoldTokens'] = 0;
$wrapRules['MinimulmDelayToAllowAutomaticInscriptionFromArmory'] = 40*3600;
$wrapRules['RaidSlotTokenPrice'] = 1;
$wrapRules['RaidPassedTokenGift'] = 1;
$wrapRules['InscriptionByWeekExpected'] = 2;
$wrapRules['TokenForExpectedInscriptions'] = 1+$wrapRules['InscriptionByWeekExpected']*$wrapRules['RaidSlotTokenPrice']; 
$wrapRules["prioritysortOrder"] = array(
	"PRIORITY_TAKEN",
	"PRIORITY_CONFIRMED",
	"PRIORITY_ISPLAYING",
	"PRIORITY_PASSED",//For not playing sort
	"PRIORITY_UNCERTAIN",//For not playing sort
	"PRIORITY_INSCRIPTIONINTIME",
	"PRORITY_WEEK_PLAYEDENOUGH",
	"PRIORITY_TOKEN",
	"PRIORITY_LESSUNNOTICEDANSENCE",
	"PRORITY_WEEK_PASSED",
	"PRORITY_WEEK_MINIMUMNUMBEROFINSCRIPTION",
);
