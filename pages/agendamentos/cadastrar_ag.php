<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de cadastro
$id = $_GET['id'];
$data = $_GET['data'];
$hora = $_GET['hora'];
$nome = $_GET['nome'];

//Insercao com o Banco
$SQL = "INSERT INTO agendamentos (idTreinamento, dataAgendamento, horaAgendamento, nomeTreinamento) 
VALUES ('" . $id . "', '" . $data . "', '" . $hora . "', '" . $nome . "')";

$con->query($SQL) or die($con->error);
?>
<script>
    window.location = 'CRUD_Agendamento.php';
</script>