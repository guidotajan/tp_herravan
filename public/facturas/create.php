<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $result = true;
  $conn = getConnection();
  $query = $conn->prepare("INSERT INTO facturas (fecha, tipo_factura, cliente_id) VALUES (CURDATE(), :tipo_factura, :cliente_id);");
  if (!$query->execute([ 'tipo_factura' => $_POST['tipo_factura'], 'cliente_id' => $_POST['cliente_id'] ])) {
    die();
  }
  $factura_id = $conn->lastInsertId();
  $detalles = $_POST['detalles'];
  foreach ($detalles as $detalle) {
    $query = $conn->prepare("INSERT INTO detalles (cantidad, subtotal, producto_id, factura_id) VALUES (:cantidad, :subtotal, :producto_id, :factura_id);");
    if (!$query->execute([ 'cantidad' => $detalle['cantidad'], 'subtotal' => $detalle['subtotal'], 'producto_id' => $detalle['producto_id'], 'factura_id' => $factura_id ])) {
      $result = false;
    }
  }
}

$productos = getConnection()->query("SELECT * FROM productos WHERE estado != 0;")->fetchAll();
$clientes = getConnection()->query("SELECT * FROM clientes WHERE estado != 0;")->fetchAll();

define('PAGE_VIEW', 'facturas_create.php');
require('../../layout.php');
