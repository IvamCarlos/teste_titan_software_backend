<?php 

namespace App\Controller;

use App\Entity\Empresa;

class EmpresaController 
{
    public static function index() {
        $empresas = Empresa::collection();

        include 'views/Empresa/list.php';
    }

    public static function form() {
        include 'views/Empresa/form.php';
    }

    public static function store() {
        // Validação POST
        if(isset($_POST['nome'])) {
            $empresa = new Empresa;
            $empresa->setNome($_POST['nome']);
            $empresa->store();

            header('location: index.php?status=success');
            exit;
        }
    }
}