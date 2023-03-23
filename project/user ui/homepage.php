<?php
session_start();
require_once '../connect.php';

$username = $_SESSION['username'];

if(!isset($_SESSION['username'])){
   header('location:../login-user.php');
}
else{
$sql="select * from user where username='".$username."' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['position'] !== 'agent') {
    header('Location:denied.php');
    exit();
}

}

$sql = "SELECT * FROM user where username='".$username."'";
$data = mysqli_query($data, $sql);
$row=mysqli_fetch_array($data);
$name = $row['name'];




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
              <img src="../../image/user.png" class="img-fluid" alt="logo" width="60px">
            </div>
            <div class="col">
            <h2 id="user-info"><?php echo $name; ?></h2>
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
<?php
include('../connect.php');

$sql1 = "SELECT COUNT(farmname) as totalfarm FROM farm";
$result1 = $conn->query($sql1);

$sql = "SELECT COUNT(baranggay) as totalbaranggay FROM baranggay";
$result = $conn->query($sql);

// Get the result as an array
$row1 = $result1->fetch_assoc();

$row = $result->fetch_assoc();
?>

        <section class="nav2">

        <section class="farm-brgy-summary">

        <section class="brgy-summary">
              <div class="brgy-number">
              <a href=""><h2> <?php echo "<p>".$row['totalbaranggay']."<p>" ?></h2></a>
              </div>
              <div class="rgtr">
                  <p>Number of Barangays</p>
              </div>
          </section>

          <section class="farm-summary">
              <div class="farm-number">
                  <a href=""><h2> <?php echo "<p>".$row1['totalfarm']."<p>" ?></h2></a>
              </div>
              <div class="rgtr">
                  <p>Registered Farms</p>
              </div>
          </section>
                </section>

            <section class="history">
                <details>
                  <summary>
                    <img src="../../image/history-36.png" alt="history logo" width="70px">
                  </summary>

                <section class="history-main">
                  <div class="history-head">
                      Record History
                  </div>
                  <div class="history-content">
                    <div class="history-broiler">
                      <a href="bhistory.php">Broiler</a>
                    </div>

                    <div class="history-layer">
                      <a href="lhistory.php">Layer</a>
                    </div>
                    
                  </div>
                </section>
                </details>
            </section>


            <section id="brgy-list" class="brgy-list">
              <div class="table">
                <div class="brgy-name">
                  <h4><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>View Poultry Batches</h4>
                </div>
                <div class="brgy-nxt">
                <a href="view-batches.php"><h9>〉</h9></a>
                </div>
              </div>
            </section>

            <section id="brgy-list" class="brgy-list">
              <div class="table">
                <div class="brgy-name">
                  <h4><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>Record Productions</h4>
                </div>
                <div class="brgy-nxt">
                <a href="record-home.php"><h9>〉</h9></a>
                </div>
              </div>
            </section>

            <section id="brgy-list" class="brgy-list">
              <div class="table">
                <div class="brgy-name">
                  <h4><svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
  <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
  <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
</svg>View Farm Map</h4>
                </div>
                <div class="brgy-nxt">
                <a href="farm-map.php"><h9>〉</h9></a>
                </div>
              </div>
            </section>

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
  </Section>
</main>

<script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover();   
});
</script>

<!--style-->
<style type="text/css">


  .wrapper{
    display:flex;
    justify-content:space-evenly;
    }

.user-info{
    padding: 5px;
    margin-top: 30px;
    background-color: #179f1b;
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
  
  .card{
    margin-top: 10px;
    background-color: transparent !important;
    border: none;
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

.brgy-list{
display: flex;
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

.farm-brgy-summary{
  

  padding:10px;
  display:flex;
  gap:50px;
  justify-content:center;
  align-items:center;
}

.farm-brgy-summary a{
  color:black;
text-decoration:none;

}
  
.farm-summary {
  padding:10px;
  border-radius:15px;
    margin:15px;
    display: grid;
    place-items:center;

}

.farm-summary h2 {
  font-size:50px;
}

.brgy-summary {
  padding:10px;
  border-radius:15px;
    margin:15px;
    display: grid;
    place-items:space-evenly;

}

.farm-summary a{
  color:black;
text-decoration:none;
}

.brgy-summary h2 {
  font-size:50px;
}


.table{
  background: rgb(138,237,69);
background: linear-gradient(270deg, rgba(138,237,69,0.4766281512605042) 29%, rgba(5,255,0,0.6026785714285714) 94%);
  display:flex;
  justify-content:space-around;
  align-items:center;
  gap:300px;
  padding:5px;
  border-radius:10px;
}
.brgy-text{
  color:grey;
  display:flex;
  justify-content:flex-start;
  margin:5px;
}

.brgy-text h4{
  font-size:15px;
}
.brgy-name{

  display:flex;
  justify-content:flex-start;
}

.brgy-name h4{
  margin:0 !important;
  font-size:18px;
  font-weight:bold;
  color:white;
}
.brgy-nxt{
  display:flex;
  justify-content:flex-end;
}
.brgy-nxt a{
  margin-left:0px;
  padding:20px;
  text-decoration:none;
  color:grey;
}
.brgy-nxt h9{
  font-weight:bold;
  color:grey;
}

.brgy-text{
  margin-top:30px;
  margin-bottom:10px;
}

@media screen and (max-width: 800px){
  .table{
  align-items:center;
  gap:60px;
}
.brgy-summary{
  padding:0 5px 0 5px;
}

.farm-summary{
  padding:0 5px 0 5px;
}

.rgtr{
  font-size:13px;
}

.history-main{
  position:absolute !important;
  right:27% !important;
  bottom:43% !important;
}
  }

  h9{
    font-weight:bold;
    font-size:20px;
  }

.pop-over{
  margin:20px;
  display:flex;
  justify-content:flex-end;
}

.history{
  display:flex;
  justify-content:flex-end;
  margin-right:20px;
}

.history-main{
  border-radius:20px;
  padding:10px 20px 10px 20px;
  border:1px solid grey;
  background-color:white;
  position:absolute !important;
  right:30%;
  bottom:43%;
}

.history-broiler{
  padding:10px;
}

.history-layer{
  padding:10px;
}

.history-main{
  border-radius:20px;
  padding:10px 20px 10px 20px;
  border:1px solid grey;
  background-color:white;
  position:absolute !important;
  right:15%;
  bottom:35%;
}

.history-content a{
  text-decoration:none;
  color:black;
}

.history-head{
  color:grey;
}

summary{
  list-style: none;

}
</style>
</body>
</html>