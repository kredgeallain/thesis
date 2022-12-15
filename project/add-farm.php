<?php
@include 'connect.php';

$bfetch= '';

 $sqlb = "SELECT * FROM baranggay ";
 $statement = $data1->prepare($sqlb);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $bfetch .= '<option value="   '.$row["baranggayID"].'  ">    '.$row["baranggay"].'      </option>';
 }


if(isset($_POST['submit'])){
	$fname = mysqli_real_escape_string($data, $_POST['farmname']);
	$fowner = mysqli_real_escape_string($data, $_POST['farmowner']);
	$brgy = ($_POST['baranggayID']);
	$contactno = $_POST['contactno'];
	$lat = $_POST ['latclicked'];
	$long = $_POST ['longclicked'];

	$date = $_POST['date'];
	$batch = $_POST ['batch'];
	$unit = $_POST ['unit'];
	$initial = $_POST ['initial'];

	$check_farm_id = "SELECT * from farm  WHERE farmname = '".$fname."' ";

	$result = mysqli_query($data, $check_farm_id);

	if(mysqli_num_rows($result) > 0){
 
	   header('location:add-farm.php?add=error1');
 
	}else{
		  
		$sql = " SELECT * from  farm as f
		INNER JOIN baranggay as b ON b.baranggayID = f.baranggayID";
		mysqli_query($data, $sql);

		
		$sqlInsert = "INSERT INTO farm (farmname, farmowner,contactno,baranggayID, lat, lng) 
					VALUES ('$fname', '$fowner', '$contactno', '$brgy', '$lat', '$long');";	
		$sql2 = mysqli_query($data, $sqlInsert);
		$farmID = mysqli_insert_id($data);
		//echo '<script> alert("New Farm Added") </script>';


	 	if ($sql2) {
			/*$sqlx = " SELECT * from  batch as s
			INNER JOIN farm as f ON s.farmID = f.farmID";
			mysqli_query($data, $sqlx); */

			$sqlInsert2 = "INSERT INTO batch (date,batch,unit, initial,farmID) 
			VALUES ('$date', '$batch', '$unit', '$initial', '$farmID');"; 
				$sql3 = mysqli_query($data, $sqlInsert2);

		}else {

			header('location:add-farm.php?add=error2');
		}

		header('location:add-farm.php?add=success');
	}


};	


?>


<?php include ("header.php");  ?>


<section class="form">
    <form action="#" method="post">

    <div class="form-title">
        <h2>Poultry Farm Registration Form</h2>
    </div>



        <?php

			  if(isset($_GET['add'])){
					$add = $_GET['add'];
					if($add=='success'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-success">Farm Successfuly Added</span> </div>';
					}
					else if($add=='error1'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Farm Already Exist</span> </div>';
					}
					else if($add=='error2'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Batch Error</span> </div>';
					}
				
				
			 };
    	?>
        <form action="#" method="POST">

        
            <div class="form-body">
                <!--Form-->
             <div class="inputs">
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="farmname" name="farmname" placeholder="farm Name"
                        required="true">
                    <label for="floatingInput" required="true">Farm Name</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="farmowner" id="farmowner"
                        placeholder="Farm Owner" required="true">
                    <label for="floatingInput" required="true">Farm Owner</label>
                </div>
                <select class="form-select" name="baranggayID" aria-label="Default select example" required="true">
                    <option disabled selected>Barangay</option>
                    <?php echo $bfetch; ?>
                    <option disabled >Add Barangay if your Barangay don't exist!</option>
                </select>
               
   <div class="add-brgy-button">
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 20">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg>Add Barangay</button>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Barangay</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Barangay</span>
  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
</div>

   

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>  

   </div>


                <div class="form-floating mb-3">
                    <input type="contact" class="form-control" name="contactno" id="contactno"
                        placeholder="Contact No." required="true">
                    <label for="floatingInput" required="true" d>Contact No.</label>
                </div>
            </div>
                <!--Add batch-->
                <p>
                 
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="addbatch-button"
                        data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 20 20">
  <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg>
                        Add Batch
                    </button>
                    
                    <!--farm location-->
                    
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="farmlocation-button"
                        data-bs-target="#staticBackdrop1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pin-map" viewBox="0 0 20 20">
  <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"/>
  <path fill-rule="evenodd" d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"/>
</svg>
                        Farm Location
                    </button>
                   
                <div class="submit">
                    <input type="submit" class="btn btn-primary" name="submit" value="Register" id="submit">
                </div>
                </p>

                <!--AddBatch Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Batch</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--modal content-->
                                <div class="card card-body">
                                    <input type="date" class="form-control" id="date" name="date"
                                        aria-describedby="emailHelp" required="true">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="batch" name="batch"
                                            placeholder="Batch Name" required="true">
                                        <label for="floatingInput">Batch Name</label>
                                    </div>
                                    <select class="form-select form-select-sm" name="unit"
                                        aria-label=".form-select-sm example">
                                        <option disable selected>Select Farm Unit</option>
                                        <option value="layer">Layer</option>
                                        <option value="broiler">Broiler</option>
                                    </select>
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control" id="intial" name="initial"
                                            placeholder="Initial Number" required="true">
                                        <label for="floatingInput">Initial Number</label>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                <!--plot map Modal -->
                <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Farm Location</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!--mapmodal content-->
                                <div class="card card-body">
                                    <div class="form-floating mb-3">
                                        <input type="text" disabled class="form-control" id="latclicked" name="latclicked"
                                            placeholder="" required="true">
                                        <label for="floatingInput">Latitude</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" disabled class="form-control" id="longclicked" name="longclicked"
                                            placeholder="" required="true">
                                        <label for="floatingInput">Longitude</label>
                                    </div>

                                    <div id="map"></div>

                                    <!-- map script-->
                                    <script type="text/javascript">
                                    var map;

                                    function initMap() {
                                        var latitude = 10.592248;
                                        var longitude = 122.690637;

                                        var myLatLng = {
                                            lat: latitude,
                                            lng: longitude
                                        };

                                        map = new google.maps.Map(document.getElementById('map'), {
                                            center: myLatLng,
                                            zoom: 14.5,
                                           // disableDoubleClickZoom: true,
                                            mapTypeId: google.maps.MapTypeId.HYBRID
                                        });


                                        google.maps.event.addListener(map, 'click', function(event) {
                                            document.getElementById('latclicked').value = event.latLng.lat();
                                            document.getElementById('longclicked').value = event.latLng.lng();
                                        });

                                        var marker = new google.maps.Marker({
                                            position: myLatLng,
                                            map: map,
                                        });

                                        google.maps.event.addListener(map, 'click', function(event) {

                                            marker.setMap(null);


                                            var newMarker = new google.maps.Marker({
                                                position: event.latLng,
                                                map: map

                                            });


                                            marker = newMarker;

                                        });

                                    }
                                    </script>
                                    <script
                                        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_vL53nszxM8EsMd8rVkZRr4Fw9Va7sE&callback=initMap"
                                        async defer></script>


                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                                </div>

              

</section>


<!--style-->

<style type="text/css">
#map {
    height: 300px;
    width: 420px;
}


.form {
    position:relative;
    display: grid !important;
    justify-content: center !important;
    align-items: center !important;
    margin-top: 20px !important;
    margin-bottom: 20px;
    background-color: #f9faff;
    box-shadow: 2px 2px 2px 2px grey;
    border-radius: 10px;
    padding: 20px 0 20px 0 !important;

}

.form-title h2 {
    margin-bottom: 40px;
    font-weight: bold;
}

.sec1 {
    padding-top: 20px;
    height: 100%;
    width: 30%;
    background-color: #f9faff;
    box-shadow: 2px 2px 2px 2px grey;
}

.btn1 button {
    font-weight: bolder;
    margin-top: 30px;
    margin-left: 10%;
    margin-bottom: 40px;
    background-color: #04AA6D;
    border: 2px solid black;
    color: black;
    padding: 10px 24 px;
    cursor: pointer;
    width: 80%;
    padding-top: 10px;
    padding-bottom: 10px;
    border-radius: 10px;
}

input {
    padding-left: 10px !important;
    padding-right: 10px !important;
}


.form-body h2 {
    margin-bottom: 35px;
}


.add-brgy-button{
display:flex;
justify-content:flex-start;
}

.add-brgy-button button{
    border:none;
    background-color:#00b7EB;
}

.add-brgy-button button:hover{
    border:none;
    background-color:#007FFF;
}
form{
    display:grid;
}

.form-body{
    display:grid;
    align-content:center;
    align-items:center;
}

.form-body p{
    display:grid;
}

.submit{
    display:grid;
    justify-content:center;
}

.submit input{
    border:none;
    background-color:darkblue;
    color:white;
}
.submit input:hover{
    border:none;
    background-color:blue;
    color:white;
}

#addbatch-button{
    background-color:green;
}

#addbatch-button:hover{
    background-color:darkgreen;
}

#farmlocation-button{
    border:none;
    background-color:#0047AB;
}

#farmlocation-button:hover{
    border:none;
    background-color:#0067A5;
}
</style>




</body>

</html>