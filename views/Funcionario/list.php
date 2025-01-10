<?php

    $mensagem = '';
    if(isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 'success':
                $mensagem = '<div class="alert-success"><span class="closebtn" onclick="fecharAlerta()">&times</span>Ação executada com sucesso!</div>';
                break;
            case 'error' : 
                $mensagem = '<div class="alert-danger"><span class="closebtn" onclick="fecharAlerta()">&times</span>Ação não executada</div>';
        }
    }

    $results = '';
    // Verifica se existem funcionários na instância do banco de dados, se tiver ele preenche a tabela com os funcionários
    if(count($funcionarios) > 0){
        foreach($funcionarios as $funcionario) {
            $editar = base_url.'funcionario-editar/'.$funcionario->getIdFuncionario();
            $deletar = base_url.'funcionario/confirmar-deletar/'.$funcionario->getIdFuncionario();

            $results .= '
            <tr>
                <td>'.$funcionario->getNome().'</td>
                <td>'.$funcionario->getCpf().'</td>
                <td>'.$funcionario->getRg().'</td>
                <td>'.$funcionario->getEmail().'</td>
                <td>'.$funcionario->empresa.'</td>
                <td>
                    <a href='.$editar.'><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                    <a href='.$deletar.'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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
        <a href="<?php echo base_url; ?>form-funcionario">
            <button class="button">Novo Funcionário</button>
        </a>
    </section>
</main>

<section>
    <table class="table">
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

<script>
    function fecharAlerta() {
        var data = document.querySelector('.closebtn');
        data.parentElement.style.display="none";
    }
</script>
