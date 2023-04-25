<?php
include ("../head.php")?>
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

<input  class="form-control" type="date" hidden name="date" id="date" readonly value='. $date .' required="true">
</div>



<div class="date">
<label  id="label" for="">Harvest Date Range</label>
<div  id="date">
<div class="form-floating mb-3">
<input size="200" type="date" class="form-control" name="f_date" id="contactno" pattern="[0-9\s+]+" required="true">
<label for="floatingInput" required="true">Harvested from</label>
</div>
<div class="form-floating mb-3">
<input type="date" class="form-control" name="t_date" id="contactno" pattern="[0-9\s+]+" required="true">
<label for="floatingInput" required="true">Harvested to</label>
</div>

</div>


</div>



<div class="no-eggs">
    <label id="label" for="no-eggs">Number of Eggs</label>
    <input  class="form-control" type="number" name="no-eggs" id="no-eggs"  required="true">
</div>



<div class="rej-eggs">
    <label id="label" for="rej-eggs">Reject Eggs</label>
    <input  class="form-control" type="number" name="rej-eggs" id="rej-eggs"  required="true">
</div>



<section class="broiler">
<div class="Bcurrent">
    <label id="label" for="">Initial Chicken Count/Head</label>
    <input  class="form-control" type="number"readonly name="initial" id="Lcurrent"  value='. $init .'  required="true">
</div>

<div class="Bcurrent">
    <label id="label" for="">Previous Headcount of Chicken</label>
    <input  class="form-control" type="number"  readonly value='. $current .' name="crr" id="Lcurrent"  required="true">
</div>

<div class="mortality">
    <label id="label" for="dead">Mortality</label>
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
    <label id="label" for="">Date</label>
    <input  class="form-control" type="date" name="date" id="date" readonly value='. $date .' required="true">
    </div>

<section class="weight">
    <div class="weight">
        <label id="label" for="">Meat in Kg</label>
        <input  class="form-control" type="kilo" name="weight" id="weight"  required="true">
    </div>
</section>

<section class="current">
<div class="Bcurrent">
    <label id="label" for="">Initial Number</label>
    <input  class="form-control" type="number" readonly name="initial" id="Lcurrent"  value='. $init .'  required="true">
</div>

    <div class="current">
        <label id="label" for="">Harvested</label>
        <input  class="form-control" type="number" name="current" id="current" required="true" >
    </div>
    <div class="current">
    <label id="label" for="">Rejected</label>
    <input  class="form-control" type="number" name="reject" id="current" required="true" >
</div>


    <div class="mortality">
        <label id="label" for="dead">Mortality</label>
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
    width:100% !important;
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
#label{
    dispaly:block;
    margin-top:20px;
}

#date{
    display:flex;
    gap:20px;
}
</style>
