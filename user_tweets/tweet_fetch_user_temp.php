<?php
require_once('TweetPHP.php');

$TweetPHP = new TweetPHP(array(
  'consumer_key'          => 'DP1XGPfU33LzPKnbDSMSU6Wcv',
  'consumer_secret'       => 'b9k8WqQncOaF3BqDE4UteYYA0XIudycNjlWTn1QVbIrgGk08eJ',
  'access_token'          => '716682029887193088-n5AZiqLGrwBJd7RbW8K3UUniBBZBcgx',
  'access_token_secret'   => 'Zu1hyRFfeOfjCvnL034XYcL6y1IGW6PTmKznOLDbYuYNo',
  'twitter_screen_name'   => 'mladia163'
));
$temp = array();
$temp = ($TweetPHP->get_tweet_array());
print_r($temp);
//arr=(array)temp[0]->in


?>	