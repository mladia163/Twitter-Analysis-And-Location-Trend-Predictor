<?php
//,$location,$time
function probability_return($text)
{
	global $conn;
	$file = file_get_contents($text, true);
	$arr = explode("'",$file);
	$b=array();
	$b=$arr[1];
	$c = explode("+",$b);
	//print_r($c);
	$final = array();
	for($i=0;$i<count($c);$i++)
	{
		$temp=explode("*",$c[$i]);
		$final[$temp[1]]=$temp[0];
	}
	//print_r($final);
	
	$locations=array();
	$region=array();
	$locations[1]="delhi";
	$locations[2]="gujrat";
	//$locations[3]="mp";
	//$locations[4]="south";
	
	$val=0;
	$temp=0;
	
	for($i=1;$i<=count($locations);$i++)
		for($j=1;$j<=5;$j++)
			$region[$locations[$i].$j]=(double)0.00	;
	
	foreach($final as $key => $value)
	{
		$word=$key;
		
		for($i=1;$i<=2;++$i)
		{
			$j=1;
			$p=$value;
			while($j<6)
			{
				$sql="Select * from ".$locations[$i].$j." where word='".$word."' ";
				$result=$conn->query($sql);
				if(($result->num_rows)>0)
				{
					$row=mysqli_fetch_assoc($result);
					$temp=$p*$row['probability'];
					$region[$locations[$i].$j]+=$temp;
				}
				$j++;
			}	
		}
	}
	return $region;
}






// time -> morning,evening,night
function probability_region_return($location,$time)
{
	global $conn;
	$text = "Output_";
	if(!file_exists($text.$location.$time.".txt"))
		return 0;
	$file = file_get_contents($text.$location.$time.".txt", true);
	$arr = explode("'",$file);
	$b=array();
	$b=$arr[1];
	$c = explode("+",$b);
	//print_r($c);
	$final = array();
	for($i=0;$i<count($c);$i++)
	{
		$temp=explode("*",$c[$i]);
		$final[$temp[1]]=$temp[0];
	}
	
	$val=0;
	$temp=0;
	$region = array();
	
	for($i=1;$i<=5;$i++)
		$region[$location.$i]=0.00;
	
	foreach($final as $key => $value)
	{
		$word=$key;		
		$j=1;
		$p=$value;
		while($j<6)
		{
			$sql="Select * from ".$location.$j." where word='".$word."' ";
			$result=$conn->query($sql);
			if(($result->num_rows)>0)
			{
				$row=mysqli_fetch_assoc($result);
				$temp=$p*$row['probability'];
				$region[$location.$j]+=$temp;
			}
			$j++;
		}	
	}
	$temp = array();
	for($i=1;$i<=5;$i++)
		$temp[$i] = (double)$region[$location.$i];
	//return $region;
	return $temp;
}

?>