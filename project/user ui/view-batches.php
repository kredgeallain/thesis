<?php 
		 include_once 'connect.php'; 
		 $query = "SELECT * FROM baranggay "; 
 		$result = mysqli_query($conn,$query);	
 		?>
<?php
include('header2.php');
?>




<body>






    <section class="wrapper">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
        </script>

        <section class="wrapper-brgy">
            <div class="brgy">
                <select class="form-select form-select-sm"  id="baranggay" name="baranggay">
                    <option disabled selected> Select Barangay</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['baranggayID']; ?>"> <?php echo $row['baranggay']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="brgy-farm">
                <select class="form-select form-select-sm" id="farm" name="farm">

                    <option disabled selected> Select Farm</option>

                        
                   

                </select>
            </div>




        </section>
        <section class="frm-btch" id="batch1" class="fetch">
            <?php

   
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

        .wrapper{
            margin:10px;
        }

        @media screen and (max-width: 800px){
        select{
            font-size:10px !important;
        }

}

        .wrapper-brgy select {
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 100px;
            margin-top:20px;
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