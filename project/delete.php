<?php 

$id = $_GET['id'];  

$db_name = "project";

$conn = mysqli_connect("localhost", "root", "", $db_name);

if(!$conn){

	die("Connection Failed: " );
}

$sql = "DELETE FROM user WHERE userID = $id";

if (mysqli_query($conn, $sql)){
	mysqli_close($conn);
	sleep(1);
	header('Location: view-user.php');
	
	exit;

}else{
	echo "Error Deleting User";
}


?>




