<main>
    <section>
        <a href="<?php echo base_url; ?>empresas">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <div>
        <h2>Cadastrar nova empresa</h2>

        <form method="post" onsubmit="return validarEmpresa()" action="<?php echo base_url; ?>empresa-registrar">

            <label for="title">Nome</label>
            <input type="text" name="nome" id="nome">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira o nome da empresa
            </span>

            <input type="submit" value="Cadastrar">

        </form>
    </div>
</main>