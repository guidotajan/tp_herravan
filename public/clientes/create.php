<?php
require_once('../../db.php');
require_once('../../auth.php');
checkAuth([1]);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $query = getConnection()->prepare("INSERT INTO clientes (nombre_apellido, fecha_nacimiento, dni, domicilio) VALUES (:nombre_apellido, :fecha_nacimiento, :dni, :domicilio);");
  $result = $query->execute($_POST);
}

define('PAGE_VIEW', 'cliente_create.php');
require('../../layout.php');
?>