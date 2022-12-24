<?php include ("header.php");  ?>
<!--body-->
  <main>
  <Section class="wrapper">

    <div class="container text-center">
      <div class="row">
        <div class="col">
          <h1>Record Production</h1>
        </div>

        <div class="row">
          <div class="col">
          <?php 
		 include_once '../connect.php'; 
		 $query = "SELECT * FROM baranggay "; 
 		$result = mysqli_query($conn,$query);	
 		?>


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


        	<?php

   
        if(isset($_POST['submit'])){

            $batchID = $_POST['batchID'];
            $date = $_POST['date'];
            $no_eggs = $_POST['no-eggs'];
            $rej_eggs = $_POST['rej-eggs'];
            $Lcurrent = $_POST['Lcurrent'];
            $mortality = $_POST['mortality'];
            


            $insert = " INSERT INTO `layer`(`layerID`, `batchID`, `no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`) 
                VALUES ('','$batchID','$no_eggs','$rej_eggs','$Lcurrent','$mortality','$date') ";

                

                mysqli_query($data, $insert);
                sleep(1);// }
    }elseif(isset($_POST['submit1'])){

        $batchID = $_POST['batchID'];
        $date = $_POST['date'];
        $broiler_weight = $_POST['weight'];
        $Bcurrent = $_POST['current'];
        $mortality = $_POST['mortality'];

        $insert = " INSERT INTO `broiler`(`broilerID`, `batchID`, `broiler_weight`, `Bcurrent`, `mortality`, `date`) 
        VALUES ('','$batchID','$broiler_weight','$Bcurrent','$mortality','$date')";
            mysqli_query($data, $insert);
            sleep(1);
            
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
                url: '../getfarm.php',
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
                url: "../getbatch1.php",
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
                url: "../getrecord.php",
                data: {
                    batch_data: batchs
                },

                success: function(result) {
                    $('#record').html(result);
                }



            })

        });
        </script>

          </div>
        </div>
      </div>  
    </div>        
  </Section>
</main>
<!--footer-->
<?php include ("footer.php");  ?>



<!--style-->
<style type="text/css">

  .col{
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .col1{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .col1 select{
    margin-left: 5px;
    margin-right: 5px;
  }

  .col2{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .col2 select{
    margin-left: 5px;
    margin-right: 5px;
  }


  .col3{
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .col4{
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 5px;
    margin-right: 20px;
  }

  select{
    margin-top: 10px;
    margin-bottom: 10px;
  }



</style>

<!--style-->

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