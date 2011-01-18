<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$raid = RaidQuery::create()->filterByIdRaid($id)->find()->getFirst();
print_r($raid);

