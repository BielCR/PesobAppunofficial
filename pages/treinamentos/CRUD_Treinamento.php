<?php
//inlcui o arquivo de conexão
include "../conexao.php";
?>
<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>Treinamento</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script>
        var idTreinamento = "";
        var nomesPre = "";

        function mensagemApagarRegistro(id, nome) {
            document.getElementById('mensagem').innerHTML = "Deseja apagar o treinameno: " + nome;
            idTreinamento = id; //Variável que guarda o id do registro a ser excluído.
        }

        function apagarRegistro(id) {
            window.location = 'excluir_trei.php?id=' + id;
        }
        //enviando os nomes dos treinamentos para a input
        function preencheInput(nome){
            if(nomesPre == ""){
                nomesPre = nome;
            }else{
                nomesPre = nomesPre + ", " + nome;
            }
            document.getElementById('preTxt').value= nomesPre;
        }
    </script>

</head>

<body>
    <!--Barra de navegação (1/2)-->

    <?php include "../NAVBAR.php" ?>

    <!--Corpo principal (2/2)-->
    <div id="principal" class="container bg-white rounded p-2 mt-3">
        <!--div do cadastro-->
        <div id="cadastro">
            <h2>Cadastro de treinamento</h2>
            <p>Preencha todos os campos</p>
            <form name="formCadastro" action="cadastrar_trei.php" method="POST" class="need-validation ">

                <!--nome do treinamento-->
                <div class="form-group ">
                    <label for="txtNome">Nome do treinamento: </label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" required placeholder="Insira o nome do treinamento">
                </div>

                <!--descrição do treinamento-->
                <div class="form-group ">
                    <label for="txtDescricao">Descrição do treinamento: </label>
                    <textarea name="txtDescricao" id="txtDescricao" rows="5" class="form-control" placeholder="Insira a descrição do treinamento"></textarea>
                </div>

                <!--Pré requisitos-->
                <!--Executando o select de todos os treinamentos já existentes-->
                <?php
                //definição do comando sql para a consulta
                $SQL = "SELECT * FROM treinamentos ORDER BY idTreinamento";
                //executa o comando sql
                $query = $con->query($SQL);
                ?>
                <label for="dropTreinamentos">Pré requisitos: </label>
                <div class="input-group form-group">
                    <div class="input-group-prepend dropdown form-group ">
                        <button class="btn btn-success dropdown-toggle" type="button" id="dropTreinamentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Treinamentos cadastrados</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-toggle="collapse" data-target="#inputDados">
                            <?php while ($exibir = $query->fetch_assoc()) { ?>
                                <a class="dropdown-item" onclick="preencheInput('<?php echo $exibir['nomeTreinamento']; ?>')"><?php echo $exibir["nomeTreinamento"]; ?></a>
                            <?php } ?>
                        </div>
                    </div>
                    <input readonly name="preTxt" id="preTxt" type="text" class="form-control" placeholder="Pré requisitos">
                </div>

                <!--<div class="form-group ">
                    <label for="txtPre">Pré requisitos</label>
                    <input class="form-control" type="text" name="txtPre" id="txtPre" required placeholder="Insira os pré requisitos do treinamento">
                </div>-->

                <!--Botões-->
                <div class="btn-group btn-group-lg divLT">
                    <button type="submit" class="btn btn-success form-group">Enviar</button>
                    <button type="reset" class="btn btn-danger form-group ">Cancelar</button>
                </div>
            </form>
        </div>
        <!--</cadastro>-->
        <br>

        <!--Listando os treinamentos colsultados no banco-->
        <form name="listaTreinamentos" action="CRUD_Treinamento.php" method="GET">
           
            <!--Executando o select de todos os treinamentos já existentes-->
            <?php
            $SQL = "SELECT * FROM treinamentos ORDER BY idTreinamento";
            $query = $con->query($SQL);
            ?>

            
            <p class="h4">Tabela de treinamentos</p>
            <table class="table table-striped bg-ghostwhite table-bordered">
                <tr>
                    <th>Nome</th>
                    <th>Alterar</th>
                    <th>Excluir</th>
                </tr>
                <!--enquanto existir registro na consulta, exibe os -->
                <?php
                while ($exibir = $query->fetch_assoc()) {
                ?>
                    <tr>
                        <td><?php echo $exibir["nomeTreinamento"] ?></td>
                        <td>
                            <a href="Alterar_Treinamento.php?idCat=<?php echo $exibir["idTreinamento"] ?>" class="btn btn-warning form-control" role="button">Alterar</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger form-control" role="button" data-toggle="modal" data-target="#modalExclusao" onclick="mensagemApagarRegistro('<?php echo $exibir['idTreinamento']; ?>'
                            ,'<?php echo $exibir['nomeTreinamento']; ?>')" title="Excluir Treinamento">Excluir</a>

                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </form>

        <!--Modal de exclusão-->
        <div class="modal fade" id="modalExclusao">
            <div class="modal-dialog modal-dialog-centered ">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Exclusão</h4>
                        <button type="button" class="close" data-dismiss="modal" &times;> </button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body" id="mensagem">
                        Você confirma a exclusão desse treinamento?
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button name="excluirBtn" id="excluirBtn" type="submit" class="btn btn-danger" data-dismiss="modal" onclick="apagarRegistro(idTreinamento);">
                            Excluir
                        </button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">
                            Cancelar
                        </button>
                    </div>

                </div>
            </div>
        </div>

    </div>
</body>

</html>