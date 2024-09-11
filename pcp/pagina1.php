
<?php



?>

<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Trabalho Gandara!</title>
</head>
<header>
  <nav>
    <a href="/pi_gandara/index.php" title="Home">
      <span class="fa fa-bars" aria-hidden="true"></span>
      <span class="label">Menu</span>
    </a>
    <a href="/pi_gandara/estoque/index.php" title="Estoque">
      <span class="fa fa-solid fa-box"></span>
      <span class="label">Estoque</span>
    </a>
    <a href="/pi_gandara/compras/index.php" title="Compras" class="active">
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
    <a href="/pi_gandara/folhaPagamento/index.php" title="Folha de Pagamento">
      <span class="fa fa-file-invoice-dollar"></span>
      <span class="label">Folha de Pagamento</span>
    </a>
    <a href="/pi_gandara/comercial/index.php" title="Comercial">
      <span class="fa fa-chart-line"></span>
      <span class="label">Comercial</span>
    </a>
  </nav>

</header>

<body>

  <!--Pensei em fazer um FORM questionando área de plantio, com isso teremos quantos pés serão plantados pelo doc https://www.idam.am.gov.br/wp-content/uploads/2023/10/cartilha-citros_final-1.pdf distância entre pés, com isso descontamos %de perda solictada para o usuário também e teremos a produção estimada!  -->

  <div class="container p-5 justify-content">
    <h2>Estimativa de Produção</h2>
    <div class="card">
      <form action="" class="form-row p-2">

        <div class="col-4">
          <div class="form-group">
            <label for="plantio">Área de Plantio(hec)</label>
            <input type="number" class="form-control" id="plantio" placeholder="10" name="plantio"><!-- 1hec -> 10000m² -->
          </div>
        </div>

        <div class="col-4">
          <div class="form-group">
            <label for="perda">Porcentagem de Perda(%)</label>
            <input type="number" class="form-control" id="perda" placeholder="5" name="perda">
          </div>
        </div>

        <div class="col-4">
          <div class="form-group">
            <label for="tipo_plantacao">Tipo de Plantio</label>
            <input type="text" class="form-control" id="tipo_plantacao" placeholder="Tipo da Plantação">

          </div>
        </div>
        <div class="row ml-5 flexbox ">
          <div class="col-6">
            <button class="btn btn-danger">Cancelar</button>
          </div>

          <div class="col-6">
            <button class="btn btn-success" type="submit">Calcular</button>
          </div>
        </div>

      </form>

    </div>

  </div>



  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>