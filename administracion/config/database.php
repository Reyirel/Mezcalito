<?php
    $servername = "localhost"; // Nombre del servidor de la base de datos (puede ser "localhost" si estás trabajando en tu computadora local)
    $username = "admin"; // Nombre de usuario de la base de datos
    $password = "uaeh"; // Contraseña de la base de datos
    $dbname = "mezcalito"; // Nombre de la base de datos

    // Crear la conexión
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Verificar la conexión
    if (!$conn) {
        die("Error en la conexión: " . mysqli_connect_error());
    }



$sql = "SELECT * FROM reservacion WHERE estado_Reservacion = 'Pendiente'";
$result = $conn->query($sql);

// Iteración sobre las reservaciones pendientes
while ($row = $result->fetch_assoc()) {
  // Obtención de la fecha y hora programadas
  $fecha_programada = $row["fecha_Programada"];
  $hora_programada = $row["hora_Programada"];

  // Cálculo de la fecha y hora actual
  $fecha_actual = date("Y-m-d");
  $hora_actual = date("H:i:s");

  // Cálculo de la fecha y hora límite para la cancelación
  $limite_fecha = date("Y-m-d H:i:s", strtotime("$fecha_programada $hora_programada + 30 minutes"));

  // Verificación de si la fecha y hora actual están después del límite
  if ($fecha_actual > $limite_fecha || ($fecha_actual == $limite_fecha && $hora_actual >= $hora_programada)) {
    // Actualización del estado de la reservación a "Cancelada"
    $id_reservacion = $row["id_Reservacion"];
    $sql_update = "UPDATE reservacion SET estado_Reservacion = 'Cancelada' WHERE id_Reservacion = $id_reservacion";
    $conn->query($sql_update);
  }
}

$sql2 = "SELECT * FROM reservacion WHERE estado_Reservacion = 'Aceptada' AND TIMESTAMP(fecha_Programada, hora_Programada) < NOW() - INTERVAL 6 HOUR";
$resultado = mysqli_query($conn, $sql2);
// Actualización de las reservaciones seleccionadas
while ($fila = mysqli_fetch_assoc($resultado)) {
  $id_reservacion = $fila['id_Reservacion'];

  // Consulta para actualizar el estado de la reservación a "Finalizada"
  $actualizacion = "UPDATE reservacion SET estado_Reservacion = 'Finalizada' WHERE id_Reservacion = $id_reservacion";

  mysqli_query($conn, $actualizacion);
}



// Actualizar mesas_ReservadasCliente a 0 si estado_Reservacion es Cancelada o Finalizada
$sql3g = "UPDATE asignar
         INNER JOIN reservacion ON asignar.id_Reservacion = reservacion.id_Reservacion
         INNER JOIN ubicacion ON asignar.id_Ubicacion = ubicacion.id_Ubicacion
         SET asignar.mesas_ReservadasCliente = 0
         WHERE reservacion.estado_Reservacion IN ('Cancelada', 'Finalizada')";

if (mysqli_query($conn, $sql3g)) {
} else {
    echo "Error al actualizar las mesas_ReservadasCliente: " . mysqli_error($conn) . "\n";
}

// Actualizar mesas_Reservadas y estado_Asignacion
$sql4g = "UPDATE ubicacion
         SET mesas_Reservadas = (
             SELECT SUM(asignar.mesas_ReservadasCliente) 
             FROM asignar 
             WHERE asignar.id_Ubicacion = ubicacion.id_Ubicacion
         ),
         estado_Asignacion = CASE
             WHEN mesas_Reservadas < mesas_Totales THEN 'Disponible'
             ELSE 'No Disponible'   
         END";

if (mysqli_query($conn, $sql4g)) {
} else {
    echo "Error al actualizar las mesas_Reservadas y estado_Asignacion: " . mysqli_error($conn) . "\n";
}


?>
