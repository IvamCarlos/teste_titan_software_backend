<?php 

require_once __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Editar Empresa');
session_start();

use \App\Entity\Empresa;

// Validação do ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// Consulta a empresa
$empresa = Empresa::single($_GET['id']);

// Validação da empresa
if(!$empresa instanceof Empresa){
   header('location: index.php?status=error');
   exit; 
}
    
// Atualização da empresa
if(isset($_POST['nome'])) {
    $empresa = new empresa;
    $empresa->setNome($_POST['name']);
    $empresa->update();

    header('location: index.php?status=success');
    exit;
}

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';
include __DIR__.'../../../includes/footer.php';