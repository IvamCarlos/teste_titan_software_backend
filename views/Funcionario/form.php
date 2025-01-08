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
            <input type="text" class="form-control" name="nome" id="nome" value="<?= ($funcionario->getNome()) ? $funcionario->getNome() : '' ?>">
            <span role="alert" id="nomeErro" aria-hidden="true">
                Por favor insira seu nome
            </span>
        </div>
        <div class="form-group">
            <label for="isbn">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= ($funcionario->getCpf()) ? $funcionario->getCpf() : '' ?>">
            <span role="alert" id="cpfErro" aria-hidden="true">
                Por favor insira seu CPF
            </span>
        </div>
        <div class="form-group">
            <label for="amount">RG</label>
            <input type="text" class="form-control" name="rg" value="<?= ($funcionario->getRg()) ? $funcionario->getRg() : '' ?>">
        </div>
        <div class="form-group">
            <label for="amount">Email</label>
            <input type="text" class="form-control" name="email" id="email" value="<?= ($funcionario->getEmail()) ? $funcionario->getEmail() : '' ?>">
            <span role="alert" id="emailErro" aria-hidden="true">
                Por favor insira seu e-mail
            </span>
        </div>
        <div class="form-group">
            <label for="amount">Empresa</label>
            <select name="id_empresa" id="empresa" class="form-control">
                <?php 
                
                    use \App\Entity\Empresa;

                    $empresas = Empresa::collection();

                    foreach($empresas as $empresa) {
                        ?>
                        <option value="<?= $empresa->getIdEmpresa() ?>"><?= $empresa->getNome() ?>
                        </option>
                        <?php
                    }

                ?>
            </select>
        </div>
        <span role="alert" id="empresaErro" aria-hidden="true">
            Por favor selecione uma empresa
        </span>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>

    </form>
</main>

<script>

    function validar() {

        const nome = document.getElementById("nome");
        const cpf = document.getElementById("cpf");
        const email = document.getElementById("email");
        const empresa = document.getElementById("empresa");
        let valid = true;

        if (!nome.value) {
            const nomeErro = document.getElementById("nomeErro");
            nomeErro.classList.add("visible");
            nome.classList.add("invalid");
            nomeErro.setAttribute("aria-hidden", false);
            nomeErro.setAttribute("aria-invalid", true);
            valid = false;
        }

        if (!cpf.value) {
            const cpfErro = document.getElementById("cpfErro");
            cpfErro.classList.add("visible");
            cpf.classList.add("invalid");
            cpfErro.setAttribute("aria-hidden", false);
            cpfErro.setAttribute("aria-invalid", true);
            valid = false;
        }

        if (!email.value) {
            const emailError = document.getElementById("emailErro");
            emailErro.classList.add("visible");
            email.classList.add("invalid");
            emailErro.setAttribute("aria-hidden", false);
            emailErro.setAttribute("aria-invalid", true);
            valid = false;
        }

        if (!empresa.value) {
            const empresaError = document.getElementById("empresaErro");
            empresaErro.classList.add("visible");
            empresa.classList.add("invalid");
            empresaErro.setAttribute("aria-hidden", false);
            empresaErro.setAttribute("aria-invalid", true);
            valid = false;
        }
            
        return valid;
    }

</script>