<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if (isset($_GET['fecha_i'], $_GET['fecha_f'])) {
  $limites = [$_GET['fecha_i'], $_GET['fecha_f']];
}

if (!isset($limites)) {
  $clientes = getConnection()->query("SELECT * FROM clientes WHERE estado != 0 ORDER BY nombre_apellido;")->fetchAll();
} else {
  $query = getConnection()->prepare("SELECT * FROM clientes WHERE estado != 0 AND fecha_nacimiento BETWEEN ? AND ? ORDER BY nombre_apellido;");
  $query->execute($limites);
  $clientes = $query->fetchAll();
}

define('PAGE_VIEW', 'cliente_index.php');
require('../../layout.php');