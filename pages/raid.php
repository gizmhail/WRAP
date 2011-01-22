<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();

$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
usort($inscriptions,array('RaidHasPlayer','sortByPriority'));
$raidPeriod = $raid->getRaidPeriod();
$raids = $raidPeriod->getRaids();

$currentUrl = "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$wrapBaseUrl = dirname(dirname($currentUrl));

$inRaid = 0;
foreach($inscriptions as $i) {
	if($i->getStatus()==INSCRIPTION_STATUS_TAKEN){
		$inRaid++;
	}
}
?>
<html>
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
		<form method='POST' action='../actions/raid.php'>
		<h1><?echo date("d/m",$raid->getDate());?> - <? echo lang($raid->getStatus())?><input type='submit' name='Save' value='Save'/></h1>
		<input type='hidden' name='raidId' value='<?php echo $id?>'/>
		<input type='hidden' name='returnUrl' value='<?php echo $currentUrl;?>'/>
		<div class='raidContent'>
			Player in raid : <? echo $inRaid;?>
		</div>
		<table class='raid'>
			<tr>
				<th>Player</th>
				<th><img src='../images/inscription/intime.png'/></th>
				<th>Status</th>
				<th>Presence</th>
			</tr>
		<input type='hidden' name='inscriptionCount' value='<?php echo count($inscriptions);?>'/>
		<?php
		foreach($inscriptions as $inscriptionIndex => $inscription){
			echo "<tr>";
			echo "<input type='hidden' name='playerId_$inscriptionIndex' value='".$inscription->getPlayer()->getIdPlayer()."'/>";
			echo "<td><a href='".$inscription->getPlayer()->armoryUrl()."'>".$inscription->getPlayer()->getPlayerName()."</a></td>";
			echo "<td><input type='checkbox' name='inscription_$inscriptionIndex' ".($inscription->getInscription()?"checked='true'":"")."/></td>";
			//Status
			echo "<td>";
			echo "<img title='".$inscription->getStatus()."' alt='".$inscription->getStatus()."' class='status' src='../images/status/".$inscription->getStatus().".png'/>";
			echo "<select name='status_$inscriptionIndex'>";
			foreach(RaidHasPlayer::allStatus() as $existingStatus){
				$value = $existingStatus;
				$text = lang($value);
				$checkedtext = ($value==$inscription->getStatus())?"selected='true'":"";
				echo "<option value='$value' $checkedtext>$text</option>";
			}
			echo "</select>";
			echo "</td>";
			//Presence
			echo "<td>";
			echo "<div align='center'>".$inscription->getPlayer()->getTokenCount()." <img src='../images/token.png' width='20px'/></div>";
			echo "<div align='center'>";
			foreach($inscription->getPlayer()->inscriptionForRaidPeriod($raidPeriod) as $rpInscription){
				echo "<span>";
				$alt = (($rpInscription->getInscription())?'Inscription in time':'Inscription not in time');
				$intimeImg = (($rpInscription->getInscription())?'intime.png':'notintime.png');
				echo "<img title='".$rpInscription->getStatus()."' alt='".$rpInscription->getStatus()."' class='periodStatus' src='../images/status/".$rpInscription->getStatus().".png'/>";
				if($rpInscription->hasPlayingStatus()) echo "<img title='$alt' alt='$alt' class='inscriptionInTime' src='../images/inscription/$intimeImg'/>";
				echo "</span> ";
			}
			echo "</div>";
			echo "</td>";
			echo "</tr>";
			
		}
		?>
		</table>
		</form>
	</body>
</html>
