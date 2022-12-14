
<?php

@include 'connect.php';

if(isset($_POST['submit'])){

   $batch_name = $_POST['batch_name'];
   $batch_product = $_POST['owner'];
   $date = $_POST['address'];
   $initial_no = $_POST['contact_no'];
   

   $sql="select * from batch where batch_name='".$batch_name."' AND date='".$date."' ";

   $result = mysqli_query($data, $sql);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'batch already exist!';

   }else{

         $insert = "INSERT INTO batch(batch_name, batch_product, date, initial_no) VALUES ('$batch_name','$batch_product','$date','$initial_no')";
         mysqli_query($data, $insert);
         header('location:login.php');
   }

};


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
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
				<div class="home">
					<a href="adminpage.php">Home</a>
				</div>
				<div class ="dropdown1">
					<button class="dropbtn1"> Production </button>
					<div class="dropdown-content1">
						<a href=""> View Record</a>
						<a href="record.html"> Record Production</a>
						<a href="#"> Generate Report</a>
						<a href="#"> Find Records </a>
					</div>
				</div>	

				<div class="dropdown2">
					<button class="dropbtn2"> Farm </button>
					<div class="dropdown-content2">
						<a href="farm-detail.html"> View Farm</a>
						<a href="add-farm.html">Add Farm</a>
						<a href="map.html"> View farm Map</a>
					</div>
				</div>

				<div class="dropdown3">
					<button class="dropbtn3"> User </button>
					<div class="dropdown-content3">
						<a href="add-user.html"> Add User</a>
						<a href="#"> View Users </a>
					</div>
				</div>


				<div class="user">

					<details>
					<summary class="summ"><img src="../image/user2.png" alt="User" width="70px", height="70px"></summary>
					<div class="drop-menu">
						<ul>
							<li><a href="">Contact Us</a></li>
							<li><a href="">Help</a></li>
							<li><a href="">Log out</a></li>
						</ul>
					</div>
					</details>
				</div>
			</section>
	</section>


	</section>
	<section class = "form">
		<div class = "sec1">
			<div class="btn1">
				<button> Add Farm </button> 
				<button> Delete Farm </button>
				<button> Update Farm </button>	
			</div>
			
			
					
			
		</div>
		<div class = "sec2">
			<div class="form-title">
				<h4>Add Batch</h4>
			</div>

			<div class="Farm-NU-section">

		<div class="date">
				<span>
					<label for="day">Day</label>
					<select id="day" name="day">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
						<option>6</option>
						<option>7</option>
						<option>8</option>
						<option>9</option>
						<option>10</option>
						<option>11</option>
						<option>12</option>
						<option>13</option>
						<option>14</option>
						<option>15</option>
						<option selected>16</option>
						<option>17</option>
						<option>18</option>
						<option>19</option>
						<option>20</option>
						<option>21</option>
						<option>22</option>
						<option>23</option>
						<option>24</option>
						<option>25</option>
						<option>26</option>
						<option>27</option>
						<option>28</option>
						<option>29</option>
						<option>30</option>
						<option>31</option>
					</select>
				</span>

	    		<span>
	      			<label for="month">Month:</label>
				      <select id="month" name="month">
				        <option>January</option>
				        <option>February</option>
				        <option>March</option>
				        <option>April</option>
				        <option>May</option>
				        <option>June</option>
				        <option>July</option>
				        <option>August</option>
				        <option selected>September</option>
				        <option>October</option>
				        <option>November</option>
				        <option>December</option>
				      </select>
				    </span>

				    <span>
				      <label for="year">Year:</label>
				      <select id="year" name="year">
				      	<option>2020</option>
				      	<option>2021</option>
				      	<option selected>2022</option>
				      	<option>2023</option>
				      	<option>2024</option>
				      	<option>2025</option>
				      	<option>2026</option>
				      	<option>2027</option>
				      </select>
				    </span>
		</div>


				<div class="batch-name">
					<label class="batch-name-label">Batch Name</label>
					<input class="batch-name-input" type="text">
				</div>
				<div class="farm-owner">
					<label class="batch-name-label">Farm Unit</label>
					<select class="batch-name-input" type="text" >
						<option></option>
						<option>Layer</option>
						<option>Broiler</option>
					</select> 
				</div>
				<div class="Address">
					<label class="batch-name-label">Initial No.</label>
					<input class="batch-name-input" type="number" >
				</div>
			</div>

			<div class="register">
				<center> <button> Register </button> </center>
			</div>
			

			
			
				
		</div>
		
		 
	</section>


	
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
	background-color: #163289;
	display: flex;
	margin-top: -55px;
	margin-bottom: -15px;
	padding-top: 25px;
	position: absolute;
	border: 1px solid #0e2a83;
	right: 0;
}


.user{
	margin-top: -45px;
	margin-right: 30px;
}

.home{
	margin-top: 5px;
}
.home a{
	font-size: 16px;
	text-decoration: none;
	color: white;
	padding: 16px;
	margin-right: 10px;
	text-shadow: 1px 1px #9a9b9e;
}


.home a:hover{
	padding: 16px;
	background-color: blue;
}

.user a{
	margin-right: 1px;
}

ul {
	padding-top: 10px;
	border-radius: 15px;
	box-shadow: 2px, 2px, 2px,2px black;
	background-color: grey;
	padding-bottom: 10px;
	margin-top: -3px;
	margin-left: -210px;
	margin-bottom: -203px;

}

li:hover{
	padding: 18px;
	background-color: #ddd;
}

li {
	border-radius: 15px;
	padding-bottom: 10px;
	padding-top: 20px;
	padding-left:10px;
	padding-right:20px;
	list-style: none;
}
.side-menu {

 	display: flex;
 	justify-content: flex-end;
 	margin-top: px;
 	margin-bottom: 20px;
 }

.user img{
	margin-top: 14px;
}

.summ {
 	margin-left: 25px;
	cursor: pointer;
	list-style: none;
}

.drop-menu a{
	text-decoration: none;
	color: white;
}

/* dropdown button */
.dropbtn1{
	color: white;
	text-shadow: 1px 1px #9a9b9e;
	padding: 16px;
	padding-right: 10px;
	padding-left: 10px;
	font-size: 16px;
	border: none;
	justify-items: center;
	background-color: transparent;
}
.dropdown1{
	margin-top: -10px;
	display: inline-block;
}
.dropdown1 label{
	padding: 5px;
	color: black;
	margin-bottom: 100px;
}

.dropdown1 .dropbtn1{
	
	margin-left: 5px;
	cursor: pointer;
}
.dropdown-content1{
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 100px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	z-index: 1;
	margin-left: 5px;

}
.dropdown-content1 a{
	color: black;
	padding: 20px;
	text-decoration: none;
	display: block;
}
.dropdown-content1 a:hover {
	background-color: #ddd;
}
.dropdown1:hover .dropdown-content1{
	display: block;
} 
.dropdown1:hover .dropbtn1 {
	background-color: blue ;
}

/*dropdown2*/

.dropbtn2{
	color: white;
	text-shadow: 1px 1px #9a9b9e;
	padding-right: 10px;
	padding-left: 10px;
	padding: 16px;
	font-size: 16px;
	border: none;
	justify-items: center;
	background-color: transparent;
}
.dropdown2{
	margin-top: -10px;
	display: inline-block;
}
.dropdown2 label{
	padding: 5px;
	color: black;
	margin-bottom: 100px;
}

.dropdown2 .dropbtn2{
	
	margin-left: 5px;
	cursor: pointer;
}
.dropdown-content2{
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 100px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	z-index: 1;
	margin-left: 5px;

}
.dropdown-content2 a{
	color: black;
	padding: 20px;
	text-decoration: none;
	display: block;
}
.dropdown-content2 a:hover {
	background-color: #ddd;
}
.dropdown2:hover .dropdown-content2{
	display: block;
} 
.dropdown2:hover .dropbtn2 {
	background-color: blue ;
}

/*dropdown3*/

.dropbtn3{
	color: white;
	text-shadow: 1px 1px #9a9b9e;
	padding-right: 10px;
	padding-left: 10px;
	padding: 16px;
	font-size: 16px;
	border: none;
	justify-items: center;
	background-color: transparent;
}
.dropdown3{
	margin-top: -10px;
	display: inline-block;
}
.dropdown3 label{
	padding: 5px;
	color: black;
	margin-bottom: 100px;
}

.dropdown3 .dropbtn3{
	
	/* margin-top: 100px; */
	margin-left: 5px;
	cursor: pointer;
}
.dropdown-content3{
	display: none;
	position: absolute;
	background-color: #f1f1f1;
	min-width: 100px;
	box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
	z-index: 1;
	margin-left: 5px;

}
.dropdown-content3 a{
	color: black;
	padding: 20px;
	text-decoration: none;
	display: block;
}
.dropdown-content3 a:hover {
	background-color: #ddd;
}
.dropdown3:hover .dropdown-content3{
	display: block;
} 
.dropdown3:hover .dropbtn3 {
	background-color: blue ;
}


.form{
	margin-top: 2%;
	display: flex;
	justify-content: space-evenly;
}
.sec1{
	padding-top: 20px;
	height: 100%;
	width: 30%;
	background-color: #f9faff;
	box-shadow: 2px 2px 2px 2px grey;
}
.btn1 button{
	font-weight: bolder;
	margin-top: 30px;
	margin-left: 10%;
	margin-bottom: 40px;
	background-color: #04AA6D;
	border: 2px solid black;
	color: black;
	padding: 10px 24 px ;
	cursor: pointer;
	width: 80%;
	padding-top: 10px;
	padding-bottom: 10px;border-radius: 10px;
}

.sec2{
	padding-top: 20px;
	height:100%;
	width: 65%;
	background-color: #f9faff;
	box-shadow: 2px 2px 2px 2px grey;
	
}
.reg h2{
	border: solid black;
	width: 400px;


}
.Farm-NU-section{
	display: inline-block;
	width: 400px;
	height: 200px;
	margin-left: 100px;
	margin-top: 20px;
}


.batch-name{
	display: block;
}

.batch-name-input{
	display: block;
	padding: 5px;
	margin: 5px;
}
.batch-name-label{
	margin-top: 40px;
	color:  black;
	display: block;
}

.form-title{
	color: black;
	width: 100%;
}
.form-title h4{
	font-size: 20px;
	margin-left: auto;
	margin-right: auto;
	width: 400px;
	text-align: center;
}

.register{
	height: 120px;
	width: 100%;
}
.register button{
	margin-top:50px;
	margin-bottom: 50px;
	width: 150px;
	height: 30px;
	font-size: 15px;
	font-weight: bolder;
	background-color: #04AA6D;
	border-radius: 5px;
	cursor: pointer;

	}

.date{
	display: flex;
}
select {
	padding: 10px;
    outline: 0;
    background-image: none;
    border: 1px solid black;
    border-radius: 5px;
}
.date label{
	padding: 5px;
}


</style>

</body>
</html>