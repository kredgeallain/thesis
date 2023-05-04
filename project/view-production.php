<?php
include 'connect.php';

?>

<?php include ("header.php");  ?>

<div class="wrapper">


    <section class="view">




        <?php
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(isset($_GET["batchID"])){
		
	
	$batchID = $_GET["batchID"];
    $month = $_GET["month"];
    $year = $_GET["year"];
    $farm = $_GET["farm"];
    $batch = $_GET["batch"];
   
    $month_num = date_parse($month)['month'];
   
    
    $date = $year . '-' . str_pad($month_num, 2, '0', STR_PAD_LEFT);

    
}
}
$query = "SELECT * FROM batch where batchID=$batchID";
$res=mysqli_query($conn,$query);

$verify=mysqli_fetch_array($res);


if($verify["unit"]=="broiler") {



$sql = "SELECT broiler.broilerID, broiler.batchID,broiler.reject, broiler.broiler_weight, broiler.Bcurrent, broiler.mortality, broiler.date, user.name FROM broiler 
INNER JOIN user ON broiler.userID = user.userID where broiler.batchID=$batchID order by broiler.date DESC";
if ($result = $conn->query($sql)){
    echo "<table class='table table-striped'>
    <thead class='thead-success'>	  
    <tr class='table-header'>
        
        <th scope='col' hidden id='name'>Broiler ID</th>
        <th scope='col' hidden id='name'>Batch ID</th>
        <th scope='col' id='name'>Meat Harvested(kg)</th>
        <th scope='col' id='name'>Harvested/Head</th>
        <th scope='col' id='name'>Rejected/Head</th>
        <th scope='col' id='name'>Mortality</th>
        <th scope='col' id='name'>Date Recorded</th>
        <th scope='col' id='name'>Recorded by</th>
        
    </tr>	  
    </thead>";
		}

        while ($row = $result->fetch_assoc()) { 
           
            echo"<tr>";
            echo "<td id='name' hidden >" .$row['broilerID']. "</td>";
            echo "<td id='name' hidden >" .$row['batchID']. "</td>";
            echo "<td id='name'>" .$row['broiler_weight']. " kg. </td>";
            echo "<td id='name'>" .$row['Bcurrent']. "</td>";
            echo "<td id='name'>" .$row['reject']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td id='name'>" .$row['date']. "</td>";
            echo "<td id='name'>" .$row['name']. "</td>";

          

			echo"</tr>";
              
		}
	"</table>";

    }


    else if($verify["unit"]=="layer") {



        $sql = "SELECT layer.layerID, layer.batchID, layer.no_eggs, layer.reject_eggs, layer.f_date, layer.t_date,
         layer.mortality, layer.date,
        user.name FROM layer 
        inner join user on layer.userID = user.userID where batchID=$batchID and DATE_FORMAT(layer.date, '%Y-%m') = '$date'";
        
        if ($result = $conn->query($sql)){
            echo "<table class='table table-striped'>
            <thead>	  
            <tr class='table-header'>
                
            <th scope='col' hidden  id='count'>Layer ID</th>
            <th scope='col' hidden id='count'>Batch ID</th>
            <th scope='col' id='name'>Good Eggs</th>
            <th scope='col' id='name'>Rejected Eggs</th>
            <th scope='col' id='name'>Mortality</th>
            <th scope='col' id='name'>Date Harvested From</th>
            <th scope='col' id='name'>Date Harvested To</th>
            <th scope='col' id='name'>Harvest Range(Days)</th>
            <th scope='col' id='name'>Date Recorded</th>
            </tr>	  
            </thead>";
                }
        
                while ($row = $result->fetch_assoc()) { 
                   
                  
            $mortality = $row['mortality'];
          //  $initial = $row['initial'];
        
          //  $current = $initial-$mortality;

            $f = $row['f_date'];
            $t = $row['t_date'];

            $from = new DateTime($f);
            $to = new DateTime($t);
            $interval = $to->diff($from);
            $days_harvested = $interval->days + 1;
            
        
            echo"<tr>";
            echo "<td id='name' hidden >" .$row['layerID']. " </td>";
            echo "<td id='name' hidden >" .$row['batchID']. "</td>";
            echo "<td id='name' >" .$row['no_eggs']. "</td>";
            echo "<td id='name'>" .$row['reject_eggs']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td id='name'>" .$row['f_date']. "</td>";
            echo "<td id='name'>" .$row['t_date']. "</td>";
            echo "<td id='name'>" .$days_harvested . " day/s</td>";
            echo "<td id='name'>" .$row['date']. "</td>";
             
                      
                }
            "</table>";
        
            }

    
?>
 <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses"
                viewBox="0 2 20 16">
                <path
                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
            </svg>Production Inputs on <?php echo $month?></h2>
    </section>
<div>
 <h5> <b><?php 
       echo "Farm: ";  echo $farm;
        echo "<br>Batch: "; echo $batch;

    
    
    ?>  </b> </h5>      

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

.table-header th {
  background-color: #0047AB;
  color: white;
}


.view-user {
    display: flex;
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