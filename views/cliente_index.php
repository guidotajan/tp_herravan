<h2>Clientes</h2>
<hr/>
<form action="index.php" method="get">
  <div class="input-group mb-3">
    <div class="input-group-prepend">
      <span class="input-group-text">Filtrar por fecha</span>
    </div>
    <input class="form-control" type="date" name="fecha_i" required>
    <input class="form-control" type="date" name="fecha_f" required>
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
      </tr>
    <?php } ?>
  </tbody>
</table>