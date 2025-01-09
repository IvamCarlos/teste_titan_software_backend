<?php

    $mensagem = '';
    if(isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error' : 
                $mensagem = '<div class="alert-danger">Ação não executada</div>';
        }
    }

    $results = '';
    // Verifica se existem usuários na instância do banco de dados, se tiver ele preenche a tabela com os usuários
    if(count($usuarios) > 0){
        foreach($usuarios as $usuario) {
            $results .= '
            <tr>
                <td>'.$usuario->getLogin().'</td>
                <td>
                    <a href="edit.php?id='.$usuario->getIdUsuario().'"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                    <a href="delete.php?id='.$usuario->getIdUsuario().'"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                </td>
            </tr>';
        }
    }else {
        $results .= '<tr><td colspan="7" class="text-center">Nenhum usuário cadastrado!<td></tr>';
    }
?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="register.php">
            <button class="button">Novo Usuário</button>
        </a>
    </section>
</main>

<section>
    <table class="table">
        <thead>
            <tr>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $results ?>
        </tbody>
    </table>
</section>
