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
    // Verifica se existem empresas na instância do banco de dados, se tiver ele preenche a tabela com as empresas
    if(count($empresas) > 0){
        foreach($empresas as $empresa) {
            $editar = base_url.'empresa-editar/'.$empresa->getIdEmpresa();
            $deletar = base_url.'/empresa/confirmar-deletar/'.$empresa->getIdEmpresa();

            $results .= '
            <tr>
                <td>'.$empresa->getNome().'</td>
                <td>
                    <a href='.$editar.'><i class="fa fa-pencil-square fa-2x" aria-hidden="true"></i></a>
                    <a href='.$deletar.'><i class="fa fa-trash-o fa-2x" aria-hidden="true"></i></a>
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
        <a href="<?php echo base_url; ?>form-empresa">
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

<script>
    function fecharAlerta() {
        var data = document.querySelector('.closebtn');
        data.parentElement.style.display="none";
    }
</script>
