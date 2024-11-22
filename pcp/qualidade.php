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
  <?php
  include_once('../utils/menu.php');
  ?>
</header>

<body>


  <div class="container mt-5">
    <form action="" method="POST"><!-- Inicio Formulário -->
    <div class="row">

<a href="../pcp/index.php" class="btn">
  <div class="col-2">
    <div style="width: 18rem;">
      <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
    </div>
  </div>
</a>


<div class="col-6 m-5">
  <h3>Resgistro de Qualidade</h3>
</div>

</div>


      <div class="form-group">
        <!-- Nome, CPF e Data Nascimento -->
        <div class="form-row justify-content-center mt-2">
          <div class="col-sm-6">
            <label for="areaRef">Área de Referência</label>
            <input type="number" class="form-control" id="areaRef" name="areaRef" placeholder="Puxar um select do banco">
          </div>
          <div class="col-sm-6">
            <label for="dataMedicao">Data da medição</label>
            <input type="date" class="form-control" id="dataMedicao" name="dataMedicao">
          </div>


        </div>

        <div class="form-row justify-content-center mt-2">
          <div class="col-sm-4">
            <label for="diametroMed">Diâmetro da Fruta (cm)</label>
            <input type="number" class="form-control" id="diametroMed" name="diametroMed">
          </div>


          <div class="col-sm-4">
            <label for="conformidadeVenda">Está em conformidade para Venda?</label>
            <div class="input-group">
              <select class="custom-select" id="conformidadeVenda" name="conformidadeVenda">
                <option>Selecione</option>
                <option>Sim</option>
                <option>Não</option>
              </select>
            </div>
          </div>

      </div>
      <!-- Botões -->
      <div class="form-row justify-content-center">
        <div class="col-sm-3 mt-3">
          <button type="submit" name="submit" class="btn btn-success">Cadastrar</button>
        </div>
        <div class="col-sm-3 mt-3">
          <button type="reset" class="btn btn-warning">Cancelar</button>
        </div>
        <div class="col-sm-3 mt-3">
          <a href="index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
        </div>
      </div>
    </form>

  </div>






  <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>