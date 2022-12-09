<?php include('connect.php');?>

<?php

$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);

?>

<?php include ("header.php");  ?>

    <section class="view-user">
        <h2>Users</h2>
    </section>

    <section class="view">

        <?php
    
$query = "SELECT * FROM user";




if ($result = $mysqli->query($query)){
		echo "<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' id='count'>UserID</th>
				<th scope='col' id='name'>Name</th>
				<th scope='col' id='u-name'>Username</th>
				<th scope='col' id='pos'>Position</th>
				<th scope='col' id='cntct'>Contact No</th>
				<th scope='col' id='edit'> Edit </th>
				<th scope='col' id='delete'> Delete </th>
				
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_assoc()) {
            $userID = $row["userID"];
            $name = $row["name"];
            $username = $row["username"];
            $position = $row["position"];       
            $mobile_no = $row["mobile_no"];
	
   
        	echo"<tr>";
            	echo "<td >" .$row['userID']. "</td>";
            	echo "<td id='name'>" .$row['name']. "</td>";
            	echo "<td id='u-name'>" .$row['username']. "</td>";
            	echo "<td id='pos'>" .$row['position']. "</td>";
	        	echo "<td id='cntct'>" .$row['mobile_no']. "</td>";				
            	echo '<td > 
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                           <a href= "update.php?userID='.$row['userID'].'"> Edit </a>
                        </button>
                        
                </td>';      
                    
				
				echo '
					<td>
						<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal'.$row["userID"].'">
							Delete
						</button>

						<!-- Modal -->
						<form action="view-user.php" method="GET">
							<div class="modal fade" id="deleteModal'.$row["userID"].'" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
									<div class="modal-header">
										<h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
                                        <center> Are you sure you want to delete the user with this id?? </center>										
									</div>									
                                        <center> <p> '.$row["userID"].' </p> </center>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"> Cancel </button>
										<button type="submit" class="btn btn-primary"> <a href="delete.php?id='.$row["userID"].'"> Yes </a> </button>
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

    <!--style-->

        <style type="text/css">

        .view {
            padding: 10px;
            border: 1px solid #0e2a83;
            margin: 20px;
        }

        .view-user {
            display: flex;
            margin: 20px 10px 5px 20px;
            justify-content: center;
        }

        .view-user h2 {
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