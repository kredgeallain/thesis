<?php

include '.\connect.php';

?>




<style type="text/css">
#map {
    height: 90%;

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
</style>



<?php include 'header.php'; ?>

<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_vL53nszxM8EsMd8rVkZRr4Fw9Va7sE&callback=initMap" async
    defer></script>
<script type="text/javascript">
var locations = [
    <?php 
			$result = $conn->query("SELECT baranggay.baranggay, farm.farmname, farm.farmowner, farm.farm_size, farm.lat,farm.lng,
            farm.contactno, farm.farmID, baranggay.baranggayID
            FROM baranggay INNER JOIN farm ON baranggay.baranggayID = farm.baranggayID");
			
			
			if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                echo '["'.$row['farmname'].'", '.$row['lat'].', '.$row['lng'].',  "'.$row['farmowner'].'", "'.$row['farm_size'].'", "'.$row['baranggay'].'", "'.$row['contactno'].'", ],';
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
        zoom: 18.0,
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
        var size = locations[i][4]
        var brgy = locations[i][5]
        var contact = locations[i][6]

        latlngset = new google.maps.LatLng(lat, long);

        const marker = new google.maps.Marker({
            map: map,
            // title: farmname,
            position: latlngset,
            icon: {
                url: '../image/farmlocation2.png',
                scaledSize: new google.maps.Size(80, 80)
            }
        });
        map.setCenter(marker.getPosition())


        var content = " <h6> Farm Name: " + farmname + '</h6>' + " <p> Barangay: " + brgy + '</p>'  + " <p> Farm Area:" 
        + size + ' Sq. meter</p>'  + " <p>  Farm Owner:" + owner + '</p>'  + " <p> Contact No.:" + contact + '</p>' 

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