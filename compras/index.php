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
    <div class="row row-menu">
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addClient.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Clientes</h5>
            <a href="/pi_gandara/compras/cadCliente.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addSupplier.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Fornecedores</h5>
            <a href="/pi_gandara/compras/cadFornecedor.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addProduct.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Produtos</h5>
            <a href="/pi_gandara/compras/cadProduto.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addType.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Tipos de Entradas/Saídas</h5>
            <a href="/pi_gandara/compras/cadTipoES.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addNature.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Natureza Financeira</h5>
            <a href="/pi_gandara/compras/cadNatFinanceira.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
    </div>
    <div class="row row-menu">
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addUser.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cadastro de Usuários</h5>
            <a href="/pi_gandara/compras/cadUsuario.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/addRequest.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Solicitação de Compra</h5>
            <a href="/pi_gandara/compras/solicitacaoCompra.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/plan.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Cotação</h5>
            <a href="/pi_gandara/compras/cotacao.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
      <div class="col-sm-2">
        <div class="card card-cadastro" style="width: 18rem;">
          <img src="/pi_gandara/imgs/checkRequest.png" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">Pedido de Compra</h5>
            <a href="/pi_gandara/compras/pedidoCompra.php" class="btn btn-primary">Cadastrar</a>
          </div>
        </div>
      </div>
    </div>
  </main>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>