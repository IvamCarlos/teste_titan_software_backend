<?php

    $mensagem = '';
    if(isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert alert-success">Ação executada com sucesso!</div>';
                break;
            case 'error' : 
                $mensagem = '<div class="alert alert-danger">Ação não executada</div>';
        }
    }

    $results = '';
    // Verifica se existem funcionários na instância do banco de dados, se tiver ele preenche a tabela com os funcionários
    if(count($funcionarios) > 0){
        foreach($funcionarios as $funcionario) {
            $results .= '
            <tr>
                <td>'.$funcionario->getNome().'</td>
                <td>'.$funcionario->getCpf().'</td>
                <td>'.$funcionario->getRg().'</td>
                <td>'.$funcionario->getEmail().'</td>
                <td>'.$funcionario->empresa.'</td>
                <td>
                    <a href="edit.php?id='.$funcionario->getIdFuncionario().'"><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                    <a href="delete.php?id='.$funcionario->getIdFuncionario().'"><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
                </td>
            </tr>';
        }
    }else {
        $results .= '<tr><td colspan="7" class="text-center">Nenhum funcionário cadastrado!<td></tr>';
    }
?>

<main>

    <?= $mensagem ?>

    <section>
        <a href="register.php">
            <button class="btn btn-success">Novo Funcionário</button>
        </a>
    </section>
</main>

<section>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Empresa</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?= $results ?>
        </tbody>
    </table>
</section>
