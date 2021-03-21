<?php
    $SQL = "SELECT * FROM informacoesapp WHERE id > 0";
    $result = $con->query($SQL);

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='card'>
                <div class='card-header'>
                    <button type='button' class='btn btn-block' data-toggle='collapse' data-target='#tp" . $row['id'] . "'>" . $row['titulo'] . "</button>
                </div>
                <div id='tp" . $row['id'] . "' class='collapse' data-parent='#accordion'>
                    <div class='card-body'>
                        <p>" . $row['corpo'] . "</p>
                        <img class='img-fluid' src='" . $row['imagem'] . "' alt='SeloBrigada' title='SeloBrigada'>
                    </div>
                </div>
            </div>";
        }
    }
?>