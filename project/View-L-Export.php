<?php
include('header.php');


 
?>

<section class="body">
    <div class="gererate-txt">
        <h3><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-file-earmark-arrow-down-fill" viewBox="0 0 16 16">
        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-1 4v3.793l1.146-1.147a.5.5 0 0 1 .708.708l-2 2a.5.5 0 0 1-.708 0l-2-2a.5.5 0 0 1 .708-.708L7.5 11.293V7.5a.5.5 0 0 1 1 0z"/>
        </svg> Generate Layer Records</h3>
    </div>
<div class="wrapper">
<?php

include('connect.php');


echo "<form  method='post'>";


echo '<div class="content-body"><div class="content-input"> <div class="input-start"><p>Enter the start date (YYYY-MM-DD)</p> <input id="input" class="form-control" type="date" name="start_date"></div>';

echo '<div class="input-end"><p>Enter the end date (YYYY-MM-DD)</p> <input id="input" class="form-control" type="date" name="end_date"></div></div>';

echo "<div id='submit' class='view-data-btn'><input class='btn btn-info' type='submit' value='View Data '></div></div>";


echo "</form>";

if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];


    $sql = "SELECT 
    baranggay.baranggay, farm.farmname, batch.batch as b, batch.unit, batch.initial,

    SUM(layer.no_eggs) as eggs,
    SUM(layer.reject_eggs) as rej_eggs,
    SUM(layer.mortality) as mortality,
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
        echo "<table id='exportdata' class='table table-striped'>

    <thead>	  
    <tr>
    <th scope='col' id='count'> Month </th>
    <th scope='col' id='name'> Year </th>


    <th scope='col' id='count'> Baranggay </th>
    <th scope='col' id='name'> Farm </th>
    <th scope='col' id='batch'> Batch </th>
    <th scope='col' id='batch'> Unit </th>
    <th scope='col' id='u-name'> Total Eggs </th>
    <th scope='col' id='u-name'> Reject Eggs </th>
    <th scope='col' id='u-name'> Mortality </th>
    <th scope='col' id='u-name'> Current </th>
    <th scope='col' id='u-name'> Mortality Rate </th>


    </tr>	  
    </thead>";
        while ($row = $result->fetch_assoc()) {
            $initial = $row['initial'];
            $mortality = $row['mortality'];
            $current = $initial-$mortality;
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
            echo "<td>" . $row['b'] . "</td>";
            echo "<td>" . $row['unit'] . "</td>";
            echo "<td>" . $row['eggs'] . "</td>";
            echo "<td>" . $row['rej_eggs'] . "</td>";
            echo "<td>" . $row['mortality'] . "</td>";
            echo "<td>" . $current . "</td>";
            if ($new_mortality_rate >= $rate) {
                echo "<td style='color:red'> $new_mortality_rate % </td>";
            } else {
                echo "<td style='color:green'> $new_mortality_rate % </td>";
            }

        }
    }
}

?>
</div>
</section>
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

<style >
.body{
    margin:20px 10px 10px 10px;

}
.wrapper{
    padding-top:10px;
    border-top:2px solid grey;
    display:grid;
    place-items:center;
}

.content-body{
    margin:5px;
    display:grid;
}
#input{
    height:50px;
    width: 300px;
}

.content-input{
    display:flex;
    gap:150px;
}

.input-start{
    display:grid;
    place-items:center;
}

.input-end{
    display:grid;
    place-items:center;
}
.view-data-btn{
    margin-top:30px;
    margin-bottom:10px;
    display:flex;
    justify-content:center;
}

.view-data-btn input{
    border:none;
    border-radius:7px;
    padding:10px;
    background-color:darkblue;
}
.view-data-btn input:hover{
    background-color:blue;
}

#dataExport{
    border-radius:7px;
    padding:10px 20px 10px 20px;
    border:none;
 
}
#dataExport:hover{
    border:none;
}
.gererate-txt{
    display:flex;
    justify-content:center;
    margin-bottom:5px;
}
h3{
    font-weight:bold;
}
</style>