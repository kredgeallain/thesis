<?php 

$m= '<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA2_vL53nszxM8EsMd8rVkZRr4Fw9Va7sE&callback=initMap" async
    defer></script>';

$map = new GoogleMapsAPI($m);



echo $map;
?>