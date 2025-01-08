<main>
    <section>
        <a href="index.php">
            <button class="btn btn-success">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <form method="post" onsubmit="return validar()">

        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" value="<?= ($empresa->getNome()) ? $empresa->getNome() : '' ?>">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira o nome da empresa
            </span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

    </form>
</main>

<script>

    function validar() {

        const nome = document.getElementById("nome");
        let valid = true;

        if (!nome.value) {
            const nomeErro = document.getElementById("nomeErro");
            nomeErro.classList.add("visible");
            nome.classList.add("invalid");
            nomeErro.setAttribute("aria-hidden", false);
            nomeErro.setAttribute("aria-invalid", true);
            valid = false;
        }
            
        return valid;
    }

</script>