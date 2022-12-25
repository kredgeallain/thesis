<?php

include('connect.php');

// Prompt the user to enter the start and end dates for the data
echo "<form method='post'>";
echo 'Enter the start date (YYYY-MM-DD): <input type="date" name="start_date"><br>';
echo 'Enter the end date (YYYY-MM-DD): <input type="date" name="end_date"><br>';
echo "<input type='submit' value='Export'>";
echo "</form>";


// Check if the form has been submitted
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    // Retrieve the start and end dates from the form
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    // Execute a SQL query to retrieve the data within the specified date range
    $query = "SELECT 
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
    WHERE layer.date BETWEEN '$start_date' AND '$end_date'
    GROUP BY baranggay.baranggay, farm.farmname, batch.batchID,
    MONTH(layer.date),
    YEAR(layer.date) 
    ORDER BY MONTH(layer.date),
    YEAR(layer.date) ASC 
    ";
    $result = $conn->query($query);

    // Fetch the data into an array
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Close the connection to the database
    $conn = null;

    // Export the data to an Excel file
    $filename = "output.xls";
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename=$filename");
    $flag = false;
    foreach ($data as $row) {
        if (!$flag) {
            // Display the column names as the first row
            echo implode("\t", array_keys($row)) . "\r\n";
            $flag = true;
        }
        // Display the data rows
        echo implode("\t", array_values($row)) . "\r\n";
    }
}

?>
