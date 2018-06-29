<?php
if (isset($result)) {
  if ($result) { ?>
    <div class="alert alert-success">Se ha creado correctamente el cliente.</div>
<?php
  } else { ?>
    <div class="alert alert-danger">Ha ocurrido un error al crear el cliente.</div>
<?php
  }
}
?>
<h2>Crear Cliente</h2>
<hr>
<div class="row justify-content-center">
  <div class="col-lg-5">
    <form action="create.php" method="post" class="needs-validation" novalidate>
      <div class="form-group">
        <label>Nombre y Apellido</label>
        <input class="form-control" type="text" name="nombre_apellido" placeholder="Nombre y Apellido" required>
        <div class="invalid-feedback">Ingrese un nombre y apellido válido.</div>
      </div>
      <div class="form-group">
        <label>Fecha de Nacimiento</label>
        <input class="form-control" type="date" name="fecha_nacimiento" required>
        <div class="invalid-feedback">Ingrese una fecha de nacimiento.</div>
      </div>
      <div class="form-group">
        <label>Nro. de DNI</label>
        <input class="form-control" type="text" name="dni" placeholder="12123123" required>
        <div class="invalid-feed">Ingrese un numero de documento válido.</div>
      </div>
      <div class="form-group">
        <label>Domicilio</label>
        <textarea class="form-control" name="domicilio" rows="4" placeholder="Av. 3 de Abril 1522, Corrientes, Corrientes, Argentina" required></textarea>
        <div class="invalid-feedback">Ingrese un domicilio válido.</div>
      </div>
      <button type="submit" class="btn btn-block btn-primary">Crear</button>
    </form>
  </div>
</div>
<script src="../js/clientes_create.js"></script>