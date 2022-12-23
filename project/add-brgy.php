<?php include ("header.php");  ?>


<div class="wrapper-add">
    <div class="text">
    <h2><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 2 20 16">
  <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
</svg>Add Barangay</h2>
    </div>
<div class="add-brgy-button">
<div class="input-group flex-nowrap">
  <span class="input-group-text" id="addon-wrapping">Barangay</span>
  <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="addon-wrapping">
</div>
<button type="button" class="btn btn-primary" id="brgy-btn">Add</button>
</div>
</div>
<div class="wrapper-list">
<h4>List of Barangay</h4>
</div>


<style>

    .wrapper-list{
        margin:10px;
    }

    .wrapper-add{
    border-radius:50px;
    margin-top:30px;
    margin-left:30px;
    margin-right:30px;
    border:1px solid grey;
    padding-bottom:30px;
    padding-top:20px;
    }

    .add-brgy-button{
    margin-top:20px;
    align-items:center;
    display:grid;
    justify-content:center;
}

#brgy-btn{
    margin-right:100px;
    margin-left:100px;
    margin-top:40px;
    border:none;
    background-color:darkblue;
}

#brgy-btn:hover{
    border:none;
    background-color:blue;
}
.text{
    display:flex;
    justify-content:center;
}
.text h2{
    font-weight:bold;
}

input{
    width: 300px !important;
}
</style>