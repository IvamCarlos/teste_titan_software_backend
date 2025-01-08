<?php

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
            </tr>';
        }
    }else {
        $results .= '<tr><td colspan="7" class="text-center">Nenhum funcionário cadastrado!<td></tr>';
    }
?>

<section>
    <table class="table bg-light mt-3">
        <thead>
            <tr>
                <th>Nome</th>
                <th>CPF</th>
                <th>RG</th>
                <th>Email</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody>
            <?= $results ?>
        </tbody>
    </table>
</section>
