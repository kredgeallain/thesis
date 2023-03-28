<?php

session_start();
include 'connect.php'; 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
$sql = "SELECT * FROM user where username='".$username."'";
$data = mysqli_query($data, $sql);
$row=mysqli_fetch_array($data);

$userID = $row['userID'];

$batchID= $_POST['batch_data'];

//echo $batchID;

$b= "SELECT * FROM batch where batchID=$batchID";
$q= mysqli_query ($conn, $b);
$date = date('Y-m-d'); 

$row2=mysqli_fetch_array($q);

$init= $row2['initial'];



if($row2["unit"]=="layer")
{ 

    $sql ="SELECT SUM(layer.mortality) as mortality,batch.initial FROM batch 
    INNER JOIN layer ON batch.batchID = layer.batchID  where batch.batchID=$batchID";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();

   $mortality = $row['mortality'];
   $initial = $row['initial'];

   $current = $initial-$mortality;
    
    
    
    
    echo '
<form method="post" action="record-home.php" id="form1">

<div class="record-wrapper">
<h1>Layer</h1>


<div class="date">
<label for="">Date</label>
<input  class="form-control" type="date" name="date" id="date" readonly value='. $date .' required="true">
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
<div class="Bcurrent">
    <label for="">Initial Number</label>
    <input  class="form-control" type="number"readonly name="Lcurrent" id="Lcurrent"  value='. $init .'  required="true">
</div>

<div class="Bcurrent">
    <label for=""> Current</label>
    <input  class="form-control" type="number"  readonly value='. $current .' name="" id="Lcurrent"  required="true">
</div>

<div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" name="mortality" id="mortality" required="true">
</div>
</section>
    <input type="" hidden name="batchID" value='. $batchID .'> 
    <input type="" hidden name="userID" value='. $userID .'> 
    <div class="submit">
</div>
        <button class="btn btn-primary" type="submit" name="submit" id="submit" value="">Add Data</button>

    </div>

</form>';
}




else {
    
 
   echo '
    <form method="post" action="record-home.php" id="form2">

<div class="record-wrapper">  

<h1>Broiler</h1>

    <div class="date">
    <label for="">Date</label>
    <input  class="form-control" type="date" name="date" id="date" readonly value='. $date .' required="true">
    </div>

<section class="weight">
    <div class="weight">
        <label for="">Meat in Kg</label>
        <input  class="form-control" type="kilo" name="weight" id="weight"  required="true">
    </div>
</section>

<section class="current">
<div class="Bcurrent">
    <label for="">Initial Number</label>
    <input  class="form-control" type="number" readonly name="Lcurrent" id="Lcurrent"  value='. $init .'  required="true">
</div>

    <div class="current">
        <label for="">Harvested</label>
        <input  class="form-control" type="number" name="current" id="current" required="true" >
    </div>
    <div class="current">
    <label for="">Rejected</label>
    <input  class="form-control" type="number" name="reject" id="current" required="true" >
</div>


    <div class="mortality">
        <label for="dead">Mortality</label>
        <input  class="form-control" type="number" name="mortality" id="mortality"  required="true">
    </div>
</section>
        <input type="" hidden name="batchID" value='. $batchID .'> 
        <input type="" hidden name="userID" value='. $userID .'> 
   

            <button class="btn btn-primary" type="submit" name="submit1" id="submit"> Add Data</button>
    
</div>
    


    </form>';


}

?> 
<style type="text/css">
.record-wrapper{
    z-index: 999;
    padding-top:10px;
    padding-bottom:10px;
    background-color: #f9faff;
    border-top: 1px solid grey;
    display:grid;
    justify-content:center;
}

.record-wrapper h1{
    font-weight:bold;
    font-size:25px;
    display:flex;
    justify-content:center;
    align-items:center;
}

input{
    flex-grow:1;
}

#submit{
    margin-top:40px;
    background-color:darkblue;
    border:none;
}

#submit:hover{
    background-color:blue;
    border:none;
}
label{
    dispaly:block;
    margin-top:20px;
}
</style>
