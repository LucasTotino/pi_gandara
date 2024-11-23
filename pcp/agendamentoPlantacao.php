<?php
if (isset($_POST['submit'])) {

    // Iniciando conexao
    include_once('../utils/conexao.php');

    // Variaveis principais
    $nomePlantio = $_POST['nome_plantio'];
    $areaPlantio = $_POST['area_plantio'];
    $dataPlantio = $_POST['data_plantio'];
    $dataColheita = $_POST['data_colheita'];
    $espacamentoMudas = $_POST['espacamento_mudas'];
    $fruto = $_POST['fruto'];
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

    <div class="container mt-5">
        <form action="../pcp/testebanco.php" method="POST"><!-- Inicio Formulário -->
            <input type="hidden" id="id" name="id" value="<?= isset($_GET['id']) ? $_GET['id'] : null ?>">
            <input type="hidden" name="acao" id="acao" value="<?= isset($_GET['id']) ? "ALTERAR" : "INCLUIR" ?>">
            
            <div class="row">

      <a href="../pcp/index.php" class="btn">
        <div class="col-2">
          <div style="width: 18rem;">
            <span class="fa fa-chevron-left fa-2x p-3" aria-hidden=" true"></span>
          </div>
        </div>
      </a>


      <div class="col-6 m-5 d-flex justify-content-center">
        <h3>Agendamento de um novo Plantio</h3>
      </div>

    </div>


            <div class="form-group">
                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="nomePlantio">Nome da área de plantio</label>
                        <input type="text" class="form-control" id="nomePlantio" name="nome_plantio">
                    </div>
                    <div class="col-sm-2">
                        <label for="areaPlantio">Área de plantio (ha)</label>
                        <input type="number" class="form-control" id="areaPlantio" name="area_plantio">
                    </div>
                    <div class="col-sm-3">
                        <label for="dataPlantio">Data estimada para plantio</label>
                        <input type="date" class="form-control" id="dataPlantio" name="data_plantio">
                    </div>

                    <div class="col-sm-3">
                        <label for="dataColheita">Data estimada para Colheita</label>
                        <input type="date" class="form-control" id="dataColheita" name="data_colheita">
                    </div>
                </div>

                <!-- Celular e Email -->

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="espacoMuda">Espaçamento entre Mudas (m)</label>
                        <input type="number" class="form-control" id="espacoMuda" name="espacamento_mudas">
                    </div>


                    <div class="col-sm-4">
                        <label for="fruto">Fruto:</label>
                        <div class="input-group">
                            <select class="custom-select" id="fruto" name="fruto">
                                <option value="">Selecione</option>
                                <option value="Laranja">Laranja</option>
                                <option value="Limão">Limão</option>
                            </select>
                        </div>
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
                    <a href="planPlantacao.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                </div>
            </div>


        </form>

    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>