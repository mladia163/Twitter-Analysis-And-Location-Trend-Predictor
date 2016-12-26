<?php

require __DIR__.DIRECTORY_SEPARATOR.'..'.DIRECTORY_SEPARATOR.'tmhOAuthExample.php';
$tmhOAuth = new tmhOAuthExample();
ini_set('max_execution_time',28800);	
echo $_POST['north'];


function my_streaming_callback($data, $length, $metrics) {
  $file = __DIR__.'/metrics.txt';
  $myfile = fopen("logs.txt", "a");
  fwrite($myfile, "\n". $data.PHP_EOL);
  return file_exists(dirname(__FILE__) . '/STOP');
  fclose($myfile);
  //echo $data.PHP_EOL;
  //return file_exists(dirname(__FILE__) . '/STOP');
}

$params = array(
'locations' => '-122.41,37.77,-122.40,37.78'
);


$a = (double)($_POST['south']);
$b = (double)($_POST['west']);
$c = (double)($_POST['north']);
$d = (double)($_POST['east']);

$a = 76.8397;
$b = 28.401067;
$c = 77.341815;
$d = 28.889816;


$loc = array(
    'locations' => $a.",".$b.",".$c.",".$d,
  );

//print_r($loc);

$code = $tmhOAuth->streaming_request(
  'POST',
  'https://stream.twitter.com/1.1/statuses/filter.json',
  $loc,
  'my_streaming_callback'
);

$tmhOAuth->render_response();