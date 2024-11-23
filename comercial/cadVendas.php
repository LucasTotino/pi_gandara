<?php
require '../utils/conexao.php';

?>

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
            <div class="form-group col-sm-2">
              <label for="id_venda" class="font-weight-bold">Nº Pedido:</label>
              <input type="text" id="id_venda" name="id_venda" class="form-control" readonly>
            </div>
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="nome"><b>Nome/Razão Social Cliente:</b></label>
              <select id="nome" name="nome" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value=""></option>
              </select>
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="tipovenda"><b>Tipo da Venda:</b></label>
              <select id="tipovenda" name="tipovenda" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="atacado">Atacado</option>
                <option value="varejo">Varejo</option>
                <option value="exportacao">Exportação</option>
              </select>
            </div>

          </div> <!--  -->

          <div class="form-row">
            <div class="form-group col-md-4 text-white">
              <label class="text-dark" for="origemvenda"><b>Origem da Venda:</b></label>
              <select id="origemvenda" name="origemvenda" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="verbal">Verbal</option>
                <option value="telefone">Telefone</option>
                <option value="correio">Correio</option>
                <option value="inter">Interligação micro/micro</option>
              </select>
            </div>
            <div class="form-group col-md-5 text-white">
              <label class="text-dark" for="nomepromocao"><b>Desconto:</b></label>
              <select id="nomepromocao" name="nomepromocao" class="form-control">
                <option value="" selected>-- ESCOLHA --</option>
                <option value="n">Nenhum</option>
                <option value=""></option>
              </select>
            </div>
            <div class="form-group col-md-3 text-white">
              <label class="text-dark" for="dia_venda"><b>Dia da venda:</b></label>
              <input type="date" class="form-control" id="dia_venda" name="dia_venda">
            </div>

          </div> <!--  -->

          <hr>
          <h4>Informações do cliente:</h4>
          <div class="form-row">
            <div class="form-group col-sm-7">
              <label for="nome" class="font-weight-bold">Nome do Cliente:</label>
              <input type="text" id="nome" name="nome" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-5">
              <label for="logradouro" class="font-weight-bold">Endereço:</label>
              <input type="text" id="logradouro" name="logradouro" class="form-control" readonly>
            </div>
          </div>
          <div class="form-row">
            <div class="form-group col-sm-4">
              <label for="email" class="font-weight-bold">Email:</label>
              <input type="text" id="email" name="email" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-3">
              <label for="celular" class="font-weight-bold">Celular:</label>
              <input type="text" id="celular" name="celular" class="form-control" readonly>
            </div>
            <div class="form-group col-sm-5">
              <label for="cidade" class="font-weight-bold">Cidade:</label>
              <input type="text" id="cidade" name="cidade" class="form-control" readonly>
            </div>
          </div>
          <hr>

          <h4>Produto a ser vendido:</h4>
          <div class="form-row">
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="cod_produto"><b>Código:</b></label>
              <input type="text" class="form-control" id="cod_produto" name="cod_produto" readonly>
            </div>
            <div class="form-group col-md-8 text-white">
              <label class="text-dark" for="produto"><b>Produto vendido:</b></label>
              <input type="text" class="form-control" id="produto" name="produto">
            </div>
            <div class="form-group col-md-2 text-white">
              <label class="text-dark" for="unidade_vendida"><b>Quantidade:</b></label>
              <input type="number" class="form-control" id="unidade_vendida" name="unidade_vendida">
            </div>
          </div> <!--  -->

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