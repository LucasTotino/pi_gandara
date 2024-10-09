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
      <h3 class="text-center">Cadastro de Transportadora</h3>
      <div class="card card-cds">
        <form class="mt-3 mb-3 ml-3 mr-3" id="userform" action="" method="POST">

          <div class="form-row">
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for=""><b>Nome/Razão Social:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for=""><b>CPF/CNPJ:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
          </div> <!-- Linha 1: Nome dos Distribuidores e CPF/CNPJ -->

          <hr>
          <h4 class="text-start">Complemento de Cadastro:</h4>

          <div class="form-row">
            <div class="form-group col-md-6 text-white">
              <label class="text-dark" for=""><b>Modelo do Veículo:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for=""><b>Placa:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for=""><b>Status:</b></label>
              <select id="" name="" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="">Ativo</option>
                <option value="">Inativo</option>
              </select>
            </div>
          </div> <!-- Linha 4: Comissão, Máximo de desconto e Status -->

          <div class="form-row">
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for=""><b>Estado/UF:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for=""><b>Volume:</b></label>
              <input type="text" class="form-control" id="" name="">
            </div>
          </div>


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