<?php
 include('header.php');
 

include '..\project\connect.php'; 




?>


<?php 

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
            $user = $_POST['userID'];
            $date = $_POST['date'];
            $no_eggs = $_POST['no-eggs'];
            $rej_eggs = $_POST['rej-eggs'];
            $Lcurrent = $_POST['Lcurrent'];
            $mortality = $_POST['mortality'];
            


            $insert = " INSERT INTO `layer`(`layerID`, `batchID`, `userID`, `no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`) 
                VALUES ('','$batchID','$user','$no_eggs','$rej_eggs','$Lcurrent','$mortality','$date') ";

                mysqli_query($data, $insert);
                sleep(1);

                echo '<script language="javascript" type="text/javascript">
					alert("Production Data Added!");
					window.location = "homepage.php";
					</script>';

    }elseif(isset($_POST['submit1'])){

        $batchID = $_POST['batchID'];
        $user = $_POST['userID'];
        $date = $_POST['date'];
        $broiler_weight = $_POST['weight'];
        $Bcurrent = $_POST['current'];
        $mortality = $_POST['mortality'];

        $insert = " INSERT INTO `broiler`(`broilerID`, `batchID`, `userID`, `broiler_weight`, `Bcurrent`, `mortality`, `date`) 
        VALUES ('','$batchID','$user','$broiler_weight','$Bcurrent','$mortality','$date')";
          $success=  mysqli_query($data, $insert);
            sleep(1);

            echo '<script language="javascript" type="text/javascript">
            alert("Production Data Added!");
            window.location = "homepage.php";
            </script>';
            
            
            if ($succcess) {
                mysqli_query($data, "UPDATE `batch` SET `status` = '$f', `farmowner` = '$fown',`contactno` = '$no' WHERE `farmID` = '$fID' ");
      
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

        $('#farm').on('change', function(e) {
            var farmID = this.value;
            console.log(farmID);
            e.preventDefault();
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




            <style type="text/css">
            * {
                font-family: tahoma;
                padding: 0px;
                margin: 0px;

            }

             select {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 100px;
                margin: 30px;
                margin-left: 10px;
                outline: 0;
                background-image: none;
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

           
            .wrapper {
                margin-right: 80px;
                margin-left: 80px;
            }

            .wrapper-brgy {
                display: flex;
                justify-content: space-evenly;
            }
          
            </style>

</body>

</html>