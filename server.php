<?php
  // Todo: vatiable con conexion a la base de datos
  $connection = mysqli_connect('localhost','root','','db_web');
  // ! verifica que exista conexión con la base de datos
  if(!$connection){
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
  if(mysqli_query($connection, $sql_insert)){
    echo 'datos guardados';
  }else{
    echo 'error en la insercion: ' . mysqli_error($connection);
  }

?>