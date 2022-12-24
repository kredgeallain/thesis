

<?php include ("header.php");  ?>

<div class="wrapper">

<section class="view-user">
        <h2><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-houses" viewBox="0 2 20 16">
  <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z"/>
</svg>Farm Name</h2>
    </section>

    <section class="view">


		<table class='table table-striped'>
			<thead>	  
			<tr>
				
				<th scope='col' hidden id='count'>Farm ID</th>
				
				
				<th scope='col' id='batch-no'>Batch No.</th>
				<th scope='col' id='name'>Name</th>
				<th scope='col' id='product'>Product</th>
                <th scope='col' id='initial'>Initial No.</th>
                <th scope='col' id='mortality'>Mortality</th>
				
				
			</tr>	  
			</thead>
		 
           
	
   
        	<tr>
            	<td>1</td>
            	<td>Batch 1/Layer</td>
            	<td>Layer</td>
            	<td>100</td>
               <td>10</td>
			</tr>

            <tr>
            	<td>2</td>
            	<td>Batch 2/Broiler</td>
            	<td>Broiler</td>
            	<td>40</td>
               <td>5</td>
			</tr>
              
		
	</table>



    </section>

    </div>
    <!--style-->

           <style type="text/css">

        .wrapper{
            margin-top:10px;
            border:1px solid grey;
        }

        .view {
            padding: 10px;
            margin: 20px;
        }


        .view-user {
            display: flex;
            margin-top:10px;
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
            background-color:darkblue;
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
            background-color:blue;
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

        .delete-button button{
            border:none;
            background-color:red;
        }

        .delete-button button:hover{
            border:none;
            background-color:darkred;
            color:white;
        }

        .addbatch-button button{
            border:none;
            background-color:darkgreen;
            
        }

        .addbatch-button button:hover{
            border:none;
            background-color:green;
            color:white;
        }

        #delete-yes{
            padding-left:20px;
            padding-right:20px;
            text-decoration:none;
        }

        #delete-btn{
            padding-left:0;
            padding-right:0;
        }

        .viewbatch-button button{
            background-color: limegreen;
            border:none;
        }

        .viewbatch-button button:hover{
            background-color: yellowgreen;
            border:none;
        }
        a{
            text-decoration:none !important;
        }
        </style>
</body>

</html>