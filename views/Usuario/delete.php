<?php

require __DIR__.'../../../vendor/autoload.php';
session_start();

use \App\Entity\Usuario;

// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

// Recupera o usuário pelo ID
$usuario = Usuario::single($_GET['id']);

// Validação do Usuario
if(!$usuario instanceof Usuario){
  header('location: index.php?status=error');
  exit;
}

// Validação POST
if(isset($_POST['delete'])){

  $usuario->delete();

  header('location: index.php?status=success');
  exit;
}

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/confirm-delete.php';
include __DIR__.'../../../includes/footer.php';