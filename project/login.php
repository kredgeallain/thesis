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

		header('location:login.php?login=deactivated');
	}

	elseif($row["position"]=="agent")
	{	

		$_SESSION["username"]=$username;
		sleep(1);

		header("location:agentpage.php");
	}

	elseif($row["position"]=="admin")
	{

		$_SESSION["username"]=$username;
		sleep(1);
		header("location:home.php");
	}

	else
	{
		header('location:login.php?login=error');
	}

}


?>


<!DOCTYPE html>
<html>

<head>
    <title>Log in!</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">


    <link rel="icon" href="../image/logo.png" type="image/icon type">
</head>

<body>


    <section class="header">
        <div class="logo">
            <img src="../image/logo.png" alt="Department of Agriculture Logo" width="100px" , height="100px">
            <p>Republic of the Philippines</p>
            <h1>DEPARTMENT OF AGRICULTURE</h1>
        </div>

        <div class="text">
            <p>San Lorenzo, Guimaras</p>
        </div>

    </section>
    <section class="summary">
        <details>

            <summary>
                <p>Log in</p>
            </summary>

            <section class="login">
                <form action="#" method="POST">

                    <?php
      	  if(isset($_GET['login'])){
			$add = $_GET['login'];
			if($add=='error'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Invalid Username or Password</span> </div>';
			}
			if($add=='deactivated'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Your account has been deactivated</span> </div>';
			}
	 };
         ?>
                    <div class="username">
                        <input type="username" name="username" placeholder="Username" required>
                    </div>
                    <div class="pass">
                        <input type="password" name="password" placeholder="Password" required>
                    </div>
                    <div class="submit">
                        <input type="submit" name="submit" value="Log in">
                    </div>
                    <a href="">Forgot your password <br> or Username?</a>
                </form>
            </section>

        </details>
    </section>

    <!--style-->

    <style type="text/css">
    body {
        padding: 0px;
        margin: 0px;
        background-image: url(../image/login-background.png);
        background-repeat: no-repeat;
        background-size: 100%;
        background-position: fixed;
        font-family: tahoma;
    }

    .header {
        size: 10px;
        border-bottom: solid white 5px;
        font-family: tahoma;
        background-color: #0e2a83;
        padding: 15px;
        padding-top: 10px;
        padding-bottom: 5px;
    }

    .logo {
        display: flex;
        padding-bottom: 25px;
    }

    .logo p {
        color: white;
        padding-left: 30px;
        padding-right: -100px;
    }

    .logo h1 {
        color: white;
        text-decoration: overline;
        font-size: 35px;
        padding-left: 15px;
        padding-right: 10px;
        padding-top: 15px;
        margin-left: -200px;
    }

    .text p {
        color: white;
        margin-top: -50px;
        padding-left: 130px;
    }

    .username {
        display: flex;
        justify-content: center;
    }

    .pass {
        display: flex;
        justify-content: center;
    }

    .submit {
        display: flex;
        justify-content: center;
    }

    .login {
        border-radius: 20px;
        box-shadow: 2px 2px 2px 2px grey;
        margin-top: 0px;
        margin-right: 80px;
        margin-left: 600px;
        background-color: #f9faff;
        padding: 30px;
        padding-bottom: 100px;
    }

    .login a {
        font-size: 15px;
        display: flex;
        float: left;
        color: black;
        text-decoration: none;
        margin-top: 30px;
        margin-left: 40px;
        margin-right: 395px;
    }

    input[type=submit] {
        border-radius: 20px;
        background-color: #0e2a83;
        border: none;
        color: white;
        padding: 16px 32px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
    }

    input {
        color: black;
        border-radius: 10px;
        padding: 10px;
        padding-left: 20px;
        padding-right: 50px;
        margin: 20px;
        margin-left: 10px;
    }

    summary {
        font-weight: bold;
        margin-top: -70px;
        font-size: 17px;
        cursor: pointer;
        list-style: none;
        position: absolute;
        right: 135px;
    }

    .summary p {
        margin-right: 5px;
        margin-left: 5px;
        padding-top: 10px;
        padding-bottom: 10px;
        padding-right: 15px;
        padding-left: 15px;
        background-color: #f9faff;
        border: solid grey 2px;
        border-radius: 40px;
        padding-right: 15px;
    }

    a:hover {
        color: red;

    }

    </body></html>