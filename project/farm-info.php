<?php
include("header.php");

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	
	if(!isset($_GET["farmID"])){
		header("location:add-brgy.php");
		sleep(2);
		exit; 
	}
	$farmID = $_GET["farmID"];



    $sql = "SELECT baranggay.baranggay, farm.farmname, farm.farmowner, farm.farm_size, farm.exp, farm.bday,farm.no_farmers,
    farm.contactno, farm.farmID, baranggay.baranggayID
    FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID where farm.farmID=$farmID order by baranggay.baranggay ASC";
    $result = mysqli_query($conn, $sql);

    $row = $result->fetch_assoc();

    $date = $row['bday'];
    $bday = date("F j, Y", strtotime($date));


    $sql1 = "SELECT COUNT(batch) as totalbatch FROM batch where farmID = $farmID";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

            //LAYER

        $unit ="layer";
        $rate = 20;

         $sql2 = "SELECT sum(layer.mortality) as mortality,
         sum(batch.initial) as initial
         FROM batch
         INNER JOIN layer ON batch.batchID = layer.batchID
         INNER JOIN farm ON batch.farmID = farm.farmID
         WHERE farm.farmID = $farmID and batch.unit ='$unit' ";

        $result2 = $conn->query($sql2);
        $row2 = $result2->fetch_array();
        $mortality = $row2['mortality'];
 
       

        $sql3 = "SELECT 
        sum(batch.initial) as initial
        FROM batch
        INNER JOIN farm ON batch.farmID = farm.farmID
        WHERE farm.farmID = $farmID and batch.unit ='$unit' ";

       $result3 = $conn->query($sql3);
       $row3 = $result3->fetch_array();
       $initial = $row3['initial'];

    
       


        
       if ($initial != 0) {
        $mortality_rate = ($mortality / $initial) * 100;
    } else {
        $mortality_rate = "N/A";
    }
    
    if ($mortality_rate === "N/A") {
        $rt = "<span style='color: gray'>N/A</span>";
    } else if ($mortality_rate >= $rate) {
        $new_mortality_rate= number_format($mortality_rate, 2);
        $rt = "<span style='color: red'>$new_mortality_rate % Danger!</span>";
    } else {
        $new_mortality_rate = number_format($mortality_rate, 2);
        $rt = "<span style='color: green'>$new_mortality_rate%</span>";
    }
    



        //BROILER
        $unit1 = "broiler";

        $sql4 = "SELECT sum(broiler.mortality) as mortality, sum(batch.initial) as initial
                 FROM batch
                 INNER JOIN broiler ON batch.batchID = broiler.batchID
                 INNER JOIN farm ON batch.farmID = farm.farmID
                 WHERE farm.farmID = $farmID and batch.unit ='$unit1' ";
        $result4 = $conn->query($sql4);
        $row4 = $result4->fetch_array();
        $mortality1 = $row4['mortality'];
        
        $sql5 = "SELECT sum(batch.initial) as initial
                 FROM batch
                 INNER JOIN farm ON batch.farmID = farm.farmID
                 WHERE farm.farmID = $farmID and batch.unit ='$unit1' ";
        $result5 = $conn->query($sql5);
        $row5 = $result5->fetch_array();
        $initial1 = $row5['initial'];
        
        if ($initial1 != 0) {
            $mortality_rate1 = ($mortality1 / $initial1) * 100;
        } else {
            $mortality_rate1 = "N/A";
        }
        
        if ($mortality_rate1 === "N/A") {
            $rt1 = "<span style='color: gray'>N/A</span>";
        } else if ($mortality_rate1 >= $rate) {
            $new_mortality_rate1 = number_format($mortality_rate1, 2);
            $rt1 = "<span style='color: red'>$new_mortality_rate1% Danger!</span>";
        } else {
            $new_mortality_rate1 = number_format($mortality_rate1, 2);
            $rt1 = "<span style='color: green'>$new_mortality_rate1%</span>";
        }
        


     

}
?>

<body>
<div class="title">
<h1>Farm Details</h1>
</div>
    <section id="wrapper">

        <div class="owner-info">
            <!--
            <div class="farm-owner-img">
                <img id="picture" src="../image/user.png" alt="owner picture">
            </div>
            -->

            <div class="owner-personal-info">
                <h2><?php echo $row['farmowner']; ?></h2>
                <p>Years of Experience: <?php echo $row['exp']; ?> years</p>
                <p>Date of Birth: <?php echo $bday; ?></p>
                <p>Contact Number: <?php echo $row['contactno']; ?> </p>
            </div>
        </div>

        <div class="farm-info">
            <div class="">
                <h2><?php echo $row['farmname']; ?></h2>
                <p>Barangay: <?php echo $row['baranggay']; ?></p>
                <p>Farm Area:<?php echo $row['farm_size']; ?></p>
                <p>No. of Farmers manning the farm: <?php echo $row['no_farmers']; ?>  </p>
            </div>
        </div>

        
        <div class="farm-nav">
        <section class="brgy-summary">
              <div class="brgy-number">
              <h2> <?php echo "<p>".$row1['totalbatch']."<p>" ?></h2>
              </div>
              <div class="rgtr">
                  <p>Number of Batch</p>
              </div>
          </section>

          <section class="brgy-summary">
              <div class="brgy-number">
              <h2> <?php echo "<p>".$rt."<p>" ?></h2>
              </div>
              <div class="rgtr">
                  <p>Layer Mortality Rate</p>
              </div>
          </section>

          <section class="brgy-summary">
              <div class="brgy-number">
              <h2> <?php echo "<p>".$rt1."<p>" ?></h2>
              </div>
              <div class="rgtr">
                  <p>Broiler Mortality Rate</p>
              </div>
          </section>
        </div>
    </section>
</body>

<style>
    #wrapper{
        width: 100%;
        height:100%;
        margin:10px;
        display:flex;
        justify-content: space-evenly;
        gap:20px;
    }
    #picture{
        width:100%;
        height:100%;
        max-width: 100px;

    }
    .owner-info{
        border-radius:10px;
        box-shadow:2px 1px 12px 2px grey;
        background-color:white;
        height:100%;
        width:100%;
        max-width:350px;
        padding:20px;

    }
    .farm-info{
        max-width:350px;
        border-radius:10px;
        box-shadow:2px 1px 12px 2px grey;
        background-color:white;
        padding:20px;
        width:100%;
        height:100%;
        border-radius:10px;
    }

    .farm-nav{
        max-width:350px;
        max-width:400px;
        border-radius:10px;
        max-width:300px;
        width:100%;
        height:100%;
        border-radius:10px;

    }
    .navigations{
        padding:20px 0 0 0;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        gap:20px;
    }
    .title{
        margin-top:20px;
        margin-bottom:30px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

</style>
</html>