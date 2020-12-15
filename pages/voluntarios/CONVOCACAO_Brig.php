<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>PESOB App</title>
    <link rel="stylesheet" href="../styles/main.css">
    <style>
        hr {
            border-color: black;
        }

        #tbBrig {
            height: 300pt;
        }

        #tbBrig input {
            width: 30pt;
            height: 30pt;
        }
    </style>
</head>

<body>
    <!--Barra de navegação (1/2)-->
    <?php include "../NAVBAR.php" ?>

    <!--Corpo principal (2/2)-->
    <div class="container mt-3 py-2 bg-white rounded">
        <div class="row">
            <!-- Dados para a convocação -->
            <div class="col-md-7">
                <h3>Dados</h3>
                <div class="ml-3">
                    <!-- Tem que ser por método GET por enquanto senão gera um erro -->
                    <form id="formulario" action="" method="GET">
                        <!-- Seleção de treinamento -->
                        <div class="form-group">
                            <label for="divCheckTreino" class="fLabel" style="font-size: 25px;">Treinamento(s)</label>
                            <div id="divCheckTreino" style="margin-left: 10pt;">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="checkTreino" id="checkTreino" value="abafador">Abafador
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="checkTreino" id="checkTreino" value="bombacostal">Combate com Bomba Costal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox" name="checkTreino" id="checkTreino" value="escalada">Escalada
                                    </label>
                                </div>
                            </div>
                        </div>
                        <!-- Seleção de Brigadistas -->
                        <div class="form-group">
                            <label for="tbBrig" class="fLabel" style="font-size: 25px;">Brigadista(s)</label>
                            <!-- Checkbox para selecionar todos os brigadistas da tabela -->
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input onclick="selecionarTudo(this)" style="width: 15pt; height: 15pt;" class="form-check-input" type="checkbox" name="checkAllBrig" id="checkAllBrig"><span style="font-size: large;">Selecionar todos</span>
                                </label>
                            </div>
                            <!-- Tabela para a seleção de brigadistas -->
                            <div id="tbBrig" class="table-responsive bg-light">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>E-mail</th>
                                            <th>Treinamentos</th>
                                            <th>Selecionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bruno de Paula Santos e Santos</td>
                                            <td>raktufin@gmail.com</td>
                                            <td>4</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-1">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Gabriel Cezar Rodrigues</td>
                                            <td>gabuita@gmail.com</td>
                                            <td>7</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-2">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-3">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-4">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-5">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-6">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-7">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Geraldo</td>
                                            <td>geraldo@gmail.com</td>
                                            <td>5</td>
                                            <td class="d-flex">
                                                <div class="form-check-inline mx-auto">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" name="checkBrig" id="checkBrig" value="brig-8">
                                                    </label>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <hr class="d-md-none">
                    </form>
                </div>
            </div>
            <!-- Definição de uma descrição -->
            <div class="col-md-5">
                <div class="form-group mt-md-4">
                    <label for="txtDesc" class="fLabel ml-3" style="font-size: 25px;">Descrição</label>
                    <textarea form="formulario" id="txtDesc" name="txtDesc" class="form-control" rows="10" placeholder="Insira uma descrição para a convocação"></textarea>
                </div>
            </div>
        </div>
        <hr>
        <!-- Botão para confirmar a convocação -->
        <button style="height: 50px;" class="btn btn-success w-50 d-block mx-auto" type="submit" form="formulario">CONVOCAR</button>
    </div>

    <!-- Scripts -->
    <!-- Script para selecionar todos os brigadistas de uma vez -->
    <script>
        function selecionarTudo(source) {
            var checkboxes = document.getElementsByName('checkBrig');
            for (var c = 0; c < checkboxes.length; c++) {
                checkboxes[c].checked = source.checked;
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>

</html>