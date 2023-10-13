<?php
include('db_conn.php');
if(isset($_POST['save_contact'])){
  // * guardas los datos recibidos del formulario del front en variables
  $nombre = $_POST["nombre"];
  $email = $_POST["email"];
  $mensaje = $_POST['mensaje'];

// * crea una consulta para insertar un dato en la tabla contactos
  $sql_insert = " INSERT INTO tabla_01_contactos(tabla01_nombre, tabla01_email, tabla01_mensaje) VALUES ('$nombre', '$email', '$mensaje')";

  // ! envia la consulta a la base de datos
  $result_consulta = mysqli_query($connection, $sql_insert);
  if(!$result_consulta){
    die('fallo la conexión');
  }
  mysqli_close($connection);

  $_SESSION['mensaje']= 'contacto guardado.';
  $_SESSION['mensaje_color']= 'success';
  header("Location: index.php");
}
?>