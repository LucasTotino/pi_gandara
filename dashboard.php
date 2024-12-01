<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Ceres Sistema</title>

<body>
  <header>
    <?php
    include_once('utils/menu.php');
    ?>
  </header>

  <main>
    <div class="container">

      <div class="row p-5 justify-content-center d-flex align-items-center">


        <a href="/pi_gandara/estoque/index.php" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-solid fa-box fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Estoque</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/compras/index.php" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-money fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Compras</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/pcp/index.php" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-helmet-safety fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>PCP</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->

      <div class="row p-5 justify-content-center d-flex align-items-center">
        <a href="/pi_gandara/financeiro/index.php" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-solid fa-dollar-sign fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Financeiro</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/folhaPagamento" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-file-invoice-dollar fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Folha de pagamento</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/comercial" class="btn">
          <div class="col-4 p-2 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-chart-line fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Comercial e Faturamento</h3>
              </div>
            </div>
          </div>
        </a>
      </div> <!--Fim da row -->


    </div>
      

  </main>



  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>