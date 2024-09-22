<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Estoque</title>
</head>

<body>
  <header>
    <!-- Menu -->
    <nav class="nav-pills nav-sidebar">
      <a href="/pi_gandara/index.php" title="Home">
        <span class="fa fa-bars" aria-hidden="true"></span>
        <span class="label">Menu</span>
      </a>
      <a href="/pi_gandara/estoque/index.php" title="Estoque" class="active">
        <span class="fa fa-solid fa-box"></span>
        <span class="label">Estoque</span>
      </a>
      <a href="/pi_gandara/compras/index.php" title="Compras">
        <span class="fa fa-money"></span>
        <span class="label">Compras</span>
      </a>
      <a href="/pi_gandara/pcp/index.php" title="PCP">
        <span class="fa fa-helmet-safety"></span>
        <span class="label">PCP</span>
      </a>
      <a href="/pi_gandara/financeiro/index.php" title="Financeiro">
        <span class="fa fa-solid fa-dollar-sign"></span>
        <span class="label">Financeiro</span>
      </a>
      <a href="/pi_gandara/folhaPagamento/index.php" title="Folha de Pagamento">
        <span class="fa fa-file-invoice-dollar"></span>
        <span class="label">Folha de Pagamento</span>
      </a>
      <a href="/pi_gandara/comercial/index.php" title="Comercial">
        <span class="fa fa-chart-line"></span>
        <span class="label">Comercial</span>
      </a>
      <a href="/pi_gandara/index.php" title="Sair">
        <span class="fa fa-sharp fa-solid fa-door-open"></span>
        <span class="label">Sair</span>
      </a>
    </nav>
  </header>
  <main>

    <div class="container">

      <div class="row p-3 justify-content-center d-flex align-items-center">

        <a href="listaProdutos.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-solid fa-box-open fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Lista de Produtos</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="cadProduto.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-solid fa-plus fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cadastrar Produto</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="relatorioEstoque.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-file-alt fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Relatório de Estoque</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="ajusteEstoque.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-tools fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Ajuste de Estoque</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->

      <div class="row p-5 justify-content-center d-flex align-items-center">

        <a href="entradaEstoque.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 11rem;">
              <span class="fa fa-arrow-alt-circle-down fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Entrada de Estoque</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="saidaEstoque.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-arrow-alt-circle-up fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Saída de Estoque</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="historicoEstoque.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-history fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Histórico de Estoque</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->

    </div> <!-- Fim do container -->

  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
