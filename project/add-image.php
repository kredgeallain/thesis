
<?php

error_reporting(0);
 
$msg = "";
 
// If upload button is clicked ...
if (isset($_POST['upload'])) {
 
    $image_name = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "/project/image/" . $image_name;
 
    $db = mysqli_connect("localhost", "root", "", "test");
 
    // Get all the submitted data from the form
    $sql = "INSERT INTO image (image_name) VALUES ('$image_name')";
 
    // Execute query
    mysqli_query($db, $sql);
 
    // Now let's move the uploaded image into the folder: image
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add User</title>
	<link rel="stylesheet" type="text/css" href="">
	<link rel="icon" href="../image/logo.png" type="image/icon type">
    

</head>
<body>
		<section class="header">
		<div class="logo">
			<img src="../image/logo.png" alt="Department of Agriculture Logo" width="80px", height="80px">
			<p>Republic of the Philippines</p>
			<h1>DEPARTMENT OF AGRICULTURE</h1>
		</div>

		<div class="text">
			<p>San Lorenzo, Guimaras</p>

		</div>

					<section class="nav">
				<a href="adminpage.php">HOME</a>
				<a href="">EDIT DATA</a>
				<a href="">VIEW DATA</a>
				<div class="user">
					<a href=""><img src="../image/user2.png" alt="User" width="70px", height="70px"></a>
				</div>
			</section>
	</section>

	<div id="content">
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input class="form-control" type="file" name="uploadfile" value="" />
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" name="upload">UPLOAD</button>
            </div>
        </form>
    </div>


    <div id="display-image">
    <?php
        $query = " select * from image ";
        $result = mysqli_query($db, $query);
 
        while ($data = mysqli_fetch_assoc($result)) {
    ?>
        <img src="./image/<?php echo $data['filename']; ?>">
 
    <?php
        }
    ?>

    
    </div>
</body>
	<! style >
    <style type="text/css">

body{
	font-family: tahoma;
	padding: 0px;
	margin: 0px;

}

.header{
	background-color: #0e2a83;
	padding: 15px;
}

.logo {
	margin-left: -10px;
	margin-top: -10px;
	display: flex;
	padding-bottom: 10px;
}

.logo p{
color: white;
padding-left: 20px;
}

.logo img{
	padding-top: 5px;
}

.logo h1{
	color: white;
	text-decoration: overline;
	font-size: 25px;
	padding-left: 15px;
	padding-right: 10px;
	padding-top: 15px;
	padding-bottom: 10px;
	margin-left: -200px;


}

.text p{
	color: white;
	margin-top: -50px;
	padding-top: 5px;
	padding-left: 90px;
	margin-bottom: 5px;
}



.title{
	font-size: 20px;
	display:flex;
	justify-content: center;
	padding-bottom: 10px;
}

.nav{
	display: flex;
	margin-top: -25px;
	padding-bottom: 5px;
	margin-bottom: -15px;
	position: absolute;
	right: 0;
}
.nav a{
	text-decoration: none;
	color: white;
	text-shadow: 1px 1px #9a9b9e;
	padding-right: 40px;
	padding-left: 40px;
}

.user{
	margin-top: -45px;
}

.nav a:hover{
	background-color: blue;
	border-radius: 20px;
}

.log-in{
	box-shadow: 2px 2px 2px 2px grey;
	border-radius: 30px;
	font-family: tahoma;
	background-color: #f9faff;
	padding: 15px;
	margin-top: 30px;
	margin-right: 300px;
	margin-left: 300px;
	margin-bottom: 5px;
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
	margin-left: 10px;
	display: flex;
	justify-content: center;
}
.input p{
	margin-top: 35px;
}
.inputUser{
	margin-left: -20px;
	display: flex;
	justify-content: center;
}
.inputUser p{
	margin-top: 35px;
}
.input2{
	margin-right: 47px;
	display: flex;
	justify-content: center;
}
.input2 p{
	margin-top: 35px;
}

.input3{
	margin-right: 15px;
	display: flex;
	justify-content: center;
}
.input3 p{
	margin-top: 35px;
}

.input4{
	margin-right: 20px;
	display: flex;
	justify-content: center;
}
.input4 p{
	margin-top: 35px;
}

.submit{
	text-align: center;
	margin: auto;
	padding: 3%;
	display: flex;
	display: grid;
	width: 110px;
	height: 50px;
	

}
.btn{
	height: 80%;
	width: 100%;
	background-color: #0e2a83;
	color: white;
	font-size: 16px;
	margin: auto;
	border-radius: 20px;
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
	border-radius: 20px;
	padding: 10px;
	margin: 30px;
	margin-left: 10px;
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

summary {
	cursor: pointer;
	list-style: none;
}

.drop-menu a{
	text-decoration: none;
	color: white;
}

ul {
	border-radius: 15px;
	box-shadow: 2px, 2px, 2px,2px black;
	background-color: grey;
	padding-bottom: 10px;
	margin-top: -3px;
	margin-left: -210px;
	margin-right: 50px;
	margin-bottom: -203px;

}

li {
	padding-bottom: 10px;
	padding-top: 20px;
	padding-left:10px;
	padding-right:20px;
	list-style: none;
}
.side-menu {
	padding-right: 30px;
 	display: flex;
 	justify-content: flex-end;
 	margin-top: -90px;
 	margin-bottom: 20px;
 }

 .side-menu img{
 	margin-left: -165px;
 }


</style>
</body>
</html>