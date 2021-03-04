<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de alteração
$data = $_POST["calendario"];
$hora = $_POST["hora"];
$local = $_POST["local"];
$treinador = $_POST["treinador"];
$id = $_POST["id"];

//Insercao com o Banco
$SQL = "UPDATE agendamentos SET dataAgendamento = '" . ($data) . "', horaAgendamento = '" . $hora . "', 
localTreinamento = '" . $local . "', nomeInstrutor = '" . $treinador . "' WHERE idAgendamento = '" . $id ."'" ;
echo $SQL;  

if ($con->query($SQL)) {
?>
    <script>
        alert('Edição de agendamento realizado com sucesso!');
        window.location = 'CRUD_Agendamento.php';
    </script>
<?php
} else {
?>
    <script>
        alert("Erro na edição! ' . $con->error . '");
        //Volta a pagina mantendo o historico do usuario
        window.history.back();
    </script>
<?php
}
?>