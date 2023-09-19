<?php
  include('db_conn.php');

  if(isset($_GET["id"])){

    $id_contact = intval($_GET["id"]);
    
    //* realiza la consulta sql
    $sql_delete = "DELETE FROM tabla_01_contactos WHERE `tabla_01_contactos`.`tabla01_ID` = $id_contact";
    
    $resul_consulta = mysqli_query($connection, $sql_delete) ;  
    if(!$resul_consulta){
      die('fallo la consulta.');
    }
    mysqli_close($connection);
    
    $_SESSION['mensaje']= " el contacto con id: $id_contact fue eliminado.";
    $_SESSION['mensaje_color']= 'danger';
    header("Location: index.php");
  }
?>
