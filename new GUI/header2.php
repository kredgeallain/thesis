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
   
    <style type="text/css">
      body {
        margin: 0;
        font-family: helvetica;
      }
      
      .sidebar {
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
        .sidebar a {float: left;}
        div.content {margin-left: 0;}
        .production{
          margin-top: 30px;
  border-top: 1px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
}
        
      }
      
      @media screen and (max-width: 400px) {
        .sidebar a {
          text-align: center;
          float: none;
        }
        .production{
          margin-top: 30px;
  border-top: 1px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
}
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
.production{
  border-top: 1px solid black;
  display: flex;
  justify-content: center;
  align-items: center;
}
.production p{
  padding-left: 5px;
  padding-top: 15px;
}

.home{
  background-color: #0e2a83;
}

.home a{
  color: white;
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
  left:920px;
    justify-content:center;
    position:absolute;
    content: "X";
    bottom: 0;
}

.sidebar {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #111;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidebar a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidebar a:hover {
  color: #f1f1f1;
}

.sidebar .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

/* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
@media screen and (max-height: 450px) {
  .sidebar {padding-top: 15px;}
  .sidebar a {font-size: 18px;}
}

      </style>
        </head>
        <body>
 

        <div class="sidebar">
          <section class="header">
            <div class="logo">
              <img src="../image/logo.png" alt="logo" width="80px">
            </div>
          </section>

        <div class="home"> 
          <a href="home.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-house-door-fill" viewBox="1 1 20 16">
            <path d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5Z"/>
          </svg>Home</a>
        </div>
<!--production-->
          <div class="production">
            <img src="../image/1production-admin.png" alt="production-logo" width="25px"><b><p>PRODUCTION</p></b>
          </div>

          <a  href="#home"><img src="../image/view-data.png" alt="view record icon" width="30px"> View Records</a>

          <a  href="#home"><img src="../image/generate-report1.png" alt="generate report icon" width="25px"> Generate reports</a>

          <a  href="#home"><img src="../image/record-icon.png" alt="generate report icon" width="30px"> Record Reports</a>

   
<!--farm-->
        <div class="production">
            <img src="../image/1farm-admin.png" alt="production-logo" width="25px"><b><p>FARM</p></b>
          </div>

          <a  href="#home"><img src="../image/add-farm1.png" alt="add farm icon" width="30px">Add Farm</a>

          <a  href="#home"><img src="../image/view-farm1.png" alt="generate report icon" width="30px">View farm</a>

          <a  href="#home"><img src="../image/mortality-rate.png" alt="generate report icon" width="30px">View farm Map</a>

     

<!--user-->
        <div class="production">
            <img src="../image/1user-admin.png" alt="production-logo" width="25px"><b><p>USER</p></b>
          </div>

          <a  href="#home"><img src="../image/add user1.png" alt="add user icon" width="30px">Add User</a>

          <a  href="#home"><img src="../image/view-user1.png" alt="view user icon" width="30px">View Users</a>

</div>

     

        <div class="content">
            <section class="header-main">
              <h2>Poultry Products Recording and Inventory System</h2>
            </section>

            <div id="mySidebar2" class="sidebar2">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
  <a href="#">About</a>
  <a href="#">Services</a>
  <a href="#">Clients</a>
  <a href="#">Contact</a>
</div>

<div id="main">
  <button class="openbtn" onclick="openNav()">☰</button>  
  <h2>Collapsed Sidebar</h2>
</div>

<script>
function openNav() {
  document.getElementById("mySidebar2").style.width = "0";
  document.getElementById("main").style.marginLeft = "0";
}

function closeNav() {
  document.getElementById("mySidebar2").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
}
</script>

            