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
  if (mysqli_query($connection, $sql_insert)) {
    echo "<script>console.log('datos guardados')</script>";
    echo '<a class="btn btn-primary my-2" href="http://localhost/practicas/practica/tablaContactos.php">mostrar lista contacto</a>';
  } else {
    echo 'error en la insercion: ' . mysqli_error($connection);
  }

  mysqli_close($connection);

  ?>
</body>

</html>