<?php
// Turn on error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'connect.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);


    $sql="select * from user where username='".$username."' ";
      $result=mysqli_query($conn,$sql);

    	$row=mysqli_fetch_array($result);

      $hashed = $row["password"];


      if (password_verify($password, $hashed)) {
        if ($row["status"] == "off") {
            header('location:login-user.php?login=deactivated');
            exit();
        }

        if ($row["position"] == "agent") {
            $_SESSION["username"] = $username;
            sleep(1);
            header("location:user ui/homepage.php");
            exit();
        }

        if ($row["position"] == "admin") {
            $_SESSION["username"] = $username;
            sleep(1);
            header("location:homepage.php");
            exit();
        }
    } else {
        header('location:login-user.php?login=error');
        exit();
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link rel="stylesheet" href="../assests/login-user.css">
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
              <h2 class="typing-text">MONITORING ○ INVENTORY ○ MAPPING</h2>
            </div>
            <div class="wrapper-photo">
                <div class="system-title">
              <div class="title">
                <h2>Monitoring and Inventory System for Poultry Production</h2>
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

                  <a id="a" href="forgot-pass.php">Forgot password?</a>
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
    <img src="../image/logo.png" alt="Preloading" width="400px">
    <h1>LOADING...</h1>
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

<style>
    @media screen and (max-width: 800px){
      #preloader {
    background-color: white;
    z-index: 9999;
}

#preloader img {
  width:300px !important;
    position: absolute;
    top: 15%;
    left: 13%;
    animation: reveal 2s linear infinite;
}

#preloader h1 {
    font-weight: bold;
    position: absolute;
    top: 70%;
    left: 35%;
    animation: reveal 2s linear infinite;
}
  }
</style>

</body>
</html>