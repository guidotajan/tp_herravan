<h2>Rubros</h2>
<table class="table">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    <form action="create.php" method="POST">
      <tr>
        <td>
          <input type="text" class="form-control" placeholder="Nuevo rubro" name="nombre" required>
        </td>
        <td>
          <button type="submit" class="btn btn-primary">Crear</button>
        </td>
      </tr>
    </form>
    <?php foreach ($rubros as $rubro) { ?>
      <tr>
        <td>
          <form action="edit.php" method="POST" id="edit<?php echo $rubro['id'] ?>">
            <input type="hidden" name="id" value="<?php echo $rubro['id'] ?>">
            <input type="text" class="form-control" placeholder="<?php echo $rubro['nombre'] ?>" value="<?php echo $rubro['nombre'] ?>" name="nombre" required>
          </form>
          <form action="<?php echo $rubro['estado'] != 0 ? 'delete.php' : 'restore.php' ?>" method="post" id="delete<?php echo $rubro['id'] ?>">
            <input type="hidden" name="id" value="<?php echo $rubro['id'] ?>">
          </form>
        </td>
        <td>
          <button type="submit" class="btn btn-secondary" form="edit<?php echo $rubro['id'] ?>">Editar</button>
          <?php if ($rubro['estado'] != 0) { ?>
            <button type="submit" class="btn btn-danger" form="delete<?php echo $rubro['id'] ?>">Eliminar</button>
          <?php } else { ?>
            <button type="submit" class="btn btn-success" form="delete<?php echo $rubro['id'] ?>">Restaurar</button>
          <?php } ?> 
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>