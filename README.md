## Teste Tintan Software Backend
Sistema CRUD desenvolvido utilizando PHP (OO), MySQL e JavaScript

## Banco de dados
Crie um banco de dados, exemplo `teste` e execute as instruções no arquivo teste.sql, lá existem alguns dados predefinidos para popular as tabelas que vão fazer a interação no cadastro de um novo funcionário. 

Para acessar o sistema use as credenciais `login` adm e `senha` projeto 

## Configuração
As credenciais do banco de dados estão no arquivo `./app/Db/Database.php` e você deve alterar para as configurações do seu ambiente (HOST, NAME, USER e PASS).

## Composer
Para a aplicação funcionar, é necessário rodar o Composer para que sejam criados os arquivos responsáveis pelo autoload das classes.

Caso não tenha o Composer instalado, baixe pelo site oficial: [https://getcomposer.org/download](https://getcomposer.org/download/)

Para rodar o composer, basta acessar a pasta do projeto e executar o comando abaixo em seu terminal ou se estiver usando o VS CODE você vai até aba "Terminal" e depois em "New Terminal" e execute o comando:
```shell
 composer install
```

Após essa execução uma pasta com o nome `vendor` será criada na raiz do projeto e você já poderá acessar pelo seu navegador.
