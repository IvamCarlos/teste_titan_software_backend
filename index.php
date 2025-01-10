<?php

require __DIR__.'/vendor/autoload.php';
require_once __DIR__.'/config/config.php';
require_once __DIR__.'/router/routes.php';

session_start();
use App\Core\Core;

if(isset($_SESSION['user'])) {
    require_once __DIR__.'/vendor/autoload.php';
    require_once __DIR__.'/config/config.php';
    include __DIR__.'/includes/header.php';

    spl_autoload_register(function($file) {
        if(file_exists(__DIR__."/utils/$file.php")) {
            file_exists(__DIR__."/utils/$file.php");
        } else if(file_exists(__DIR__."/models/$file.php")) {
            file_exists(__DIR__."/models/$file.php");
        } 
    });

    $core = new Core();
    $core->run($routes);
    
    include __DIR__.'/includes/footer.php';
}else {
    $core = new Core();
    $core->run($routes);
}

