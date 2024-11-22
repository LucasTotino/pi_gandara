<?php
if (isset($_POST['submit'])) {

    // Iniciando conexao
    include_once('../utils/conexao.php');

    // Variaveis principais
    $nomeInsumo = $_POST['nome_insumo'];
    $codRef = $_POST['cod_ref'];
    $qtdeUtilizada = $_POST['qtde_utilizada'];
    $unidade = $_POST['unidade'];
    $prazoUtil = $_POST['prazo_util'];
}
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
    <?php
    include_once('../utils/menu.php');
    ?>
</header>

<body>
    <main>
        <div class="container-1">
        <div class="row">

<a href="../pcp/index.php" class="btn">
  <div class="col-2">
    <div style="width: 18rem;">
      <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
    </div>
  </div>
</a>


<div class="col-6 m-5">
  <h3>Solicitação de cadastro de Insumos</h3>
</div>

</div>


            <form action="../pcp/cadastroInsumo.php" method="POST"><!-- Inicio Formulário -->
                <div class="form-group">
                    <!-- Nome, CPF e Data Nascimento -->
                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-6">
                            <label for="nomeInsumo">Nome do Insumo</label>
                            <input type="text" class="form-control" id="nomeInsumo" name="nome_insumo">
                        </div>
                        <div class="col-sm-6">
                            <label for="codRef">Código de Referência</label>
                            <input type="text" class="form-control" id="codRef" name="cod_ref">
                        </div>
                    </div>

                    <!-- Celular e Email -->

                    <div class="form-row justify-content-center mt-2">
                        <div class="col-sm-4">
                            <label for="qtdeInsumo">Quantidade utilizada</label>
                            <input type="text" class="form-control" id="qtdeInsumo" name="qtde_utilizada">
                        </div>

                        <div class="col-sm-4">
                            <label for="unidade">Unidade:</label>
                            <div class="input-group">
                                <select class="custom-select" id="unidade" name="unidade">
                                    <option>Selecione</option>
                                    <option>Litro</option>
                                    <option>Quilo</option>
                                    <option>Tonelada</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">    
                        <label for="dataUtilizacao">Data de Utilização</label>
                        <input type="date" class="form-control" id="dataUtilizacao" name="dataUtilizacao">
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
    </main>

    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>