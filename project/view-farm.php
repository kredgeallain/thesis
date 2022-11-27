<?php
include 'connect.php';

$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>

<?php include ("header.php");  ?>

	<section class="view-farm">
        <h2> Farm Details</h2>
    </section>

    <section class="view">


<?php
    
$query = "SELECT * FROM farm";

echo "<b> <center> Farm Details </center> </b> <br> <br>";


if ($result = $mysqli->query($query)){
		echo "<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' id='count'>Farm ID</th>
				
				
				<th scope='col' id='farm-name'>Name</th>
				<th scope='col' id='owner'>Owner</th>
				<th scope='col' id='cntct'>Contact No.</th>
                <th scope='col' id='edit'>Add Batch</th>
				<th scope='col' id='delete'>Edit</th>
                <th scope='col' id='batch'>Delete</th>
				
				
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_assoc()) {
            $farmID = $row["farmID"];
			
            $farmname = $row["farmname"];
            $farmowner = $row["farmowner"];
            $contactno = $row["contactno"];       
           
	
   
        	echo"<tr>";
            	echo "<td id=' farmid' >" .$row['farmID']. "</td>";
				
            	echo "<td id=' farmname '>" .$row['farmname']. "</td>";
            	echo "<td id=' owner '>" .$row['farmowner']. "</td>";
            	echo "<td id=' cntct '>" .$row['contactno']. "</td>";
                echo '<td > 
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                   <a href= "update-farm.php?farmID='.$row['farmID'].'"> Add Batch </a>
                </button>
                
                 </td>';
	        	echo '<td > 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                           <a href= "update-farm.php?farmID='.$row['farmID'].'"> Edit </a>
                        </button>
                        
                </td>';      
                    
				
				echo '
					<td>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["farmID"].'">
							Delete
						</button>

						<!-- Modal -->
						<form action="view-user.php" method="GET">
							<div class="modal fade" id="deleteModal'.$row["farmID"].'" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
                                        <center> Are you sure you want to delete the farm with this id?? </center>										
									</div>									
                                        <center> <p> '.$row["farmID"].' </p> </center>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel </button>
										<button type="submit" class="btn btn-primary"> <a href="delete-farm.php?id='.$row["farmID"].'"> Yes </a> </button>
									</div>
									</div>
								</div>
							</div>
						</form>
					</td>';
			echo"</tr>";
              
		}
	"</table>";

?>

    </section>


    <div class="add">
        <div class="add-user-page">
            <a href="add-user.php">Add User</a>
        </div>
    </div>

           <style type="text/css">
        .view {
            padding: 10px;
            border: 1px solid #0e2a83;
            margin: 20px;
        }

        .view-farm {
            display: flex;
            margin: 20px 10px 5px 20px;
            justify-content: center;
        }

        .view-farm h2 {
            font-size: 40px;
            font-weight: bold;
        }

        .add {

            display: flex;
            justify-content: flex-end;
        }

        .add-user-page {
            background-color: #0d6efd;
            padding: 10px 40px 10px 40px;
            margin-top: 30px;
            margin-right: 100px;
            border-radius: 5px;
        }

        .add-user-page a {
            text-decoration: none;
            color: white;
        }

        .add-user-page a:hover {
            color: #00cc00;
        }

        tr td button a {
            text-decoration: none;
            color: white;
        }

        a:hover {
            color: red;

        }

        tr:hover {
            background-color: #2596be;
        }
        </style>
</body>

</html>