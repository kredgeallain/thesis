<?php
//session_start();


include '..\project\connect.php'; 

$batchID= $_POST['batch_data'];

//echo $batchID;

$b= "SELECT * FROM batch where batchID=$batchID";
$q= mysqli_query ($conn, $b);

$row=mysqli_fetch_array($q);



if($row["unit"]=="layer")
{ echo '
<form method="post" action="record1.php" id="form1">

<div class="record-wrapper">
<h1>Layer</h1>

<div class="input-group input-group-lg">
<div class="date">
<label for="">Date</label>
<input  class="form-control" type="date" name="date" id="date" required="true">
</div>
</div>

<div class="input-group input-group-lg">
<section class="layer">
<div class="no-eggs">
    <label for="no-eggs">Number of Eggs</label>
    <input  class="form-control" type="number" name="no-eggs" id="no-eggs"  required="true">
</div>
</div>

<div class="input-group input-group-lg">
<div class="rej-eggs">
    <label for="rej-eggs">Reject Eggs</label>
    <input  class="form-control" type="number" name="rej-eggs" id="rej-eggs"  required="true">
</div>
</div>
</section>

<section class="broiler">

<div class="Bcurrent">
    <label for=""> Current: </label>
    <input  class="form-control" type="number" name="Lcurrent" id="Lcurrent"  required="true">
</div>

<div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" name="mortality" id="mortality" required="true">
</div>
</section>
    <input type="" hidden name="batchID" value='. $batchID .'> 

    <div class="submit">
</div>
        <button class="btn btn-primary" type="submit" name="submit" id="submit" value="">Add Data</button>

    </div>

</form>';
}




else {
 
   echo '
    <form method="post" action="record1.php" id="form2">

<div class="record-wrapper">  

<h1>Broiler</h1>

    <div class="date">
    <label for="">Date</label>
    <input  class="form-control" type="date" name="date" id="date" required="true">
    </div>

<section class="weight">
    <div class="weight">
        <label for="">Meat in Kg</label>
        <input  class="form-control" type="kilo" name="weight" id="weight"  required="true">
    </div>
</section>

<section class="current">
    <div class="current">
        <label for="">Current</label>
        <input  class="form-control" type="number" name="current" id="current" required="true" >
    </div>

    <div class="mortality">
        <label for="dead">Mortality</label>
        <input  class="form-control" type="number" name="mortality" id="mortality"  required="true">
    </div>
</section>
        <input type="" hidden name="batchID" value='. $batchID .'> 
   

            <button class="btn btn-primary" type="submit" name="submit1" id="submit"> Add Data</button>
    
</div>
    


    </form>';


}

?> 

<style type="text/css">
.record-wrapper{
    padding-top:10px;
    padding-bottom:10px;
    background-color: #f9faff;
    border-top: 1px solid grey;
    display:grid;
    justify-content:center;
}

input{
    flex-grow:1;
}

#submit{
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
