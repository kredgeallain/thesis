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

		<div class="submit">

		
			<input type="submit" name = "update" id="submit" value="Update Farm">
			
		</div>
	</section>

    <!--style-->
<style type="text/css">

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
	display: flex;
	justify-content: center;
	font-size: 25px;
}
.input{
	margin-left: 10px;
	display: flex;
	justify-content: center;
}
.input p{
	margin-top: 35px;
}
.inputUser{
	margin-left: -20px;
	display: flex;
	justify-content: center;
}
.inputUser p{
	margin-top: 35px;
}
.input2{
	margin-right: 47px;
	display: flex;
	justify-content: center;
}
.input2 p{
	margin-top: 35px;
}
.input3{
	margin-right: 15px;
	display: flex;
	justify-content: center;
}
.input3 p{
	margin-top: 35px;
}
.input4{
	margin-right: 20px;
	display: flex;
	justify-content: center;
}
.input4 p{
	margin-top: 35px;
}
.submit{
	display: flex;
	justify-content:center;

}
.btn{
	height: 80%;
	width: 100%;
	background-color: #0e2a83;
	color: white;
	font-size: 16px;
	margin: auto;
	border-radius: 20px;
}
input[type=submit] {
	border-radius: 20px;
  background-color: #0e2a83;
  border: none;
  color: white;
  padding: 16px 32px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
}
input {
	color: black;
	border-radius: 20px;
	padding: 10px;
	margin: 30px;
	margin-left: 10px;
}
select {
	padding: 10px;
	margin: 30px;
	margin-left: 10px;
    outline: 0;
    background-image: none;
    border: 1px solid black;
    border-radius: 5px;
}
summary {
	cursor: pointer;
	list-style: none;
}
.drop-menu a{
	text-decoration: none;
	color: white;
}
ul {
	border-radius: 15px;
	box-shadow: 2px, 2px, 2px,2px black;
	background-color: grey;
	padding-bottom: 10px;
	margin-top: -3px;
	margin-left: -210px;
	margin-right: 50px;
	margin-bottom: -203px;
}
li {
	padding-bottom: 10px;
	padding-top: 20px;
	padding-left:10px;
	padding-right:20px;
	list-style: none;
}
.side-menu {
	padding-right: 30px;
 	display: flex;
 	justify-content: flex-end;
 	margin-top: -90px;
 	margin-bottom: 20px;
 }
.side-menu img{
 	margin-left: -165px;
 }
</style>
</body>
</html>