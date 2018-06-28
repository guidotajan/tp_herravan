<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if (isset($_POST['id'])) {
  $query = getConnection()->prepare("UPDATE productos SET estado = '0' WHERE id = :id");
  if ($query->execute(['id' => $_POST['id']])) {
    header('Location: index.php');
  } else {
    $alert = "No se ha podido eliminar el producto seleccionado.";
  }
} else {
  $alert = "<strong>Error 400</strong>: No se indicó el ID a eliminar.";
}

define('PAGE_VIEW', '_error.php');
require('../../layout.php');
?>