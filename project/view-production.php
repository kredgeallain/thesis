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
            </svg>Production Details</h2>
    </section>

    <section class="view">




        <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["batchID"])){
		header("location:add-brgy.php");
		sleep(2);
		exit; 
	}
	$batchID = $_GET["batchID"];

$query = "SELECT * FROM batch where batchID=$batchID";
$res=mysqli_query($data,$query);

$verify=mysqli_fetch_array($res);


if($verify["unit"]=="broiler") {



$sql = "SELECT * FROM broiler where batchID=$batchID";

if ($result = $mysqli->query($sql)){
    echo "<table class='table table-striped'>
    <thead class='thead-dark'>	  
    <tr>
        
        <th scope='col'  id='name'>Broiler ID</th>
        <th scope='col' id='name'>Batch ID</th>
        <th scope='col' id='name'>Broiler Weight</th>
        <th scope='col' id='name'>Current Number per Head</th>
        <th scope='col' id='name'>Mortality</th>
        <th scope='col' id='name'>Date Recorded</th>
        
    </tr>	  
    </thead>";
		}

        while ($row = $result->fetch_assoc()) { 
           
            echo"<tr>";
            echo "<td id='name' >" .$row['broilerID']. "</td>";
            echo "<td id='name'>" .$row['batchID']. "</td>";
            echo "<td id='name'>" .$row['broiler_weight']. "</td>";
            echo "<td id='name'>" .$row['Bcurrent']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td id='name'>" .$row['date']. "</td>";


			echo"</tr>";
              
		}
	"</table>";

    }


    else if($verify["unit"]=="layer") {



        $sql = "SELECT * FROM layer where batchID=$batchID";
        
        if ($result = $mysqli->query($sql)){
            echo "<table class='table table-striped'>
            <thead class='thead-dark'>	  
            <tr>
                
                <th scope='col'  id='count'>Layer ID</th>
                <th scope='col'  id='count'>Batch ID</th>
                <th scope='col' id='name'>No. of Eggs</th>
                <th scope='col' id='name'>No. of Rejected Eggs</th>
                <th scope='col' id='name'>Current number per Heads</th>
                <th scope='col' id='name'>Mortality</th>
                <th scope='col' id='name'>Date Recorded</th>
            </tr>	  
            </thead>";
                }
        
                while ($row = $result->fetch_assoc()) { 
                   
                    echo"<tr>";
                    echo "<td id='name' >" .$row['layerID']. "</td>";
                    echo "<td id='name' >" .$row['batchID']. "</td>";
                    echo "<td id='name' >" .$row['no_eggs']. "</td>";
                    echo "<td id='name'>" .$row['reject_eggs']. "</td>";
                    echo "<td id='name'>" .$row['Lcurrent']. "</td>";
                    echo "<td id='name'>" .$row['mortality']. "</td>";
                    echo "<td id='name'>" .$row['date']. "</td>";
        
        
                    echo"</tr>";
                      
                }
            "</table>";
        
            }

    }
?>
    </section>


    <div class="add">
        <div class="add-user-page">
        <a href="add-production.php?batchID=<?php echo $batchID ?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                    class="bi bi-plus-circle" viewBox="0 0 20 20">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path
                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>Add Production</a>
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
</style>
</body>

</html>