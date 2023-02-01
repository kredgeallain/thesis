<?php
include('connect.php');

echo '<form id="form2" method="post">';
    echo 'Enter the start date (YYYY-MM-DD): <input type="date" name="start_date"><br>';
    echo 'Enter the end date (YYYY-MM-DD): <input type="date" name="end_date"><br>';
    echo '<input type="submit" value="View Data">';
    
         // Check if the form has been submitted
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    // Retrieve the start and end dates from the form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

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
    INNER JOIN layer ON batch.batchID = layer.batchID 

    WHERE layer.date BETWEEN '$start_date' AND '$end_date'
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
        while ($row = $result->fetch_assoc()) {
            $current = $row['current'];
            $mortality = $row['mortality'];
            $mortality_rate = ($mortality / $current) * 100;
            $new_mortality_rate = number_format($mortality_rate, 2);
            $rate = 20;
            $month = $row['month'];
            $month_letter = date("F", mktime(0, 0, 0, $month, 1));
            echo "<tr>";
            echo "<td > $month_letter </td>";
            echo "<td >" . $row['year'] . "</td>";

            echo "<td>" . $row['baranggay'] . "</td>";
            echo "<td>" . $row['farmname'] . "</td>";
            echo "<td>" . $row['batch'] . "</td>";
            echo "<td>" . $row['eggs'] . "</td>";
            echo "<td>" . $row['rej_eggs'] . "</td>";
            echo "<td>" . $row['mortality'] . "</td>";
            echo "<td>" . $row['current'] . "</td>";
            if ($new_mortality_rate >= $rate) {
                echo "<td style='color:red'> $new_mortality_rate % Danger!</td>";
            } else {
                echo "<td style='color:green'> $new_mortality_rate % </td>";
            }

        }
    }
}
    
'</form>';
?>

   

