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
	
	
}else{
	if(isset($_POST['update'])){

		$farmID = $_GET["farmID"];
	
		$unit = mysqli_real_escape_string($data, $_POST['unit']);
		$batch = ($_POST['batch']);
		$date = $_POST["date"];
        $initial = $_POST["initial"];
		
	
		$sql = "INSERT INTO `batch`(`batchID`, `batch`, `unit`, `farmID`, `date`, `initial`) 
        VALUES ('','$batch','$unit','$farmID','$date','$initial')";
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
            <p><b>Add Batch</b></p>
        </div>
        <div class="input-wrapper">
        <div class="inputUser">
            <p>farm ID</p>
            <input type="text" name="farmID" placeholder="Farmowner" id="farmowner" value="<?php echo $farmID; ?>"
                required>
        </div>

        <div class="inputUser">
            <p>Unit</p>
            <select type="text" name="unit" placeholder="Unit" id="farmname" value="" required>
                <option>Select Unit</option>
                <option>Layer</option>
                <option>Broiler</option>

            </select>
        </div>

        <div class="input">
            <p>Batch</p>
            <input type="number" name="batch" placeholder="Batch" id="farmID" value="">
        </div>

        <div class="inputUser">
            <p> Date</p>
            <input type="date" name="date" placeholder="Date" id="contactno" value="" required>
        </div>
        <div class="inputUser">
            <p> Initial </p>
            <input type="number" name="initial" placeholder="Initial" id="contactno" value="" required>
        </div>

        </div>

        <div class="submit">


            <input type="submit" name="update" id="submit" value="Add Batch">

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
	margin-left: 10px;
}
select {
	margin-top:-15px;
	padding: 10px;
	margin-left: 10px;
    outline: 0;
    background-image: none;
    border: 1px solid black;
    border-radius:10px ;
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