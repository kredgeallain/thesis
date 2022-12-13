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

$L = "SELECT * FROM layer  ORDER BY date" ;

if ($result = $mysqli->query($L)){
    echo '<label>Layer</label>';
    echo "<table class='table table-striped'>
        <thead>	  
        <tr>
            <th scope='col' id='count'>batchID</th>
            <th scope='col' id='count'>Lcurrent</th>
            <th scope='col' id='name'>Mortality</th>
            <th scope='col' id='u-name'>Mortality rate</th>
            <th scope='col' id='u-name'> Status </th>
            <th scope='col' id='count'> Date </th>
          
            
        </tr>	  
        </thead>";
    }

    while ($row = $result->fetch_assoc()) {
        $Lcurrent = $row["Lcurrent"];
        $mortality = $row["mortality"];
        $date = $row['date'];

        $mortality_rate = ($mortality / $Lcurrent) * 100;
       
        echo"<tr>";
            echo "<td >" .$row['batchID']. "</td>";
            echo "<td >" .$row['Lcurrent']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td>" . $mortality_rate .'%'. "</td>";
            if($mortality_rate >= 20){
                echo "<td> Danger! </td>";
            }
            else{
                echo "<td> Good </td>";
            }
            echo "<td >" .$row['date']. "</td>";		

    }
"</table>";

?>
<?php
$B = "SELECT * FROM broiler";

if ($result = $mysqli->query($B)){
    
    echo "<table class='table table-striped'>
        <thead>	  
        <tr>
            
            <th scope='col' id='count'>Bcurrent</th>
            <th scope='col' id='name'>Mortality</th>
            <th scope='col' id='u-name'>Moratlity rate</th>
            <th scope='col' id='u-name'> Status </th>
            
        </tr>	  
        </thead>";
    }

    while ($row = $result->fetch_assoc()) {
        $Bcurrent = $row["Bcurrent"];
        $mortality = $row["mortality"];

        $mortality_rate = ($mortality / $Bcurrent) * 100;


        echo"<tr>";
            echo "<td >" .$row['Bcurrent']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td>" . $mortality_rate .'%'. "</td>";
            if($mortality_rate >= 20){
                echo "<td> Danger!!! </td>";
            }
            else{
                echo "<td> Good </td>";
            }
            echo"</tr>";

    }
"</table>";
echo '<label>Broiler</label>';
?>

<br></br>