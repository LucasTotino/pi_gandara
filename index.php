<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Ceres Sistema</title>
</head>

<body>
  <header>
    <?php
    include_once('utils/menu.php');
    ?>
  </header>
  <main>
    <div class="row row-menu">
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-chart-line card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">Comercial</h5>
            <a href="/pi_gandara/comercial/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-money card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">Compras</h5>
            <a href="/pi_gandara/compras/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-solid fa-box card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">Estoque</h5>
            <a href="/pi_gandara/estoque/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-solid fa-dollar-sign card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">Financeiro</h5>
            <a href="/pi_gandara/financeiro/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-file-invoice-dollar card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">Folha de Pagamento</h5>
            <a href="/pi_gandara/folhaPagamento/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-menu mt-3">
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
        <span class="fa fa-helmet-safety card-img-top"></span>
          <div class="card-body">
            <h5 class="card-title">PCP</h5>
            <a href="/pi_gandara/pcp/index.php" class="btn btn-primary">Acessar</a>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>