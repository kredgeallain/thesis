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
        font-family: tahoma;
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