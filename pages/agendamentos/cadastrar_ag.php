<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de cadastro
$id = $_GET['id'];
$data = $_GET['data'];
$hora = $_GET['hora'];
$nomeTrei = $_GET['nome'];
$local = $_GET['local'];
$nomeInstrutor = $_GET['instrutor'];

//Insercao com o Banco
$SQL = "INSERT INTO agendamentos (idTreinamento, dataAgendamento, horaAgendamento, nomeTreinamento, localTreinamento, nomeIntrutor) 
VALUES ('" . $id . "', '" . $data . "', '" . $hora . "', '" . $nomeTrei . "', '" . $local . "', '" . $nomeInstrutor ."')";

$con->query($SQL) or die($con->error);
?>
<script>
    window.location = 'CRUD_Agendamento.php';
</script>