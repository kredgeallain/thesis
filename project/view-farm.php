<?php
include 'connect.php';

$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>
<!DOCTYPE html>
<html>

<head>
    <title> Recording and Inventory System for Poultry Products!</title>
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <section class="header">
        <div class="logo">
            <img src="../image/logo.png" alt="Department of Agriculture Logo" width="80px" , height="80px">
            <p>Republic of the Philippines</p>
            <h1>DEPARTMENT OF AGRICULTURE</h1>
        </div>

        <div class="text">
            <p>San Lorenzo, Guimaras</p>

        </div>

        <section class="nav">
            <div class="home">
                <a href="adminpage.php">Home</a>
            </div>
            <div class="dropdown0">
                <button class="dropbtn0"> Production </button>
                <div class="dropdown-content0">
                    <a href=""> View Record</a>
                    <a href="record.html"> Record Production</a>
                    <a href="#"> Generate Report</a>
                    <a href="#"> Find Records </a>
                </div>
            </div>

            <div class="dropdown2">
                <button class="dropbtn2"> Farm </button>
                <div class="dropdown-content2">
                    <a href="farm-detail.html"> View Farm</a>
                    <a href="add-farm.php">Add Farm</a>
                    <a href="map.html"> View farm Map</a>
                </div>
            </div>

            <div class="dropdown3">
                <button class="dropbtn3"> User </button>
                <div class="dropdown-content3">
                    <a href="add-user.php"> Add User</a>
                    <a href="view-user.php"> View Users </a>
                </div>
            </div>


            <div class="user">

                <details>
                    <summary class="summ"><img src="../image/user2.png" alt="User" width="70px" , height="70px">
                    </summary>
                    <div class="drop-menu">
                        <ul>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Help</a></li>
                            <li><a href="">Log out</a></li>
                        </ul>
                    </div>
                </details>
            </div>
        </section>
    </section>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
           <style type="text/css">
        * {
            font-family: tahoma;
            padding: 0px;
            margin: 0px;
        }
        .header {
            background-color: #0e2a83;
            padding: 15px;
        }
        .header p {
            margin-top: -10px;
        }
        .logo {
            margin-left: -10px;
            display: flex;
            padding-bottom: 10px;
        }
        .logo p {
            color: white;
            padding-left: 20px;
        }
        .logo img {
            padding: 5px;
            margin-top: -10px;
        }
        .logo h1 {
            color: white;
            text-decoration: overline;
            font-size: 25px;
            padding-left: 15px;
            padding-right: 10px;
            padding-top: 15px;
            padding-bottom: 10px;
            margin-left: -200px;
        }
        .text p {
            color: white;
            margin-top: -45px;
            padding-top: 5px;
            padding-left: 90px;
            margin-bottom: 5px;
        }
        .title {
            font-size: 20px;
            display: flex;
            justify-content: center;
            padding-bottom: 10px;
        }
        .nav {
            background-color: #163289;
            display: flex;
            margin-top: -58px;
            margin-bottom: -15px;
            padding-top: 25px;
            position: absolute;
            border: 1px solid #0e2a83;
            right: 0;
        }
        .user {
            margin-top: -45px;
            margin-right: 30px;
        }
        .home {
            margin-top: 5px;
        }
        .home a {
            font-size: 16px;
            text-decoration: none;
            color: white;
            padding: 16px;
            margin-right: 10px;
            text-shadow: 1px 1px #9a9b9e;
        }
        .home a:hover {
            padding: 16px;
            background-color: blue;
        }
        .user a {
            margin-right: 1px;
        }
        ul {
            padding-top: 10px;
            border-radius: 15px;
            box-shadow: 2px, 2px, 2px, 2px black;
            background-color: grey;
            padding-bottom: 10px;
            margin-top: -3px;
            margin-left: -210px;
            margin-bottom: -203px;
        }
        li:hover {
            padding: 18px;
            background-color: #ddd;
        }
        li {
            border-radius: 15px;
            padding-bottom: 10px;
            padding-top: 20px;
            padding-left: 10px;
            padding-right: 20px;
            list-style: none;
        }
        .side-menu {

            display: flex;
            justify-content: flex-end;
            margin-top: px;
            margin-bottom: 20px;
        }
        .user img {
            margin-top: 14px;
        }
        .summ {
            margin-left: 25px;
            cursor: pointer;
            list-style: none;
        }
        .drop-menu a {
            text-decoration: none;
            color: white;
        }
        /* dropdown button */
        .dropbtn0 {
            color: white;
            text-shadow: 1px 1px #9a9b9e;
            padding: 16px;
            padding-right: 10px;
            padding-left: 10px;
            font-size: 16px;
            border: none;
            justify-items: center;
            background-color: transparent;
        }

        .dropdown0 {
            margin-top: -10px;
            display: inline-block;
        }

        .dropdown0 label {
            padding: 5px;
            color: black;
            margin-bottom: 100px;
        }

        .dropdown0 .dropbtn0 {

            margin-left: 5px;
            cursor: pointer;
        }

        .dropdown-content0 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: 5px;

        }

        .dropdown-content0 a {
            color: black;
            padding: 20px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content0 a:hover {
            background-color: #ddd;
        }

        .dropdown0:hover .dropdown-content0 {
            display: block;
        }

        .dropdown0:hover .dropbtn0 {
            background-color: blue;
        }

        /*dropdown2*/

        .dropbtn2 {
            color: white;
            text-shadow: 1px 1px #9a9b9e;
            padding-right: 10px;
            padding-left: 10px;
            padding: 16px;
            font-size: 16px;
            border: none;
            justify-items: center;
            background-color: transparent;
        }

        .dropdown2 {
            margin-top: -10px;
            display: inline-block;
        }

        .dropdown2 label {
            padding: 5px;
            color: black;
            margin-bottom: 100px;
        }

        .dropdown2 .dropbtn2 {

            /* margin-top: 100px; */
            margin-left: 5px;
            cursor: pointer;
        }

        .dropdown-content2 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: 5px;
        }

        .dropdown-content2 a {
            color: black;
            padding: 20px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content2 a:hover {
            background-color: #ddd;
        }

        .dropdown2:hover .dropdown-content2 {
            display: block;
        }

        .dropdown2:hover .dropbtn2 {
            background-color: blue;
        }
        /*dropdown3*/

        .dropbtn3 {
            color: white;
            text-shadow: 1px 1px #9a9b9e;
            padding-right: 10px;
            padding-left: 10px;
            padding: 16px;
            font-size: 16px;
            border: none;
            justify-items: center;
            background-color: transparent;
        }

        .dropdown3 {
            margin-top: -10px;
            display: inline-block;
        }

        .dropdown3 label {
            padding: 5px;
            color: black;
            margin-bottom: 100px;
        }

        .dropdown3 .dropbtn3 {

            /* margin-top: 100px; */
            margin-left: 5px;
            cursor: pointer;
        }

        .dropdown-content3 {
            display: none;
            position: absolute;
            background-color: #f1f1f1;
            min-width: 100px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            margin-left: 5px;
        }

        .dropdown-content3 a {
            color: black;
            padding: 20px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content3 a:hover {
            background-color: #ddd;
        }

        .dropdown3:hover .dropdown-content3 {
            display: block;
        }

        .dropdown3:hover .dropbtn3 {
            background-color: blue;
        }

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