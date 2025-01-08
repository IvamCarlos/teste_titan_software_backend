<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Funcionario {

    /**
     * Identificador da classe Funcionario 
     * @var integer
     */
    private $id_funcionario;

    /**
     * nome do funcionário
     * @var string
     */
    private $nome;

    /**
     * Campo CPF (Cadastro de Pessoa Física)
     * @var string
     */
    private $cpf;

    /**
     * campo rg (Registro Geral) 
     * @var string
     */
    private $rg;

    /**
     * campo email
     * @var string
     */
    private $email;

    /**
     * Identificador da classe Empresa 
     * @var integer
     */
    private $id_empresa;

    public $empresa;

    /**
     * Criando setter de id_funcionario
     * @param integer $id_funcionario
     */
    public function setIdFuncionario($id_funcionario) {
        $this->id_funcionario = $id_funcionario;
    }

    /**
     * Criando getter de ID
     * @return integer
     */
    public function getIdFuncionario() {
        return $this->id_funcionario;
    }

    /**
     * Criando setter de nome
     * @param string $nome
     */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    /**
     * Criando getter de nome
     * @return string
     */
    public function getNome() {
        return $this->nome;
    }

    /**
     * Criando setter de cpf
     * @param string $cpf
     */
    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    /**
     * Criando getter de cpf
     * @return string
     */
    public function getCpf() {
        return $this->cpf;
    }

    /**
     * Criando setter de rg
     * @param string $rg
     */
    public function setRg($rg) {
        $this->rg = $rg;
    }

    /**
     * Criando getter de rg
     * @return string
     */
    public function getRg() {
        return $this->rg;
    }

    /**
     * Criando setter de email
     * @param string $email
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * Criando getter de email
     * @return string
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Criando setter de id_empresa
     * @param integer $id_empresa
     */
    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    /**
     * Criando getter de id_empresa
     * @return integer
     */
    public function getIdEmpresa() {
        return $this->id_empresa;
    }



    /**
     * Método responsável por salvar os dados do funcionário no banco de dados
     * @return boolean
     */
    public function store(){
        // Inserir o funcionário no banco de dados
        $database = new Database('tbl_funcionario');
        $this->id_empresa = $database->insert([
            'nome'          => $this->getNome(),
            'cpf'           => $this->getCpf(),
            'rg'            => $this->getRg(),
            'email'         => $this->getEmail(),
            'id_empresa'    => $this->getIdEmpresa()
        ]);

        // Retornar sucesso
        return true;
    }

    /**
     * Método responsável por atualizar o funcionário no banco de dados
     * @return boolean
     */
    public function update(){
        return (new Database('tbl_funcionario'))->update('id_funcionario = '.$this->getIdFuncionario(),[
            'nome'          => $this->getNome(),
            'cpf'           => $this->getCpf(),
            'rg'            => $this->getRg(),
            'email'         => $this->getEmail(),
            'id_empresa'    => $this->getIdEmpresa()
        ]);
    }

    /**
     * Método responsável por excluir o funcionário do banco de dados
     * @return boolean
     */
    public function delete(){
        return (new Database('tbl_funcionario'))->delete('id_funcionario = '.$this->getIdFuncionario());
    }

    /**
     * Método responsável por pegar os funcionários do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function collection($where = null, $order = null, $limit = null) {
        return (new Database('tbl_funcionario'))->select('tbl_empresa ON tbl_funcionario.id_empresa = tbl_empresa.id_empresa', $where, $order, $limit, 'tbl_funcionario.id_empresa, tbl_funcionario.*, tbl_empresa.nome as empresa')->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * method responsible for picking up the student based on ID
     * @param string $isbn
     * @return Funcionario
     */
    public static function single($id_funcionario) {
        return (new Database('tbl_funcionario'))->select(null, 'id_funcionario = '.$id_funcionario)->fetchObject(self::class);
    }
}