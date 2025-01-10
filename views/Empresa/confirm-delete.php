<main>

  <h2>Excluir Empresa</h2>

  <form method="post" action="<?php echo base_url ?>empresa-deletar/<?= $empresa->getIdEmpresa() ?>">

    <p>Você deseja realmente excluir a empresa <strong><?= $empresa->getNome() ?></strong>?</p>

    <a href="<?php echo base_url ?>empresas">
      <button class="button" type="button">Cancelar</button>
    </a>

    <button class="button-danger" type="submit" name="delete">Excluir</button>

  </form>

</main>