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


  $sql_data = "SELECT * FROM `tabla_01_contactos`;";

  $resultado_consulta= mysqli_query($connection,$sql_data)or die('fallo la consulta.');

  
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> tabla Contactos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container">
    <table class="table table-dark table-striped pt-2 mt-2">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Mensaje</th>
        </tr>
      </thead>
      <tbody>
          <?php
          
            while( $contacto_data = mysqli_fetch_array($resultado_consulta)){
              echo "<tr>";
              echo "<th scope='row'>" . $contacto_data['tabla01_ID'] . "</th>";
              echo "<td>" . $contacto_data['tabla01_nombre'] . "</td>";
              echo"<td>". $contacto_data['tabla01_email'] ."</td>";
              echo "<td>". $contacto_data['tabla01_mensaje'] ."</td>";
              echo "</tr>";
            };

            mysqli_close($connection);
          ?>
      </tbody>
    </table>
  </div>
</body>

</html>
