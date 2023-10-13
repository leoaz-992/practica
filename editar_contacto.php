<?php include("includes/head.php");
include('db_conn.php');


if(isset($_POST['update_contact'])){
  $id = $_GET['id'];
  $nombre = $_POST['nombre'];
  $email = $_POST['email'];
  $description = $_POST['mensaje'];

  $update_query= "UPDATE tabla_01_contactos SET tabla01_nombre ='$nombre',tabla01_email='$email',tabla01_mensaje='$description' WHERE `tabla01_ID`= $id";
  $resul_consulta = mysqli_query($connection, $update_query);
  if (!$resul_consulta) {
    die('fallo la consulta.');
  }
  mysqli_close($connection);

  $_SESSION['mensaje']= "contacto <strong>$email</strong> editado.";
  $_SESSION['mensaje_color']= 'info';
  header("Location: index.php");
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql_query = "SELECT * FROM tabla_01_contactos WHERE `tabla_01_contactos`.`tabla01_ID` = $id";
  $resul_consulta = mysqli_query($connection, $sql_query);
  if (!$resul_consulta) {
    die('fallo la consulta.');
  }
  if (mysqli_num_rows($resul_consulta) == 1) {
    $row = mysqli_fetch_array($resul_consulta);
    $nombre = $row['tabla01_nombre'];
    $email = $row['tabla01_email'];
    $description = $row['tabla01_mensaje'];
  }
}

?>
<?php include('includes/nav.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-6 mx-auto">
      <div class="card">
        <div class="card-header text-center">
          Editar Contacto: <strong><?= $email ?></strong>
        </div>
        <form class="card-body" action="editar_contacto.php?id=<?=$id?>" method="post">
          <input class="form-control my-2" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="ingrese su nombre" autofocus>
          <input class="form-control my-2" type="email" name="email" id="email" value="<?= $email ?>" placeholder="ingrese su email">
          <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="3"><?= $description ?></textarea>
          <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
            <input class="btn btn-primary" name="update_contact" type="submit" value="Editar Datos">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include('includes/footer.php'); ?>
