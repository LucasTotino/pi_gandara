<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/styleFinanceiro.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Contas a Pagar</title>
</head>

<body>
  <header>
    <?php include_once('../utils/menu.php'); ?>
  </header>

  <main class="container">
    <section class="button-section">
      <div class="row justify-content-center">
        <div class="col-md-3">
          <a href="#" class="btn btn-primary">
            <span class="fa-solid fa-money-bill-transfer fa-4x" aria-hidden="true"></span>
            <div class="card-body">
              <h3>Novo Pagamento</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-primary">
            <span class="fa-solid fa-file-invoice fa-4x" aria-hidden="true"></span>
            <div class="card-body">
              <h3>Ver Faturas</h3>
            </div>
          </a>
        </div>
        <div class="col-md-3">
          <a href="#" class="btn btn-primary">
            <span class="fa-solid fa-clock fa-4x" aria-hidden="true"></span>
            <div class="card-body">
              <h3>Histórico de Pagamento</h3>
            </div>
          </a>
        </div>
      </div>
    </section>

    <section class="data-grid-section">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <input type="search" id="pesquisar-faturas" placeholder="Pesquisar faturas...">
          <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Número da Fatura</th>
                <th>Data da Fatura</th>
                <th>Data Vencimento</th>
                <th>Valor</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Data will be populated here -->
            </tbody>
          </table>
          <div aria-label="Pagination">
            <ul class="pagination">
              <li class="page-item"><a class="page-link" href="#">Voltar</a></li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">Próximo</a></li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>