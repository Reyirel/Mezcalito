<?php
session_start();
if(!empty($_POST["btningresar"])){
  if(!empty($_POST["usuario"]) and !empty($_POST["pass"])){

    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];
    $consultaPASS= $conn -> query("SELECT * FROM administrador WHERE usuario='$usuario' AND pass='$pass'");
    if($datos = $consultaPASS->fetch_object()){
      $_SESSION["id_Admin"]=$datos->id_Admin;
      $_SESSION["usuario"]=$datos->usuario;
      $_SESSION["pass"]=$datos->pass;
      header("location: index.php");
    }
  }else{

    echo "Campos vacios";
  }

}

?>