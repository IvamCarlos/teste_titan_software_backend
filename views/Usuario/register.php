<?php 

require __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Cadastrar Usuário');

session_start();

use \App\Entity\Usuario;
$usuario = new Usuario;

// Validação POST
if(isset($_POST['usuario'])) {
    $usuario = new Usuario;
    $usuario->setLogin($_POST['usuario']);
    $usuario->store();

    header('location: index.php?status=success');
    exit;
}
    
require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';
include __DIR__.'../../../includes/footer.php';