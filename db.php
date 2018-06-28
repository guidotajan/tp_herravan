<?php

require_once('config.php');

function getConnection() {
  try {
    $conn = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PWD);
    return $conn;
  } catch (PDOException $e) {
    echo 'Error: '.$e->getMessage().'<br/>';
    die();
  }
}

?>