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




include '../php_python_function.php';
$path = "C:/xampp/htdocs/my/finalminor/frontend/ldaoneuser.py";
//$location = $_POST['location'];


php_python_run($path);
?>
<HTML>
<BODY>
<form action="location_predictor.php" method="POST">
<input type="submit" value="Bag Of Words For Backend Generation">
</form>
</BODY>
</HTML>
