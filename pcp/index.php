<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>PCP</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <div class="row">

      <a href="../dashboard.php" class="btn">
        <div class="col-2">
          <div style="width: 18rem;">
            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
          </div>
        </div>
      </a>


      <div class="col-6 m-5">
        <h1>Planejamento e Controle da Produção</h1>
      </div>

    </div>

    <div class="container">
      <div class="row  justify-content-center d-flex align-items-center">
        <a href="/pi_gandara/pcp/relatorios.php" class="btn">
          <div class="col-4 m-2">
            <div style="width: 18rem;">
              <span class="fa fa-columns fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Relatório</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/pcp/planPlantacao.php" class="btn">
          <div class="col-4 m-2">
            <div style="width: 18rem;">
              <span class="fa-solid fa-seedling fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Planejamento de Plantação</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/pcp/acompProducao.php" class="btn">
          <div class="col-4 m-2">
            <div style="width: 18rem;">
              <span class="fa-solid fa-file-pen fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Acompanhamento da Produção</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->

      <div class="row justify-content-center d-flex align-items-center">
        <a href="/pi_gandara/pcp/qualidade.php" class="btn">

          <div class="col-4  m-2">
            <div style="width: 18rem;">
              <span class="fa fa-check-circle fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Qualidade</h3>
              </div>
            </div>
          </div>
        </a>
        <a href="/pi_gandara/pcp/cadastroInsumo.php" class="btn">
          <div class="col-4  m-2">
            <div style="width: 18rem;">
              <span class="fa fa-book fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Solicitação de cadastro de Insumos</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/pcp/reqMat.php" class="btn">
          <div class="col-4  m-2">
            <div style="width: 18rem;">
              <span class="fa-solid fa-truck-fast fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Solicitação de Materiais</h3>
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