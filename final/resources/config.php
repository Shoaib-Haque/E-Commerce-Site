<?php 
ob_start();//used for page refresh......
session_start();//used for create SESSION.....
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);//used for include file.....

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT",__DIR__ . DS . "templates/front");//used for include file.....

defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK",__DIR__ . DS . "templates/back");//used for include file.....

defined("UPLOAD_DIRECTORY") ? null : define("UPLOAD_DIRECTORY",__DIR__ . DS . "../img");//use for define path.......

defined("DB_HOST") ? null : define("DB_HOST","localhost");
defined("DB_USER") ? null : define("DB_USER","root");
defined("DB_PASS") ? null : define("DB_PASS","");
defined("DB_NAME") ? null : define("DB_NAME","ecom");

$connection=mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);


require_once("functions.php");

?>


