<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <title>Estoque de Insumos</title>
</head>

<body>
  
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  
  <main>
    <div class="container mt-4">
      <h1 class="text-warning text-center mb-4">Estoque de Insumos</h1>

      <!-- Barra de Pesquisa -->
      <div class="row justify-content-center">
        <div class="col-md-8">
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2 w-75" type="search" placeholder="Pesquisar insumos..." aria-label="Pesquisar">
            <button class="btn btn-warning my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>

      <!-- Tabela de Insumos -->
      <div class="row justify-content-center mt-4">
        <div class="col-md-10">
          <table class="table table-bordered table-striped">
            <thead class="thead-light">
              <tr>
                <th>Nome do Insumo</th>
                <th>Quantidade</th>
                <th>Unidade</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Adubo Orgânico</td>
                <td>50</td>
                <td>kg</td>
              </tr>
              <tr>
                <td>Sementes de Milho</td>
                <td>200</td>
                <td>unidades</td>
              </tr>
              <tr>
                <td>Herbicida</td>
                <td>30</td>
                <td>litros</td>
              </tr>
              <tr>
                <td>Fertilizante</td>
                <td>100</td>
                <td>kg</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Botão Voltar -->
      <div class="text-center mt-4">
    <a href="index.php" class="btn btn-secondary" style="background-color: #ff9900; border-color: #cc7a00; color: white;">
        <i class="fas fa-arrow-left"></i> Voltar
    </a>
</div>
    </div> <!-- Fim do container -->
  </main>

  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

</body>

</html>
