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


<?php include ("header.php");  ?>


<!--body-->
<main>
  <Section class="wrapper">

    <div class="container text-center">

      <section class="user-info">
        <div class="row">
            <div class="col">
              <img src="../../image/user2.png" class="img-fluid" alt="logo" width="60px">
            </div>
            <div class="col">
             <h2 id="user-info">user1</h2>
             <p id="p"><i>Welcome!</i></p>
            </div>


            <div class="col">
              <div class="logout-icon">
              <a id="a" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button" ><svg xmlns="http://www.w3.org/2000/svg" width="30" height="40" fill="white" class="bi bi-box-arrow-right" viewBox="0 3 16 6">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
              </svg></a>
            </div>
             </div>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm!</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                               <h2>Are you sure to log out?</h2>
                              </div>
                              <div class="modal-footer">
                                <a type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</a>
                                <a id="yes" href="../logout.php" type="button" class="btn btn-primary">Yes</a>
                              </div>
                            </div>
                          </div>
                        </div>
        </div>
      </section>

      <section class="body" id="main1">
        <!--
        <div class="row">
          <div  class="col">
           <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                 <a href="record.php"> <img src="../../image/edit-data2.png" class="img-fluid" alt="logo" width="100px"></a>
                  <a href="record.php" class="btn btn-primary">Record</a>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                  <a id="name" href="farm-map.php"><img src="../../image/mortality-rate2.png" class="img-fluid" alt="logo" width="100px"></a>
                  <a href="farm-map.php" class="btn btn-primary">Farm Map</a>
                </div>
              </div>
            </div> 
          </div>
          </div>
      </div>

      <section class="body" id="main2">
        <div class="row">
          <div class="col">
           <div class="row">
            <div class="col">
              <div class="card">
                <div class="card-body">
                <div class="dropdown-center">
                 <a type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false"> <img src="../../image/batches.png" class="img-fluid" alt="logo" width="100px"></a>
                  <a type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">Batches</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Add</a></li>
                    <li><a class="dropdown-item" href="#">View</a></li>
                  </ul>
                </div>
              </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body">
                <div class="dropdown-center">
                  <a type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false"><img src="../../image/generate-report3.png" class="img-fluid" alt="logo"  width="100px"></a>
                  <a type="button" class="btn btn-primary" data-bs-toggle="dropdown" aria-expanded="false">View Reports</a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Layer</a></li>
                    <li><a class="dropdown-item" href="#">Broiler</a></li>
                  </ul>
                </div>
              </div>
              </div>
            </div> 
          </div>
          </div>
      </div>
    </div>
  </section>  


  </div>
-->
  </section>  


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

  </Section>
</main>

<!--style-->
<style type="text/css">

  .wrapper{
    display:flex;
    justify-content:space-evenly;
    }

.user-info{
    padding: 5px;
    margin-top: 30px;
    background-color: #0e2a83;
    box-shadow: 2px 2px 7px 5px skyblue;
    border-radius: 10px;

  }
  #user-info{
    padding-bottom: 5px;
    margin-bottom: -3px;
    color: white;
  }

   #p{
    font-size: 10px !important;
    color: white;
    margin-bottom: -5px;
  }

  #a{
    font-size: 15px;
    display: flex !important;
    justify-content: flex-end !important;
    align-items: center;
    text-decoration: none;
    color: white;
    margin-bottom: -5px;
    padding-right: 20px;
  }

  .user-info img{
    display: flex !important;
    justify-content: flex-start !important;
    align-items: center !important;
    padding-right: 0;
    margin-right: -20px;
  }
  .logout-icon{
    padding-top: 5px;
  }

  .footer {
    position: absolute;
    left:0;
    right: 0;
    bottom: 0;
    border-top: 1px solid grey; 
    overflow: hidden;
    
  }

  .footer a{
    font-size: 15px;
    border: 1px solid black;
    font-weight: bold;
    background-color: transparent;
    border-radius: 50px;
    color: black;
    padding: 15px 0 15px 0;

  }
  .home a{
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 0;
    margin-right: 0;
    border: none;
  }

  .home a:hover{
    background-color: transparent;
    color: blue;
  }
  
  .body{
    display:flex;
    justify-content:space-evenly;
    flex-grow: 1;
    padding: 20px;

  }
  .body a{
    border: none;
    background-color: transparent;
    color: darkblue;
    font-weight: bold;
 
  }

  .card{
    margin-top: 10px;
    background-color: transparent !important;
    border: none;
  }

  .modal-header{
   
  }

  .modal-content{
    border:none;
    border-radius:30px;
    padding-bottom:0;
  }
  .modal-content a{
    color:darkblue;

    margin:0;
  }


  .modal-footer{
    border:none;
    display:flex;
    justify-content:center;
    padding-top:0;
    margin-bottom:10px;
    gap:25px;
  }

  .modal-footer a{
    color:white;
    padding-right:30px;
    padding-left:30px;
  }

  #yes{
    border:none;
    background-color:darkblue;
  }
  #yes:hover{
    background-color:blue;
  }
/**/

  .card-body{
    display:grid;
    padding:0;
  }

  .card-body a:hover{
    background-color:white;
    color:black;
  }

  .card-body a{
    padding:0;
  }

  .body{
    padding:20px 0 0 0;
  }

  .dropdown-center{
    display:grid;
  }

  .dropdown-menu li{
    padding:10px;
  }

  .dropdown-menu li:hover{
    background-color:grey;
  }

  .dropdown-menu a:hover{
    background-color:grey;
  }

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


</body>
</html>