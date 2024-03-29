<?php

@include 'config.php';

@include('connect.php');

session_start();

if(!isset($_SESSION['username'])){
   header('location:login-user.php');
}
else{
$usern = $_SESSION['username'];
$sql="select * from user where username='".$usern."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['position'] !== 'admin') {
    header('Location:denied.php');
    exit();
}

}

?>

<?php
@include('connect.php');
?>
<?php
$username = "root";
$password = "";
$database = "project";
$mysqli = new mysqli("localhost", $username, $password, $database);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.75">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link rel="stylesheet" href="../assests/homepage.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
        <script>
        function openNav() {
          document.getElementById("mySidenav").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
          document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
        }

        function closeNav() {
          document.getElementById("mySidenav").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
          document.body.style.backgroundColor = "white";
        }

        </script>

    <title>Home</title>

    <style>

body {
    margin: 0;
    font-family: tahoma;
}

.header {
    margin: 5px;
    display: flex;
    justify-content: space-evenly;
}


/* The navigation bar */

.header-main {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    overflow: auto;
    position: static;
    background-color: #0e2a83;
    color: white;
    top: 0;
    width: 100%;
}

.header-main h2 {
    margin: 20px;
    font-weight: bold;
}

.nav {
    margin-top: 20px;
    display: flex;
    justify-content: space-evenly;
    border-bottom: 1px solid grey;
    padding-bottom: 30px;
}

summary {
    cursor: pointer;
    list-style: none;
}

.nav ul {
    display: inline-block;
    position: absolute;
    border-radius: 15px;
    background-color: #f9faff;
    padding-bottom: 10px;
    margin-left: -210px;
    margin-right: 50px;
}

.nav li {
    list-style: none;
    text-decoration: none;
    margin-bottom: 10px;
    margin-top: 20px;
    margin-left: 10px;
    margin-right: 30px;
}

.production ul {
    z-index: 100;
    box-shadow: 2px 2px 2px 2px grey;
    position: absolute;
    margin-left: -65px;
}

#img {
    margin-left: -60px;
    margin-top: -5px;
    position: absolute;
}

#dropdown-img {
    position: absolute;
    margin-left: -60px;
    margin-top: -5px;
}

#a {
    font-weight: bold;
    color: black;
    margin-left: 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

#a:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}

#a-dropdown {
    font-weight: bold;
    color: black;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

#a-dropdown:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}

.farm ul {
    z-index: 100;
    box-shadow: 2px 2px 2px 2px grey;
    position: absolute;
    margin-left: -50px;
}

.farm-dropdown img {
    margin-left: -60px;
    margin-top: -5px;
    position: absolute;
}

.farm-dropdown a {
    font-weight: bold;
    color: black;
    margin-left: 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.farm-dropdown a:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}

.user ul {
    z-index: 100;
    box-shadow: 2px 2px 2px 2px grey;
    position: absolute;
    margin-left: -30px;
}

.user-dropdown img {
    margin-left: -60px;
    margin-top: -10px;
    position: absolute;
}

.user-dropdown a {
    font-weight: bold;
    color: black;
    margin-left: 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.user-dropdown a:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}


/* barangay*/

.brgy ul {
    z-index: 100;
    box-shadow: 2px 2px 2px 2px grey;
    position: absolute;
    margin-left: -30px;
}

.brgy-dropdown img {
    margin-left: -60px;
    margin-top: -10px;
    position: absolute;
}

.brgy-dropdown a {
    font-weight: bold;
    color: black;
    margin-left: 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.brgy-dropdown a:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}


/* batch */

.batch ul {
    z-index: 100;
    box-shadow: 2px 2px 2px 2px grey;
    position: absolute;
    margin-left: -30px;
}

.batch-dropdown img {
    margin-left: -60px;
    margin-top: -10px;
    position: absolute;
}

.batch-dropdown a {
    font-weight: bold;
    color: black;
    margin-left: 20px;
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.batch-dropdown a:hover {
    color: white;
    background-color: darkblue;
    padding: 10px;
    border-radius: 5px;
    transform: scale(1.1);
}

summary {
    transition: all 0.5s ease-in-out;
}

summary :hover {
    transform: scale(1.02);
    filter: drop-shadow(2px 2px 2px 2px #66ffcc);
    background-color: white;
    border-radius: 5px;
}

.logout button {
    z-index: 999;
    position: absolute;
    right: 50%;
    left: 30%;
    justify-content: center;
    display: grid;
    align-items: center;
    border-radius: 25px;
    padding-right: 200px;
    padding-left: 200px;
}

.logout h2 {
    font-weight: bold;
    font-size: 30px;
    display: flex;
    justify-content: center;
    color: black;
    text-decoration: none;
    margin-bottom: 20px;
}

.summ {
    margin-top: -60px;
    display: flex;
    justify-content: flex-end;
    font-weight: bold;
    font-size: 17px;
    list-style: none;
}

.summary p {
    margin-right: 5px;
    margin-left: 5px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 15px;
    border-radius: 40px;
    padding-right: 15px;
}

.button {
    margin-left: 10px;
}

.button a {
    padding-right: 60px;
    padding-left: 60px;
    color: white;
    text-decoration: none;
}

.button button:hover {
    background-color: blue;
    color: white;
}

.home {
    margin-bottom: 5px;
}

details.test {
    position: relative;
    padding: 5px 0;
}

details.test[open]>summary::after {
    font-size: 20px;
    top: 70px;
    left: 910px;
    justify-content: center;
    position: absolute;
    content: "X";
    bottom: 0;
}

#preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: white;
    z-index: 9999;
}

#preloader img {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

#modalbody {
    display: flex !important;
    justify-content: center !important;
}

#modalbody h2 {
    font-weight: bold;
}

#button {
    border: none;
    border-radius: 15px;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 10px;
    padding-bottom: 10px;
}

#button_yes {
    border: none;
    border-radius: 15px;
    background-color: darkblue;
    padding-right: 50px;
    padding-left: 50px;
    padding-top: 10px;
    padding-bottom: 10px;
}

#button_yes:hover {
    background-color: blue;
}

.modal-content {
    border: none;
    border-radius: 30px;
    padding-bottom: 0;
}

.modal-footer {
    border: none;
    display: flex;
    justify-content: center;
    padding-top: 0;
    margin-bottom: 10px;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #f1f1f1;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: black;
    display: block;
    transition: 0.3s;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#nav:hover {
    background-color: grey;
}

#open-nav {
    position: fixed;
    left: 2%;
    top: 3%;
    font-size: 30px;
    cursor: pointer;
    color: white;
    font-weight: bold
}

.dropdown-content-view {
    position: absolute;
    margin-left: 95px;
    display: none;
    background-color: lightgray;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content-view a {
    color: black;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-view:hover .dropdown-content-view {
    display: grid;
}

.dropdown-content-generate {
    position: absolute;
    margin-left: 95px;
    display: none;
    background-color: lightgray;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;
}

.dropdown-content-generate a {
    color: black;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-generate:hover .dropdown-content-generate {
    display: grid;
}


/*
.navigation {
    background-color: darkblue;
    position: sticky;
    top: 0;
    display: flex;
    justify-content: center;
}

.navigation a {
    font-weight: bold;
    color: white;
    text-decoration: none;
    padding: 10px;
    transition: all 0.2s ease-in-out;
}

.navigation a:hover {
    color: white;
    border-bottom: 1px solid white;
    transform: scale(.9);
}

#layer {
    padding: 20px;
    border: 1px solid grey;
    margin: 20px;
}

#broiler {
    border: 0.3px solid grey;
    margin: 20px;
    padding: 20px;
}
*/

.production-report {
    display: flex;
    justify-content:center;
    margin: 5px 15px 5px 15px;
}

.production-report h2 {
  color:grey;
  font-size:25px;
}

#nav-tab {
    margin-top: 0;
    display: flex;
    justify-content: center;
    padding-bottom: 0;
}

#nav-tab button {
    font-weight: bold;
}

.tab-content {
    margin: 5px 40px 5px 40px;
}

.more-options {
    margin-top: 30px;
}

.more-options a {
    border-right: 1px solid grey;
    margin: 10px;
    padding-right: 10px;
    text-decoration: none;
    color: black;
}

.tab-content h3 {
    margin-top: 20px;
    margin-bottom: 20px;
}

.farm-brgy-summary{
  display:flex;
  gap:50px;
  justify-content:center;
  align-items:center;
}
  
.farm-summary {
    margin:20px;
    display: grid;
    place-items:center;
}

.farm-summary h2 {
  font-size:50px;
}

.brgy-summary {
    margin:20px;
    display: grid;
    place-items:center;
}

.brgy-summary h2 {
  font-size:50px;
}

.farm-number{
  border-bottom:10px solid green;
}

.brgy-number{
  border-bottom:10px solid darkblue;
}

.nav2{
  margin-bottom:30px;
}

#logout{
  background-color:transparent;
  border:none;
}
html{
  scroll-behavior:smooth !important;
}

    </style>
   
        </head>
        <body>

        <div id="content" class="content">
            <section class="header-main">
              <h2>Poultry Products Recording and Inventory System</h2>
            </section>

            <section class="summary">
              <div class="summ">             
                  <button id="logout" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 20 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg>
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="modaltitle">Confirm!</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalbody">
                          <h2>Are you sure to log out?</h2>
                        </div>
                        <div class="modal-footer">
                        <a href="login-user.php" id="button_yes" type="button" class="btn btn-primary" >Yes</a>
                          <button id="button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                          
                        </div>
                      </div>
                    </div>
                  </div>
                  </div>
              </section>

                  <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a id="nav" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 20 20">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>About Us</a>
                <a id="nav" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 20 20">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>Help</a>
                  </div>

                  <span id="open-nav"  onclick="openNav()">&#9776;</span>
                  
            <section class="nav">

              <section class="brgy">
                <details>
                  <summary><a href="add-brgy.php"><img src="../image/barangay-admin.png" width="100px"></a></summary>
                </details>
              </section>

              <section class="farm">
                <details>
                  <summary><img src="../image/1farm-admin.png" width="100px"></summary>
                  <section class="farm-dropdown">
                    <ul>
                    <li id="li"><a href="view-farm.php"><img src="../image/view-farm1.png" width="18%">VIEW FARM</a></li>
                    <li id="li"><a href="add-farm.php"><img src="../image/add-farm1.png" width="18%">ADD FARM</a></li>
                    <li id="li"><a href="map.php"><img src="../image/mortality-rate.png" width="18%">VIEW FARM MAP</a></li>
                    </ul>
                  </section>
                </details>
              </section>

              <section class="batch">
                <details>
                  <summary><a href="view-batches.php"><img src="../image/batches-admin.png" width="100px"></a></summary>
                  <section class="batch-dropdown" style="z-index:2">
                    <ul id="ul">
                    <li id="li"><a href="add-farm-batch.php"><img id="add-brgy" src="../image/add-barangay1.png" width="60px">ADD BATCH</a></li>
                    <li id="li"><a href="view-batches.php"><img src="../image/view.png" width="20%">VIEW BATCHES</a></li>
                    </ul>
                  </section>
                </details>
              </section>

              <section class="production">
                <details>
                  <summary><img src="../image/1production-admin.png" width="100px"></summary>
                  <section class="production-dropdown">
                    <ul>
                    <li ><a id="a" href="record1.php"><img id="img" src="../image/edit-data.png"  width="15%">RECORD DATA</a></li>
                    <li class="dropdown-view"><a id="a" href="#"><img id="dropdown-img" src="../image/view-data.png" width="20%">VIEW RECORDS</a>
                        
                      <div class="dropdown-content-view">
                        <ul>
                          <li><a id="a-dropdown" href="view-broiler.php">Broiler</a></li>
                          <li><a id="a-dropdown" href="view-layer.php">Layer</a></li>
                        </ul>
                      </div>

                  </li>
                    <li class="dropdown-generate"><a id="a" href="#"><img id="img" src="../image/generate-report1.png"  width="15%">GENERATE DATA</a>

                    <div class="dropdown-content-generate">
                        <ul id="ul">
                          <li id="li"><a id="a-dropdown" href="View-B-Export.php">Broiler</a></li>
                          <li id="li"><a id="a-dropdown" href="View-L-Export.php">Layer</a></li>
                        </ul>
                      </div>

                  </li>
                    </ul>
                  </section>
                </details>
              </section>


              <section class="user">
                <details>
                  <summary><img src="../image/1user-admin.png"  width="100px"></summary>
                  <section class="user-dropdown">
                    <ul>
                    <li id="li"><a href="add-user.php"><img src="../image/add user1.png"  width="25%">ADD USERS</a></li>
                    <li id="li"><a href="view-user.php"><img src="../image/view-user1.png"  width="20%">VIEW USERS</a></li>
                    </ul>
                  </section>
                </details>
              </section>

            </section>





<!--table-->
<?php
include('connect.php');

$sql1 = "SELECT COUNT(farmname) as totalfarm FROM farm";
$result1 = $conn->query($sql1);

$sql = "SELECT COUNT(baranggay) as totalbaranggay FROM baranggay";
$result = $conn->query($sql);

// Get the result as an array
$row1 = $result1->fetch_assoc();

$row = $result->fetch_assoc();
?>

        <section class="nav2">

        <section class="farm-brgy-summary">

        <section class="brgy-summary">
              <div class="brgy-number">
              <h2> <?php echo "<p>".$row['totalbaranggay']."<p>" ?></h2>
              </div>
              <div class="rgtr">
                  <p>Number of Barangays</p>
              </div>
          </section>

          <section class="farm-summary">
              <div class="farm-number">
                  <h2> <?php echo "<p>".$row1['totalfarm']."<p>" ?></h2>
              </div>
              <div class="rgtr">
                  <p> Registered Farms</p>
              </div>
          </section>


        </section>

<section class="top">
            <div class="production-report">
              <h2><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 20">
  <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
  <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
  <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
</svg>Dashboard</h2>
            </div>

<!--
            <div class="navigation">
            <a  href="#layer"> Layer</a>
            <a  href="#broiler"> Broiler</a>
            </div>
          <div class="Layer">
            <div class="sample">
              <h3>Layer Production Reports</h3>
              <div id="layer"> <iframe src="../project/view-layer-home.php" scrolling="yes" frameborder="0" border="0" cellspacing="0"
        style="border-style: none;width: 100%; height: 100%;"></iframe> <a href="view-layer.php">See More</a> </div>
            </div>
            </div>

            <div class="broiler">
            <div class="sample">
            <h3>Broiler Production Reports</h3>
              <div id="broiler"> <iframe src="../project/view-broiler-home.php" frameborder="0" border="0" cellspacing="0"
              scrolling="yes" style=" border-style: none;width: 100%; height: 100%;" ></iframe> <a href="view-broiler.php">See More</a> </div>
            </div>
            </div>
      -->



                    <nav>
                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                          Broiler
                        </button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">
                          Layer
                        </button>
                      </div>
                    </nav>
</section>
                    <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                      <h3>Broiler Production Reports</h3>
                      <iframe src="../project/view-broiler-home.php" frameborder="0" border="0" cellspacing="0"
                      scrolling="yes" style=" border-style: none;width: 100%; height: 100%;" ></iframe>
                    <div class="more-options">  
                      <a href="view-broiler.php">See More</a>
                      <a href="view-B-export.php">Export Reports</a>  
                    </div>
                    </div>
                      <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">
                      <h3>Layer Production Reports</h3>
                      <iframe src="../project/view-layer-home.php" scrolling="yes" frameborder="0" border="0" cellspacing="0"
                      style="border-style: none;width: 100%; height: 100%;"></iframe>
                    <div class="more-options">
                      <a href="view-layer.php">See More</a>
                      <a href="view-L-export.php">Export Reports</a>
                    </div>
                      </div>
                    </div>

    
            </section>

     
</div>

<!--
<div class="back-to-top">
  <a href="#content">Back to top</a>
</div>
-->
<!--screen loading-->
<div id="preloader">
    <img src="../image/preloader2.gif" alt="Preloading" width="100px">
  </div>
<!--script-->

<script>
    window.onload = function() {
      var preloader = document.getElementById('preloader');
      preloader.style.display = 'none';
    }
</script>

<script>
 
  const details = document.querySelectorAll("details");

  details.forEach((targetDetail) => {
    targetDetail.addEventListener("click", () => {

      details.forEach((detail) => {
        if (detail !== targetDetail) {
          detail.removeAttribute("open");
        }
      });
    });
  });

</script>

</body>
</html>        