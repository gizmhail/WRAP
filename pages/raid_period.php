<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raidPeriod = RaidperiodQuery::create()->filterByIdRaidPeriod($id)->find()->getFirst();

$players = array();
$raidDate = array();
$raids = $raidPeriod->getRaids();
foreach($raids as $raid){
	$raidByDate[$raid->getDate()] = $raid;
	$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
	foreach($inscriptions as $inscription){
		$players[$inscription->getPlayer()->getPlayerName()][$raid->getDate()] = $inscription;
	}
}

ksort($raidByDate);
ksort($players);

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
		<h1>Raid period : <? echo date("d/m",$raidPeriod->startDate())." - ". date("d/m",$raidPeriod->endDate());?></h1>
		<table class='raidPeriod'>
			<tr>
				<th>Player</th>
				<?php
				foreach($raidByDate as $rd=>$raid) {
					echo "<td>";
					echo "<a href='raid.php?id=".$raid->getIdRaid()."'>".ucfirst(strftime("%a %d",$rd))."</a>";
					echo " <div><small>(".$raid->getStatus().")</small></div></td>";
				}
				?>
			</tr>
		<?php
		foreach($players as $player => $inscriptions){
			echo "<tr>";
			echo "<td>".$player."</td>";
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
	</body>
</html>
