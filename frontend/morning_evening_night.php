<?php

$val = (int)$_POST['loc'];
$daytime = $_POST['daytime'];
$path = $_POST[$daytime];

$location = array();
$location[1] = "delhi";
$location[2] = "gujrat";
$location[3] = "mp";
$location[4] = "south";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    die("Connection failed: " . $conn->connect_error);  } 


include 'php_python_function.php';
$path = "C:/xampp/htdocs/my/finalminor/frontend/lda".$location[$val].$daytime.".py";


php_python_run($path);	

?>