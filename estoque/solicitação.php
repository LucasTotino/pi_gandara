<!doctype html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <title>Solicitação de Produtos</title>
</head>

<body>
  
  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>
  
  <main>
    <div class="container mt-4">

      <!-- Título Principal -->
      <h1 class="text-warning text-center mb-4">Solicitação de Produtos</h1>

      <!-- Seção de Adicionar Produto -->
      <div class="row justify-content-center">
        <div class="col-8">
          <div class="card p-4 mb-4" style="background-color: transparent; border: none;">
            <h2 class="text-warning text-center"><i class="fas fa-plus-circle"></i> Adicionar Produto</h2>
            <form method="post" action="">
              <div class="form-group">
                <label for="nome_produto"><i class="fas fa-box"></i> Nome do Produto</label>
                <input type="text" id="nome_produto" name="nome_produto" class="form-control" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="quantidade"><i class="fas fa-sort-numeric-up"></i> Quantidade Necessária</label>
                <input type="number" id="quantidade" name="quantidade" class="form-control" min="1" required style="border-color: #ff9900;">
              </div>
              <div class="form-group">
                <label for="tipo_produto"><i class="fas fa-tags"></i> Tipo de Produto</label>
                <select id="tipo_produto" name="tipo_produto" class="form-control" required style="border-color: #ff9900;">
                  <option value="" disabled selected>Selecione o tipo de produto</option>
                  <option value="insumos">Insumos</option>
                  <option value="material_consumo">Material de Consumo</option>
                  <option value="produto_acabado">Produto Acabado</option>
                  <option value="produto_semiacabado">Produto Semiacabado</option>
                </select>
              </div>
              <button type="submit" name="add" class="btn btn-warning btn-block" style="background-color: #ff9900; border-color: #cc7a00;">
                <i class="fas fa-paper-plane"></i> Enviar Solicitação
              </button>
            </form>
          </div>
        </div>
      </div>

      <!-- Tabela de Produtos Solicitados -->
      <div class="row justify-content-center">
        <div class="col-12">
          <h2 class="text-warning text-center"><i class="fas fa-boxes"></i> Produtos Solicitados</h2>
          <div class="table-responsive">
            <table class="table table-bordered table-striped">
              <thead class="thead-light">
                <tr>
                  <th>Nome do Produto</th>
                  <th>Quantidade</th>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Produto A</td>
                  <td>10</td>
                  <td>Insumos</td>
                </tr>
                <tr>
                  <td>Produto B</td>
                  <td>5</td>
                  <td>Material de Consumo</td>
                </tr>
                <tr>
                  <td>Produto C</td>
                  <td>3</td>
                  <td>Produto Acabado</td>
                </tr>
                <tr>
                  <td>Produto D</td>
                  <td>2</td>
                  <td>Produto Semiacabado</td>
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
