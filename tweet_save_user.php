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
//echo $location."<br>";
$sql = "SELECT * FROM ".$location."tweet";
$result = $conn->query($sql);
if($result==false)
{
	//echo "adva";
	create_table($location."tweet");
	$ans = 1;
}


function create_table($location)
{
	global $conn;
	$sql = "CREATE TABLE ".$location." ( tweet VARCHAR(1000) , time TIME );";
	if (!($conn->query($sql) === TRUE))
		echo "1Error";
}


$loca = $location."tweet";


$temp = file_get_contents('C:\xampp\htdocs\my\finalminor\php_user_tweet_date.txt');
$arr = explode("##",$temp);
//print_r($arr);
//if(0)
for($i=0;$i<count($arr);$i++)
{
	$temp1 = explode("$",$arr[$i]);
	//print_r($temp1);
	//break;
	$a = $temp1[0];
	$a = str_replace("'", '', $a);
	$b = substr($temp1[count($temp1)-1],11,8);
	//echo $i."-".$a."&nbsp;&nbsp;&nbsp;&nbsp;".$b."<br>";
	$z = explode(":",$b);
	if(count($z)!=3)
		continue;
	$b = new DateTime($b);
	$b = $b->format('H:i:s');
	//echo "<br>";
	
	
	$sql = "INSERT INTO ".$loca." VALUES ('".$a."','".$b."')";
	//echo $sql;
	//break;
	if(!($conn->query($sql) === TRUE))
	{
		echo "Error   ".$i;
		break;
	}
	
	
}


?>