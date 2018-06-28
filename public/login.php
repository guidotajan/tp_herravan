<?php
  require_once('../auth.php');
  
  if (isset($_POST['usuario'], $_POST['password'])) {
    $result = logIn($_POST['usuario'], $_POST['password']);
  }

  if (isset($_SESSION['usuario'])) {
    header('Location: index.php');
  }

  define('PAGE_VIEW', '_login.php');
  require('../layout.php');
?>