<?php
include_once '..\project\connect.php'; 

$farmID= $_POST['farm_data'];

$batch= "SELECT * FROM batch WHERE farmID = $farmID order by batch.date DESC ";


if ($result = $data->query($batch)){
  echo ' 
  <form method="post" action="updateqry.php" id="form1" rel="nofollow">
  
  <button id="add-btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Add Batch
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Batch</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <div class="card card-body">
        <input type="date" class="form-control" id="date" name="date"
            aria-describedby="emailHelp" required="true">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="batch" name="batch"
                placeholder="Batch Name" required="true" pattern="[a-zA-Z0-9]+">
            <label for="floatingInput">Batch Name</label>
        </div>
        <input type="" hidden name="farmID" value='. $farmID .' required="true"> 
        <select class="form-select form-select-sm" name="unit"
            aria-label=".form-select-sm example required="true"">
            <option value="layer">Layer</option>
            <option value="broiler">Broiler</option>
        </select>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="intial" name="initial"
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
  </form>';

    echo "<table class='table table-striped'>
        <thead class='thead-dark'>	  
        <tr>
            
            <th scope='col' hidden id='count'>BaranggayID</th>
            <th scope='col' id='name'>Batch</th>
            <th scope='col' id='name'>Unit</th>
            <th scope='col' id='name'>Chicken Initial No.</th>
            <th scope='col' id='name'>Date Started</th>
            
        </tr>	  
        </thead>";
    }

    while ($row = $result->fetch_assoc()) {




        echo"<tr>";
            echo "<td hidden >" .$row['batchID']. "</td>";
            echo "<td id='name'>" .$row['batch']. "</td>";
            echo "<td id='name'>" .$row['unit']. "</td>";
            echo "<td id='name'>" .$row['initial']. "</td>";
            echo "<td id='name'>" .$row['date']. "</td>";

            echo '<td > 
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edituser'.$row['batchID'].'">
                                        Edit
                                    </button>
               
                
                <div class="modal fade" id="edituser'.$row['batchID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                <form action="updateqry.php" method="POST" id="form1" >
                    <div class="modal-content">
                    
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
                            placeholder="Batch Name" required="true" pattern="[a-zA-Z0-9]+">
                        <label for="floatingInput">Batch Name</label>
                    </div>
                    <input type=""  name="farmID" hidden value='. $farmID .' required="true"> 
                    <input type=""  name="batchID" hidden value="'.$row['batchID'].'" required="true"> 
                    <input type=""  name="unit" hidden value="'.$row['unit'].'" required="true">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="intial" value="'.$row['initial'].'" name="initial"
                            placeholder="Initial Number" required="true">
                        <label for="floatingInput">Initial Number</label>
                    </div>
                </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Close</button>


                    <buttonname="edit-batch" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                   
                    </div>
                  </div>
                    </div>
                    </form>
                </div>
                
                </div>
                </td>

                </form>';      
        
        
        

        }
        "</table>";

        

?>

<style>
  #add-btn{
    background-color:darkblue;
    border:none;
  }
    #batch:invalid {
        animation: shake 0.5s !important;
        border: 1px solid red !important;
      }

#batch:valid{
        border:1px solid green !important;
      }
      
      @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-10px); }
        100% { transform: translateX(0); }
      }
</style>