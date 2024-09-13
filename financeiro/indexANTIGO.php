<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Financeiro</title>
</head>

<body> <!-- VERIFICAR FOTO  DO LIVRO  FINANCEIRO DO GANDARA -->
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>

  <div class="container">

    <div class="row p-5 d-flex">

      <a href="razaoGeral.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-city fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>Razão Geral</h3>
            </div>
          </div>
        </div>
      </a>

      <a href="contasPagar.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-money-bill-transfer fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>
                <nobr>Contas a</nobr> Pagar
              </h3>
            </div>
          </div>
        </div>
      </a>

      <a href="contasReceber.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-money-bill-transfer fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>
                <nobr>Contas a</nobr> Receber
              </h3>
            </div>
          </div>
        </div>
      </a>

      <a href="gerCaixa.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-scale-balanced fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>
                <nobr>Gerenciamento de</nobr> Caixa
              </h3>
            </div>
          </div>
        </div>
      </a>

    </div><!--  Fim da row -->


    <div class="row p-5 d-flex">

      <a href="gerFornecedores.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-truck fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>
                <nobr>Gerenciamento de</nobr> Fornecedores
              </h3>
            </div>
          </div>
        </div>
      </a>

      <a href="gerBancario.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa-solid fa-landmark fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>Gerenciamento Bancário</h3>
            </div>
          </div>
        </div>
      </a>

      <a href="gerFiscal.php" class="btn" style="width: 16rem;">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa fa-industry fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>Gerenciamento Fiscal</h3>
            </div>
          </div>
        </div>
      </a>

      <a href="relatoriosAnalises.php" class="btn" style="width: 16rem; ">
        <div class="col-3 p-5 m-1 d-flex">
          <div>
            <span class="fa fa-pie-chart fa-4x" aria-hidden="true"></span>
            <div class="card-body d-flex">
              <h3>
                <nobr>Relatórios e</nobr> Análises
              </h3>
            </div>
          </div>
        </div>
      </a>

    </div> <!--Fim da row -->

  </div>



  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>