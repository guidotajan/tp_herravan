<?php
if (isset($result)) {
  if ($result) { ?>
    <div class="alert alert-success mb-2">Se ha editado el producto correctamente.</div>
<?php
  } else { ?>
    <div class="alert alert-danger mb-2">No se ha podido editar el producto.</div>
<?php
  }
}
?>
<h2 class="text-center" >Editar Producto</h2>
<hr/>
<div class="row justify-content-center">
  <div class="col-lg-5">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" class="needs-validation" novalidate>
      <div class="form-group">
        <label>Descripción</label>
        <input type="text" name="descripcion" class="form-control" placeholder="Nombre del producto" id="i-descripcion" value ="<?php echo $producto['descripcion'] ?>" required>
        <div class="invalid-feedback">Ingresar un nombre de producto válido.</div>
      </div>
      <div class="form-group">
        <label>Precio</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">$</span>
          </div>
          <input type="number" name="precio" class="form-control" placeholder="9.99" value ="<?php echo $producto['precio'] ?>" required>
          <div class="invalid-feedback">Ingresar un precio válido.</div>
        </div>
      </div>
      <div class="form-group">
        <label>Stock Inicial</label>
        <input type="number" name="stock" class="form-control" value ="<?php echo $producto['stock'] ?>" required>
      </div>
      <div class="form-group">
        <label>Stock Inicial</label>
        <select name="rubro_id" class="form-control">
          <?php foreach($rubros as $rubro) { ?>
            <option value="<?php echo $rubro['id'] ?>" <?php if ($rubro['id'] == $producto['rubro_id']) echo 'selected' ?> ><?php echo $rubro['nombre'] ?></option>
          <?php } ?>
        </select>
      </div>
      <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
      <div class="row">
        <div class="col">
          <button class="btn btn-primary btn-block" type="submit">Editar</button>
        </div>
        <div class="col">
          <button class="btn btn-danger btn-block" type="submit" form="delete">Eliminar</button>
        </div>
      </div>
    </form>
    <form action="delete.php" method="post" id="delete">
      <input type="hidden" name="id" value="<?php echo $producto['id'] ?>">
    </form>
  </div>
</div>
<script src="../js/productos_create.js"></script>