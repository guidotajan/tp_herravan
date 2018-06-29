<?php
if (isset($result)) {
  if ($result) { ?>
    <div class="alert alert-success">Se ha creado correctamente la factura.</div>
<?php
  } else { ?>
    <div class="alert alert-danger">Ha ocurrido un error al crear la factura.</div>
<?php
  }
}
?>
<script src="https://unpkg.com/react@16/umd/react.development.js"></script>
<script src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
<!-- Sacar en producción -->
<script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
<script>
  const productos = <?php echo json_encode($productos); ?>;
</script>
<h2>Facturar</h2>
<hr>
<form action="create.php" method="post" id="finalizar">
  <div class="row">
    <div class="col-lg">
      <div class="form-group">
        <label>Cliente</label>
        <select class="form-control" name="cliente_id">
          <?php foreach ($clientes as $cliente) { ?>
            <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nombre_apellido']; ?></option>
          <?php } ?>
        </select>
      </div>
    </div>
    <div class="col-lg">
      <div class="form-group">
        <label>Tipo de Factura</label>
        <select class="form-control" name="tipo_factura">
          <option value="B">B</option>
          <option value="A">A</option>
          <option value="C">C</option>
        </select>
      </div>
    </div>
  </div>
  <h3>Detalles</h3>
  <div id="root"></div>
</form>
<form id="addDetalles">
  <div class="input-group">
    <select id="productoId" class="form-control" required>
      <?php foreach ($productos as $producto) { ?>
        <option value="<?php echo $producto['id'] ?>"><?php echo $producto['descripcion'].' - $'.$producto['precio'] ?></option>
      <?php } ?>
    </select>
    <input type="number" id="cantidad" class="form-control" placeholder="Cantidad" required>
    <div class="input-group-append">
      <button type="submit" class="btn btn-primary">Agregar</button>
    </div>
  </div>
</form>
<hr>
<button class="btn btn-block btn-primary" type="submit" form="finalizar">Finalizar</button>
<script src="../js/facturas_create.js" type="text/babel"></script>
<div class="modal fade" tabindex="-1" role="dialog" id="errorDetalles">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <p>Ingrese al menos un detalle para continuar</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>