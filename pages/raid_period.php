<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raidPeriod = RaidperiodQuery::create()->filterByIdRaidPeriod($id)->find()->getFirst();

$raidPeriodEditionAuthorisedHtml = (!loginOk())?'disabled="true"':'';

$players = array();
$raidDate = array();
$raids = $raidPeriod->getRaids();
foreach($raids as $raid){
	$raidByDate[$raid->getDate()] = $raid;
	$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
	foreach($inscriptions as $inscription){
		$players[$inscription->getPlayer()->getIdPlayer()][$raid->getDate()] = $inscription;
	}
}

function sortByPlayerName($pId1,$pId2){
	$player1 = PlayerQuery::create()->filterByIdPlayer($pId1)->findOne();
	$player2 = PlayerQuery::create()->filterByIdPlayer($pId2)->findOne();
	return strcmp($player1->getPlayerName(), $player2->getPlayerName());
} 

function sortByTokenCount($pId1,$pId2){
	$player1 = PlayerQuery::create()->filterByIdPlayer($pId1)->findOne();
	$player2 = PlayerQuery::create()->filterByIdPlayer($pId2)->findOne();
	if($player1->getTokenCount() > $player2->getTokenCount()) return -1;
	if($player1->getTokenCount() < $player2->getTokenCount()) return 1;
	return 0;
}

ksort($raidByDate);
//uksort($players,'sortByPlayerName');
uksort($players,'sortByTokenCount');
$currentUrl = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];


?><html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Raid period</title>
                <link type="text/css" href="../css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" />   
                <link type="text/css" href="../css/buttons.css" rel="stylesheet" />     
                <link type="text/css" href="../css/wrap.css" rel="stylesheet" />     
                <script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
                <script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
        </head>
        <body>
		<form method='POST' action='../actions/raid_period.php'>
		<h1>
			Raid period : <? echo date("d/m",$raidPeriod->startDate())." - ". date("d/m",$raidPeriod->endDate());?>
			<small>(<a href='raid_periods.php'>Other raids</a>)</small>
		</h1>
		<fieldset>
		<legend>Info</legend>
		<select name='raidPeriodStatus' <? echo $raidPeriodEditionAuthorisedHtml ?> >
		<?php
		foreach($raidPeriod->allStatus() as $existingStatus){
			$value = $existingStatus;
			$text = lang($value);
			$checkedtext = ($value==$raidPeriod->getStatus())?"selected='true'":"";
			echo "<option value='$value' $checkedtext>$text</option>";
		} 
		?>

		<input type='submit' name='Save' value='Save'<? echo $raidPeriodEditionAuthorisedHtml?> /></h1>
		<input type='hidden' name='raidPeriodId' value='<?php echo $id?>'/>
		<input type='hidden' name='returnUrl' value='<?php echo $currentUrl;?>'/>
		</fieldset>
		<table class='raidPeriod'>
			<tr>
				<th>Player</th>
				<th><img src='../images/token.png' width='20px'/></th>
				<?php
				foreach($raidByDate as $rd=>$raid) {
					echo "<td>";
					echo "<a href='raid.php?id=".$raid->getIdRaid()."'>".ucfirst(strftime("%a %d",$rd))."</a>";
					echo " <div><small>(".$raid->getStatus().")</small></div></td>";
				}
				?>
			</tr>
		<?php
		foreach($players as $playerId => $inscriptions){
			$player = PlayerQuery::create()->filterByIdPlayer($playerId)->findOne();
			echo "<tr>";
			echo "<td>".$player->getPlayerName()."</td>";
			echo "<td>".$player->getTokenCount()."</td>";
			foreach($raidByDate as $rd=>$raid){
				echo "<td>";
				if(isset($inscriptions[$rd])){
					$inscription = $inscriptions[$rd];
					$alt = (($inscription->getInscription())?'Inscription in time':'Inscription not in time');
					$intimeImg = (($inscription->getInscription())?'intime.png':'notintime.png');
					echo "<img title='".$inscription->getStatus()."' alt='".$inscription->getStatus()."' class='periodStatus' src='../images/status/".$inscription->getStatus().".png'/>";
					if($inscription->hasPlayingStatus()) echo "<img title='$alt' alt='$alt' class='inscriptionInTime' src='../images/inscription/$intimeImg'/>";

				}else{
					echo "<img title='NoAnswer' alt='NoAnswer' class='periodStatus' src='../images/status/NoAnswer.png'/>";
				}
				echo "</td>";
			}
			echo "</tr>";
			
		}
		?>
		</table>
		</form>
		<fieldset style='font-size:small;width:300px;;'>
			<legend>Impact if <? echo ($raidPeriod->getAnalysed()?'unsaved':'saved')?></legend>
			<? raidPeriodImpactHtml($raidPeriod,!$raidPeriod->getAnalysed());?>
		</fieldset>
	</body>
</html>
