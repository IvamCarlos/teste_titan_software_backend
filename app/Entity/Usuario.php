<?php 

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Usuario {

    /**
     * Identificador da classe Usuario 
     * @var integer
     */
    private $id_usuario;

    /**
     * Campo login
     * @var string
     */

     private $login;

     /**
      * campo senha
      * @var string
      */
     private $senha;

    /**
     * Criando setter de id_usuario
     * @param integer $id_usuario
     */
    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    /**
     * Criando getter de id_usuario
     * @return integer
     */
    public function getIdUsuario() {
        return $this->id_usuario;
    }

    /**
     * Criando setter de login
     * @param string $login
     */
    public function setLogin($login) {
        $this->login = $login;
    }

    /**
     * Criando getter de login
     * @return string
     */
    public function getLogin() {
        return $this->login;
    }

    /**
     * Criando setter de senha
     * @param string $senha
     */
    public function setSenha($senha) {
        $this->senha = $senha;
    }

    /**
     * Criando getter de senha
     * @return string
     */
    public function getSenha() {
        return $this->login;
    }

    /**
     * Método responsável por cadastrar um novo usuário no banco de dados
     * @return boolean
     */
    public function store(){
        // Inserir o usuário no banco de dados
        $database = new Database('tbl_usuario');
        $this->id_usuario = $database->insert([
            'login'         => $this->getLogin(),
            'senha'         => $this->getSenha()
        ]);

        // Retornar sucesso
        return true;
    }

    /**
     * Método responsável por atualizar o usuário no banco de dados
     * @return boolean
     */
    public function update(){
        return (new Database('tbl_usuario'))->update('id_usuario = '.$this->getIdUsuario(),[
            'login'         => $this->getLogin(),
            'senha'      => $this->getSenha()
        ]);
    }

    /**
     * Método responsável por excluir o usuário do banco de dados
     * @return boolean
     */
    public function delete(){
        return (new Database('tbl_usuario'))->delete('id_usuario = '.$this->getIdUsuario());
    }

    /**
     * Método responsável por pegar os usuários do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function collection($where = null, $order = null, $limit = null) {
        return (new Database('tbl_usuario'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por pegar o usuário pelo ID
     * @param integer $id_usuario
     * @return Usuario
     */
    public static function single($id_usuario) {
        return (new Database('tbl_usuario'))->select(null, 'id_usuario = '.$id_usuario)->fetchObject(self::class);
    }
}


