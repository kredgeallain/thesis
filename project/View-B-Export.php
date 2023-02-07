<?php
include('connect.php');
echo "<form  method='post'>";
echo 'Enter the start date (YYYY-MM-DD): <input type="date" name="start_date"><br>';
echo 'Enter the end date (YYYY-MM-DD): <input type="date" name="end_date"><br>';
echo "<input type='submit' value='View Data '>";
echo "</form>";

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


    $sql = "SELECT 
baranggay.baranggay, farm.farmname, batch.batch,

SUM(broiler.broiler_weight) as weight,

SUM(broiler.mortality) as mortality,
SUM(broiler.Bcurrent) as current,
MONTH(broiler.date) as month,
YEAR(broiler.date) as year
FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID 
INNER JOIN batch ON farm.farmID = batch.farmID 
INNER JOIN broiler ON batch.batchID = broiler.batchID
WHERE broiler.date BETWEEN '$start_date' AND '$end_date'
GROUP BY baranggay.baranggay, farm.farmname, batch.batchID,
MONTH(broiler.date),
YEAR(broiler.date) 
ORDER BY MONTH(broiler.date),
YEAR(broiler.date) ASC";


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table id='exportdata' class='table table-striped'>

<thead>	  
<tr>
<th scope='col' id='count'> Month </th>
<th scope='col' id='name'> Year </th>


<th scope='col' id='count'> Baranggay </th>
<th scope='col' id='name'> Farm </th>
<th scope='col' id='u-name'> Batch </th>
<th scope='col' id='u-name'> Total Weight </th>
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
            echo "<td>" . $row['weight'] . "</td>";

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
?>
<script src="table2excel.js"></script>

<div class="container">		
<div class="well-sm col-sm-12">
    <div class="btn-group pull-right">	
        <form  method="post">					
            <button type="submit" id="dataExport" name="dataExport" value="Export to excel" class="btn btn-info">Export To Excel</button>
        </form>
    </div>
</div>			
<script>
    document.getElementById('dataExport').addEventListener('click', function(){
        var table2excel = new Table2Excel();
        table2excel.export(document.querySelectorAll("#exportdata"));
         
    });
</script>