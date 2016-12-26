<?php 

function php_python_run($text)
{
	$command = "C:/Python27/python ".$text." 2>&1";
	echo $command;
	$pid = popen( $command,"r");
	while( !feof( $pid ) )
	{
		 echo fread($pid, 256);
		 flush();
		 ob_flush();
		 usleep(100000);
	}
	pclose($pid);
}


?>