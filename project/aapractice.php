<?php 


include 'connect.php';

			$result = $conn->query("SELECT farm.farmname, farm.lat, farm.lng, farm.farmowner,sum(batch.initial) as initial, sum(layer.mortality) as Lmortality,
             sum(broiler.mortality) as Bmortality, COUNT(*)
            FROM farm
            
            inner join batch on farm.farmID = batch.farmID
            inner join layer on batch.batchID = layer.batchID
            inner join broiler on batch.batchID = broiler.batchID
            group by farm.farmname
            HAVING COUNT(*) > 0
            ");
			
			
			if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){



                echo '["'.$row['farmname'].'", '.$row['lat'].', '.$row['lng'].',  "'.$row['farmowner'].'", '.$row['initial'].', '.$row['Lmortality'].', 
                '.$row['Bmortality'].', 
             ],';




            }
        }
        ?>