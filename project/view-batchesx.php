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

$query = "SELECT * FROM batch where farmID=$farmID";




if ($result = $mysqli->query($query)){
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

            echo'<td>
            <div class="viewbatch-button">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
            <a href="view-production.php?batchID='.$row['batchID'].'"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 20 20">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
          </svg>View Productions</a>
         </button>
         </div>
            </td>';
			echo"</tr>";
              
		}
	"</table>";


    }
?>

    </section>

   

                        <div class="addbatch-button">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                <a href="add-batch.php?farmID=<?php echo $farmID ?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-plus-square" viewBox="0 0 20 20">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>Add Batch</a>
                            </button>
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
</style>
</body>

</html>