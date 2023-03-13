

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
  </section>  




  </Section>
</main>
<!--footer-->
<footer>
  <section class="footer">
  <div class="container text-center">  
      <div class="col">
        <div class="home">
        <div class="d-grid gap-2">
          <a href="homepage.php" type="button" class="btn btn-primary" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="50" height="" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 20 16">
            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
          </svg></a>
        </div>
      </div>
      </div>


    </div>
  </div>
</section>
</footer>



<!--style-->
<style type="text/css">

  body{
    zoom:75%;
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



</style>


</body>
</html>