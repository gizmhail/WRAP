<?php
include "../header.inc.php";
$wrapBaseUrl = dirname(dirname('http://'.$_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF']));
?>
Drag this to your bookmarks :
<a href='javascript:(function(){wrapBaseUrl="<?php echo $wrapBaseUrl;?>";var s=document.createElement("script");s.charset="UTF-8";s.src=wrapBaseUrl+"/api/planning_push.js";document.body.appendChild(s)})();'>WRAP Planning update</a>
