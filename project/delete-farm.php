<?php 

$id = $_GET['id'];  

$db_name = "project";

$conn = mysqli_connect("localhost", "root", "", $db_name);

if(!$conn){

	die("Connection Failed: " );
}

$sql = "DELETE FROM farm WHERE farmID = $id";

if (mysqli_query($conn, $sql)){
	mysqli_close($conn);
	sleep(2);
	header('Location: view-farm.php');
	
	exit;

}else{
	echo "Error Deleting Farm";
}


?>




