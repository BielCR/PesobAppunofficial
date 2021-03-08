<?php
    $SQL = "SELECT * FROM treinamentos";
    $result = $con->query($SQL);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='form-check-inline'>
                        <label class='form-check-label'>
                            <input onclick='attTabela()' class='form-check-input' type='checkbox' name='checkTreino' id='checkTreino' value='" . $row['idTreinamento'] . "'>" . $row['nomeTreinamento'] . "
                        </label>
                    </div>";
        }
    }

?>