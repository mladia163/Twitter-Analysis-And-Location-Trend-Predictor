<?php

//include 'php_tweet_date.txt';
$location = $_POST['location'];
//echo $location;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    
die("Connection failed: " . $conn->connect_error);
} 


//create_table($location."tweet");

$ans = 0;

$sql = "SELECT * FROM ".$location."tweet";
$result = $conn->query($sql);
if($result==false)
{
	create_table($location."tweet");
	$ans = 1;
}


function create_table($location)
{
	global $conn;
	$sql = "CREATE TABLE ".$location." ( tweet VARCHAR(1000) , time TIME );";
	if (!($conn->query($sql) === TRUE))
		echo "Error";
}


$loca = $location."tweet";


$temp = file_get_contents('C:\xampp\htdocs\my\finalminor\php_tweet_date.txt');
$arr = explode("##",$temp);
//print_r($arr);

for($i=0;$i<count($arr);$i++)
{
	$temp1 = explode("$",$arr[$i]);
	$a = $temp1[0];
	$b = substr($temp1[count($temp1)-1],11,8);
	$b = new DateTime($b);
	$b = $b->format('H:i:s');
	//echo "<br>";
	$sql = "INSERT INTO ".$loca." VALUES ('".$a."','".$b."')";
	if (!($conn->query($sql) === TRUE))
	{
		echo "Error   ".$i;
		break;
	}

	
	
}


?>