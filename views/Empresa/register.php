<?php

use App\Controller\EmpresaController;
use \App\Entity\Empresa;

require __DIR__.'../../../vendor/autoload.php';

define('TITLE', 'Cadastrar Empresa');
session_start();

/* Cria a instância da entidade empresa e chama o método store do Controlador de empresa, que será reponsável por salvar a empresa 
no banco de dados */

$empresa = new Empresa;
EmpresaController::store();
    
require_once __DIR__.'../../../config/config.php';
include __DIR__.'../../../includes/header.php';
include __DIR__.'/form.php';
include __DIR__.'../../../includes/footer.php';