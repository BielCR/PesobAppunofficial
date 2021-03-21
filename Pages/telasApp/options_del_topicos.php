<?php
    $SQL = "SELECT * FROM informacoesapp WHERE id > 0";
    $result = $con->query($SQL);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['titulo'] . "</option>";
        }
    }
?>