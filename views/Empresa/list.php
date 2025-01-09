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
    // Verifica se existem empresas na instância do banco de dados, se tiver ele preenche a tabela com as empresas
    if(count($empresas) > 0){
        foreach($empresas as $empresa) {
            $results .= '
            <tr>
                <td>'.$empresa->getNome().'</td>
                <td>
                    <a href="edit.php?id='.$empresa->getIdEmpresa().'"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                    <a href="delete.php?id='.$empresa->getIdEmpresa().'"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                </td>
            </tr>';
        }
    }else {
        $results .= '<tr><td colspan="7" class="text-center">Nenhuma empresa cadastrada!<td></tr>';
    }
?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="register.php">
            <button class="button">Nova Empresa</button>
        </a>
    </section>
</main>

<section>
    <table class="table">
        <thead>
            <tr>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $results ?>
        </tbody>
    </table>
</section>
