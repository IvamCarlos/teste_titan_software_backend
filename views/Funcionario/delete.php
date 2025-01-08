<?php

require __DIR__.'../../../vendor/autoload.php';

use \App\Entity\Funcionario;
session_start();

// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
  header('location: index.php?status=error');
  exit;
}

// Recupera o funcionário pelo ID
$funcionario = Funcionario::single($_GET['id']);

// Validação do funcionário
if(!$funcionario instanceof Funcionario){
  header('location: index.php?status=error');
  exit;
}

// Validação POST
if(isset($_POST['delete'])){

  $funcionario->delete();

  header('location: index.php?status=success');
  exit;
}

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/confirm-delete.php';
include __DIR__.'../../../includes/footer.php';