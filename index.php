<?php

require __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';

session_start();
use App\Entity\Funcionario;
use App\Controller\FuncionarioController;

if($_SESSION['user']) {
    $funcionarios = Funcionario::collection();

    require_once __DIR__.'/vendor/autoload.php';
    require_once __DIR__.'/config/config.php';
    include __DIR__.'/includes/header.php';
    // include __DIR__.'/views/Funcionario/funcionarios.php';
    FuncionarioController::index();
    include __DIR__.'/includes/footer.php';
}else {
    header('location: login.php');
}

