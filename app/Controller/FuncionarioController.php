<?php 

namespace App\Controller;

use App\Models\Funcionario;
use Utils\RenderView;

require_once __DIR__.'/../../utils/RenderView.php';

class FuncionarioController
{
    public $funcionario;
    public $load;

    // Inicializa as instâncias no construtor
    public function __construct() {
        $this->funcionario = new Funcionario();
        $this->load = new RenderView();
    }

    // Método responsável por listar todos os funcionários
    public function index() {
        $funcionarios = $this->funcionario->collection();

        $this->load->loadView('Funcionario/list', [
            'funcionarios' => $funcionarios
        ]);
    }

    // Método que chama o form para cadastrar um novo funcionário
    public function create() {
        $funcionario = $this->funcionario;

        $this->load->loadView('Funcionario/form', [
            'funcionario' => $funcionario
        ]);
    }

    // Método responsável por salvar o funcionário no banco de dados
    public function store() {
        if(isset($_POST['nome'])) {

            $funcionario = $this->funcionario;
            $funcionario->setNome($_POST['nome']);
            $funcionario->setCpf($_POST['cpf']);
            $funcionario->setRg($_POST['rg']);
            $funcionario->setEmail($_POST['email']);
            $funcionario->setIdEmpresa($_POST['id_empresa']);
            $funcionario->store();
        
            header('location: '.base_url.'?status=success');
            exit;
        }
    }

    // Método responsável por chamar a página de edição do funcionário
    public function edit($id) {
        $id_funcionario = $id[0];

        // Pega empresa pelo ID
        $funcionario = $this->funcionario->single($id_funcionario);
        $this->load->loadView('Funcionario/edit', [
            'funcionario' => $funcionario
        ]);
    }

    // Método responsável por atualizar o funcionário no banco de dados
    public function update($id) {
        $id_funcionario = $id[0];
        // Busca a empresa pelo ID
        $funcionario = $this->funcionario->single($id_funcionario);

        if(isset($_POST['nome'])) {
            $funcionario->setNome($_POST['nome']);
            $funcionario->setCpf($_POST['cpf']);
            $funcionario->setRg($_POST['rg']);
            $funcionario->setEmail($_POST['email']);
            $funcionario->setIdEmpresa($_POST['id_empresa']);
            $funcionario->update();
        
            header('location: '.base_url.'?status=success');
            exit;
        }
    }

    // Chama view de confirmação antes de deletar o funcionário no banco de dados
    public function confirmDestroy($id) {
        $id_funcionario = $id[0];
        // Busca a empresa pelo ID
        $funcionario = $this->funcionario->single($id_funcionario);

        $this->load->loadView('Funcionario/confirm-delete', [
            'funcionario' => $funcionario
        ]);
    }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
                                                                                                                                                                                                                                                                                                                   
    // Método responsável por remover o funcionário do banco de dados
    public function destroy($id) {
        $id_funcionario = $id[0];

        // Pega empresa pelo ID
        $funcionario = $this->funcionario->single($id_funcionario);
        // Validação POST
        if(isset($_POST['delete'])){

            $funcionario->delete();
        
            header('location: '.base_url.'?status=success');
            exit;
        }
    }
}
