<?php
session_start();
if (empty($_SESSION["id_Admin"])){
    header("location: log.php");
} 
?>

<?php

require 'config/database.php';

$sqlTodasRes = "SELECT reservacion.id_Reservacion, cliente.nombre, cliente.telefono,
reservacion.hora_Programada, reservacion.fecha_Programada, ubicacion.nombre_Ubicacion,asignar.mesas_ReservadasCliente,reservacion.no_Invitados, reservacion.estado_Reservacion 
FROM reservacion 
JOIN cliente ON cliente.id_Cliente = reservacion.id_Cliente
JOIN asignar ON asignar.id_Asignar = reservacion.id_Asignar 
JOIN ubicacion ON ubicacion.id_ubicacion = asignar.id_ubicacion 
ORDER BY reservacion.fecha_Programada DESC, reservacion.hora_Programada DESC;";
$TodasRes= $conn->query($sqlTodasRes);


$sqlHoyRes = "SELECT reservacion.id_Reservacion, cliente.nombre, cliente.telefono,
reservacion.hora_Programada, reservacion.fecha_Programada, ubicacion.nombre_Ubicacion, asignar.mesas_ReservadasCliente, reservacion.no_Invitados, reservacion.estado_Reservacion 
FROM reservacion 
JOIN cliente ON cliente.id_Cliente = reservacion.id_Cliente
JOIN asignar ON asignar.id_Asignar = reservacion.id_Asignar 
JOIN ubicacion ON ubicacion.id_ubicacion = asignar.id_ubicacion 
WHERE reservacion.fecha_Programada = CURDATE()
ORDER BY reservacion.fecha_Programada DESC, reservacion.hora_Programada DESC";
$HoyRes = $conn->query($sqlHoyRes);

$sqlPendienteRes = "SELECT reservacion.id_Reservacion, cliente.nombre, cliente.telefono,
reservacion.hora_Programada, reservacion.fecha_Programada, ubicacion.nombre_Ubicacion, asignar.mesas_ReservadasCliente, reservacion.no_Invitados, reservacion.estado_Reservacion 
FROM reservacion 
JOIN cliente ON cliente.id_Cliente = reservacion.id_Cliente
JOIN asignar ON asignar.id_Asignar = reservacion.id_Asignar 
JOIN ubicacion ON ubicacion.id_ubicacion = asignar.id_ubicacion 
WHERE reservacion.estado_Reservacion IN ('PENDIENTE','pendiente','Pendiente')
ORDER BY reservacion.fecha_Programada DESC, reservacion.hora_Programada DESC";
$PendienteRes = $conn->query($sqlPendienteRes);

$sqlCanceladasRes = "SELECT reservacion.id_Reservacion, cliente.nombre, cliente.telefono,
reservacion.hora_Programada, reservacion.fecha_Programada, ubicacion.nombre_Ubicacion, asignar.mesas_ReservadasCliente, reservacion.no_Invitados, reservacion.estado_Reservacion 
FROM reservacion 
JOIN cliente ON cliente.id_Cliente = reservacion.id_Cliente
JOIN asignar ON asignar.id_Asignar = reservacion.id_Asignar 
JOIN ubicacion ON ubicacion.id_ubicacion = asignar.id_ubicacion 
WHERE reservacion.estado_Reservacion IN ('CANCELADA', 'cancelada','Cancelada')
ORDER BY reservacion.fecha_Programada DESC, reservacion.hora_Programada DESC";
$CanceladasRes = $conn->query($sqlCanceladasRes);


$sqlClientesi = "SELECT reservacion.id_Reservacion, cliente.nombre, cliente.telefono, cliente.user_Social, cliente.user_Social2,reservacion.estado_Reservacion 
FROM reservacion 
JOIN cliente ON cliente.id_Cliente = reservacion.id_Cliente
ORDER BY reservacion.fecha_Programada DESC, reservacion.hora_Programada DESC; ";
$Clientesi = $conn->query($sqlClientesi);

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
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/><!--plugin de datatable-->
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
                            <a class="nav-link active" aria-current="page" href="#">Reservaciones</a>
                            <a class="nav-link" href="index_mesas.php">Mesas</a>
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
                            Todas las Reservaciones
                        </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4 table-light" id="mitablaA">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>                                      
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Ubicacion</th>
                                        <th>Mesas</th>
                                        <th>Invitados</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php while ($row = $TodasRes->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Reservacion']; ?></td>                                         
                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['hora_Programada']; ?></td>
                                            <td><?= $row['fecha_Programada']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_ReservadasCliente']; ?></td>
                                            <td><?= $row['no_Invitados']; ?></td>
                                            <td><?= $row['estado_Reservacion']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['id_Reservacion']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <br>
                            <button  class="btn btn-outline-success" type="button" onclick="exportToXLSX()">Descargar tabla como XLSX</button>

                            </div>              
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                            Reservaciones de Hoy
                        </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4" id="mitabla">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>                                       
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Ubicacion</th>
                                        <th>Mesas</th>
                                        <th>Invitados</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php while ($row = $HoyRes->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Reservacion']; ?></td>                             
                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['hora_Programada']; ?></td>
                                            <td><?= $row['fecha_Programada']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_ReservadasCliente']; ?></td>
                                            <td><?= $row['no_Invitados']; ?></td>
                                            <td><?= $row['estado_Reservacion']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['id_Reservacion']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table> 
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                            Reservaciones Pendientes
                        </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4" id="mitabla">
                                <thead class="table-dark ">
                                    <tr>
                                        <th>#</th>                                       
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Ubicacion</th>
                                        <th>Mesas</th>
                                        <th>Invitados</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php while ($row = $PendienteRes->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Reservacion']; ?></td>                                          
                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['hora_Programada']; ?></td>
                                            <td><?= $row['fecha_Programada']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_ReservadasCliente']; ?></td>
                                            <td><?= $row['no_Invitados']; ?></td>
                                            <td><?= $row['estado_Reservacion']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['id_Reservacion']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                            Reservaciones Canceladas
                        </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4" id="mitabla">
                                <thead class="table-dark ">
                                    <tr>
                                        <th>#</th>                                       
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Hora</th>
                                        <th>Fecha</th>
                                        <th>Ubicacion</th>
                                        <th>Mesas</th>
                                        <th>Invitados</th>
                                        <th>Estatus</th>
                                        <!-- <th>Acción</th> -->
                                    </tr>
                                </thead>
                                <tbody class="table-light">
                                    <?php while ($row = $CanceladasRes->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Reservacion']; ?></td>
                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['hora_Programada']; ?></td>
                                            <td><?= $row['fecha_Programada']; ?></td>
                                            <td><?= $row['nombre_Ubicacion']; ?></td>
                                            <td><?= $row['mesas_ReservadasCliente']; ?></td>
                                            <td><?= $row['no_Invitados']; ?></td>
                                            <td><?= $row['estado_Reservacion']; ?></td>
                                            <!-- <td>
                                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#editaModal" data-bs-id="<?= $row['id_Reservacion']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                            </td> -->
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            </div>              
                        </div>
                    </div>
                </div>

     <br><br>
                <div class="accordion accordion-flush" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive">
                            Clientes que han reservado
                        </button>
                        </h2>
                        <div id="flush-collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                            <table class="table table-sm table-striped table-hover mt-4 table-light" id="mitablaC">
                                <thead class="table-dark">
                                    <tr>
                                        <th>#</th>                                      
                                        <th>Nombre</th>
                                        <th>Telefono</th>
                                        <th>Facebook</th>
                                        <th>Instagram</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    <?php while ($row = $Clientesi ->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Reservacion']; ?></td>                                         
                                            <td><?= $row['nombre']; ?></td>
                                            <td><?= $row['telefono']; ?></td>
                                            <td><?= $row['user_Social']; ?></td>
                                            <td><?= $row['user_Social2']; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <br>
                            <button  class="btn btn-outline-success" type="button" onclick="exportToXLSX()">Descargar tabla como XLSX</button>
                            </div>              
                        </div>
                    </div>
                </div>


            </div>
    
    <?php include 'editaModal.php'; ?>

    <script>

        let editaModal = document.getElementById('editaModal')

        editaModal.addEventListener('hide.bs.modal', event => {         
            editaModal.querySelector('.modal-body #estado_Reservacion').value = ""
        })

        editaModal.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id_Reservacion = button.getAttribute('data-bs-id')

            let inputId = editaModal.querySelector('.modal-body #id_Reservacion')         
            let inputCliente = editaModal.querySelector('.modal-body #id_Cliente')
            let inputAsignar = editaModal.querySelector('.modal-body #id_Asignar')
            let inputHora = editaModal.querySelector('.modal-body #hora_Programada')
            let inputFecha = editaModal.querySelector('.modal-body #fecha_Programada')
            let inputEstado = editaModal.querySelector('.modal-body #estado_Reservacion')
            let inputInvitados = editaModal.querySelector('.modal-body #no_Invitados')

            
            let url = "getReservacion.php"
            let formData = new FormData()
            formData.append('id_Reservacion', id_Reservacion)

            fetch(url, {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                .then(data => {

                    inputId.value = data.id_Reservacion
                    inputCliente.value = data.id_Cliente
                    inputAsignar.value = data.id_Asignar
                    inputHora.value = data.hora_Programada
                    inputFecha.value = data.fecha_Programada
                    inputEstado.value = data.estado_Reservacion
                    inputInvitados.value = data.no_Invitados


                }).catch(err => console.log(err))

        })

    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

     <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>

        var table = new DataTable('#mitablaA', {
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
            },
        });

    </script>

<script>

        var table = new DataTable('#mitablaC', {
            language: {
            url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
            },
        });

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>

<script>
    function exportToXLSX() {
            // Obtener la tabla
            var table = document.getElementById("mitablaA");

            // Crear un objeto de libro de trabajo de Excel
            var workbook = XLSX.utils.book_new();

            // Crear una hoja de trabajo de Excel y agregar la tabla
            var worksheet = XLSX.utils.table_to_sheet(table);
            XLSX.utils.book_append_sheet(workbook, worksheet, "Tabla");

            // Descargar el archivo XLSX
            XLSX.writeFile(workbook, "Reporte-Reservación.xlsx");

                    // Obtener la tabla
                    var table2 = document.getElementById("mitablaC");

                    // Crear un objeto de libro de trabajo de Excel
                    var workbook2 = XLSX.utils.book_new();
            
                    // Crear una hoja de trabajo de Excel y agregar la tabla
                    var worksheet2 = XLSX.utils.table_to_sheet(table2);
                    XLSX.utils.book_append_sheet(workbook2, worksheet2, "Tabla2");
            
                    // Descargar el archivo XLSX
                    XLSX.writeFile(workbook2, "Reporte-Clientes.xlsx");
    }
</script>





</body>

</html>