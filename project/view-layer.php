<?php
@include('connect.php');
?>
<?php
$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>
<?php include ("header.php");  ?>
<?php
@include('connect.php');

$sql = "SELECT 
baranggay.baranggay, farm.farmname, batch.batch, user.name,  batch.initial, batch.batchID,

SUM(layer.no_eggs) as eggs,
SUM(layer.reject_eggs) as rej_eggs,
SUM(layer.mortality) as mortality,
MIN(layer.Lcurrent) as current,
MONTH(layer.date) as month,
YEAR(layer.date) as year
FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID 
INNER JOIN batch ON farm.farmID = batch.farmID 
INNER JOIN layer ON batch.batchID = layer.batchID 
INNER JOIN user ON layer.userID = user.userID

GROUP BY baranggay.baranggay, farm.farmname, batch.batchID,
MONTH(layer.date),
YEAR(layer.date) 
ORDER BY MONTH(layer.date),
YEAR(layer.date) ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {

        echo "<table class='table table-striped'>
    
    <thead>	  
    <tr>
    <th scope='col' id='count'> Month </th>
    <th scope='col' id='name'> Year </th>
    
    
    <th scope='col' id='count'> Baranggay </th>
    <th scope='col' id='name'> Farm </th>
    <th scope='col' id='u-name'> Batch </th>
    <th scope='col' id='u-name'> Good<br>Eggs Total</th>
    <th scope='col' id='u-name'> Reject<br>Eggs Total</th>
    <th scope='col' id='u-name'> Total Eggs Count</th>
    <th scope='col' id='u-name'> Initial Chicken Count/Head</th>
    <th scope='col' id='u-name'> Mortality </th>
    <th scope='col' id='u-name'> Mortality Rate </th>
    <th scope='col' id='u-name'> Recorded by </th>
    
    
    </tr>	  
    </thead>";
        while($row = $result->fetch_assoc()){
            $initial = $row['initial'];
            $mortality = $row['mortality'];
            $current = $initial-$mortality;
            $mortality_rate = ( $mortality / $initial ) * 100;
            $new_mortality_rate = number_format($mortality_rate, 2) ;
            $rate = 20;
            $month = $row['month'];
            $month_letter = date("F", mktime(0, 0, 0, $month, 1));
            echo "<tr>";
            echo "<td > $month_letter </td>";    
            echo "<td >".$row['year']."</td>";
    
            echo "<td>".$row['baranggay']."</td>";
            echo "<td>".$row['farmname']."</td>";
            echo "<td>".$row['batch']."</td>";
            echo "<td>".$row['eggs']."</td>";
            echo "<td>".$row['rej_eggs']."</td>";
            echo "<td>".$row['initial']."</td>";
            echo "<td>".$row['mortality']."</td>";
            echo "<td>".$current."</td>";
            if ($new_mortality_rate >= $rate ) {
                echo "<td style='color:red'> $new_mortality_rate % Danger!</td>";
                }else{
                echo "<td style='color:green'> $new_mortality_rate % </td>";
                }
            echo "<td>".$row['name']."</td>";

            echo'<td>
            <div class="viewbatch-button">
            <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#editModal" >
            <a href="view-production.php?batchID='.$row['batchID'].'&month='.$month_letter.'&year='.$row['year'].'&farm='.$row['farmname'].'&batch='.$row['batch'].'"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 20 20">
            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
        </svg>View Inputs</a>
        </button>
        </div>
            </td>';
        }
    }
?>

<style>
    a{
        text-decoration:none ;
        color:white ;
    }
</style>