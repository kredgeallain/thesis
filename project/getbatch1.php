
<?php
include_once '..\project\connect.php'; 

$farmID= $_POST['farm_data'];

$batch= "SELECT * FROM batch WHERE farmID = $farmID";

$batch_qry = mysqli_query($conn, $batch);

$output = '<option value="" selected disabled >Select Batch</option>';

while ($batch_row = mysqli_fetch_assoc($batch_qry)) {
    $output .= '<option value="' . $batch_row['batchID'] . '">' . $batch_row['batch'] . '</option>';
}
echo $output;

?>