<?php include('connect.php');?>



<?php include ("header.php");  ?>

<section class="wrapper">

    <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
                class="bi bi-person-workspace" viewBox="0 2 20 16">
                <path d="M4 16s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H4Zm4-5.95a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                <path
                    d="M2 1a2 2 0 0 0-2 2v9.5A1.5 1.5 0 0 0 1.5 14h.653a5.373 5.373 0 0 1 1.066-2H1V3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v9h-2.219c.554.654.89 1.373 1.066 2h.653a1.5 1.5 0 0 0 1.5-1.5V3a2 2 0 0 0-2-2H2Z" />
            </svg>Users</h2>
    </section>

    <section class="view">

        <?php
    

  $pos = "agent";

if(isset($_POST['search'])) {
   

    $search = mysqli_real_escape_string($conn, $_POST['search']);
 
    $sql = "SELECT * FROM user where user.username LIKE '%$search%' OR user.name LIKE '%$search%'  ORDER BY user.name ASC";
} else {
    $sql = "SELECT * FROM user order by user.name ASC";
    
}


if ($result = $conn->query($sql)){
		echo "<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' hidden id='count'>UserID</th>
				<th scope='col' id='name'>Name</th>
				<th scope='col' id='u-name'>Username</th>
                <th scope='col' id='brgy'>Address</th>
				<th scope='col' id='pos'>Position</th>
                <th scope='col' id='cntct'>Contact No</th>
                <th scope='col' id='delete'> Status </th>
               
				
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_array()) {
	
   
        	echo"<tr>";
            	echo "<td hidden >" .$row['userID']. "</td>";
            	echo "<td id='name'>" .$row['name']. "</td>";
            	echo "<td id='u-name'>" .$row['username']. "</td>";
                echo "<td id='brgy'>" .$row['baranggay']. "</td>";
            	echo "<td id='pos'>" .$row['position']. "</td>";
                
	        	echo "<td id='cntct'>" .$row['mobile_no']. "</td>";	
                echo "<td id='pos'>" .$row['status']. "</td>";			
            	echo '<td > 


                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edituser'.$row['userID'].'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>Edit
                                    </button>


                                    <div class="modal fade" id="edituser'.$row['userID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <form action="updateqry.php" method="POST">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" readonly hidden value= "'.$row['userID']. '" placeholder="name" name="userID" required="true">
                                                        <label for="floatingInput" hidden>User ID</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" pattern="[a-zA-Z0-9\s.]+" id="floatingInput" value= "'.$row['name']. '" placeholder="name" name="name" required="true">
                                                        <label for="floatingInput">Name</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" pattern="[a-zA-Z0-9\s]+" id="floatingInput" value= "'.$row['username']. '"placeholder="name" name="username" required="true">
                                                        <label for="floatingInput">Username</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" pattern="[a-zA-Z0-9\s]+" id="floatingInput" value= "'.$row['baranggay']. '"placeholder="name" name="baranggay" required="true">
                                                        <label for="floatingInput">Address</label>
                                                    </div>
                                            
                                                    <select id="select" class="form-select" aria-label="Default select example" name="position" required="true">
                                                    <option disabled selected>Select Position</option>
                                                    <option value="admin" selected>Administrator</option>
                                                    <option value="agent">Agent</option>
                                                    </select>

                                                    <select id="select" class="form-select" aria-label="Default select example"  required="true" name="status">
                                                    <option disabled selected >Status</option>
                                                    <option value="on" selected>Enable</option>
                                                    <option value="off">Disable</option>
                                                    </select>

                                                    <div class="form-floating mb-3">    
                                                        <input type="number" name="no" class="form-control" id="floatingInput" placeholder="name" required="true" value= '.$row['mobile_no'].' ">
                                                        <label for="floatingInput">Contact Number</label>
                                                    </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button name="edit-user" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                                        </div>
                                    
                                        </div>
                                        </form>
                                    </div>
                                    </div>

                        
                </td>     

                <td > 


                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#changepass'.$row['userID'].'">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-unlock" viewBox="0 0 20 20">
                                    <path d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2zM3 8a1 1 0 0 0-1 1v5a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V9a1 1 0 0 0-1-1H3z"/>
                                </svg>Change Password
                                    </button>


                                    <div class="modal fade" id="changepass'.$row['userID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                        <form action="updateqry.php" method="POST">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                         <div class="form-floating mb-3">
                                                        <input type="text" class="form-control" id="floatingInput" readonly hidden value= "'.$row['userID']. '" placeholder="name" name="userID" required="true">
                                                        <label for="floatingInput" hidden>User ID</label>
                                                    </div>

                                                    <div class="form-floating mb-3">
                                                        <input type="password" class="form-control" id="floatingInput" placeholder="name" name="npass" required="true">
                                                        <label for="floatingInput">New Password</label>
                                                    </div>
                                                    <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" id="floatingInput" placeholder="name" name="rpass" required="true">
                                                    <label for="floatingInput">Confirm Password</label>
                                                </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button name="change" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
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

        <form action="" method="post">
            <input id="search" type="text" name="search" placeholder="Search...">
            <input type="submit" id="search" value="search">
        </form>

        <div class="add">

            <div class="add-user-page">
                <a href="add-user.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                        fill="currentColor" class="bi bi-person-plus" viewBox="0 0 20 20">
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                        <path fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>Add User</a>
            </div>
        </div>

    </section>
    <!--style-->

    <style type="text/css">
    .wrapper {
        margin-top: 10px;
    }

    .view {
        padding-top: 10px;
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

    #delete-yes {
        padding-left: 20px;
        padding-right: 20px;
        text-decoration: none;
    }

    #delete-btn {
        padding-left: 0;
        padding-right: 0;
    }

    a {
        text-decoration: none !important;
    }

    #select {
        margin-bottom: 18px;
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
      #search{
        border:1px solid grey !important;
      }
    </style>
    </body>

    </html>