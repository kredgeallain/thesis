<?php 
		 include_once '..\project\connect.php'; 
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
                <select class="form-select" aria-label="Default select example" id="baranggay" name="baranggay">
                    <option disabled selected> Select Barangay</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['baranggayID']; ?>"> <?php echo $row['baranggay']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="brgy-farm">
                <select class="form-select" aria-label="Default select example" id="farm" name="farm">

                    <option disabled selected> Select Farm</option>

                </select>
            </div>




        </section>
        <section class="frm-btch" id="batch1" class="fetch">
            <?php

   
if(isset($_POST['submit'])){

    $batch = $_POST['batch'];
    $farmID = $_POST['farmID'];
    $date = $_POST['date'];
    $unit = $_POST['unit'];
    $initial = $_POST['initial'];

  //  $batch_filter= "SELECT * from `batch` where batch = $batch";

   // $result_batch = mysqli_query($data, $batch_filter);

   // if(mysqli_num_rows($result_batch) > 0){


     //   echo '<script type="text/javascript">window.alert("Batch Already Existed");</script>';



  //  }

  //  else{

    $insert = " INSERT INTO `batch`(`farmID`, `batch`, `unit`, `initial`, `date`) 
        VALUES ('$farmID','$batch','$unit','$initial','$date') ";
mysqli_query($data, $insert);

        echo '<script type="text/javascript">window.alert("Batch Added");</script>';
   // };


}
            ?>


        </section>



        <script>
        $('#baranggay').on('change', function() {
            var baranggayID = this.value;
            console.log(baranggayID);



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
                url: "batcheslist.php",
                data: {
                    farm_data: farmID
                },
                success: function(result) {
                    $('#batch1').html(result);
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

        .fetch {
            border: 1px;
            margin: 50px;
        }
        </style>

</body>

</html>