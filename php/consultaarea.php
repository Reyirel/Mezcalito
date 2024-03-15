    <?php

    $user = "root";
    $pass = "";
    $host = "localhost:3307";

    $connection = mysqli_connect($host, $user, $pass, 'mezcalitodb');

    $consultaidArea = "SELECT id_Ubicacion, estado_Asignacion FROM ubicacion WHERE 1;";
    $desbAREA = $connection->query($consultaidArea);

    $style = "";

    // Verificar si hay resultados
    if ($desbAREA->num_rows > 0) {
        // Mostrar los resultados en un bucle
        while ($row = $desbAREA->fetch_assoc()) {
            if ($row["estado_Asignacion"] == "No Disponible") {
                $style .= '.selectMesaOP option[value="' . $row["id_Ubicacion"] . '"]{display:none;}';
            } elseif ($row["estado_Asignacion"] != "Disponible") {
                $style .= '.selectMesaOP option[value="' . $row["id_Ubicacion"] . '"]{display:none;}';
            }
        }
    }

    // Imprimir la cadena de estilo
    echo '<style>' . $style . '</style>';

    ?>