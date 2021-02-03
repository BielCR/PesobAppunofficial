<?php
//Para fazer a conexao com o BD
include "../conexao.php";

//Recebe os dados vindos do formulario de cadastro
$nome = $_POST["txtNome"];
$descricao = $_POST["txtDescricao"];
$preRequisitos = $_POST["txtPre"];


//Insercao com o Banco
$SQL = "INSERT INTO treinamentos (nomeTreinamento, descricaoTreinamento, preReq) 
        VALUES ('" . utf8_decode($nome) . "', '" . utf8_decode($descricao) . "
        ', '" . utf8_decode($preRequisitos) . "')";

     $con->query($SQL) or die($con->error);

if ($con->query($SQL) == true) {
?>
    <script>
        alert('Cadastro de treinamento realizado com sucesso!');
       window.location = 'CRUD_Treinamento.php';
    </script>
<?php
} else {
?>
    <script>
        alert("Erro no cadastro! ' . $con->error . '");
        //Volta a pagina mantendo o historico do usuario
        //window.location = 'CRUD_Treinamento.php';
    </script>
<?php
}
?>