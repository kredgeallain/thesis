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
baranggay.baranggay, farm.farmname, batch.batch,

SUM(layer.no_eggs) as eggs,
SUM(layer.reject_eggs) as rej_eggs,
SUM(layer.mortality) as mortality,
MIN(layer.Lcurrent) as current,
MONTH(layer.date) as month,
YEAR(layer.date) as year
FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID 
INNER JOIN batch ON farm.farmID = batch.farmID 
INNER JOIN layer ON batch.batchID = layer.batchID AND batch.batchID = layer.batchID

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
<th scope='col' id='u-name'> Total Eggs </th>
<th scope='col' id='u-name'> Reject Eggs </th>
<th scope='col' id='u-name'> Mortality </th>
<th scope='col' id='u-name'> Current </th>
<th scope='col' id='u-name'> Mortality Rate </th>


</tr>	  
</thead>";
    while($row = $result->fetch_assoc()){
        $current = $row['current'];
        $mortality = $row['mortality'];
        $mortality_rate = ( $mortality / $current ) * 100;
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
        echo "<td>".$row['mortality']."</td>";
        echo "<td>".$row['current']."</td>";
        if ($new_mortality_rate >= $rate ) {
            echo "<td style='color:red'> $new_mortality_rate % Danger!</td>";
            }else{
            echo "<td style='color:green'> $new_mortality_rate % </td>";
            }

    }
}
?>