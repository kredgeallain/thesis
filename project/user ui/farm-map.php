<?php

include '..\connect.php';

?>




<style type="text/css">
#map {
    height: 81%;

}

h6 {

    font-family: roboto;
    font-size: 14px;
    padding-bottom: 5px;
}

p {

    font-family: roboto;
    font-size: 14px;

}
.wrapper{
    align-items: center;
  }

  .home a{
    padding-left: 10px;
    padding-right: 10px;
    margin-left: 0;
    margin-right: 0;
    border: none;
  }

  .home a:hover{
    background-color: transparent;
    color: blue;
  }


.farm-name{
  display: flex;
  justify-content: center;
  align-items: center;
}

</style>



<?php
include '..\connect.php';

include 'header.php'; ?>

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_vL53nszxM8EsMd8rVkZRr4Fw9Va7sE&callback=initMap" async
    defer></script>
<script type="text/javascript">
var locations = [
    <?php 
			$result = $conn->query("SELECT * FROM farm");
			
			
			if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['farmname'].'", '.$row['lat'].', '.$row['lng'].',  "'.$row['farmowner'].'", ],';
            }
        }
        ?>
];

function initMap() {

    var InforObj = [];
    var map;
    var latitude = 10.592248;
    var longitude = 122.690637;
    var myLatLng = {
        lat: latitude,
        lng: longitude
    };

    var myOptions = {
        center: myLatLng,
        zoom: 15.8,
        mapTypeId: google.maps.MapTypeId.HYBRID

    };
    var map = new google.maps.Map(document.getElementById("map"),
        myOptions);

    setMarkers(map, locations)

}



function setMarkers(map, locations) {
    var infowindow;

    var marker, i


    for (i = 0; i < locations.length; i++) {

        var farmname = locations[i][0]
        var lat = locations[i][1]
        var long = locations[i][2]
        var owner = locations[i][3]

        latlngset = new google.maps.LatLng(lat, long);

        const marker = new google.maps.Marker({
            map: map,
            // title: farmname,
            position: latlngset,
            icon: {
                url: 'farmlocation2.png',
                scaledSize: new google.maps.Size(80, 80)
            }
        });
        map.setCenter(marker.getPosition())


        var content = " <h6> " + farmname + '</h6>' + " <p> " + owner + '</p>'

        var infowindow = new google.maps.InfoWindow()

        google.maps.event.addListener(marker, 'click', (function(marker, content, infowindow) {
            return function() {

                infowindow.setContent(content);
                infowindow.open(map, marker);

                setTimeout(function() {
                    infowindow.close();
                }, 1500);

            };
        })(marker, content, infowindow));

    }


}

window.initMap = initMap;
</script>

<div onload="initMap()">
    <div id="map"></div>
</div>

<?php include ("footer.php");  ?>