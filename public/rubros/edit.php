<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  $conn = getConnection();
  $query = $conn->prepare("UPDATE rubros SET nombre = :nombre WHERE id = :id;");
  if (isset($_POST['id'], $_POST['nombre']) && $query->execute($_POST)) {
    header('Location: index.php');
  } else {
    $alert = "No se ha podido editar el rubro.";
    define('PAGE_VIEW', '_error.php');
    require('../../layout.php');
  }
?>