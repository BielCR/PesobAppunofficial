<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>Exclusão de treinamentos</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include ("../conexao.php");

    if (is_numeric($_GET["id"])) {
        
        $sql = "DELETE FROM treinamentos WHERE idTreinamento = " . $_GET["id"];
        if ($con->query($sql) === TRUE) {
            $_SESSION['excluir'] = "OK";
            header ("Location: CRUD_Treinamento.php");
        } else {
            $_SESSION['excluir'] = "ERRO";
            $_SESSION['msg'] = "Erro ao excluir o registro: $sql <br> $con->error";
            header("Location: CRUD_Treinamento.php");
        }
    }
    ?>
    <!-- O Modal -->
    <div class="modal" id="modalExcluirSucesso">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Cabeçalho do Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Exclusão de Treinamento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Corpo do Modal -->
                <div class="modal-body">
                    Treinamento excluído com sucesso.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- O Modal Erro ao Excluir -->
    <div class="modal" id="modalExcluirErro">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Cabeçalho do Modal -->
                <div class="modal-header">
                    <h4 class="modal-title">Erro</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Corpo do Modal -->
                <div class="modal-body">
                    Erro ao excluir o Treinamento.
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>