<?php
//incluindo o php de conexao ao banco
include "../conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./styles/media/favicon.ico" type="image/x-icon">
    <title>Agendamento</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <script type="text/javascript">
        //salvando as variaveis temporarias 
        var nomeTrei = "";
        var idTrei = "";

        function chamaTreinamento(nome, id) {
            document.getElementById('mensagem').innerHTML = "Agendamento do treinamento: " + nome   ;
            nomeTrei = nome;
            idTrei = id;
            document.getElementById('dropTreinamentos').style.display = "none";
            document.getElementById('inputDados').style.display = "initial";
        }

        function enviarId() {
            var data = document.getElementById('calendario').value;
            var hora = document.getElementById('hora').value;
            var local = document.getElementById('local').value;
            var instrutor = document.getElementById('instrutor').value;
            window.location = 'cadastrar_ag.php?id=' + idTrei + '&data=' + data + '&hora=' + hora + '&nome=' +nomeTrei
            +'&local=' + local +'&instrutor=' +instrutor;
        }

        function mostraBotao() {
            document.getElementById('dropTreinamentos').style.display = "initial";
            document.getElementById('inputDados').style.display = "none";
        }
    </script>
</head>

<body class="corpo" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Barra de navegação (1/2)-->
    <?php include "../NAVBAR.php"; ?>

    <!--Corpo principal (2/2)-->
    <div class="container rounded bg-white p-3 mt-3">

        <div>
            <?php
            //definição do comando sql para a consulta
            $SQL = "SELECT * FROM treinamentos ORDER BY idTreinamento";
            //executa o comando sql
            $queryTreinamentos = $con->query($SQL);
            ?>

            <!--Lista de treinamentos existentes-->
            <div class="dropdown form-group pt-3">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropTreinamentos" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Treinamentos cadastrados</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" data-toggle="collapse" data-target="#inputDados">
                    <?php while ($exibir = $queryTreinamentos->fetch_assoc()) { ?>
                        <a class="dropdown-item" href="#" onclick="chamaTreinamento('<?php echo $exibir['nomeTreinamento']; ?>','<?php echo $exibir['idTreinamento']; ?>')"><?php echo $exibir["nomeTreinamento"]; ?></a>
                    <?php } ?>
                </div>
            </div>


            <form name="formCadastro" action="cadastrar_ag.php" method="POST" autocomplete="on" class="needs-validation">
                
                <!--Inputs de agendamento-->
                <div class="form-group collapse" id="inputDados">
                    <h2 class="text-center" id="mensagem">Agendamento do treinamento:</h2>
                    <label for="calendario" class="h5">Data de agendamento</label>
                    <input type="date" name="calendario" id="calendario" class="form-control form-group">
                    <label for="hora" class="h5">Hora de agendamento</label>
                    <input type="time" name="hora" id="hora" class="form-control form-group">
                    <label for="local" class="h5">Local do treinamento</label>
                    <input type="text" name="local" id="local" class="form-control form-group">
                    <label for="instrutor" class="h5">Nome do intrutor</label>
                    <input type="text" name="instrutor" id="instrutor" class="form-control form-group">


                    <!--Botoes de agendamento e cancelamento-->
                    <div class="btn-group btn-group-lg divLT">
                        <a href="#" role="button" class="btn btn-primary form-group mr-1" onclick="enviarId()">Agendar</a>
                        <a href="#" role="button" class="btn btn-danger form-group" onclick="mostraBotao()">Cancelar</a>
                    </div>
                    </div>
                </form>
            </div>


            <div id="verificar">
                
            <?php
                //definição do comando sql para a consulta
                $SQL = "SELECT * FROM agendamentos ORDER BY dataAgendamento";
                //executa o comando sql
                $queryAgendamentos = $con->query($SQL);
            ?>


            <form name="formRUD" action="alterar.php" method="POST" autocomplete="on" class="need-validation ">
                <!--tabela com todos os treinamentos-->
                <div class="form-group container form-table mt-3 table-responsive">
                    <table class="table table-striped bg-ghostwhite table-bordered">
                        <thead>
                            <h1>Tabela de Agendamentos</h1>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="col">Nome</th>
                                <th scope="col">Data e Hora</th>
                                <th scope="col">Alterar</th>
                                <th scope="col">Excluir</th>
                            </tr>
                            <?php 
                            while ($exibir = $queryAgendamentos->fetch_assoc()) { 
                                $data = $exibir["dataAgendamento"];
                                $data = implode("/",array_reverse(explode("-",$data)));
                                ?>
                                <tr>
                                    <td>
                                    <?php echo $exibir["nomeTreinamento"]; ?>
                                    </td>
                                    <td>
                                    <?php echo $data . " - " . $exibir["horaAgendamento"]; ?>
                                    </td>
                                    <td>
                                    <a href="Alterar_Agendamento.php?idCat=<?php echo $exibir["idTreinamento"]; ?>" 
                                    class="btn btn-info form-control" role="button">Alterar</a>
                                    </td>
                                    <td>
                                    <a href="#" class="btn btn-danger form-control" role="button" data-toggle="modal"
                                    data-target="#modalExclusao" onclick= "mensagemApagarRegistro('<?php echo $exibir['idTreinamento'];?>'
                                    ,'<?php echo $exibir['nomeTreinamento'];?>')" title = "Excluir Treinamento">Excluir</a> 
                                    </td>
                                </tr>
                            <?php } ?>
                    </table>
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