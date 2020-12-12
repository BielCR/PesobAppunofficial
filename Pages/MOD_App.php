<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./styles/media/favicon.ico" type="image/x-icon">
    <title>PESOB App</title>
    <link rel="stylesheet" href="./styles/main.css">
    <style>
        hr {
            border-color: black;
        }

        /*#btSwitch{
            border-radius: 10px;
        }*/
        /*Estilização do botão SWITCH de formulários*/
        .btSwitch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .btSwitch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .btSlider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: green;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .btSlider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.btSlider {
            background-color: red;
        }

        input:focus+.btSlider {
            box-shadow: 0 0 1px gray;
        }

        input:checked+.btSlider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        .btSlider.round {
            border-radius: 34px;
        }

        .btSlider.round:before {
            border-radius: 50%;
        }
    </style>
</head>

<body>
    <!--Barra de navegação (1/2)-->
    <?php include "NAVBAR.html"; ?>

    <!--Corpo principal (2/2)-->
    <div class="container mt-3 bg-white py-2 rounded">
        <div class="row">
            <div class="col-md-4">
                <!--O seletor de telas do App-->
                <h3>Telas do App</h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown">Selecione uma Tela</button>
                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item">Informações</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Trilhas</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Primeiros Socorros</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">Incêndios Florestais</a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">UCs de Ouro Branco</a>
                    </div>
                </div>
                <hr>
                <!--A pre-visualização da tela no app-->
                <h4>Pre-visualização</h4>
                <img class="rounded shadow-lg border mx-auto d-block img-fluid" src="https://i.imgur.com/ZldJXpD.png" alt="prototipoTelaInfo" title="Pre-visualização da Tela">
                <button type="button" class="btn btn-success mt-3 ml-auto d-block" data-toggle="modal" data-target="#modalTela">Expandir</button>
                <!--MODAL PRE-VISUALIZAÇÃO-->
                <div class="modal fade" id="modalTela">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header bg-light">
                                <h2>Pre-visualização</h2>
                                <button type="button" class="close" data-dismiss="modal">x</button>
                            </div>
                            <div class="modal-body bg-white">
                                <img style="width: 85%; height: 85%;" class="rounded shadow-lg border mx-auto d-block img-fluid" src="https://i.imgur.com/ZldJXpD.png" alt="prototipoTelaInfo" title="Pre-visualização da Tela">
                            </div>
                            <div class="modal-footer bg-white">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="d-md-none">
            </div>
            <div class="col-md-8">
                <!--O visualizador de tópicos-->
                <div class="d-flex justify-content-end pr-4">
                    <h3>Tópicos atuais</h3>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#tp1">O que levar para uma trilha?</button>
                        </div>
                        <div id="tp1" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Conteúdo do tópico 1...</p>
                                <img class="img-fluid" src="https://i.imgur.com/zWcEbRw.jpeg" alt="imagemExemplo" title="Comida">
                                <p>Mais conteúdo...</p>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="car-header">
                            <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#tp2">O que não fazer?</button>
                        </div>
                        <div id="tp2" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Conteúdo do tópico 2...</p>
                                <img class="img-fluid" src="https://i.imgur.com/DoL4Bz7.gif" alt="imagemExemplo" title="Lenha">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <button type="button" class="btn btn-block" data-toggle="collapse" data-target="#tp3">Sobre o App</button>
                        </div>
                        <div id="tp3" class="collapse" data-parent="#accordion">
                            <div class="card-body">
                                <p>Conteúdo do tópico 3</p>
                                <p>"App muito daora, recomendo mto" - Kdu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <!--O formulário-->
                <div class="d-flex justify-content-end pr-4">
                    <h3><span style="color: green;">Adicionar</span> ou <span style="color: rgba(255, 0, 0, 0.541);">Excluir</span> Tópico</h3>
                </div>
                <div>
                    <!-- <button type="button" class="btn btn-warning" id="btSwitch" style="background-color: red; border-color: red;"><span style="font-weight: bold;">&#8652;</span></button> -->
                    <label id="switcher" class="btSwitch" title="Adicione ou Exclua">
                        <input type="checkbox">
                        <span class="btSlider round"></span>
                    </label>
                </div>
                <!--Formulário de adicionar tópicos-->
                <div id="addTop" class="collapse fade show pt-3">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label class="fLabel" for="titulo">Título do tópico</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Insira um título para o tópico" required>
                        </div>
                        <div class="form-group">
                            <label class="fLabel" for="texto">Campo de texto</label>
                            <textarea id="texto" class="form-control" rows="7" placeholder="Insira o texto do tópico"></textarea>
                        </div>
                        <label class="fLabel" for="imagem">Selecione uma imagem (para ilustrar melhor o tópico)</label>
                        <input type="file" id="imagem" name="imagem" accept="image/png, image/jpeg, image/gif">
                        <button type="submit" class="btn btn-success form-group" data-toggle="modal"
                    data-target="#qrModal">Adicionar</button>
                    </form>
                </div>
                <!--Formulário de deletar tópicos-->
                <div id="delTop" class="collapse fade pt-3">
                    <form action="" method="POST">
                        <label class="fLabel" for="topDeletar">Selecione um Tópico</label>
                        <select name="topDeletar" id="topDeletar" class="form-control">
                            <option>O que levar para uma trilha?</option>
                            <option>O que não fazer?</option>
                            <option>Sobre o App</option>
                        </select>
                        <div class="d-flex justify-content-end pt-4">
                            <button type="submit" class="btn btn-danger">Deletar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Modal de qr Code-->
    <div class="modal fade" id="qrModal">
        <div class="modal-dialog modal-dialog-centered ">
            <div class="modal-content">

                <!-- Cabecalho do modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Tela adicionada com sucesso!</h4>
                    <button type="button" class="close" data-dismiss="modal" &times;></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <p>Aqui está seu QR Code para a página</p>
                    <img src="https://i.imgur.com/GsAruhf.png" alt="QRCODE" class="mw-100">
                </div>

                <!-- Modal footer -->
                <div class="modal-footer divLT">
                    <button type="button" class="btn btn-primary form-control" data-dismiss="modal">
                        Sair
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!--Script para a ação do botão SWITCH-->
    <script>
        var switcher = document.getElementById('switcher');
        var x = false;

        switcher.addEventListener('click', function(event) {
            if (x) {
                x = false;
                $('#addTop').collapse('show');
                $('#delTop').collapse('hide');
            } else {
                x = true;
                $('#addTop').collapse('hide');
                $('#delTop').collapse('show');
            }
        });
    </script>
    <!--<script>
        var btSwitch = document.getElementById('btSwitch');
        var x  = false;
        btSwitch.addEventListener('click', function(event) {
            if(x){
                x = false;
                btSwitch.style.backgroundColor = 'Red';
                btSwitch.style.borderColor = 'Red';
                $('#addTop').collapse('show');
                $('#delTop').collapse('hide');
            } else {
                x = true;
                btSwitch.style.backgroundColor = 'Green';
                btSwitch.style.borderColor = 'Green';
                $('#addTop').collapse('hide');
                $('#delTop').collapse('show');
            }
        });
    </script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>