<?php
	include 'connect.php';
	
	if(ISSET($_POST['update'])){
		$b = $_POST["baranggay"];
        $bID = $_POST['baranggayID'];
	
		mysqli_query($data, "UPDATE `baranggay` SET `baranggay` = '$b' WHERE `baranggayID` = '$bID'");

		header("location: add-brgy.php");
	}

	if(ISSET($_POST['edit-farm'])){
		$f = $_POST['farmname'];
		$fown =$_POST["farmowner"];
		$no =$_POST["contactno"];
        $fID = $_POST['farmID'];
	
		mysqli_query($data, "UPDATE `farm` SET `farmname` = '$f', `farmowner` = '$fown',`contactno` = '$no' WHERE `farmID` = '$fID'");

		header("location: view-farm.php");
	}

	if(ISSET($_POST['edit-user'])){
		$userID = $_POST['userID'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$position = $_POST["position"];
		$status = $_POST["status"];
		$contact= $_POST["no"];
	
		mysqli_query($data, "UPDATE `user` SET `name`='$name',`username`='$username',`position`='$position',`password`='$password',`status`='$status',`mobile_no`='$contact' WHERE userID = '$userID' ");

		header("location: view-user.php");
	}
?>


