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

    <div class="container">
        <h4>Gestão do estoque de insumos utilizados e produtos colhidos assim que tickar o kanban desconta os insumos utilizados</h4>
        <h4>Planejamento do transporte e armazenamento pós-colheita</h4>
    </div>
    <div class="container">
        <a href="/pi_gandara/pcp/cadastroInsumo.php" class="btn">
            <div class="col-6 p-5 m-1">
                <div style="width: 18rem;">
                    <span class="fa fa-book fa-5x" aria-hidden="true"></span>
                    <div class="card-body">
                        <h3>Solicitação de cadastro de Insumos</h3>
                    </div>
                </div>
            </div>
        </a>

        <a href="/pi_gandara/pcp/reqMat.php" class="btn">
            <div class="col-6 p-5 m-1">
                <div style="width: 18rem;">
                    <span class="fa fa-inbox fa-5x" aria-hidden="true"></span>
                    <div class="card-body">
                        <h3>Solicitação de Materiais</h3>
                    </div>
                </div>
            </div>
        </a>
    </div>
    <script src="https://kit.fontawesome.com/74ecb76a40.js" crossorigin="anonymous"></script>

</body>

</html>