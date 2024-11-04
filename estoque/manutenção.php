<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Controle de Peças de Manutenção</title>
</head>

<body>

  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>

  <main>
    <div class="container mt-4">

      <!-- Adicionar Peça -->
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card p-4 mb-4" style="background-color: transparent; border: none;">
            <h2 class="text-warning text-center"><i class="fas fa-plus-circle"></i> Adicionar Peça</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="nome"><i class="fas fa-cogs"></i> Nome da Peça</label>
                <input type="text" id="nome" name="nome" class="form-control" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="quantidade"><i class="fas fa-sort-numeric-up"></i> Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="descricao"><i class="fas fa-align-left"></i> Descrição</label>
                <textarea id="descricao" name="descricao" class="form-control" rows="3" required style="border-color: #ff9900;"></textarea>
              </div>
              <button type="submit" name="add" class="btn btn-warning btn-block" style="background-color: #ff9900; border-color: #cc7a00;">
                <i class="fas fa-save"></i> Salvar Peça
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tabela de Peças no Estoque -->
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="text-warning text-center"><i class="fas fa-boxes"></i> Peças no Estoque</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-light">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Quantidade</th>
                  <th>Descrição</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Peça A</td>
                  <td>10</td>
                  <td>Descrição da peça A</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Peça B</td>
                  <td>5</td>
                  <td>Descrição da peça B</td>
                </tr>
                <tr>
                  <td colspan="4" class="text-center">Nenhuma peça encontrada</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- Botão Voltar -->
          <div class="text-center mt-4">
            <a href="index.php" class="btn btn-secondary" style="background-color: #ff9900; border-color: #cc7a00; color: white;">
              <i class="fas fa-arrow-left"></i> Voltar
            </a>
          </div>
        </div>
      </div>

    </div> <!-- Fim do container -->
  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
