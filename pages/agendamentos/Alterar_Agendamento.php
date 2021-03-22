<?php include "../conexao.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>Alterar Agendamento</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body class="corpo" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Barra de navegação (1/2)-->
    <?php include "../NAVBAR.php"; ?>


    <!--Conexao para verificacao no banco de dados-->
    <?php
        $id = $_GET["idAg"];

        //sql para consulta
        $SQL = "SELECT * FROM agendamentos WHERE idAgendamento = '{$id}'";

        //executando os comandos
        $query = $con->query($SQL) or die($con->error);
        $dados = $query->fetch_assoc();
    ?>

    <!--Corpo principal (2/2)-->
    <!--Div de editar e enviar-->
    <div class="container rounded bg-white p-3 mt-3" id="verificar">
        <form name="formLeitura" action="alterar_ag.php" method="POST" autocomplete="on" class="need-validation ">
            <h2>Alterar evento agendado: <?php echo $dados["nomeTreinamento"]; ?></h2>
            <!--nome do treinamento-->
            <div class="form-group mt-3" id="mostraDados">
                <!--Data do agendamento-->
                <label for="calendario" class="h5">Data de agendamento</label>
                <input type="date" name="calendario" id="calendario" class="form-control form-group" 
                value="<?php echo $dados["dataAgendamento"]; ?>">

                <!--Hora do agendamento-->
                <label for="hora" class="h5">Hora de agendamento</label>
                <input type="time" name="hora" id="hora" class="form-control form-group"
                value="<?php echo $dados["horaAgendamento"]; ?>">

                <!--Local do treinamento-->
                <label for="local" class="h5">Local do treinamento</label>
                <input type="text" name="local" id="local" class="form-control form-group"
                value="<?php echo $dados["localTreinamento"]; ?>">

                <!--Instrutor respnsavel-->
                <label for="treinador" class="h5">Instrutor</label>
                <input type="text" name="treinador" id="treinador" class="form-control form-group"
                value="<?php echo $dados["nomeInstrutor"]; ?>">

                <input type="hidden" id="id" name="id" value="<?php echo $dados['idAgendamento'];?>">

            </div>

            <!--Botões-->
            <div class="btn-group divLT">
                <button type="submit" class="btn btn-success form-group mr-1">Confirmar</button>
                <a href="CRUD_Agendamento.php" class="btn btn-danger form-group">Cancelar</a>
            </div>
        </form>
    </div>

</body>

</html>