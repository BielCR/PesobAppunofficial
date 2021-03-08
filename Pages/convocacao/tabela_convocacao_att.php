<?php
    if(isset($_GET["idsTrei"])) {
        $idsTrei = $_GET["idsTrei"];

        include "../conexao.php";

        if($idsTrei != "empty") {
            $idsArray = explode("x", $idsTrei);
            // $string_array = "AND ";

            // for($c = 0; $c < count($idsArray); $c++) {
            //     if($c > 0) {
            //         $string_array .= " OR ";
            //     }
            //     $string_array .= "tv.idTrei = " . $idsArray[$c];
            // }

            // $array_raw = "";

            // for($c = 0; $c < count($idsArray); $c++) {
            //     $array_raw .= $idsArray[$c];
            // }

            // echo $string_array . " | " . count($idsArray) . " | " . $array_raw;

            $SQL = "SELECT tb0.nomeVoluntario, tb0.emailVoluntario, tb0.treinamentos FROM ";
            
            for($c = 0; $c < count($idsArray); $c++) {
                if($c > 0) {
                    $SQL .= " JOIN ";
                }

                $SQL .= "(SELECT v.nomeVoluntario, v.emailVoluntario, count(tv.idVol) as treinamentos FROM voluntario v JOIN treinamentos_voluntario tv ON v.idVoluntario = tv.idVol
                WHERE v.idVoluntario > 0 AND tv.idTrei = " . $idsArray[$c] . " GROUP BY v.nomeVoluntario ORDER BY v.nomeVoluntario) tb" . $c;

                if($c > 0) {
                    $SQL .= " ON tb" . ($c - 1) . ".emailVoluntario = tb" . $c . ".emailVoluntario";
                }
            }
        } else {
            $SQL = "SELECT v.nomeVoluntario, v.emailVoluntario, count(tv.idVol) as treinamentos FROM 
            voluntario v JOIN treinamentos_voluntario tv ON v.idVoluntario = tv.idVol WHERE v.idVoluntario > 0
            GROUP BY v.nomeVoluntario
            ORDER BY v.nomeVoluntario";
        }

        $result = $con->query($SQL);
        $newTbody = "";

        if($result != null && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row['treinamentos'] == 0) {
                    $newTbody .= "<tr>

                    </tr>";
                } else {
                    $newTbody .= "<tr>
                            <td>" . $row['nomeVoluntario'] . "</td>
                            <td>" . $row['emailVoluntario'] . "</td>
                            <td>" . $row['treinamentos'] . "</td>
                            <td class='d-flex'>
                                <div class='form-check-inline mx-auto'>
                                    <label class='form-check-label'>
                                        <input class='form-check-input' type='checkbox' name='checkBrig' id='checkBrig' value='" . $row['emailVoluntario'] . "'>
                                    </label>
                                </div>
                            </td>
                        </tr>";
                }
            }
        } else {
            $newTbody .= "<tr>

                    </tr>";
        }
        echo $newTbody;

        $con->close();
    }
?>