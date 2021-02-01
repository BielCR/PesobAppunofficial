<?php
    include "../conexao.php";

    $SQL = "SELECT * FROM voluntario WHERE idVoluntario > 0 ORDER BY nomeVoluntario";
    $result = $con->query($SQL);
    echo "<table id='tabelaVolunts' class='table table-bordered table-striped table-hover'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                    </tr>
                </thead>";
    if($result->num_rows > 0) {
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row['nomeVoluntario'] . "</td>
                    <td>" . $row['emailVoluntario'] . "</td>
                </tr>";
        }
        echo "</tbody>";
    }
    echo "</table>";

    $con->close();
?>