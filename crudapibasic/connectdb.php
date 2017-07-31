<?php 
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","angcrud");
define("PORT",3306);
$dbhandle=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE,PORT) or die("Unable to Connect DB");
 ?>
