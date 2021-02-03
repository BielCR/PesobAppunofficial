<?php
include "../conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../styles/media/favicon.ico" type="image/x-icon">
    <title>Alterar</title>
    <link rel="stylesheet" href="../styles/main.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script type="text/javascript">
    </script>
</head>

<body class="corpo" data-spy="scroll" data-target=".navbar" data-offset="50">
    <!--Barra de navegação (1/2)-->
    <?php
    include "../NAVBAR.php"

    ?>

    <?php
    $id = $_GET['idCat'];

    //definição do comando sql para a consulta
    $SQL = "SELECT * FROM treinamentos WHERE idTreinamento = '{$id}'";
    //executa o comando sql
    $query = $con->query($SQL) or die($con->error);
    $dados = $query->fetch_assoc();

    
    ?>

    <!--Corpo principal (2/2)-->
    <!--Div de editar e enviar-->
    <div class="container rounded bg-white p-3 mt-3" id="verificar">
        <form name="formLeitura" action="editar_trei.php" method="POST" autocomplete="on" class="need-validation ">
            <h2>Alterar treinamento</h2>
            <!--id do treinamento-->
            <div class="form-group">
                <label for="txtId">Numero Indentificador do treinamento</label>
                <input type="text" class="form-control" name="txtId" 
                id="txtId" readonly value="<?php echo $_GET['idCat']; ?>" >
            </div>
                <!--nome do treinamento-->
                <div class="form-group">
                    <label for="txtNome">Nome do treinamento: </label>
                    <input type="text" class="form-control" name="txtNome" id="txtNome" required placeholder="Insira o nome do treinamento"
                    value="<?php echo $dados['nomeTreinamento']; ?>">
                </div>

                <!--descrição do treinamento-->
                <div class="form-group">
                    <label for="txtDescricao">Descrição do treinamento: </label>
                    <textarea name="txtDescricao" id="txtDescricao" rows="5" class="form-control" placeholder="Insira a descrição do treinamento">
                    <?php echo $dados['descricaoTreinamento'] ;?>
                    </textarea>
                </div>

                <!--Pré requisitos-->
                <div class="form-group">
                    <label for="txtPre">Pré requisitos</label>
                    <input class="form-control" type="text" value="<?php echo $dados['preReq']; ?>" name="txtPre" id="txtPre" required placeholder="Insira os pré requisitos do treinamento">
                </div>

            <!--Botões-->
            <div class="btn-group">
                <button name="editTrei" id="editTrei" class="btn btn-success form-group" type="submit">Editar</button>
                <a href="CRUD_Treinamento.php" type="reset" class="btn btn-danger form-group">Cancelar</a>
            </div>
        </form>
    </div>



</body>

</html>