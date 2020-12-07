<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./styles/media/favicon.ico" type="image/x-icon">
    <title>Treinamento</title>
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

<body>
    <!--Barra de navegação (1/2)-->
    <?php include "NAVBAR.html"; ?>

    <!--Corpo principal (2/2)-->
    <div class="container bg-white rounded p-2 mt-3">
        <!--div do cadastro-->
        <div id="cadastro">
            <h2>Cadastro de treinamento</h2>
            <p>Preencha todos os campos</p>
            <form name="formCadastro" action="cadastrar_trei.php" method="POST" class="need-validation ">

                <!--nome do treinamento-->
                <div class="form-group ">
                    <label for="txtNome">Nome do treinamento: </label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" required
                        placeholder="Insira o nome do treinamento">
                </div>

                <!--descrição do treinamento-->
                <div class="form-group ">
                    <label for="txtDescricao">Descrição do treinamento: </label>
                    <textarea name="txtDescricao" id="txtDescricao" rows="5" class="form-control"
                        placeholder="Insira a descrição do treinamento"></textarea>
                </div>

                <!--Pré requisitos-->
                <div class="form-group ">
                    <label for="txtPre">Pré requisitos</label>
                    <input class="form-control" type="text" name="txtPre" id="txtPre" required
                        placeholder="Insira os pré requisitos do treinamento">
                </div>

                <!--Botões-->
                <div class="btn-group btn-group-lg divLT">
                    <button type="submit" class="btn btn-primary form-group">Enviar</button>
                    <button type="reset" class="btn btn-danger form-group ">Cancelar</button>
                </div>
            </form>
        </div>
        <br>

        <!--Div de editar e enviar-->
        <div id="verificar">
            <form name="formLeitura" action="alterar.php" method="POST" autocomplete="on" class="need-validation ">
                <!--tabela com todos os treinamentos-->
                <div class="form-group container form-table mt-1 table-responsive">
                    <table class="table table-striped bg-ghostwhite table-bordered">
                        <thead>
                            <h1>Tabela de treinamentos</h1>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                            <tr>
                                <td>Brigadista Aéreo</td>
                                <td>
                                    <a href="Alterar_Treinamento.php" class="btn btn-info form-control"
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
                                <td>
                                    <a href="Alterar_Treinamento.php" class="btn btn-info form-control"
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
                                <td>
                                    <a href="Alterar_Treinamento.php" class="btn btn-info form-control"
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
                                Você confirma a exclusão desse treinamento?
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