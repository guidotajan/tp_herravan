<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  $conn = getConnection();
  $query = $conn->prepare("UPDATE rubros SET estado = 1 WHERE id = :id;");
  if (isset($_POST['id']) && $query->execute($_POST)) {
    header('Location: index.php');
  } else {
    $alert = "No se ha podido restaurar el rubro.";
    define('PAGE_VIEW', '_error.php');
    require('../../layout.php');
  }
?>