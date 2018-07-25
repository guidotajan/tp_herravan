<?php
  require_once('../../db.php');
  require_once('../../auth.php');
  checkAuth([1]);

  $conn = getConnection();
  $rubros = $conn->query("SELECT * FROM rubros ORDER BY estado DESC, nombre ASC;")->fetchAll();

  define('PAGE_VIEW', 'rubros_index.php');
  require('../../layout.php');
?>