<?php

session_start();

require 'config/database.php';

$id_Sugerencias= $conn->real_escape_string($_POST['id_Sugerencias']);

$sqlSug = "DELETE FROM sugerencias WHERE id_Sugerencias =$id_Sugerencias";

if ($conn->query($sqlSug)) {

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro actualizado";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al actualizar registro";
}






header('Location: index_sugerencias.php');


