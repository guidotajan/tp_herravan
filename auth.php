<?php
require_once('db.php');
session_start();

function checkAuth($permisos) {
  if(!isset($_SESSION['usuario'])) {
    header('Location: '.ROOT_URI.'login.php');
  }
}

function logIn($usuario, $password) {
  $query = getConnection()->prepare("SELECT * FROM usuarios WHERE nombre = :usuario");
  if ($query->execute([ 'usuario' => $usuario ])) {
    $usuarios = $query->fetchAll();
    if (count($usuarios) > 0 && password_verify($password, $usuarios[0]['password'])) {
      $_SESSION['usuario'] = $usuarios[0]['nombre'];
      $_SESSION['permiso'] = $usuarios[0]['permiso'];
      return true;
    }
  }
  return false;
}

function logOut() {
  session_unset();
}
