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

  session_start();

  // Mostrar el valor obtenido

  $connection = mysqli_connect($servidor, $usuario, $contrasena, $database);
  // ! verifica que exista conexión con la base de datos
  if (!$connection) {
    die('Conexion fallida: ' . mysqli_connect_error());
  }
  /* echo '<script> console.log("estas conectado a mysql")</script>'; */
?>