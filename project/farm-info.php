<?php
include("header.php");
?>

<body>
<div class="title">
<h1>Farm Details</h1>
</div>
    <section id="wrapper">

        <div class="owner-info">
            <!--
            <div class="farm-owner-img">
                <img id="picture" src="../image/user.png" alt="owner picture">
            </div>
            -->

            <div class="owner-personal-info">
                <h2>Kenn</h2>
                <p>Address:</p>
                <p>Date of Birth</p>
                <p>Contact Number:</p>
            </div>
        </div>

        <div class="farm-info">
            <div class="">
                <h2>Farm Juan</h2>
                <p>Barangay:</p>
                <p>Farm Area:</p>
                <p>No of Farmers manning the farm:</p>
            </div>
        </div>

        
        <div class="farm-nav">
            <div class="navigations">
                <a class="btn btn-success" type="button" href="map.php">View Map</a>
                <a class="btn btn-primary" type="button" href="#">View Batches</a>
                <a class="btn btn-info" type="button" href="#">View Production</a>
            </div>
        </div>
    </section>
</body>

<style>
    #wrapper{
        width: 100%;
        height:100%;
        margin:10px;
        display:flex;
        justify-content: space-evenly;
        gap:20px;
    }
    #picture{
        width:100%;
        height:100%;
        max-width: 100px;

    }
    .owner-info{
        border-radius:10px;
        box-shadow:2px 1px 12px 2px grey;
        background-color:white;
        height:100%;
        width:100%;
        max-width:350px;
        padding:20px;

    }
    .farm-info{
        max-width:350px;
        border-radius:10px;
        box-shadow:2px 1px 12px 2px grey;
        background-color:white;
        padding:20px;
        width:100%;
        height:100%;
        border-radius:10px;
    }

    .farm-nav{
        max-width:350px;
        max-width:400px;
        border-radius:10px;
        max-width:300px;
        width:100%;
        height:100%;
        border-radius:10px;

    }
    .navigations{
        padding:20px 0 0 0;
        display:flex;
        flex-direction:column;
        justify-content:flex-start;
        gap:20px;
    }
    .title{
        margin-top:20px;
        margin-bottom:30px;
        display:flex;
        justify-content:center;
        align-items:center;
    }

</style>
</html>