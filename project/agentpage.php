<?php

@include 'connect.php';

session_start();

if(!isset($_SESSION['username'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html>
<head>
	<title> Recording and Inventory System for Poultry Products!</title>
	<link rel="icon" href="../image/logo.png" type="image/icon type">
</head>
<body>
	<section class="header">
		<div class="logo">
			<img src="../image/logo.png" alt="Department of Agriculture Logo" width="80px", height="80px">
			<p>Republic of the Philippines</p>
			<h1>DEPARTMENT OF AGRICULTURE</h1>
		</div>

		<div class="text">
			<p>San Lorenzo, Guimaras</p>
		</div>
	</section>

<section>
	<div class="title">
		<h1>Poultry Products Recording and Inventory System </h1>
	</div>
</section>

<section>
	<div class="nav">
		<div class="record">
			<a href="record-data.html"><img src="../image/record-icon2.png" alt="recod icon" width="165px", height="165px"></a>
			<h2><a href="record-data.html">RECORD POULTRY PRODUCTION</a></h2>
		</div>


		<div class="mortality-rate">
			<a href="map.html"><img src="../image/mortality-rate2.png" alt="mortality rate" width="170px", height="130px"></a>
			<h2><a href="map.html">VIEW FARM LOCATION</a></h2>
		</div>

	</div>
</section>



<section class="summary">
	<details>

			<summary class="summ"><p>Log out?</p></summary>

	<section class="logout">

			<h2>Are you sure to log out?</h2>

		<section class="button">

			<button > <a href="logout.php" class="btn">Yes</a> </button>

			<button > <a href="agentpage.php" class="btn">No</a> </button>
		</section>

	</section>
		
	</details>
</section>



	
	<!--style-->

<style type="text/css">

body{
	font-family: tahoma;
	padding: 0px;
	margin: 0px;

}

.header{
	background-color: #0e2a83;
	padding: 15px;
	padding-bottom: 5px;
	padding-right: 20px;
}

.logo {
	margin-left: -10px;
	margin-top: -10px;
	display: flex;
	padding-bottom: 10px;
}

.logo p{
color: white;
padding-left: 20px;
}

.logo img{
	padding-top: 5px;
}

.logo h1{
	color: white;
	text-decoration: overline;
	font-size: 25px;
	padding-left: 15px;
	padding-right: 10px;
	padding-top: 15px;
	padding-bottom: 10px;
	margin-left: -200px;


}

.text p{
	color: white;
	margin-top: -50px;
	padding-top: 5px;
	padding-left: 90px;
	margin-bottom: 5px;
}



.title{
	font-size: 20px;
	display:flex;
	justify-content: center;
	padding-bottom: 10px;
}

.nav{
	display: flex;
	justify-content: center;
	padding-top: 40px;
}
.nav h2{
	padding-left: 20px;
	padding-right:20px;
	margin-bottom: 100px;
}

.nav a{
	color: black;
	text-decoration: none;
	margin-left: 10px;
	margin-right: 0px;
	padding-left: 0px;
	padding-right: 0px;
}

.nav img{
	margin-bottom: 10px;
	padding-left: 10px;
	padding-left: 60px;
}

.title h1{
	margin-top: 5px;
	margin-bottom:0px;
	
}

.record{
	display: flex;

}
.record img{
	padding: 0px;
	margin-top: -40px;
}
.record h2{
	padding-left: -10px;
	margin-left: -10px;
}

.mortality-rate{
	display: flex;
}
.mortality-rate img{
	margin-right: 30px;
	padding-right: 10px;
	margin-top: -20px;
	margin-right:0px;
}
.mortality-rate h2{
	display: flex;
}

.nav h2:hover{
	background-color: #66ffcc;
	border-radius: 5px;
}
.logout{
	display: inline-block;
	border-radius: 20px;
	box-shadow: 2px 2px 2px 2px grey;
	margin-top: 0px;
	margin-right:80px;
	margin-left: 500px;
	background-color: #f9faff;
	padding: 30px;
}

.logout h2{
	font-size: 20px;
	display: flex;
	margin-left: 20px;
	justify-content: center;
	color: black;
	text-decoration: none;
	margin-top: 10px;
}


.summ{
	margin-top: 280px;
	font-weight: bold;
	font-size: 17px;
	cursor: pointer;
	list-style: none;
	position: absolute;
	margin-right:-100px;
	right: 135px;
}

.summary p{
	margin-right: 5px;
	margin-left: 5px;
	padding-top:10px;
	padding-bottom:10px;
	padding-left:15px;
	background-color: #f9faff;
	border: solid grey 2px;
	border-radius: 40px;
	padding-right: 15px;
}

.button{
	margin-left: 25px;

}

button {
	border:none;
	color: white;
	width: 150px;
	height: 30px;
	font-size: 15px;
	font-weight: bolder;
	background-color: #0e2a83;
	border-radius: 20px;
	cursor: pointer;
}
.button a{
	color: white;
	text-decoration: none; 
}


</body>
</html>