<main>

  <h2 class="mt-3">Excluir Empresa</h2>

  <form method="post">

    <div class="form-group">
      <p>Você deseja realmente excluir a empresa <strong><?= $empresa->getNome() ?></strong>?</p>
    </div>

    <div class="form-group">
      <a href="index.php">
        <button type="button" class="btn btn-success">Cancelar</button>
      </a>

      <button type="submit" name="delete" class="btn btn-danger">Excluir</button>
    </div>

  </form>

</main>