<?php 


define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD",'');
define("DATABASE","CRUD");

$Connection = mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DATABASE);

if(!$Connection){
    die("Connection Failed");
}
?>