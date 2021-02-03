<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de cadastro
$nome = $_POST["txtNome"];
$descricao = $_POST["txtDescricao"];
$preRequisitos = $_POST["preTxt"];


//Insercao com o Banco
$SQL = "INSERT INTO treinamentos (nomeTreinamento, descricaoTreinamento, preReq)
     VALUES ('$nome', '$descricao', '$preRequisitos')";

$con->query($SQL) or die($con->error);
?>
<script>
    alert('Cadastro de treinamento realizado com sucesso!');
    window.location = 'CRUD_Treinamento.php';
</script>