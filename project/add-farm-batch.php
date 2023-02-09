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
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 2 20 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>Add Batches</h2>
    </section>

    <section class="view">


<?php
    
$query = "SELECT * FROM farm";




if ($result = $mysqli->query($query)){
		echo "<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' hidden id='count'>Farm ID</th>
				<th scope='col' id='farm-name'>Name</th>
				<th scope='col' id='owner'>Owner</th>
                <th scope='col' id='edit'>Add Batch</th>				
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_assoc()) {
            $farmID = $row["farmID"];
			
            $farmname = $row["farmname"];
            $farmowner = $row["farmowner"];
     
           
	
   
        	echo"<tr>";
            	echo "<td hidden id=' farmid' >" .$row['farmID']. "</td>";
				
            	echo "<td id=' farmname '>" .$row['farmname']. "</td>";
            	echo "<td id=' owner '>" .$row['farmowner']. "</td>";
                echo '<td > 
                <div class="addbatch-button">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                  <a href= "add-batch.php?farmID='.$row['farmID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 20 20">
                   <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                   <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                 </svg>Add Batch</a>
                </button>
                </div>
                 </td>';

                 
    		echo"</tr>";
              
		}
	"</table>";

?>

    </section>
<!--
    <div class="add">
        <div class="add-user-page">
            <a href="add-farm.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 20 20">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>Add Farm</a>
        </div>
    </div>
    -->
    </div>
    <!--style-->

           <style type="text/css">

        .wrapper{
            margin-top:10px;
        }

        .view {
            margin:50px;
            display:grid;
            place-items:center;
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
        .delete-button button{
            border:none;
            background-color:red;
        }

        .delete-button button:hover{
            border:none;
            background-color:darkred;
            color:white;
        }

        .addbatch-button button{
            border:none;
            display:flex;
            justify-content:center;
            background-color:darkgreen;
            
        }

        .addbatch-button button:hover{
            border:none;
            background-color:green;
            color:white;
        }

        #delete-yes{
            padding-left:20px;
            padding-right:20px;
            text-decoration:none;
        }

        #delete-btn{
            padding-left:0;
            padding-right:0;
        }

        .viewbatch-button button{
            background-color: limegreen;
            border:none;
        }

        .viewbatch-button button:hover{
            background-color: yellowgreen;
            border:none;
        }
        a{
            text-decoration:none !important;
        }

        h2{
            margin-top:5px;
        }

        </style>
</body>

</html>