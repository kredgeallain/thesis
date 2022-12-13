
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

$r = "SELECT MONTH(date) AS month,
 SUM(no_eggs) AS total FROM layer
 GROUP BY MONTH(date)";
$result = $conn->query($r);
if(!$result) {
    die("Error executing query: " . $conn->error);
}
// Get the sum of column no_eggs
$sum_egg = $result->fetch_object()->total;



$s = "SELECT MONTH(date) AS month, 
SUM(reject_eggs) AS total FROM layer
GROUP BY MONTH(date)";
$result = $conn->query($s);
if(!$result) {
    die("Error executing query: " . $conn->error);
}
// Get the sum of column rej_eggs
$sum_rejegg = $result->fetch_object()->total;



$t = "SELECT MONTH(date)AS month,
SUM(Lcurrent) AS total FROM layer
GROUP BY MONTH(date)";
$result = $conn->query($t);
if(!$result) {
    die("Error executing query: " . $conn->error);
}
// Get the sum column Lcurrent
$sum_current = $result->fetch_object()->total;



$u = "SELECT MONTH(date)AS month,
SUM(mortality) AS total FROM layer
GROUP BY MONTH(date)";
$result = $conn->query($u);
if(!$result) {
    die("Error executing query: " . $conn->error);
}
// Get the sum of column mortality
$sum_mortality = $result->fetch_object()->total;



$mortality_rate = ($sum_mortality / $sum_current) * 100;

$new_mortality_rate = number_format($mortality_rate, 2) . "%";
$danger = "red";
 
echo "<table class='table table-striped'>
        <thead>	  
        <tr>
            
            <th scope='col' id='count'> Total Eggs </th>
            <th scope='col' id='name'> Total Reject Eggs </th>
            <th scope='col' id='u-name'> Total Current </th>
            <th scope='col' id='u-name'> Total Mortality </th>
            <th scope='col' id='u-name'> Mortality Rate </th>
            
        </tr>	  
        </thead>";

        echo"<tr>";
        echo "<td > $sum_egg </td>";
        echo "<td > $sum_rejegg </td>";
        echo "<td > $sum_current </td>";
        echo "<td > $sum_mortality </td>";
        if($new_mortality_rate >= 1 ){
            echo "<td style='color: $danger'> $new_mortality_rate Danger!   </td>";
        }
        else{
            echo "<td > $new_mortality_rate </td>";
        }
        
        
        echo"</tr>";

  
"</table>";










?>