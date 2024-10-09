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
    <div class="container">
      <div class="row p-5 justify-content-center d-flex align-items-center">
        <a href="/pi_gandara/pcp/planejamento.php" class="btn">
          <div class="col-6 p-5 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-columns fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Planejamento</h3>
              </div>
            </div>
          </div>
        </a>

        <a href="/pi_gandara/pcp/controleProd.php" class="btn">
          <div class="col-6 p-5 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-industry fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Controle de Produção</h3>
              </div>
            </div>
          </div>
        </a>

      </div> <!--Fim da row -->

      <div class="row p-5 justify-content-center d-flex align-items-center">
        <a href="/pi_gandara/pcp/qualidade.php" class="btn">
          <div class="col-6 p-5 m-1">
            <div style="width: 18rem;">
              <span class="fa fa-check-circle fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Qualidade</h3>
              </div>
            </div>
          </div>
        </a>
        <a href="/pi_gandara/pcp/insumos.php" class="btn">
          <div class="col-6 p-5 m-1">
            <div style="width: 18rem;">
              <span class="fa fa fa-truck fa-5x" aria-hidden="true"></span>
              <div class="card-body">
                <h3>Insumos</h3>
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
