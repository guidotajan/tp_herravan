<h2>Facturas</h2>
<table class="table">
  <thead>
    <tr>
      <th>Num. Factura</th>
      <th>Fecha</th>
      <th>Cliente</th>
      <th>Total</th>
      <th>Tipo de Factura</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($facturas as $factura) { ?>
      <tr>
        <td class="align-middle">#<?php echo $factura['id'] ?></td>
        <td class="align-middle"><?php echo $factura['fecha'] ?></td>
        <td class="align-middle"><?php echo $factura['cliente'] ?></td>
        <td class="align-middle">$<?php echo $factura['total'] ?></td>
        <td class="align-middle"><?php echo $factura['tipo_factura'] ?></td>
        <td>
          <form action="show.php" method="get">
            <input type="hidden" name="id" value="<?php echo $factura['id']; ?>">
            <button type="submit" class="btn btn-sm btn-secondary">Ver detalles</button>
          </form>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>