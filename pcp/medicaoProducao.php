<?php
if (isset($_POST['submit'])) {

    // Iniciando conexao
    include_once('../funcoes/conexao.php');

    // Variaveis principais
    $nomePlantio = $_POST['nomePlantio'];
    $dataMedição = $_POST['dataMedição'];
    $diametroFruto = $_POST['diametroFruto'];
    $praga = $_POST['praga'];
    $obsMedicao = $_POST['obsMedicao'];
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
        <form action="../pcp/medicaoProducao.php" method="POST"><!-- Inicio Formulário -->
            <div class="row">
                <div class="col-8">
                    <h2>Medição da Produção</h2>
                </div>

            </div>


            <div class="form-group">
                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-6">
                        <label for="nomePlantio">Nome do Plantio medido</label>
                        <input type="number" class="form-control" id="nomePlantio" name="nomePlantio">
                    </div>
                    <div class="col-sm-6">
                        <label for="dataMedicao">Data da medição</label>
                        <input type="date" class="form-control" id="dataMedicao" name="dataMedicao">
                    </div>


                </div>



                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="diametroFruto">Diâmetro da Fruta (cm)</label>
                        <input type="number" class="form-control" id="diametroFruto" name="diametroFruto">
                    </div>



                    <div class="col-sm-4">
                        <label for="praga">Qual praga foi observada?</label>
                        <input type="text" class="form-control" id="praga" name="praga">
                    </div>




                </div>
                <div class="form-row justify-content-center mt-2">
                    <div class="col-6">
                        <label for="obsMedicao">Observação:</label>
                        <input type="text" class="form-control" id="obsMedicao" name="obsMedicao">
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
                    <a href="/pi_gandara/compras/index.php"><button type="button" class="btn btn-danger">Voltar</button></a>
                </div>
            </div>

        </form>

    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>