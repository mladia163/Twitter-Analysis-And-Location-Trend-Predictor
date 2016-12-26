<?php

$fp=fopen("abc.json","w");
function my() {
  $file = __DIR__.'/metrics.txt';
//$fp=fopen("abc.json","w");
$data="hello....";
	$fp=$GLOBALS['fp'];
  fwrite($fp,$data .PHP_EOL);
  echo $data .PHP_EOL;
  
 //fclose($fp);
}

$z=5;
while($z--)
	my();


?>
