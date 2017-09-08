<?php session_start();
ob_start();

/*ini_set("display_errors", "1");
error_reporting(E_ALL);*/
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/config/db.php';

require_once HELPERS.'AuthHelper.php';
require_once HELPERS.'ValidationHelper.php';
require_once ROOT.'core/router.php';




//unset($_SESSION['login']);




echo $_SESSION['id'];


?>