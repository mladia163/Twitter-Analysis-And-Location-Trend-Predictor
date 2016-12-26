<?php
ini_set('max_execution_time',600);
function objectToArray($d) 
{
    if (is_object($d)) {
        
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
       
        return array_map(__FUNCTION__, $d);
    } else {
       return $d;
    }
}

$a=file_get_contents("mp+bihar.txt");
$a=str_replace("'","",$a);
//print_r($a);
$ch=1;
$st=0;
$all=array();
while($ch)
{
	$x=strpos($a,',"timestamp_ms":"');
	if($x==0)
	{
		$ch=0;
		continue;
	}
	$b=$x+17;
	while($a[$b]!="}")
	{
		$b++;
	}
	$xx=substr($a,$st,$b-$st+1);
	
	//print_r($xx);
	$js=json_decode($xx);
	$all[]=objectToArray($js);
	
	$a[$x]="@";
	$st=$b+1;
	
}

//print_r($all);


unset($a);

$city=array();
$id=array();
$ct=array();
$date=array();
$xco=array();
$yco=array();



for($i=0;$i<count($all);$i++)
{
	//echo $all[$i]['user']['screen_name']."  ";
	//echo $all[$i]['place']['name']."<br>";
	//echo $all[$i]['user']['created_at']."<br>";
	
	
	if(isset($all[$i]['user']['screen_name']))
	{
		$city[$i]=$all[$i]['place']['full_name'];
		$id[$i]=$all[$i]['user']['screen_name'];
		$date[$i]=$all[$i]['created_at'];
		$xco[$i]=$all[$i]['geo']['coordinates'][0];
		$yco[$i]=$all[$i]['geo']['coordinates'][1];
		if(isset($ct[$id[$i]]))
		{
			$ct[$id[$i]]++;
		}
		else{
			$ct[$id[$i]]=0;
		}
	}
	
}

foreach($ct as $x=>$y){
	if($y==0)
	{
		unset($ct[$x]);
	}
	else{
		echo "<br>".$x."<br>";
		
		$chk=array_keys($id,$x);
		foreach($chk as $cx=>$cy){
			echo $city[$cy]."&nbsp;";
			echo $xco[$cy]."&nbsp;";
			echo $yco[$cy]."&nbsp;";
			//echo $date[$cy]."&nbsp;";
			
		}
		echo "<br><br>";
	}
	
}

//print_r($ct);




//$c=json_decode($a);
//print_r($all);

//$a[0]['user']['screen_name'];



//print_r( $all[1]['place']['name']);



//Array ( [0] => Array ( [created_at] => Sun May 15 02:38:04 +0000 2016 [id] => 7.3167498136982E+17 [id_str] => 731674981369819136 [text] => @im_viranjali Good morning 😊 [source] => Twitter for Windows Phone [truncated] => [in_reply_to_status_id] => 7.3165420708681E+17 [in_reply_to_status_id_str] => 731654207086813184 [in_reply_to_user_id] => 1285885525 [in_reply_to_user_id_str] => 1285885525 [in_reply_to_screen_name] => im_viranjali [user] => Array ( [id] => 2919515843 [id_str] => 2919515843 [name] => Abhishek Rajput [screen_name] => rowdy_abhishek [location] => Patna,India [url] => [description] => Proud Indian.Die hard fan of @akshaykumar .Cricket Lover ❤ Viratian❤ Bollywood Lover [protected] => [verified] => [followers_count] => 2805 [friends_count] => 441 [listed_count] => 28 [favourites_count] => 2651 [statuses_count] => 73559 [created_at] => Sat Dec 13 12:02:47 +0000 2014 [utc_offset] => [time_zone] => [geo_enabled] => 1 [lang] => en [contributors_enabled] => [is_translator] => [profile_background_color] => C0DEED [profile_background_image_url] => [profile_background_image_url_https] =>  [profile_background_tile] => [profile_link_color] => 0084B4 [profile_sidebar_border_color] => C0DEED [profile_sidebar_fill_color] => DDEEF6 [profile_text_color] => 333333 [profile_use_background_image] => 1 [profile_image_url] =>  [profile_image_url_https] =>  [profile_banner_url] =>  [default_profile] => 1 [default_profile_image] => [following] => [follow_request_sent] => [notifications] => ) [geo] => Array ( [type] => Point [coordinates] => Array ( [0] => 25.58295476 [1] => 85.11182159 ) ) [coordinates] => Array ( [type] => Point [coordinates] => Array ( [0] => 85.11182159 [1] => 25.58295476 ) ) [place] => Array ( [id] => 1c302ac214ae518c [url] => https://api.twitter.com/1.1/geo/id/1c302ac214ae518c.json [place_type] => city [name] => Patna [full_name] => Patna, India [country_code] => IN [country] => भारत [bounding_box] => Array ( [type] => Polygon [coordinates] => Array ( [0] => Array ( [0] => Array ( [0] => 84.99391 [1] => 25.483546 ) [1] => Array ( [0] => 84.99391 [1] => 25.655402 ) [2] => Array ( [0] => 85.210167 [1] => 25.655402 ) [3] => Array ( [0] => 85.210167 [1] => 25.483546 ) ) ) ) [attributes] => Array ( ) ) [contributors] => [is_quote_status] => [retweet_count] => 0 [favorite_count] => 0 [entities] => Array ( [hashtags] => Array ( ) [urls] => Array ( ) [user_mentions] => Array ( [0] => Array ( [screen_name] => im_viranjali [name] => Anjii Virat Kohli❤ [id] => 1285885525 [id_str] => 1285885525 [indices] => Array ( [0] => 0 [1] => 13 ) ) ) [symbols] => Array ( ) ) [favorited] => [retweeted] => [filter_level] => low [lang] => en [timestamp_ms] => 1463279884079 )

?>