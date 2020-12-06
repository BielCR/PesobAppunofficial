<?php
    // Iniciou a sessao aqui para nao ter que repetir isso em todas as paginas
    // que precisam disso
    session_start();

    //Parametros para acesso ao BD
    $servidor = "200.18.128.52";
    $usuario = "bruno_gabriel";
    $senha = "bruno_gabriel";
    $nomeBD = "bruno_gabriel";
    $con = new mysqli($servidor, $usuario, $senha, $nomeBD);
?>