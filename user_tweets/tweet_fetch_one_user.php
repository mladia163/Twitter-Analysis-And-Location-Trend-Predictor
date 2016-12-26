<?php
require_once('TweetPHP1.php');

$user = $_POST['users'];
//$user = "mladia163";

function make_user($user)
{
	$TweetPHP = new TweetPHP(array(
	  'consumer_key'          => 'sVCTBM6o1xIaJpbXISZisuKy8',
	  'consumer_secret'       => 'ieHoJZzxkNjCCFgvQhY4tFqfhEDdn2k5cMgkhGaoOfalwKbJwH',
	  'access_token'          => '716682029887193088-L5YKkEToKHrBIXFu7zvI6TwpQWAr1DS',
	  'access_token_secret'   => '3ieWnBJUOzFRuyQ0MLWP3VgDVFII37ktNT7r8rRBqiogm',
	  'twitter_screen_name'   => $user
	));
	//echo "function";
	return $TweetPHP;
}

	$TweetPHP = new TweetPHP(array());
	$TweetPHP = make_user($user);	
	$try1 =  $TweetPHP->get_tweet_array();

	//echo $arr[$i];
	//echo "pola";
	//print_r($try1);
	
	$text = "";
	$text1 = "";
	
	for($z=0;$z<count($try1);$z++)
	{
		$try = $try1[$z];
		$user = $try['user'];
		$geo = $try['place'];
		$polygon = $geo['bounding_box'];
		
		$a1 = $try['text'];
		$a2 = $geo['name'];
		$a3 = $geo['country_code'];
		$a4 = $try['created_at'];
		$c1y = $polygon['coordinates'][0][0][0];
		$c2y = $polygon['coordinates'][0][1][0];
		$c3y = $polygon['coordinates'][0][2][0];
		$c4y = $polygon['coordinates'][0][3][0];
		$c1x = $polygon['coordinates'][0][0][1];
		$c2x = $polygon['coordinates'][0][1][1];
		$c3x = $polygon['coordinates'][0][2][1];
		$c4x = $polygon['coordinates'][0][3][1];
		$x1 = $c1xmean = (double)(($c2x+$c4x)/2);
		$y1 = $c1ymean = (double)(($c2y+$c4y)/2);
		$c2xmean = (double)(($c1x+$c3x)/2);
		$c2ymean = (double)(($c1y+$c3y)/2);
		
		/*
		$text = $text.$tweet[$cy]."$".$date[$cy]."##";
		$text1 = $text1.$tweet[$cy]."\n";
		if($chq[$id[$cy]]==1)
		{
			$ans = $ans.$id[$cy]."~##~";
			$chq[$id[$cy]]=0;
		}
		*/	
		//echo $z."<br>";
		//echo $a1;
		$text =  $text.$a1."$".$a4."##";
		$text1 = $text1.$a1."\n";		
	}

//echo $text;
$ans1 = $text."~$".$text1;
$burr = explode("~$",$ans1);
/*print_r($burr);
$myfile = fopen("C:/xampp/htdocs/my/finalminor/php_user_tweet_date.txt", "w");
fwrite($myfile, "\n". $burr[0]);
fclose($myfile);
*/
//print_r($burr[1]);

$myfile1 = fopen("C:/xampp/htdocs/my/finalminor/frontend/php_oneuser_tweet_data.txt", "w");
fwrite($myfile1, "\n". $burr[1]);
fclose($myfile1);

echo '<form action="../frontend/php_python_php_oneuser.php" method="POST">';
echo '<input type="submit" value="Python Lda">';
//echo '<input type="hidden" value="'.$.'" name="location">';
echo '</form>';

?>