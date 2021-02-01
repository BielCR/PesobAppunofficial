<?php
    //Para fazer a conexao com o BD
    include "../conexao.php";

    //Recebe os dados vindos do formulario
    $id = $_GET["idVol"];

    $SQL = "UPDATE voluntario SET idVoluntario = $id * -1 WHERE idVoluntario = $id";

    if($con->query($SQL) === true) {
        echo "<script>alert('Deleção realizada com sucesso!')</script>";
        echo "<script>window.location.reload()</script>";
    } else {
        echo '<script>alert("Erro na deleção! ' . $con->error . '")</script>';
        //Volta a pagina mantendo o historico do usuario
        echo "<script>window.history.back()</script>";
    }

    $con->close();
?>