<?php
session_start();
include '..\project\connect.php'; 

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}


$sql = "SELECT * FROM user where username='".$username."'";
$data = mysqli_query($data, $sql);
$row=mysqli_fetch_array($data);

$userID = $row['userID'];



$batchID= $_POST['batch_data'];


$b= "SELECT * FROM batch where batchID=$batchID";
$q= mysqli_query ($conn, $b);
$date = date('Y-m-d'); 

$row=mysqli_fetch_array($q);

$init= $row['initial'];

?>

<?php

if($row["unit"]=="layer")
{ 
    
?> 
<form method="post" action="record1.php" id="form1">

<div class="record-wrapper">
<h1>Layer</h1>


<div class="date">
<label for="">Date</label>
<input  class="form-control" type="date" name="date" id="date"  value=<?php echo $date ?>  required="true">
</div>



<div class="no-eggs">
    <label for="no-eggs">Number of Eggs</label>
    <input  class="form-control" type="number" name="no-eggs" id="no-eggs"  required="true">
</div>



<div class="rej-eggs">
    <label for="rej-eggs">Reject Eggs</label>
    <input  class="form-control" type="number" name="rej-eggs" id="rej-eggs"  required="true">
</div>

<div class="mortality">
    <label for="dead">Initial No. of Chicken</label>
    <input  class="form-control" type="number" readonly name="" id="mortality" value=<?php echo $init ?> required="true">
</div>

<section class="broiler">

<div class="Bcurrent">
    <label for=""> Current</label>
    <input  class="form-control" type="number" name="Lcurrent" id="Lcurrent"  required="true">
</div>

<div class="mortality">
    <label for="dead">Mortality</label>
    <input  class="form-control" type="number" name="mortality" id="mortality" required="true">
</div>

<div class="mortality">
<div class="mortality">
    <label for="dead" hidden >User ID</label>
    <input  class="form-control" type="number" hidden readonly name="userID" id="mortality" value=<?php echo $userID ?> required="true">
</div>
<div class="mortality">
    <label for="dead" hidden Batch ID</label>
    <input  class="form-control" type="number" hidden readonly name="batchID" id="mortality"  value=<?php echo $batchID ?> required="true">
</div>
</section>

    <div class="submit">
</div>
        <button class="btn btn-primary" type="submit" name="submit" id="submit" value="">Add Data</button>

    </div>

</form>';


<?php

} else {

?>
 
    <form method="post" action="record1.php" id="form2">

<div class="record-wrapper">  

<h1>Broiler</h1>

    <div class="date">
    <label for="">Date</label>
    <input  class="form-control" type="date" name="date" id="date" value=<?php echo $date ?> readonly required="true">
    </div>

<section class="weight">
    <div class="weight">
        <label for="">Meat in Kg</label>
        <input  class="form-control" type="kilo" name="weight" id="weight"  required="true">
    </div>
</section>
<div class="mortality">
    <label for="dead">Initial No. of Chicken</label>
    <input  class="form-control" type="number" readonly name="" id="mortality" value="<?php echo $init; ?>" required="true">
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
    <label for="dead" hidden >User ID</label>
    <input  class="form-control" type="number" hidden readonly name="userID" id="mortality" value="<?php echo $userID; ?>" required="true">
</div>
<div class="mortality">
    <label for="dead" hidden >Batch ID</label>
    <input  class="form-control" type="number" hidden readonly name="batchID" id="mortality"  value="<?php echo $batchID; ?>" required="true">
</div>
</section>
    
   

            <button class="btn btn-primary" type="submit" name="submit1" id="submit"> Add Data</button>
    
</div>
    


    </form>
<?php

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