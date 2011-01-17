<?php
include_once("../header.inc.php");

// Include the main Propel script
require_once 'propel/Propel.php';

// Initialize Propel with the runtime configuration
Propel::init($wrapBaseDir."/db/build/conf/wrap-conf.php");

// Add the generated 'classes' directory to the include path
set_include_path($wrapBaseDir."/db/build/classes" . PATH_SEPARATOR . get_include_path());
