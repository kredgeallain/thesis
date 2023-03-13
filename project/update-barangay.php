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
	
	if(!isset($_GET["baranggayID"])){
		header("location:add-brgy.php");
		sleep(2);
		exit; 
	}
	$baranggayID = $_GET["baranggayID"];
	$sql = "SELECT * FROM baranggay WHERE baranggayID = $baranggayID";
	$result = $data->query($sql);
	$row = $result->fetch_assoc();

		if(!$row){
				header("location:add-brgy.php");
				sleep(2);
				exit;
		} 
	$baranggay = $row["baranggay"];
	
}else{
	if(isset($_POST['update'])){

		$baranggayID = $_GET["baranggayID"];
		$baranggay = mysqli_real_escape_string($data, $_POST['baranggay']);
	
	
		$sql = "UPDATE `baranggay` SET `baranggay`='$baranggay' WHERE baranggayID = '$baranggayID' ";
		mysqli_query($data, $sql);
		header("location:add-brgy.php");
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
            <p><b>Update Barangay</b></p>
        </div>

        <div class="input-wrapper">

            <div class="input">

                <input type="hidden" name="baranggayID" placeholder="baranggayID" id="baranggayID" value="<?php echo $baranggayID; ?>">
            </div>

            <div class="input">
                <p>Barangay</p>
                <input type="text" name="baranggay" placeholder="Barangay" id="name" value="<?php echo $baranggay; ?>" required>
            </div>

        </div>

        <div class="submit">

            <input type="submit" name="update" id="submit" value="Submit">

        </div>
</section>

<!--style-->
<style type="text/css">
.input-wrapper {
    display: grid;
    justify-content: center;
}

.log-in {
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

.log-in p {
    padding: 5px;
}

.text2 {
    display: grid;
    justify-content: center;
    font-size: 25px;
}

.input {

    display: grid;

}

.input p {
    margin-top: 5px;
}

.inputUser {

    display: grid;

}

.inputUser p {
    margin-top: 35px;
}

.input2 {

    display: grid;

}

.input2 p {
    margin-top: 35px;
}

.input3 {

    display: grid;

}

.input3 p {
    margin-top: 35px;
}

.input4 {

    display: grid;

}

.input4 p {
    margin-top: 20px;
}

.submit {
    margin-top: 35px;
    display: grid;
    justify-content: center;
    text-align: center;
}

.btn {
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
    margin-top: -15px;
    color: black;
    border-radius: 10px;
    padding: 10px;

}

select {
    margin-top: -15px;
    padding: 10px;

    outline: 0;
    background-image: none;
    border: 1px solid black;
    border-radius: 10px;
}

</style>
</body>

</html>