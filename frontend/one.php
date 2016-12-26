<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    die("Connection failed: " . $conn->connect_error);   }  

$val = (int)($_POST['loc']);
//echo $val;
$location = array();
$location[1] = "delhi";
$location[2] = "gujrat";
$location[3] = "mp";
$location[4] = "south";



$start=new DateTime("01:00:00");
$start=$start->format('H:i:s');
$end=new DateTime("11:00:00");
$end=$end->format('H:i:s');
$sql = "SELECT tweet from ".$location[$val]."tweet WHERE time > '".$start."' AND time < '".$end."'";
//echo $sql;
$text1 = " ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		$text1 = $text1.$row['tweet']."\n";
	}
}
$path1 = "C:/xampp/htdocs/my/finalminor/frontend/".$location[$val]."morning.txt";
//$path1 = "C:/xampp/htdocs/my/finalminor/frontend/morning.txt";
$myfile = fopen($path1, "w");
fwrite($myfile, "\n". $text1);
fclose($myfile);



$start=new DateTime("12:00:00");
$start=$start->format('H:i:s');
$end=new DateTime("18:00:00");
$end=$end->format('H:i:s');
$sql = "SELECT tweet from ".$location[$val]."tweet WHERE time > '".$start."' AND time < '".$end."'";
$text2 = " ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		$text2 = $text2.$row['tweet']."\n";
	}
}
$path2 = "C:/xampp/htdocs/my/finalminor/frontend/".$location[$val]."evening.txt";
//$path2 = "C:/xampp/htdocs/my/finalminor/frontend/evening.txt";
$myfile1 = fopen($path2, "w");
fwrite($myfile1, "\n". $text2);
fclose($myfile1);



$start=new DateTime("18:00:01");
$start=$start->format('H:i:s');
$end=new DateTime("24:00:00");
$end=$end->format('H:i:s');
$sql = "SELECT tweet from ".$location[$val]."tweet WHERE time > '".$start."' AND time < '".$end."'";
$text3 = " ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {	
	while($row = $result->fetch_assoc()) {
		$text3 = $text3.$row['tweet']."\n";
	}
}
$path3 = "C:/xampp/htdocs/my/finalminor/frontend/".$location[$val]."night.txt";
//$path3 = "C:/xampp/htdocs/my/finalminor/frontend/night.txt";
$myfile3 = fopen($path3, "w");
fwrite($myfile3, "\n". $text3);
fclose($myfile3);




?>

<html>
<body>
<form action="morning_evening_night.php" method="POST">
<input type="hidden" value='"<?php echo $path1; ?>"' name="morning">
<input type="hidden" value=<?php echo $val; ?> name="loc">
<input type="hidden" value="morning" name="daytime">
<input type="submit" value="Good Morning Output Generator">
</form>
<form action="morning_evening_night.php" method="POST">
<input type="hidden" value='"<?php echo $path2; ?>"' name="evening">
<input type="hidden" value=<?php echo $val; ?> name="loc">
<input type="hidden" value="evening" name="daytime">
<input type="submit" value="Good Evening Output Generator">
</form>
<form action="morning_evening_night.php" method="POST">
<input type="hidden" value='"<?php echo $path3; ?>"' name="night">
<input type="hidden" value=<?php echo $val; ?> name="loc">
<input type="hidden" value="night" name="daytime">
<input type="submit" value="Good Night Output Generator">
</form>
</body>
</html>