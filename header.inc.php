<?

//Base path
$wrapBaseDir = dirname(__FILE__);

//Language
setlocale(LC_ALL, 'fr_FR');

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

