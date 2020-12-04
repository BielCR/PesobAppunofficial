<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alterar Agendamento</title>
    <link rel="stylesheet" href="./styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>

</head>

<body class="corpo" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Barra de navegação (1/2)-->
    <?php include "NAVBAR.html"; ?>

    <!--Corpo principal (2/2)-->
    <!--Div de editar e enviar-->
    <div class="container rounded bg-white p-3 mt-3" id="verificar">
        <form name="formLeitura" action="alterar.php" method="POST" autocomplete="on" class="need-validation ">
            <h2>Alterar evento agendado</h2>
            <!--nome do treinamento-->
            <div class="form-group mt-3" id="mostraDados">
                <!--Data do agendamento-->
                <label for="calendario" class="h5">Data de agendamento</label>
                <input type="date" name="calendario" id="calendario" class="form-control form-group">

                <!--Hora do agendamento-->
                <label for="hora" class="h5">Hora de agendamento</label>
                <input type="time" name="hora" id="hora" class="form-control form-group">
            </div>

            <!--Botões-->
            <div class="btn-group divLT">
                <a href="CRUD_Agendamento.php" class="btn btn-primary form-group mr-1" role="button">Alterar</a>
                <button type="reset" class="btn btn-danger form-group">Cancelar</button>
            </div>
        </form>
    </div>

</body>

</html>