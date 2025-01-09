<main>
    <section>
        <a href="index.php">
            <button class="btn-voltar">Voltar</button>
        </a>
    </section>

    <h2 class="mt-3"><?= TITLE ?></h2>

    <div>
        <form method="post" onsubmit="return validar()">

            <label for="title">Nome</label>
            <input type="text" name="nome" id="nome" value="<?= ($empresa->getNome()) ? $empresa->getNome() : '' ?>">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira o nome da empresa
            </span>

            <input type="submit" value="Cadastrar">

        </form>
    </div>
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