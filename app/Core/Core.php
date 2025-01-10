<?php

namespace App\Core;

use App\Controller\NaoEncontradoController;
class Core
{
    public function run($routes) {
        $url = '/';

        isset($_GET['url']) ? $url.= $_GET['url'] : '';

        ($url != '/') ? $url = rtrim($url, '/'): $url;

        // Inicia como false
        $routerFound = false;

        foreach($routes as $key => $value) {
            $pattern = '#^'.preg_replace('/{id}/', '(\w+)', $key).'$#';

            if(preg_match($pattern, $url, $matches)) {
                // Utilizando array_shift() para remover um elemento na primeira posição
                array_shift($matches);

                $routerFound = true;

                // Desestruturar o array, Ex: 'FuncionarioController@index'
                [$currentController, $action] = explode('@', $value);

                // Desestruturar o array, Ex: 'EmpresaController@index'
                [$currentController, $action] = explode('@', $value);

                // Desestruturar o array, Ex: 'UsuarioController@index'
                [$currentController, $action] = explode('@', $value);

                $currentController = "\App\Controller\\$currentController";

                //Instanciando Controllers e actions
                $newController = new $currentController();
                $newController->$action($matches);
            }
        }

        // Se não existir a rota
        if(!$routerFound) {
            $controller = new NaoEncontradoController();
            $controller->index();
        }
    }
}