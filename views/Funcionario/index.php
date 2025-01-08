<?php 

require __DIR__.'../../../vendor/autoload.php';
require_once __DIR__.'../../../config/config.php';
session_start();

use App\Entity\Funcionario;

if($_SESSION['user']) {
    $funcionarios = Funcionario::collection();

    include __DIR__.'../../../includes/header.php';
    include __DIR__.'/list.php';
    include __DIR__.'../../../includes/footer.php';
}else {
    header('location: '.base_url.'login.php');
}