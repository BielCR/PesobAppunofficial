<?php
    $SQL = "SELECT v.nomeVoluntario, v.emailVoluntario, count(tv.idVol) as treinamentos FROM 
    voluntario v JOIN treinamentos_voluntario tv ON v.idVoluntario = tv.idVol WHERE v.idVoluntario > 0
    GROUP BY v.nomeVoluntario
    ORDER BY v.nomeVoluntario";
    
    $result = $con->query($SQL);
    echo "<table id='tbBrig' class='table table-bordered table-striped table-hover'>
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Treinamentos</th>
                        <th>Selecionar</th>
                    </tr>
                </thead>";
    if($result != null && $result->num_rows > 0) {
        echo "<tbody id='tbodyConvo'>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>
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
    } else {
        echo "<tbody id='tbodyConvo'>";
    }
    echo "</tbody>";
    echo "</table>";
?>