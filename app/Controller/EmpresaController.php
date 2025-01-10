<?php 

namespace App\Controller;

use App\Models\Empresa;
use Utils\RenderView;

require_once __DIR__.'/../../utils/RenderView.php';

class EmpresaController 
{
    public $empresa; 
    public $load;
    public function __construct() {
        $this->empresa = new Empresa();
        $this->load = new RenderView();
    }

    // Método responsável por listar todas as empresas
    public function index() {
        $empresas = $this->empresa->collection();

        $this->load->loadView('Empresa/list', [
            'empresas' => $empresas
        ]);
    }

    // Método que vai chamar o form de empresa
    public function create() {
        $empresa = $this->empresa;

        $this->load->loadView('Empresa/form', [
            'empresa' => $empresa
        ]);
    }

    // Método que vai salvar a empresa no banco de dados
    public function store() {
        // Validação POST
        if(isset($_POST['nome'])) {
            $empresa = $this->empresa;
            $empresa->setNome($_POST['nome']);
            $empresa->store();

            header('location: '.base_url.'empresas?status=success');
            exit;
        }
    }

    // Método responsável por chamar a página de edição da empresa
    public function edit($id) {
        $id_empresa = $id[0];

        // Pega empresa pelo ID
        $empresa = $this->empresa->single($id_empresa);
        $this->load->loadView('Empresa/edit', [
            'empresa' => $empresa
        ]);
    }

    // Método responsável por atualizar a empresa no banco de dados
    public function update($id) {
        $id_empresa = $id[0];
        // Busca a empresa pelo ID
        $empresa = $this->empresa->single($id_empresa);

        if(isset($_POST['nome'])) {
            $empresa->setNome($_POST['nome']);
            $empresa->update();
        
            header('location: '.base_url.'empresas?status=success');
            exit;
        }
    }

    public function confirmDestroy($id) {
        $id_empresa = $id[0];
        // Busca a empresa pelo ID
        $empresa = $this->empresa->single($id_empresa);

        $this->load->loadView('Empresa/confirm-delete', [
            'empresa' => $empresa
        ]);
    }

    // Método responsável por remover a empresa do banco de dados
    public function destroy($id) {
        $id_empresa = $id[0];

        // Pega empresa pelo ID
        $empresa = $this->empresa->single($id_empresa);
        // Validação POST
        if(isset($_POST['delete'])){

            $empresa->delete();
        
            header('location: '.base_url.'empresas?status=success');
            exit;
        }
    }
}