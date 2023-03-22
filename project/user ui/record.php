<?php 
		 include_once '..\connect.php'; 
		 $query = "SELECT * FROM baranggay "; 
 		$result = mysqli_query($conn,$query);	
 		?>
<?php
include('header.php');
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
            $Lcurrent = $_POST['Lcurrent'];
            $mortality = $_POST['mortality'];
            $userID =  $_POST['userID'];
           


            $insert = " INSERT INTO `layer`(`layerID`, `batchID`, `no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`, `userID`) 
                VALUES ('','$batchID','$no_eggs','$rej_eggs','$Lcurrent','$mortality','$date','$userID') ";

                

                mysqli_query($data, $insert);
                sleep(1);// }

                echo '<script language="javascript" type="text/javascript">
                alert("Production Data Added!");
                window.location = "homepage.php";
                </script>';

    }elseif(isset($_POST['submit1'])){

        $batchID = $_POST['batchID'];
        $date = $_POST['date'];
        $broiler_weight = $_POST['weight'];
        $Bcurrent = $_POST['current'];
        $mortality = $_POST['mortality'];
        $userID =  $_POST['userID'];
        $status = "off";

        $insert = " INSERT INTO `broiler`(`broilerID`, `batchID`, `broiler_weight`, `Bcurrent`, `mortality`, `date`, `userID`) 
        VALUES ('','$batchID','$broiler_weight','$Bcurrent','$mortality','$date','$userID')";
          $success =  mysqli_query($data, $insert);
            sleep(1);
            
            if ($success) {
          mysqli_query($data, "UPDATE `batch` SET `status` = '$status' WHERE `batchID` = '$batchID' ");

            
          echo '<script language="javascript" type="text/javascript">
            alert("Production Data Added!");
            window.location = "homepage.php";
            </script>';
          }
            
}

        

?>

        <div id="record">

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
<!--footer-->


    <section class="footer">
    <div class="container text-center">
      
      <div class="row">
        <div  class="col" id="col">
          <div class="d-grid gap-2">
            <a href="record.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 16">
              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
            </svg><br>Record</a>
          </div>
        </div>
        
  
        <div class="col" id="col">
          <div class="d-grid gap-2">
            <a href="farm-map.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-pin-map-fill" viewBox="0 0 20 16">
              <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
              <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
            </svg><br>Map</a>
          </div>
        </div>

        <div class="col" id="col">
          <div class="home">
          <div class="d-grid gap-2">
            <a href="homepage.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="40" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 20 16">
              <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
            </svg></a>
          </div>
        </div>
        </div>

        <div class="col" id="col">
          <div class="d-grid gap-2">
            <a href="farm-map.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-file-earmark-medical-fill" viewBox="0 0 20 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zm-3 2v.634l.549-.317a.5.5 0 1 1 .5.866L7 7l.549.317a.5.5 0 1 1-.5.866L6.5 7.866V8.5a.5.5 0 0 1-1 0v-.634l-.549.317a.5.5 0 1 1-.5-.866L5 7l-.549-.317a.5.5 0 0 1 .5-.866l.549.317V5.5a.5.5 0 1 1 1 0zm-2 4.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zm0 2h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1z"/>
</svg><br>Layer</a>
          </div>
        </div>

        <div class="col" id="col">
          <div class="d-grid gap-2">
            <a href="farm-map.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="20" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 20 16">
  <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z"/>
</svg><br>Broiler</a>
          </div>
        </div>


      </div>
    </div>
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
                margin-bottom:410px;

            }

            .wrapper-brgy {
                display: flex;
                justify-content: space-evenly;
            }

  .footer {
    background-color:darkgrey;
    position: sticky;
    width: 100%;
    border-top:1px solid grey;
    bottom: 0;
    left:0;
    right:0;
    display: flex;
    justify-content: center;
    padding-top: 10px !important;
    
  }

  .footer a{
    font-size: 15px;
    border:none;
    font-weight: bold;
    background-color: transparent;
    color: black;
    padding: 15px 0 15px 0;
  }
  
  .footer a:hover{
    background-color:transparent;
    color:black;
  }
  
  .home a{
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 0;
    margin-right: 0;
    border: none;
  }

  .home a:hover{
    background-color: transparent;
    color: blue;
  }

  #col{
    padding:0;
  }

            </style>

</body>

</html>