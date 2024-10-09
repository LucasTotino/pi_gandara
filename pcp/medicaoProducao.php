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
                    <h2>Medição da Produção</h2>
                </div>
                
            </div>


            <div class="form-group">
                <!-- Nome, CPF e Data Nascimento -->
                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-6">
                        <label for="areaRef">Área de Referência</label>
                        <input type="number" class="form-control" id="areaRef" name="areaRef">
                    </div>
                    <div class="col-sm-6">
                        <label for="dataMedicao">Data da medição</label>
                        <input type="date" class="form-control" id="dataMedicao" name="dataMedicao">
                    </div>

                
                </div>

                

                <div class="form-row justify-content-center mt-2">
                    <div class="col-sm-4">
                        <label for="diametroMed">Diâmetro da Fruta (cm)</label>
                        <input type="number" class="form-control" id="diametroMed" name="diametroMed" placeholder="4">
                    </div>
                    

                    <div class="col-sm-4">
                        <label for="temPraga">Foi observado praga:</label>
                        <div class="input-group">
                            <select class="custom-select" id="temPraga" name="temPraga">
                                <option>Selecione</option>
                                <option>Sim</option>
                                <option>Não</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <label for="qualPraga">Se sim, qual foi observada?</label>
                        <input type="text" class="form-control" id="qualPraga" name="qualPraga">
                    </div>




                </div>


            </div>

        </form>

    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>