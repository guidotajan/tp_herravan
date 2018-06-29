<h2>Clientes<a href="create.php" class="btn btn-primary btn-sm align-bottom ml-3">Crear cliente</a></h2>
<hr/>
<form action="index.php" method="get">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Filtrar por fecha</span>
    </div>
    <input class="form-control" type="date" name="fecha_i" value="<?php if (isset($limites)) echo $limites[0] ?>" required>
    <input class="form-control" type="date" name="fecha_f" value="<?php if (isset($limites)) echo $limites[1] ?>" required>
    <div class="input-group-append">
      <button class="btn btn-secondary" type="submit">Filtrar</button>
      <?php if (isset($limites)) { ?><a class="btn btn-secondary" href="index.php">Reiniciar</a><?php } ?>
    </div>
  </div>
</form>
<table class="table">
  <thead>
    <tr>
      <th>Nombre y Apellido</th>
      <th>Fecha Nacimiento</th>
      <th>DNI</th>
      <th>Domicilio</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($clientes as $cliente) { ?>
      <tr>
        <td><?php echo $cliente['nombre_apellido'] ?></td>
        <td><?php echo $cliente['fecha_nacimiento'] ?></td>
        <td><?php echo $cliente['dni'] ?></td>
        <td><?php echo $cliente['domicilio'] ?></td>
        <td>
          <div class="btn-group">
            <button type="submit" form="edit<?php echo $cliente['id'] ?>" class="btn btn-secondary btn-sm">Editar</button>
            <button type="submit" form="delete<?php echo $cliente['id'] ?>" class="btn btn-danger btn-sm">Eliminar</button>
          </div>
          <form action="edit.php" method="get" id="edit<?php echo $cliente['id'] ?>">
            <input type="hidden" name="id" value="<?php echo $cliente['id'] ?>">
          </form>
          <form action="delete.php" method="post" id="delete<?php echo $cliente['id'] ?>">
            <input type="hidden" name="id" value="<?php echo $cliente['id'] ?>">
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>