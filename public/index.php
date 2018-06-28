<?php
  require_once('../auth.php');
  checkAuth([1]);

  define('PAGE_VIEW', '_index.php');
  require('../layout.php');
?>