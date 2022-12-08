<?php
  include("header2.php");
?>



<section class="view-user">
	<h2>Users</h2>
</section>

<section class="view">
	<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col" id="count"></th>
      <th scope="col" id="f-name">First Name</th>
      <th scope="col" id="l-name">Last Name</th>
      <th scope="col" id="brgy">Barangay</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th scope="row">1</th>
      <td id="f-name">Mark</td>
      <td id="l-name">Tahimik</td>
      <td id="brgy">Aguilar</td>
      <td>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
		<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
	  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="ModalLabel">Confirm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>

<td><!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="1 1 16 16">
			<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
			<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
		  </svg>
	</button>
	
	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
		  <div class="modal-header">
			<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
<!--modal content-->
<div class="form-floating mb-3">
<input type="name" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">Full Name</label>
</div>



<div class="form-floating mb-3">
<input type="username" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">Username</label>
</div>



<div class="form-floating mb-3">
<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
<label for="floatingPassword">Password</label>
</div>



<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">number No.</label>
</div>

<select class="form-select" aria-label="Default select example">
<option selected>Position</option>
<option value="1">Agent</option>
<option value="2">Administrator</option>
</select>

<select class="form-select" aria-label="Default select example">
<option selected>Barangay</option>
<option value="1">Aguinaldo</option>
<option value="2"></option>
</select>

</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save Changes</button>
		  </div>
		</div>
	  </div>
	</div>
</td>
</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td id="f-name">Jacob</td>
      <td id="l-name">bob</td>
      <td id="brgy">Cabungahan</td>
      <td>
      	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
				<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
			  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
      </td>

      <td><!-- Button trigger modal -->
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
			<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="1 1 16 16">
				<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
				<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
			  </svg>
		</button>
		
		<!-- Modal -->
		<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
			  <div class="modal-header">
				<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <div class="modal-body">
<!--modal content-->
<div class="form-floating mb-3">
	<input type="name" class="form-control" id="floatingInput" placeholder="name">
	<label for="floatingInput">Full Name</label>
  </div>



<div class="form-floating mb-3">
	<input type="username" class="form-control" id="floatingInput" placeholder="name">
	<label for="floatingInput">Username</label>
  </div>



<div class="form-floating mb-3">
	<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
	<label for="floatingPassword">Password</label>
  </div>



<div class="form-floating mb-3">
	<input type="number" class="form-control" id="floatingInput" placeholder="name">
	<label for="floatingInput">Contact No.</label>
  </div>

  <select class="form-select" aria-label="Default select example">
	<option selected>Position</option>
	<option value="1">Agent</option>
	<option value="2">Administrator</option>
  </select>

  <select class="form-select" aria-label="Default select example">
	<option selected>Barangay</option>
	<option value="1">Aguinaldo</option>
	<option value="2"></option>
  </select>

</div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save Changes</button>
			  </div>
			</div>
		  </div>
		</div>
	</td>

    </tr>


    <tr>
      <th scope="row">3</th>
      <td id="f-name">Larry </td>
      <td id="l-name">Bird</td>
      <td id="brgy">Tamborong</td>
      <td>
      	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
			<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
				<path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
			  </svg>
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary">Yes</button>
      </div>
    </div>
  </div>
</div>
</td>
<td><!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="1 1 16 16">
			<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
			<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
		  </svg>
	</button>
	
	<!-- Modal -->
	<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
		<div class="modal-content">
		  <div class="modal-header">
			<h1 class="modal-title fs-5" id="staticBackdropLabel">Edit User</h1>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		  </div>
		  <div class="modal-body">
<!--modal content-->
<div class="form-floating mb-3">
<input type="email" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">Full Name</label>
</div>



<div class="form-floating mb-3">
<input type="username" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">Username</label>
</div>



<div class="form-floating mb-3">
<input type="password" class="form-control" id="floatingPassword" placeholder="Password">
<label for="floatingPassword">Password</label>
</div>



<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingInput" placeholder="name">
<label for="floatingInput">number No.</label>
</div>

<select class="form-select" aria-label="Default select example">
<option selected>Position</option>
<option value="1">Agent</option>
<option value="2">Administrator</option>
</select>

<select class="form-select" aria-label="Default select example">
<option selected>Barangay</option>
<option value="1">Aguinaldo</option>
<option value="2"></option>
</select>

</div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="button" class="btn btn-primary">Save Changes</button>
		  </div>
		</div>
	  </div>
	</div>
</td>
    </tr>
  </tbody>
</table>

</section>


<div class="add">
	<div class="add-user-page">
		<a href="add-user.html">Add User</a>
	</div>
</div>


        </div>
        <style type="text/css">
      
      .view{
	padding: 10px;
	border: 1px solid #0e2a83;
	margin: 20px;
}

.view-user{
	display: flex;
	margin:20px 10px 5px 20px;
	justify-content: center;
}

.view-user h2{
	font-size: 40px;
	font-weight: bold;
}

.add{

	display: flex;
	justify-content: flex-end;
}
.add-user-page{
	background-color: #0d6efd;
	padding: 10px 40px 10px 40px;
	margin-top: 30px;
	margin-right: 100px;
	border-radius:5px;
}

.add-user-page a{
	text-decoration: none;
	color: white;
}
select{
	margin-bottom: 15px !important;
}
        
        </style>
        </body>
        </html>
        