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
}

.production-dropdown a:hover{
background-color: #66ffcc;
padding: 5px;
}

.farm ul{
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
}

.farm-dropdown a:hover{
background-color: #66ffcc;
padding: 5px;
}

.user ul{
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
}

.user-dropdown a:hover{
background-color: #66ffcc;
padding: 5px;
}
summary :hover{
	box-shadow: 2px 2px 2px 2px #66ffcc ;
	background-color: white;
	border-radius: 5px;
}
.logout{
  margin-top:250px;
  margin-left:350px;
  margin-right:350px;
  justify-content:center;
  display:grid;
  align-items:center;
	border-radius: 25px;
	box-shadow: 5px 10px 20px 25px grey;
	background-color: #f9faff;
	padding: 30px;
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
  margin-top:-260px;
display:flex;
justify-content:flex-end;
	font-weight: bold;
	font-size: 17px;
	cursor: pointer;
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
  margin:10px;
	border:none;
	color: white;
	font-size: 15px;
	font-weight: bolder;
	background-color: #0e2a83;
	border-radius: 20px;
	cursor: pointer;
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

      </style>
        </head>
        <body>

        <div class="content">
            <section class="header-main">
              <h2>Poultry Products Recording and Inventory System</h2>
            </section>


            <section class="nav">
              <section class="production">
                <details>
                  <summary><img src="../image/1production-admin.png" height="150px" width="150px"></summary>
                  <section class="production-dropdown">
                    <ul>
                    <li><a href="view-records.html"><img src="../image/view-data2.png" height="15%" width="15%">VIEW RECORDS</a></li>
                    <li><a href="record-data.html"><img src="../image/edit-data2.png" height="15%" width="15%">RECORD DATA</a></li>
                    <li><a href=""><img src="../image/generate-report.png" height="15%" width="15%">GENERATE DATA</a></li>
                    </ul>
                  </section>
                </details>
              
              </section>
              
              <section class="farm">
                <details>
                  <summary><img src="../image/1farm-admin.png" height="150px" width="150px"></summary>
                  <section class="farm-dropdown">
                    <ul>
                    <li><a href="view-farm.php"><img src="../image/view-farm.png" height="20%" width="20%">VIEW FARM</a></li>
                    <li><a href="add-farm.php"><img src="../image/add-farm.png" height="20%" width="20%">ADD FARM</a></li>
                    <li><a href="map.html"><img src="../image/mortality-rate2.png" height="20%" width="20%">VIEW FARM MAP</a></li>
                    </ul>
                  </section>
                </details>
              
              </section>
              
              
              <section class="user">
                <details>
                  <summary><img src="../image/1user-admin.png" height="150px" width="150px"></summary>
                  <section class="user-dropdown">
                    <ul>
                    <li><a href="add-user.php"><img src="../image/add-user2.png" height="40%" width="25%">ADD USERS</a></li>
                    <li><a href="view-user.php"><img src="../image/view-user.png" height="30%" width="20%">VIEW USERS</a></li>
                    </ul>
                  </section>
                </details>
              
              </section>
              
              </section>
              <section class="summary">
  <details class="test">

			<summary class="summ"><p>Log out?</p></summary>

	<section class="logout">

			<h2>Are you sure to log out?</h2>

		<section class="button">

			<button ><a href="logout.php" class="btn">Yes</a></button>
			

			<button> <a href="adminpage.php" class="btn"> No </a></button>

		</section>

	</section>

	</details>

</section>

     
</div>


<!--script-->
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
        