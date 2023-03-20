<?php

require_once '../connect.php';



if(isset($_POST['submit'])){


    $brgy = mysqli_real_escape_string($data, $_POST['brgy']);


    $sql="SELECT * from baranggay where baranggay='".$brgy."' ";

    $result = mysqli_query($data, $sql);

    if(mysqli_num_rows($result) > 0){

        header('location:add-brgy.php?add=error');
  
     }

     else{
        $insert = "INSERT INTO baranggay(baranggay) VALUES('$brgy')";
        mysqli_query($data, $insert);
		    sleep(1);
        header('location:add-brgy.php?add=success');
   }




}


?>

<?php include ("../head.php");  ?>

<div class="wrapper-add">

    <?php
      	  if(isset($_GET['add'])){
			$add = $_GET['add'];
			if($add=='success'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-success">Barangay Successfuly Added</span> </div>';
			}

			else if($add=='error'){
				echo ' <div class ="d-flex justify-content-center"> <span class="alert alert-danger">Barangay Already Existed</span> </div>';
			}
	
		
		
	 };
    	?>

    <form method="POST" action="#">
</form>
<div class="wrapper-list" id='brgy-list'>
    <?php
    
    @include '../connect.php';
$query = "SELECT * FROM baranggay";


if ($result = $data->query($query)){
		echo "<table id='tbl-list' class='table'>
			<thead>	  
			<tr>
				
				<th scope='col' hidden id='count'>BaranggayID</th>
				<th scope='col' id='name'>Barangay</th>
                <th scope='col' id='edit'> Edit </th>
                <th scope='col' id='edit'> Farm </th>
			</tr>	  
			</thead>";
		}

        while ($row = $result->fetch_array()) {


	
   
        	echo"<tr>";
            	echo "<td hidden >" .$row['baranggayID']. "</td>";
            	echo "<td id='name'>" .$row['baranggay']. "</td>";
                echo '<td> 
            

              <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addbatch-modal'.$row['baranggayID'].'">
              Edit
              </button>


              <div class="modal fade" id="addbatch-modal'.$row['baranggayID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                  <form action="updateqry.php" method="POST">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Barangay</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">

                              <div class="form-floating mb-3">
                                  <input name="baranggay" type="text" value= "'  .$row['baranggay']. '" class="form-control" id="floatingInput" placeholder="name" >
                                  <label for="floatingInput">Barangay</label>
                              </div>
                              <div class="form-floating mb-3">
                              <input type="text" name="baranggayID" class="form-control" value= "'  .$row['baranggayID']. '" hidden readonly id="floatingInput" placeholder="name">
                              <label for="floatingInput"></label>
                          </div>

                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button name="update" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                  </div>

                  </form>
                  </div>

              </div>
              </div>
          
            
        </td>';    

    

       
        
        
        echo '<td > 
        <div class="addbatch-button">
         
          <a type="button" class="btn btn-primary" href= "view-farmx.php?baranggayID='.$row['baranggayID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 20 20">
          <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
          <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
        </svg>View Farm</a>
        </div>
         </td>';
            
			

            }
            "</table>";


?>

    <style>
    .wrapper-list {

        margin: 10px;
    }

    .wrapper-add { 
        border-bottom:1px solid grey;  
        margin-top: 30px;
        padding-top: 20px;
        padding-bottom: 20px;
        margin-bottom: 50px;
    }

    .add-brgy-button {
        margin-top: 20px;
        align-items: center;
        display: grid;
        justify-content: center;
    }

    #brgy-btn {
        margin-right: 100px;
        margin-left: 100px;
        margin-top: 40px;
        border: none;
        background-color: darkblue;
    }

    #brgy-btn:hover {
        border: none;
        background-color: blue;
    }

    .text {
        display: flex;
        justify-content: center;
    }

    .text h2 {
        font-weight: bold;
    }

    #brgy-list {
        display: flex;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        align-content: center;
    }

    #tbl-list {
        width: 100%;
        max-width: 500px;
    }

    #edit-list {
        color: white !important;
    }

    </style>