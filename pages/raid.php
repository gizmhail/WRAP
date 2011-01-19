<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
echo date("d/m",$raid->getDate());

$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->orderByInscription('desc')->find();
?>
<table>
	<tr><th>Player</th><th>isRegistered</th><th>Status</th></tr>
<?php
foreach($inscriptions as $inscription){
	echo "<tr>";
	echo "<td>".$inscription->getPlayer()->getPlayerName()."</td>";
	echo "<td>".$inscription->getInscription()."</td>";
	echo "<td>".$inscription->getStatus()."</td>";
	echo "</tr>";
	
}
?>
</table>
