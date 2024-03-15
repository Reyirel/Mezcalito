<?php
session_start();
if (empty($_SESSION["id_Admin"])){
    header("location: log.php");
} 
?>

<?php


require 'config/database.php';

$sqlComen= "SELECT sugerencias.id_Sugerencias, cliente.nombre, cliente.user_Social, cliente.user_Social2, sugerencias.comentario
FROM sugerencias
JOIN cliente ON sugerencias.id_Cliente = cliente.id_Cliente";
$Comen= $conn->query($sqlComen);

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
                            <a class="nav-link active" aria-current="page" href="index.php">Reservaciones</a>
                            <a class="nav-link" href="index_mesas.php">Mesas</a>
                            <a class="nav-link" href="#">Sugerencias</a>
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

    <div class="container py-3" id="conSugerencias">


            <div class="accordion" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                <button class="accordion-button text-light bg-dark" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Sugenrencias de los Clientes
                </button>
                </h2>
                <div id="panelsStayOpen-collapseOne " class="accordion-collapse collapse show">
                <div class="accordion-body">
                    <table class="table table-sm table-striped table-hover mt-4 table-light" id="tablaSugerencias">
                                <thead class="table-dark ">                             
                                    <tr>                                 
                                        <th>#</th>
                                        <th>Nombre</th>
                                        <th>Facebook</th>
                                        <th>Instagram</th>
                                        <th>Sugerencias</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($row = $Comen->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $row['id_Sugerencias']; ?></td>
                                            <td><?= $row['nombre']; ?></td>                                       
                                            <td><?= $row['user_Social']; ?></td>
                                            <td><?= $row['user_Social2']; ?></td>
                                            <td><?= $row['comentario']; ?></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal_S" data-bs-id="<?= $row['id_Sugerencias']; ?>"><i class="fa-solid fa-pen-to-square"></i>Borrar</a>
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
            </div>
    </div>
    
    <?php include 'eliminaModal_S.php'; ?>

    <script>

        let eliminaModal_S = document.getElementById('eliminaModal_S')


        eliminaModal_S.addEventListener('shown.bs.modal', event => {
            let button = event.relatedTarget
            let id_Sugerencias = button.getAttribute('data-bs-id')

            eliminaModal_S.querySelector('.modal-footer #id_Sugerencias').value =id_Sugerencias


        })

    </script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.js"></script>
    <script>

    var table = new DataTable('#tablaSugerencias', {
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/es-MX.json',
        },
    });

    </script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.15.6/xlsx.full.min.js"></script>
<script>
        function exportToXLSX() {
        // Obtener la tabla
        var table = document.getElementById("tablaSugerencias");

        // Crear un objeto de libro de trabajo de Excel
        var workbook = XLSX.utils.book_new();

        // Crear una hoja de trabajo de Excel y agregar la tabla
        var worksheet = XLSX.utils.table_to_sheet(table);
        XLSX.utils.book_append_sheet(workbook, worksheet, "Tabla");

        // Descargar el archivo XLSX
        XLSX.writeFile(workbook, "Reporte.xlsx");
        }
</script>


</body>

</html>