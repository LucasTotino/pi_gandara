<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css"
    crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Trabalho Gandara!</title>
</head>

<header>
  <?php
  include_once('../utils/menu.php');
  ?>
</header>

<body>

  <div class="container">
    <div class="row">

      <a href="../pcp/index.php" class="btn">
        <div class="col-2">
          <div style="width: 18rem;">
            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
          </div>
        </div>
      </a>
      
      <div class="col-6 m-5 d-flex justify-content-center">
        <h3>Relatório das plantações</h3>
      </div>

      <div class="container mt-5">
        <h2 class="text-center">Planejamento de Atividades</h2>
        <table class="table table-bordered table-striped">
          <thead class="thead-dark">
            <tr>
              <th>Item</th>
              <th>Atividade</th>
              <th>Quantidade</th>
              <th>Projeção de Uso / Data Aplicação</th>
              <th>Material Necessário</th>
              <th>Quantidade</th>
              <th>Un/Med. Ha</th>
              <th>Preços/Un.</th>
              <th>Preço Total</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Identificar área</td>
              <td>2</td>
              <td>Semanas</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>R$ -</td>
              <td>R$ -</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Identificar materiais</td>
              <td>4</td>
              <td>Semanas</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>R$ -</td>
              <td>R$ -</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Requisitar materiais</td>
              <td>8</td>
              <td>Semanas</td>
              <td>Calcário</td>
              <td>4</td>
              <td>Tn</td>
              <td>R$ 2.000,00</td>
              <td>R$ 8.000,00</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Requisitar materiais</td>
              <td>3</td>
              <td>Semanas</td>
              <td>Mudas enxertadas</td>
              <td>667</td>
              <td>Un</td>
              <td>R$ 30,00</td>
              <td>R$ 20.010,00</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Preparo de solo</td>
              <td>2</td>
              <td>Semanas</td>
              <td>Caixas para mudas</td>
              <td>4</td>
              <td>Un</td>
              <td>R$ 36,50</td>
              <td>R$ 146,00</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Preparo de solo</td>
              <td>3</td>
              <td>Semanas</td>
              <td>-</td>
              <td>-</td>
              <td>-</td>
              <td>R$ -</td>
              <td>R$ -</td>
            </tr>
            <!-- Continue preenchendo os dados conforme a tabela -->
          </tbody>
        </table>
      </div>
  </div>



  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>