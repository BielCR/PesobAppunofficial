<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./styles/media/favicon.ico" type="image/x-icon">
    <title>PESOB App</title>
    <link rel="stylesheet" href="./styles/main.css">
    <style>
        #tbVol {
            height: 400px;
            width: 90%;
        }

        hr {
            border-color: black;
        }
    </style>
</head>

<body>
    <!--Barra de navegação (1/2)-->
    <?php include "NAVBAR.html"; ?>

    <!--Corpo principal (2/2)-->
    <div class="container mt-3 py-2 bg-secondary rounded">
        <div class="row">

            <!--Tabela de voluntários/ Cadastrar novo voluntário-->
            <div class="col-md-5">
                <h3>Voluntários</h3>
                <button id="btVolunts" type="button" class="btn btn-success ml-3">Voluntários</button>
                <button id="btNovoVolunt" type="button" class="btn btn-outline-success">Novo Voluntário</button>
                <!--Tabela de Voluntários-->
                <div id="tbVol" class="collapse fade show bg-light ml-3 mt-1 shadow table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-secondary">
                                <td>Bruno de Paula Santos e Santos</td>
                                <td>raktufin@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Gabriel Cezar Rodrigues</td>
                                <td>gabrielcz@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Yasmin Ank</td>
                                <td>yasmin@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Cavalo</td>
                                <td>minhaeguinha.pocoto@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                            <tr>
                                <td>Geraldo</td>
                                <td>geraldo@gmail.com</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--Cadastrar Novo Voluntário-->
                <div id="novoVol" class="collapse fade ml-3 mt-1">
                    <form action="" class="border rounded p-2 bg-light" method="POST">
                        <div class="form-group">
                            <label for="nomeNovoVol" class="fLabel">Nome</label>
                            <input id="nomeNovoVol" name="nomeNovoVol" type="text" placeholder="Nome"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="emailNovoVol" class="fLabel">E-mail</label>
                            <input id="emailNovoVol" name="emailNovoVol" type="text" placeholder="exemplo@exemp.com"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="senhaNovoVol" class="fLabel">Senha</label>
                            <input id="senhaNovoVol" name="senhaNovoVol" type="password" placeholder="Senha"
                                class="form-control">
                        </div>
                        <label for="fotoNovoVol" class="fLabel">Foto</label>
                        <input id="fotoNovoVol" name="fotoNovoVol" type="file"
                            accept="image/png, image/jpeg, image/gif">
                        <button type="submit" class="btn btn-success ml-auto d-block">Cadastrar</button>
                    </form>
                </div>
                <hr class="d-md-none">
            </div>

            <!--Informações do voluntário selecionado-->
            <!--Os dados irão ser atualizados de acordo com qual linha foi clicada na tabela-->
            <div class="col-md-7">
                <div class="d-flex justify-content-center">
                    <h3>Informação</h3>
                </div>
                <div class="d-flex">
                    <!--Botão que irá alterar o atributo de habilitado dos inputs-->
                    <button id="btEdit" type="button"
                        class="btn btn-warning ml-auto h-50 align-self-center">Editar</button>
                    <a href="#modalFotoVol" class="mx-auto d-block w-25" data-toggle="modal"><img
                            class="rounded shadow-lg border img-fluid"
                            src="https://i.pinimg.com/originals/24/5a/e1/245ae17922e87954167a22bb77addf89.jpg"
                            alt="Foto do Voluntário" title="nome do voluntario"></a>
                    <!--MODAL PARA EDITAR FOTO DE VOLUNTÁRIO-->
                    <div class="modal fade" id="modalFotoVol">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h2>Alterar Foto</h2>
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                </div>
                                <div class="modal-body bg-secondary">
                                    <img style="width: 50%;" class="rounded shadow-lg border mx-auto d-block img-fluid"
                                        src="https://i.pinimg.com/originals/24/5a/e1/245ae17922e87954167a22bb77addf89.jpg"
                                        alt="foto do voluntário" title="Foto do Voluntário">
                                    <br>
                                    <form action="" method="GET">
                                        <div class="form-group">
                                            <input id="fotoVolModal" name="fotoVolModal" type="file"
                                                accept="image/png, image/jpeg, image/gif">
                                        </div>
                                        <button type="submit" class="btn btn-warning d-block ml-auto">Alterar</button>
                                    </form>
                                </div>
                                <div class="modal-footer bg-secondary">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Botão que irá excluir um voluntário pelos dados que estão nos inputs ou seleção de tabela-->
                    <button id="btDel" type="button"
                        class="btn btn-danger mr-auto h-50 align-self-center">Deletar</button>
                </div>
                <div>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="fLabel" for="infoNome">Nome</label>
                            <input id="infoNome" name="infoNome" type="text" value="Bruno de Paula Santos e Santos"
                                class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label class="fLabel" for="infoEmail">E-mail</label>
                            <input id="infoEmail" name="infoEmail" type="text" value="raktufin@gmail.com"
                                class="form-control" disabled>
                        </div>
                        <div class="form-group">
                            <label class="fLabel" for="infoSenha">Senha</label>
                            <input id="infoSenha" name="infoSenha" type="password" value="123456" class="form-control"
                                disabled>
                        </div>
                        <div id="confirmarEdit" class="collapse">
                            <button type="submit" class="btn btn-success ml-auto d-block">Confirmar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <!--Script de collapses-->
    <script>
        var btTb = document.getElementById('btVolunts');
        var btNV = document.getElementById('btNovoVolunt');
        var btEdit = document.getElementById('btEdit');
        var x = false;

        //Botão para mostrar a Tabela de Voluntários
        btTb.addEventListener('click', function (event) {
            $('#tbVol').collapse('show');
            $('#novoVol').collapse('hide');
            if (btTb.classList.contains('btn-outline-success')) {
                btTb.classList.replace('btn-outline-success', 'btn-success');
                if (btNV.classList.contains('btn-success')) {
                    btNV.classList.replace('btn-success', 'btn-outline-success');
                }
            }
        });
        //Botão para mostrar o Cadastro de um Novo Voluntário
        btNV.addEventListener('click', function (event) {
            $('#tbVol').collapse('hide');
            $('#novoVol').collapse('show');
            if (btNV.classList.contains('btn-outline-success')) {
                btNV.classList.replace('btn-outline-success', 'btn-success');
                if (btTb.classList.contains('btn-success')) {
                    btTb.classList.replace('btn-success', 'btn-outline-success');
                }
            }
        });
        //Botão de Editar os Dados de um Voluntário selecionado
        btEdit.addEventListener('click', function (event) {
            if (x) {
                x = false;
                $('#confirmarEdit').collapse('hide');
                document.getElementById('infoNome').disabled = true;
                document.getElementById('infoEmail').disabled = true;
                document.getElementById('infoSenha').disabled = true;
            } else {
                x = true;
                $('#confirmarEdit').collapse('show');
                document.getElementById('infoNome').disabled = false;
                document.getElementById('infoEmail').disabled = false;
                document.getElementById('infoSenha').disabled = false;
            }
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
        crossorigin="anonymous"></script>
</body>

</html>