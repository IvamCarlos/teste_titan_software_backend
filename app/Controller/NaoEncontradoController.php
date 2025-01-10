<?php 

namespace App\Controller;

class NaoEncontradoController {

    // Mostra a mensagem de não encontrado para rotas que não estão definidas no routes.php
    public static function index() {
        echo "Não encontrado!";
    }
}