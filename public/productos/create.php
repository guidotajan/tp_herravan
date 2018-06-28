<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  if (isset($_POST['descripcion'], $_POST['precio'], $_POST['stock'])) {
    $query = getConnection()->prepare("INSERT INTO productos (descripcion, precio, stock, fecha_alta, rubro_id) VALUES (:descripcion, :precio, :stock, CURDATE(), :rubroid)");
    $result = $query->execute([
      'descripcion' => $_POST['descripcion'],
      'precio' => $_POST['precio'],
      'stock' => $_POST['stock'],
      'rubroid' => $_POST['rubro_id']
    ]);
  }

  $query = getConnection()->prepare("SELECT * FROM rubros");
  $query->execute();
  $rubros = $query->fetchAll();

  define('PAGE_VIEW', 'productos_create.php');
  require('../../layout.php');
?>