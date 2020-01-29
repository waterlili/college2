<?php

$servername = "localhost";
$username = "root";
$password = "123";
$dbname = "amoozeshgah";

// Create connection
$db = mysqli_connect($servername,$username,$password,$dbname);
$db->set_charset("utf8");
//mysql_set_charset("utf8", $db);
//$db->set_charset("utf8");
$_SESSION['connect']=$db;
 

 ?> 
