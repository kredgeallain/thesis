<?php
	include 'connect.php';
	
	if(ISSET($_POST['update'])){
		$b = $_POST["baranggay"];
        $bID = $_POST['baranggayID'];

		$sql="SELECT * from baranggay where baranggay='$b' AND baranggayID NOT IN ('$bID')";
		$result = mysqli_query($data, $sql);

		if(mysqli_num_rows($result) > 0){

			
			echo '<script language="javascript" type="text/javascript">
					alert("Barangay Already Existed");
					window.location = "add-brgy.php";
					</script>';
	  
		 }
	  
		 else {
	
		mysqli_query($data, "UPDATE `baranggay` SET `baranggay` = '$b' WHERE `baranggayID` = '$bID'");

		echo '<script language="javascript" type="text/javascript">
					alert("Barangay Updated!");
					window.location = "add-brgy.php";
					</script>';
	}

}

	if(ISSET($_POST['edit-farm'])){
		
		$f = $_POST["farmname"];
		$fown =$_POST["farmowner"];
		$no =$_POST["contactno"];
        $fID = $_POST['farmID'];
		$fs = $_POST["farm_size"];
		$nf = $_POST["no_farmers"];
		$a = $_POST["address"];
		$e = $_POST["exp"];

		$sql="SELECT * from farm where farmname= '$f' And farmID NOT IN ('$fID') ";
		$result = mysqli_query($data, $sql);

		if(mysqli_num_rows($result) > 0){

			
			echo '<script language="javascript" type="text/javascript">
					alert("Farm Already Existed!");
					window.location = "view-farm.php";
					</script>';
	  
		 }
	  else {
	
		mysqli_query($data, "UPDATE farm SET `farmname` = '$f', `farmowner` = '$fown',
		`contactno` = '$no', `farm_size` = '$fs', `no_farmers` = '$nf', `address` = '$a', `exp` = '$e' WHERE `farmID` = '$fID' ");

		echo '<script language="javascript" type="text/javascript">
					alert("Farm Updated!");
					window.location = "view-farm.php";
					</script>';

	  }
	}

	if(ISSET($_POST['edit-user'])){
		$userID = $_POST['userID'];
		$name = $_POST['name'];
		$username = $_POST['username'];
		$position = $_POST["position"];
		$brgy = $_POST["baranggay"];
		$status = $_POST["status"];
		$contact= $_POST["no"];
		$sql="SELECT * from user where username='$username' and userID NOT IN ('$userID') ";
		$result = mysqli_query($data, $sql);

		if(mysqli_num_rows($result) > 0){
			echo '<script language="javascript" type="text/javascript">
			alert("Username Already Existed");
			window.location = "homepage.php";
			</script>';

			 }
			else {
	
		mysqli_query($data, "UPDATE `user` SET `name`='$name',`username`='$username',`position`='$position', `status`='$status',  `baranggay`='$brgy',
		`mobile_no`='$contact' WHERE userID = '$userID' ");
	
	
		echo '<script language="javascript" type="text/javascript">
		alert("User Updated!");
		window.location = "view-user.php";
		</script>';

		
	}

}




	if(isset($_POST['add-batch'])){

		$batch = $_POST['batch'];
		$farmID = $_POST['farmID'];
		$date = $_POST['date'];
		$unit = $_POST['unit'];
		$initial = $_POST['initial'];

		$check_batch= "SELECT * from batch WHERE batch = '$batch' AND unit ='$unit' and farmID ='$farmID' ";
		$result = mysqli_query($conn, $check_batch);

		if(mysqli_num_rows($result) > 0){

		echo '<script language="javascript" type="text/javascript">
		alert("Batch Already Existed");
		window.location = "homepage.php";
		</script>';

		}

		else{
	
		$insert = " INSERT INTO `batch`(`farmID`, `batch`, `unit`, `initial`, `date`) 
			VALUES ('$farmID','$batch','$unit','$initial','$date') ";
	mysqli_query($data, $insert);
	
			echo '<script language="javascript" type="text/javascript">
			alert("Batch Added");
			window.location = "homepage.php";
			</script>';

	
		}
	
	}

	if(isset($_POST['edit-batch'])){

		$batch = $_POST['batch'];
		$farmID = $_POST['farmID'];
		$batchID = $_POST['batchID'];
		$date = $_POST['date'];
		$unit = $_POST['unit'];
		$initial = $_POST['initial'];

		$check_batch= "SELECT * from batch WHERE batch = '$batch' AND unit ='$unit' and batchID NOT IN ('$batchID') ";
		$result = mysqli_query($conn, $check_batch);

		if(mysqli_num_rows($result) > 0){

		echo '<script language="javascript" type="text/javascript">
		alert("Batch Already Existed");
		window.location = "homepage.php";
		</script>';

		}

		else{
	
			mysqli_query($data, "UPDATE `batch` SET `batch`='$batch',`date`='$date',
			`initial`='$initial' WHERE batchID = '$batchID' ");
	
			echo '<script language="javascript" type="text/javascript">
			alert("Batch Updated");
			window.location = "homepage.php";
			</script>';

	
		}	
	
	}

	if(isset($_POST['edit-layer'])){

		$layerID = $_POST['layerID'];
		$batchID = $_POST['batchID'];
		$no_eggs = $_POST['no_eggs'];
		$reject_eggs = $_POST['reject_eggs'];
		$Lcurrent = $_POST['Lcurrent'];
		$mortality = $_POST['mortality'];
	
			mysqli_query($data, "UPDATE `layer` SET `no_eggs`='$no_eggs',`reject_eggs`='$reject_eggs',`Lcurrent`='$Lcurrent',
			`mortality`='$mortality' WHERE layerID = '$layerID' ");
	
			echo '<script language="javascript" type="text/javascript">
			alert("Production Updated");
			window.location = "homepage.php";
			</script>';

	
		}	


		if(isset($_POST['edit-broiler'])){

			$broilerID = $_POST['broilerID'];
			$batchID = $_POST['batchID'];
			$bw = $_POST['broiler_weight'];
			$bc = $_POST['Bcurrent'];
			$m = $_POST['mortality'];
			
		
				mysqli_query($data, "UPDATE `broiler` SET `broiler_weight`='$bw',`Bcurrent`='$bc',
				`mortality`='$m' WHERE broilerID = '$broilerID' ");
		
				echo '<script language="javascript" type="text/javascript">
				alert("Production Updated");
				window.location = "homepage.php";
				</script>';
	
		
			}	


			
			if(isset($_POST['change'])){

				$npass = $_POST['npass'];
				$rpass = $_POST['rpass'];
				$userID = $_POST['userID'];
				$hash = password_hash($npass, PASSWORD_BCRYPT);

			
				$sql="select * from user where userID='".$userID."' ";
				$result=mysqli_query($conn,$sql);
		  
				$row=mysqli_fetch_array($result);
		  
				$hashed = $row["password"];

					if(($npass != '' && $rpass != '') && ($npass != $rpass)){

						echo '<script language="javascript" type="text/javascript">
						alert("Password fields do not match");
						window.location = "view-user.php";
						</script>'; 
	
					
					}
					else{

						mysqli_query($conn, "UPDATE `user` SET `password`='$hash' WHERE userID = '$userID' ");
				
						echo '<script language="javascript" type="text/javascript">
						alert("Password Updated");
						window.location = "homepage.php";
						</script>';  
					}
				
		
			
				}	
	
	

?>