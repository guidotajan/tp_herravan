<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  $conn = getConnection();
  $query = $conn->prepare("INSERT INTO rubros (nombre) VALUES (:nombre)");
  if (isset($_POST['nombre']) && $query->execute($_POST)) {
    header('Location: index.php');
  } else {
    $alert = "No se ha podido crear el rubro.";
    define('PAGE_VIEW', '_error.php');
    require('../../layout.php');
  }
?>