<?php include ("header.php");  ?>


<div class="wrapper-add">
    <div class="text">
    <h2>Add Barangay</h2>
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