<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if (isset($_GET['id'])) {
  $query = getConnection()->prepare("SELECT * FROM productos WHERE id = :id;");
  if ($query->execute(['id' => $_GET['id']])) {
    $producto = $query->fetch();
    $rubros = getConnection()->query("SELECT * FROM rubros;")->fetchAll();
    define('PAGE_VIEW', 'productos_edit.php');
    require('../../layout.php');
    die();
  } else {
    $alert = "No se ha podido encontrar el producto seleccionado.";
  }
}

if (isset($_POST['id'])) {
  $query = getConnection()->prepare("UPDATE productos SET descripcion = :descripcion, precio = :precio, stock = :stock, rubro_id = :rubro_id WHERE id = :id;");
  if ($query->execute($_POST)) {
    header('Location: index.php');
  } else {
    $alert = "Error al actualizar el producto.";
  }
}

$alert = "No se ha seleccionado un producto.";

define('PAGE_VIEW', '_error.php');
require('../../layout.php');
?>