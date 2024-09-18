<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <title>Folha de Pagamento</title>
</head>

<body>
<header>
<?php
            include_once('../utils/menu.php');
        ?>
  </header>
  <main>
<div class="container">

<div class="row p-3 justify-content-center d-flex align-items-center">

  <a href="cadFuncionarios.php" class="btn">
    <div class="col-2 p-2 m-1">
      <div style="width: 10rem;">
        <span class="fa fa-solid fa-user-plus fa-5x" aria-hidden="true"></span>
        <div class="card-body">
          <h3>Cadastro de Funcionarios</h3>
        </div>
      </div>
    </div>
  </a>

  <a href="listagemFuncionarios.php" class="btn">
    <div class="col-2 p-2 m-1">
      <div style="width: 10rem;">
        <span class="fa fa-solid fa-clipboard-list fa-5x" aria-hidden="true"></span>
        <div class="card-body">
          <h3>Listagem de Funcionarios</h3>
        </div>
      </div>
    </div>
  </a>

  <a href="lancamentoPonto.php" class="btn">
    <div class="col-2 p-2 m-1">
      <div style="width: 10rem;">
        <span class="fa fa-box-open fa-5x" aria-hidden="true"></span>
        <div class="card-body">
          <h3>Lançamentos de ponto</h3>
        </div>
      </div>
    </div>
  </a>

  <a href="holerite.php" class="btn">
    <div class="col-2 p-2 m-1">
      <div style="width: 10rem;">
        <span class="fa fa-solid fa-wallet fa-5x" aria-hidden="true"></span>
        <div class="card-body">
          <h3>Holerites</h3>
        </div>
      </div>
    </div>
  </a>

</div> <!--Fim da row -->


  <!--Fim da row -->
</div>
        
        
        
  </div></main>




  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
</body>

</html>
