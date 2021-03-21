<?php
    //Para fazer a conexao com o BD
    include "../conexao.php";

    //Recebe os dados vindos do formulario
    $id = $_POST["topDeletar"];

    $SQL = "UPDATE informacoesapp SET id = $id * -1 WHERE id = $id";

    if($con->query($SQL) === true) {
        echo "<script>alert('Deleção realizada com sucesso!')</script>";
        echo "<script>window.location = 'MOD_App.php'</script>";
    } else {
        echo '<script>alert("Erro na deleção! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }

    $con->close();
?>