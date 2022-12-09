<?php
@include 'connect.php';


$bfetch= '';

 $sqlb = "SELECT * FROM baranggay ";
 $statement = $data1->prepare($sqlb);
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $bfetch .= '<option value="   '.$row["baranggay"].'  ">    '.$row["baranggay"].'      </option>';
 }

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($data, $_POST['name']);
   $username = mysqli_real_escape_string($data, $_POST['username']);
   $password = ($_POST['password']);
   $repassword =($_POST['repassword']);
   $baranggay = $_POST['baranggay'];
   $mobile_no = $_POST['mobile_no'];
   $position = $_POST['position'];

   $sql="SELECT * from user where username='".$username."' OR name='".$name."' ";

   $result = mysqli_query($data, $sql);

   if(mysqli_num_rows($result) > 0){

	  header('location:add-user.php?add=error');

   }


    if(($password != '' && $repassword != '') && ($password != $repassword)){

    header('location:add-user.php?add=passworderror');


   }
   
   else{
         $insert = "INSERT INTO user(name, username, password,repassword, baranggay, mobile_no, position) VALUES('$name','$username','$password','$repassword','$baranggay','$mobile_no','$position')";
         mysqli_query($data, $insert);
		 sleep(1);
         header('location:add-user.php?add=success');
   }

};
?>
<?php @include 'header.php'; ?>


            <section class="col">
              <section class="log-in">
                <div class="text2">
                  <p><b>User Registration Form</b></p>
                </div>
                <?php
      	  if(isset($_GET['add'])){
			$add = $_GET['add'];
			if($add=='success'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-success">User Successfuly Added</span> </div>';
			}
            else if($add=='passworderror'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Password fields do not match</span> </div>';
			}
	
			else if($add=='error'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">User Already Exist</span> </div>';
			}
	
		
		
	 };
    	?>

<form action="#" method="POST"> 

                <div class="container px-4 text-center">
                  <div class="row gx-5">
                    <div class="col">
                     <div class="p-3 bg-transparent">
            
                    <div class="input2">
                      <select name="position" id="position" placeholder="Select Position">
                        <option value="">Select position</option>
                        <option value="admin">Administrator</option>
                        <option value="agent">Agent</option>
                      </select>
                    </div>
               
                        <div class="input2">
                      <select name="baranggay" id="baranggay" placeholder="Select Barangay">
                        <option id="" disabled>Select Barangay</option>
                        <?php echo $bfetch; ?>
                      </select>
                    </div>
                  
                     </div>
                    </div>
                    <div class="col">
                    <div class="p-3 bg-trnsparet">
            
                      
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                          <label for="floatingInput">Firstname/ M.I / Lastname </label>
                          </div>
                  
                  
                    
                        <div class="form-floating mb-3">
                          <input type="username" class="form-control" name="username" id="username" placeholder="username">
                          <label for="floatingInput">Username</label>
                          </div>
                    
                  
                    
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          <label for="floatingPassword">Password</label>
                          </div>
                          <div class="showpass">
                          <input type="checkbox" id="show-password">
                          <label for="show-password">Show password</label>
                          </div>


                          <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="repassword"  id="repassword" placeholder="Password">
                          <label for="repassword">Re-enter Password</label>
                          </div>
                    
                          <div id="passwordError" class="text-danger"></div>
                      
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="09890138761">
                          <label for="floatingInput">Contact No.</label>
                        </div>
                    </div>
                    </div>
                  </div>
                  </div>
                
         
            
                  <div class="submit">

<button class="btn" type="submit" name="submit" id="submit"> Add User</button>

</div>
              </section>
            </section>
        </div>


<script>

  const passwordInput = document.querySelector('input[type="password"]');
  const showPasswordCheckbox = document.querySelector('input[type="checkbox"]');

  showPasswordCheckbox.addEventListener('change', function() {
    passwordInput.type = this.checked ? 'text' : 'password';
  });

  function checkPasswordMatch() {
  var password = $("#password").val();
  var confirmPassword = $("#repassword").val();

  if (password != confirmPassword) {
    $("#passwordError").html("Passwords do not match!");
  } else {
    $("#passwordError").html("");
  }
}

$(document).ready(function () {
  $("#password, #repassword").keyup(checkPasswordMatch);
});

</script>


        <style type="text/css">
      
        .log-in{
          align-items: center;
          box-shadow: 2px 2px 2px 2px grey;
          border-radius: 30px;
          font-family: tahoma;
          background-color: #f9faff;
          padding: 15px;
          margin-top: 30px;
          margin-right: 100px;
          margin-left: 100px;
        }
        
        .log-in p{
          padding: 5px;
        }
        
        .text2{
          display: flex;
          justify-content: center;
          font-size: 25px;
        }
        
        
        .input{
          margin-left: -15px;
          display: flex;
          justify-content: center;
        }
        
        
        
        .submit{
          margin-bottom: 0px ;
          margin-top: 0px;
          padding: 0px !important;
          color: #0e2a83;
          display: flex;
          justify-content: center;
        }
        .submit button{
          color:white;
          background-color: darkblue;
          border:none;
        }

        .submit button:hover{
          color:white;
          background-color: blue;
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

          
        }
        
        select {
          padding: 10px;
          margin: 30px;
          margin-left: 10px;
            outline: 0;
            background-image: none;
            border: 1px solid black;
            border-radius: 5px;
        }
        
        button{
          padding: 15px 25px 15px 25px !important;
        }

        .showpass{
          padding-left:10px;
          display:flex;
          justify-content:flex-start;
          margin-bottom:20px;
        }
        
        </style>
        </body>
        </html>
        