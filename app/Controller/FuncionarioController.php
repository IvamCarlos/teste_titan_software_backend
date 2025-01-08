<?php 

namespace App\Controller;

use App\Entity\Funcionario;

class FuncionarioController
{
    public static function index() {
        $funcionarios = Funcionario::collection();

        include 'views/Funcionario/list.php';
    }

    public static function form() {
        include 'views/Funcionario/form.php';
    }

    public static function store() {
        if(isset($_POST['nome'])) {

            $funcionario = new Funcionario;
            $funcionario->setNome($_POST['nome']);
            $funcionario->setCpf($_POST['cpf']);
            $funcionario->setRg($_POST['rg']);
            $funcionario->setEmail($_POST['email']);
            $funcionario->setIdEmpresa($_POST['id_empresa']);
            $funcionario->store();
        
            header('location: index.php?status=success');
            exit;
        }
    }
    
}