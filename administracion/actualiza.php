<?php

session_start();

require 'config/database.php';

$id_Reservacion = $conn->real_escape_string($_POST['id_Reservacion']);
$id_Cliente= $conn->real_escape_string($_POST['id_Cliente']);
$id_Asignar= $conn->real_escape_string($_POST['id_Asignar']);
$hora_Programada= $conn->real_escape_string($_POST['hora_Programada']);
$fecha_Programada= $conn->real_escape_string($_POST['fecha_Programada']);
$estado_Reservacion = $conn->real_escape_string($_POST['estado_Reservacion']);
$no_Invitados= $conn->real_escape_string($_POST['no_Invitados']);

$sql = "UPDATE reservacion SET estado_Reservacion ='$estado_Reservacion' WHERE id_Reservacion=$id_Reservacion";

if ($conn->query($sql)) {

    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro actualizado"; 
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al actualizar registro"; 
}


header('Location: index.php');


