<?php

@include 'connect.php';

session_start();

if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$username=$_POST["username"];
	$password=$_POST["password"];


	$sql="select * from user where username='".$username."' AND password='".$password."' ";

	$result=mysqli_query($data,$sql);

	$row=mysqli_fetch_array($result);
	if($row["status"]=="off")
	{

		header('location:login-user.php?login=deactivated');
	}

	elseif($row["position"]=="agent")
	{	

		$_SESSION["username"]=$username;
		sleep(1);

		header("location:user ui/homepage.php");
	}

	elseif($row["position"]=="admin")
	{

		$_SESSION["username"]=$username;
		sleep(1);
		header("location:home.php");
	}

	else
	{
		header('location:login-user.php?login=error');
	}

}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <Section class="wrapper">
      
    <div class="container text-center" action="#" method="POST">

        <div class="row">



          

            <div class="col-sm-8">

              <div class="animated-text">
              <h2 class="typing-text">MONITORING ○ RECORDING ○ MAPPING</h2>
            </div>
            <div class="wrapper-photo">
                <div class="system-title">
              <div class="title">
                <h2>Inventory and Recording System for Poultry Production</h2>
              </div>
            </div>
    
              <div class="background">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Department_of_Agriculture_of_the_Philippines.svg/640px-Department_of_Agriculture_of_the_Philippines.svg.png" class="img-fluid" alt="..." width="200">
              </div>
            </div>
      
         

            </div>


            <div class="col-sm-4">
              <div class="login-form">

                  <div class="login-text">

                      <h1>Login</h1> 
                  </div>
                  <form action="#" method="POST">
  
                  <div class="form-floating mb-3">
                    <input type="username" class="form-control" id="floatingInput" placeholder="username" name="username" required>
                    <label for="floatingInput" required="true">Username</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword" required="true">Password</label>
                  </div>
                  <div class="showpass">
                    <div class="checkbox">
                    <input type="checkbox" id="show-password">
                  </div>
                    <label for="show-password">Show password</label>
                    </div>

                    <?php
      	  if(isset($_GET['login'])){
			$add = $_GET['login'];
			if($add=='error'){
				echo ' <div id="error" class ="d-flex justify-content-center"> <span class="alert alert-danger">Invalid Username or Password</span> </div>';
			}
			if($add=='deactivated'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Your account has been deactivated</span> </div>';
			}
	 };
         ?>

                  <a href="">Forgot password?</a>
                  <div class="login-button">
                  <div class="d-grid gap-2">
                   
                      <button class="btn btn-primary" type="submit" name="submit" value="Log in">Login</button> 
                    </div>
                    </div>
                    </form>
              </div>
            </div>


        </div> 
        </div>
</Section>

<!--screen loading-->
<div id="preloader">
    <img src="../image/preloader2.gif" alt="Preloading" width="100px">
  </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
<script>

const passwordInput = document.querySelector('input[type="password"]');
const showPasswordCheckbox = document.querySelector('input[type="checkbox"]');

showPasswordCheckbox.addEventListener('change', function() {
  passwordInput.type = this.checked ? 'text' : 'password';
});


    window.onload = function() {
      var preloader = document.getElementById('preloader');
      preloader.style.display = 'none';
    }


</script>


<!--style-->
<style type="text/css">

  body{
    background-image: url(../image/background4.jpg);
    background-repeat: auto;
    background-position: auto;
    background-size: cover;
    background-color:#f9faff;
    font-family: Helvetica;
    margin:0;
    padding: 0;
    display: flex;
    justify-content: space-evenly;
    align-items: center;
  }

.wrapper{
  margin-top: 20px;
justify-content: space-around;
  display:flex !important;
  align-items: center !important;
  align-content: center !important;
    align-items: center;
    padding: 5px;
}
.row{
  display: flex;
  align-items: space-around;
align-content: center;
}

.login-text{
    padding-left: 8px;
    border-left: 3px solid blue;
    display: grid;
    justify-content: flex-start;
    margin-bottom: 10px;
}

.login-text h2{
  margin-left:-19px ;
}

.login-form{
  background-color: white;
  box-shadow:2px 2px 12px 1px grey;
  border-radius:10px;
  border:1px solid grey;
  padding:30px;
    display: grid ;
    justify-content: center;
    align-items: center ;
    justify-content: space-evenly ;
}


a{
  margin-top: 30px;
  margin-bottom: 15px;
  text-decoration: none;
  color: red ;
  display: flex;
  justify-content: flex-end;
}

input{
     padding: 10px 150px 0px 10px !important;
}


.col-sm-8{
  display: grid;
  align-items: center;
  justify-content: flex-start;
 background-image: url("../image/windmill.jpg");
  opacity: 100%;
  background-repeat: auto;
  background-position: auto;
  background-size: cover;
  box-shadow: 1px 1px 16px 2px grey;
  border-radius: 10px;
  filter: blur();
}
h1{
  color: #0e2a83;
}

.col-sm-4{
  margin-top: 40px;
  margin-bottom: 40px;
}

.login-button button{
  background-color: #0e2a83 !important;
}

.login-button button:hover{
  background-color: blue !important;
}
.title{
  box-shadow: 1px 1px 14px 10px skyblue;
  background-color: darkblue;
  border-radius: 90px;
  margin:50px;
}

.title h2{
  color:white;
  font-weight: bold;
  margin:20px;
}

.system-title{
  display: flex;
  justify-content: center;
  align-items: center;
}

.animated-text{
  margin-bottom: 0;
  display: flex;
  justify-content: center;
}

.animated-text h2{
  color:darkblue;
}

@media screen and (min-width: 1024px){

  body{
    color: grey;
    /*background-image: url(../image/windmill2.jpg);*/
    background-repeat: auto;
  background-position: auto;
  background-size: cover;


  }


  
    .col-sm-8{
      margin-top: 70px;
      margin-left: -30px;
      margin-right: 50px;
      margin-bottom: -100px;
    }

    .col-sm-4{
      margin-right: -100px;
      margin-top: 70px;
      margin-bottom: -100px;
    }

    .animated-text{
      margin-bottom: -400px;
}

.animated-text h2{
  font-size: 35px;
  font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}

.system-title{
  margin-left: -20px;
  margin-top: -300px;
}

.background{
  margin-right: 20px;
  margin-top: -215px;
  margin-left: -30px;
}

}

.showpass{
  display: flex;
  margin-top: 20px;
  margin-left: 5px;
  justify-content: flex-start;
}

.checkbox{
  margin-right: 10px;
}

@keyframes typing {
  from {
    width: 0;
  }
  to {
    width: 100%;
  }
}

.typing-text {
  overflow: hidden;
  white-space: nowrap;
  animation: typing 10s infinite;
}

.wrapper-photo{
  display:flex;
  justify-content: center;
}

@media screen and (max-width: 469px){

  .wrapper{
    /*background-image: url(../image/windmill2.jpg);*/
    flex-grow: 2;
    margin-top: 0;
  }

  .title{
  box-shadow: 1px 1px 14px 10px skyblue;
  background-color: darkblue;
  border-radius: 10px;
  margin:50px;
}

.title h2{
  font-size:15px;
}

.background img{
  display: none;
  
}

.animated-text h2{
  display: none;
}

.login-form{
  z-index:1;
  box-shadow: 1px 1px 10px 5px grey;
  border-radius: 10px;
}

.input-group input{
  z-index: 1;
 flex-grow: 1;
 width: 200px;
}

.col-sm-8{
  box-shadow: none;
  border: none;
}


}

#error{
  margin-top:20px;
  margin-bottom:-20px;
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

</style>


</body>
</html>