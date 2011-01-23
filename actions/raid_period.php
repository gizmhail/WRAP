<?php

include "../header.inc.php";
if(!loginOK()){
	header("Location:login.php?returnUrl=".rawurlencode($_REQUEST['returnUrl']));
}


$id = isset($_REQUEST['raidPeriodId'])?$_REQUEST['raidPeriodId']:false;
if($id === false) exit;
$raidPeriod = RaidperiodQuery::create()->filterByIdRaidPeriod($id)->findOne();

//Raid period status and token impact
if(isset($_REQUEST['raidPeriodStatus'])){
	$raidPeriodStatus = $_REQUEST['raidPeriodStatus'];
	$confirmed = isset($_REQUEST['confirmed']);
	if($raidPeriodStatus != $raidPeriod->getStatus()){
		if($raidPeriod->getStatus() != RAIDPERIOD_STATUS_DONE&&$raidPeriodStatus != RAIDPERIOD_STATUS_DONE){
			//No token impact
			$raidPeriod->setStatus($raidPeriodStatus);
                        $raidPeriod->save();
		}else{
			if(!$confirmed){
				header('Content-Type: text/html; charset=utf-8'); 
				?>
				<h1>
					Switch raid period <? echo date("d/m",$raidPeriod->startDate())." - ". date("d/m",$raidPeriod->endDate());?> 
					from <? echo lang($raidPeriod->getStatus());?> to status <?echo lang($raidPeriodStatus);?>
				</h1>
				<h2>Impact</h2>
				<? raidPeriodImpactHtml($raidPeriod,$raidPeriodStatus == RAIDPERIOD_STATUS_DONE)?>
				<a href='?confirmed=true&<? echo "raidPeriodStatus=$raidPeriodStatus&raidPeriodId=$id&returnUrl=".rawurlencode($_REQUEST['returnUrl']);?>'>Confirm ?</a>
				<?php
				unset($_REQUEST['returnUrl']);
			}else{	
				if($raidPeriod->getStatus() == RAIDPERIOD_STATUS_DONE){
					$raidPeriod->doCancelAnalysis($raidPeriodStatus);
				}else if($raidPeriodStatus == RAIDPERIOD_STATUS_DONE){
					$raidPeriod->doAnalysis($raidPeriodStatus);
				}
			}
		}
	}
}

if(isset($_REQUEST['returnUrl'])){
	header('Location: '.$_REQUEST['returnUrl']);
}
