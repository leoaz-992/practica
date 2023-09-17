<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>datos recibidos</title>
</head>

<body class="container py-2">

<?php

// ! codigo para poder usar dotenv y variables de entorno
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
if (!$connection) {
  die('Conexion fallida: ' . mysqli_connect_error());
}
echo '<script> console.log("estas conectado a mysql")</script>';

// * guardas los datos recibidos del formulario del front en variables


$nombre = $_POST["nombre"];
$email = $_POST["email"];
$mensaje = $_POST['mensaje'];


// * crea una consulta para insertar un dato en la tabla contactos
$sql_insert = " INSERT INTO tabla_01_contactos(tabla01_nombre, tabla01_email, tabla01_mensaje) VALUES ('$nombre', '$email', '$mensaje')";

// ! envia la consulta a la base de datos
$resultado_consulta = mysqli_query($connection, $sql_insert);

mysqli_close($connection);

?>
<!DOCTYPE html>
<html lang="es-Ar">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <title>eliminar contacto</title>
</head>

<body>
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
                <button class="btn btn-primary" type="submit">Lista de contacto</button>
              </form>
            </li>
            <li>
            <a class="btn btn-primary mx-2" href="index.html">nuevo contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
  <?php
  if ($resultado_consulta) {
    echo "<h1>Contacto creado!</h1>";
    echo "<script>console.log('datos guardados')</script>";
  } else {
    echo '<h1 class="text-danger">No se pudo guardar los datos.</h1>';
    echo '<script>console.log(error en la insercion: ' . mysqli_error($connection) . ')</script>';
  } ?>

</body>

</html>