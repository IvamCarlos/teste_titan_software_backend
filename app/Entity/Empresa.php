<?php

namespace App\Entity;

use \App\Db\Database;
use \PDO;

class Empresa {

    /**
     * Identificador da classe Empresa 
     * @var integer
     */
    private $id_empresa;

    /**
     * campo nome
     * @var string
     */
    private $nome;

    /**
     * Criando setter de id_empresa
     * @param integer $id_empresa
     */
    public function setIdEmpresa($id_empresa) {
        $this->id_empresa = $id_empresa;
    }

    /**
     * Criando getter de ID
     * @return integer
     */
    public function getIdEmpresa() {
        return $this->id_empresa;
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
     * Método responsável por salvar a empresa no banco de dados
     * @return boolean
     */
    public function store(){
        // Inserir a empresa no banco de dados
        $database = new Database('tbl_empresa');
        $this->id_empresa = $database->insert([
            'nome' => $this->getNome(),
        ]);

        // Retornar sucesso
        return true;
    }

    /**
     * Método responsável por atualizar a empresa no banco de dados
     * @return boolean
     */
    public function update(){
        return (new Database('tbl_empresa'))->update('id_empresa = '.$this->getIdEmpresa(),[
            'nome' => $this->getNome()
        ]);
    }

    /**
     * Método responsável por excluir a empresa do banco de dados
     * @return boolean
     */
    public function delete(){
        return (new Database('tbl_empresa'))->delete('id_empresa = '.$this->getIdEmpresa());
    }

    /**
     * Método responsável por pegar as empresas do banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public static function collection($where = null, $order = null, $limit = null) {
        return (new Database('tbl_empresa'))->select($where, $order, $limit)->fetchAll(PDO::FETCH_CLASS, self::class);
    }

    /**
     * Método responsável por pegar a empresa pelo ID
     * @param integer $id_empresa
     * @return Empresa
     */
    public static function single($id_empresa) {
        return (new Database('tbl_empresa'))->select(null, 'id_empresa = '.$id_empresa)->fetchObject(self::class);
    }

}