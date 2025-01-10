<?php 

namespace App\Controller;

use App\Models\Usuario;
use Utils\RenderView;

require_once __DIR__.'/../../utils/RenderView.php';
class UsuarioController 
{
    public $usuario;
    public $load;

    public function __construct() {
        $this->usuario = new Usuario();
        $this->load = new RenderView();
    }
    public function index() {
        $usuarios = $this->usuario->collection();

        $this->load->loadView('Usuario/list', [
            'usuarios' => $usuarios
        ]);
    }

    public function create() {
        $usuario = $this->usuario;

        $this->load->loadView('Usuario/form', [
            'usuario' => $usuario
        ]);
    }
    
    public function store() {
        if(isset($_POST['login'])) {

            $funcionario = $this->usuario;
            $funcionario->setLogin($_POST['login']);
            $funcionario->setSenha($_POST['senha']);
            $funcionario->store();
        
            header('location: '.base_url.'/usuarios?status=success');
            exit;
        }
    }

    // Método responsável por destruir a sessão do usuário logado
    public function logout() {
        session_start();
        if (isset($_SESSION)) {
            session_destroy();
        }
            
        header('location: '.base_url.'login');
        exit();
    }

    // Método responsável por chamar a página de edição do usuário
    public function edit($id) {
        $id_usuario = $id[0];

        // Pega o usuário pelo ID
        $usuario = $this->usuario->single($id_usuario);
        $this->load->loadView('Usuario/edit', [
            'usuario' => $usuario
        ]);
    }

    // Método responsável por atualizar o usuário no banco de dados
    public function update($id) {
        $id_usuario = $id[0];
        // Busca o usuário pelo ID
        $usuario = $this->usuario->single($id_usuario);

        if(isset($_POST['login'])) {
            $usuario->setLogin($_POST['login']);
            $usuario->setSenha($_POST['senha']);
            $usuario->update();
        
            header('location: '.base_url.'usuarios?status=success');
            exit;
        }
    }

    public function confirmDestroy($id) {
        $id_usuario = $id[0];
        // Busca o usuário pelo ID
        $usuario = $this->usuario->single($id_usuario);

        $this->load->loadView('Usuario/confirm-delete', [
            'usuario' => $usuario
        ]);
    }

    // Método responsável por remover o usuário
    public function destroy($id) {
        $id_usuario = $id[0];

        // Pega o usuário pelo ID
        $usuario = $this->usuario->single($id_usuario);
        // Validação POST
        if(isset($_POST['delete'])){

            $usuario->delete();
        
            header('location: '.base_url.'usuarios?status=success');
            exit;
        }
    }
}