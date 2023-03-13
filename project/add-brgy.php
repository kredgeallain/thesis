<?php

include 'connect.php';



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

<?php include ("header.php");  ?>

<div class="wrapper-add">
    <div class="text">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor"
                class="bi bi-plus-square-fill" viewBox="0 2 20 16">
                <path
                    d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z" />
            </svg>Add Barangay</h2>
    </div>
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
        <div class="add-brgy-button">
            <div class="input-group flex-nowrap">
                <span class="input-group-text" id="addon-wrapping">Barangay</span>
                <input type="text" class="form-control" placeholder="Name" name="brgy" required="true"
                    aria-describedby="addon-wrapping">
            </div>
            <button type="submit" class="btn btn-primary" id="brgy-btn" name="submit">Add</button>
        </div>
</div>

</form>
<div class="wrapper-list" id='brgy-list'>
    <h4>List of Barangay</h4>


    <?php
    
    @include 'connect.php';
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

        while ($row = $result->fetch_assoc()) {


	
   
        	echo"<tr>";
            	echo "<td hidden >" .$row['baranggayID']. "</td>";
            	echo "<td id='name'>" .$row['baranggay']. "</td>";
                echo '<td> 

                   <a type="button" class="btn btn-primary" href= "update-barangay.php?baranggayID='.$row['baranggayID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 20">
                   <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                   <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                 </svg> Edit </a>
               
          
                
        </td>';      
        echo '<td > 
        <div class="addbatch-button">

          <a type="button" class="btn btn-info" href= "view-farmx.php?baranggayID='.$row['baranggayID'].'"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 20 20">
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

    input {
        width: 300px !important;
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