<?php
session_start();
if (empty($_SESSION["id_Admin"])){
    header("location: log.php");
} 
?>

<?php

require 'config/database.php';

$sqlMesasRes = "SELECT ubicacion.id_Ubicacion, ubicacion.nombre_Ubicacion, ubicacion.mesas_Totales, ubicacion.mesas_Reservadas, ubicacion.estado_Asignacion
FROM ubicacion 
WHERE ubicacion.mesas_Reservadas < ubicacion.mesas_Totales AND ubicacion.estado_Asignacion IN ('Disponible', 'DISPONIBLE','disponible')";
$MesasRes = $conn->query($sqlMesasRes);


$sqlMesasOcup= "SELECT ubicacion.id_Ubicacion, ubicacion.nombre_Ubicacion, ubicacion.mesas_Totales, 
ubicacion.mesas_Reservadas, ubicacion.estado_Asignacion
FROM ubicacion 
WHERE ubicacion.mesas_Reservadas = ubicacion.mesas_Totales  AND ubicacion.estado_Asignacion IN ('No Disponible', 'NO DISPONIBLE','no disponible')";
$MesasOcup = $conn->query($sqlMesasOcup);



?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

   
</head>

<body class="d-flex flex-column h-100" >

    <div class="header">
        <div class="container" id="barnav">
            <nav class="navbar bg-dark navbar-expand-lg bg-body-tertiary" data-bs-theme="dark" >
                <div class="container-fluid">
                    <a class="navbar-brand" id="logo" href="#">
                    <img src="./assets/imagenes/mezcal.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top">
                    Mezcalito</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav" id="menu">
                            <a class="nav-link active" aria-current="page" href="index.php">Reservaciones</a>
                            <a class="nav-link" href="#">Mesas</a>
                            <a class="nav-link" href="index_sugerencias.php">Sugerencias</a>
                    </div>
                    <div> <br></div>

                    <div class=" navbar-nav ms-auto">                 
                        <a class="nav-link text-light "><?php 
                                echo $_SESSION["usuario"]; 
                            ?></a>
                        <a class="nav-link text-danger" href="cerrar_sesion.php">Cerrar sesión</a>          
                    </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="container py-3">


                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                            Áreas disponibles para reservar
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4"  id="tablaMesas">
                                <thead class="table-dark ">
                                <tr>
                                    <th>#</th>
                                    <th>Ubicacion</th>
                                    <th>Mesas</th>
                                    <th>Mesas Reservadas</th>
                                    <th>Estatus</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $MesasRes->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Ubicacion']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_Totales']; ?></td>
                                            <td><?= $row['mesas_Reservadas']; ?></td>
                                            <td><?= $row['estado_Asignacion']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>              
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" >
                             Áreas no disponibles para reservar
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4 id" id="tablaMesas">
                                <thead class="table-dark ">
                                <tr>
                                    <th>#</th>
                                    <th>Ubicacion</th>
                                    <th>Mesas</th>
                                    <th>Mesas Reservadas</th>
                                    <th>Estatus</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $MesasOcup->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Ubicacion']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_Totales']; ?></td>
                                            <td><?= $row['mesas_Reservadas']; ?></td>
                                            <td><?= $row['estado_Asignacion']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table> 
                            </div>
                        </div>
                    </div>
                </div>


            </div>


    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>



</body>

</html>