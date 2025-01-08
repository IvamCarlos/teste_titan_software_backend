--  Criação do banco de dados "teste_php"
CREATE DATABASE teste_php;

use teste_php;

-- Criação da tabela "tbl_usuario"
CREATE TABLE tbl_usuario(
	id_usuario INT AUTO_INCREMENT,
    login VARCHAR(20),
    senha VARCHAR(20),
    PRIMARY KEY (id_usuario)
);

-- Usuário de teste
INSERT INTO tbl_usuario (login, senha) VALUES ('adm', 'projeto');

-- Criação da tabela "tbl_empresa"
CREATE TABLE tbl_empresa (
	id_empresa INT AUTO_INCREMENT,
    nome VARCHAR(40) NOT NULL,
    PRIMARY KEY (id_empresa)
);

-- Criação da tabela "tbl_funcionario"
CREATE TABLE tbl_funcionario (
	id_funcionario INT AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    rg VARCHAR(20),
    email VARCHAR(30) NOT NULL,
    id_empresa INT NOT NULL,
    PRIMARY KEY (id_funcionario),
    FOREIGN KEY (id_empresa) REFERENCES tbl_empresa(id_empresa)
);

-- Rode esses comandos na sua ferramenta de banco de dados para popular a tabela de empresas para fins de teste 
INSERT INTO tbl_empresa (id_empresa, nome) VALUES 
(1, 'Titan Software'),
(2, 'Fale Paco'),
(3, 'Grupo Academia do E-Commerce'),
(4, 'Axysis Promoções'),
(5, 'Allox Telecomunicação')