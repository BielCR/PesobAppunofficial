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
    <?php include "../conexao.php";?>
    <!--Barra de navegação (1/2)-->
    <?php include "../NAVBAR.php" ?>

    <!--Corpo principal (2/2)-->
    <div class="container w-75 mt-3 py-2 bg-white rounded">
        <div class="row">
            <!-- Dados para a convocação -->
            <div class="mx-auto">
                <h3>Dados</h3>
                <div class="ml-3">
                    <!-- Tem que ser por método GET por enquanto senão gera um erro -->
                    <!-- Seleção de treinamento -->
                    <div class="form-group">
                        <label for="divCheckTreino" class="fLabel" style="font-size: 25px;">Treinamento(s)</label>
                        <h6 style="color: rgba(128, 128, 128, 0.418);">Selecione algum treinamento para filtrar Brigadistas</h6>
                        <div id="divCheckTreino" style="margin-left: 10pt;">
                            <?php include "./checkboxes_trei.php"?>
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
                            <?php include "./tabela_convocacao_vol.php"?>
                        </div>
                    </div>
                    <!-- Definição de uma descrição -->
                    <div class="form-group mt-md-4">
                        <label for="txtDesc" class="fLabel" style="font-size: 25px;">Descrição</label>
                        <textarea id="txtDesc" name="txtDesc" class="form-control" rows="10" placeholder="Insira uma descrição para explicar do que se trata a convocação"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <!-- Botão para confirmar a convocação -->
        <button style="height: 50px;" class="btn btn-success w-50 d-block mx-auto" type="button" onclick="enviarEmail()">CONVOCAR</button>
    </div>

    <?php $con->close();?>

    <!-- Scripts -->
    <!-- Script para enviar o email -->
    <script>
        //Via Mailto
        function enviarEmail(event) {
            //Associacao de email dos brigadistas selecionados
            var checks = document.getElementsByName("checkBrig");
            var emails = "";

            for(var c = 0; c < checks.length; c++) {
                if(checks[c].checked) {
                    emails += checks[c].value;
                    if(c != checks.length - 1) {
                        emails += ",";
                    }
                }
            }

            if(emails == "") {
                window.alert("Selecione, pelo menos, um brigadista para convocar.");
            } else {
                //Anexagem da descricao da convocacao ao email
                var descricao = document.getElementById("txtDesc").value;
                
                //Execucao do app de envio de emails padrao do sistema com o conteudo pre-definido
                document.location.href = "mailto:" + emails + "?subject=VOCÊ%20FOI%20CONVOCADX%20PELA%20BRIGADA%21&body=" + descricao;
                window.location.reload();
                event.preventDefault();
            }
        }
    </script>

    <!-- Script para atualizar a tabela de acordo com os Checkboxes selecionados -->
    <script>
        //Função para criar um objeto XMLHTTPRequest
        function CriaRequest() {
            try{
                request = new XMLHttpRequest();
            }catch (IEAtual){

                try{
                    request = new ActiveXObject("Msxml2.XMLHTTP");
                }catch(IEAntigo){

                    try{
                        request = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch(falha){
                        request = false;
                    }
                }
            }

            if (!request)
                alert("Seu Navegador não suporta Ajax!");
            else
                return request;
        }

        //Função para atualizar a tabela de acordo com os checkboxes selecionados
        function attTabela() {
            var checks = document.getElementsByName("checkTreino");
            var stringArray = "";
            var checkeds = 0;

            //Preenche a string de ids dos checkboxes selecionados
            for(var c = 0; c < checks.length; c++) {
                if(checks[c].checked) {
                    if(checkeds > 0) {
                        stringArray += "x";
                    }
                    stringArray += checks[c].value;
                    checkeds++;
                }
            }

            var xmlreq = CriaRequest();

            if(stringArray != "") {
                // Iniciar uma requisição
                xmlreq.open("GET", "tabela_convocacao_att.php?idsTrei=" + stringArray, true);

                // Atribui uma função para ser executada sempre que houver uma mudança de ado
                xmlreq.onreadystatechange = function(){
                    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                    if (xmlreq.readyState == 4) {

                        // Verifica se o arquivo foi encontrado com sucesso
                        if (xmlreq.status == 200) {
                            var newTbody = xmlreq.responseText;
                            document.getElementById("tbodyConvo").innerHTML = newTbody;
                        }else{
                            let x = "Erro: " + xmlreq.statusText;
                            window.alert(x);
                        }
                    }
                };
                xmlreq.send();
            } else {
                // Iniciar uma requisição
                xmlreq.open("GET", "tabela_convocacao_att.php?idsTrei=empty", true);

                // Atribui uma função para ser executada sempre que houver uma mudança de ado
                xmlreq.onreadystatechange = function(){
                    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                    if (xmlreq.readyState == 4) {

                        // Verifica se o arquivo foi encontrado com sucesso
                        if (xmlreq.status == 200) {
                            var newTbody = xmlreq.responseText;
                            document.getElementById("tbodyConvo").innerHTML = newTbody;
                        }else{
                            let x = "Erro: " + xmlreq.statusText;
                            window.alert(x);
                        }
                    }
                };
                xmlreq.send();
            }
        }
    </script>

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