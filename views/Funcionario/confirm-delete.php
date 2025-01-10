<main>

  <h2>Excluir Funcionário</h2>

  <form method="post" action="<?php echo base_url ?>funcionario-deletar/<?= $funcionario->getIdFuncionario() ?>">

    <p>Você deseja realmente excluir o funcionário <strong><?= $funcionario->getNome() ?></strong>?</p>

    <a href="<?php echo base_url ?>">
      <button class="button" type="button">Cancelar</button>
    </a>

    <button class="button-danger" type="submit" name="delete">Excluir</button>

  </form>

</main>