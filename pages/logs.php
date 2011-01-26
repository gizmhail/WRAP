<?
 
include "../header.inc.php";
header('Content-Type: text/html; charset=utf-8');
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
		<fieldset style='font-size:small;'>
		<legend>Player inscriptions</legend>
		<ul>
		<?
		if(is_file($wrapUpdateLog)){
			foreach(array_reverse(file($wrapUpdateLog)) as $line){
				$fields = explode(";",$line);
				list($type,$time) = explode(":",$fields[0]);
				if($type=="RHP"){
					$raid = RaidQuery::create()->filterByIdRaid($fields[1])->find()->getFirst();
					echo "<li>";
					echo ucfirst(strftime("[Raid %d/%m]",$raid->getDate()));
					echo "";
					echo $fields[2].":".lang($fields[3]);
					echo "(".date("d/m",intval($time)).")";
					echo "</li>";
					echo "\n";
				}
			}
		}
		?>
		</ul>
		</fieldset>
	</body>
</html>
