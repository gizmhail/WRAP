<?
include "../header.inc.php";
$players = array();
$raidDate = array();
$raids = RaidQuery::create()->find();
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
		<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
        </head>
        <body>
		<h1>
			Player info
			<small>(<a href='raid_periods.php'>Access to raids</a>)</small>
		</h1>
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
			echo "<td><a href='player.php?id=$playerId'>".$player->getPlayerName()."</a></td>";
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
			echo "<td>";
			foreach(LootQuery::create()->filterByPlayerIdPlayer($playerId)->find() as $lootIndex => $loot){
				$url = $loot->wowheadUrl();
				echo "<span><a href='$url'>".(1+$lootIndex)."</a>";
				echo "</span>|";
			}	
			echo "</td>";
			echo "</tr>";
			
		}
		?>
		</table>
	</body>
</html>
