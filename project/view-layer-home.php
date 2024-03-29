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
baranggay.baranggay, farm.farmname, batch.batch, user.name, batch.initial, batch.batchID,
SUM(layer.no_eggs) as eggs,
SUM(layer.reject_eggs) as rej_eggs,
SUM(layer.mortality) as mortality,
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
        $reggs = $row['eggs'];
        $geggs = $row['rej_eggs'];
        $tegss = $reggs+$geggs;
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
        echo "<td>".$tegss."</td>";
        echo "<td>".$row['initial']."</td>";
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