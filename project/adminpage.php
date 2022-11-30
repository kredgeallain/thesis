<?php

@include 'config.php';

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


<section class="nav">
<section class="production">
	<details>
		<summary><img src="../image/1production-admin.png" height="150px" width="150px"></summary>
		<section class="production-dropdown">
			<ul>
			<li><a href="view-records.html"><img src="../image/view-data2.png" height="15%" width="15%">VIEW RECORDS</a></li>
			<li><a href="record-data.html"><img src="../image/edit-data2.png" height="15%" width="15%">ENCODE DATA</a></li>
			<li><a href=""><img src="../image/generate-report.png" height="15%" width="15%">GENERATE DATA</a></li>
			<li><a href="search.html"><img src="../image/find-report.png" height="15%" width="15%">FIND RECORDS</a></li>
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
	<details>

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


.title{
	font-size: 20px;
	display:flex;
	justify-content: center;
	padding-bottom: 10px;
}

.nav{
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
	top: 100px;
	display: inline-block;
	border-radius: 20px;
	box-shadow: 5px 10px 20px 25px grey;
	margin-top: -100px;
	margin-right:100px;
	margin-left: 550px;
	background-color: #f9faff;
	padding: 30px;
}

.logout h2{
	font-size: 30px;
	display: flex;
	justify-content: center;
	color: black;
	text-decoration: none;
	margin-top: 10px;
}


.summ{
	margin-top: -320px;
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
	border-radius: 15px;
	cursor: pointer;
}
.button a{
	color: white;
	text-decoration: none; 
}

.button button:hover{
	background-color:blue;
	color:white;
}

</body>
</html>