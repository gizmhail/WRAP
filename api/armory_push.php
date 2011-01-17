<?php
include "../header.inc.php";
header("Access-Control-Allow-Origin: *");
file_put_contents("$wrapBaseDir/cache/planning/test",print_r($_GET,true),FILE_APPEND);

