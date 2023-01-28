<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:login.php');
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
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


      .header{
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
color:white;
top: 0; 
width: 100%; 
}

.header-main h2{
margin: 20px;
font-weight: bold;
}

.nav{
margin-top: 50px;
display: flex;
justify-content: space-evenly;
}

.nav2{
margin-top: 50px;
display: flex;
justify-content: center;
gap:200px;

}

summary {
cursor: pointer;
list-style: none;
}

ul {
display: inline-block;
position: absolute;
border-radius: 15px;
background-color:  #f9faff;
padding-bottom: 10px;
margin-left: -210px;
margin-right: 50px;

}

li {
list-style: none;
text-decoration: none;
padding-bottom: 10px;
padding-top: 20px;
padding-left:10px;
padding-right:30px;
}

.production ul{
  z-index: 100;
box-shadow: 2px 2px 2px 2px grey;
position: absolute;
margin-left: -65px;
}

.production-dropdown img{
margin-left: -60px;
margin-top: -5px;
position: absolute;
}

.production-dropdown a{
font-weight: bold;
color: black;
margin-left: 20px;
text-decoration: none;
transition: all 0.2s ease-in-out;
}

.production-dropdown a:hover{
color:white;
background-color:darkblue;
padding: 10px;
border-radius:5px;
transform: scale(1.1);
}

.farm ul{
  z-index: 100;
box-shadow: 2px 2px 2px 2px grey;
position: absolute;
margin-left: -50px;
}

.farm-dropdown img{
margin-left: -60px;
margin-top: -5px;
position: absolute;
}

.farm-dropdown a{
  font-weight: bold;
color: black;
margin-left: 20px;
text-decoration: none;
transition: all 0.2s ease-in-out;
}

.farm-dropdown a:hover{
color:white;
background-color:darkblue;
padding: 10px;
border-radius:5px;
transform: scale(1.1);
}

.user ul{
  z-index: 100;
box-shadow: 2px 2px 2px 2px grey;
position: absolute;
margin-left: -30px;
}

.user-dropdown img{
margin-left: -60px;
margin-top: -10px;
position: absolute;
}

.user-dropdown a{
font-weight: bold;
color: black;
margin-left: 20px;
text-decoration: none;
transition: all 0.2s ease-in-out;
}

.user-dropdown a:hover{
color:white;
background-color:darkblue;
padding: 10px;
border-radius:5px;
transform: scale(1.1);
}

/* barangay*/
.brgy ul{
  z-index: 100;
box-shadow: 2px 2px 2px 2px grey;
position: absolute;
margin-left: -30px;
}

.brgy-dropdown img{
margin-left: -60px;
margin-top: -10px;
position: absolute;
}

.brgy-dropdown a{
font-weight: bold;
color: black;
margin-left: 20px;
text-decoration: none;
transition: all 0.2s ease-in-out;
}

.brgy-dropdown a:hover{
color:white;
background-color:darkblue;
padding: 10px;
border-radius:5px;
transform: scale(1.1);
}
/* batch */
.batch ul{
  z-index: 100;
box-shadow: 2px 2px 2px 2px grey;
position: absolute;
margin-left: -30px;
}

.batch-dropdown img{
margin-left: -60px;
margin-top: -10px;
position: absolute;
}

.batch-dropdown a{
font-weight: bold;
color: black;
margin-left: 20px;
text-decoration: none;
transition: all 0.2s ease-in-out;
}

.batch-dropdown a:hover{
color:white;
background-color:darkblue;
padding: 10px;
border-radius:5px;
transform: scale(1.1);
}


summary{
  transition: all 0.5s ease-in-out;
}
summary :hover{
  transform: scale(1.01);
	box-shadow: 2px 2px 2px 2px #66ffcc ;
	background-color: white;
	border-radius: 5px;
}

#logout{
  margin:10px;
	border:none;
	color: black;
	font-size: 15px;
	font-weight: bolder;
	background-color: white;
	border-radius: 20px;
	cursor: pointer;
  padding:10px;
}

#logout:hover{
  transform: scale(1.01);
	box-shadow: 2px 2px 2px 2px #66ffcc ;
	background-color: white;
	border-radius: 20px;
}

.logout button{
  z-index: 999;
  position:absolute;
  right:50%;
  left:30%;
  justify-content:center;
  display:grid;
  align-items:center;
	border-radius: 25px;
	box-shadow: 5px 10px 20px 25px grey;
	background-color: #f9faff;
	padding-right: 200px;
  padding-left:200px;
}

.logout h2{
  font-weight:bold;
	font-size: 30px;
	display: flex;
	justify-content: center;
	color: black;
	text-decoration: none;
	margin-bottom: 20px;
}


.summ{
  margin-top:-60px;
display:flex;
justify-content:flex-end;
	font-weight: bold;
	font-size: 17px;
	list-style: none;

}

.summary p{
	margin-right: 5px;
	margin-left: 5px;
	padding-top:10px;
	padding-bottom:10px;
	padding-left:15px;
	background-color: #f9faff;
  border-radius:40px;
	padding-right: 15px;
}

.button{
	margin-left: 10px;
}

button {

}
.button a{
  padding-right:60px;
  padding-left:60px;
	color: white;
	text-decoration: none; 
}

.button button:hover{
	background-color:blue;
	color:white;
}

.home{
  margin-bottom:5px;
}

details[open]:after {
   content:;
}
details.test {
    position: relative;
    padding: 5px 0;
}

details.test[open]>summary::after {
  font-size:20px;
  top:70px;
  left:910px;
    justify-content:center;
    position:absolute;
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

    #modalbody{
      display:flex;
      justify-content:center;
    }
    #modalbody h2{
      font-weight:bold;
    }
    #button{
      border:none;
      border-radius:15px;
      padding-right:50px;
      padding-left:50px;
      padding-top:10px;
      padding-bottom:10px;
    }
    #button_yes{
      border:none;
      border-radius:15px;
      background-color:darkblue;
      padding-right:50px;
      padding-left:50px;
      padding-top:10px;
      padding-bottom:10px;
    }
    #button_yes:hover{
      background-color:blue;

    }

    .modal-header{
   
    }

    .modal-content{
      border:none;
      border-radius:30px;
      padding-bottom:0;
    }

    .modal-footer{
      border:none;
      display:flex;
      justify-content:center;
      padding-top:0;
      margin-bottom:10px;
    }
 
.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color:#f1f1f1;
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

#nav:hover{
  background-color:grey;
}

#open-nav{
  position:fixed;
  left:2%;
  top:3%;
  font-size:30px;
  cursor:pointer;
  color:white;
  font-weight:bold
}

      </style>
        </head>
        <body>

        <div class="content">
            <section class="header-main">
              <h2>Poultry Products Recording and Inventory System</h2>
            </section>

            <section class="summary">
              <div class="summ">             
                  <button id="logout" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Log out?
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="modaltitle"></h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="modalbody">
                          <h2>Are you sure to log out?</h2>
                        </div>
                        <div class="modal-footer">
                          <button id="button" type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                          <a href="login-user.php" id="button_yes" type="button" class="btn btn-primary" >Yes</a>
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

              <section class="production">
                <details>
                  <summary><img src="../image/1production-admin.png" height="150px" width="150px"></summary>
                  <section class="production-dropdown">
                    <ul>
                    <li><a href="view-layer.php"><img src="../image/view-data.png" height="15%" width="15%">VIEW RECORDS</a></li>
                    <li><a href="record1.php"><img src="../image/edit-data.png" height="15%" width="15%">RECORD DATA</a></li>
                    <li><a href=""><img src="../image/generate-report1.png" height="15%" width="15%">GENERATE DATA</a></li>
                    </ul>
                  </section>
                </details>
              </section>
              
              <section class="farm">
                <details>
                  <summary><img src="../image/1farm-admin.png" height="150px" width="150px"></summary>
                  <section class="farm-dropdown">
                    <ul>
                    <li><a href="view-farm.php"><img src="../image/view-farm1.png" height="20%" width="20%">VIEW FARM</a></li>
                    <li><a href="add-farm.php"><img src="../image/add-farm1.png" height="20%" width="20%">ADD FARM</a></li>
                    <li><a href="map.php"><img src="../image/mortality-rate.png" height="20%" width="20%">VIEW FARM MAP</a></li>
                    </ul>
                  </section>
                </details>
              </section>
              
              <section class="user">
                <details>
                  <summary><img src="../image/1user-admin.png" height="150px" width="150px"></summary>
                  <section class="user-dropdown">
                    <ul>
                    <li><a href="add-user.php"><img src="../image/add user1.png" height="40%" width="25%">ADD USERS</a></li>
                    <li><a href="view-user.php"><img src="../image/view-user1.png" height="30%" width="20%">VIEW USERS</a></li>
                    </ul>
                  </section>
                </details>
              </section>

            </section>

            <section class="nav2">

            <section class="brgy">
                <details>
                  <summary><img src="../image/barangay-admin.png" height="150px" width="150px"></summary>
                  <section class="brgy-dropdown">
                    <ul>
                    <li><a href="add-brgy.php"><img id="add-brgy" src="../image/add-barangay1.png" height="60px" width="60px">ADD BARANGAY</a></li>
                    </ul>
                  </section>
                </details>
              </section>

              <section class="batch">
                <details>
                  <summary><img src="../image/batches-admin.png" height="150px" width="150px"></summary>
                  <section class="batch-dropdown" style="z-index:2">
                    <ul>
                    <li><a href="add-user.php"><img src="../image/add user1.png" height="40%" width="25%">ADD ADD BATCH</a></li>
                    <li><a href="view-user.php"><img src="../image/view-user1.png" height="30%" width="20%">VIEW BATCHES</a></li>
                    </ul>
                  </section>
                </details>
              </section>
            </section>

     
</div>

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
        