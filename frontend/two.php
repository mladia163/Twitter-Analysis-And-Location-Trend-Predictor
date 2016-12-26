<?php

include 'location_function.php';

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


$file1 = "morning";
$file2 = "evening";
$file3 = "night";

$morning_arr = probability_region_return($location[$val],$file1);
$evening_arr = probability_region_return($location[$val],$file2);
$night_arr = probability_region_return($location[$val],$file3);
$all = array();

/*
print_r($morning_arr);
echo "<br><br>";
print_r($evening_arr);
echo "<br><br>";
*/

//print_r($night_arr);
//echo "<br><br>";




$max_morning = 0;
$max_evening = 0;
$max_night = 0;
for($i=1;$i<=count($morning_arr);$i++)
	if($max_morning<$morning_arr[$i])
		$max_morning = $morning_arr[$i];
for($i=1;$i<=count($evening_arr);$i++)
	if($max_evening<$evening_arr[$i])
		$max_evening = $evening_arr[$i];
for($i=1;$i<=count($night_arr);$i++)
	if($max_night<$night_arr[$i])
		$max_night = $night_arr[$i];
$all_time_region = $max_morning."$".$max_evening."$".$max_night;


	
$morning = "";
for($i=1;$i<=5;$i++)
	if($i==5)
		$morning = $morning.$morning_arr[$i];
	else
		$morning = $morning.$morning_arr[$i]."$";

	
$evening = "";
for($i=1;$i<=5;$i++)
	if($i==5)
		$evening = $evening.$evening_arr[$i];
	else
		$evening = $evening.$evening_arr[$i]."$";

	
$night = "";
if($night_arr!=0)
	for($i=1;$i<=5;$i++)
		if($i==5)
			$night = $night.$night_arr[$i];
		else
			$night = $night.$night_arr[$i]."$";


	
?>




<html>
<body>

<form action = "morning_region.php" method="POST">
<input type="hidden" name="morning_region" value="<?php echo $morning; ?>">
<input type="submit" value="Morning Region"> 
</form>
<form action = "evening_region.php" method="POST">
<input type="hidden" name="evening_region" value="<?php echo $evening; ?>">
<input type="submit" value="Evening Region"> 
</form>
<form action = "night_region.php" method="POST">
<input type="hidden" name="night_region" value="<?php echo $night; ?>">
<input type="submit" value="Night Region"> 
</form>

<form action = "all_time_region.php" method="POST">
<input type="hidden" name="all_time_region" value="<?php echo $all_time_region; ?>">
<input type="submit" value="All Time Region"> 
</form>


</body>
</html>
