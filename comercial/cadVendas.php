<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="/pi_gandara/css/style.css">

  <title>Comercial e Faturamento</title>
</head>


<body>
  <header>
    <?php
    include_once('../utils/menu.php');
    ?>
  </header>
  <main>
    <h1 class="text-center">COMERCIAL E FATURAMENTO</h1>
    <div class="container">
      <h3 class="text-center">Cadastro de Vendas</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="" method="POST">

          <div class="form-row">
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for=""><b>Vendedor:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Tipo da Venda:</b></label>
              <select id="" name="" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3 </option>
                <option value="">4</option>
              </select>
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Dia da venda:</b></label>
              <input type="date" class="form-control" id="" name="">
            </div>
          </div> <!--  -->

          <hr>

          <h4>Informações da Venda:</h4>
          <div class="form-row">
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Cód. Produto:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-7 text-white">
              <label class="text-dark" for=""><b>Produto vendido:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Quantidade:</b></label>
              <input type="number" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-1 text-white">
              <button type="button" class="btn btn-primary">Adicionar</button>
            </div>
          </div> <!--  -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Cód. Produto:</th>
                <th scope="col">Produto vendido:</th>
                <th scope="col">Quantidade:</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>

          <hr>

          <div class="form-row mt-3">
            <div class="col-md-4 text-left">
              <a class="btn btn-warning" href="../comercial/index.php">Voltar</a>
            </div>
            <div class="col-md-4 text-center">
              <button type="reset" class="btn btn-outline-secondary">Limpar</button>
            </div>
            <div class="col-md-4 text-right">
              <button type="submit" class="btn btn-success">Cadastrar</button>
            </div>
          </div> <!-- BOTÕES -->

        </form> <!-- End Form -->
      </div>
    </div>
  </main>


  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.css" crossorigin="anonymous">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

</body>

</html>