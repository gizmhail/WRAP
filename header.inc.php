<?

//Base path
$wrapBaseDir = dirname(__FILE__);
$wrapUpdateLog = $wrapBaseDir."/logs/modifications.txt";

//Conf
include_once($wrapBaseDir.'/conf.inc.php');

//Include ruleset
include_once($wrapBaseDir.'/rules.php');

//Common constants
include_once($wrapBaseDir.'/constants.php');

// Include the main Propel script
require_once 'propel/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init($wrapBaseDir."/lib/conf/wrap-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path($wrapBaseDir."/lib/classes" . PATH_SEPARATOR . get_include_path());

//Common files
$planningCacheFile = "$wrapBaseDir/cache/planning/armoryPush.txt";

//Language
$wrapLang = array();
$wrapLanguageConfFile = "$wrapBaseDir/lang/en.inc.php";
include_once($wrapLanguageConfFile);
if(isset($wrapLanguage)&&!is_file("$wrapBaseDir/lang/$wrapLanguage.inc.php")){
	$wrapLanguageConfFile = "$wrapBaseDir/lang/$wrapLanguage.inc.php";
	include_once($wrapLanguageConfFile);
}
include_once("$wrapBaseDir/lib/lang.php");

//Logs 
include_once("$wrapBaseDir/lib/logs.php");
