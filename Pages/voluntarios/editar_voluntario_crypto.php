<?php
    //Para fazer a conexao com o BD
    include "../conexao.php";

    //Recebe os dados vindos do formulario
    $id = $_GET["infoId"];
    $nome = $_GET["infoNome"];
    $email = $_GET["infoEmail"];
    $senha = $_GET["infoSenha"];

    $SQL = "UPDATE voluntario SET nomeVoluntario = '" . utf8_decode($nome) . "', senhaVoluntario = '" . md5($senha) . "', emailVoluntario = '$email' WHERE idVoluntario = '$id'";

    if($con->query($SQL) === true) {
        echo "<script>alert('Edição realizada com sucesso!')</script>";
        echo "<script>window.location.reload()</script>";
    } else {
        echo '<script>alert("Erro na edição! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }

    $con->close();
?>