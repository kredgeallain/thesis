<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="../image/logo.png" type="image/icon type">
    <link rel="stylesheet" href="../assests/forgot-pass.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Forgot Password?</title>

    <style>
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

</head>

<body>
    <section class="wrapper">
        <div class="content">
            <div class="picture">
                <img src="../image/forgot-pass.png" alt="forgot Password_icon">
            </div>
        </div>
        <div class="header">
            <h1>Forgot <br> Password?</h1>
            <div>
                <p>Please contact the System Administrator or Developer.</p>
            </div>
            <div class="back-button">
                <a type="button" href="login-user.php" class="btn btn-primary">Back</a>
            </div>
        </div>

    </section>

    <!--screen loading-->
    <div id="preloader">
        <img src="../image/preloader2.gif" alt="Preloading" width="100px">
    </div>

    <script>
        window.onload = function() {
        var preloader = document.getElementById('preloader');
        preloader.style.display = 'none';
        }
    </script>

</body>

</html>