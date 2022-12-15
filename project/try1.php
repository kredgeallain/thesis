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


// Prepare the SQL query
$query = "SELECT MONTH(date) as month, 
YEAR(DATE) as year,
SUM(no_eggs) as total,
SUM(reject_eggs) as reject,
SUM(Lcurrent) as current,
SUM(mortality) as mortality
FROM layer         
GROUP BY MONTH(date)
ORDER BY YEAR(date) ASC";

// Execute the query and store the results in a variable
if($result = $data1->query($query)){
   
echo "<table class='table table-striped'>

<thead>	  
<tr>

<th scope='col' id='count'> Month </th>
<th scope='col' id='count'> Year </th>


<th scope='col' id='count'> Total Eggs </th>
<th scope='col' id='name'> Total Reject Eggs </th>
<th scope='col' id='u-name'> Total Current </th>
<th scope='col' id='u-name'> Total Mortality </th>
<th scope='col' id='u-name'> Mortality Rate </th>

</tr>	  
</thead>";

}

// Loop through the results and print the sum for each month
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
$current = $row['current'];
$mortality = $row['mortality'];
$mortality_rate = ( $mortality / $current ) * 100;
$new_mortality_rate = number_format($mortality_rate, 2) . "%";
$month = $row['month'];
$month_letter = date("F", mktime(0, 0, 0, $month, 1));
$color = "red";
$color1 = "green";


echo"<tr>";
echo "<td > $month_letter </td>";    
echo "<td >".$row['year']."</td>";


echo "<td >" .$row['total']. "</td>";
echo "<td >" .$row['reject']. "</td>";
echo "<td >" .$row['current']. "</td>";
echo "<td >" .$row['mortality']. "</td>";
if ($new_mortality_rate >= 20.00) {
echo "<td style='color:$color'> $new_mortality_rate Danger!</td>";
}else{
echo "<td style='color:$color1'> $new_mortality_rate </td>";
}



"</table>";

}





?>