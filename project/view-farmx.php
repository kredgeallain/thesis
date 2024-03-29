<?php
include 'connect.php';

?>

<?php include ("header.php");  ?>

<div class="wrapper">

    <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses"
                viewBox="0 2 20 16">
                <path
                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
            </svg>Farm Details</h2>
    </section>

    <section class="view">



        <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["baranggayID"])){
		header("location:add-brgy.php");
		sleep(2);
		exit; 
	}

}



$baranggayID = $_GET["baranggayID"];

$query = "SELECT baranggay.baranggay, farm.farmname, farm.farmowner,
 farm.contactno, farm.farmID, baranggay.baranggayID
 FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID where baranggay.baranggayID = $baranggayID order by baranggay.baranggay ASC";




if ($result = $conn->query($query)){
		echo "<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' hidden id='count'>Farm ID</th>
				
				<th scope='col' id='farm-name'>Barangay</th>
				<th scope='col' id='farm-name'>Farm Name</th>
				<th scope='col' id='owner'>Farm Owner</th>
				<th scope='col' id='cntct'>Contact No.</th>
				
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_assoc()) {
     
	
   
        	echo"<tr>";
            	echo "<td hidden id=' farmid' >" .$row['farmID']. "</td>";
				echo "<td id=' farmname '>" .$row['baranggay']. "</td>";
            	echo "<td id=' farmname '>" .$row['farmname']. "</td>";
            	echo "<td id=' owner '>" .$row['farmowner']. "</td>";
            	echo "<td id=' cntct '>" .$row['contactno']. "</td>";
                    echo'<td>
                    <div class="viewbatch-button">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                    <a href="view-batchesx.php?farmID='.$row['farmID'].'"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 20 20">
                    <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                    <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                  </svg>View Batch </a>
                 </button>
                 </div>
                    </td>';


                    echo '<td > 


                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editfarm'.$row['farmID'].'">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                </svg>Edit
                </button>


                <div class="modal fade" id="editfarm'.$row['farmID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    <form action="updateqry.php" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Farm</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" readonly hidden value= "'.$baranggayID. '" placeholder="name" name="farmID" required="true">
                    <label for="floatingInput" hidden>User ID</label>
                </div>
                     <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" readonly hidden value= "'.$row['farmID']. '" placeholder="name" name="farmID"  required="true">
                                    <label for="floatingInput" hidden>User ID</label>
                                </div>

                                <div class="form-floating mb-3">
                                    <input type="text" pattern="[a-zA-Z0-9\s]+" class="form-control" id="floatingInput" value= "'.$row['farmname']. '" placeholder="name" name="farmname" required="true">
                                    <label for="floatingInput">Farm Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" pattern="[a-zA-Z0-9\s.]+" class="form-control" id="floatingInput" value= "'.$row['farmowner']. '"placeholder="name" name="farmowner" required="true">
                                    <label for="floatingInput">Farm Owner</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" value="'.$row['contactno']. '" placeholder="name" name="contactno" required="true">
                                    <label for="floatingInput">Contact No.</label>
                                </div>

                            

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button name="edit-farm" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                    </div>
                 
                    </div>
                    </form>
                </div>
                </div>

                    
            </td>';  
			echo"</tr>";
              
		}
	"</table>";


    
?>

    </section>


    <div class="add">
        <div class="add-user-page">
            <a href="add-farm.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 20 20">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>Add Farm</a>
        </div>
    </div>
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
input:invalid {
        animation: shake 0.5s;
        border: 1px solid red !important;
      }

      input:valid{
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
</style>
</body>

</html>