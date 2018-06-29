<?php
if (isset($result)) {
  if ($result) { ?>
    <div class="alert alert-success">Se ha editar correctamente el cliente.</div>
<?php
  } else { ?>
    <div class="alert alert-danger">Ha ocurrido un error al editar el cliente.</div>
<?php
  }
}
?>
<h2>Editar Cliente</h2>
<hr>
<div class="row justify-content-center">
  <div class="col-lg-5">
    <form action="edit.php" method="post" class="needs-validation" id="edit" novalidate>
      <div class="form-group">
        <label>Nombre y Apellido</label>
        <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" value="<?php echo $cliente['nombre_apellido']; ?>" required>
        <div class="invalid-feedback">Ingrese un nombre y apellido válido.</div>
      </div>
      <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="fecha_nacimiento" value="<?php echo $cliente['fecha_nacimiento']; ?>" required>
        <div class="invalid-feedback">Ingrese una fecha de nacimiento.</div>
      </div>
      <div class="form-group">
        <label>Nro. de DNI</label>
        <input class="form-control" type="text" name="dni" placeholder="12123123" value="<?php echo $cliente['dni']; ?>" required>
        <div class="invalid-feed">Ingrese un numero de documento válido.</div>
      </div>
      <div class="form-group">
        <label>Domicilio</label>
        <textarea class="form-control" name="domicilio" rows="4" placeholder="Av. 3 de Abril 1522, Corrientes, Corrientes, Argentina" required><?php echo $cliente['domicilio'] ?></textarea>
        <div class="invalid-feedback">Ingrese un domicilio válido.</div>
      </div>
      <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-block btn-primary" form="edit">Editar</button>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-block btn-danger" form="delete">Eliminar</button>
        </div>
      </div>
    </form>
    <form action="delete.php" method="post" id="delete">
      <input type="hidden" name="id" value="<?php echo $cliente['id']; ?>">
    </form>
  </div>
</div>
<script src="../js/clientes_create.js"></script>