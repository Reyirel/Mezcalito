        <?php
        $Nombre = $_POST["inputNombre"];
        $Telefono = $_POST["inputTelefono"];
        $Personas = $_POST["inputPersonas"];
        $Mesa1 = $_POST["OpcionesMesa1"];

        $Fecha = $_POST["inputDate"];
        $Hora = $_POST["inputTime"];

        $Face = $_POST["inputFACE"];
        $Insta = $_POST["inputINSTA"];

        //validamos datos del servidor

        $user = "root";
        $pass = "";
        $host = "localhost:3307";

        //conetamos al base datos
        $connection = mysqli_connect($host, $user, $pass, 'mezcalitodb');

        $query1 = "INSERT INTO cliente (nombre, telefono, user_Social, user_Social2) VALUES ('$Nombre', '$Telefono', '$Face', '$Insta')";

        $query2 = "INSERT INTO asignar (id_Ubicacion, mesas_ReservadasCliente) VALUES ('$Mesa1', '$Personas')";

        $query3 = "INSERT INTO reservacion (hora_Programada, fecha_Programada, no_Invitados, estado_Reservacion, id_Cliente, id_Asignar) 
        VALUES ('$Hora', '$Fecha', '$Personas', 'Pendiente', (SELECT id_Cliente FROM cliente WHERE nombre = '$Nombre' AND telefono = '$Telefono'), (SELECT id_Asignar FROM asignar WHERE id_Ubicacion = '$Mesa1'))";

        $query4 = "UPDATE asignar SET id_Reservacion = (SELECT id_Reservacion FROM reservacion WHERE id_Cliente = (SELECT id_Cliente FROM cliente WHERE nombre = '$Nombre' AND telefono = '$Telefono') AND id_Asignar = (SELECT id_Asignar FROM asignar WHERE id_Ubicacion = '$Mesa1')) WHERE id_Ubicacion = '$Mesa1'";

        $result1 = mysqli_query($connection, $query1) or die('Error al registrar.');
        $result2 = mysqli_query($connection, $query2) or die('Error al registrar.');
        $result3 = mysqli_query($connection, $query3) or die('Error al registrar.');
        $result4 = mysqli_query($connection, $query4) or die('Error al registrar.');

        mysqli_close($connection);

        ?>