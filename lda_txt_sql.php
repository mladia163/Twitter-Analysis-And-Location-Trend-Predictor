<?php

//include 'C:\xampp\htdocs\my\finalminor\Output.txt';

$temp = file_get_contents('C:\xampp\htdocs\my\finalminor\Output.txt');
//echo $temp;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    
die("Connection failed: " . $conn->connect_error);
} 

function creat_subtable($b, $yup)
{
	global $conn;
	for($i=0;$i<count($b);$i++)
	{
		$c = explode("*",$b[$i]);
		$sql = "INSERT INTO ".$yup." VALUES ('".$c[0]."','".$c[1]."')";
		if (!($conn->query($sql) === TRUE))
		{
			echo "Error   ".$i;
			break;
		}
	}
}


$a = explode("'",$temp);
//print_r($a[0]);
//echo '<br><br><br><br>';

//print_r($a[1]);
$b = explode("+",$a[1]);
creat_subtable($b,$_POST['t1']);
//print_r($b);





//echo '<br><br><br><br>';
//print_r($a[2]);
//echo '<br><br><br><br>';


//print_r($a[3]);
$b = explode("+",$a[3]);
creat_subtable($b,$_POST['t2']);


//echo '<br><br><br><br>';
//print_r($a[4]);
//echo '<br><br><br><br>';


//print_r($a[5]);
$b = explode("+",$a[5]);
creat_subtable($b,$_POST['t3']);


//echo '<br><br><br><br>';
//print_r($a[6]);
//echo '<br><br><br><br>';


//print_r($a[7]);
$b = explode("+",$a[7]);
creat_subtable($b,$_POST['t4']);


//echo '<br><br><br><br>';
//print_r($a[8]);
//echo '<br><br><br><br>';


//print_r($a[9]);
$b = explode("+",$a[9]);
creat_subtable($b,$_POST['t5']);


//echo '<br><br><br><br>';
//print_r($a[10]);


?>