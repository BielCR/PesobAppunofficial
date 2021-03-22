<?php
    if(isset($_GET["emailVol"])) {
        $email = $_GET["emailVol"];

        include "../conexao.php";

        $SQL = "SELECT tv.idTrei, t.nomeTreinamento FROM voluntario v 
            JOIN treinamentos_voluntario tv ON v.idVoluntario = tv.idVol
            JOIN treinamentos t ON t.idTreinamento = tv.idTrei 
            WHERE v.emailVoluntario = '";

        $SQL .= $email . "'";

        $result = $con->query($SQL);
        if($result->num_rows > 0) {
            $treinamentos = "";
            $primeiro = true;
            while($row = $result->fetch_assoc()) {
                if($primeiro) {
                    $primeiro = false;
                } else {
                    $treinamentos .= "; ";
                }
                $treinamentos .= $row['nomeTreinamento'];
            }
            echo $treinamentos;
        } else {
            echo "Não possui treinamento";
        }

        $con->close();
    }
?>