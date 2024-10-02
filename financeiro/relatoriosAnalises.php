<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" type="text/css" href="styles.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Relatórios e Analises</title>
</head>

<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>

    <header>
      <?php
      include_once('../utils/menu.php');
      ?>
    </header>

    <main>
      <div class="container">
        <div class="row p-3 justify-content-center d-flex align-items-center">
        <a type="button" style="text-align: left;" class="col-1 btn btn-primary justify-content-center d-flex" href="/pi_gandara/financeiro/">Voltar</a>
          <h1 style="text-align: center;" class="col-11 display-4">Relatórios e Análises Financeiras</h1>
        </div>

        <div class="row p-3 justify-content-center d-flex align-items-center">

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Análise de Despesas</h5>
                <p class="card-text">Análise as despesas da empresa por categoria.</p>
                <a href="#" class="btn btn-primary">Ver Relatório</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Relatório de Receitas</h5>
                <p class="card-text">Visualize as receitas da empresa por período.</p>
                <a href="#" class="btn btn-primary">Ver Relatório</a>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Análise de Balanço</h5>
                <p class="card-text">Análise o balanço patrimonial da empresa.</p>
                <a href="#" class="btn btn-primary">Ver Relatório</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Add more cards for other reports and analysis -->

      </div>
    </main>


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>