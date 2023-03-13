<?php
session_start();
include '..\project\connect.php'; 


if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}


$sql = "SELECT * FROM user where username='".$username."'";
$data = mysqli_query($data, $sql);
$row=mysqli_fetch_array($data);

$user = $row['userID'];

$user1 = $row['username'];
echo $user;
echo $user1; 

@include('header.php');


if($_SERVER['REQUEST_METHOD'] == 'GET'){


	if(isset($_POST['submit'])){

		$batchID = $_POST['batchID'];
		$date = $_POST['date'];
		$no_eggs = $_POST['no-eggs'];
		$rej_eggs = $_POST['rej-eggs'];
		$Lcurrent = $_POST['Lcurrent'];
		$mortality = $_POST['mortality'];
		
	
	
		$insert = " INSERT INTO `layer`(`batchID`, `userID`,`no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`) 
			VALUES ('', '$batchID','$user', '$no_eggs','$rej_eggs','$Lcurrent','$mortality','$date') ";
	
			
	
			mysqli_query($conn, $insert);
			sleep(1);// }
	}elseif(isset($_POST['submit1'])){
	
	$batchID = $_POST['batchID'];
	$date = $_POST['date'];
	$broiler_weight = $_POST['weight'];
	$Bcurrent = $_POST['current'];
	$mortality = $_POST['mortality'];
	
	$insert = " INSERT INTO `broiler`(`broilerID`, `batchID`, `userID`, `broiler_weight`, `Bcurrent`, `mortality`, `date`) 
	VALUES ('','$batchID','$user','$broiler_weight','$Bcurrent','$mortality','$date')";
		mysqli_query($data, $insert);
		sleep(1);
		
	}

$batchID = $_GET["batchID"];

$b= "SELECT * FROM batch where batchID=$batchID";
$q= mysqli_query ($conn, $b);
$date = date('Y-m-d'); 

$row=mysqli_fetch_array($q);


$init= $row['initial'];




if($row["unit"]=="layer")
{ echo '
<form method="post" action="record1.php" id="form1>

<div class="record-wrapper">
<h1>Layer</h1>


<div class="date">
<label for="">Date</label>
<input  class="form-control" type="date" name="date" id="date"  value="'. $date .'" readonly required="true">
</div>



<div class="no-eggs">
    <label for="no-eggs">Number of Eggs</label>
    <input  class="form-control" type="number" name="no-eggs" id="no-eggs"  required="true">
</div>



<div class="rej-eggs">
    <label for="rej-eggs">Reject Eggs</label>
    <input  class="form-control" type="number" name="rej-eggs" id="rej-eggs"  required="true">
</div>



<section class="broiler">
<div class="mortality">
    <label for="dead">Initial No. of Chicken</label>
    <input  class="form-control" type="number" readonly name="" id="mortality" value='. $init .' required="true">
</div>

<div class="Bcurrent">
    <label for=""> Current</label>
    <input  class="form-control" type="number" name="Lcurrent" id="Lcurrent"  required="true">
</div>

<div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" name="mortality" id="mortality" required="true">
</div>
<div class="mortality">
    <label for="dead">User ID</label>
    <input  class="form-control" type="number" readonly name="userID" id="mortality" value='. $user .' required="true">
</div>
<div class="mortality">
    <label for="dead">Batch ID</label>
    <input  class="form-control" type="number" readonly name="batchID" id="mortality"  value='. $batchID .' required="true">
</div>
</section>


    <div class="submit">
</div>
        <button class="btn btn-primary" type="submit" name="submit" id="submit" value="">Add Data</button>

    </div>

</form>';
}




else {
 
   echo '
    <form method="post" >

<div class="record-wrapper">  

<h1>Broiler</h1>

    <div class="date">
    <label for="">Date</label>
    <input  class="form-control" type="date" name="date" id="date" value="'. $date .'" readonly required="true">
    </div>

<section class="weight">
    <div class="weight">
        <label for="">Meat in Kg</label>
        <input  class="form-control" type="kilo" name="weight" id="weight"  required="true">
    </div>
</section>
<div class="mortality">
    <label for="dead">Initial No. of Chicken</label>
    <input  class="form-control" type="number" readonly name="" id="mortality" value='. $init .' required="true">
</div>

<section class="current">
    <div class="current">
        <label for="">Current</label>
        <input  class="form-control" type="number" name="current" id="current" required="true" >
    </div>

    <div class="mortality">
        <label for="dead">Mortality</label>
        <input  class="form-control" type="number" name="mortality" id="mortality"  required="true">
    </div>
    <div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" readonly name="userID" id="mortality" value='. $user .' required="true">
</div>
<div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" readonly name="batchID" id="mortality"  value='. $batchID .' required="true">
</div>
</section>
   
   

            <button class="btn btn-primary" type="submit" name="submit1" id="submit"> Add Data</button>
    
</div>
    


    </form>';


}


}    

?>

<style type="text/css">
.record-wrapper {
    padding-top: 10px;
    padding-bottom: 10px;
    background-color: #f9faff;
    border-top: 1px solid grey;
    display: grid;
    justify-content: center;
}

.record-wrapper h1 {
    font-weight: bold;
    font-size: 25px;
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    flex-grow: 1;
}

#submit {
    margin-top: 40px;
    background-color: darkblue;
    border: none;
}

#submit:hover {
    background-color: blue;
    border: none;
}

label {
    dispaly: block;
    margin-top: 20px;
}
</style>