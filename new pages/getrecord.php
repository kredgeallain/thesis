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
<form method="post" action="record1.php">

    <div class="form-floating mb-3">
        <input type="text" class="form-control" name="name" id="name" placeholder="Name" required="true">
        <label for="floatingInput">Firstname/ M.I / Lastname </label>
    </div>



    <div class="form-floating mb-3">
        <input type="username" class="form-control" name="username" id="username" placeholder="username"
            required="true">
        <label for="floatingInput">Username</label>
    </div>
    <input type="" name="batchID" value='. $batchID .'/> 

    <div class="submit">

        <button class="btn" type="submit" name="submit" id="submit"> Add User</button>

    </div>

</form>';
}




else {
 
   echo '
    <form method="post" action="record1.php">
    
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="name" placeholder="Na23345e" required="true">
            <label for="floatingInput">wadwdawd </label>
        </div>
    
    
    
        <div class="form-floating mb-3">
            <input type="username" class="form-control" name="username" id="username" placeholder="username"
                required="true">
            <label for="floatingInput">Username</label>
        </div>
        <input type="" name="batchID" value='. $batchID .'/> 
   
    
            <button class="btn" type="submit" name="submit1" id="submit1"> Add User</button>
    

    
    </form>';


}
?> 

