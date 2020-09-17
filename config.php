<?php
define('DB_SERVER', 'mydb.cspfaxcpufsh.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', '!St3v3n19');
define('DB_NAME', 'mydb');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
if($link === false){
    
    die("ERROR: Could not connect. " . mysqli_connect_error());

}
?>