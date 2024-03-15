<?php
// Datos de conexión a la base de datos
$servername = "localhost:3307"; // Nombre del servidor
$username = "root"; // Nombre de usuario
$password = ""; // Contraseña del usuario
$dbname = "mezcalitodb"; // Nombre de la base de datos

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener los valores del formulario
$nombre = $_POST['nombre2'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram2'];
$comentario = $_POST['comentario2'];

// Insertar datos en la tabla "cliente"
$sql_cliente = "INSERT INTO cliente (nombre, user_Social, user_Social2)
                VALUES ('$nombre', '$facebook', '$instagram')";

if ($conn->query($sql_cliente) === TRUE) {
    // Obtener el id del cliente insertado
    $id_cliente = $conn->insert_id;

    // Insertar datos en la tabla "sugerencias"
    $sql_sugerencias = "INSERT INTO sugerencias (id_Cliente, comentario)
                        VALUES ('$id_cliente', '$comentario')";
    if ($conn->query($sql_sugerencias) === TRUE) {
        echo "Comentario publicado correctamente";
    } else {
        echo "Error al publicar el comentario: " . $conn->error;
    }
} else {
    echo "Error al insertar datos en la tabla 'cliente': " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
