<?php 
	include_once '..\project\connect.php'; 
	$query = "SELECT * FROM baranggay "; 
	$result = mysqli_query($conn,$query);	
?>
<?php 
	include_once '..\project\connect.php'; 
	$query = "SELECT * FROM farm "; 
	$result1 = mysqli_query($conn,$query);	
?>
<?php 
	include_once '..\project\connect.php'; 
	$query = "SELECT * FROM batch "; 
	$result2 = mysqli_query($conn,$query);	
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Recording and Inventory System for Poultry Products!</title>
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <section class="header">
        <div class="logo">
            <img src="../image/logo.png" alt="Department of Agriculture Logo" width="80px" , height="80px">
            <p>Republic of the Philippines</p>
            <h1>DEPARTMENT OF AGRICULTURE</h1>
        </div>

        <div class="text">
            <p>San Lorenzo, Guimaras</p>
        </div>

        <section class="nav">
            <div class="home">
                <a href="home-admin.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="" fill="currentColor"
                        class="bi bi-house-fill" viewBox="0 0 20 16">
                        <path
                            d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                        <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z" />
                    </svg>Home
                </a>
            </div>
            <div class="dropdown0">
                <button class="dropbtn0"> Production </button>
                <div class="dropdown-content0">
                    <a href=""> View Record</a>
                    <a href="record.html"> Record Production</a>
                    <a href="#"> Generate Report</a>
                    <a href="#"> Find Records </a>
                </div>
            </div>

            <div class="dropdown2">
                <button class="dropbtn2"> Farm </button>
                <div class="dropdown-content2">
                    <a href="farm-detail.html"> View Farm</a>
                    <a href="add-farm.php">Add Farm</a>
                    <a href="map.html"> View farm Map</a>
                </div>
            </div>

            <div class="dropdown3">
                <button class="dropbtn3"> User </button>
                <div class="dropdown-content3">
                    <a href="add-user.php"> Add User</a>
                    <a href="view-user.php"> View Users </a>
                </div>
            </div>

            <div class="user">
                <details>
                    <summary class="summ"><img src="../image/user2.png" alt="User" width="70px" , height="70px">
                    </summary>
                    <div class="drop-menu">
                        <ul>
                            <li><a href="">Contact Us</a></li>
                            <li><a href="">Help</a></li>
                            <li><a href="">Log out</a></li>
                        </ul>
                    </div>
                </details>
            </div>
        </section>
    </section>

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
                    <?php while ($row = mysqli_fetch_assoc($result1)) : ?>
                    <option value="<?php echo $row['farmID']; ?>"> <?php echo $row['farmname']; ?> </option>
                    <?php endwhile; ?>

                </select>
            </div>
        </section>

        <section class="wrapper-batch">

            <div class="form-selector">
                <label for="form-selector">Select Product</label>
                <select id="form-selector">
                    <option></option>
                    <option value="Layer">Layer</option>
                    <option value="Broiler">Broiler</option>
                </select>
            </div>
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

            $.ajax({
                type: "POST",
                url: "getbatch.php",
                data: {
                    farm_data: farmID
                },
                success: function(result) {
                    $('#batch').html(result);
                }
            })
        });
        </script>

        <section class="record">

            <section class="form-selection">
                <form action="#" method="post" id="Layer">

                    <div class="sec1">

                        <div class="batch">
                            <label for="batch">Select Batch</label>
                            <select id="batch" name="batch">
                                <option selected disabled> Select Batch</option>
                                <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
                                <option value="<?php echo $row['batchID']; ?>"> <?php echo $row['batch']; ?> </option>
                                <?php endwhile; ?>
                            </select>
                        </div>

                        <div class="date">

                            <label for=""> Date: </label>
                            <input type="date" name="date" id="date">

                        </div>

                        <section class="layer">
                            <div class="no-eggs">
                                <label for="no-eggs"> Number of Eggs: </label>
                                <input type="number" name="no-eggs" id="no-eggs">
                            </div>

                            <div class="rej-eggs">
                                <label for="rej-eggs"> Reject Eggs: </label>
                                <input type="number" name="rej-eggs" id="rej-eggs">
                            </div>
                        </section>

                        <section class="broiler">
                            <div class="Bcurrent">
                                <label for=""> Current: </label>
                                <input type="number" name="Lcurrent" id="Lcurrent">
                            </div>

                            <div class="mortality">
                                <label for="dead"> Mortality: </label>
                                <input type="number" name="mortality" id="mortality">
                            </div>
                        </section>
                        <div class="submit">
                            <input type="submit" name="submit" id="submit" value="Save">
                        </div>

                    </div>

            </section>
            </form>

            <form action="#" method="post" id="Broiler">
                <div class="sec1">
                    <div class="batch">
                        <label for="batch">Select Batch</label>
                        <select id="batch" name="batch">
                            <option selected disabled> Select Batch</option>
                            <?php while ($row = mysqli_fetch_assoc($result2)) : ?>
                            <option value="<?php echo $row['batchID']; ?>"> <?php echo $row['batch']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="date">
                        <label for=""> Date: </label>
                        <input type="date" name="date" id="date">
                    </div>

                    <section class="layer">
                        <div class="meat">
                            <label for=""> Meat in Kg: </label>
                            <input type="kilo" name="meat" id="meat">
                        </div>
                    </section>

                    <section class="broiler">
                        <div class="Bcurrent">
                            <label for=""> Current: </label>
                            <input type="number" name="Lcurrent" id="Lcurrent">
                        </div>

                        <div class="mortality">
                            <label for="dead"> Mortality: </label>
                            <input type="number" name="mortality" id="mortality">
                        </div>
                    </section>

                    <div class="submit">
                        <input type="submit" name="submit" id="submit" value="Save">
                    </div>
                </div>
            </form>
        </section>

        <script>
        // Get a reference to the form selector and forms
        const formSelector = document.getElementById('form-selector');
        const Layer = document.getElementById('Layer');
        const Broiler = document.getElementById('Broiler');

        // Hide all forms by default
        Layer.style.display = 'none';
        Broiler.style.display = 'none';

        // When the user selects a form, show that form
        formSelector.addEventListener('change', function() {
            const selectedForm = this.value;
            if (selectedForm === 'Layer') {
                Layer.style.display = 'block';
                Broiler.style.display = 'none';

            } else if (selectedForm === 'Broiler') {
                Layer.style.display = 'none';
                Broiler.style.display = 'block';

            }
        });
        </script>




    </section>
    </section>


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