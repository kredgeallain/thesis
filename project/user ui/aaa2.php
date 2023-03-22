<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
  Add Batch
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form method="post" action="updateqry.php" id="form1" rel="nofollow">
        <div class="modal-header">
          <h5 class="modal-title" id="add">Add Batch</h5>
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
  </div>
  </form>
