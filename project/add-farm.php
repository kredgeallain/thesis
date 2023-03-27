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
    $q = $_POST['lt'];
	$a =$_POST['lg'];
	$date = $_POST['date'];
    $size = $_POST['farm_size'];
    $no_f = $_POST['no_farmers'];
    $bday = $_POST['bday'];
    $exp = $_POST['exp'];
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

		
		$sqlInsert = "INSERT INTO farm (farmname,farm_size,no_farmers, farmowner,bday,exp, contactno, baranggayID, lat, lng) 
					VALUES ('$fname','$size','$no_f', '$fowner','$bday','$exp', '$contactno', '$brgy', '$q', '$a');";	
		$sql2 = mysqli_query($data, $sqlInsert);
		$farmID = mysqli_insert_id($data);

/*	if ($sql2) {
		

			$sqlInsert2 = "INSERT INTO batch (date,batch,unit, initial,farmID) 
			VALUES ('$date', '$batch', '$unit', '$initial', '$farmID');"; 
				$sql3 = mysqli_query($data, $sqlInsert2);

		}else {

			header('location:add-farm.php?add=error2');
		} */

		header('location:add-farm.php?add=success');
    
	}


};	


?>


<?php include ("header.php");  ?>


<section class="form">
    <!--  <form action="#" method="post"> -->

    <div class="form-title">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-house-add"
                viewBox="0 2 20 16">
                <path
                    d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                <path
                    d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
            </svg>Poultry Farm Registration</h2>
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
				/*	else if($add=='error2'){
						echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Batch Error</span> </div>';
					} */
				
				
			};
    ?>
    <form action="#" method="POST">
        <div class="form-body">
            <!--Form-->

<div class="container text-center">
  <div class="row">
    <div class="col">
    
            <div class="cotent-input">
                <select class="form-select" name="baranggayID" aria-label="Default select example" required="true">
                    <option disabled selected>Barangay</option>
                    <?php echo $bfetch; ?>
                    <option disabled> Barangay if your Barangay don't exist!</option>
                </select>
                </div>
                <div class="content-input">
                    <div class="input-label">
                        <p>Farm Name</p>
                    </div>
                    <div class="form-floating mb-3">
                        <input size="75" type="text" pattern="[a-zA-Z0-9\s]+" class="form-control" id="farmname" name="farmname" placeholder="Farm Name" required="true">
                        <label for="floatingInput" id="label">Use unique farm name or add 'branch' if already exists.</label>
                    </div>
                </div>
                <div class="content-input">
                    <div class="input-label">
                        <p>Farm Size</p>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" pattern="[0-9.]+" class="form-control" id="farmname" name="farm_size" placeholder="Farm Name" required="true">
                        <label for="floatingInput" id="label">Sq. meter</label>
                    </div>
                </div>
                <div class="content-input">
                    <div class="input-label">
                        <p>No. of Farmers </p>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" pattern="[a-zA-Z0-9\s]+" class="form-control" id="farmname" name="no_farmers" placeholder="Farm Name" required="true">
                        <label for="floatingInput" id="label">Number of farmers manning the farm.</label>
                    </div>
                </div>


    </div>
    <div class="col">
    
                <div class="content-input">
                    <div class="input-label">
                        <p>Farm Owner</p>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="farmowner" id="farmowner" placeholder="Farm Owner" pattern="[a-zA-Z0-9\s.]+" required="true">
                        <label for="floatingInput" required="true" id="label">Firstname/ M.I / Lastname</label>
                    </div>
                </div>
                

                <div class="content-input">
                    <div class="form-floating mb-3">
                        <input type="date" class="form-control" name="bday" id="contactno" pattern="[0-9\s+]+"
                            placeholder="Contact No." required="true">
                        <label for="floatingInput" required="true" d>Date of Birth</label>
                    </div>
                </div>

                
                <div class="content-input">
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" name="exp" id="contactno" pattern="[0-9\s+]+"
                            placeholder="Contact No." required="true">
                        <label for="floatingInput" required="true" d>Years of experience</label>
                    </div>
                </div>

                <div class="content-input"> 
                    <div class="form-floating mb-3">
                        <input type="contact" class="form-control" name="contactno" id="contactno" pattern="[0-9\s+]+"
                            placeholder="Contact No." required="true">
                        <label for="floatingInput" required="true" d>Contact No.</label>
                    </div>
                </div>
            </div>
    
    </div>
  </div>
</div>

            <!--Add batch
            <p>

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="addbatch-button"
                    data-bs-target="#staticBackdrop"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-plus-square" viewBox="0 0 20 20">
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                    Add Batch
                </button>
                -->

                <!--farm location-->
            <div class="submit">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="farmlocation-button"
                    data-bs-target="#staticBackdrop1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                        fill="currentColor" class="bi bi-pin-map" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z" />
                        <path fill-rule="evenodd"
                            d="M8 1a3 3 0 1 0 0 6 3 3 0 0 0 0-6zM4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z" />
                    </svg>
                    Farm Location
                </button>
            </div>

            <!--plot map Modal -->
            <div class="modal fade" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Farm Location</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!--mapmodal content-->
                            <div class="card card-body">
                                <div class="form-floating mb-3">
                                    <input type="text" readonly class="form-control" id="lt" name="lt" placeholder="Latitude"
                                        required="true">
                                    <label for="floatingInput">Latitude</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" readonly class="form-control" id="lg" name="lg" placeholder="Longitude"
                                        required="true">
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
                                        zoom: 15.8,
                                        // disableDoubleClickZoom: true,
                                        mapTypeId: google.maps.MapTypeId.HYBRID
                                    });


                                    google.maps.event.addListener(map, 'click', function(event) {
                                        document.getElementById('lt').value = event.latLng.lat();
                                        document.getElementById('lg').value = event.latLng.lng();
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

            <!--AddBatch Modal 
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-plus-circle-dotted" viewBox="0 0 20 20">
                                    <path
                                        d="M8 0c-.176 0-.35.006-.523.017l.064.998a7.117 7.117 0 0 1 .918 0l.064-.998A8.113 8.113 0 0 0 8 0zM6.44.152c-.346.069-.684.16-1.012.27l.321.948c.287-.098.582-.177.884-.237L6.44.153zm4.132.271a7.946 7.946 0 0 0-1.011-.27l-.194.98c.302.06.597.14.884.237l.321-.947zm1.873.925a8 8 0 0 0-.906-.524l-.443.896c.275.136.54.29.793.459l.556-.831zM4.46.824c-.314.155-.616.33-.905.524l.556.83a7.07 7.07 0 0 1 .793-.458L4.46.824zM2.725 1.985c-.262.23-.51.478-.74.74l.752.66c.202-.23.418-.446.648-.648l-.66-.752zm11.29.74a8.058 8.058 0 0 0-.74-.74l-.66.752c.23.202.447.418.648.648l.752-.66zm1.161 1.735a7.98 7.98 0 0 0-.524-.905l-.83.556c.169.253.322.518.458.793l.896-.443zM1.348 3.555c-.194.289-.37.591-.524.906l.896.443c.136-.275.29-.54.459-.793l-.831-.556zM.423 5.428a7.945 7.945 0 0 0-.27 1.011l.98.194c.06-.302.14-.597.237-.884l-.947-.321zM15.848 6.44a7.943 7.943 0 0 0-.27-1.012l-.948.321c.098.287.177.582.237.884l.98-.194zM.017 7.477a8.113 8.113 0 0 0 0 1.046l.998-.064a7.117 7.117 0 0 1 0-.918l-.998-.064zM16 8a8.1 8.1 0 0 0-.017-.523l-.998.064a7.11 7.11 0 0 1 0 .918l.998.064A8.1 8.1 0 0 0 16 8zM.152 9.56c.069.346.16.684.27 1.012l.948-.321a6.944 6.944 0 0 1-.237-.884l-.98.194zm15.425 1.012c.112-.328.202-.666.27-1.011l-.98-.194c-.06.302-.14.597-.237.884l.947.321zM.824 11.54a8 8 0 0 0 .524.905l.83-.556a6.999 6.999 0 0 1-.458-.793l-.896.443zm13.828.905c.194-.289.37-.591.524-.906l-.896-.443c-.136.275-.29.54-.459.793l.831.556zm-12.667.83c.23.262.478.51.74.74l.66-.752a7.047 7.047 0 0 1-.648-.648l-.752.66zm11.29.74c.262-.23.51-.478.74-.74l-.752-.66c-.201.23-.418.447-.648.648l.66.752zm-1.735 1.161c.314-.155.616-.33.905-.524l-.556-.83a7.07 7.07 0 0 1-.793.458l.443.896zm-7.985-.524c.289.194.591.37.906.524l.443-.896a6.998 6.998 0 0 1-.793-.459l-.556.831zm1.873.925c.328.112.666.202 1.011.27l.194-.98a6.953 6.953 0 0 1-.884-.237l-.321.947zm4.132.271a7.944 7.944 0 0 0 1.012-.27l-.321-.948a6.954 6.954 0 0 1-.884.237l.194.98zm-2.083.135a8.1 8.1 0 0 0 1.046 0l-.064-.998a7.11 7.11 0 0 1-.918 0l-.064.998zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                                </svg>Add Batch</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        
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
            -->
            <div class="submit">
                <input type="submit" class="btn btn-primary" name="submit" value="Register" id="submit">
            </div>
            </p>
        </div>
    </form>
</section>


<!--style-->

<style type="text/css">

    #farmlocation-button{
        margin-top:30px;
        margin-bottom:20px;
    }

.wrapper{
    width:100%;
    display:flex;
    justify-content:center;
}


#map {
    height: 300px;
    width: 420px;
}


.form {
    position: relative;
    display: grid !important;
    justify-content: center !important;
    align-items: center !important;
    margin-bottom: 20px;
    background-color: #f9faff;
    border-radius: 10px;
    padding: 20px 0 20px 0 !important;
}

.form-title h2 {
    margin-bottom: 40px;
    font-weight: bold;
}

.form-title{
    display:grid;
    place-items:center;
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


.add-brgy-button {
    margin-top: 10px;
    display: flex;
    justify-content: flex-start;
}

.add-brgy-button button {
    border: none;
    background-color: #00b7EB;
}

.add-brgy-button button:hover {
    border: none;
    background-color: #007FFF;
}

form {
    display: grid;
}

.form-body p {
    display: grid;
}

.submit {
    display: grid;
    justify-content: center;
}

.submit input {
    border: none;
    background-color: darkblue;
    color: white;
}

.submit input:hover {
    border: none;
    background-color: blue;
    color: white;
}

#addbatch-button {
    background-color: green;
}

#addbatch-button:hover {
    background-color: darkgreen;
}

#farmlocation-button {
    border: none;
    background-color: #0047AB;
}

#farmlocation-button:hover {
    border: none;
    background-color: #0067A5;
}

.input-label {
    margin-left: 5px;
    display: flex;
    margin-bottom: -10px;
}

#optional {
    margin-left: 20px;
    color: grey;

}


.content-input {
    margin-top: 30px;
}
.row{
    gap:50px;
}

input:invalid {
        animation: shake 0.5s;
        border: 1px solid red !important;
    }

    input:valid{
        border:1px solid green !important;
    }
    
    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-10px); }
        
    }
</style>

</body>

</html>