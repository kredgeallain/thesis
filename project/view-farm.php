<?php include ("header.php");  ?>


<div class="wrapper">

    <section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses"
                viewBox="0 2 20 16">
                <path
                    d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
            </svg>Farm Details</h2>
    </section>

    <section class="view">


        <?php


include 'connect.php';




if(isset($_POST['search'])) {
   
    $search = mysqli_real_escape_string($conn, $_POST['search']);
 
    $sql = "SELECT baranggay.baranggay, farm.farmname, farm.farmowner, farm.farm_size,
    farm.contactno, farm.farmID, baranggay.baranggayID
    FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID where farm.farmname LIKE '%$search%' order by baranggay.baranggay ASC";;
} else {
   
    $sql = "SELECT baranggay.baranggay, farm.farmname, farm.farmowner, farm.farm_size,
    farm.contactno, farm.farmID, baranggay.baranggayID
    FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID order by baranggay.baranggay ASC";;
}

$result = mysqli_query($conn, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<table class='table table-striped'>
        <thead>	  
        <tr>
            
            <th scope='col' hidden id='count'>Farm ID</th>
            
            <th scope='col' id='farm-name'>Barangay</th>
            <th scope='col' id='farm-name'>Farm Name</th>
            <th scope='col' id='farm-name'>Farm Area</th>
            <th scope='col' id='owner'>Farm Owner</th>
            <th scope='col' id='cntct'>Contact No.</th>
            
        </tr>	  
        </thead>";
    }

    while ($row = $result->fetch_assoc()) {
 


        echo"<tr>";
            echo "<td hidden id=' farmid' >" .$row['farmID']. "</td>";
            echo "<td id=' farmname '>" .$row['baranggay']. "</td>";
            echo "<td id=' farmname '>" .$row['farmname']. "</td>";
            echo "<td id=' farmname '>" .$row['farm_size']." Sq. meter </td>";
            echo "<td id=' owner '>" .$row['farmowner']. "</td>";
            echo "<td id=' cntct '>" .$row['contactno']. "</td>";
                echo'<td>
                <div class="viewbatch-button">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" >
                <a href="view-batchesx.php?farmID='.$row['farmID'].'"> <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 20 20">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
            </svg>View Batch </a>
            </button>
            </div>
                </td>';


                echo '<td > 


                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editfarm'.$row['farmID'].'">
                Edit
            </button>


            <div class="modal fade" id="editfarm'.$row['farmID'].'" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <form action="updateqry.php" method="POST">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" readonly hidden value=  "'.$row['baranggayID']. '" placeholder="name" name="farmID" required="true">
                <label for="floatingInput" hidden>User ID</label>
            </div>
                <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" readonly hidden value= "'.$row['farmID']. '" placeholder="name" name="farmID" required="true">
                                <label for="floatingInput" hidden>User ID</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value= "'.$row['farmname']. '" placeholder="name" name="farmname" pattern="[a-zA-Z\s]+" required="true">
                                <label for="floatingInput">Farm Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value= "'.$row['farmowner']. '"placeholder="name" name="farmowner" pattern="[a-zA-Z0-9\s.]+" required="true">
                                <label for="floatingInput">Farm Owner</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" value="'.$row['contactno']. '" placeholder="name" name="contactno"  pattern="[0-9\s+]+" required="true">
                                <label for="floatingInput">Contact No.</label>
                            </div>

                        

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button name="edit-farm" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                </div>
             
                </div>
                </form>
            </div>
            </div>

                
        </td>';  
        echo"</tr>";
          
    }
"</table>";



?>

</section>

<form action="" method="post">
    <input id="search" type="text" name="search" placeholder="Search...">
    <input id="search" type="submit" value="Search">
</form>


<div class="add">
    <div class="add-user-page">
        <a href="add-farm.php"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                class="bi bi-plus-circle" viewBox="0 0 20 20">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>Add Farm</a>
    </div>
</div>
</div>



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

tr {
    padding: 20px !important;
}

td {

    align-items: center;
    padding: 0 !important;
    margin: 0 !important;
}

.search-area {
    margin: 20px;
}

#p {
    padding-top: 20px;
    padding-left: 20px;
}

.search-area button {
    margin-left: 0;
    padding-top: 7px;
    padding-left: 10px;
    padding-bottom: 7px;
    padding-right: 15px;
    border-radius: 0 15px 15px 0;
    border: 1px solid grey;
    background-color: transparent;
}

.search-area input {
    border-radius: 15px 0 0 15px;
    margin-right: 0;
    padding-top: 5px;
    padding-bottom: 5px;
    padding-left: 20px;
}

#select-unit {
    margin-bottom: 18px;
}

input:invalid {
        animation: shake 0.5s;
        border: 1px solid red !important;
      }

input:valid{
        border:1px solid green !important;
      }
      
      @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-10px); }
        50% { transform: translateX(10px); }
        75% { transform: translateX(-10px); }
        100% { transform: translateX(0); }
      }

    #search{
        border:1px solid grey !important;
    }
</style>
</body>

</html>