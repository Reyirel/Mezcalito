<?php
  include 'config/database.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <section class="h-100 gradient-form" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-11">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-4 mx-md-4">
      
                      <div class="text-center">
                      <a class="navbar-brand" id="logo" href="#"> Mezcalito</a>
                        <?php
                          include "login.php";
                        ?>
                      </div>

                      <form action="" method="post">

                          <p>Inicia sesión para acceder a la Administración</p>
        

                          <div class="form-outline mb-4">
                            <input type="text" id="usuario"  name="usuario" class="form-control"
                              placeholder="Digita tus credenciales" />
                            <label class="form-label" for="usuario">Nombre de Usuario</label>
                          </div>
        
                          <div class="form-outline mb-4">
                            <input type="password" id="password" name="pass"  class="form-control" />
                            <label class="form-label" for="pass">Contraseña</label>
                          </div>
        
                          <div class="d-grid gap-2 text-center pt-1 mb-5 pb-1">
                            <input type="submit" name="btningresar" id="btningresar"class="btn btn-primary btn-block gradient-custom-2" value="Iniciar Sesión">
                          </div>

                        </form>
                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center" style="background-color: #1d1d25;">
                    <div class="text-white text-center px-3 py-4 p-md-5 mx-md-4">
                        <img src="assets/imagenes/agave.png"
                        style="width:185px;" alt="logo"><br><br>

                      <p class="small mb-0">En esta página web, podrás acceder al menú de administración donde podrás
                         hacer y modificar las reservas, conocer la asignación de mesas y moderar las sugerencias del Bar. </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
     
</body>
</html>