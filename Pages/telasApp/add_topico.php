<?php
    //Para fazer a conexao com o BD
    include "../conexao.php";

    //Recebe os dados vindos do formulario
    $titulo = $_POST["titulo"];
    $corpo = $_POST["corpo"];

    $SQL = "INSERT INTO informacoesapp (titulo, corpo, imagem)";
    $SQL .= " VALUES ('" . $titulo . "', '" . $corpo . "', 'https://i.imgur.com/fGUeCp7.png')";

    if($con->query($SQL) === true) {
        echo "<script>alert('Tópico adicionado com sucesso!')</script>";
        echo "<script>window.location = 'MOD_App.php'</script>";
    } else {
        echo '<script>alert("Erro na adição! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }

    $con->close();
?>