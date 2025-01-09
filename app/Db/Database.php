<?php

namespace App\Db;

use \PDO;
use \PDOException;

class Database {

    /**
     * Host de conexão com banco de dados
     * @var string
     */

    const HOST = 'localhost';

    /**
     * Nome do banco de dados
     */

    const NAME = 'teste_php';

    /**
     * Usuário do banco de dados
     * @var string
     */
    CONST USER = 'root';

    /**
     * Senha de acesso do banco de dados
     * @var string
     */
    CONST PASS = '1138051471';

    /**
     * Nome da tabela a ser manipulada
     * @var string
     */
    private $table;

    /**
     * Instância de conexão com o banco de dados
     * @var PDO 
     */
    private $connection;

    /**
     * Define a tabela e instancia conexão
     * @param string $table
     */
    public function __construct($table = null) {
        $this->table = $table;
        $this->setConnection();
    }


    /**
     * Método responsável por criar uma conexão com o banco de dados
     */
    private function setConnection() {
        try {
            $this->connection = new PDO('mysql:host='.self::HOST.';dbname='.self::NAME,self::USER,self::PASS);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            die('Error: '.$e->getMessage());
        }
    }

    /**
     * Método responsável por executar queries dentro do banco de dados
     * @param string $query
     * @param array $params
     * @return PDOStatement
     * 
     */
    public function execute($query, $params = []) {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($params);
            return $statement;
        }catch(PDOException $e) {
            die('Error: '.$e->getMessage());
        }
    }


    /**
     * Método responsável por inserir dados no banco de dados
     * @param array $values
     * @return integer ID inserido
     */
    public function insert($values) {
        // data query
        $fields = array_keys($values);
        $binds = array_pad([], count($fields), '?');

        // Monta query
        $query = 'INSERT INTO '.$this->table.' ('.implode(',',$fields).') VALUES ('.implode(',',$binds).')';

        // Executa o INSERT
        $this->execute($query, array_values($values));

        // Retorna o ID inserido
        return $this->connection->lastInsertId();
    }

    /**
     * Método responsável por executar uma consulta no banco de dados
     * @param string $where
     * @param string $order
     * @param string $limit
     * @param string $fields
     * @return PDOStatement
     */
    public function select($join = null, $where = null, $order = null, $limit = null, $fields = '*') {
        // Data query
        $join = strlen($join) ? 'JOIN '.$join : '';
        $where = strlen($where) ? 'WHERE '.$where : '';
        $order = strlen($order) ? 'ORDER BY '.$order : '';
        $limit = strlen($limit) ? 'LIMIT '.$limit : '';

        // Monta a query
        $query = 'SELECT '.$fields.' FROM '.$this->table.' '.$join.' '.$where.' '.$order.' '.$limit;

        // Executa a query
        return $this->execute($query);
    }

    /**
     * Método responsável por executar atualizações no banco de dados
     * @param  string $where
     * @param  array $values [ field => value ]
     * @return boolean
     */
    public function update($where,$values){
        //DADOS DA QUERY
        $fields = array_keys($values);

        //MONTA A QUERY
        $query = 'UPDATE '.$this->table.' SET '.implode('=?,',$fields).'=? WHERE '.$where;

        //EXECUTAR A QUERY
        $this->execute($query,array_values($values));

        //RETORNA SUCESSO
        return true;
    }

    /**
     * Método responsável por excluir dados do banco de dados
     * @param  string $where
     * @return boolean
     */
    public function delete($where){
        //MONTA A QUERY
        $query = 'DELETE FROM '.$this->table.' WHERE '.$where;

        //EXECUTA A QUERY
        $this->execute($query);

        //RETORNA SUCESSO
        return true;
    }

}