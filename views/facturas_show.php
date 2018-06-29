<h2>Factura #<?php echo $factura['id']; ?></h2>
<hr>
<p><strong>Cliente:</strong> <?php echo $factura['cliente']; ?></p>
<p><strong>Total:</strong> $<?php echo $factura['total']; ?></p>
<p><strong>Tipo de Factura:</strong> <?php echo $factura['tipo_factura']; ?></p>
<p><strong>Fecha:</strong> <?php echo $factura['fecha']; ?></p>
<br>
<h3>Detalles</h3>
<table class="table">
  <thead>
    <tr>
      <th>Descripción</th>
      <th>Cantidad</th>
      <th>Subtotal</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($detalles as $detalle) { ?>
      <tr>
        <td><?php echo $detalle['descripcion']; ?></td>
        <td><?php echo $detalle['cantidad']; ?></td>
        <td>$<?php echo $detalle['subtotal']; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>