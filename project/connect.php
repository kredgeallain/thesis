<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "project";

$data = mysqli_connect($sname, $uname, $password, $db_name);
$conn = mysqli_connect($sname, $uname, $password, $db_name);
$data1 = new PDO ("mysql:host=localhost; dbname=project", "root", "");


if (!$data) {
	echo "Connection Failed!";
	exit();
}
?>