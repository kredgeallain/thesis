<?php
@include 'connect.php';

$bfetch= '';

 $sqlb = "SELECT * FROM baranggay ";
 $statement = $data1->prepare($sqlb);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $bfetch .= '<option value="   '.$row["baranggayID"].'  ">    '.$row["baranggay"].'      </option>';
 }


if(isset($_POST['submit'])){
	$fname = mysqli_real_escape_string($data, $_POST['farmname']);
	$fowner = mysqli_real_escape_string($data, $_POST['farmowner']);
	$brgy = ($_POST['baranggayID']);
	$contactno = $_POST['contactno'];
	$date = $_POST['date'];
	$batch = $_POST ['batch'];
	$unit = $_POST ['unit'];
	$initial = $_POST ['initial'];

	$check_farm_id = "SELECT * from farm  WHERE farmname = '".$fname."' ";

	$result = mysqli_query($data, $check_farm_id);

	if(mysqli_num_rows($result) > 0){
 
	   header('location:add-farm.php?add=error1');
 
	}else{
		  
		$sql = " SELECT * from  farm as f
		INNER JOIN baranggay as b ON b.baranggayID = f.baranggayID";
		mysqli_query($data, $sql);

		
	$sqlInsert = "INSERT INTO farm (farmname, farmowner,contactno,baranggayID) 
					VALUES ('$fname', '$fowner', '$contactno', '$brgy');";	
		$sql2 = mysqli_query($data, $sqlInsert);
		$farmID = mysqli_insert_id($data);
		//echo '<script> alert("New Farm Added") </script>';


	 	if ($sql2) {
			/*$sqlx = " SELECT * from  batch as s
			INNER JOIN farm as f ON s.farmID = f.farmID";
			mysqli_query($data, $sqlx); */

			$sqlInsert2 = "INSERT INTO batch (date,batch,unit, initial,farmID) 
			VALUES ('$date', '$batch', '$unit', '$initial', '$farmID');"; 
				$sql3 = mysqli_query($data, $sqlInsert2);

		}else {

			header('location:add-farm.php?add=error2');
		}

		header('location:add-farm.php?add=success');
	}


};	


?>


<?php include ("header.php");  ?>

	
	<section class = "form">
	<form action="#" method="post">
		<h2>Poultry Farm Registration Form</h2>
		<?php

			  if(isset($_GET['add'])){
					$add = $_GET['add'];
					if($add=='success'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-success">Farm Successfuly Added</span> </div>';
					}
					else if($add=='error1'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Farm Already Exist</span> </div>';
					}
					else if($add=='error2'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Batch Error</span> </div>';
					}
				
				
			 };
    	?>
<form action="#" method="POST">
		 <div class="form-body">
<!--Form-->
			
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="farmname" name="farmname" placeholder="name@example.com" required="true" >
				<label for="floatingInput" required="true">Farm Name</label>
			  </div>
			  <div class="form-floating mb-3">
				<input type="text" class="form-control" name="farmowner" id="farmowner" placeholder="name@example.com" required="true">
				<label for="floatingInput" required="true">Farm Owner</label>
			  </div>
			  <select class="form-select" name="baranggayID" aria-label="Default select example" required="true">
				<option disabled selected>Barangay</option>
					<?php echo $bfetch; ?>
			  </select>
			  <div class="form-floating mb-3">
				<input type="contact" class="form-control" name="contactno" id="contactno" placeholder="name@example.com" required="true">
				<label for="floatingInput" required="true"d>Contact No.</label>
			  </div>
<!--Add batch-->
			  <p>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
					Add Batch
				  </button>
				  <div class="submit">
			<input type="submit" class="btn btn-primary" name="submit" value="Add Farm" id="submit">
		</div>
			  </p>
			  
			  <!--AddBatch Modal -->
			  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
				  <div class="modal-content">
					<div class="modal-header">
					  <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Batch</h1>
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
		  <!--modal content-->
		  <div class="card card-body">
			<input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required="true">

			 <div class="form-floating mb-3">
			   <input type="text" class="form-control" id="batch" name="batch" placeholder="name@example.com" required="true">
			   <label for="floatingInput">Batch Name</label>
			 </div>
			 <select class="form-select form-select-sm" name="unit" aria-label=".form-select-sm example">
			   <option disable selected>Select Farm Unit</option>
			   <option value="layer">Layer</option>
			   <option value="broiler">Broiler</option>
			 </select>
			 <div class="form-floating mb-3">
				<input type="number" class="form-control" id="intial" name="initial" placeholder="name@example.com" required="true">
				<label for="floatingInput">Initial Number</label>
			  </div>
	   </div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					  <button type="button" class="btn btn-primary">Save</button>
					</div>
				  </div>
				</div>
			  </div>
		 </div>
	</section>


	<!--style-->

	<style type="text/css">
	
.form{
	display: grid !important;
	justify-content: center !important;
	align-items: center !important;
	margin-top: 80px !important;
	margin-bottom: 80px;

}

.form h2{
	padding-left: 80px;
	margin-bottom: 40px;
	font-weight: bold;
}

.sec1{
	padding-top: 20px;
	height: 100%;
	width: 30%;
	background-color: #f9faff;
	box-shadow: 2px 2px 2px 2px grey;
}
.btn1 button{
	font-weight: bolder;
	margin-top: 30px;
	margin-left: 10%;
	margin-bottom: 40px;
	background-color: #04AA6D;
	border: 2px solid black;
	color: black;
	padding: 10px 24 px ;
	cursor: pointer;
	width: 80%;
	padding-top: 10px;
	padding-bottom: 10px;border-radius: 10px;
}

input{
	padding-left: 10px !important;
	padding-right: 10px !important;
}

.form-body{
	background-color: #f9faff;
	box-shadow: 2px 2px 2px 2px grey;
	border-radius: 10px;
	padding: 30px 50px 50px 50px !important;
}

.form-body h2{
	margin-bottom: 35px;
}

select, input{
	margin-bottom: 20px !important;
}

</style>

</body>
</html>