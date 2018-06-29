<h2>Productos<a href="create.php" class="btn btn-primary btn-sm align-bottom ml-3">Crear producto</a></h2>
<hr/>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
  <div class="form-group">
    <div class="input-group">
      <div class="input-group-prepend">
        <p class="input-group-text">Rubros:</p>
      </div>
      <select name="rubro" class="form-control">
        <option value="0">Todos</option>
        <?php foreach($rubros as $rubro) { ?>
          <option value="<?php echo $rubro['id'] ?>" <?php if (isset($rubro_id) && $rubro_id == $rubro['id']) echo 'selected' ?>><?php echo $rubro['nombre'] ?></option>
        <?php } ?>
      </select>
      <div class="input-group-append">
        <button type="submit" class="btn btn-secondary">Filtrar</button>
      </div>
    </div>
  </div>
</form>
<table class="table">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Precio</th>
      <th>Stock</th>
      <th>Rubro</th>
      <th>Fecha Alta</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($productos as $producto) { ?>
      <tr>
        <td class="align-middle"><?php echo $producto['descripcion'] ?></td>
        <td class="align-middle">$<?php echo $producto['precio'] ?></td>
        <td class="align-middle"><?php echo $producto['stock'] ?></td>
        <td class="align-middle"><?php echo $producto['rubro'] ?></td>
        <td class="align-middle"><?php echo $producto['fecha_alta'] ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-sm btn-secondary" type="submit" form="<?php echo 'edit'.$producto['id'] ?>">Editar</button>
            <form action="edit.php" method="get" id="<?php echo 'edit'.$producto['id'] ?>">
              <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
            </form>
            <button class="btn btn-sm btn-danger" type="submit" form="<?php echo 'delete'.$producto['id'] ?>">Eliminar</button>
            <form action="delete.php" method="post" id="<?php echo 'delete'.$producto['id'] ?>">
              <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
            </form>
          </div>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>