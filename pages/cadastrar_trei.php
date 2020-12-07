<?php
    //Para fazer a conexao com o BD
    include "conexao.php";

    //Recebe os dados vindos do formulario
    $nome = $_POST["txtNome"];
    $descricao = $_POST["txtDescricao"];
    $preRequisitos = $_POST["txtPre"];

    //Insercao com o Banco
    $SQL = "INSERT INTO treinamentos (nomeTreinamento, descricaoTreinamento, preReq)
     VALUES ('" . utf8_decode($nome) . "', '" . $descricao . "', ' . $preRequisitos')";

    if($con->query($SQL) === true) {
        echo "<script>alert('Cadastro de treinamento realizado com sucesso!')</script>";
        echo "<script>window.location = 'CRUD_Treinamento.php'</script>";
    } else {
        echo '<script>alert("Erro no cadastro! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }
?>