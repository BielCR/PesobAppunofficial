<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./styles/media/favicon.ico" type="image/x-icon">
    <title>Agendamento</title>
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
    <div class="container rounded bg-white p-3 mt-3">
        <form name="formCadastro" action="cadastro.php" method="POST" autocomplete="on" class="needs-validation">

            <!--Lista de treinamentos existentes-->
            <div class="dropdown dropright form-group">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropTreinamentos"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Treinamentos cadastrados</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-toggle="collapse" data-target="#inputDados">
                    <a class="dropdown-item" href="#">Brigadista Aéreo</a>
                    <a class="dropdown-item" href="#">Primeiros socorros</a>
                    <a class="dropdown-item" href="#">Resgate de animais</a>
                </div>
            </div>

            
            <!--Inputs de data e hora-->
           
            <div class="form-group collapse" id="inputDados">
                <h4>Agendamento do treinamento:</h4>
                <label for="calendario" class="h5">Data de agendamento</label>
                <input type="date" name="calendario" id="calendario" class="form-control form-group">

                <label for="hora" class="h5">Hora de agendamento</label>
                <input type="time" name="hora" id="hora" class="form-control form-group">
            </div>

            <!--Botoes de agendamento e cancelamento-->
            <div class="btn-group btn-group-lg divLT">
                <button type="submit" class="btn btn-primary form-group mr-1">Agendar</button>
                <button type="reset" class="btn btn-danger form-group ">Cancelar</button>
            </div>
        </form>
        <div id="verificar">
            <form name="formLeitura" action="alterar.php" method="POST" autocomplete="on" class="need-validation ">
                <!--tabela com todos os treinamentos-->
                <div class="form-group container form-table mt-3 table-responsive">
                    <table class="table table-striped bg-ghostwhite table-bordered">
                        <thead>
                            <h1>Tabela de Agendamentos</h1>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Data</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                            <tr>
                                <td>Brigadista Aéreo</td>
                                <td>24/05/2021</td>
                                <td>
                                    <a href="Alterar_Agendamento.php" class="btn btn-info form-control"
                                        role="button">Alterar</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger form-control" data-toggle="modal"
                                        data-target="#myModal">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Brigadista Aéreo</td>
                                <td>29/05/2021</td>
                                <td>
                                    <a href="Alterar_Agendamento.php" class="btn btn-info form-control"
                                        role="button">Alterar</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger form-control" data-toggle="modal"
                                        data-target="#myModal">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Primeiros socorros</td>
                                <td>09/10/2021</td>
                                <td>
                                    <a href="Alterar_Agendamento.php" class="btn btn-info form-control"
                                        role="button">Alterar</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger form-control" data-toggle="modal"
                                        data-target="#myModal">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td>Resgate de animais</td>
                                <td>13/11/2021</td>
                                <td>
                                    <a href="Alterar_Agendamento.php" class="btn btn-info form-control"
                                        role="button">Alterar</a>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger form-control" data-toggle="modal"
                                        data-target="#myModal">
                                        Excluir
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <br>
                </div>

                <!--Modal de exclusão-->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-dialog-centered ">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Exlusão</h4>
                                <button type="button" class="close" data-dismiss="modal" &times;> </button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                                Você confirma a exclusão desse evento agendado?
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">
                                    Excluir
                                </button>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">
                                    Cancelar
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>