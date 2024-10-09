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
                <div class="col-8">
                    <h2>Agendamento de um novo Plantio</h2>
                </div>
                
            </div>


            <div class="form-group">
                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="areaPlantio">Área de plantio (m²)</label>
                        <input type="number" class="form-control" id="areaPlantio" name="areaPlantio">
                    </div>
                    <div class="col-sm-4">
                        <label for="dataPlantio">Data stimada para plantio</label>
                        <input type="date" class="form-control" id="dataPlantio" name="dataPlantio">
                    </div>

                    <div class="col-sm-4">
                        <label for="dataColheita">Data stimada para Colheita</label>
                        <input type="date" class="form-control" id="dataColheita" name="dataColheita">
                    </div>
                </div>

                <!-- Celular e Email -->

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="espacoMuda">Espaçamento entre Mudas (m)</label>
                        <input type="number" class="form-control" id="espacoMuda" name="espacoMuda">
                    </div>
                    

                    <div class="col-sm-4">
                        <label for="fruto">Fruto:</label>
                        <div class="input-group">
                            <select class="custom-select" id="fruto" name="fruto">
                                <option>Selecione</option>
                                <option>Laranja</option>
                                <option>Limão</option>
                            </select>
                        </div>
                    </div>




                </div>


            </div>

        </form>

    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>