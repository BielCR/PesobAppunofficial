<?php
    include "../conexao.php";

    $idVol = $_GET["idVol"];
    $idsTrei = $_GET["idsTrei"];
    
    $SQL = "SELECT t.idTreinamento, t.nomeTreinamento FROM treinamentos_voluntario tv 
        RIGHT JOIN treinamentos t ON t.idTreinamento = tv.idTrei 
        WHERE tv.idVol != ";
        
    $SQL .= $idVol;
        
    if($idsTrei != "0") {
        //Ja possui algum treinamento
        $SQL .= " AND ";

        $idsArray = explode("x", $idsTrei);

        for($c = 0; $c < count($idsArray); $c++) {
            if($c > 0) {
                $SQL .= " AND ";
            }
            $SQL .= "tv.idTrei != " . $idsArray[$c];
        }

    }
    
    $SQL .= " OR tv.idTrei IS NULL GROUP BY t.nomeTreinamento";
    
    $result = $con->query($SQL);

    if($result->num_rows > 0) {
        //Tem treinamentos a serem aprendidos
        $strOptions = "";
        while($row = $result->fetch_assoc()) {
            $strOptions .= "<option value='" . $row['idTreinamento'] . "'>" . $row['nomeTreinamento'] . "</option>";
        }

        echo $strOptions;
    } else {
        //Nao tem mais treinamentos a serem aprendidos
        echo "<option value='0'>Não há mais treinamentos</option>";
    }

    $con->close();
?>