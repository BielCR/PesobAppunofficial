<?php
//incluindo o php de conexao ao banco
include "../conexao.php";
?>
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
    <script src="./mapa.js"></script>
    
    <style>
        .container {
            display: flex;
            flex-direction: row;
        }
    </style>
</head>

<body onload="initMap();">
    <!--Barra de navegação (1/2)-->
    <?php include "../NAVBAR.php";
    $sql = "SELECT * FROM localizacao;";
    $queryDenuncias = $con->query($sql);
    $infoLocalizacao = array();
    while($exibir = $queryDenuncias->fetch_array(MYSQLI_BOTH)){
        $infoLocalizacao[]=["id"=> $exibir["id"], "latitude"=> $exibir["latitude"],
         "longitude"=> $exibir["longitude"], "dataHora"=> $exibir["dataHora"]];
    }
    $json = json_encode($infoLocalizacao);
    if(file_put_contents("LatLng.json", $json)){

    }else{
        echo "Falha ao gerar arquivo json";
    }
    
    ?>
    <div class="container rounded bg-white p-3 mt-3" style="justify-content: center;">
        <div id="mapa" style="height:500px; width:1000px"></div>
    </div>
</body>

</html>

