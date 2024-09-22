<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Listagem de Produtos</title>
</head>

<body>
  <header>
    <!-- Menu -->
    <nav class="nav-pills nav-sidebar">
      <a href="/pi_gandara/index.php" title="Home">
        <span class="fa fa-bars" aria-hidden="true"></span>
        <span class="label">Menu</span>
      </a>
      <a href="/pi_gandara/estoque/index.php" title="Estoque">
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
      <a href="/pi_gandara/index.php" title="Sair">
        <span class="fa fa-sharp fa-solid fa-door-open"></span>
        <span class="label">Sair</span>
      </a>
    </nav>
  </header>
  
  <main>
    <div class="container mt-4">
      

      <div class="row p-3 justify-content-center d-flex align-items-center">
        <a href="produtosPlantio.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-seedling fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Produtos para Plantio</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosManutencao.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-tools fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Produtos de Manutenção</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosAlmoxarifado.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-box fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Produtos do Almoxarifado</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosFertilizantes.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-leaf fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Fertilizantes</h3>
              </div>
            </div>
          </div>
        </a>
      </div> <!-- Fim da row -->

      <div class="row p-5 justify-content-center d-flex align-items-center">
        <a href="produtosPesticidas.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-spray-can fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Pesticidas</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosEquipamentos.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-tools fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Equipamentos</h3>
              </div>
            </div>
          </div>
        </a>
      </div> <!-- Fim da row -->
    </div> <!-- Fim do container -->
  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
