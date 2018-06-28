<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  if (isset($_GET['rubro'])) $rubro_id = $_GET['rubro'];
  
  $conn = getConnection();
  if (isset($rubro_id)) {
    if ($rubro_id == 0) header('Location: index.php');
    $query = $conn->prepare("SELECT productos.*, rubros.nombre AS rubro FROM productos LEFT JOIN rubros ON rubros.id = productos.rubro_id WHERE productos.estado != 0 AND productos.rubro_id = ?;");
    $query->execute([$rubro_id]);
    $productos = $query->fetchAll();
  } else {
    $productos = $conn->query("SELECT productos.*, rubros.nombre AS rubro FROM productos LEFT JOIN rubros ON rubros.id = productos.rubro_id WHERE productos.estado != 0;")->fetchAll();
  }

  $rubros = $conn->query("SELECT * FROM rubros;")->fetchAll();

  define('PAGE_VIEW', 'productos_index.php');
  require('../../layout.php');
?>