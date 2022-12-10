<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <Section class="wrapper">
      
    <div class="container text-center" action="#" method="POST">

        <div class="row">
            <div class="col-sm-8">

              <div class="title">
                <h2>Inventory and Recording System for Poultry Production</h2>
              </div>
            
              <div class="background">
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e9/Department_of_Agriculture_of_the_Philippines.svg/640px-Department_of_Agriculture_of_the_Philippines.svg.png" class="img-fluid" alt="..." width="200">
              </div>
         

            </div>


          <div class="col-sm-4">
            <div class="login-form">

                <div class="login-text">
                    <h1><b>USER</b></h1>
                    <h2>Login</h2> 
                </div>

                <div class="form-floating mb-3">
                  <input type="username" class="form-control" id="floatingInput" placeholder="username" name="username" required>
                  <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                  <label for="floatingPassword">Password</label>
                </div>
                <a href="">Forgot password?</a>
                <div class="login-button">
                <div class="d-grid gap-2">
                 
                    <button class="btn btn-primary" type="button" name="submit" value="Log in">Login</button> 
                  </div>
                  </div>
            </div>
          </div>
        </div> 
        </div>
</Section>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 

<!--style-->
<style type="text/css">

  *{
    font-family: Helvetica;
    margin:0;
    padding: 0;
  }

.wrapper{
  margin-top: 20px;
  justify-content: center !important;
  display:flex !important;
  align-items: center !important;
  align-content: center !important;
    align-items: center;
    padding: 5px;
}
.row{
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
  display: flex;
  align-items: center;
  justify-content: center;
  align-items: center;
  background-image: url("../image/windmill.jpg");;
  opacity: 100%;
  border: 7px solid blue;
  background-repeat: auto;
  background-position: auto;
  background-size: cover;
  box-shadow: 1px 1px 16px 2px darkblue;
  border-radius: 10px;
}
h1{
  color: #0e2a83;
}

.col-sm-4{
  margin-top: 60px;
  margin-bottom: 20px;
}

.login-button button{
  background-color: #0e2a83 !important;
}

.login-button button:hover{
  background-color: blue !important;
}
.title{
  box-shadow: 1px 1px 14px 10px skyblue;
  border: 2px solid blue;
  background-color: darkblue;
  border-radius: 10px;
  margin:50px;
}

.title h2{
  color:white;
  font-weight: bold;
  margin:20px;
}


</style>
</body>
</html>