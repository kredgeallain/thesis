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


$sql = "SELECT * FROM farm";
$data = mysqli_query($data, $sql);




if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $searchTerm = htmlspecialchars($_POST['search']);
    

    $filteredData = array();
    foreach ($data as $item) {
        if (stripos($item['farmname'], $searchTerm) !== false) {
            $filteredData[] = $item;
        }
    }
} else {

    $filteredData = $data;
}

?>


        <form method="post">
            <div class="search-area">
            <label for="search"></label>
            <input class="" type="text" placeholder="search..." id="search" name="search" value="<?php echo $searchTerm ?? ''; ?>">
            <a><button type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button></a>
            </div>
        </form>


        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Farm Name</th>
                    <th>Farm Owner</th>
                    <th>Contact No.</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filteredData as $item): ?>
                <tr>
                    <td><p id="p"><?php echo $item['farmname']; ?></p></td>
                    <td><p id="p"><?php echo $item['farmowner']; ?></p></td>
                    <td><p id="p"><?php echo $item['contactno']; ?></p></td>
                    <td>
                        <div class="addbatch-button">

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                <a href="add-batch.php?farmID=<?php echo $item['farmID']; ?>"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                        class="bi bi-plus-square" viewBox="0 0 20 20">
                                        <path
                                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                        <path
                                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>Add Batch</a>
                            </button>
                        </div>
                    </td>


                    <td>
                        <div class="viewbatch-button">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editModal">
                                <a href="view-batchesx.php?farmID=<?php echo $item['farmID']; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" fill="currentColor" class="bi bi-eye" viewBox="0 0 20 20">
                                        <path
                                            d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                                        <path
                                            d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                                    </svg>View </a>
                            </button>
                        </div>
                    </td>

                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#editModal">
                            <a href="update-farm.php?farmID=<?php echo $item['farmID']; ?>"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="20" height="20" fill="currentColor" class="bi bi-pencil-square"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg> Edit </a>
                        </button>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>



    </section>


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

tr{
    padding:20px !important;
}
td{

    align-items:center;
    padding:0 !important;
    margin:0 !important;
}
.search-area{
    margin:20px;
}
#p{
    padding-top:20px;
    padding-left:20px;
}
.search-area button{
    margin-left:0;
    padding-top:7px;
    padding-left:10px;
    padding-bottom:7px;
    padding-right:15px;
    border-radius: 0 15px 15px 0;
    border:1px solid grey;
    background-color:transparent;
}

.search-area input{
    border-radius: 15px 0 0 15px;
    margin-right:0;
    padding-top:5px;
    padding-bottom:5px;
    padding-left:20px;
}
</style>
</body>

</html>