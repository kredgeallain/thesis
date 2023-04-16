<?php include ("head.php");  ?>

<?php
@include('connect.php');
?>
<?php
$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>

<?php
@include('connect.php');

$sql = "SELECT 
baranggay.baranggay, farm.farmname, batch.batch,  user.name, batch.initial, broiler.reject,

SUM(broiler.broiler_weight) as weight,

SUM(broiler.mortality) as mortality,
SUM(broiler.Bcurrent) as harvest,
MONTH(broiler.date) as month,
YEAR(broiler.date) as year
FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID 
INNER JOIN batch ON farm.farmID = batch.farmID 
INNER JOIN broiler ON batch.batchID = broiler.batchID
INNER JOIN user ON broiler.userID = user.userID

GROUP BY baranggay.baranggay, farm.farmname, batch.batchID,
MONTH(broiler.date),
YEAR(broiler.date) 
ORDER BY MONTH(broiler.date),
YEAR(broiler.date) ASC";

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
<th scope='col' id='u-name'> Total Meat Harvested(kg)</th>
<th scope='col' id='u-name'> Initial Chicken Count/Head </th>
<th scope='col' id='u-name'> Rejected Chicken/Head</th>
<th scope='col' id='u-name'> Total Harvested/Head </th>
<th scope='col' id='u-name'> Mortality </th>
<th scope='col' id='u-name'> Mortality Rate </th>
<th scope='col' id='u-name'> Recorded by </th>


</tr>	  
</thead>";
    while($row = $result->fetch_assoc()){
        $harvest = $row['harvest'];
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
        echo "<td>".$row['weight']." kg. </td>";
        echo "<td>".$row['initial']."</td>";
        echo "<td>".$row['reject']."</td>";
        echo "<td>".$row['harvest']."</td>";
        echo "<td>".$row['mortality']."</td>";
        if ($new_mortality_rate >= $rate ) {
            echo "<td style='color:red'> $new_mortality_rate % Danger!</td>";
            }else{
            echo "<td style='color:green'> $new_mortality_rate % </td>";
            }
        
            echo "<td>".$row['name']."</td>";

    }
}

?>