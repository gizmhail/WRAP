<?
include "../header.inc.php";
$id = isset($_GET['id'])?$_GET['id']:false;
if($id === false) return;
$player = PlayerQuery::create()->filterByIdPlayer($id)->findOne();
if(!$player)exit;
?><html>
        <head>
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <title>Player</title>
                <link type="text/css" href="../css/smoothness/jquery-ui-1.8.8.custom.css" rel="stylesheet" />   
                <link type="text/css" href="../css/buttons.css" rel="stylesheet" />     
                <link type="text/css" href="../css/wrap.css" rel="stylesheet" />     
                <script type="text/javascript" src="../js/jquery-1.4.4.min.js"></script>
                <script type="text/javascript" src="js/jquery-ui-1.8.8.custom.min.js"></script>
        </head>
        <body>
		<h1><? echo $player->getPlayerName()?></h1>
		<h2><a href='<? echo $player->armoryUrl()?>'>Armory</a></h2>
	<body>
</html>
