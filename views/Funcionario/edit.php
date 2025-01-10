<main>
    <section>
        <a href="<?php echo base_url; ?>">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <div>
        <h2>Editar Funcionário</h2>
        <form method="post" onsubmit="return validarFuncionario()" action="<?php echo base_url; ?>funcionario-atualizar/<?= $funcionario->getIdFuncionario() ?>">

            <label for="title">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= ($funcionario->getNome()) ? $funcionario->getNome() : '' ?>">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira seu nome
            </span>

            <label for="isbn">CPF</label>
            <input type="text" name="cpf" id="cpf" value="<?= ($funcionario->getCpf()) ? $funcionario->getCpf() : '' ?>" size="12" maxlength="14" OnKeyPress="formatar('###.###.###-##', this)">
            <span role="alert" id="cpfErro" aria-hidden="true">
                Por favor insira seu CPF
            </span>

            <label for="amount">RG</label>
            <input type="text" name="rg" value="<?= ($funcionario->getRg()) ? $funcionario->getRg() : '' ?>" maxlength="14" OnKeyPress="formatar('##.###.###-##', this)">

            <label for="amount">Email</label>
            <input type="text" name="email" id="email" value="<?= ($funcionario->getEmail()) ? $funcionario->getEmail() : '' ?>">
            <span role="alert" id="emailErro" aria-hidden="true">
                Por favor insira seu e-mail
            </span>

            <label for="amount">Empresa</label>
            <select name="id_empresa" id="empresa">
                <?php 
                    
                    use \App\Models\Empresa;

                    $empresas = Empresa::collection();

                    foreach($empresas as $empresa) {
                        ?>
                        <option value="<?= $empresa->getIdEmpresa() ?>"><?= $empresa->getNome() ?>
                        </option>
                        <?php
                    }

                ?>
            </select>
            <span role="alert" id="empresaErro" aria-hidden="true">
                Por favor selecione uma empresa
            </span>

            <input type="submit" value="Cadastrar">

        </form>
    <div>

</main>