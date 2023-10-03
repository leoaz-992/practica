<?php
include('../db_conn.php');

$username=$_POST['username'];
$password=$_POST['password'];
// Consulta la base de datos para verificar las credenciales
$sql = "SELECT * FROM usuarios WHERE usuario = '$username' AND password = '$password'";
$result = mysqli_query($connection, $sql);
  if(!$result){
    die('fallo la conexión');
  }
if ($result->num_rows > 0) {
    echo "success"; // Inicio de sesión exitoso
} else {
    echo "error"; // Usuario o contraseña incorrectos
}
mysqli_close($connection);
?>