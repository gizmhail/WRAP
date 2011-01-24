<?php

include_once "../header.inc.php";

// ----- Add raid period
if(isset($_GET['addRaidPeriod'])){
	if(!loginOK())exit;
	$period = new Raidperiod();
	$period->setAnalysed(false);
	$period->setStatus(RAIDPERIOD_STATUS_PLANNED);
	$period->createRaids();
	//echo "<pre>";
	//print_r($period);
	$period->save();
	header ("Location:raid_periods.php");
	exit;
}

//test set
$i=0;
$periods = array();
while($i<10){
	$i++;
	$period = new Raidperiod();
	if(($i%2)==1){
		$period->setAnalysed(true);
	}
	if(($i%2)==1){
		
	}
	$periods[] = $period;
}

$periods = RaidperiodQuery::create()->find();

?><html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Raid periods</title>
		<link type="text/css" href="../css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" />	
		<link type="text/css" href="../css/buttons.css" rel="stylesheet" />	
		<link type="text/css" href="../css/wrap.css" rel="stylesheet" />	
		<script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
	</head>
	<body>
		<fieldset>
		<legend>Raids</legend>
		<table>
			<tr>
				<td>Period</td>
				<td>Raids</td>
			</tr>
			<?php
			foreach($periods as $period){
				?>
			<tr>
				<td><a href='raid_period.php?id=<?php echo $period->getIdRaidperiod();?>'><?php echo date('d/m',$period->startDate());?> - <?php echo date('d/m',$period->endDate());?></a></td>
				<td>
					<?php
					foreach($period->getRaids() as $raid){
						echo "<a class='raidCell' href='raid.php?id=".$raid->getIdRaid()."'>".ucfirst(strftime("%a %d",$raid->getDate()))."</a>&nbsp;";
					}
					?>
				</td>
			</tr>
				<?php
			}
			?>
		</table>
		<?if(loginOK()){?>
		<a href="?addRaidPeriod=true" class="button green" data-icon="+">Add raid period</a>
		<?}?>
		</fieldset>
	
		<fieldset>
			<legend>Info</legend>
			<a href='players.php'>Players</a>
		</fieldset>
	
		<?if(loginOK()){?>
		<div>		
		<fieldset>
			<legend>Armory auto-update</legend>
		<?include_once("$wrapBaseDir/api/bookmarklet.php");?>
		<?}?>

		</div>
	</body>
</html>
