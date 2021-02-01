<?php
    //Para fazer a conexao com o BD
    include "../conexao.php";

    //Recebe os dados vindos do formulario
    $nome = $_POST["nomeNovoVol"];
    $email = $_POST["emailNovoVol"];
    $senha = $_POST["senhaNovoVol"];

    $SQL = "INSERT INTO voluntario (nomeVoluntario, senhaVoluntario, emailVoluntario)";
    $SQL .= " VALUES ('" . utf8_decode($nome) . "', '" . md5($senha) . "', '$email')";

    if($con->query($SQL) === true) {
        echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        echo "<script>window.location = 'CRUD_Voluntarios.php'</script>";
    } else {
        echo '<script>alert("Erro no cadastro! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }

    $con->close();
?>