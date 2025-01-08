<?php 

require_once __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Editar Usuário');

session_start();

use \App\Entity\Usuario;

// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// Recupera o usuário pelo ID
$usuario = Usuario::single($_GET['id']);

// Validação do usuário
if(!$usuario instanceof Usuario){
   header('location: index.php?status=error');
   exit; 
}
    
// Atualização do usuário
if(isset($_POST['usuario'])) {
    $Usuario = new Usuario;
    $usuario->setLogin($_POST['usuario']);
    $usuario->update();

    header('location: index.php?status=success');
    exit;
}

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';
include __DIR__.'../../../includes/footer.php';