<main>

  <h2>Excluir Usuário</h2>

  <form method="post" action="<?php echo base_url ?>usuario-deletar/<?= $usuario->getIdUsuario() ?>">

    <p>Você deseja realmente excluir o usuário <strong><?= $usuario->getLogin() ?></strong>?</p>

    <a href="<?php echo base_url ?>usuarios">
      <button class="button" type="button">Cancelar</button>
    </a>

    <button class="button-danger" type="submit" name="delete">Excluir</button>

  </form>

</main>