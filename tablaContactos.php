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
                <button class="btn btn-primary mx-2" type="submit">Lista de contacto</button>
              </form>
            </li>
            <li>
            <a class="btn btn-primary mx-2" href="index.html">nuevo contacto</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <table class="table table-dark table-striped pt-2 mt-2">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Mensaje</th>
          <th scope="col">actions</th>
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
              echo "<td><a class='btn btn-danger me-3' href='eliminar_contacto.php?id=" . $contacto_data['tabla01_ID'] . "'>ELIMINAR</a><a class='btn btn-info' href='editar_contacto.php/" . $contacto_data['tabla01_ID'] . "'>EDITAR</a>";
              echo "</tr>";
            };

            mysqli_close($connection);
          ?>
          
      </tbody>
    </table>
  </div>
</body>

</html>
