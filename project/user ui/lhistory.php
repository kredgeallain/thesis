<?php
 session_start();
include 'connect.php';


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

<?php include ("header.php");  ?>

<div class="wrapper">

    <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses"
                viewBox="0 2 20 16">
                <path
                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
            </svg>Production Details</h2>
    </section>

    <section class="view">




        <?php




$sql = "SELECT * from layer where userID=$userID order by date DESC";

if ($result = $conn->query($sql)){
    echo "<table class='table table-striped'>
    <thead class='thead-dark'>	  
    <tr>
        
        <th scope='col' hidden  id='count'>Layer ID</th>
        <th scope='col' hidden id='count'>Batch ID</th>
        <th scope='col' id='name'>No. of Eggs</th>
        <th scope='col' id='name'>No. of Rejected Eggs</th>
        <th scope='col' id='name'>Current number per Heads</th>
        <th scope='col' id='name'>Mortality</th>
        <th scope='col' id='name'>Date Recorded</th>
        <th scope='col' id='name'>Recorded by</th>
    </tr>	  
    </thead>";
        }

        while ($row = $result->fetch_assoc()) { 
           
            echo"<tr>";
            echo "<td id='name' hidden >" .$row['layerID']. " </td>";
            echo "<td id='name' hidden >" .$row['batchID']. "</td>";
            echo "<td id='name' >" .$row['no_eggs']. "</td>";
            echo "<td id='name'>" .$row['reject_eggs']. "</td>";
            echo "<td id='name'>" .$row['Lcurrent']. "</td>";
            echo "<td id='name'>" .$row['mortality']. "</td>";
            echo "<td id='name'>" .$row['date']. "</td>";

            
            echo '<td > 


            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editfarm'.$row['layerID'].'">
            Edit
        </button>

        <div class="modal fade" id="editfarm'.$row['layerID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <form action="updateqry.php" method="POST">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Production</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="form-floating mb-3">
            <input type="text" class="form-control" id="floatingInput" readonly hidden value=  "'.$row['layerID']. '" placeholder="name" name="layerID" required="true">
            <label for="floatingInput" hidden>User ID</label>
        </div>
             <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" readonly  hidden value= "'.$row['batchID']. '" 
                            placeholder="name" name="batchID" required="true">
                            <label for="floatingInput" hidden>User ID</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value= "'.$row['no_eggs']. '" placeholder="name" name="no_eggs" required="true">
                            <label for="floatingInput">No. of Eggs</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value= "'.$row['reject_eggs']. '"placeholder="name" name="reject_eggs" required="true">
                            <label for="floatingInput">No. of Rejected Eggs</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="floatingInput" value="'.$row['Lcurrent']. '" placeholder="name" name="Lcurrent" required="true">
                            <label for="floatingInput">Currenct No. of Chickens </label>
                        </div>
                        <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" value="'.$row['mortality']. '" placeholder="name" name="mortality" required="true">
                        <label for="floatingInput"> Mortality </label>
                    </div>
                
               

                    

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button name="edit-layer" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
            </div>
         
            </div>
            </form>
        </div>
        </div>

            
    </td>';  

     
              
        }
    "</table>";


    
    
?>


<!--style-->

<style type="text/css">
.wrapper {
    margin-top: 10px;
}

.view {
    padding: 10px;
    margin: 10px;
}


.view-user {
    display: flex;
    margin-top: 10px;
    justify-content: center;
}

.view-user h2 {
    font-size: 30px;
    font-weight: bold;
}

.add {

    display: flex;
    justify-content: flex-end;
}

.add-user-page {
    background-color: darkblue;
    padding: 10px 25px 10px 25px;
    margin-bottom: 30px;
    margin-right: 80px;
    border-radius: 5px;
}

.add-user-page a {
    text-decoration: none;
    color: white;
}

.add-user-page:hover {
    margin-right: 80px;
    background-color: blue;
    color: white;
}

.add-user-page a:hover {
    color: white;
}

tr td button a {
    text-decoration: none;
    color: white;
}

a:hover {
    color: white;

}

tr:hover {
    background-color: #b0b4b2;
}

.delete-button button {
    border: none;
    background-color: red;
}

.delete-button button:hover {
    border: none;
    background-color: darkred;
    color: white;
}

.addbatch-button button {
    border: none;
    background-color: darkgreen;

}

.addbatch-button button:hover {
    border: none;
    background-color: green;
    color: white;
}

#delete-yes {
    padding-left: 20px;
    padding-right: 20px;
    text-decoration: none;
}

#delete-btn {
    padding-left: 0;
    padding-right: 0;
}

.viewbatch-button button {
    background-color: limegreen;
    border: none;
}

.viewbatch-button button:hover {
    background-color: yellowgreen;
    border: none;
}

a {
    text-decoration: none !important;
}
</style>
</body>

</html>