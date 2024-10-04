<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Estoque</title>
</head>

<body>
  
    <header>
      <?php
      include_once('../utils/menu.php');
      ?>
    </header>
    <main>
    <div class="container mt-4">

      <div class="row p-3 justify-content-center d-flex align-items-center">
        <a href="produtosPlantio.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-seedling fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Insumos</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosManutencao.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-tools fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Manutenção</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosAlmoxarifado.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-box fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Produtos</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="produtosEquipamentos.php" class="btn">
          <div class="col-2 p-2 m-1">
            <div style="width: 10rem;">
              <span class="fa fa-tools fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Estoque Atual</h3>
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