<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de alteração
$idTrei = $_POST["txtId"];
$nome = $_POST["txtNome"];
$descricao = $_POST["txtDescricao"];
$preRequisitos = $_POST["txtPre"];

//Insercao com o Banco
$SQL = "UPDATE treinamentos SET nomeTreinamento = '" . utf8_decode($nome) . "',
 descricaoTreinamento = '" . $descricao . "', 
 preReq = '" . $preRequisitos . "' WHERE idTreinamento = '" . $idTrei ."'" ;


if ($con->query($SQL)) {
?>
    <script>
        alert('Edição de treinamento realizado com sucesso!');
        window.location = 'CRUD_Treinamento.php';
    </script>
<?php
} else {
?>
    <script>
        alert("Erro no cadastro! ' . $con->error . '");
        //Volta a pagina mantendo o historico do usuario
        window.history.back();
    </script>
<?php
}
?>