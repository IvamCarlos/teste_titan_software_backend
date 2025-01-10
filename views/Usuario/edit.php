<main>
    <section>
        <a href="<?php echo base_url; ?>usuarios">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <div>
        <h2>Editar Usuário</h2>

        <form method="post" action="<?php echo base_url; ?>usuario-atualizar/<?= $usuario->getIdUsuario() ?>">
            <label for="title">Usuário</label>
            <input type="text" name="login" value="<?= ($usuario->getLogin()) ? $usuario->getLogin() : '' ?>">

            <label for="title">Senha</label>
            <input type="password" name="senha" value="<?= ($usuario->getSenha()) ? $usuario->getSenha() : '' ?>">
            
            <input type="submit" value="Cadastrar">

        </form>
    </div>
</main>