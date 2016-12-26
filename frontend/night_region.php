<?php

$night = $_POST['night_region'];
if(strlen($night)!=0)
{
	$night_arr = explode("$",$night);
	print_r($night_arr);
}
else
	echo "There are no tweets from this time";


?>