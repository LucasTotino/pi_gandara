<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">

  <title>Comercial e Faturamento</title>
</head>


<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <h1 class="text-center">COMERCIAL E FATURAMENTO</h1>
    <div class="container">
      <div class="row p-3 justify-content-center d-flex align-items-center">

        <a href="cadVendedores.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-address-card fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cadastro de Vendedores</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="cadTransportadores.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-truck fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cadastro de Transportadora</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="cadDescontos.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-tag fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Politica de Descontos</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!-- ROW end -->

      <div class="row p-3 justify-content-center d-flex align-items-center">

        <a href="cadVendas.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-money fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Vendas</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="cadNotaSaida.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-receipt fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cadastro de NFS</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="Faturar.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-inbox fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Faturar</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!-- ROW end -->

    </div>
  </main>


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</body>

</html>