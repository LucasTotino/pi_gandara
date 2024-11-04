<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Estoque de Produtos</title>
</head>

<body>
  
  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>
  
  <main>
    <div class="container mt-4">

      <!-- Título Principal -->
      <h1 class="text-warning text-center mb-4">Estoque de Produtos</h1>

      <!-- Seção de Adicionar Produto -->
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card p-4 mb-4" style="background-color: transparent; border: none;">
            <h2 class="text-warning text-center"><i class="fas fa-plus-circle"></i> Adicionar Produto</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="nome"><i class="fas fa-cube"></i> Nome do Produto</label>
                <input type="text" id="nome" name="nome" class="form-control" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="quantidade"><i class="fas fa-sort-numeric-up"></i> Quantidade</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="unidade"><i class="fas fa-balance-scale"></i> Unidade</label>
                <input type="text" id="unidade" name="unidade" class="form-control" required style="border-color: #ff9900;">
              </div>
              <button type="submit" name="add" class="btn btn-warning btn-block" style="background-color: #ff9900; border-color: #cc7a00;">
                <i class="fas fa-save"></i> Salvar Produto
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tabela de Produtos -->
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="text-warning text-center"><i class="fas fa-boxes"></i> Produtos no Estoque</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-light">
                <tr>
                  <th>Nome do Produto</th>
                  <th>Quantidade</th>
                  <th>Unidade</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Produto A</td>
                  <td>50</td>
                  <td>kg</td>
                </tr>
                <tr>
                  <td>Produto B</td>
                  <td>200</td>
                  <td>unidades</td>
                </tr>
                <tr>
                  <td>Produto C</td>
                  <td>30</td>
                  <td>litros</td>
                </tr>
                <tr>
                  <td>Produto D</td>
                  <td>100</td>
                  <td>kg</td>
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
