<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form method="post">

        <div class="form-group">
            <label for="title">Usuário</label>
            <input type="text" class="form-control" name="usuario" value="<?= ($user->getLogin()) ? $user->getLogin() : '' ?>">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

    </form>
</main>