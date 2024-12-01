<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

  <title>Cadastro de Funcionários</title>
</head>

<body>
<header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>

  <div class="container">
    <div class="card card-cds">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">NSR</th>
          <th scope="col">Nome:</th>
          <th scope="col">Data:</th>
          <th scope="col">Entrada:</th>
          <th scope="col">Saída p/ almoço:</th>
          <th scope="col">Volta do almoço:</th>
          <th scope="col">Saída:</th>
          <th scope="col">Ações:</th>
        </tr>
      </thead>
      <tbody>
      <tr>
            <th scope="row">1</th>
            <td>Rodrigo</td>
            <td>02/01/2024</td>
            <td>7:05</td>
            <td>11:10</td>
            <td>12:58</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Fernando</td>
            <td>02/01/2024</td>
            <td>7:10</td>
            <td>11:00</td>
            <td>12:45</td>
            <td>17:05</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Isabela</td>
            <td>02/01/2024</td>
            <td>7:00</td>
            <td>11:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Luiz</td>
            <td>02/01/2024</td>
            <td>7:03</td>
            <td>11:04</td>
            <td>13:002</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Felipe</td>
            <td>02/01/2024</td>
            <td>6:50</td>
            <td>11:10</td>
            <td>12:55</td>
            <td>17:02</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Rodrigo</td>
            <td>03/01/2024</td>
            <td>7:05</td>
            <td>11:10</td>
            <td>12:58</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Fernando</td>
            <td>03/01/2024</td>
            <td>7:10</td>
            <td>11:00</td>
            <td>12:45</td>
            <td>17:05</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Isabela</td>
            <td>03/01/2024</td>
            <td>7:00</td>
            <td>11:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Luiz</td>
            <td>03/01/2024</td>
            <td>7:03</td>
            <td>11:04</td>
            <td>13:002</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Felipe</td>
            <td>03/01/2024</td>
            <td>6:50</td>
            <td>11:10</td>
            <td>12:55</td>
            <td>17:02</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">1</th>
            <td>Rodrigo</td>
            <td>04/01/2024</td>
            <td>7:05</td>
            <td>11:10</td>
            <td>12:58</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Fernando</td>
            <td>04/01/2024</td>
            <td>7:10</td>
            <td>11:00</td>
            <td>12:45</td>
            <td>17:05</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Isabela</td>
            <td>04/01/2024</td>
            <td>7:00</td>
            <td>11:00</td>
            <td>13:00</td>
            <td>17:00</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">4</th>
            <td>Luiz</td>
            <td>04/01/2024</td>
            <td>7:03</td>
            <td>11:04</td>
            <td>13:002</td>
            <td>17:01</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          <tr>
            <th scope="row">5</th>
            <td>Felipe</td>
            <td>04/01/2024</td>
            <td>6:50</td>
            <td>11:10</td>
            <td>12:55</td>
            <td>17:02</td>
            <td>
              <a href="" class="btn btn-warning"> Editar</a>

              <button class="btn btn-danger btn-excluir" data-id=""> Excluir</button>
            </td>
          </tr>
          
      </tbody>
    </table>
    <br>
    <div class="form-row justify-content-center">
            <div class="mr-3">
              <a href="/pi_gandara/folhaPagamento/index.php"><button type="button" class="btn btn-success">Voltar</button></a>
            </div>
          </div>
  </div>

  <script src="../js/script.js"></script>
  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>
  <scrip src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

</body>

</html>