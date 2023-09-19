<?php include("includes/head.php");
  include('db_conn.php');
?>
<?php include('includes/nav.php'); ?>
<div class="row">
  <div class="col-md-4 mt-2">
    <?php if(isset($_SESSION['mensaje'])){ ?>
      <div class="alert alert-<?= $_SESSION['mensaje_color'];?> alert-dismissible fade show" role="alert">
      <?= $_SESSION['mensaje']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php session_unset(); } ?>
    <div class="card card-body mt-2">
      <form action="save_contact.php" method="post">
        <input class="form-control my-2" type="text" name="nombre" id="nombre" placeholder="ingrese su nombre" autofocus>
        <input class="form-control my-2" type="email" name="email" id="email" placeholder="ingrese su email">
        <textarea class="form-control" name="mensaje" id="mensaje" cols="30" rows="4"></textarea>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end my-2">
          <input class="btn btn-primary" name="save_contact" type="submit" value="enviar Datos">
        </div>
      </form>
    </div>
  </div>
  <div class="col-md-8">
    <table class="table table-dark table-striped pt-2 mt-2">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Correo</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql_data = "SELECT * FROM `tabla_01_contactos`;";

        $resultado_consulta = mysqli_query($connection, $sql_data) or die('fallo la consulta.');

        while ($contacto_data = mysqli_fetch_array($resultado_consulta)) { ?>
          <tr>
            <th scope='row'><?php echo $contacto_data['tabla01_ID']?></th>
            <td><?php echo $contacto_data['tabla01_nombre']?></td>
            <td><?php echo $contacto_data['tabla01_email']?></td>
            <td>
              <a class='btn btn-info btn-sm me-3' href="editar_contacto.php?id=<?=$contacto_data['tabla01_ID']?>">EDITAR</a>
              <a class='btn btn-danger btn-sm ' href="eliminar_contacto.php?id=<?=$contacto_data['tabla01_ID']?>">ELIMINAR</a>
            </td>
          </tr>
          
        <?php };

        mysqli_close($connection);
        ?>

      </tbody>
    </table>
  </div>
</div>

<?php include('includes/footer.php'); ?>