<?php
/* Set Variables */
$host="localhost";
$db="inmobiliaria"; 
$username="root";
$pass="root";

/*$host="localhost";
$db="inmobiliaria"; 
$username="root";
$pass="";*/

/* Attempt to connect */
$con = new mysqli($host,$username,$pass,$db);
if (mysqli_connect_error()){
die('Connect Error (' . mysqli_connect_errno() . ') '
. mysqli_connect_error());
echo 'Success... ' . $con->host_info . "\n";


/*$mysqli->close();*/

}


?>