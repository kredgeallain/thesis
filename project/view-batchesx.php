<?php
include 'connect.php';

$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>

<?php include ("header.php");  ?>

<div class="wrapper">

    <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses"
                viewBox="0 2 20 16">
                <path
                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
            </svg>Batch Details</h2>
    </section>

    <section class="view">




        <!-- Display the HTML form -->



        <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["farmID"])){
		header("location:add-brgy.php");
		sleep(2);
		exit; 
	}
	$farmID = $_GET["farmID"];

    $date = date('Y-m-d'); 

$query = "SELECT * FROM batch where farmID=$farmID order by batch.date DESC";




if ($result = $conn->query($query)){
    
    echo "<table class='table table-striped'>
    <thead>	  
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
                </td>
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
                    <input type="date" class="form-control" id="date" value="'.$row['date'].'" name="date"
                        aria-describedby="emailHelp" required="true">
            
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="batch" value="'.$row['batch'].'" name="batch"
                            placeholder="Batch Name"  pattern="[a-zA-Z0-9]+" required="true">
                        <label for="floatingInput">Batch Name</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="batch" value="'.$row['unit'].'" hidden name="unit"
                        placeholder="Batch Name"  pattern="[a-zA-Z0-9]+" required="true">
                    
                </div>
                    <input type=""  name="farmID" hidden value='. $farmID .' required="true"> 
                    <input type=""  name="batchID" hidden value="'.$row['batchID'].'" required="true"> 
                
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="intial" value="'.$row['initial'].'" name="initial"
                            placeholder="Initial Number" required="true">
                        <label for="floatingInput">Initial Number</label>
                    </div>
                </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-primary" type="submit" name="edit-batch" id="submit" value="">Save</button>
                    </div>
                </div>
                    </div>
                    </form>
                </div>
                </div>
            

    
                </form>';      
        
			echo"</tr>";
            
		}
	"</table>";


    }
?>

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
        <input type="date" class="form-control" id="date" value=<?php echo $date;?> readonly name="date"
            aria-describedby="emailHelp" required="true">

        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="batch" name="batch" pattern="[a-zA-Z0-9]+"
                placeholder="Batch Name" required="true">
            <label for="floatingInput">Batch Name</label>
        </div>
        <input type="" hidden name="farmID" value=<?php echo $farmID;?> required> 
        <select class="form-select form-select-sm" name="unit"
            aria-label="form-select-sm example">
            <option value="broiler">Broiler</option>
            <option value="layer">Layer</option>
        </select>
        <div class="form-floating mb-3">
            <input type="number" class="form-control" id="intial" name="initial"
                placeholder="Initial Number" required>
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
    </form>
  </div>

    
<!--style-->

<style type="text/css">
.wrapper {
    margin-top: 10px;
}

.view {
    padding: 10px;
    margin: 10px;
}


.view-user {
    display: flex;
    margin-top: 10px;
    justify-content: center;
}

.view-user h2 {
    font-size: 30px;
    font-weight: bold;
}

.add {

    display: flex;
    justify-content: flex-end;
}

.add-user-page {
    background-color: darkblue;
    padding: 10px 25px 10px 25px;
    margin-bottom: 30px;
    margin-right: 80px;
    border-radius: 5px;
}

.add-user-page a {
    text-decoration: none;
    color: white;
}

.add-user-page:hover {
    margin-right: 80px;
    background-color: blue;
    color: white;
}

.add-user-page a:hover {
    color: white;
}

tr td button a {
    text-decoration: none;
    color: white;
}

a:hover {
    color: white;

}

tr:hover {
    background-color: #b0b4b2;
}

.delete-button button {
    border: none;
    background-color: red;
}

.delete-button button:hover {
    border: none;
    background-color: darkred;
    color: white;
}

.addbatch-button{
    margin-right:200px;
    display:flex;
    justify-content:flex-end;
}

.addbatch-button button {
    border: none;
    background-color: darkgreen;

}

.addbatch-button button:hover {
    border: none;
    background-color: green;
    color: white;
}

#delete-yes {
    padding-left: 20px;
    padding-right: 20px;
    text-decoration: none;
}

#delete-btn {
    padding-left: 0;
    padding-right: 0;
}

.viewbatch-button button {
    background-color: limegreen;
    border: none;
}

.viewbatch-button button:hover {
    background-color: yellowgreen;
    border: none;
}

a {
    text-decoration: none !important;
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
</body>

</html>