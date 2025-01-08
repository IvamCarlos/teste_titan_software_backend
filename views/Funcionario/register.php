<?php

use App\Controller\FuncionarioController;
use \App\Entity\Funcionario;

require __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Cadastrar Funcionário');
session_start();

/* Cria a instância da entidade funcionario e chama o método store do Controlador de funcionario, que será reponsável por salvar o funcionario 
no banco de dados */

$funcionario = new Funcionario;
FuncionarioController::store();

require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';    
include __DIR__.'../../../includes/footer.php';