<?php


require 'config/database.php';

$id_Reservacion = $conn->real_escape_string($_POST['id_Reservacion']);

$sql = "SELECT * FROM reservacion WHERE id_Reservacion=$id_Reservacion LIMIT 1";
$resultado = $conn->query($sql);
$rows = $resultado->num_rows;

$Mesa = [];

if ($rows > 0) {
    $Mesa  = $resultado->fetch_array();
}

echo json_encode($Mesa , JSON_UNESCAPED_UNICODE);
