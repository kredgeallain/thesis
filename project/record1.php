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
            <select class="form-select"  id="baranggay" name="baranggay">
                    <option disabled selected> Select Barangay</option>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                    <option value="<?php echo $row['baranggayID']; ?>"> <?php echo $row['baranggay']; ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div class="brgy-farm">
            <select class="form-select"  id="farm" name="farm">
              
                    <option  disabled selected> Select Farm</option>

                </select>
            </div>


            <div class="frm-btch">
                <select class="form-select"  id="batch" name="batch">
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


        <!--
<section class="record">
	<details>

			<summary><p>Record</p></summary>

	<section class = "form">

	<div class = "sec1">
		<div class="date">
		<form>
				<span>
					<label for="day">Day</label>
					<select id="day" name="day">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option >16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
				</span>

	    		<span>
	      			<label for="month">Month:</label>
				      <select id="month" name="month">
				        <option>January</option>
				        <option>February</option>
				        <option>March</option>
				        <option>April</option>
				        <option>May</option>
				        <option>June</option>
				        <option>July</option>
				        <option>August</option>
				        <option selected>September</option>
				        <option>October</option>
				        <option>November</option>
				        <option>December</option>
				      </select>
				    </span>

				    <span>
				      <label for="year">Year:</label>
				      <select id="year" name="year">
				      	<option>2020</option>
				      	<option>2021</option>
				      	<option selected>2022</option>
				      	<option>2023</option>
				      	<option>2024</option>
				      	<option>2025</option>
				      	<option>2026</option>
				      	<option>2027</option>
				      </select>
				    </span>

		</form>
		</div>

<div class="week">
	<label for="week">Week: </label>
	<select id="week" name="week">
		<option>1</option>
		<option>2</option>
		<option>3</option>
		<option>4</option>
	</select>
</div>
<section class="layer">
<div class="no-eggs">
	<label for="no-eggs">Number of Eggs: </label>
	<input type="number" name="no-eggs" id="no-eggs">
</div>


<div class="rej-eggs">
	<label for="rej-eggs">Reject Eggs: </label>
	<input type="number" name="rej-eggs" id="rej-eggs">
</div>
</section>

<section class="broiler">
<div class="kilogram">
	<label for="kilo">Meat in kg: </label>
	<input type="weight" name="kilo" id="kilo">
</div>

<div class="dead">
	<label for="dead">Dead: </label>
	<input type="number" name="dead" id="dead" >
</div>
</section>
<div class="button">
	<input type="submit" name="save-data" id="save-data" value="Save">
</div>
	
</div>
		
</section>
		
	</details>
</section>
</section>
		
-->
        <! style>

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