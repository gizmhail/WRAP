<?
$t = microtime(true);
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
echo date("d/m",$raid->getDate());

$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
usort($inscriptions,array('RaidHasPlayer','sortByPriority'));
$raidPeriod = $raid->getRaidPeriod();
$raids = $raidPeriod->getRaids();

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
			echo "<td><img title='".$inscription->getStatus()."' alt='".$inscription->getStatus()."' class='status' src='../images/status/".$inscription->getStatus().".png'/></td>";
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
<?php echo microtime(true)-$t;?>
	</body>
</html>
