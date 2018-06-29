<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if (isset($_POST['id'])) {
  $query = getConnection()->prepare("UPDATE clientes SET estado = 0 WHERE id = ?;");
  if ($query->execute([$_POST['id']])) {
    header('Location: index.php');
  } else {
    $alert = "No se ha podido eliminar el cliente.";
  }
} else {
  $alert = "Error 400: No se ha seleccionado el cliente a eliminar.";
}

define('PAGE_VIEW', '_error.php');
require('../../layout.php');
