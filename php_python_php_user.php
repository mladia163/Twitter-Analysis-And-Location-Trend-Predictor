<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "minor";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) 
{    
die("Connection failed: " . $conn->connect_error);
} 




include 'php_python_function.php';
$path = "C:/xampp/htdocs/my/finalminor/ldauser.py";
$location = $_POST['location'];


$t1="";
$t2="";
$t3="";
$t4="";
$t5="";

	$t1 = $location."1";
	create_table($t1);
	$t2 = $location."2";
	create_table($t2);
	$t3 = $location."3";
	create_table($t3);
	$t4 = $location."4";
	create_table($t4);
	$t5 = $location."5";
	create_table($t5);


function create_table($location)
{
	global $conn;
	$sql = "SELECT * FROM ".$location;
	$result = $conn->query($sql);
	if($result==false)
	{
		$sql = "CREATE TABLE ".$location." ( probability DOUBLE , word VARCHAR(255) );";
		echo $sql."<br>";
		if (!($conn->query($sql) === TRUE))
			echo "Error";
	}
}

php_python_run($path);
?>
<HTML>
<BODY>
<form action="lda_txt_sql_user.php" method="POST">
<input type = "hidden" value="<?php echo $location; ?>" name="place">
<input type = "hidden" value="<?php echo $t1; ?>" name="t1">
<input type = "hidden" value="<?php echo $t2; ?>" name="t2">
<input type = "hidden" value="<?php echo $t3; ?>" name="t3">
<input type = "hidden" value="<?php echo $t4; ?>" name="t4">
<input type = "hidden" value="<?php echo $t5; ?>" name="t5">
<input type="submit" value="Bag Of Words For Backend Generation">
</form>
</BODY>
</HTML>
