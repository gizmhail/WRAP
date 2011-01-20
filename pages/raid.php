<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
echo date("d/m",$raid->getDate());

$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
$raidPeriod = $raid->getRaidPeriod();
$raids = $raidPeriod->getRaids();

?>
<html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Raid period</title>
                <link type="text/css" href="../css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" />   
                <link type="text/css" href="../css/buttons.css" rel="stylesheet" />     
                <script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
                <script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
        </head>
        <body>
		<table>
			<tr>
				<th>Player</th>
				<th>isRegistered</th>
				<th>Status</th>
				<th>Presence</th>
			</tr>
		<?php
		foreach($inscriptions as $inscription){
			echo "<tr>";
			echo "<td><a href='".$inscription->getPlayer()->armoryUrl()."'>".$inscription->getPlayer()->getPlayerName()."</a></td>";
			echo "<td>".$inscription->getInscription()."</td>";
			echo "<td>".$inscription->getStatus()."</td>";
			//Presence
			echo "<td>";
			echo "<div>".$inscription->getPlayer()->getTokenCount()." tokens</div>";
			echo "<div>";
			echo "</div>";
			echo "</td>";
			echo "</tr>";
			
		}
		?>
		</table>
	</body>
</html>
