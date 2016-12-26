<?php

include 'C:/xampp/htdocs/my/finalminor/backend/after_tweet/tweet_decode_function.php';
$location = "gujrat";

	
$path_to_data = "C:/xampp/htdocs/my/finalminor/backend/fetch_tweets_bounding_box/cli/json_data.txt";
$fin ="";
$fin = tweet_decode($path_to_data);
$text = explode("~$",$fin);
$myfile = fopen("C:/xampp/htdocs/my/finalminor/php_tweet_date.txt", "w");
fwrite($myfile, "\n". $text[0]);
fclose($myfile);

$myfile1 = fopen("C:/xampp/htdocs/my/finalminor/php_tweet_data.txt", "w");
fwrite($myfile1, "~~". $text[1]);
fclose($myfile1);
//print_r($text[2]);
//$myfile2 = fopen("C:/xampp/htdocs/my/finalminor/php_tweet_user.txt", "w");
//fwrite($myfile2, "". $text[2]);
//fclose($myfile2);




echo '<form action="../../php_python_php.php" method="POST">';
echo '<input type="submit" value="Python Lda">';
echo '<input type="hidden" value="'.$location.'" name="location">';
echo '</form>';

echo '<form action="../../tweet_save.php" method="POST">';
echo '<input type="submit" value="Tweet save">';
echo '<input type="hidden" value="'.$location.'" name="location">';
echo '</form>';

echo '<form action="../../user_tweets/tweet_fetch_user.php" method="POST">';
echo '<input type="hidden" value="'.$text[2].'" name="users">';
echo '<input type="submit" value="User Tweet">';
echo '<input type="hidden" value="'.$location.'" name="location">';
echo '</form>';

?>

