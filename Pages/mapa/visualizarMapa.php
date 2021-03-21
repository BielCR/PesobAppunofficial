<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>Mapa</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCO_NGZLLK5bqxFbKiPlFn35xuEbH7AtYo&amp;sensor:false"></script>
</head>
<body onload="initMap();">
<!--Barra de navegação (1/2)-->
<?php include "../NAVBAR.php" ?>

<div id="mapa" class="">
<h1>TESTESTESTESTE</h1>
</div>





</body>

</html>
<script>
function initMap(){
    const initialPosition = new google.maps.LatLng(-20.501952994977124, -43.67937015758853);
    const mapOp = {
        zoom: 10,
        center: initialPosition,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    const mapa = new google.maps.Map(document.getElementById("mapa"), mapOp);
}
</script>