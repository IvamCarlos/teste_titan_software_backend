<?php 

/**
 * Arquivo de rotas da aplicação
 */

$routes = [
    '/' => 'FuncionarioController@index',
    '/logout' => 'UsuarioController@logout',
    "/empresas" => 'EmpresaController@index',
    '/usuarios' => 'UsuarioController@index',
    '/form-funcionario' => 'FuncionarioController@create',
    '/form-empresa' => 'EmpresaController@create',
    '/form-usuario' => 'UsuarioController@create',
    '/funcionario-registrar' => 'FuncionarioController@store',
    '/empresa-registrar' => 'EmpresaController@store',
    '/usuario-registrar' => 'UsuarioController@store',
    '/empresa-editar/{id}' => 'EmpresaController@edit',
    '/empresa-atualizar/{id}' => 'EmpresaController@update',
    '/empresa/confirmar-deletar/{id}' => 'EmpresaController@confirmDestroy',
    '/empresa-deletar/{id}' => 'EmpresaController@destroy',
    '/funcionario-editar/{id}' => 'FuncionarioController@edit',
    '/funcionario-atualizar/{id}' => 'FuncionarioController@update',
    '/funcionario/confirmar-deletar/{id}' => 'FuncionarioController@confirmDestroy',
    '/funcionario-deletar/{id}' => 'FuncionarioController@destroy',
    '/usuario-editar/{id}' => 'UsuarioController@edit',
    '/usuario-atualizar/{id}' => 'UsuarioController@update',
    '/usuario/confirmar-deletar/{id}' => 'UsuarioController@confirmDestroy',
    '/usuario-deletar/{id}' => 'UsuarioController@destroy'
];