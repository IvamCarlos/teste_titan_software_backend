<main>
    <section>
        <a href="<?php echo base_url; ?>usuarios">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <div>
        <h2>Cadastrar novo usuário</h2>

        <form method="post" action="<?php echo base_url; ?>usuario-registrar">
            <label for="title">Usuário</label>
            <input type="text" name="login">

            <label for="title">Senha</label>
            <input type="password" name="senha">
            
            <input type="submit" value="Cadastrar">

        </form>
    </div>
</main>