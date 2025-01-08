<?php

$mensagem = '';
if(isset($_GET['status'])) {
    switch ($_GET['status']) {
        case 'error' : 
            $mensagem = '<div class="custom-message">Usuário ou senha inválidos!</div>';
            break;
    }
}

$key = uniqid(md5(rand()));

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema CRUD - Página de Login</title>
    <link rel="stylesheet" href="assets/css/login.css?key=<?php echo $key ?>">
</head>
<body>

    <div class="wrapper fadeInDown">
        <div id="formContent">

            <?= $mensagem ?>

            <div class="fadeIn first">
                <img src="assets/img/user.png" id="icon" alt="User Icon" />
            </div>

            <form method="POST" action="validate_login.php">
                <input type="text" id="user" class="fadeIn second" name="login" placeholder="Usuário">
                <input type="password" id="password" class="fadeIn third" name="senha" placeholder="Senha">
                <input type="submit" class="fadeIn fourth" value="Login" name="logar">
            </form>

        </div>
    </div>
</body>
</html>
