<?php
include 'connect.php';

$data = mysqli_connect($sname, $uname, $password, $db_name);

$id ="";
$name = "";
$username = "";
$password = "";
$position = "";
$mobile_no = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["userID"])){
		header("location: view-user.php");
		sleep(2);
		exit; 
	}
	$userID = $_GET["userID"];
	$sql = "SELECT * FROM user WHERE userID = $userID";
	$result = $data->query($sql);
	$row = $result->fetch_assoc();

		if(!$row){
				header("location:view-user.php");
				sleep(2);
				exit;
		} 
	$name = $row["name"];
	$username = $row["username"];
	$password = $row["password"];
	$position = $row["position"];
	$mobile_no = $row["mobile_no"];
}else{
	if(isset($_POST['update'])){

		$userID = $_GET["userID"];
		$name = mysqli_real_escape_string($data, $_POST['name']);
		$username = mysqli_real_escape_string($data, $_POST['username']);
		$password = ($_POST['password']);
		$position = $_POST["position"];
		$mobile_no = $_POST["mobile_no"];
	
		$sql = "UPDATE `user` SET `name`='$name',`username`='$username',`position`='$position',`password`='$password',`mobile_no`='$mobile_no' WHERE userID = '$userID' ";
		mysqli_query($data, $sql);
		header("location:view-user.php");
		sleep(2);
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
			<p><b>Update User</b></p>
		</div>
	
        
        <div class="input">
				
			<input type="hidden" name="userID" placeholder="UserID" id="userID" value= "<?php echo $userID; ?>"  >
		</div>

		<div class="input">
			<p>Name</p>	
			<input type="text" name="name" placeholder="Name" id="name" value= "<?php echo $name; ?>" required >
		</div>

		<div class="inputUser">
			<p>Username</p>
			<input type="text" name="username" placeholder="Username" id="username" value= "<?php echo $username; ?>" required>
		</div>

		<div class="input3">
			<p>Password</p>
			<input type="Password" name="password" placeholder="Password" id="password" value= "<?php echo $password; ?>" required>
		</div>

		<div class="input2">
			<p>Position</p>
			<select name="position" id="position" >
				<option value="admin">Administrator</option>
				<option value="agent">Agent</option>
			</select>
		</div>
		
		<div class="input4">
			<p>Mobile No.</p>
			<input type="number" name="mobile_no" placeholder="09** *** ****" id="mobile" value= "<?php echo $mobile_no; ?>" required>
		</div>

		<div class="submit">

			<input type="submit" name = "update" id="submit" value="Update User">
			
		</div>
	</section>

    <! style >
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
	display:flex;
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