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
                <label for="brgy">Barangay</label>
                <select id="baranggay" name="baranggay">
                    <option selected disabled> Select Barangay </option>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['baranggayID']; ?>"> <?php echo $row['baranggay']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="brgy-farm">
                <label for="farm">Select farm</label>
                <select id="farm" name="farm">
                    <option> Select Farm</option>

                </select>
            </div>


            <div class="frm-btch">
                <label for="batch">Select Batch</label>
                <select id="batch" name="batch">
                    <option> Select Batch</option>

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

            $insert = " INSERT INTO `layer`(`layerID`, `batchID`, `no_eggs`, `reject_eggs`, `Lcurrent`, `mortality`, `date`) 
                VALUES ('','$batchID','$no_eggs','$rej_eggs','$Lcurrent','$mortality','$date') ";

                

                mysqli_query($data, $insert);
                sleep(1);
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



        <! style>

            <style type="text/css">
            * {
                font-family: tahoma;
                padding: 0px;
                margin: 0px;

            }

            .header {
                background-color: #0e2a83;
                padding: 15px;
            }

            .header p {
                margin-top: -10px;
            }

            .logo {
                margin-left: -10px;
                display: flex;
                padding-bottom: 10px;
            }

            .logo p {
                color: white;
                padding-left: 20px;
            }

            .logo img {
                padding: 5px;
                margin-top: -10px;
            }

            .logo h1 {
                color: white;
                text-decoration: overline;
                font-size: 25px;
                padding-left: 15px;
                padding-right: 10px;
                padding-top: 15px;
                padding-bottom: 10px;
                margin-left: -200px;


            }

            .text p {
                color: white;
                margin-top: -45px;
                padding-top: 5px;
                padding-left: 90px;
                margin-bottom: 5px;
            }



            .title {
                font-size: 20px;
                display: flex;
                justify-content: center;
                padding-bottom: 10px;
            }

            .nav {
                background-color: #163289;
                display: flex;
                margin-top: -58px;
                margin-bottom: -15px;
                padding-top: 25px;
                position: absolute;
                border: 1px solid #0e2a83;
                right: 0;
            }


            .user {
                margin-top: -45px;
                margin-right: 30px;
            }

            .home {
                margin-top: -5px;
            }

            .home a {
                font-size: 16px;
                text-decoration: none;
                color: white;
                padding: 16px;
                margin-right: 10px;
                text-shadow: 1px 1px #9a9b9e;
            }


            .home a:hover {
                color: black;
                padding: 16px;

            }

            .user a {
                margin-right: 1px;
            }

            ul {
                padding-top: 10px;
                border-radius: 15px;
                box-shadow: 2px, 2px, 2px, 2px black;
                background-color: grey;
                padding-bottom: 10px;
                margin-top: -3px;
                margin-left: -210px;
                margin-bottom: -203px;

            }

            li:hover {
                padding: 18px;
                background-color: #ddd;
            }

            li {
                border-radius: 15px;
                padding-bottom: 10px;
                padding-top: 20px;
                padding-left: 10px;
                padding-right: 20px;
                list-style: none;
            }

            .side-menu {

                display: flex;
                justify-content: flex-end;
                margin-top: px;
                margin-bottom: 20px;
            }

            .user img {
                margin-top: 14px;
            }

            .summ {
                margin-left: 25px;
                cursor: pointer;
                list-style: none;
            }

            .drop-menu a {
                text-decoration: none;
                color: white;
            }

            /* dropdown button */
            .dropbtn0 {
                color: white;
                text-shadow: 1px 1px #9a9b9e;
                padding: 16px;
                padding-right: 10px;
                padding-left: 10px;
                font-size: 16px;
                border: none;
                justify-items: center;
                background-color: transparent;
            }

            .dropdown0 {
                margin-top: -10px;
                display: inline-block;
            }

            .dropdown0 label {
                padding: 5px;
                color: black;
                margin-bottom: 100px;
            }

            .dropdown0 .dropbtn0 {

                margin-left: 5px;
                cursor: pointer;
            }

            .dropdown-content0 {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
                margin-left: 5px;



            }

            .dropdown-content0 a {
                color: black;
                padding: 20px;
                text-decoration: none;
                display: block;

            }

            .dropdown-content0 a:hover {
                background-color: #ddd;
            }

            .dropdown0:hover .dropdown-content0 {
                display: block;
            }

            .dropdown0:hover .dropbtn0 {
                color: black;
                background-color: blue;
                text-shadow: none;
            }

            /*dropdown2*/

            .dropbtn2 {
                color: white;
                text-shadow: 1px 1px #9a9b9e;
                padding-right: 10px;
                padding-left: 10px;
                padding: 16px;
                font-size: 16px;
                border: none;
                justify-items: center;
                background-color: transparent;
            }

            .dropdown2 {
                margin-top: -10px;
                display: inline-block;
            }

            .dropdown2 label {
                padding: 5px;
                color: black;
                margin-bottom: 100px;
            }

            .dropdown2 .dropbtn2 {

                /* margin-top: 100px; */
                margin-left: 5px;
                cursor: pointer;
            }

            .dropdown-content2 {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
                margin-left: 5px;

            }

            .dropdown-content2 a {
                color: black;
                padding: 20px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content2 a:hover {
                background-color: #ddd;
            }

            .dropdown2:hover .dropdown-content2 {
                display: block;
            }

            .dropdown2:hover .dropbtn2 {
                background-color: blue;
            }

            /*dropdown3*/

            .dropbtn3 {
                color: white;
                text-shadow: 1px 1px #9a9b9e;
                padding-right: 10px;
                padding-left: 10px;
                padding: 16px;
                font-size: 16px;
                border: none;
                justify-items: center;
                background-color: transparent;
            }

            .dropdown3 {
                margin-top: -10px;
                display: inline-block;
            }

            .dropdown3 label {
                padding: 5px;
                color: black;
                margin-bottom: 100px;
            }

            .dropdown3 .dropbtn3 {

                /* margin-top: 100px; */
                margin-left: 5px;
                cursor: pointer;
            }

            .dropdown-content3 {
                display: none;
                position: absolute;
                background-color: #f1f1f1;
                min-width: 100px;
                box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                z-index: 1;
                margin-left: 5px;

            }

            .dropdown-content3 a {
                color: black;
                padding: 20px;
                text-decoration: none;
                display: block;
            }

            .dropdown-content3 a:hover {
                background-color: #ddd;
            }

            .dropdown3:hover .dropdown-content3 {
                display: block;
            }

            .dropdown3:hover .dropbtn3 {
                background-color: blue;
            }

            select {
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 100px;
                margin: 30px;
                margin-left: 10px;
                outline: 0;
                background-image: none;
                border: 1px solid black;
                border-radius: 5px;
            }




            input[type=submit] {
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

            input {
                width: 90px;
                color: black;
                border-radius: 20px;
                padding: 10px;
                margin: 10px;
                margin-left: 10px;
            }

            label {
                font-size: 20px;
            }

            .wrapper {
                margin-right: 80px;
                margin-left: 80px;
            }

            .wrapper-brgy {
                display: flex;
                justify-content: center;
            }

            .wrapper-batch {
                display: flex;
                justify-content: center;
            }

            .record {
                margin-bottom: 30px;
                margin-top: 30px;
                display: flex;
                justify-content: center;
            }

            .record summary {
                font-weight: bold;
                margin-top: -30px;
                font-size: 17px;
                cursor: pointer;
                list-style: none;
            }

            .record p {
                color: white;
                margin-right: 1px;
                margin-left: 1px;
                padding-top: 10px;
                padding-bottom: 10px;
                padding-right: 45px;
                padding-left: 25px;
                background-color: #0e2a83;
                border: solid grey 2px;
                padding-right: 15px;
            }

            .sec1 {
                margin-top: 50px;
                padding: 20px;
                background-color: #f9faff;
                box-shadow: 2px 2px 2px 2px grey;
                border-radius: 15px;
            }
            </style>



</body>

</html>