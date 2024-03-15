<?php

require 'config/database.php';

$id_Sugerencias = $conn->real_escape_string($_POST['id_Sugerencias']);

$sqlSuge = "SELECT * FROM sugerencias WHERE id_Sugerencias = $id_Sugerencias LIMIT 1";
$resultado = $conn->query($sqlSuge);
$rows = $resultado->num_rows;

$Mesa = [];

if ($rows > 0) {
    $Mesa= $resultado->fetch_array();
}

echo json_encode($Mesa, JSON_UNESCAPED_UNICODE);
