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



$sql = " SELECT * from  farm as f
		INNER JOIN baranggay as b ON b.baranggayID = f.baranggayID";
		mysqli_query($data, $sql);

		
	$sqlInsert = "INSERT INTO farm (farmname, farmowner,contactno,baranggayID) 
					VALUES ('$fname', '$fowner', '$contactno', '$brgy');";	
		$sql2 = mysqli_query($data, $sqlInsert);
		$farmID = mysqli_insert_id($data);
		echo '<script> alert("New Farm Added") </script>';

	
	

	 if ($sql2) {

		$sqlx = " SELECT * from  batch as s
		INNER JOIN farm as f ON s.farmID = f.farmID";
		mysqli_query($data, $sqlx);


		$sqlInsert2 = "INSERT INTO batch (date,batch,unit, initial,farmID) 
		VALUES ('$date', '$batch', '$unit', '$initial', '$farmID');"; 
			$sql3 = mysqli_query($data, $sqlInsert2);

	 }


	else {

		echo "error";
	}


};	


?>




<!DOCTYPE html>
<html>
<head>
	<title> Recording and Inventory System for Poultry Products!</title>
	<link rel="icon" href="../image/logo.png" type="image/icon type">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
	<section class="header">
		<div class="logo">
			<img src="../image/logo.png" alt="Department of Agriculture Logo" width="80px", height="80px">
			<p>Republic of the Philippines</p>
			<h1>DEPARTMENT OF AGRICULTURE</h1>
		</div>

		<div class="text">
			<p>San Lorenzo, Guimaras</p>
		</div>

					<section class="nav">
				<div class="home">
					<a href="adminpage.php">Home</a>
				</div>
				<div class ="dropdown0">
					<button class="dropbtn0"> Production </button>
					<div class="dropdown-content0">
						<a href="view records.html"> View Record</a>
						<a href="record.html"> Record Production</a>
						<a href="#"> Generate Report</a>
						<a href="search.html"> Find Records </a>
					</div>
				</div>	

				<div class="dropdown2">
					<button class="dropbtn2"> Farm </button>
					<div class="dropdown-content2">
						<a href="farm-detail.html"> View Farm</a>
						<a href="add-farm.html">Add Farm</a>
						<a href="map.html"> View farm Map</a>
					</div>
				</div>

				<div class="dropdown3">
					<button class="dropbtn3"> User </button>
					<div class="dropdown-content3">
						<a href="add-user.php"> Add User</a>
						<a href="view-user.php"> View Users </a>
					</div>
				</div>


				<div class="user">

					<details>
					<summary class="summ"><img src="../image/user2.png" alt="User" width="70px", height="70px"></summary>
					<div class="drop-menu">
						<ul>
							<li><a href="">Contact Us</a></li>
							<li><a href="">Help</a></li>
							<li><a href="">Log out</a></li>
						</ul>
					</div>
					</details>
				</div>
			</section>
	</section>



	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

	</section>
	
	<section class = "form">
	<form action="#" method="post">
		<h2>Poultry Farm Registration Form</h2>

		 <div class="form-body">
		 <form action="" method="post">
<!--Form-->
			
			<div class="form-floating mb-3">
				<input type="text" class="form-control" id="farmname" name="farmname" placeholder="name@example.com">
				<label for="floatingInput" required>Farm Name</label>
			  </div>
			  <div class="form-floating mb-3">
				<input type="text" class="form-control" name="farmowner" id="farmowner" placeholder="name@example.com">
				<label for="floatingInput" required>Farm Owner</label>
			  </div>
			  <select class="form-select" name="baranggayID" aria-label="Default select example">
				<option disabled selected>Barangay</option>
					<?php echo $bfetch; ?>
			  </select>
			  <div class="form-floating mb-3">
				<input type="contact" class="form-control" name="contactno" id="contactno" placeholder="name@example.com">
				<label for="floatingInput" required>Contact No.</label>
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
			<input type="date" class="form-control" id="date" name="date" aria-describedby="emailHelp" required>

			 <div class="form-floating mb-3">
			   <input type="text" class="form-control" id="batch" name="batch" placeholder="name@example.com" required>
			   <label for="floatingInput">Batch Name</label>
			 </div>
			 <select class="form-select form-select-sm" name="unit" aria-label=".form-select-sm example">
			   <option disable selected>Select Farm Unit</option>
			   <option value="layer">Layer</option>
			   <option value="broiler">Broiler</option>
			 </select>
			 <div class="form-floating mb-3">
				<input type="number" class="form-control" id="intial" name="initial" placeholder="name@example.com" required>
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
	
	*{
		font-family: tahoma;
		padding: 0px;
		margin: 0px;
	
	}
	
	.header{
		background-color: #0e2a83;
		padding: 15px;
	}
	
	.header p{
		margin-top:-10px;
	}
	
	.logo {
		margin-left: -10px;
		display: flex;
		padding-bottom: 10px;
	}
	
	.logo p{
	color: white;
	padding-left: 20px;
	}
	
	.logo img{
		padding:5px;
		margin-top: -10px;
	}
	
	.logo h1{
		color: white;
		text-decoration: overline;
		font-size: 25px;
		padding-left: 15px;
		padding-right: 10px;
		padding-top: 15px;
		padding-bottom: 10px;
		margin-left: -200px;
	
	
	}
	
	.text p{
		color: white;
		margin-top: -45px;
		padding-top: 5px;
		padding-left: 90px;
		margin-bottom: 5px;
	}
	
	
	
	.title{
		font-size: 20px;
		display:flex;
		justify-content: center;
		padding-bottom: 10px;
	}
	
	.nav{
		background-color: #163289;
		display: flex;
		margin-top: -58px;
		margin-bottom: -15px;
		padding-top: 25px;
		position: absolute;
		border: 1px solid #0e2a83;
		right: 0;
	}
	
	
	.user{
		margin-top: -45px;
		margin-right: 30px;
	}
	
	.home{
		margin-top: 5px;
	}
	.home a{
		font-size: 16px;
		text-decoration: none;
		color: white;
		padding: 16px;
		margin-right: 10px;
		text-shadow: 1px 1px #9a9b9e;
	}
	
	
	.home a:hover{
		padding: 16px;
		background-color: blue;
	}
	
	.user a{
		margin-right: 1px;
	}
	
	ul {
		padding-top: 10px;
		border-radius: 15px;
		box-shadow: 2px, 2px, 2px,2px black;
		background-color: grey;
		padding-bottom: 10px;
		margin-top: -3px;
		margin-left: -210px;
		margin-bottom: -203px;
	
	}
	
	li:hover{
		padding: 18px;
		background-color: #ddd;
	}
	
	li {
		border-radius: 15px;
		padding-bottom: 10px;
		padding-top: 20px;
		padding-left:10px;
		padding-right:20px;
		list-style: none;
	}
	.side-menu {
	
		 display: flex;
		 justify-content: flex-end;
		 margin-top: px;
		 margin-bottom: 20px;
	 }
	
	.user img{
		margin-top: 14px;
	}
	
	.summ {
		 margin-left: 25px;
		cursor: pointer;
		list-style: none;
	}
	
	.drop-menu a{
		text-decoration: none;
		color: white;
	}
	
	/* dropdown button */
	.dropbtn0{
		color: white;
		text-shadow: 1px 1px #9a9b9e;
		padding: 16px;
		padding-right: 10px;
		padding-left: 10px;
		font-size: 16px;
		border: none;
		justify-items: center;
		background-color: transparent;
	}
	.dropdown0{
		margin-top: -10px;
		display: inline-block;
	}
	.dropdown0 label{
		padding: 5px;
		color: black;
		margin-bottom: 100px;
	}
	
	.dropdown0 .dropbtn0{
		
		margin-left: 5px;
		cursor: pointer;
	}
	.dropdown-content0{
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
		margin-left: 5px;
	
	
	
	}
	.dropdown-content0 a{
		color: black;
		padding: 20px;
		text-decoration: none;
		display: block;
	
	}
	.dropdown-content0 a:hover {
		background-color: #ddd;
	}
	.dropdown0:hover .dropdown-content0{
		display: block;
	} 
	.dropdown0:hover .dropbtn0 {
		background-color: blue ;
	}
	
	/*dropdown2*/
	
	.dropbtn2{
		color: white;
		text-shadow: 1px 1px #9a9b9e;
		padding-right: 10px;
		padding-left: 10px;
		padding: 16px;
		font-size: 16px;
		border: none;
		justify-items: center;
		background-color: transparent;
	}
	.dropdown2{
		margin-top: -10px;
		display: inline-block;
	}
	.dropdown2 label{
		padding: 5px;
		color: black;
		margin-bottom: 100px;
	}
	
	.dropdown2 .dropbtn2{
		
		/* margin-top: 100px; */
		margin-left: 5px;
		cursor: pointer;
	}
	.dropdown-content2{
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
		margin-left: 5px;
	
	}
	.dropdown-content2 a{
		color: black;
		padding: 20px;
		text-decoration: none;
		display: block;
	}
	.dropdown-content2 a:hover {
		background-color: #ddd;
	}
	.dropdown2:hover .dropdown-content2{
		display: block;
	} 
	.dropdown2:hover .dropbtn2 {
		background-color: blue ;
	}
	
	/*dropdown3*/
	
	.dropbtn3{
		color: white;
		text-shadow: 1px 1px #9a9b9e;
		padding-right: 10px;
		padding-left: 10px;
		padding: 16px;
		font-size: 16px;
		border: none;
		justify-items: center;
		background-color: transparent;
	}
	.dropdown3{
		margin-top: -10px;
		display: inline-block;
	}
	.dropdown3 label{
		padding: 5px;
		color: black;
		margin-bottom: 100px;
	}
	
	.dropdown3 .dropbtn3{
		
		/* margin-top: 100px; */
		margin-left: 5px;
		cursor: pointer;
	}
	.dropdown-content3{
		display: none;
		position: absolute;
		background-color: #f1f1f1;
		min-width: 100px;
		box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		z-index: 1;
		margin-left: 5px;
	
	}
	.dropdown-content3 a{
		color: black;
		padding: 20px;
		text-decoration: none;
		display: block;
	}
	.dropdown-content3 a:hover {
		background-color: #ddd;
	}
	.dropdown3:hover .dropdown-content3{
		display: block;
	} 
	.dropdown3:hover .dropbtn3 {
		background-color: blue ;
	}

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