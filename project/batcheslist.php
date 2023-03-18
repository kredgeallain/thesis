
<?php
include_once '..\project\connect.php'; 

$farmID= $_POST['farm_data'];

$batch= "SELECT * FROM batch WHERE farmID = $farmID ";


if ($result = $data->query($batch)){
  echo ' 
  <form method="post" action="updateqry.php" id="form1" rel="nofollow">
  
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                placeholder="Batch Name" required="true">
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
  </div>';

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
        
        
        

        }
        "</table>";

        

?>


 