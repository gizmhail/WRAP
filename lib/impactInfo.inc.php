<?

function raidPeriodImpactHtml($raidPeriod,$impactIfActivated=true){
	?>
	<ul>
	<?
	foreach($raidPeriod->impact($impactIfActivated) as $playerdId => $impact){
		$player = PlayerQuery::create()->filterByIdPlayer($playerdId)->findOne();
		$inverseValueForCanceling = 1;
		if(!$impactIfActivated){
			$inverseValueForCanceling = -1;
		}
		$tokenImpact = ((($impact['total']*$inverseValueForCanceling)>0)?'+':'').($inverseValueForCanceling*$impact['total']);
		?>
		<li>
			<? echo $player->getPlayerName()?>:
			<b><? echo $tokenImpact?><img src='../images/token.png' width='20px'/></b>
			<ul>
				<li>Inscription in time : <? echo $inverseValueForCanceling*$impact['inscriptionsInTime']?><img src='../images/token.png' width='20px'/></li>
			<?
			if(isset($impact['raidsNotAnalysed'])) {
				?><li>Raids not saved: <?
				foreach($impact['raidsNotAnalysed'] as $raidImpact){
					echo $inverseValueForCanceling*$raidImpact;?><img src='../images/token.png' width='20px'/><?
				}
				?></li><?
			}
			?>
			</ul>
		</li>
		<?
	}
	?>
	</ul>
	<?
}

function raidImpactHtml($raid,$impactIfActivated=true){
	$inscriptions = RaidHasPlayerQuery::create()->filterByRaidIdRaid($raid->getIdRaid())->find();
	$inverseValueForCanceling = 1;
	if(!$impactIfActivated){
		$inverseValueForCanceling = -1;
	}
	?><ul>
	<?
	foreach($inscriptions as $inscription){
		$impact = $inscription->impact();
		if($impact==0)continue;
		$tokenImpact = ((($impact*$inverseValueForCanceling)>0)?'+':'').($inverseValueForCanceling*$impact);
		?>
		<li>
			<? echo $inscription->getPlayer()->getPlayerName()?>:
			<b><? echo $tokenImpact?><img src='../images/token.png' width='20px'/></b>
		</li>
		<hr/>
		<?php					
	}
	?>
	</ul><?
}
