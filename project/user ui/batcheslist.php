
<?php
include_once 'connect.php'; 

$date = date('Y-m-d'); 

$farmID= $_POST['farm_data'];



$batch= "SELECT * FROM batch WHERE farmID = $farmID order by batch.date DESC ";


if ($result = $data->query($batch)){

  echo ' 
  <form action="updateqry.php" method="POST" id="form1" >
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add">
  Add Batch
</button>


<div class="modal fade" id="add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
  
  <div class="modal-header">
      <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Batch</h1>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  </div>
  <div class="modal-body">
  <div class="card card-body">
  <input type="date" class="form-control" id="date" readonly value="'.$date.'" name="date"
      aria-describedby="emailHelp" required="true">

  <div class="form-floating mb-2">
      <input type="text" class="form-control" id="batch" value="" name="batch"
          placeholder="Batch Name" required="true">
      <label for="floatingInput">Batch Name</label>
  </div>
  <input type="" hidden name="farmID" value='. $farmID .' required="true">  
  <div class="form-floating mb-1">
  <select class="form-select form-select-sm mb-2" name="unit"
  aria-label=".form-select-sm example required="true"">
  <option value="layer">Layer</option>
  <option value="broiler">Broiler</option>
</select>
</div>

  <div class="form-floating mb-3">
      <input type="number" class="form-control" id="intial" value="" name="initial"
          placeholder="Initial Number" required="true">
      <label for="floatingInput">Initial Number</label>
  </div>
</div>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    <button class="btn btn-primary" type="submit" name="add-batch" id="submit" value="">Add Batch</button>
  </div>
</div>
  </div>

</div>

</div>

</form>';      


    echo "
    <div  class='table-responsive'>
    <table class='table table-striped' id='table'>
        <thead class='thead-dark'>	  
        <tr>
            
            <th scope='col' hidden id='count'>BaranggayID</th>
            <th scope='col' id='name'>Batch </th>
            <th scope='col' id='name'>Unit</th>
            <th scope='col' id='name'>Initial Chicken Count/Head </th>
            <th scope='col' id='name'>Status</th>
            <th scope='col' id='name'>Date Started</th>
            
        </tr>	  
        </thead>";
    }

    while ($row = $result->fetch_assoc()) {
        $status= $row["status"];

        if ($row["status"] == "on") {
           $stat="Ongoing";
        }

        if ($row["status"] == "off") {
            $stat="Ended";
        }


        echo"<tr>";
            echo "<td hidden >" .$row['batchID']. "</td>";
            echo "<td id='name'>" .$row['batch']. "</td>";
            echo "<td id='name'>" .$row['unit']. "</td>";
            echo "<td id='name'>" .$row['initial']. "</td>";
            echo "<td id='name'>" .$stat. "</td>";
            echo "<td id='name'>" .$row['date']. "</td>";

            echo '<td > 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edituser'.$row['batchID'].'">
                                        Edit
                                    </button>
 

                        

                                    <div class="modal fade" id="edituser'.$row['batchID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                    <form action="updateqry.php" method="POST" id="form1" >
                                        <div class="modal-content" id="modal-content">
                                        
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Batch</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="card card-body">
                                        <input type="date" class="form-control" id="date" readonly value="'.$row['date'].'" name="date"
                                            aria-describedby="emailHelp" required="true">
                                
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="batch" value="'.$row['batch'].'" name="batch"
                                                placeholder="Batch Name" required="true">
                                            <label for="floatingInput">Batch Name</label>
                                        </div>
                                        <input type=""  name="farmID" hidden value='. $farmID .' required="true"> 
                                        <input type=""  name="batchID" hidden value="'.$row['batchID'].'" required="true"> 
                                        <input type=""  name="unit" hidden readonly  value= '.$row['unit'].' required="true">
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="intial" value="'.$row['initial'].'" name="initial"
                                                placeholder="Initial Number" required="true">
                                            <label for="floatingInput">Initial Number</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                        <select id="select" class="form-select" aria-label="Default select example"  required="true" name="status">
                                                    <option disabled selected >Status</option>
                                                    <option value="on"' . ($status == 'on' ? ' selected' : '') . '>Ongoing</option>
                                                    <option value="off"' . ($status == 'off' ? ' selected' : '') . '>Ended</option>
                                      </select>
                                      </div>
                                    </div>
                                        </div>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                                          <button class="btn btn-primary" type="submit" name="edit-batch" id="submit" >Save</button>
                                        </div>
                                      </div>
                                        </div>
                                        </form>
                                    </div>
                                    
                                    </div>                             
                        </td>


                </form>';      
        
        
        

        }
        "</table></div>";

        

?>
<style>

    th{
        font-size:12px !important;
    }
    #modal-content{
        width:500px !important;
    }
      
    @media screen and (max-width: 800px){
        #table{
            width:100% !important;
            max-width:100px !important;
        }

}

</style>