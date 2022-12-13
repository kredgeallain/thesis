<?php
//session_start();


include '..\project\connect.php'; 

$batchID= $_POST['batch_data'];

echo $batchID;

$b= "SELECT * FROM batch where batchID=$batchID";
$q= mysqli_query ($conn, $b);

$row=mysqli_fetch_array($q);



if($row["unit"]=="layer")
{ echo '
<form method="post" action="record1.php" id="form1">

<div class="date">

<label for=""> Date: </label>
<input type="date" name="date" id="date">

</div>

<section class="layer">
<div class="no-eggs">
    <label for="no-eggs"> Number of Eggs: </label>
    <input type="number" name="no-eggs" id="no-eggs">
</div>

<div class="rej-eggs">
    <label for="rej-eggs"> Reject Eggs: </label>
    <input type="number" name="rej-eggs" id="rej-eggs">
</div>
</section>

<section class="broiler">
<div class="Bcurrent">
    <label for=""> Current: </label>
    <input type="number" name="Lcurrent" id="Lcurrent">
</div>

<div class="mortality">
    <label for="dead"> Mortality: </label>
    <input type="number" name="mortality" id="mortality">
</div>
</section>
    <input type="" name="batchID" value='. $batchID .'> 

    <div class="submit">
        
        <button class="btn" type="submit" name="submit" id="submit" value=""> Add Data </button>

    </div>

</form>';
}




else {
 
   echo '
    <form method="post" action="record1.php" id="form2">
    
    <div class="date">
    <label for=""> Date: </label>
    <input type="date" name="date" id="date">
</div>

<section class="weight">
    <div class="weight">
        <label for=""> Meat in Kg: </label>
        <input type="kilo" name="weight" id="weight">
    </div>
</section>

<section class="current">
    <div class="current">
        <label for=""> Current: </label>
        <input type="number" name="current" id="current">
    </div>

    <div class="mortality">
        <label for="dead"> Mortality: </label>
        <input type="number" name="mortality" id="mortality">
    </div>
</section>
        <input type="" name="batchID" value='. $batchID .'> 
   
    
            <button class="btn" type="submit" name="submit1" id="submit1"> Add Data</button>
    

    
    </form>';


}
?> 

