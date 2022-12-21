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
                  <p><b><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 2 20 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
</svg>User Registration Form</b></p>
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
                    <div class="col" id="col1">
                     <div class="p-3 bg-transparent">
            
                    <div class="input2">
                      <select class="form-select" aria-label="Default select example" name="position" id="position" placeholder="Select Position" required="true">
                        <option value=""disabled selected>Select position</option>
                        <option value="admin">Administrator</option>
                        <option value="agent">Agent</option>
                      </select>
                    </div>
               
                        <div class="input2">
                      <select class="form-select" aria-label="Default select example" name="baranggay" id="baranggay" placeholder="Select Barangay"  required="true">
                        <option disabled selected>Select Barangay</option>
                        <?php echo $bfetch; ?>
                        <option disabled >Add Barangay if your Barangay don't exist!</option>
                      </select>
                    </div>
                    <!---->

                    <div class="add-brgy-button">
   <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 20">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg>Add Barangay</button>
    </div>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 20 20">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg>Add Barangay</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Barangay</span>
  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
</div>

   

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>  

   </div>

                  <!---->
                     </div>
                    </div>
                    <div class="col">
                    <div class="p-3 bg-trnsparet">
            
                      
                        <div class="form-floating mb-3">
                          <input type="text" class="form-control" name="name" id="name" placeholder="Name"  required="true">
                          <label for="floatingInput">Firstname/ M.I / Lastname </label>
                          </div>
                  
                  
                    
                        <div class="form-floating mb-3">
                          <input type="username" class="form-control" name="username" id="username" placeholder="username"  required="true">
                          <label for="floatingInput">Username</label>
                          </div>
                    
                  
                    
                        <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="password" id="password" placeholder="Password"  required="true">
                          <label for="floatingPassword">Password</label>
                          </div>
                          <div class="showpass">
                            <div class="showpass-checkbox">
                          <input type="checkbox" id="show-password">
                            </div>
                          <label for="show-password">Show password</label>
                          </div>


                          <div class="form-floating mb-3">
                          <input type="password" class="form-control" name="repassword"  id="repassword" placeholder="Password">
                          <label for="floatingPassword">Re-enter Password</label>
                          </div>
                
                      
                        <div class="form-floating mb-3">
                          <input type="number" class="form-control" id="mobile_no" name="mobile_no" placeholder="09890138761"  required="true">
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
        
       .submit button{
          padding: 15px 25px 15px 25px !important;
        }

        .showpass{
          padding-left:10px;
          display:flex;
          justify-content:flex-start;
          margin-bottom:20px;
        }

        .showpass-checkbox input{
          margin-right:10px;
        }

        .add-brgy-button{
display:flex;
justify-content:flex-start;
}

.add-brgy-button button{
    border:none;
    background-color:#00b7EB;
}

.add-brgy-button button:hover{
    border:none;
    background-color:#007FFF;
}
        </style>
        </body>
        </html>
        