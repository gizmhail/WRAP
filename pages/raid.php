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
$playing = 0;
foreach($inscriptions as $i) {
	if($i->getStatus()==INSCRIPTION_STATUS_TAKEN){
		$inRaid++;
	}
	if($i->hasPlayingStatus()){
		$playing++;
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
                <script type="text/javascript" src="../js/jquery-ui-1.8.8.custom.min.js"></script>
                <script type="text/javascript" src="../js/wrap.js"></script>
		<script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
        </head>
        <body>
		<form method='POST' action='../actions/raid.php'>
		<h1>
			Raid : <?echo ucfirst(strftime("%A %d/%m",$raid->getDate()));?> <small>(<a href='raid_period.php?id=<? echo $raidPeriod->getIdRaidPeriod()?>'>Period <? echo date("d/m",$raidPeriod->startDate())." - ". date("d/m",$raidPeriod->endDate());?>)</a></small>
		</h1>
		<fieldset>
			<legend>Info</legend>
			<select name='raidStatus' <? if(!loginOk()||$raidPeriod->getanalysed())echo 'disabled="true"'?>>
				<?php
				foreach($raid->allStatus() as $existingStatus){
					$value = $existingStatus;
					$text = lang($value);
					$checkedtext = ($value==$raid->getStatus())?"selected='true'":"";
					echo "<option value='$value' $checkedtext>$text</option>";
				} 
				?>
			</select>
			<input type='submit' name='Save' value='Save'<? if(!loginOk()||$raidPeriod->getanalysed())echo 'disabled="true"'?>/></h1>
			<div class='raidDescription'>
			<?echo $raid->getComment()?>
			<?if(loginOk()){?>
			<a href='javascript:descriptionDialogOpen(<? echo $raid->getIdRaid();?>,%22<? echo rawurlencode($raid->getComment())?>%22)'> [Edit]</a>
			<?}else{?>
			<?}?>
			</div>
			<div class='raidContent'>
				Player in raid : <? echo $inRaid.'/'.$playing;?>
			</div>

		</fieldset>
		<input type='hidden' name='raidId' value='<?php echo $id?>'/>
		<input type='hidden' name='returnUrl' value='<?php echo $currentUrl;?>'/>
		<input type='hidden' name='inscriptionCount' value='<?php echo count($inscriptions);?>'/>
		<table class='raid'>
			<tr>
				<th>#</th>
				<th>Player</th>
				<th><img src='../images/inscription/intime.png'/></th>
				<th>Status</th>
				<th>Presence</th>
				<th>Loot</th>
			</tr>
		<?php
		foreach($inscriptions as $inscriptionIndex => $inscription){
			?>
			<tr>
				<td><? echo (1+$inscriptionIndex);?></td>	
			<?
			///TODO Better formating
			echo "<input type='hidden' name='playerId_$inscriptionIndex' value='".$inscription->getPlayer()->getIdPlayer()."'/>";
			echo "<td><a href='".$inscription->getPlayer()->armoryUrl()."'>".$inscription->getPlayer()->getPlayerName()."</a></td>";
			echo "<td><input type='checkbox' name='inscription_$inscriptionIndex' ".($inscription->getInscription()?"checked='true'":"")." ".(($raid->editionAllowed()?'':"disabled='true'"))."/></td>";
			//Status
			echo "<td>";
			echo "<img title='".$inscription->getStatus()."' alt='".$inscription->getStatus()."' class='status' src='../images/status/".$inscription->getStatus().".png'/>";
			echo "<select name='status_$inscriptionIndex' ".(($raid->editionAllowed()?'':"disabled='true'")).">";
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
			?>
			</div>
			</td>
			<td>
			<?
			$playerId = $inscription->getPlayer()->getIdPlayer();
			$raidId = $inscription->getRaid()->getIdRaid();
			foreach(LootQuery::create()->filterByRaidIdRaid($raidId)->filterByPlayerIdPlayer($playerId)->find() as $loot){
				$url = $loot->wowheadUrl();
				echo "<span><a href='$url'>".$loot->getLootName()."</a>";
				if(loginOk()){
					$lootName = rawurlencode($loot->getLootName());
					$lootDescription = rawurlencode($loot->getComment());
					echo "(<a href='javascript:lootDialogOpen($playerId,$raidId,".$loot->getIdLoot().",%22$lootName%22,%22$lootDescription%22)'>Edit</a> ";
					echo "<a href='../actions/loot.php?delete=true&id=".$loot->getIdLoot()."'>Delete</a>) ";
				}
				echo "</span> |";
			}	
			?>
			<?if(loginOk()){?>
				<a href='javascript:lootDialog(<?echo "$playerId,$raidId"?>);return false;' >Add loot</a>
			<?}?>
			</td>
			</tr>
			<?
		}
		?>
		</table>
		</form>
		<fieldset style='font-size:small'>
			<legend>Impact if <? echo ($raid->getAnalysed()?'unsaved':'saved')?></legend>
			<? raidImpactHtml($raid,!$raid->getAnalysed());?>
		</fieldset>
	</body>
</html>
