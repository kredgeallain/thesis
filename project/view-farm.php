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
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-houses" viewBox="0 0 20 20">
  <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z"/>
</svg>Farm Details</h2>
    </section>

    <section class="view">


<?php
    
$query = "SELECT * FROM farm";




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
                   <a href= "update-farm.php?farmID='.$row['farmID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 20 20">
                   <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                   <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                 </svg> Add Batch </a>
                </button>
                
                 </td>';
	        	echo '<td > 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                           <a href= "update-farm.php?farmID='.$row['farmID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                           <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                           <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                         </svg>  Edit </a>
                        </button>
                        
                </td>';      
                    
				
				echo '
					<td>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["farmID"].'">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 20 20">
                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                      </svg>Delete
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
            <a href="add-user.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 20 20">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Add Farm</a>
        </div>
    </div>
    </div>
    <!--style-->

           <style type="text/css">

        .wrapper{
            margin-top:10px;
            border:1px solid grey;
        }

        .view {
            padding: 10px;
            margin: 20px;
        }


        .view-user {
            display: flex;
            margin-top:10px;
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
            background-color:darkblue;
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
            background-color:blue;
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

        </style>
</body>

</html>