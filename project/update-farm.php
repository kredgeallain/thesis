<?php
include 'connect.php';

$data = mysqli_connect($sname, $uname, $password, $db_name);

$id = "";
$farmID ="";
$baranggayID = "";
$farmname = "";
$farmowner = "";
$contactno = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["farmID"])){
		header("location: view-farm.php");
		sleep(1);
		exit; 
	}
	$farmID = $_GET["farmID"];
	$sql = "SELECT * FROM farm WHERE farmID = $farmID";
	$result = $data->query($sql);
	$row = $result->fetch_assoc();

		if(!$row){
				header("location:view-farm.php");
				sleep(2);
				exit;
		} 
	$farmname = $row["farmname"];
	$farmowner = $row["farmowner"];
	$contactno = $row["contactno"];
	
}else{
	if(isset($_POST['update'])){

		$farmID = $_GET["farmID"];
	
		$farmname = mysqli_real_escape_string($data, $_POST['farmname']);
		$farmowner = ($_POST['farmowner']);
		$contactno = $_POST["contactno"];
		
	
		$sql = "UPDATE `farm` SET `farmname`='$farmname',`farmowner`='$farmowner',`contactno`='$contactno' WHERE farmID = '$farmID' ";
		mysqli_query($data, $sql);
		header("location:view-farm.php");
		sleep(3);
		exit;
	}else{
		echo 'Error Update';
	}
	
	
}
?>



<?php include ("header.php");  ?>

	<section class="log-in">
		<form action="#" method="post">
		<div class="text2">
			<p><b>Update Farm</b></p>
		</div>
	
        <div class="input-wrapper">
        <div class="input">
				
			<input type="hidden" name="farmID" placeholder="FarmID" id="farmID" value= "<?php echo $farmID; ?>"  >
		</div>

		<div class="inputUser">
			<p>Farm Name</p>	
			<input type="text" name="farmname" placeholder="Farmname" id="farmname" value= "<?php echo $farmname; ?>" required >
		</div>

		<div class="inputUser">
			<p>Farm Owner</p>
			<input type="text" name="farmowner" placeholder="Farmowner" id="farmowner" value= "<?php echo $farmowner; ?>" required>
		</div>
        <div class="inputUser">
			<p>Contact No</p>
			<input type="text" name="contactno" placeholder="Contactno" id="contactno" value= "<?php echo $contactno; ?>" required>
		</div>

		</div>

		<div class="submit">

		
			<input type="submit" name = "update" id="submit" value="Update Farm">
			
		</div>
	</section>

    <!--style-->
<style type="text/css">

.input-wrapper{
	display:grid;
	justify-content:center;
}

.log-in{
	box-shadow: 2px 2px 2px 2px grey;
	border-radius: 30px;
	font-family: tahoma;
	background-color: #f9faff;
	padding: 15px;
	margin-top: 30px;
	margin-right: 300px;
	margin-left: 300px;
	margin-bottom: 5px;
}
.log-in p{
	padding: 5px;
}
.text2{
	display: grid;
	justify-content: center;
	font-size: 25px;
}
.input{

	display: grid;

}
.input p{
	margin-top:5px ;
}
.inputUser{
	
	display: grid;

}
.inputUser p{
	margin-top:35px ;
}
.input2{

	display: grid;
	
}
.input2 p{
	margin-top:35px ;
}
.input3{

	display: grid;
	
}
.input3 p{
	margin-top:35px ;
}
.input4{

	display: grid;

}
.input4 p{
	margin-top:20px ;
}
.submit{
	margin-top:35px;
	display:grid;
	justify-content:center;
	text-align: center;
}

.btn{
	height: 80%;
	width: 100%;
	background-color: #0e2a83;
	color: white;
	font-size: 16px;
	margin: auto;
	border-radius: 10px;
}
input[type=submit] {
	border-radius: 10px;
  background-color: #0e2a83;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input {
	margin-top:-15px;
	color: black;
	border-radius: 10px;
	padding: 10px;

}
select {
	margin-top:-15px;
	padding: 10px;
    outline: 0;
    background-image: none;
    border: 1px solid black;
    border-radius:10px ;
}
</style>
</body>
</html>