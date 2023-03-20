
<?php
include_once '..\project\connect.php'; 

$baranggayID= $_POST['baranggay_data'];

$farm= "SELECT * FROM farm WHERE baranggayID = $baranggayID";

$farm_qry = mysqli_query($conn, $farm);

$output = '<option value="" selected disabled >Select Farm</option>';

while ($farm_row = mysqli_fetch_assoc($farm_qry)) {
    $output .= '<option value="' . $farm_row['farmID'] . '">' . $farm_row['farmname'] . '</option>';
}
echo $output;

?>

