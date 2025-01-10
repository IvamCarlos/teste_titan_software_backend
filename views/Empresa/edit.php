<main>
    <section>
        <a href="<?php echo base_url; ?>empresas">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <div>
        <h2>Editar Empresa</h2>

        <form method="post" onsubmit="return validarEmpresa()" action="<?php echo base_url; ?>empresa-atualizar/<?= $empresa->getIdEmpresa() ?>">

            <label for="title">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= ($empresa->getNome()) ? $empresa->getNome() : '' ?>">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira o nome da empresa
            </span>

            <input type="submit" value="Cadastrar">

        </form>
    </div>
</main>