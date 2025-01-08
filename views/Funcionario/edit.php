<?php 

require_once __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Editar Funcionário');
session_start();

use \App\Entity\Funcionario;

//ID Validation
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location: index.php?status=error');
    exit;
}

// Consulta o funcionário
$funcionario = Funcionario::single($_GET['id']);

// Validação do Funcionario
if(!$funcionario instanceof Funcionario){
   header('location: index.php?status=error');
   exit; 
}
    
// Atualização do funcionário
if(isset($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['email'], $_POST['id_empresa'])) {
    $funcionario = new Funcionario;
    $funcionario->setNome($_POST['nome']);
    $funcionario->setCpf($_POST['cpf']);
    $funcionario->setRg($_POST['rg']);
    $funcionario->setEmail($_POST['email']);
    $funcionario->setIdEmpresa($_POST['id_empresa']);
    $funcionario->update();

    header('location: index.php?status=success');
    exit;
}

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';
include __DIR__.'../../../includes/footer.php';