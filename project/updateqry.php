<?php
	include 'connect.php';
	
	if(ISSET($_POST['update'])){
		$b = $_POST["baranggay"];
        $bID = $_POST['baranggayID'];

		$sql="SELECT * from baranggay where baranggay='".$b."' ";
		$result = mysqli_query($data, $sql);

		if(mysqli_num_rows($result) > 0){

			
			echo '<script language="javascript" type="text/javascript">
					alert("Barangay Already Existed");
					window.location = "add-brgy.php";
					</script>';
	  
		 }
	  
		 else {
	
		mysqli_query($data, "UPDATE `baranggay` SET `baranggay` = '$b' WHERE `baranggayID` = '$bID'");

		header("location:add-brgy.php");
	}

}

	if(ISSET($_POST['edit-farm'])){
		
		$bID =$_POST['brgyID'];
		$f = $_POST['farmname'];
		$fown =$_POST["farmowner"];
		$no =$_POST["contactno"];
        $fID = $_POST['farmID'];

		$sql="SELECT * from farm where farmname='".$f."' ";
		$result = mysqli_query($data, $sql);

		if(mysqli_num_rows($result) > 1){

			
			echo '<script language="javascript" type="text/javascript">
					alert("Farm Already Existed");
					window.location = "view-farm.php";
					</script>';
	  
		 }
	  else {
	
		mysqli_query($data, "UPDATE `farm` SET `farmname` = '$f', `farmowner` = '$fown',`contactno` = '$no' WHERE `farmID` = '$fID'");

		header("location: view-farm.php");

	  }
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



	if(isset($_POST['add-batch'])){

		$batch = $_POST['batch'];
		$farmID = $_POST['farmID'];
		$date = $_POST['date'];
		$unit = $_POST['unit'];
		$initial = $_POST['initial'];

		$check_batch= "SELECT * from batch WHERE batch = '".$batch."' AND unit ='".$unit."' ";
		$result = mysqli_query($conn, $check_batch);

		if(mysqli_num_rows($result) > 0){

		echo '<script language="javascript" type="text/javascript">
		alert("Batch Already Existed");
		window.location = "view-batches.php";
		</script>';

		}

		else{
	
		$insert = " INSERT INTO `batch`(`farmID`, `batch`, `unit`, `initial`, `date`) 
			VALUES ('$farmID','$batch','$unit','$initial','$date') ";
	mysqli_query($data, $insert);
	
			echo '<script language="javascript" type="text/javascript">
			alert("Batch Added");
			window.location = "view-batches.php";
			</script>';

	
		}
	
	}

?>