<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../../image/logo.png" type="image/icon type">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Welcome!</title>

    <script>
      function openNav() {
        document.getElementById("mySidenav").style.width = "100%";
      }
      
      function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
      }
      </script>


<style>
.header{
    display: flex;
    justify-content: space-evenly;
    color: white;
    display: flex;
    padding: 10px;
    background-color: darkgreen;
  }

  .text2 h2{
    text-align: center;
    font-size: 25px;
  }

#text2-nav{
  display:none;
}


  @media screen and (max-width: 800px){
    .text2{
      display:none;
}


.header{
    padding:20px;
    background-color: darkgreen;
  }

  #text2-nav{
    color:white !important;
    justify-content:center;
  display:flex;
}

#text2-nav h2{
  font-size:20px;
}

.logo{
    position:absolute;
    top:0;
    left:20px;
    padding-top: 3px;
    padding-bottom: 3px;
    width:25px;
  }

  #sidebar-btn{
    position:absolute;
    top:0;
    right:0;
    color:white;
    font-size:20px;
  }

  }
  
  #sidebar-btn{
    position:absolute;
    top:0;
    right:20px;
    color:white;
  }

  .logo{
    position:absolute;
    top:0;
    left:20px;
    padding-top: 3px;
    padding-bottom: 3px;
  }

  .sidenav {
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
  text-align:flex-start;
}


.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover{
  color: darkblue;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.open-navigation{
  position:absolute;
  right:0;
  bottom:0%;
}

.open-navigation button{
  color:grey;
  border:none;
  background: rgb(232,242,239);
background: linear-gradient(93deg, rgba(232,242,239,0.08167016806722693) 52%, rgba(197,241,199,0.6334908963585435) 100%);
  border-radius:20px 0 0 20px;
  padding:15px 20px 15px 20px;
}

.open-navigation button:hover{
  color:grey;
  background: rgb(232,242,239) !important;
background: linear-gradient(285deg, rgba(232,242,239,0.08167016806722693) 52%, rgba(197,241,199,0.6334908963585435) 100%) !important;
}

#modal-content{
  border:none;
}
#modal-header{
  border:none;
}

.center-nav{
  display:grid;
  place-items:center;
}

.center-nav a{
text-decoration:none;
font-weight:bold;
}

.right-left{
  gap:110px;
  display:flex;
  justify-content:space-around;
}
.right{
  display:grid;
  place-items:center;
}
.left{
  display:grid;
  place-items:center;
}
.bottom{
  margin-top:40px !important;
}
</style>
</head>
<body>
<!--header-->
  <header>

    <section class="header">
    <div class="text2">
      <H2>Inventory and Recording System for Poultry Prduction</H2>
    </div>
  </section>
  <div class="logo">
      <img src="../../image/logo.png" class="img-fluid" alt="logo" width="50px">
    </div>

  <div>
    <div id="mySidenav" class="sidenav">

    <div class="text2" id="text2-nav">
      <H2>Inventory and Recording System for Poultry Prduction</H2>
    </div>

      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
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
      <a href="cpass.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor" class="bi bi-key" viewBox="0 0 20 20">
        <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
        <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
      </svg>Change password</a>
      <a href="../logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="30" fill="currentColor"
        class="bi bi-box-arrow-right" viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
        <path fill-rule="evenodd"
            d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
    </svg>Logout</a>
    </div>
    
    <span id="sidebar-btn" style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
</div>
  </header>


  <!-- 
<div class="open-navigation">
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#navigation">
<svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-caret-left" viewBox="0 0 16 16">
  <path d="M10 12.796V3.204L4.519 8 10 12.796zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753z"/>
</svg>
</button>
</div>
Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="navigation" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" id="modal-content">
      <div class="modal-header" id="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modal-body">

      <section class="center-nav">
      <div class="top">
        <a href="farm-map.php"><img src="../../image/mortality-rate2.png" alt="Farm map" width="100px"> View Map</a>
      </div>

      <div class="right-left">

        <div class="right">
        <a href="farm-map.php"><img src="../../image/batches.png" alt="Farm map" width="100px">Add Batch</a>
        </div>

        <div class="left">
        <a href="farm-map.php"><img src="../../image/record-icon2.png" alt="Farm map" width="100px">Record</a>
        </div>
      </div>

      <div class="bottom">
          <a href="homepage.php"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 20 20">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
  <path d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
</svg>Home</a>
      </div>
      </section>
      </div>
    </div>
  </div>
</div>