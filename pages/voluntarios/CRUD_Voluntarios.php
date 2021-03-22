<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>PESOB App</title>
    <link rel="stylesheet" href="../styles/main.css">
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
    <?php include "../NAVBAR.php";?>
    <?php include "../conexao.php";?>

    <!--Corpo principal (2/2)-->
    <div class="container mt-3 py-2 bg-white rounded">
        <div class="row">

            <!--Tabela de voluntários/ Cadastrar novo voluntário-->
            <div class="col-md-5">
                <h3>Voluntários</h3>
                <button id="btVolunts" type="button" class="btn btn-success ml-3">Voluntários</button>
                <button id="btNovoVolunt" type="button" class="btn btn-outline-success">Novo Voluntário</button>
                <!--Tabela de Voluntários-->
                <div id="tbVol" class="collapse fade show bg-light ml-3 mt-1 shadow table-responsive">
                    <?php include "./tabela_vol.php";?>
                </div>
                <!--Cadastrar Novo Voluntário-->
                <div id="novoVol" class="collapse fade ml-3 mt-1">
                    <form action="cadastrar_vol.php" class="border rounded p-2 bg-light" method="POST">
                        <div class="form-group">
                            <label for="nomeNovoVol" class="fLabel">Nome</label>
                            <input id="nomeNovoVol" name="nomeNovoVol" type="text" placeholder="Nome" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="emailNovoVol" class="fLabel">E-mail</label>
                            <input id="emailNovoVol" name="emailNovoVol" type="text" placeholder="exemplo@exemp.com" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="senhaNovoVol" class="fLabel">Senha</label>
                            <input id="senhaNovoVol" name="senhaNovoVol" type="password" placeholder="Senha" class="form-control">
                        </div>
                        <label for="fotoNovoVol" class="fLabel">Foto</label>
                        <input id="fotoNovoVol" name="fotoNovoVol" type="file" accept="image/png, image/jpeg, image/gif">
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
                    <button id="btEdit" type="button" class="btn btn-warning ml-auto h-50 align-self-center">Editar</button>
                    <a href="#modalFotoVol" class="mx-auto d-block w-25" data-toggle="modal"><img class="rounded shadow-lg border img-fluid" src="https://i.imgur.com/eQDusBx.jpg" alt="Foto do Voluntário" title="nome do voluntario"></a>
                    <!--MODAL PARA EDITAR FOTO DE VOLUNTÁRIO-->
                    <div class="modal fade" id="modalFotoVol">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header bg-light">
                                    <h2>Alterar Foto</h2>
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                </div>
                                <div class="modal-body bg-white">
                                    <img style="width: 50%;" class="rounded shadow-lg border mx-auto d-block img-fluid" src="https://i.imgur.com/eQDusBx.jpg" alt="foto do voluntário" title="Foto do Voluntário">
                                    <br>
                                    <form action="" method="GET">
                                        <div class="form-group">
                                            <input id="fotoVolModal" name="fotoVolModal" type="file" accept="image/png, image/jpeg, image/gif">
                                        </div>
                                        <button type="submit" class="btn btn-warning d-block ml-auto">Alterar</button>
                                    </form>
                                </div>
                                <div class="modal-footer bg-white">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Botão que irá excluir um voluntário pelos dados que estão nos inputs ou seleção de tabela-->
                    <button id="btDel" type="button" class="btn btn-danger mr-auto h-50 align-self-center" onclick="delVoluntario()">Deletar</button>
                </div>
                <div>
                    <div class="form-group">
                        <label class="fLabel" for="infoNome">Nome</label>
                        <input id="infoNome" name="infoNome" type="text" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label class="fLabel" for="infoEmail">E-mail</label>
                        <input id="infoEmail" name="infoEmail" type="text" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label class="fLabel" for="infoSenha">Senha</label>
                        <input id="infoSenha" name="infoSenha" type="password" class="form-control" disabled>
                    </div>
                    <div class="form-group">
                        <label class="fLabel" for="infoTreinamentos">Treinamentos</label>
                        <input id="infoTreinamentos" name="infoTreinamentos" type="text" class="form-control" disabled>
                    </div>
                    <div id="confirmarEdit" class="collapse">
                        <div class="form-group">
                            <select name="treiEdit" id="treiEdit" class="form-control">
    
                            </select>
                        </div>
                        <button type="button" class="btn btn-success ml-auto d-block" onclick="editarVoluntario()">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Scripts-->
    <!--Script de atualizacao dos campos pelo clique na tabela-->
    <!-- Scripts de Edicao e Delecao -->
    <script>
        var voluntarioSelecionado;

        var tabela = document.getElementById('tabelaVolunts');
        var linhas = tabela.getElementsByTagName('tr');

        for(var c = 0; c < linhas.length; c++) {
            var linha = linhas[c];
            linha.addEventListener('click', function(event) {
                attCampos(this);
            });
        }

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

        //Função para receber os dados e alterar os campos
        function attCampos(linha) {
            var colunas = linha.getElementsByTagName('td');

            //Passa-se o email pois ele e um campo unico
            var emailVol = colunas[1].innerHTML;
            var xmlreq = CriaRequest();

            // Iniciar uma requisição
            xmlreq.open("GET", "sel_voluntario.php?emailVol=" + emailVol, true);

            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                var voluntario;

                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {

                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        voluntario = xmlreq.responseText;
                        attInputs(voluntario, emailVol);
                    }else{
                        let x = "Erro: " + xmlreq.statusText;
                        window.alert(x);
                    }
                }
            };
            xmlreq.send();
        }

        function attInputs(volunt, email) {
            //Variável que guarda os dados do voluntario selecionado
            voluntarioSelecionado = volunt.split("|");

            //Atualizar campos de nome e email e senha
            document.getElementById('infoNome').value = voluntarioSelecionado[1];
            document.getElementById('infoEmail').value = voluntarioSelecionado[2];
            document.getElementById('infoSenha').value = voluntarioSelecionado[3];

            //Atualizacao do campo de TREINAMENTOS
            var xmlreq = CriaRequest();
            
            // Iniciar uma requisição
            xmlreq.open("GET", "sel_trei_voluntario.php?emailVol=" + email, true);

            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {

                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        treiVoluntario = xmlreq.responseText;
                        var treinamentos = treiVoluntario.split("|");

                        var stringTrei = "";
                        var idsTrei = [];
                        var cont = 0;

                        for(var c = 0; c < treinamentos.length; c++) {
                            if(c % 2 != 0) {
                                if(c > 1) {
                                    stringTrei += "; ";
                                }
                                stringTrei += treinamentos[c];
                            } else {
                                idsTrei[cont] = treinamentos[c];
                                cont++;
                            }
                        }
                        document.getElementById('infoTreinamentos').value = stringTrei;

                        //Atualizando o select com os treinamentos oferecidos
                        attSelectTrei(voluntarioSelecionado[0], idsTrei);
                    }else{
                        let x = "Erro: " + xmlreq.statusText;
                        window.alert(x);
                    }
                }
            };
            xmlreq.send();
        }

        //Funcao para atualizar o select de treinamentos
        function attSelectTrei(idVol, idsTrei) {
            var xmlreq = CriaRequest();
            var idsStr = "";

            for(var c = 0; c < idsTrei.length; c++) {
                if(c > 0) {
                    idsStr += "x";
                }
                idsStr += idsTrei[c];
            }

            var url = "idVol=" + idVol + "&idsTrei=" + idsStr;

            // Iniciar uma requisição
            xmlreq.open("GET", "options_edit_trei.php?" + url, true);

            // Atribui uma função para ser executada sempre que houver uma mudança de ado
            xmlreq.onreadystatechange = function(){
                // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                if (xmlreq.readyState == 4) {

                    // Verifica se o arquivo foi encontrado com sucesso
                    if (xmlreq.status == 200) {
                        optionsSelectTrei = xmlreq.responseText;
                        
                        document.getElementById("treiEdit").innerHTML = optionsSelectTrei;
                    }else{
                        let x = "Erro: " + xmlreq.statusText;
                        window.alert(x);
                    }
                }
            };
            xmlreq.send();
        }

        //Funcao que verifica e chama o php responsavel pela edicao no BD
        function editarVoluntario() {
            var nomeForm = document.getElementById('infoNome');
            var emailForm = document.getElementById('infoEmail');
            var senhaForm = document.getElementById('infoSenha');

            var dados = `infoId=${voluntarioSelecionado[0]}&infoNome=${nomeForm.value}&infoEmail=${emailForm.value}&infoSenha=${senhaForm.value}`;

            //Se nao houve modificacao de senha
            if(senhaForm.value == voluntarioSelecionado[3]) {
                var xmlreq = CriaRequest();

                // Iniciar uma requisição
                xmlreq.open("GET", "./editar_voluntario.php?" + dados, true);

                // Atribui uma função para ser executada sempre que houver uma mudança de ado
                xmlreq.onreadystatechange = function(){
                    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                    if (xmlreq.readyState == 4) {

                        // Verifica se o arquivo foi encontrado com sucesso
                        if (xmlreq.status == 200) {
                            window.alert("Edição feita com sucesso!");
                            window.location.reload();
                        }else{
                            let x = "Erro: " + xmlreq.statusText;
                            window.alert(x);
                        }
                    }
                };
                xmlreq.send();
            } else {
                //Se houve mudanca na senha e necessaria uma criptografia da nova
                var xmlreq = CriaRequest();

                // Iniciar uma requisição
                xmlreq.open("GET", "./editar_voluntario_crypto.php?" + dados, true);

                // Atribui uma função para ser executada sempre que houver uma mudança de ado
                xmlreq.onreadystatechange = function(){
                    // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                    if (xmlreq.readyState == 4) {

                        // Verifica se o arquivo foi encontrado com sucesso
                        if (xmlreq.status == 200) {
                            window.alert("Edição feita com sucesso!");
                            window.location.reload();
                        }else{
                            let x = "Erro: " + xmlreq.statusText;
                            window.alert(x);
                        }
                    }
                };
                xmlreq.send();
            }
        }

        //Funcao que "deleta" o voluntario selecionado pela tabela, como todo dado e valido nao deletamos realmente
        //o voluntario, apenas transformamos o id dele em negativo. :)
        function delVoluntario() {
            if(voluntarioSelecionado != null) {
                if(window.confirm("Tem certeza que deseja excluir esse voluntário?")) {
                    var xmlreq = CriaRequest();

                    // Iniciar uma requisição
                    xmlreq.open("GET", "./deletar_voluntario.php?idVol=" + voluntarioSelecionado[0], true);

                    // Atribui uma função para ser executada sempre que houver uma mudança de ado
                    xmlreq.onreadystatechange = function(){
                        // Verifica se foi concluído com sucesso e a conexão fechada (readyState=4)
                        if (xmlreq.readyState == 4) {

                            // Verifica se o arquivo foi encontrado com sucesso
                            if (xmlreq.status == 200) {
                                window.alert("Exclusão feita com sucesso!");
                                window.location.reload();
                            }else{
                                let x = "Erro: " + xmlreq.statusText;
                                window.alert(x);
                            }
                        }
                    };
                    xmlreq.send();
                }
            } else {
                window.alert("Selecione um voluntário para excluir!");
            }
        }
    </script>

    <!--Script de collapses-->
    <script>
        var btTb = document.getElementById('btVolunts');
        var btNV = document.getElementById('btNovoVolunt');
        var btEdit = document.getElementById('btEdit');
        var x = false;

        //Botão para mostrar a Tabela de Voluntários
        btTb.addEventListener('click', function(event) {
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
        btNV.addEventListener('click', function(event) {
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
        btEdit.addEventListener('click', function(event) {
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

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <?php $con->close();?>
</body>

</html>