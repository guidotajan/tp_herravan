<?php
require_once('../../db.php');
require_once('../../auth.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $query = getConnection()->prepare("UPDATE clientes SET nombre_apellido = :nombre_apellido, fecha_nacimiento = :fecha_nacimiento, dni = :dni, domicilio = :domicilio WHERE id = :id;");
  $result = $query->execute($_POST);
  if ($result) {
    header('Location: index.php');
  } else {
    $id = $_POST['id'];
  }
}

if (isset($_GET['id'])) $id = $_GET['id'];
if (!isset($id)) {
  define('PAGE_VIEW', '_error.php');
  $alert = "Error 400: No se ha definido el cliente a editar.";
  require('../../layout.php');
  die();
}

$query = getConnection()->prepare("SELECT * FROM clientes WHERE id = ?;");
if ($query->execute([$id])) {
  $cliente = $query->fetch();
} else {
  define('PAGE_VIEW', '_error.php');
  $alert = "Error 404: No se ha encontrado el cliente a editar.";
  require('../../layout.php');
  die();
}

define('PAGE_VIEW', 'cliente_edit.php');
require('../../layout.php');
