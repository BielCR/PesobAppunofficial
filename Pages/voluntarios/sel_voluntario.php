<?php
    if(isset($_GET["emailVol"])) {
        $email = $_GET["emailVol"];

        include "../conexao.php";

        $SQL = "SELECT * FROM voluntario WHERE emailVoluntario = '$email'";
        $result = $con->query($SQL);
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $volunt = array($row['idVoluntario'], $row['nomeVoluntario'], $row['emailVoluntario'], $row['senhaVoluntario']);
                $string_array = implode("|", $volunt);
                echo $string_array;
            }
        }

        $con->close();
    }
?>