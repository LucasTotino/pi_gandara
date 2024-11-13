<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="styles.css">
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
    <div class="row p-3 justify-content-center d-flex align-items-center">
      <a type="button" style="text-align: left;" class="col-1 btn btn-primary justify-content-center d-flex" href="/pi_gandara/financeiro/">Voltar</a>
      <h1 style="text-align: center;" class="col-11 display-4">Contas a Pagar</h1>
    </div>

    <div class="d-flex justify-content-center">
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="text" placeholder="Pesquisar faturas...">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
      </form>
    </div>

    </div>

    <section class="data-grid-section">
      <div class="row justify-content-center">
        <div class="col-md-12">
          
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