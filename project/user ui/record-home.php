<?php 
		 include_once '..\connect.php'; 
         include('header2.php');
		 $query = "SELECT * FROM baranggay "; 
 		$result = mysqli_query($conn,$query);
 		?>



<body>
    
    <section class="wrapper">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <section class="wrapper-brgy">
            <div class="brgy">
            <select class="form-select" aria-label="Default select example"  id="baranggay" name="baranggay">
                    <option disabled selected> Select Barangay</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['baranggayID']; ?>"> <?php echo $row['baranggay']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="brgy-farm">
            <select class="form-select" aria-label="Default select example"  id="farm" name="farm">
              
                    <option  disabled selected> Select Farm</option>

                </select>
            </div>


            <div class="frm-btch">
                <select class="form-select" aria-label="Default select example"  id="batch" name="batch">
                    <option disabled selected> Select Batch</option>

                </select>

                
            </div>

           

        </section>

        	<?php

   
        if(isset($_POST['submit'])){

            $batchID = $_POST['batchID'];
            $date = $_POST['date'];
            $no_eggs = $_POST['no-eggs'];
            $rej_eggs = $_POST['rej-eggs'];
            $mortality = $_POST['mortality'];
            $userID = $_POST['userID'];
            $crr = $_POST['crr'];
            $fdate = $_POST['f_date'];
            $tdate = $_POST['t_date'];

            if ($mortality>$crr) {
            

                sleep(1);
                echo '<script language="javascript" type="text/javascript">
                alert("Mortality Exceed Limit");
                window.location = "record-home.php";
                </script>';

            }

            else{
            


            $insert = " INSERT INTO `layer`(`layerID`, `batchID`, `no_eggs`, `reject_eggs`, `mortality`, `date`,`userID`,`f_date`,`t_date` ) 
                VALUES ('','$batchID','$no_eggs','$rej_eggs','$mortality','$date','$userID','$fdate','$tdate') ";

                

                $success = mysqli_query($data, $insert);

             if ($success) {
                $verfy = " SELECT SUM(layer.mortality) as mortality, batch.initial FROM layer 
                inner join batch on layer.batchID = batch.batchID where layer.batchID = $batchID";

                $result = $conn->query($verfy);
                $row = $result->fetch_assoc();

                $initial = $row['initial'];
                $mortality = $row['mortality'];
                $current = $initial-$mortality;
                $status = "off";
                
                if ($current<='0'){

                    mysqli_query($data, "UPDATE `batch` SET `status` = '$status' WHERE `batchID` = '$batchID' ");

                    sleep(1);
                    echo '<script language="javascript" type="text/javascript">
                    alert("Production Data Added!");
                    window.location = "record-home.php";
                    </script>';

                }
                else {
                sleep(1);
                echo '<script language="javascript" type="text/javascript">
                alert("Production Data Added!");
                window.location = "record-home.php";
                </script>';
       
                }
             }
            }
            

            }elseif(isset($_POST['submit1'])){

                $batchID = $_POST['batchID'];
                $date = $_POST['date'];
                $broiler_weight = $_POST['weight'];
                $Bcurrent = $_POST['current'];
                $reject = $_POST['reject'];
                $mortality = $_POST['mortality'];
                $userID =  $_POST['userID'];
                $initial =  $_POST['initial'];
                $status = "off";

                $t = $Bcurrent+$reject+$mortality;

                if($t>$initial){

                    sleep(1);
                    echo '<script language="javascript" type="text/javascript">
                    alert("Total count ecxeed the initial count!");
                    window.location = "record-home.php";
                    </script>';

                }


                else{
        
                $insert = " INSERT INTO `broiler`(`broilerID`, `batchID`, `broiler_weight`, `Bcurrent`, `reject`, `mortality`, `date`, `userID`) 
                VALUES ('','$batchID','$broiler_weight','$Bcurrent','$reject','$mortality','$date','$userID')";
                  $success =  mysqli_query($data, $insert);
                    sleep(1);
                    
                    if ($success) {
                  mysqli_query($data, "UPDATE `batch` SET `status` = '$status' WHERE `batchID` = '$batchID' ");
        
                  echo '<script language="javascript" type="text/javascript">
                  alert("Production Data Added!");
                  window.location = "record-home.php";
                  </script>';
                 
                  }
                    
        }
    }
        

?>

        <div id="record">

            <?php	//$batchID= $_POST['batch_data']; 
	
	
	?>

        </div>


        <script>
        $('#baranggay').on('change', function() {
            var baranggayID = this.value;
            console.log(baranggayID);

            //  data:{
            //	baranggay_data: baranggayID
            //}

            $.ajax({
                type: "POST",
                url: 'getfarm.php',
                data: {
                    baranggay_data: baranggayID
                },
                success: function(result) {
                    $('#farm').html(result);
                }
            })
        });

        $('#farm').on('change', function() {
            var farmID = this.value;
            console.log(farmID);

            $.ajax({
                type: "POST",
                url: "getbatch1.php",
                data: {
                    farm_data: farmID
                },
                success: function(result) {
                    $('#batch').html(result);
                }
            })

        });

        $('#batch').on('change', function(e) {
            var batchs = this.value;
            console.log(batchs);
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "getrecord.php",
                data: {
                    batch_data: batchs
                },

                success: function(result) {
                    $('#record').html(result);
                }



            })

        });
        </script>
</section>

  
<!--
  <script>
  var div = document.getElementById('footer');

  function updatePosition() {
    div.style.bottom = window.scrollY + window.innerHeight - div.offsetHeight + 'px';
  }

  window.addEventListener('scroll', updatePosition);
  window.addEventListener('resize', updatePosition);
</script>
-->



            <style type="text/css">
        * {
            font-family: tahoma;
            padding: 0px;
            margin: 0px;

        }

        .wrapper{
            margin:10px;
        }

        @media screen and (max-width: 800px){
            .wrapper-brgy select {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 50px !important;
            border-radius: 5px;
        }

        select{
            font-size:10px !important;
        }

}

        .wrapper-brgy select {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 100px;
            margin-top: 20px;
            margin-bottom:20px;
            border-radius: 5px;
        }




        .wrapper-brgy input[type=submit] {
            margin-top: 35px;
            margin-right: 90px;
            margin-left: 250px;
            width: 200px;
            border-radius: 20px;
            background-color: #0e2a83;
            border: none;
            color: white;
            padding: 16px 32px;
            text-decoration: none;
            cursor: pointer;
        }


        .wrapper-brgy {
            display: flex;
            justify-content: space-evenly;

        }

        .fetch {
            border: 1px;
            margin: 50px;
        }

            </style>

</body>

</html>