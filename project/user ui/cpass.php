<?php
 @include 'connect.php';


 session_start();
 @include 'header2.php';

 if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
   
  }
  else {
    header('location:login-user.php');
  }

  

  $sql = "SELECT * FROM user where username='".$username."'";
$data = mysqli_query($data, $sql);
$row=mysqli_fetch_array($data);

$userID = $row['userID'];
?>
<form action="updateqry.php" method="POST">
<div class="card">
  <div class="card-body">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3">
          <form>
		  <div class="form-group">
            <input type=""  hidden name="userID" value= "<?php echo $userID;?>" >
              <label for="exampleInputEmail1">Current Password</label>
              <input type="password" name="cpass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Password">
              <small id="emailHelp" class="form-text text-muted">Enter your current password.</small>
            </div>

            <div class="form-group">
              <label for="exampleInputEmail1">New Password</label>
              <input type="password" name="npass" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder=" Password">
              <small id="emailHelp" class="form-text text-muted">Never share your password with anyone else.</small>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Confirm New Password</label>
              <input type="password" name="rpass" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <DIV> 
            <button type="submit" name="change" class="btn btn-primary">Submit</button>
            </DIV>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
