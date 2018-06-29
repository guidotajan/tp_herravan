<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = true;
  $conn = getConnection();
  $detalles = $_POST['detalles'];

  // Verifica que haya stock para todos los productos solicitados.
  foreach ($detalles as $detalle) {
    $query = $conn->prepare("SELECT descripcion, stock FROM productos WHERE id = ?");
    $query->execute([$detalle['producto_id']]);
    $producto = $query->fetch();
    if ($producto['stock'] - $detalle['cantidad'] < 0) {
      // Si no hay stock suficiente se notifica que no se puede realizar la factura.
      $result = false;
      $error = "El producto '".$producto['descripcion']."' no tiene stock suficiente para realizar la facturación.";
      break;
    }
  }
  // Si no hay errores crear la factura.
  if ($result) {
    $query = $conn->prepare("INSERT INTO facturas (fecha, tipo_factura, cliente_id) VALUES (CURDATE(), :tipo_factura, :cliente_id);");
    if (!$query->execute([ 'tipo_factura' => $_POST['tipo_factura'], 'cliente_id' => $_POST['cliente_id'] ])) {
      $result = false;
      $error = "No se ha podido crear la factura.";
    } else {
      $factura_id = $conn->lastInsertId();
    }
  }
  // Si no hubo errores en la creación de la factura, crear los detalles.
  if (isset($factura_id)) {
    foreach ($detalles as $detalle) {
      // Actualizar el stock por cada detalle.
      $query = $conn->prepare("UPDATE productos SET stock = ((SELECT stock FROM (SELECT * FROM productos) AS p2 WHERE p2.id = productos.id) - :cantidad) WHERE id = :id;");
      $query->execute([ 'cantidad' => $detalle['cantidad'], 'id' => $detalle['producto_id'] ]);
      // Crear el registro de detalle.
      $query = $conn->prepare("INSERT INTO detalles (cantidad, subtotal, producto_id, factura_id) VALUES (:cantidad, :subtotal, :producto_id, :factura_id);");
      $inputs = [
        'cantidad' => $detalle['cantidad'],
        'subtotal' => $detalle['subtotal'],
        'producto_id' => $detalle['producto_id'],
        'factura_id' => $factura_id
      ];
      if (!$query->execute($inputs)) {
        // En caso de error, notificar.
        $result = false;
        $error = "No se ha podido crear un detalle de la factura.";
      }
    }
  }
}

$productos = getConnection()->query("SELECT * FROM productos WHERE estado != 0 AND stock > 0 ORDER BY descripcion;")->fetchAll();
$clientes = getConnection()->query("SELECT * FROM clientes WHERE estado != 0 ORDER BY nombre_apellido;")->fetchAll();

define('PAGE_VIEW', 'facturas_create.php');
require('../../layout.php');
