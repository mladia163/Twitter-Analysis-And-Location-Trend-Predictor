<?php
$val=0;
$location[0]="delhi";
$text[0]="asdgbngfdsgesdbgd";
$path1 = "C:/xampp/htdocs/my/finalminor/frontend/".$location[$val]."_morning.txt";
$myfile = fopen($path1, "w");
fwrite($myfile, "\n". $text[0]);
fclose($myfile);



?>