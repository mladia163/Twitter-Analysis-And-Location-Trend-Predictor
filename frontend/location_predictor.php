<?php
// Outputoneuser is the bag of words wali file
//echo "mayank ladia";
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    die("Connection failed: " . $conn->connect_error);   } 

include "location_function.php";
	
$text = "Outputoneuser.txt";
$region = probability_return($text);

$locations=array();
$locations[1]="delhi";
$locations[2]="gujrat";
//$locations[3]="mp";
//$locations[4]="south";

$add_region = array();

for($i=1;$i<=count($locations);$i++)
{
	$add_region[$i] = 0.00;
	for($j=1;$j<=5;$j++)
		$add_region[$i]+=$region[$locations[$i].$j];
}
$val = 0.00;
for($i=1;$i<=count($locations);$i++)
	if($val<($add_region[$i]/5))
	{
		$val = (double)$add_region[$i];
		$text = $i;
	}
	
for($i=1;$i<=5;$i++)
{
	$fin_region[$locations[$text].$i]=(double)$region[$locations[$text].$i];
	$high_region[$i]=(double)$region[$locations[$text].$i];
}

for($i=1;$i<=count($locations);$i++)
{
	$add[$locations[$i]]=(double)$add_region[$i];
	$all_region[$i]=(double)$add_region[$i];
}

//print_r($fin_region);

$high_r = "";

for($i=1;$i<=5;$i++)
	if($i==5)
		$high_r = $high_r.$high_region[$i];
	else
		$high_r = $high_r.$high_region[$i]."$";
		

//print_r($high_r);
//echo "<br><br>";
//print_r($add);
$all_r = "";
for($i=1;$i<=count($locations);$i++)
	if($i==count($locations))
		$all_r = $all_r.$all_region[$i];
	else
		$all_r = $all_r.$all_region[$i]."$";
		
//print_r($all_r);

//print_r($region);
	
//high_r and all_r
?>


<html>
<body>

<form action = "graph_region.php" method="POST">
<input type="hidden" name="high_region" value="<?php echo $high_r; ?>">
<input type="submit" value="High Regions"> 
</form>
<form action = "graph_all_region.php" method="POST">
<input type="hidden" name="all_region" value="<?php echo $all_r; ?>">
<input type="submit" value="All Regions"> 
</form>
</body>
</html>

