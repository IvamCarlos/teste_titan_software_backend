<?php 

    require_once __DIR__.'/vendor/autoload.php';

    use App\Db\Database;
    use App\Models\Usuario;

    $user = $_POST['login'];
    $password = $_POST['senha'];
    $login = $_POST['logar'];


    if (isset($login)) {

        $user = (new Database('tbl_usuario'))->select(null, "login = '$user' AND senha = '$password'")->fetchObject(Usuario::class);

        if ($user) {
            session_start();
            $_SESSION['id'] = $user->getIdUsuario();
            $_SESSION['user'] = $user->getLogin();
            header('location: index.php?status=success');
        } else {
            header('location: login.php?status=error');
        }
    }

include __DIR__.'/login.php';