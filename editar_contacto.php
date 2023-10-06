<?php
  //! codigo para poder usar dotenv y variables de entorno
  require __DIR__ . '/vendor/autoload.php';
  $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
  $dotenv->load();
  
  // Todo: vatiable con conexion a la base de datos
  $usuario = $_ENV['DB_USERNAME'];
  $contrasena = $_ENV['DB_PASSWORD'];
  $servidor = $_ENV['DB_HOST'];
  $database = $_ENV['DB_DATABASE'];
  

// Mostrar el valor obtenido

  $connection = mysqli_connect($servidor, $usuario, $contrasena, $database);
  // ! verifica que exista conexión con la base de datos
  if(!$connection){
    die('Conexion fallida: ' . mysqli_connect_error());
  }
  echo '<script> console.log("estas conectado a mysql")</script>';

  // * obtiene el valor del id y lo transforma e un número
$id_contact = intval($_GET["id"]);

//* realiza la consulta sql
$sql_data="SELECT * FROM `tabla_01_contactos` WHERE `tabla01_ID`=". $id_contact;

$resultado_consulta= mysqli_query($connection,$sql_data)or die('fallo la consulta.');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>formulario editar contacto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body><!-- -->
  <div class="container">
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">app contactos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <form action="tablaContactos.php" method="get">
                <button class="btn btn-primary ms-4" type="submit">Lista de contacto</button>
              </form>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <form class="" action=".php" method="post">
      <input class="form-control my-2" type="text" name="nombre" id="nombre" placeholder="ingrese su nombre">
      <input class="form-control my-2" type="email" name="email" id="email" placeholder="ingrese su email">
      <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="4"></textarea>
      <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
        <input class="btn btn-primary" type="submit" value="enviar Datos">
      </div>
    </form>
  </div>
</body>
</html>