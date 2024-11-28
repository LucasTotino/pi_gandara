<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Compras</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <h1 class="text-center">COMPRAS</h1>
    <div class="container">

      <div class="row p-3 justify-content-center d-flex align-items-center">

        <a href="cadFornecedor.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 12rem;">
              <span class="fa fa-solid fa-clipboard-list fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cadastro de Fornecedores</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="solicitacaoCompra.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-cart-plus fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Solicitação de Compra</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->



      <div class="row p-3 justify-content-center d-flex align-items-center">

        <a href="cotacao.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa-regular fa-clipboard fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Cotação</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="pedidoCompra.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-cart-plus fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Pedido de Compra</h3>
              </div>
            </div>
          </div>
        </a>

        <!--Fim da row -->
      </div>

  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>