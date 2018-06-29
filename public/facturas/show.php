<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if (!isset($_GET['id'])) {
  $alert = "Error 400: No se ha seleccionado una factura a mostrar.";
  define('PAGE_VIEW', '_error.php');
  require('../../layout.php');
  die();
}

$query = getConnection()->prepare("SELECT facturas.*, clientes.nombre_apellido AS cliente, (SELECT SUM(detalles.subtotal) FROM detalles WHERE detalles.factura_id = facturas.id) AS total FROM facturas JOIN clientes ON clientes.id = facturas.cliente_id WHERE facturas.id = ?;");
if (!$query->execute([$_GET['id']])) {
  $alert = "Error 404: No se ha encontrado la factura solicitada.";
  define('PAGE_VIEW', '_error.php');
  require('../../layout.php');
  die();
}

$factura = $query->fetch();

$query = getConnection()->prepare("SELECT detalles.*, productos.descripcion FROM detalles JOIN productos ON productos.id = detalles.producto_id WHERE detalles.factura_id = ?;");
if (!$query->execute([$factura['id']])) {
  $alert = "Error 404: No se ha encontrado los detalles de la factura solicitada.";
  define('PAGE_VIEW', '_error.php');
  require('../../layout.php');
  die();
}

$detalles = $query->fetchAll();

define('PAGE_VIEW', 'facturas_show.php');
require('../../layout.php');
