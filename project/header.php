<?php
  @include('connect.php');
session_start();

$username = $_SESSION['username'];
$sql="select * from user where username='".$username."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['name'];

if(!isset($_SESSION['username'])){
    header('location:login-user.php');
 }
 

else {
 $sql="select * from user where username='".$username."' ";
 $result = mysqli_query($conn, $sql);
 $row = mysqli_fetch_assoc($result);

 if ($row['position'] !== 'admin') {
     header('Location:denied.php');
     exit();
 }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.75">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Recording and Inventory Sytem</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    function openNav() {
        document.getElementById("mySidenavb").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenavb").style.width = "0";
        document.getElementById("main1").style.marginLeft = "0";
        document.body.style.backgroundColor = "white";
    }

    

    </script>



    <style type="text/css">

    body {
        margin: 0;
        font-family: helvetica;
    }

    .sidebar {
        z-index:10000;
        margin: 0;
        padding: 0;
        width: 200px;
        background-color: #f1f1f1;
        position: fixed;
        height: 100%;
        overflow: auto;
    }

    .sidebar a {
        display: block;
        color: black;
        padding: 16px;
        text-decoration: none;

    }

    .sidebar a.active {
        background-color: #0e2a83;
        color: white;
    }

    .sidebar a:hover:not(.active) {
        background-color: #555;
        color: white;
    }

    div.content {
        margin-left: 200px;
        padding: 1px 16px;
        height: auto;
    }

    @media screen and (max-width: 700px) {
        .sidebar {
            width: 100%;
            height: auto;
            position: relative;
        }

        .sidebar a {
            float: left;
        }


        div.content {
            margin-left: 0;
        }

        .production {
            margin-top: 30px;
            border-top: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
        }

    }

    @media screen and (max-width: 500px) {
        .sidebar a {
            text-align: center;
            float: none;
        }

        .production {
            margin-top: 30px;
            border-top: 1px solid black;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    .header {
        margin: 5px;
        display: flex;
        justify-content: space-evenly;
    }

    /* The navigation bar */
    .header-main {
        z-index: 1;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        overflow: hidden;
        position: static;
        background-color: #0e2a83;
        color: white;
        top: 0;
        width: 100%;
        position:sticky;
        top:0%;
    }

    .header-main h2 {
        font-size:20px;
        margin: 10px;
        font-weight: bold;
    }

    .production {
        border-top: 1px solid black;
        display: flex;
        justify-content: space-between;
        padding-left:10px;
        padding-right:10px;
        align-items: center;
    }

    .production p {
        padding-left: 5px;
        padding-top: 15px;
    }

    .home {
        background-color: #0e2a83;
    }

    .home a {
        color: white;
    }



    .logout {
        margin-top: 250px;
        margin-left: 350px;
        margin-right: 350px;
        justify-content: center;
        display: grid;
        align-items: center;
        border-radius: 25px;
        box-shadow: 5px 10px 20px 25px grey;
        background-color: #f9faff;
        padding: 30px;
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
        margin-top: -260px;
        display: flex;
        justify-content: flex-end;
        font-weight: bold;
        font-size: 17px;
        cursor: pointer;
        list-style: none;

    }

    .summary p {
        margin-right: 5px;
        margin-left: 5px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-left: 15px;
        background-color: #f9faff;
        border-radius: 40px;
        padding-right: 15px;
    }

    .button {
        margin-left: 10px;
    }

    button {
        margin: 10px;
        border: none;
        color: white;
        font-size: 15px;
        font-weight: bolder;
        background-color: #0e2a83;
        border-radius: 20px;
        cursor: pointer;
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




    .sidenavb {
        height: 100%;
        width: 0;
        position: fixed;
        z-index: 1;
        top: 0;
        right: 0;
        background-color: #f1f1f1;
        overflow-x: hidden;
        transition: 0.5s;
        padding-top: 60px;
    }

    .sidenavb a {
        padding: 8px 8px 8px 32px;
        text-decoration: none;
        font-size: 25px;
        color: black;
        display: block;
        transition: 0.3s;
    }

    .sidenavb a:hover {
        color: red;
    }

    .side-content a:hover {
        color: black;
        background-color: #555;
    }

    .sidenavb .closebtn {
        position: absolute;
        top: 0;
        right: 25px;
        font-size: 36px;
        margin-left: 50px;
    }


    @media screen and (max-height: 450px) {
        .sidenavb {
            padding-top: 15px;
        }

        .sidenavb a {
            font-size: 18px;
        }
    }

    .main1 {
        position: absolute;
        right: 10px;
    }

    .user {
        border-bottom: 1px solid black;
        border-top: 1px solid black;
        display: flex;
        padding-top: 10px;
        padding-bottom: 10px;
        margin-left: 20px;
        margin-bottom: 20px;
    }

    .user h2 {
        padding-left: 10px;
        padding-top: 20px;
    }

    #preloader {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: transparent;
      z-index: 9999;
    }

    #preloader img {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }


    
.dropdown-content-view {
    margin-left:13px;
  display: none ;
  position: absolute ;
  background-color: lightgray ;
  min-width: 160px ;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2) ;
  z-index:1;
}

.dropdown-content-view a{
  color: black ;
  text-decoration: none ;
  display: block ;
  text-align: left ;
}

.dropdown-contentview a:hover{
  color: white ;
  text-decoration: none ;
  display: block ;
  text-align: left ;
}

.dropdown-view:hover .dropdown-content-view {
  display: block ;
}

ul{
    margin:0;
    padding:0;
}
li{
    list-style: none;
    text-decoration:none;
}

.dropdown-content-generate {
    margin-left:13px;
  display: none ;
  position: absolute ;
  background-color: lightgray ;
  min-width: 160px ;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2) ;
  z-index:1;
}

.dropdown-content-generate a{
  color: black ;
  text-decoration: none ;
  display: block ;
  text-align: left ;
}

.dropdown-contentgenerate a:hover{
  color: white ;
  text-decoration: none ;
  display: block ;
  text-align: left ;
}

.dropdown-generate:hover .dropdown-content-generate {
  display: block ;
}

summary{
    list-style:none;
}

#nav-brgy{
    display:flex;
    justify-content:flex-start;
    padding:0;
    margin:0;

}
#barangay img{
    margin-top:15px;
}

#nav-brgy:hover{
    background-color:transparent;
    color:black
}

html{
  scroll-behavior:smooth !important;
}

.open-nav{
    display:flex;
    justify-content:flex-start !important;
    align-items:center;
}

details[open] summary #arrow {
    transform: rotate(180deg);
}

#goBackButton{
    left:0;
    top:-10%;
    position:absolute;
    color:white;
    background-color:transparent;
}

    </style>


<script>
    window.onload = function() {
      var preloader = document.getElementById('preloader');
      preloader.style.display = 'none';
    }
  </script>



</head>

<body>


    <div class="sidebar">
        <section class="header">
            <div class="logo">
                <img src="../image/logo.png" alt="logo" width="80px">
            </div>
        </section>

        <div class="home">
            <a href="homepage.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white"
                    class="bi bi-house-door-fill" viewBox="1 1 20 16">
                    <path
                        d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z" />
                </svg>Home</a>
        </div>

    <details>   
        <!--brgy-->
        <summary>
        <div id="barangay" class="production">
            <a id="nav-brgy" href="add-brgy.php"><img src="../image/barangay-admin.png" alt="barangay-logo" height="25px" width="25px"><b>
                <p>BARANGAY</p>
            </b></a>
        </div>
        </summary>

        </details> 
        <!--farm-->
        <details>
            <summary>
        <div class="production">
            <div class="open-nav">
            <img src="../image/1farm-admin.png" alt="farm-logo" width="25px"><b>
                <p>FARM</p>
            </b>
            </div>
            <img id="arrow" src="../image/arrow.png" alt="arrow-down" width="15px">
        </div>

        </summary>

        <a id="nav-a" href="add-farm.php"><img src="../image/add-farm1.png" alt="add farm icon" width="30px">Add Farm</a>

        <a id="nav-a" href="view-farm.php"><img src="../image/view-farm1.png" alt="generate report icon" width="30px">View farm</a>

        <a id="nav-a" href="map.php"><img src="../image/mortality-rate.png" alt="generate report icon" width="30px">View farm Map</a>
        </details>

        <!--batch-->
        <details>
            <summary>
            <div id="barangay" class="production">
            <a id="nav-brgy" href="view-batches.php"><img src="../image/batches-admin.png" alt="batch-logo" height="25px" width="25px"><b>
                <p>BATCH</p>
            </b></a>
        </div>
        </summary>
</details>


        <!--production-->
        <details>
            <summary>
            <div class="production">
            <div class="open-nav">
            <img src="../image/1production-admin.png" alt="production-logo" width="25px"><b>
                <p>PRODUCTION</p>
            </b>
            </div>
            <img id="arrow" src="../image/arrow.png" alt="arrow-down" width="15px">
        </div>
        </summary>

       
        <ul>
            <li class="dropdown-view">
        <a ><img src="../image/view-data.png" alt="view record icon" width="30px"> View Records</a>
        <ul class="dropdown-content-view">
            <li><a id="nav-a"  href="view-broiler.php">Broiler Records</a></li>
            <li><a id="nav-a" href="view-layer.php">Layer Records</a></li>
        </ul>   
        </li> 
        </ul>

        <ul>
        <li class="dropdown-generate"><a><img src="../image/generate-report1.png" alt="generate report icon" width="25px"> Get
            Reports</a>
            <ul class="dropdown-content-generate">
                <li><a id="nav-a" href="View-B-Export.php">Broiler Reports</a></li>
                <li><a id="nav-a" href="View-L-Export.php">Layer Reports</a></li>
            </ul>
        </li>
            </ul>
        
            </details>
        <!--user-->
        <details>
        <summary>
        <div class="production">
            <div class="open-nav">
            <img src="../image/1user-admin.png" alt="user-logo" width="25px"><b>
                <p>USER</p>
            </b>
            </div>
            <img id="arrow" src="../image/arrow.png" alt="arrow-down" width="15px">
        </div>
        </summary>

        <a id="nav-a" href="add-user.php"><img src="../image/add user1.png" alt="add user icon" width="30px">Add User</a>

        <a id="nav-a" href="view-user.php"><img src="../image/view-user1.png" alt="view user icon" width="30px">View Users</a>

    </div>
    </details>
<!--screen loading-->
    <div id="preloader">
    <img src="../image/preloader2.gif" alt="Preloading" width="100px">
    </div>

    <div class="content">


        <section class="header-main">
            <h2>Poultry Products Recording and Inventory System</h2>
            <button onclick="history.back()" id="goBackButton">
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
<path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
</svg>
    </button>
            <div class="main1" id="main1">
                <span style="font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;
                    <!--<img src="../image/user.png" alt="user" width="80px">-->
                </span>
            </div>
        </section>


        <div id="mySidenavb" class="sidenavb" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="side-content">

                <div class="user">
                    <img src="../image/user.png" alt="user" width="70px">
                    <h2>
                        
                        <?php
 

          echo "$name";
       ?></h2>
                </div>

                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                        class="bi bi-people-fill" viewBox="0 0 20 20">
                        <path
                            d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z" />
                    </svg>About Us</a>
                <a href="#"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                        class="bi bi-question-circle" viewBox="0 0 20 20">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path
                            d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z" />
                    </svg>Help</a>
                <a href="logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
                        class="bi bi-box-arrow-right" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd"
                            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>Log out</a>
            </div>
        </div>

        
