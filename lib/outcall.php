<?php
defined('LIB_PATH') ? null : define('LIB_PATH', __DIR__ . DIRECTORY_SEPARATOR);

require_once LIB_PATH . "config.php";
require_once LIB_PATH . "Singleton.php";
require_once LIB_PATH . "ConnectDb.php";
require_once LIB_PATH . "Model/Auth.php";
require_once LIB_PATH . "Model/Mobile.php";
require_once LIB_PATH . "Controllers/Authentication.php";
require_once LIB_PATH . "Controllers/mobileList.php";
require_once LIB_PATH . "validationParams.php";
require_once LIB_PATH . "Session.php";


